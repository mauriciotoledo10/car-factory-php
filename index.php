<?php
include('inc/Route.php');
header('Content-type: application/json');

Route::add('/', function() {
    echo json_encode(['msg' => 'hello world']);
});

Route::run('/');
