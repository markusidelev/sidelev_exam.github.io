<?php

// class Author
// {
//     public $id;
//     public $name;

//     public static function getAll()
//     {
//         $db = $GLOBALS['db'];
//         return $db->getObjectsOf('SELECT * FROM `authors`', self::class);
//     }

//     /**
//      * @param $name
//      * @return mixed
//      */
//     public static function getByName($name)
//     {
//         $db = $GLOBALS['db'];
//         return $db->getOneObject("SELECT * FROM `authors` WHERE `name` = '{$name}'", self::class);
//     }

//     /**
//      * @param $id
//      * @return mixed
//      */
//     public static function getById($id)
//     {
//         $db = $GLOBALS['db'];
//         return $db->getOneObject("SELECT `name` FROM `authors` WHERE `id` = '{$id}'", self::class);
//     }
// }

function get_author_by_id($author_id) {
    global $db;
    $authors = $db->query("SELECT * FROM authors WHERE id = $author_id");
    foreach ($authors as $author){
        return $author["name"];
    }
    
};