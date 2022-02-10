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

    public function createTable($offset, $size_page){
        $query = "SELECT * FROM `movies` LIMIT $offset, $size_page;";
        $result = $this->_db->query($query);
        if(!$result){
            die($this->_db->error);//TODO exeption
        }
        return $result->fetch_all(MYSQLI_ASSOC);
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

    public function fromPagination(){

    }

    /** add new news to DB
     * @param $newsItem
     */
    public function addMovie(array $movies){
        $uploadDir = 'photo';
        if(!is_dir($uploadDir)){
            mkdir($uploadDir);
        }
        $tmpName = $_FILES['photo']['tmp_name'];
        $uploadFile = $uploadDir.'/'.basename($_FILES['photo']['name']);
        move_uploaded_file($tmpName, $uploadFile);
        $movies['description'] = $this->_db->real_escape_string($movies['description']);
        $newKeys = array_keys($movies);
        $newKeysStr = join(', ', $newKeys);
        $movie = '\'' . join("', '" , $movies).'\', \'/'.$uploadFile.'\'';
        $query = "INSERT INTO `movies`(".$newKeysStr.", photo) values (".$movie.");";
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
        $query = "SELECT * FROM `movies` WHERE `movieId` = $id;";
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
        if(!empty($_FILES['photo']['tmp_name'])){
            $uploadDir = 'photo';
            if(!is_dir($uploadDir)){
                mkdir($uploadDir);
            }
            $tmpName = $_FILES['photo']['tmp_name'];
            $uploadFile = $uploadDir.'/'.basename($_FILES['photo']['name']);
            move_uploaded_file($tmpName, $uploadFile);
        }
        $id = $movies['movieId'];
        $name = $movies['name'];
        $description = $this->_db->real_escape_string($movies['description']);
        $releaseDate = $movies['releaseDate'];
        $query = "UPDATE `movies` SET `name` = '$name', `description` = '$description', `releaseDate` = '$releaseDate'".($uploadFile?", photo='/$uploadFile'":'')." WHERE `movieId` = $id;";
        if(!$this->_db->query($query)){
            die($this->_db->error);//TODO exeption
        }
    }

    /**
     * @param int $id
     */
    public function delMovie(int $id){
        $query = "DELETE FROM `movies` WHERE `movieId` = $id;";
        if(!$this->_db->query($query)){
            die($this->_db->error);//TODO exeption
        }
    }
}