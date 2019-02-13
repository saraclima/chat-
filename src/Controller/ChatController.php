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
class ChatController extends AbstractController
{
    /**
     * 
     * @return type
     */
    public function __construct()
    {
        if(!$user = $this->getCurrentUser()){
            echo $this->connexionAction();
            die() ;
        }
    }


    /**
     * Basic index
     */
    public function indexAction()
    {
        $users  = UserRepository::getInstance()->findAll();
        
        echo $this->render('index.twig', ['users' => $users]);
    }
    
    /**
     * Basic index
     */
    public function senderAction($receiver)
    {
        $users  = UserRepository::getInstance()->findAll();
        $messages = MessageRepository::getInstance()->findItemOf($this->getCurrentUser(), $receiver);
        
        echo $this->render('index.twig', array(
            'users' => $users,
            'receiver' => $receiver,
            'sender'=> $this->getCurrentUser(),
            'messages' => $messages,
        ));
    }
    
    /**
     * Basic index
     */
    public function messageAction($receiver,$messageId)
    {
        $users  = UserRepository::getInstance()->findAll();
        $messages = MessageRepository::getInstance()->findItemOf($this->getCurrentUser(), $receiver);
        $message = MessageRepository::getInstance()->findByID($messageId);
        
        echo $this->render('index.twig', array(
            'users' => $users,
            'messages' => $messages,
            'message'=> $message)
        );
    }
    
    /**
     * 
     * @param integer   $sender
     * @param integer   $receiver
     * @param string    $content
     */
    public function sendAction($sender, $receiver, $content)
    {
        
        $message = new Message();
        $message->setContent($content)
            ->setSender($sender)
            ->setReceiver($receiver);
        MessageRepository::getInstance()->save($message);
        
        $users  = UserRepository::getInstance()->findAll();
        $messages = MessageRepository::getInstance()->findItemOf($this->getCurrentUser(), $receiver);
        
        echo $this->render('index.twig', array(
            'users' => $users,
            'messages' => $messages,
            'message'=> $message)
        );
    }
    
    
    
    /**
     * Login action
     */
    public function connexionAction()
    {
        return $this->render('login.twig');
    }
}
