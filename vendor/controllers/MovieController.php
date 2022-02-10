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
        $size_page = 10;
        $offset = ($page - 1) * $size_page;
        $result = count($movies);
        $total_pages = ceil($result / $size_page);
        $res_data = $store->createTable($offset, $size_page);
        $firstNumber = ($page*$size_page)-($size_page-1);
        $view = new View('movies_index');
        $view->render(['movies' => $res_data, 'page' => $page, 'total_pages' => $total_pages, 'firstNumber'=>$firstNumber]);
    }

    /**
     * chose page for create news
     */
    public function create($movie='', $errors='')
    {
        $view = new View('movie_create');
        $view->render(['movie'=>$movie, 'errors'=>$errors]);
    }

    public function validate(array $movie){
        $errors = [];
        if($movie['name'] == '' || strlen($movie['name']) > 150){
            $errors['name'] = 'Name cannot be empty or more than 150 characters';
        }
        if($movie['description'] == '' || strlen($movie['description']) > 1000){
            $errors['description'] = 'Description cannot be empty or more than 1000 characters';
        }
    }


    /**
     * make mass news and save in DB
     */
    public function store()
    {
        $moviesNew = [];
        $moviesNew['name'] = $_REQUEST['name'];
        $moviesNew['description'] = $_REQUEST['description'];
        $moviesNew['releaseDate'] = $_REQUEST['releaseDate'];
        $store = new Store();
        $store->addMovie($moviesNew);
        Route::redirect('/movie/index');
    }

    /**
     * chose page for edit news
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
    public function show(){
        $store = new Store();
        $movieId = (int)$_REQUEST['movieId'];
        $movie = $store->getMovie($movieId);
        $view = new View('movie_view');
        $view->render(['movie' => $movie]);
    }

    /**
     * make mass changes news and save in DB
     */
    public function update()
    {
        $movie = [];
        $movie['movieId'] = $_REQUEST['movieId'];
        $movie['name'] = $_REQUEST['name'];
        $movie['description'] = $_REQUEST['description'];
        $movie['releaseDate'] = $_REQUEST['releaseDate'];
        $store = new Store();
        $store->saveMovie($movie);
        Route::redirect('/movie/index');
    }

    /**
     * delete news
     */
    public function delete()
    {
        $id = $_REQUEST['movieId'];
        $store = new Store();
        $store->delMovie($id);
        Route::redirect('/movie/index');
    }

}