<?php
include_once 'vendor'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'config.php';
include_once 'vendor'.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'Store.php';
$new = [
    'id'=>4,
    'title'=>'Fourth news',
    'text'=>'Some text was update'
];

$news = new Store();
$news->saveNews($new);
var_dump($news->allNews());
