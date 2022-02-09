<?php


namespace controllers;
use core\AbstractController;
use core\View;

class IndexController extends AbstractController
{
    public function index()
    {
        $view = new View('index_index');
        $view->render();
    }
}