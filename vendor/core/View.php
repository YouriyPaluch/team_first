<?php


class View
{
    protected $_page;
    protected $_template = 'default';

    public function __construct($page, $template = null)
    {
        $this->_page = $page;
        if ($template) {
            $this->_template = $template;
        }
    }

    public function render(array $data = [])
    {
        extract($data);
        include_once 'vendor' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $this->_template . '.php';
    }
}