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
        $view = new View('movies_index');
        $view->render(['movies' => $movies]);
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
        $moviesNew['title'] = $_REQUEST['title'];
        $moviesNew['text'] = $_REQUEST['text'];
        $moviesNew['author'] = $_REQUEST['author'];
        $store = new Store();
        $store->addMovie($moviesNew);
        Route::redirect('/Movie/index');
    }

    /**
     * chose page for edit news
     */
    public function edit()
    {
        $store = new Store();
        $id = $_REQUEST['id'];
        $movie = $store->getMovie($id);
        $view = new View('movie_edit');
        $view->render(['movie'=>$movie]);
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
        Route::redirect('/Movie/index');
    }

    /**
     * delete news
     */
    public function delete()
    {
        $id = $_REQUEST['id'];
        $store = new Store();
        $store->delMovie($id);
        Route::redirect('/Movie/index');
    }
}