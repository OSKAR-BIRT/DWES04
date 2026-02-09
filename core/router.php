<?php

namespace core;

class Router {
    protected $routes = array();
    protected $params = array();

    public function add($route, $params) {
        $this->routes[$route] = $params;
    }

    public function getRoutes() {
        return $this->routes;
    }

    public function match($url) {
        foreach($this->routes as $route=>$params) {
            if ($url['path'] == $route)  {
                if ($params['controller'] == $url['controller'] && $params['action'] == $url['action']) {
                    $this->params = $params;
                    return true;
                }
            }
        }
        return false;
    }

    public function matchRoutes($url) : bool {
        foreach($this->routes as $route=>$params) {
            $pattern = str_replace(['{id}', '/'], ['([0-9]+)', '\/'], $route);
            $pattern = '/^' . $pattern . '$/';

            if(preg_match($pattern, $url['path'])) {
                $this->params = $params;
                return true;
            }
        }
        $this->params['controller'] = "Home";
        $this->params['action'] = "error404";
        return false;
    }

    public function getParams() {
        return $this->params;
    }

    
}











?>