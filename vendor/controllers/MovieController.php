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
        $size_page = 1;
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
    public function create()
    {
        $view = new View('movie_create');
        $view->render();
    }

    /**
     * make mass  news and save in DB
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


    public function watch(){
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
        $movie['id'] = $_REQUEST['id'];
        $movie['title'] = $_REQUEST['title'];
        $movie['text'] = $_REQUEST['text'];
        $store = new Store();
        $store->saveMovie($movie);
        Route::redirect('/movie/index');
    }

    /**
     * delete news
     */
    public function delete()
    {
        $id = $_REQUEST['id'];
        $store = new Store();
        $store->delMovie($id);
        Route::redirect('/movie/index');
    }
}