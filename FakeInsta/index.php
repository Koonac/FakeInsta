<?php
require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;


//URL do Local do projeto
$router = new Router(URL_BASE);

//Ele diz onde esta o namespace ou o diretorio do controlador
$router->namespace("Source\Controllers");


//Rota definida como "/", sera automaticamente direcionado para WEB:login
$router->group(null);
$router->get("/", "Web:loginView");
$router->post("/", "Web:login");

$router->group("home");
$router->get("/", "Web:home");
$router->post("/", "Web:homePost");


// ===========================
//      Grupo de testes
// ===========================
$router->group("test");
$router->get("/", "Web:test");

//Rota Register
$router->group("register");
$router->get("/", "Web:register");
$router->post("/", "Web:registerSender");

$router->group("sair");
$router->get("/", "Web:sair");

//Criado um grupo de erro chamado "ooops"
//pegando o codigo de erro com o GET e envidano para "WEB:error"
$router->group("ooops");
$router->get("/{errcode}", "Web:error");

$router->dispatch();

if($router->error()){
    $router->redirect("/ooops/{$router->error()}");
};