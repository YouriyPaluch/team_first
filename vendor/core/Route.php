<?php


class Route
{
        static public function init(){
            $controllerName = 'IndexController';
            $actionName = 'news_index';
            $url = $_SERVER['REDIRECT_URL']??'';
            $url = ltrim($url, '/');
            $urlComponents = explode('/', $url);
            if(count($urlComponents)>2){
                exit('no page');//TODO
            }
            if(!empty($urlComponents[0])){
                $controllerName = strtolower($urlComponents[0]);
            }
            if(!empty($urlComponents[1])){
                $actionName = strtolower($urlComponents[1]);
            }
            $controllerClass = 'vendor\\controllers\\'.ucfirst($controllerName);
            if(!class_exists($controllerClass)){
                exit('no class');//TODO
            }
            $controller = new $controllerClass();
            if(!method_exists($controller, $actionName)){
                exit('no method');//TODO
            }
            $controller->$actionName();
        }

    //=======================================================
    static public function error404(){
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
        include('vendor/views/error404.php');
        die();
        //http_response_code(404);
    }
}