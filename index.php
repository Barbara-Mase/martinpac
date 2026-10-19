<?php


require "vendor/autoload.php";

session_start();


//if (empty($_SESSION['csrf_token'])) {
//    $tokenManager = new CSRFTokenManager();
//    $_SESSION['csrf_token'] = $tokenManager->generateCSRFToken();
//}

$router = new Router();
$router->handleRequest($_GET);