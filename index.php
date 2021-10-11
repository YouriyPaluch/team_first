<?php
include_once 'vendor'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'config.php';
include_once 'vendor'.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'Store.php';
$new = [
    'id'=>'4',
    'title'=>'Fourth new',
    'text'=>'Some text was update'
];

$news = new Store();
var_dump($news->getNews(2));
