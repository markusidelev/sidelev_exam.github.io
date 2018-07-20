<?php

include_once __DIR__ . '/../models/Author.php';
include_once __DIR__ . '/../models/Article.php';
include_once __DIR__ . '/../config.php';



    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'blog');

    function connectDB() {
        $errorMessage = 'Невозможно подключиться к серверу базы данных';
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if (!$conn)
            throw new Exception($errorMessage);
        else {
            $query = $conn->query('set names utf8');
            if (!$query)
                throw new Exception($errorMessage);
            else
                return $conn;
        }
    };
    
    //получить значения запроса или кинуть по-умолчанию
    function getOptions() {
        $year = (isset($_POST['year'])) ? (int)$_POST['year'] : 0;
        $monthId = (isset($_POST['month'])) ? (int)$_POST['month'] : 0;
        $authorId = (isset($_POST['author_select'])) ? (int)$_POST['author_select'] : 0;
        $page = (isset($_POST['page'])) ? (int)$_POST['page'] : 1;
    // вычисление точки отчета статей (т.е. с какой страницы статьи)
        $start = ($page * $per_page) - $per_page;        
              

        return array(
            'year' => $year,
            'month' => $monthId,
            'author' => $authorId,
            'start' => $start
        );
        
    };

    // количество страниц по выбранным (или нет) фильтрам
    function getPageCount($options, $conn){
        $year = $options['year'];
        $month = $options['month'];
        $authorId = $options['author'];
        $limit = " LIMIT $per_page ";
        $start = $options['start'];
        $offset = " OFFSET $start";
        
        // условия, проверяющие наличие данный фильтра. встравляет их, если входные данные не равны 0
        $yearWhere = ($year !== 0) ? "and year(updated_at) = $year" : '';
        $monthWhere = ($month !== 0) ? "and month(updated_at) = $month" : '';
        $authorWhere = ($authorId !== 0) ? "and author_id = $authorId" : '';

        $countQuery = "
        SELECT COUNT(*) AS count FROM( 
            SELECT DISTINCT
            articles.title,
            authors.name,
            articles.updated_at
        FROM
            `articles`,
            `authors`
        WHERE
            author_id = AUTHORS.id 
            $authorWhere            
            $yearWhere 
            $monthWhere ) 
            AS subquery
        ";
        $count = $conn->query($countQuery);
        return $count->fetch_all(MYSQLI_ASSOC);
    };
    
        // получить все данные для статей
    function getData($options, $conn) {
        global $per_page;
        $year = $options['year'];
        $month = $options['month'];
        $authorId = $options['author'];
        $limit = " LIMIT $per_page ";

        $page = (isset($_POST['page'])) ? (int)$_POST['page'] : 1;
        // вычисление точки отчета статей (т.е. с какой страницы статьи)
        $start = ($page * $per_page) - $per_page;    

        
        $offset = " OFFSET $start";

        // условия, проверяющие наличие данный фильтра. встравляет их, если входные данные не равны 0
        $yearWhere = ($year !== 0) ? "and year(updated_at) = $year" : '';
        $monthWhere = ($month !== 0) ? "and month(updated_at) = $month" : '';
        $authorWhere = ($authorId !== 0) ? "and author_id = $authorId" : '';

        $query = "
        select
        articles.title as title,
            articles.annotation as text,
            authors.name as name,
            articles.updated_at as date,
            photos.link as photo
        from
        `articles`,
            `authors`,
            `photos`
        where
            author_id = authors.id
        $authorWhere
        and photo_id = photos.id
        $yearWhere
        $monthWhere
        $limit
        $offset
        ";

        // order by updated_at desc
        
        $data = $conn->query($query);
        return $data->fetch_all(MYSQLI_ASSOC);
    }


        try {
                global $per_page;
                $conn = connectDB();
         
                $options = getOptions();
                
                $pagesCount = getPageCount($options, $conn);

                $data = getData($options, $conn);
                
                $page = (isset($_POST['page'])) ? (int)$_POST['page'] : 1;
                     
                // возврат
                echo json_encode(array(
                    'code' => 'success',
                    'options' => $options,
                    'data' => $data,
                    'count' => $pagesCount,
                    'page' => $page,
                    'perPage' => $per_page,
                                       
                ));
            }
            catch (Exception $e) {
                
                echo json_encode(array(
                    'code' => 'error',
                    'message' => $e->getMessage()
                ));
        };