<?php

use Source\Models\User;

$userBD = new User;
$userProfile = $userBD->find("login= :login", "login={$_SESSION['login']}")->fetch();
$url = URL_BASE;


?>

<script>
    const fakeinsta = {
        openModal: function() { (new bootstrap.Modal(document.getElementById('meuModal'), {})).toggle()},
        inputFile: function() {document.getElementById("inputImage").click()}
    }

    function deleteBD($cmd){
        if($cmd == "delImage"){
            console.log("DELETANDO IMAGEM")
            window.location.href = "<?php echo $url; ?>/profile/deleteImage"
        }
        if($cmd == "delUser"){
            console.log("DELETANDO USER")
            window.location.href = "<?php echo $url ?>/profile/deleteUser"
        }
    }

    function btnSave(){
        var btn = document.getElementById("btnSaved")
        btn.disabled = false
    }
    
</script>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
    <?php require __DIR__ ."/header.php"; ?>

    <div class="row">
        <div class="offset-3 col-6 border rounded mt-4 profile position-relative">

            <!-- Imagem Profile -->
            <div class="row mt-3">
                <div class="offset-2 col-2 border">
                    <?php
                        if($userProfile->image == null){
                            echo "<i class='far fa-user-circle fa-4x m15'></i>";
                        }else{
                            echo "<img class='img' src='Source/Views/upload/profile/$userProfile->image'>";  
                            }
                        ?>
                </div>
                <!-- Nome usuario com imagem Profile -->
                <div class="col-3 mt-3">
                    <p class="fs-4"><?php echo $userProfile->login; ?></p>
                    <p class="modalLink pointer" onclick="fakeinsta.openModal()">Alterar foto de perfil</p>
                </div>
            </div>

            <!-- Nome Profile -->
            <form action="<?= $url?>/profile/editUser" method="post">
                <div class="row mt-3">
                    <div class="offset-2 col-2">
                        
                        <strong>Nome </strong>
                    </div>
                    <div class="col-5">
                        <input class="form-control" type="text" id="inputName" onchange="btnSave()" name="inputName" value="<?php echo $userProfile->nome; ?>">
                    </div>
                </div>

                <!-- Nome de usuario Profile -->
                <div class="row mt-3">
                    <div class="offset-2 col-2">
                        <strong>Nome de Usúario</strong>
                    </div>
                    <div class="col-5">
                        <input class="form-control" type="text" value="<?php echo $userProfile->login; ?>" disabled readonly>
                    </div>
                </div>


                <!-- Email profile -->
                <div class="row mt-3">
                    <div class="offset-2 col-2">
                        <strong>Email</strong>
                    </div>

                    <div class="col-5">
                        <input class="form-control" type="email" id="inputEmail" onchange="btnSave()" name="inputEmail" value="<?php echo $userProfile->email; ?>">
                    </div>
                </div>

                <!-- Botões do rodapé -->
                <div class="mb-4 position-absolute bottom-0 start-50 translate-middle">
                    <button type="submit" class="btn btn-primary me-5" id="btnSaved" disabled>Save</button>

                    <a class="text-decoration-none fw-bolder ms-5 pointer" data-bs-target="#delUser" data-bs-toggle="modal">Excluir conta permanentemente</a>
                </div>
            </form>


                <!-- Modal para alterar foto de perfil -->
            <div class="modal fade" id="meuModal" tabindex="-1" aria-labelledby="ExemploDeModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <div class="container-fluid">
                                <div class="row justify-content-center">
                                    <div class="col-sm-6 text-center">
                                        <!-- Imagem perfil -->
                                        <?php
                                            if($userProfile->image == null){
                                                echo "<i class='far fa-user-circle fa-4x m15'></i>";
                                            }else{
                                                echo "<img class='img' src='Source/Views/upload/profile/$userProfile->image'>";  
                                                }
                                        ?>
                                        <h5 class="mt-3">Foto de Perfil</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-body modalHover" onclick="fakeinsta.inputFile()">
                            <p id="textImage" class="text-center m-0 fw-bold">Carregar imagem</p>
                            <form enctype="multipart/form-data" 
                            method="post" 
                            action="<?php echo $url ?>/Source/Controllers/ImagemPost.php" 
                            hidden >
                                <input  id="inputImage" name="inputImage" type="file" accept="image/*" onchange="this.form.submit()" hidden>
                            </form>
                        </div>
                            
                        <div class="modal-body border-top modalHover" data-bs-target="#delImage" data-bs-toggle="modal">
                            <p class="text-center m-0 text-danger fw-bold">Remover foto atual</p>
                        </div>

                        <div id="btnCancelar" data-bs-dismiss="modal" class="modal-footer justify-content-center modalHover">
                            <p>Cancelar</p>
                        </div>
                    </div>
                </div>
            </div>
                <!-- Fim do modal para alterar foto de perfil -->

                <!-- Inicio modal para verficar de se deseja deleta imagem -->
            <div class="modal fade" id="delImage" aria-hidden="true" aria-labelledby="DeleteImage" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title">Deseja mesmo apagar foto de perfil ?</h5>
                    </div>
                    <div class="modal-body text-center modalHover" onclick="deleteBD('delImage')">
                        <p class="fw-bold m-0 text-danger">Apagar</p>
                    </div>
                    <div class="modal-body border-top text-center modalHover" data-bs-target="#meuModal" data-bs-toggle="modal">
                        <p class="fw-bold m-0">Cancelar</p>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Fim do modal para delete de imagem -->

            <!-- Inicio modal para verficar de se deseja deletar o perfil-->
            <div class="modal fade" id="delUser" aria-hidden="true" aria-labelledby="DeleteUser" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title">Deseja mesmo excluir seu perfil <strong>permanentemente</strong>?</h5>
                    </div>
                    <div class="modal-body text-center modalHover" onclick="deleteBD('delUser')">
                        <p class="fw-bold m-0 text-danger">Apagar</p>
                    </div>
                    <div class="modal-body border-top text-center modalHover" data-bs-dismiss="modal">
                        <p class="m-0">Cancelar</p>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Fim do modal para deletar o perfil -->

        </div>
    </div>

</body>
</html>