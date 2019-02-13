<?php

namespace Chat\Config;
/**
 * DataBaseConnection
 * @author saraclima
 */
class DataBaseConnection
{
    /**
     *
     * @var type
     */
    private static $_instance = null;

    /**
     *
     * @var \PDO
     */
    private static $connexion = null;

    /**
     * Return the class' instance
     */
    public static function getInstance()
    {
        //if not instance
        if(is_null(self::$_instance)) {
            self::$_instance = new DataBaseConnection();
        }

        return self::$_instance;
    }

    /**
     * The default constructor
     */
    private function __construct()
    {
        $host = '127.0.0.1';
        $db   = 'chat';
        $user = 'root';
        $pass = 'root';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try{
            self::$connexion = new \PDO($dsn, $user, $pass, $opt);

        } catch(\PDOException $err) {
            die($err->getMessage());
        }
    }

    /**
     * Gets current connexion
     *
     * @return \PDO
     */
    public static function getConnexion()
    {
        self::$_instance = self::getInstance();
        return self::$connexion;
    }
}