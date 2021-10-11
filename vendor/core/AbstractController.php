<?php


namespace core;
use models\Store;



abstract class AbstractController
{
    protected $view ;
    protected $store;

    public function __construct()
    {
        $this->store = new Store();
    }
    abstract public function index();
}