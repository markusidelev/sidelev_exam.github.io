<?php

class Article
{
    public $id;
    public $title;
    public $annotation;
    public $author;
    public $text;
    public $image;
    public $created_at;


    /**
     * @return mixed
     */
    public static function getAll()
    {
        $db = $GLOBALS['db'];

        $authors = $db->getObjectsOf('SELECT * FROM `authors`', Author);
        $articles = $db->getObjectsOf('SELECT * FROM `articles`', self::class);

        foreach ($articles as &$article) {
            $author = array_values(
                          array_filter(
                              $authors,
                              function ($a) use ($article) {
                                  return $a->id == $article->author_id;
                              }
                          )
                      )[0];
            $article->author = $author;
        }

        return $articles;
    }

    /**
     * @param $title
     * @return mixed
     */
    public static function getByTitle($title)
    {
        $db = $GLOBALS['db'];
        return $db->getOne("SELECT * FROM `articles` WHERE `title` = '{$title}'");
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getById($id)
    {
        $db = $GLOBALS['db'];
        return $db->getOne("SELECT * FROM `articles` WHERE `id` = '{$id}'");
    }

    /**
     * @param Author $author
     * @return String json
     */
    public static function getByAuthor(Author $author)
    {
        // todo: your code here
    }

    /**
     * @return String json
     */
    public static function getByDate()
    {
        // todo: your code here
    }

    public static function getCount()
    {
        $db = $GLOBALS['db'];
        return intval($db->getOne('SELECT COUNT(*) FROM `articles`'));
    }

}