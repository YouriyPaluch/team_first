<?php
namespace models;

use mysqli;
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

    public function createTable(){

    }

    /**
     * select all news
     * @return mixed|void
     */
    public function allMovies(){
        $query = "SELECT * FROM `movies`;";
        $result = $this->_db->query($query);
        if(!$result){
            die($this->_db->error);//TODO exeption
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /** add new news to DB
     * @param $newsItem
     */
    public function addMovie(array $movies){
        if (!$movies['updatedate']){
            unset($movies['updatedate']);
        }
        $movies['text'] = $this->_db->real_escape_string($movies['text']);
        $movies['createdate'] = date("Y-m-d H:i:s");
        $newKeys = array_keys($movies);
        $newKeysStr = join(', ', $newKeys);
        $movie = join("', '" , $movies);
        $query = "INSERT INTO `movies`($newKeysStr) values ('$movie');";
        if(!$this->_db->query($query)){
            die($this->_db->error);//TODO exeption
        }
    }

    /**
     * select news by ID
     * @param int $id
     * @return mixed|void
     */
    public function getMovie(int $id){
        $query = "SELECT * FROM `movies` WHERE id = $id;";
        $result = $this->_db->query($query);
        if(!$this->_db->query($query)){
            die($this->_db->error);//TODO exeption
        }
        return mysqli_fetch_assoc($result);
    }

    /**
     * save edit news by id
     * @param array $movies
     */
    public function saveMovie(array $movies){
        $id = $movies['id'];
        $title = $movies['title'];
        $text = $this->_db->real_escape_string($movies['text']);
        $updateDate = date("Y-m-d H:i:s");
        $query = "UPDATE `movies` SET `title` = '$title', `text` = '$text', `updatedate` = '$updateDate' WHERE `id` = $id;";
        if(!$this->_db->query($query)){
            die($this->_db->error);//TODO exeption
        }
    }

    /**
     * @param int $id
     */
    public function delMovie(int $id){
        $query = "DELETE FROM `movies` WHERE `id` = $id;";
        if(!$this->_db->query($query)){
            die($this->_db->error);//TODO exeption
        }
    }
}