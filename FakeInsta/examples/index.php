<?php
require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

//URL do Local do projeto
$router = new Router(URL_BASE);

//Para nao definir nenhum grupo na URL
$router->group(null);

//Obter um acesso atraves da url
$router->get("/", function ($data){
    echo "<h1>Olá, mundo </h1>";
    var_dump($data);
});

//criando o "/contato" e passando um texto
$router->get("/contato", function ($data){
    echo "<h1>Bem vindo aos contato meu caro</h1>";
    var_dump($data);
});

//criando um grupo "ooops"
//Tudo que vier do "ooops", sera passado como parametro para o 'errcode'
//que será setado na variavel $data, dps disso é só exibir
$router->group("ooops");
$router->get("/{errcode}", function ($data){
    echo "<h1>Erro {$data["errcode"]}</h1>";
    var_dump($data);
});


//para executar as rotas
$router->dispatch();

//Caso tenha algum erro, retornar esse erro
if ($router->error()) {
    $router->redirect("/ooops/{$router->error()}");
};