<?php

namespace Chat\Controller;

/**
 * AbstractController
 *
 * @author saraclima
 */
abstract class AbstractController
{
    /**
     * rerurns the current user id
     * 
     * @return int
     */
    protected function getCurrentUser()
    {
        if(isset($_SESSION['userId']) && $_SESSION['userId']){
            return $_SESSION['userId'];
        }
        
        return null;
    }
    
    /**
     * 
     * @param type $page
     * @param type $variables
     */
    protected function render($page, $variables  = array())
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__.'/../../app/views/');       
        $twig = new \Twig_Environment($loader);       
        return $twig->render($page, $variables);
    }
}
