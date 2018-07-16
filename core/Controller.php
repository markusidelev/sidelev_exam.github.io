<?php

include_once __DIR__ . '/DB.php';
include_once __DIR__ . '/../models/Article.php';
include_once __DIR__ . '/../models/Author.php';

class Controller
{
    private $db;

    function __construct()
    {
        $this->db = isset($GLOBALS['db'])
            ? $GLOBALS['db']
            : new DB(include __DIR__ . '/../config.php');
    }

    public function actionIndex()
    {
        $data = Article::getAll();
        require __DIR__ . '/../view/index.view.php';
    }

    /**
     * @param Array $request
     */
    public function actionFiltration($request)
    {
        $data = [];

        // todo: получение списка всех авторов

        if (isset($request['year'])) {
            // todo: получение всех месяцев выбранного года, для которых есть статьи
        }

        // Фильтрация

        if (isset($request['year'])) {
            // todo: Добавление фильтра по выбранному году

            if (isset($request['month'])) {
                // todo: Добавление фильтра по месяцу
            }
        }

        if (isset($request['author'])) {
            // todo: Добавление фильтра по выбранному автору
        }

        // todo: Подсчет количества страниц, для создания пагинации

        if (isset($request['page_number'])) {
            // todo: Добавление фильтра по номеру страницы
        }

        // todo: Выборка всех статей по набранным фильтрам

        echo json_encode($data);
    }
}