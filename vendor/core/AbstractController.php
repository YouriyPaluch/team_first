<?php


namespace core;
use models\Store;



abstract class AbstractController
{
    protected $view ;
    protected $store;

    public function __construct($store)
    {
        $this->store = new Store();
    }
    abstract public function news_index();
}