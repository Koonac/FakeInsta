<?php

use Source\Models\User;

$userBD = new User;
$userProfile = $userBD->find("login= :login", "login={$_SESSION['login']}")->fetch();

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

    <div class="row">
        <div class="offset-3 col-6 border rounded mt-4 profile">
            <div class="row mt-3">

                <!-- Imagem Profile -->
                <div class="offset-1 col-1">
                    <img src="Source/Views/upload/profile<?php echo $userProfile->image; ?>" alt="">
                </div>

                <!-- Nome usuario Profile -->
                <div class="col-3">
                    <p><?php echo $userProfile->login; ?></p>
                </div>
            </div>

            <div class="row mt-3">
                <div class="offset-1 col-1">
                    <strong>Nome</strong>
                </div>
                <div class="col-5">
                    <p><?php echo $userProfile->nome; ?></p>
                </div>
            </div>

            <div class="row mt-3">
                <div class="offset-1 col-1">
                    <strong>Email</strong>
                </div>

                <div class="col-5">
                    <p><?php echo $userProfile->email ?></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>