<?php


namespace controllers;

use core\AbstractController;
use core\Route;
use core\View;
use models\Store;

class MovieController extends AbstractController
{
    /**
     * chose page index and take array from DB
     */
    public function index()
    {
        $store = new Store();
        $movies = $store->allMovies();
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $size_page = MOVIES_IN_PAGE;
        $offset = ($page - 1) * $size_page;
        $result = count($movies);
        $total_pages = ceil($result / $size_page);
        $res_data = $store->fromPagination($offset, $size_page);
        $firstNumber = ($page * $size_page) - ($size_page - 1);
        $view = new View('movies_index');
        $view->render(['movies' => $res_data, 'page' => $page, 'total_pages' => $total_pages, 'firstNumber' => $firstNumber]);
    }

    /**
     * chose page for create movie
     */
    public function create($movie = '', $errors = '')
    {
        $view = new View('movie_create');
        $view->render(['movie' => $movie, 'errors' => $errors]);
    }

    /**
     * validate data
     * @param array $movie
     * @param bool $image
     * @return array
     */
    public function validate(array $movie, $image=true)
    {
        $errors = [];
        if ($movie['name'] == '' || strlen($movie['name']) > 150) {
            $errors['name'] = 'Name cannot be empty or more than 150 characters';
        }
        if (strlen($movie['description']) > 10000) {
            $errors['description'] = 'Description cannot be more than 10000 characters';
        }
        if ($movie['releaseDate'] == '' || strlen($movie['releaseDate']) != 10 || !preg_match('/^([0-2][0-9])|([3][0-1])[.]([0][0-9])|([1][0-2])[.][1-2][0-9][0-9][0-9]$/', $movie['releaseDate'])) {
            $errors['releaseDate'] = 'Release date must be in format DD.MM.YYYY';
        }
        if (!in_array($_FILES['image']['type'], ['image/jpeg', 'image/png', 'image/jpg']) && $image) {
            $errors['image'] = 'Photo can be format *.jpeg or *.png';
        }
        return $errors;
    }


    /**
     * make movie and save in DB
     */
    public function store()
    {
        $movie = [];
        $movie['name'] = $_REQUEST['name'];
        $movie['description'] = $_REQUEST['description'];
        $movie['description'] = $_REQUEST['description'];
        $movie['releaseDate'] = $_REQUEST['releaseDate'];
        $errors = $this->validate($movie);
        if (count($errors) > 0) {
            $view = new View('movie_create');
            $view->render(['movie' => $movie, 'errors' => $errors]);
        } else {
            $store = new Store();
            $store->addMovie($movie);
            Route::redirect('/movie/index');
        }
        if($movie['releaseDate'] == '' ){
            $errors['releaseDate'] = 'Release date cannot be empty or more than 1000 characters';
        }
    }

    /**
     * chose page for edit movie
     */
    public function edit()
    {
        $store = new Store();
        $movieId = (int)$_REQUEST['movieId'];
        $movie = $store->getMovie($movieId);
        $view = new View('movie_edit');
        $view->render(['movie' => $movie]);
    }

    /**
     * show more information about movie
     */
    public function show()
    {
        $store = new Store();
        $movieId = (int)$_REQUEST['movieId'];
        $movie = $store->getMovie($movieId);
        $view = new View('movie_view');
        $view->render(['movie' => $movie]);
    }

    /**
     * make mass changes movie and save in DB
     */
    public function update()
    {
        $movie = [];
        $movie['movieId'] = $_REQUEST['movieId'];
        $movie['name'] = $_REQUEST['name'];
        $movie['description'] = $_REQUEST['description'];
        $movie['releaseDate'] = $_REQUEST['releaseDate'];
        $movie['image'] = $_REQUEST['imageIfError'];
        $image=$_FILES['image']['tmp_name'];
        $errors = $this->validate($movie, $image);
        if (count($errors) > 0) {
            $view = new View('movie_edit');
            $view->render(['movie' => $movie, 'errors' => $errors]);
        } else {
            $store = new Store();
            $store->saveMovie($movie);
            Route::redirect('/movie/index');
        }
    }

    /**
     * delete movie
     */
    public function delete()
    {
        $id = $_REQUEST['movieId'];
        $store = new Store();
        $store->delMovie($id);
        Route::redirect('/movie/index');
    }

}