<?php
include('inc/Route.php');
include('inc/Server.php');

header('Content-type: application/json');

// rota principal
Route::add('/', function() {
    echo json_encode(['msg' => 'hello world']);
});

Route::add('/car/add', function() {
    // parseando o corpo
    $body = file_get_contents('php://input');
    echo Server::add($body);
}, 'post');

Route::run('/');
