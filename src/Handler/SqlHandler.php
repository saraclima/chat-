<?php

namespace Chat\Handler;

class SqlHandler
{
    /**
     * change string to acceptable varchar for sql request
     *
     * @param string $string
     * @return string
     */
    public static function normaliseString($string)
    {
        //Ajout des slashes
        $varchar = addslashes($string);
        if(strlen($varchar) == 0){
            return null;
        }
        return $varchar;
    }

    /**
     * change acceptable varchar into simple string
     *
     * @param string $varchar
     *
     * @return string
     */
    public static function reverseString($varchar)
    {
        //suppression de slashes
        $string = stripslashes($varchar);
        if(strlen($string) == 0){
            return null;
        }

        return $string;
    }
}