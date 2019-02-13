<?php

namespace Chat\Router;
/**
 * Route Class
 * @author saraclima
 */
class Route
{

    /**
     * The path
     *
     * @var string
     */
    private $path;

    /**
     * Execution callable
     *
     * @var type
     */
    private $callable;

    /**
     *
     * @var array
     */
    private $matches = array();

    /**
     * The constructor.
     *
     * @param type $path
     * @param type $callable
     */
    function __construct($path, $callable)
    {
        $this->path = trim($path, "/");
        $this->callable = $callable;
    }

    /**
     * Chech if an url match with the current route
     *
     * @param type $url
     */
    public function match($url)
    {
        $url = trim($url, '/');
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $regex = "#^$path$#i";
        if(!preg_match($regex, $url, $matches)){
            return false;
        }
        //print_r($matches,true);

        array_shift($matches);
        $this->matches = $matches;
        return true;
    }
    /**
     * Call the request action
     *
     * @return
     */
    public function call()
    {
        if(is_string($this->callable)){
            $params = explode('#', $this->callable);
            $controller = "Chat\\Controller\\" . ucfirst($params[0]) . "Controller";
            $controller = new $controller();
            $action = $params[1].'Action';
            return call_user_func_array([$controller, $action], $this->matches);
        } else {
            return call_user_func_array($this->callable, $this->matches);
        }

    }
}