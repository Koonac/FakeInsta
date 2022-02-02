<?php
require __DIR__ . "/vendor/autoload.php";

use Source\Models\User;
use Source\Models\Post;

// $postBD = new Post();
// $listPost = $postBD->find("id_userPost = :uid", "uid=12")->fetch(true);

// foreach($listPost as $post){
//     var_dump($post->userPost);
// }

$userBD = new User();
$listUser = $userBD->find()->fetch(true);



/** @var $users User */
foreach ($listUser as $users){
    var_dump($users->login);
    echo "<br>";
    var_dump($users->posts());
}

