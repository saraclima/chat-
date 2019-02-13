<?php
/**
 * Created by PhpStorm.
 * User: sara
 * Date: 12/02/19
 * Time: 11:55
 */

namespace Chat\Router;

use Chat\Exception\ExceptionUrl;

/**
 * Router Class
 * @author saraclima
 */
class Router
{
    /**
     * @var type
     **/
    private $url;

    /**
     *
     * @var array
     */
    private $routes = array();

    /**
     * The constructor
     *
     * @param type $url
     */
    function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @param type $path
     * @param type $callable
     */
    public function get($path, $callable)
    {
        return $this->add($path, $callable, 'GET');
    }

    /**
     * Manage post url
     *
     * @param type $path
     * @param type $callable
     */
    public function post($path, $callable)
    {
        return $this->add($path, $callable, 'POST');
    }

    /**
     *
     * @param type $path
     * @param type $callable
     * @param type $method
     *
     * @return \Chat\Router\Route
     */
    private function add($path, $callable, $method)
    {
        $route = new Route($path, $callable);
        //add new route
        $this->routes[$method][] = $route;

        return $route;
    }


    public function run()
    {
        //Check if the routes array contains the current method
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            throw new ExceptionUrl("Cette méthode n'existe pas");
        }
        //print_r($this->routes) ;

        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            $url = str_replace("index.php", "", $this->url);
            if ($_SERVER['REQUEST_METHOD'] == "POST"){
                $url.="/".$this->postSubUrl();
            }
            //if the route match
            if($route->match($url)){
                //execute the request
                return $route->call();
            }
        }

        throw new ExceptionUrl("cet url n'existe pas");
    }

    /**
     * EDIT POST VALUE
     */
    private function postSubUrl()
    {
        return implode("/", $_POST);
    }
}