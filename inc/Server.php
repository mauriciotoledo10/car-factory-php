<?php

class Server {

    /**
     * Recebendo e "parseando" em json|array os dados do arquivo db.json
     *
     * @return void
     */
    static function parseDatabase() 
    {
        $db = file_get_contents('db.json');
        return json_decode($db, true);
    }

    /**
     * Retornando todos os dados do arquivo db.json sem filtros
     */
    static function all() 
    {
        return json_encode(self::parseDatabase());
    }
}