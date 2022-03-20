<?php
    require __DIR__ . "/../../vendor/autoload.php";

    use Source\Models\Comments;
    use Source\Models\User;

    session_start();

    $comment = $_POST['comment'];
    $idPost = $_POST['id_post'];
    $idUser = (new User())->find("login= :ulogin", "ulogin={$_SESSION['login']}")->fetch();

    $modelComment = new Comments();
    $modelComment->id_user = $idUser->id;
    $modelComment->id_post = $idPost;
    $modelComment->comment = $comment;
    $modelComment->save();

    // $postComments = $modelComment->find("id_post= :uid", "uid={$idPost}")->fetch(true);
        echo "
            <div class='row mb-2'>
                <div class='col-1'>
            ";
            if($idUser->image == null){
                    echo "<i class='img far fa-user-circle '></i>";
                }else{
                    echo "<img class='img' src='Source/Views/upload/profile/{$idUser->image}'>";
                }
            echo "
                </div>
                <div class='col-2'>
                    <strong>{$idUser->login}</strong>
                </div>
                <div class='col-8 ms-2 fw-light'>
                    {$modelComment->comment}
                </div>
            </div>
        ";

    