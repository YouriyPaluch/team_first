<?php


namespace core;

use core\View;
use models\Store;

abstract class AbstractController
{
    protected $view;
    protected $store;

    public function __construct()
    {
        $this->view = new View();
        $this->store = new Store();
    }
    abstract public function news_index();
}