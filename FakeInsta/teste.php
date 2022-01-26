<?php
require __DIR__ . "/vendor/autoload.php";

// use CoffeeCode\DataLayer\Connect;

// $conn = Connect::getInstance();
// $error = Connect::getError();

// if($error){
//     echo "<h1>{$error->getMessage()}</h1>";
//     die();
// }

// $query = $conn->query("SELECT * FROM user");
// var_dump($query->fetchAll());

use Source\Models\User;

$user = new User();
$list = $user->find()->fetch(true);

var_dump($list);
