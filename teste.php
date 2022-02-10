<?php
require __DIR__ . "/vendor/autoload.php";

use Source\Models\User;
use Source\Models\Post;

$url = URL_BASE;
session_start();
// $postBD = new Post();
// $listPost = $postBD->find("id_userPost = :uid", "uid=12")->fetch(true);

// foreach($listPost as $post){
//     var_dump($post->userPost);
// }

$postBD = new Post();
$listPost = $postBD->find()->fetch(true);


/** @var $users User */
foreach ($listPost as $posts){
    var_dump($posts->id_userPost);
    echo "<br>";
    var_dump($posts->User_post());
    echo "<br>";
}
?>
