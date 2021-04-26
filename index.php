<?php
echo "hello world";

include('Server.php');
header('Content-type: application/json');

echo Server::all();

