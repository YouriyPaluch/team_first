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
     * select all movies
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

    /** add new movie to DB
     * @param $movies
     */
    public function addMovie(array $movies){
        if(!is_dir(UPLOAD_DIR)){
            mkdir(UPLOAD_DIR);
        }
        $uploadFile = $this->saveImage();
        $movies['description'] = $this->_db->real_escape_string($movies['description']);
        $moviesKeys = array_keys($movies);
        $moviesKeysStr = join(', ', $moviesKeys);
        $movie = '\'' . join("', '" , $movies).'\', \'/'.$uploadFile.'\'';
        $query = "INSERT INTO `movies`(".$moviesKeysStr.", image) values (".$movie.");";
        if(!$this->_db->query($query)){
            die($this->_db->error);//TODO exeption
        }
    }

    /**
     * select movie by ID
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
     * save edit movie by ID
     * @param array $movies
     */
    public function saveMovie(array $movies){
        $id = $movies['movieId'];
        if(!empty($_FILES['image']['tmp_name'])){
            $uploadFile = $this->saveImage();
            unlink(substr($this->getMovie($id)['image'],1));
        }
        $name = $movies['name'];
        $description = $this->_db->real_escape_string($movies['description']);
        $releaseDate = $movies['releaseDate'];
        $query = "UPDATE `movies` SET `name` = '$name', `description` = '$description', `releaseDate` = '$releaseDate'".(isset($uploadFile)?", image='/$uploadFile'":'')." WHERE `movieId` = $id;";
        if(!$this->_db->query($query)){
            die($this->_db->error);//TODO exeption
        }
    }

    /**
     * save image into image dir
     * @return string
     */
    protected function saveImage(){
        if(!is_dir(UPLOAD_DIR)){
            mkdir(UPLOAD_DIR);
        }
        $tmpName = $_FILES['image']['tmp_name'];
        $uploadFile = UPLOAD_DIR.'/'.md5(time().$_FILES['image']['name']).str_replace('image/','.' ,$_FILES['image']['type']);
        move_uploaded_file($tmpName, $uploadFile);
        return $uploadFile;
    }

    /**
     * @param int $id
     */
    public function delMovie(int $id){
        unlink(substr($this->getMovie($id)['image'],1));
        $query = "DELETE FROM `movies` WHERE `movieId` = $id;";
        if(!$this->_db->query($query)){
            die($this->_db->error);//TODO exeption
        }
    }
}