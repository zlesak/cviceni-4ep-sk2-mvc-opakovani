<?php

require_once "../../config.php";

class DB
{
    static private $spojeni = null;

    static public function pripojit()
    {
        if(self::$spojeni == null)
            $spojeni = mysqli_connect(dbhost, dbuser, dbpass, dbname);
        
        return $spojeni;
    }
}
