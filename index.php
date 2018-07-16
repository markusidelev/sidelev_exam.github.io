<?php

include_once __DIR__ . '/core/DB.php';
include_once __DIR__ . '/core/Controller.php';
include_once __DIR__ . '/models/Author.php';
include_once __DIR__ . '/models/Article.php';


$config = include_once __DIR__ . '/config.php';

$db = new DB($config['db']);
$controller = new Controller();

// routes
if (!count($_GET) && !count($_REQUEST) && !count($_POST)) {
    $controller->actionIndex();
} else if (count($_POST)) {
    $controller->actionFiltration($_POST);
}