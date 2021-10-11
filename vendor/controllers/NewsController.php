<?php


namespace controllers;
use models\Store;
use core\View;
use core\Route;

class NewsController
{
    /**
     * chose page index and take array from DB
     */
public function index(){
    $news = new Store();
    $newsAll = $news->allNews();
    $view = new View('index_index');
    $view-> render($newsAll);
}
public function create(){
    $view = new View('news_create');
    $view-> render();
}
public function store(){
    $newsNew = [];
    $newsNew = $_REQUEST['title'];
    $newsNew = $_REQUEST['text'];
    $newsNew = $_REQUEST['author'];
    $news = new Store();
    $newsAll = $news->allNews();
    $newsAll->addNews($newsNew);
    Route::redirect();
}
}