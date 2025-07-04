<?php

use Alura\Controller;
use Alura\Repository\DocumentRepository;

require_once '../vendor/autoload.php';

$db_path = __DIR__ . '/../banco.sqlite';
$pdo = new PDO("sqlite:$db_path");
//$server = 'SRV';
//$dbName = 'produtos';
//$uid = 'sa';
//$pwd = '##tronca!@34';
//$pdo = new PDO("sqlsrv:Server=$server; database = $dbName", $uid, $pwd);
$documentRepository = new DocumentRepository($pdo);

$routes = require_once __DIR__ . '/../config/routes.php';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

$key = "$httpMethod|$pathInfo";
session_start();
$isLoginPath = $pathInfo === '/login';

session_regenerate_id();
  if(!array_key_exists('logado',$_SESSION) && !$isLoginPath ){   
        
    header('Location: /login');
      return;
  
}

if(array_key_exists($key,$routes)){

  $handler = $routes[$key];

  if(is_array($handler)){
    [$controllerClass,$method] = $handler;
    $controller = new $controllerClass();
    $controller->$method();
    return;
  }

  $controller = new $handler($documentRepository);
  $controller->processaRequisicao();
  return;
}
http_response_code(404);


/** @var Controller $controller */
// $controller->processaRequisicao();

