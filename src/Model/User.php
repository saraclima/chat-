<?php
namespace Chat\Model;


/**
 *  User class
 *
 * @author saraclima
 */
class User extends AbstractModel implements ModelInterface
{
    /**
     *
     * @var type 
     */
    private $id;
    
    /**
     *
     * @var string 
     */
    protected $name;
    
    /**
     *
     * @var string 
     */
    protected $login;
    
    /**
     *
     * @var string 
     */
    protected $password;

    /**
     * Gets the id
     * 
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * 
     * @return type
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * 
     * @return type
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * 
     * @return type
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * 
     * @param type $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * 
     * @param type $login
     * @return $this
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    /**
     * 
     * @param type $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function __toString()
    {
       return $this->getName();
    }
}