<?php
use MVC\Models\TrangChu;

require 'vendor/autoload.php';


$uri = $_SERVER['REQUEST_URI'];

// $home = new TrangChu();

$router = require 'src/routes.php';
$router->dispatch($uri);