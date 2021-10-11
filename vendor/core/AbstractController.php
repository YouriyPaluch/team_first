<?php


namespace controllers;


abstract class AbstractController
{
    protected $view;
    protected $store;

    public function __construct($view,$store)
    {
        $this->view = $view;
        $this->store = $store;
    }
    abstract public function news_index();
}