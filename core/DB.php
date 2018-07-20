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
    }
    
    //получить значения запроса или по умолчанию
    function getOptions() {
        $year = (isset($_POST['year'])) ? (int)$_POST['year'] : 0;
        $monthId = (isset($_POST['month'])) ? (int)$_POST['month'] : 0;
        $authorId = (isset($_POST['author_select'])) ? (int)$_POST['author_select'] : 0;
        $page = (isset($_POST['page'])) ? (int)$_POST['page'] : 1;

        $start = ($page * 10) - 10;        

        return array(
            'year' => $year,
            'month' => $monthId,
            'author' => $authorId,
            'start' => $start
        );
        
    };

    function getPageCount($options, $conn){
        $year = $options['year'];
        $month = $options['month'];
        $authorId = $options['author'];
        $limit = " LIMIT $per_page ";
        $start = $options['start'];
        $offset = " OFFSET $start";

        $yearWhere = ($year !== 0) ? "and year(updated_at) = $year" : '';
        $monthWhere = ($month !== 0) ? "and month(updated_at) = $month" : '';
        $authorWhere = ($authorId !== 0) ? "and author_id = $authorId" : '';

        $countQuery = "
        SELECT COUNT(*) FROM( 
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
    
    function getData($options, $conn) {
        global $per_page;
        $year = $options['year'];
        $month = $options['month'];
        $authorId = $options['author'];
        $limit = " LIMIT $per_page ";
        $start = $options['start'];
        $offset = " OFFSET $start";

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
                $conn = connectDB();
         
                $options = getOptions();
                
                $pagesCount = getPageCount($options, $conn);

                $data = getData($options, $conn);
                
                

                echo json_encode(array(
                    'code' => 'success',
                    'options' => $options,
                    'data' => $data,
                    'count' => $pagesCount
                    
                ));
            }
            catch (Exception $e) {
                
                echo json_encode(array(
                    'code' => 'error',
                    'message' => $e->getMessage()
                ));
            }