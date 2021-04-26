<?php
include('inc/Route.php');

Route::add('/', function() {
    echo 'hello world';
});

Route::run('/');
