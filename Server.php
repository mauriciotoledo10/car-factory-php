<?php

class Server {

    static function parseDatabase() 
    {
        $db = file_get_contents('db.json');
        return json_decode($db, true);
    }
}