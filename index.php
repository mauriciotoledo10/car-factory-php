<?php
include('inc/Route.php');
include('inc/Server.php');

header('Content-type: application/json');

// rota principal
Route::add('/', function() {
    echo json_encode(['msg' => 'hello world']);
});

// obtendo todos os carros
Route::add('/cars', function() {
    try {
        echo Server::all();
    } catch (\Exception $e) {
        echo $e->getMessage();	
    }
}, 'get');

// obtendo carro por id
Route::add('/cars/([0-9]*)', function($id) {
    try {
        echo Server::findById($id);
    } catch (\Exception $e) {
        echo $e->getMessage();	
    }
}, 'get');

// adicionando um carro na base de dados
Route::add('/cars', function() {
    try {
        $body = file_get_contents('php://input');
        echo Server::create($body);
    } catch (\Exception $e) {
        echo $e->getMessage();	
    }
}, 'post');

// atualizando um carro na base de dados
Route::add('/cars/([0-9]*)', function($id) {
    try {
        $body = file_get_contents('php://input');
        echo Server::update($id, $body);
    } catch (\Exception $e) {
        echo $e->getMessage();	
    }
}, 'put');

// atualizando um carro na base de dados
Route::add('/cars/([0-9]*)', function($id) {
    try {
        echo Server::destroy($id);
    } catch (\Exception $e) {
        echo $e->getMessage();	
    }
}, 'delete');

// trazendo as marcas
Route::add('/brands', function() {
    try {
        echo Server::brands();
    } catch (\Exception $e) {
        echo $e->getMessage();	
    }
}, 'get');


Route::run('/');
