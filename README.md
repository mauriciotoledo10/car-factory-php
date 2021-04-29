# Car Factory PHP

Sistema simples para cadastrar/editar/remover dados com Docker, PHP e Ajax.

## Configuração

Apenas tenha o docker configurado e rode o seguinte comando: docker-compose up --build


## Acesso

Acesse o seu ambiente com o ip local ou externo, exemplo: http://localhost:9000/frontend e seja feliz ao usar!

## Uso da API e endpoints
 - `/cars` - [GET] deve retornar todos os carros cadastrados.
 - `/cars` - [POST] deve cadastrar um novo carro.
 - `/cars/{id}`[GET] deve retornar o carro com ID especificado.
 - `/cars/{id}`[PUT] deve atualizar os dados do carro com ID especificado.
 - `/cars/{id}`[DELETE] deve apagar o carro com ID especificado.
