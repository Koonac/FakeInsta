<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FakeInsta</title>
    <!-- Estilo .css -->
    <link rel="stylesheet" href="Source/Views/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Grand+Hotel&display=swap" rel="stylesheet">
</head>

<body class="background-body">
    <div class="row m-0 align-items-center justify-content-center">
        <!-- Inicio do Formulario -->
        <form action="<?=$url;?>/" method="post" class="col-3 flex-wrap text-center border mt-4 mb-2 px-4 bg-white border-primary">
            <h1 class="form-group mt-3">FakeInsta</h1>
            <div class="form-group mt-3">
                <input type="text" name="user" id="user" class="form-control mb-1" placeholder="Telefone, nome de usuário ou email" required>
                <input type="password" name="pass" id="pass" class="form-control mb-2" placeholder="Senha" required>
                <button type="submit" class="btn btn-primary mb-3">Entrar</button>
            </div>

            <!-- Linha quase transparente -->
            <div class="line mt-2 mb-2"></div>

            <!-- Esqueceu a senha -->
            <div class="mt-3 mb-4">
                <a href="<?php echo $url;?>">Esqueceu a senha ?</a>
            </div>

        </form>

        <div class="row m-0 align-items-center justify-content-center">
            <div class="col-3 flex-wrap text-center border  p-4 bg-white border-primary">
                Não tem uma conta ? <a href="<?=$url;?>/register">Cadastre-se</a>
            </div>
        </div>

    </div>
</body>

</html>