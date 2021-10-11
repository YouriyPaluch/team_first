<?php


namespace controllers;
use models\Store;
use core\View;

class NewsController
{
    /**
     * chose page index and take array from DB
     */
public function index(){
    $news = new Store();
    $newsIndex = $news->allNews();
    $view = new View('index_index');
    $view-> render($newsIndex);
}
public function create(){
    $view = new View('news_create');
    $view-> render();
}
public function store(){

}
}