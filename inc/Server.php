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
    
    /**
     * Adicionando dados da API
     */
    static function add($body) 
    {         
        $jsonBody = json_decode($body, true);
        $jsonBody['id'] = time();

        $json = json_decode(file_get_contents('db.json'), true); 
        $json['cars'][] = $jsonBody;
        
        file_put_contents('db.json', json_encode($json));
        return json_encode($jsonBody);
    }
}
