<?php

namespace Chat\Controller;

use Chat\Model\Message;
use Chat\Model\Repository\MessageRepository;
use Chat\Model\Repository\UserRepository;
/**
 * ChatController
 *
 * @author saraclima
 */
class LoginController extends AbstractController
{
    /**
     * Basic index
     */
    public function loginAction($login,$password)
    {
        if($user  = UserRepository::getInstance()->checkAuthentication($login,$password)){
            session_start();
            var_dump("Ici mme ");
            $_SESSION['userId'] = $user;
            $controller  = new ChatController();
            $controller->indexAction();
            die();
        }
        
        echo $this->render('login.twig', array('message'  => "Authentication failed"));
    }
    
    
}
