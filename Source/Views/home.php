<?php 
session_start();

$logado = $_SESSION['login'];
$nomeUser = $_SESSION['nome'];

use Source\Models\Post;

$postBD = new Post;
$dataBD = $postBD->find()->order("id DESC")->fetch(true);
$count = $postBD->find()->count();

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <!-- Estilo .css -->
    <link rel="stylesheet" href="Source/Views/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Grand+Hotel&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/dd928c7064.js" crossorigin="anonymous"></script>

    <title>FakeInsta</title>
    
</head>

<body class="background-body">
    
    <!-- =========================== -->
                <!-- TOPO -->
    <!-- =========================== -->
    <?php require __DIR__ ."/top.php"; ?>

    <!-- =========================== -->
                <!-- Postar -->
    <!-- =========================== -->
    <div class="row">
        <div class="offset-3 col-4 postar border rounded mt-4">
            <form action="<?php echo $url ?>/Source/controllers/ImagemPost.php" method="post" enctype="multipart/form-data">
                <div class="input-group mt-2">
                    <textarea class="form-control" name="descPost" id="descPost" cols="10" rows="3" placeholder="Escreva alguma coisa..."></textarea>
                </div>
                <div class="input-group mt-2 mb-2">
                    <input class="form-control" type="file" name="fileImage" id="fileImage" accept="image/*" required>
                    <button class="btn btn-primary">Postar</button>
                </div>
            </form>
        </div>


        <!-- =========================== -->
                <!-- Profile -->
        <!-- =========================== -->
        <div class="col-3 mt-5">
            <div class="row">
                <div class="col-2">
                    <i class="far fa-user-circle fa-4x"></i>
                </div>
                <div class="col-5">
                    <p><?php echo $logado ?></p>
                    <span><?php echo $nomeUser ?></span>
                </div>
                <div class="col-1 pt-3">
                    <a href="<?php echo $url ?>/profile">Mudar</a>
                    <a href="<?php echo $url ?>/sair">Sair</a>
                </div>
            </div>
        </div>
    </div>

    <!-- =========================== -->
                <!-- Posts -->
    <!-- =========================== -->

        <!-- // Inicio do "for" -->
    <?php 
        if ($count > 0){
            foreach ($dataBD as $postItem){    
                
    ?>
            <!-- Inicio HTML -->
    <div class="row">
        <div class="offset-3 col-4 border rounded mt-4 posts">
            <div class="row">
                <div class="col-1">
                    <i class="far fa-user-circle fa-2x m15"></i>
                </div>
                <div class="col-4 mt-3">
                    <?php echo $postItem->userPost; ?>
                </div>
                <div class="offset-6 col-1 mt-3">
                    <i class="fas fa-ellipsis-h"></i>
                </div>
            </div>
            
            <!-- Imagem -->
            <div class="row">
                <div class="mt-2">
                    <img class="imagePost"src="Source/Views/upload/post/<?php echo $postItem->imagePost; ?>" alt="">
                </div>
            </div>

            <!-- Icons -->
            <div class="row">
                <div class="col-1">
                    <i class="far fa-heart fa-lg m15"></i>
                </div>
                <div class="col-1">
                    <i class="far fa-paper-plane fa-lg m15"></i>
                </div>
                <div class="offset-9 col-1">
                    <i class="far fa-bookmark fa-lg m15"></i>
                </div>
            </div>

            <!-- Descrição -->
            <div class="row">
                <div class="col-12 mt-3">
                    <strong><?php echo $postItem->userPost; ?></strong>
                    <?php echo $postItem->descPost; ?>
                </div>
            </div>

            <!-- Comentarios -->
            <div class="row border-top mt-3">
                <div class="col-1 pt-2">
                    <i class="far fa-smile fa-lg m15"></i>
                </div>
                <div class="col-9 pt-2">
                    <span>Adicione um comentário...</span>
                </div>
                <div class="col-2 pt-2">
                    <a href="">Publicar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- //Fim do "for" -->
<?php
}
    }else{
        echo "
        <div class='row'>
            <div class='offset-4 col-4 mt-4'>
                <h1> Nenhum dado foi encontrado :( </h1>
            </div>
        </div>
        ";
    }
?>  
    
</body>
</html>

