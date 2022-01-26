<?php
require __DIR__ . "/../../vendor/autoload.php";

$url = URL_BASE;
use Source\Models\Post;

session_start();

$imagem = $_FILES['fileImage'];
$descPost = $_POST['descPost'];

    if ($imagem) {

        $extensao = strtolower(substr($imagem['name'], -4)); //pega a extensao do arquivo
        $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
        $diretorio = "../Views/upload/"; //define o diretorio para onde enviaremos o arquivo

        move_uploaded_file($imagem['tmp_name'], $diretorio.$novo_nome); //efetua o upload

        $postBD = new Post;
        $postBD->imagePost = $novo_nome;
        $postBD->descPost = $_POST['descPost'];
        $postBD->userPost = $_SESSION['login'];
        $postBD->save();

        header("location: {$url}/home");
    }



