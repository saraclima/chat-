<?php
namespace Chat\Model;


/**
 * Message Class
 *
 * @author saraclima
 */
class Message extends AbstractModel implements ModelInterface
{
    /**
     *
     * @var int 
     */
    private $id;

    /**
     *
     * @var string 
     */
    private $content;
    
    /**
     *
     * @var User 
     */
    private $sender;
    
    /**
     *
     * @var User 
     */
    private $receiver;
    
    /**
     * 
     * @return type
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 
     * @return  string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * 
     * @param   string $content
     * @return  $this
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * 
     * @return User
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set sender
     * 
     * @return $this
     */
    public function setSender($sender)
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * Get receiver
     * 
     * @return User
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * Sets the receiver
     * 
     * @return $this
     */
    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;
        return $this;
    }

    public function __toString()
    {
        return $this->getContent();
    }

}