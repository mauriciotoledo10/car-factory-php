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

        // percorrendo carros
        foreach($data['cars'] as $car)
            // validando se o carro foi encontrado
            if ($car['id'] == $id)
                return json_encode($car);

        return json_encode(['msg' => 'not found']);
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

    /**
     * Atualizando um carro existente na base de dados
     */
    static function update($id, $body) 
    {
        $data = self::parseDatabase();

        // percorrendo carros
        foreach($data['cars'] as $k => $car)
            
            // validando se o carro foi encontrado
            if ($car['id'] == $id) {
                
                $jsonBody = json_decode($body, true);
                $jsonBody['id'] = time();

                $json = json_decode(file_get_contents('db.json'), true); 
                $json['cars'][$k] = $jsonBody;
                
                // atualizando carro na base
                file_put_contents('db.json', json_encode($json));
                return json_encode($jsonBody);
            }

            return json_encode(['msg' => 'not found']);
    }

    /**
     * Deletando um carro da base de dados
     */
    static function destroy($id) 
    {
        $data = self::parseDatabase();

        // percorrendo carros
        foreach($data['cars'] as $k => $car)
            
            // validando se o carro foi encontrado
            if ($car['id'] == $id) {
                
                $json = json_decode(file_get_contents('db.json'), true); 
                unset($json['cars'][$k]);         
                
                // deletando carro da base
                file_put_contents('db.json', json_encode($json));
                return json_encode(['msg' => 'car deleted']);
            }

            return json_encode(['msg' => 'not found']);
    }
}
