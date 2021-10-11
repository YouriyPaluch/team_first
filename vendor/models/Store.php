<?php

class Store
{
    /**
     * @var mysqli
     */
    protected $_db;

    /**
     * construct and access from DB
     */
    public function __construct()
    {
        $this->_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if($this->_db->connect_errno !=0){
            die($this->_db->connect_error);//TODO exeption
        }
    }

    /**
     * @return mixed|void
     */
    public function allNews(){
        $query = "SELECT * FROM news;";
        $result = $this->_db->query($query);
        if(!$result){
            die($this->_db->error);//TODO exeption
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /** add new news to DB
     * @param $newsItem
     */
    public function addNews(array $newsItem){
        if (!$newsItem['updatedate']){
            unset($newsItem['updatedate']);
        }
        $newsItem['$text'] = $this->_db->real_escape_string($newsItem['$text']);
        $newKeys = array_keys($newsItem);
        $newKeysStr = join(', ', $newKeys);
        $new = join("', '" , $newsItem);
        $query = "INSERT INTO news($newKeysStr) values ('$new');";
        if(!$this->_db->query($query)){
            die($this->_db->error);//TODO exeption
        }
    }

    /**
     * select news by ID
     * @param int $id
     * @return mixed|void
     */
    public function getNews(int $id){
        $query = "SELECT * FROM news WHERE id = $id;";
        $result = $this->_db->query($query);
        if(!$this->_db->query($query)){
            die($this->_db->error);//TODO exeption
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function saveNews(array $newsItem){
        $id = $newsItem['id'];
        $title = $newsItem['title'];
        $text = $this->_db->real_escape_string($newsItem['text']);
        $updateDate = date("Y-m-d H:i:s");
        $query = "UPDATE news SET title = '$title', text = '$text', updatedate = '$updateDate' WHERE id = $id;";
        if(!$this->_db->query($query)){
            die($this->_db->error);//TODO exeption
        }
    }
}