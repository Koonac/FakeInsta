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
        <form action="<?=$url;?>/register" method="post" class="col-3 flex-wrap text-center border mt-0 mb-2 px-4 bg-white border-primary">
            <h1 class="form-group mt-3">FakeInsta</h1>
            <span class="span">Cadastre-se para ver fotos e vídeos dos seus amigos.</span>
            <div class="form-group mt-3">
                <input type="email" name="email" id="email" class="form-control mb-1" placeholder="Número do celular ou email" required>
                <input type="text" name="name" id="name" class="form-control mb-1" placeholder="Nome completo" required>
                <input type="text" name="user" id="user" class="form-control mb-1" placeholder="Nome de Usuario" required>
                <input type="password" name="pass" id="pass" class="form-control mb-1" placeholder="Senha" required>
                <button type="submit" class="btn btn-primary mb-3 mt-3">Cadastre-se</button>
            </div>

            <div class="mt-3 mb-4">
                <span>Ao se cadastrar, você concorda com nossos <strong>Termos</strong>, <strong>Política de Dados</strong> e <strong>Política de Cookies</strong>.</span>
            </div>

        </form>

        <div class="row m-0 align-items-center justify-content-center">
            <div class="col-3 flex-wrap text-center border  p-4 bg-white border-primary">
                Tem um conta? <a href="<?=$url;?>">Conecte-se</a>
            </div>
        </div>

    </div>
</body>

</html>