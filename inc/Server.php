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
     * Retornando carro através do id
     */
    static function findById($id) 
    {
        $data = self::parseDatabase();

        foreach($data['cars'] as $car)
            if ($car['id'] == $id)
                return json_encode($car);

        return false;
    }
    
    /**
     * Adicionando dados da API
     */
    static function create($body) 
    {         
        $jsonBody = json_decode($body, true);
        $jsonBody['id'] = time();

        $json = json_decode(file_get_contents('db.json'), true); 
        $json['cars'][] = $jsonBody;
        
        file_put_contents('db.json', json_encode($json));
        return json_encode($jsonBody);
    }

    static function update($id, $body) 
    {
        $data = self::parseDatabase();

        foreach($data['cars'] as $k => $car)
            
            if ($car['id'] == $id) {
                
                $jsonBody = json_decode($body, true);
                $jsonBody['id'] = time();

                $json = json_decode(file_get_contents('db.json'), true); 
                $json['cars'][$k] = $jsonBody;
            
                file_put_contents('db.json', json_encode($json));
                return json_encode($jsonBody);
            }
    }
}
