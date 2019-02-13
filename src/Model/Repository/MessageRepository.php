<?php

namespace Chat\Model\Repository;

use Chat\Config\DataBaseConnection;
use Chat\Handler\SqlHandler;
use Chat\Model\Message;

/**
 * MessageRepository
 *
 * @author saraclima
 */
class MessageRepository extends AbstractRepository implements RepositoryInterface
{
    /**
     *
     * @var MessageRepository 
     */
    private static $_instance = null ;
    
    /**
     * Return the class' instance
     */
    public static function getInstance()
    {
        //si pas d'instance
        if(is_null(self::$_instance)) {
          self::$_instance = new MessageRepository();  
        }

        return self::$_instance;
    }
    
    /**
     * The default constructor
     */
    private function __construct()
    {   
    }
    
    /**
     * @inheritence
     */
    public function getTableName()
    {
       return 'message'; 
    }

    /**
     * @inheritence
     */
    public function getClassName()
    {
        return Message::class; 
    }

    /**
     * return all elements
     * 
     * @return array
     */
    public function findAll()
    {
        return parent::findAll(self::getTableName());
    }
    
    /**
     * 
     * @param type $id
     * @param type $table
     */
    public function findById($id)
    {
        return parent::findById($id, self::getTableName());
    }
    
    /**
     * 
     * @param type $array
     * @param type $table
     * 
     * @return array
     */
    public function findBy($array)
    {
        return parent::findBy($array, self::getTableName());
    }
    
    /**
     * 
     * @param type $sender
     * @param type $receiver
     * @return type
     */
    public function findItemOf($sender, $receiver = null)
    {
        $query = "select * from message WHERE sender ='".
            $sender."'";
        if($receiver){
            $query.= " AND receiver='".$receiver."'";
        }
        
        $result = DataBaseConnection::getConnexion()->prepare($query);
        $result->execute();
        
        return $result->fetchAll(\PDO::FETCH_CLASS, $this->getClassName());
    }

    /**
     * 
     * @param Message $message
     */
    public function create($message)
    {
        $query = "INSERT INTO message (content, sender, receiver)
        VALUES ('".$message->getContent()."', '".$message->getSender()."',"
            . " '".$message->getReceiver()."')";
        
        DataBaseConnection::getConnexion()->exec($query);
        
    }

    /**
     * 
     * @param \Chat\Model\Message $message
     */
    public function update($message)
    {
        
    }

}