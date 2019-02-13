<?php

namespace Chat\Model;

/**
 *
 * @author saraclima
 */
interface ModelInterface
{
    /**
     * Return the entity table name
     * 
     * @return string 
     */
    public function getTableName();
}
