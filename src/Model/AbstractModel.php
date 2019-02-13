<?php
namespace Chat\Model;

/**
 * AbstractModel
 *
 * @author saraclima
 */
abstract class AbstractModel implements ModelInterface
{
    /**
     * Return the entity table name
     * 
     * @return string 
     */
    public function getTableName()
    {
        $className  = get_class($this);
        
        return strtolower($className);
    }
}