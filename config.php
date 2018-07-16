<?php

/**
 * Пользовательские данные для работы с базой данных
 *
 * @param String host      название/ip хоста БД
 * @param String db_name  название базы данных
 * @param String user     username
 * @param String password
 * @param String items кол-во статей на странице
 */

return [
    'db' => [
        'host'     => 'localhost',
        'db_name'  => 'blog',
        'user'     => 'root',
        'password' => ''
    ],
    'pagination'       => [
        'items' => 10
    ]
];