<?php
require __DIR__ . "/../../vendor/autoload.php";

session_start();

$url = URL_BASE;
use Source\Models\Post;
use Source\Models\User;

// Pega o usuario que esta logado no momento
$modelUser = new User();
$userBD = $modelUser->find("login = :loginBD", "loginBD={$_SESSION['login']}")->fetch();

// Verifica se o arquivo file esta vindo da Home.php
// Ou...
if(isset($_FILES['fileImage'])){
    $imagemPost = $_FILES['fileImage'];
    $descPost = $_POST['descPost'];

    $extensao = strtolower(substr($imagemPost['name'], -4)); //pega a extensao do arquivo
    $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
    $diretorio = "../Views/upload/post/"; //define o diretorio para onde enviaremos o arquivo

    move_uploaded_file($imagemPost['tmp_name'], $diretorio.$novo_nome); //efetua o upload

    $postBD = new Post;
    $postBD->imagePost = $novo_nome;
    $postBD->descPost = $_POST['descPost'];
    $postBD->id_userPost = $userBD->id;
    $postBD->save();

    header("location: {$url}/home");
}

// Verifica se o arquivo file esta vindo da Profile.php
if(isset($_FILES['inputImage'])){
    if (isset($userBD->image)){
        // Deleta o FileImage
        unlink(__DIR__ . "/../Views/upload/profile/$userBD->image");
    }
    $imageProfile = $_FILES['inputImage'];

    $extensao = strtolower(substr($imageProfile['name'], -4));
    $novo_nome = md5(time()) . $extensao;
    $diretorio = "../Views/upload/profile/";

    move_uploaded_file($imageProfile['tmp_name'], $diretorio.$novo_nome);

    $userBD->image = $novo_nome;
    $userBD->save();

    header("location: {$url}/profile");

}

// Verificação de erro
if((isset($_FILES['fileImage']) == true) and  (isset($_FILES['inputImage']) == true )){
    echo "<h1>erro: Deu tudo errado</h1>";
}
   


