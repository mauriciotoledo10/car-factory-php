<?php
include('inc/Route.php');
include('inc/Server.php');

header('Content-type: application/json');

// rota principal
Route::add('/', function() {
    echo json_encode(['msg' => 'hello world']);
});

Route::add('/cars/([0-9]*)', function($id) {
    try {
        echo Server::findById($id);
    } catch (\Exception $e) {
        echo $e->getMessage();	
    }
}, 'get');

Route::add('/cars', function() {
    try {
        $body = file_get_contents('php://input');
        echo Server::create($body);
    } catch (\Exception $e) {
        echo $e->getMessage();	
    }
}, 'post');

Route::run('/');
