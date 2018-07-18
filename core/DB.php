<?php

include_once __DIR__ . '/../models/Author.php';
include_once __DIR__ . '/../models/Article.php';




    // class DB
    // {
    //     private $conn = null;

    //     function __construct($config)
    //     {
    //         try {
    //             $this->conn = new PDO(
    //                 "mysql:host={$config['host']};dbname={$config['db_name']}",
    //                 $config['user'],
    //                 $config['password']
    //             );
    //             $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //         } catch (PDOException $e) {
    //             echo $e->getMessage();
    //             die();
    //         }
    //     }

    //     /**
    //      * @param       $sql
    //      * @param array $params
    //      * @return array
    //      */
    //     public function getAll($sql, $params = [])
    //     {
    //         $stmt = $this->conn->prepare($sql);
    //         $data = [];
    //         if ($stmt->execute($params)) {
    //             while (($row = $stmt->fetch(PDO::FETCH_ASSOC))) {
    //                 $data[] = $row;
    //             }
    //         }
    //         return $data;
    //     }

    //     /**
    //      *
    //      */
    //     function __destruct()
    //     {
    //         $this->conn = null;
    //     }

    //     /**
    //      * @param $query    String
    //      * @param $class    String
    //      * @return array
    //      */
    //     public function getObjectsOf($query, $class)
    //     {
    //         $tmpResult = $this->conn->query($query);
    //         $tmpResult->setFetchMode(PDO::FETCH_CLASS, $class);
    //         $result = [];

    //         while ($object = $tmpResult->fetch()) {
    //             $result[] = $object;
    //         }

    //         return $result;
    //     }

    //     /**
    //      * @param $query    String  SQLQueryString
    //      * @return array
    //      */
    //     public function query($query)
    //     {
    //         $result = [];
    //         $stmt = $this->conn->prepare($query);
    //         $stmt->execute();
    //         $stmt->setFetchMode(PDO::FETCH_ASSOC);

    //         while ($row = $stmt->fetch()) {
    //             $result[] = $row;
    //         }

    //         return $result;
    //     }

    //     /**
    //      * @param $query
    //      * @return mixed
    //      */
    //     public function getOne($query)
    //     {
    //         $stmt = $this->conn->prepare($query);
    //         $stmt->execute();
    //         $result = $stmt->fetch(PDO::FETCH_COLUMN);
    //         return $result;
    //     }

    //     /**
    //      * @param $query
    //      * @param $class
    //      * @return mixed
    //      */
    //     public function getOneObject($query, $class)
    //     {
    //         $stmt = $this->conn->prepare($query);
    //         $stmt->execute();
    //         $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
    //         $result = $stmt->fetch();
    //         return $result;
    //     }

    // }   
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
     
     
    try {
      
        $conn = connectDB();
     
        echo json_encode(array(
            'code' => 'success',
            'data' => $_GET
        ));
    }
    catch (Exception $e) {
        
        echo json_encode(array(
            'code' => 'error',
            'message' => $e->getMessage()
        ));
    }



    function getOptions() {
        $year = (isset($_GET['year']));
        $monthId = (isset($_GET['month']));
        $authorId = (isset($_GET['author_select']));

        return array(
            'year' => $year,
            'month' => $monthId,
            'author' => $authorId
        );
        
    };

    function getData($options, $conn) {
        $year = $options['year'];
        $month = $options['month'];
        $authorId = $options['author'];

        $querry = "
        SELECT
            articles.title as title,
            articles.annotation as text,
            authors.name as name,
            articles.updated_at as date,
            photos.link as photo
        FROM
            `articles`,
            `authors`,
            `photos`
        WHERE
            author_id = authors.id
        AND author_id = $authorId
        AND photo_id = photos.id
        AND year(updated_at) = $year
        AND month(updated_at) = $month
        ";
    }

