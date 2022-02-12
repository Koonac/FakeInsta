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


?>
<script>
    const fakeinsta = {
        inscrever: function(){console.log("Voce se inscreveu")},
        postar: function(post){console.log(post + "Voce fez um post")}
    }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button onclick="fakeinsta.inscrever()">Inscrever</button>
    <button onclick="fakeinsta.postar('merda')">Postar</button>

</body>
</html>