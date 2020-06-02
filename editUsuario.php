<?php

    //Includes
    include('includes/funcoesUsuario.php');

    //Carregando dados do usuário
    $usuarios = carregaUsuario();

    $id = $_GET['id'];

    $usuario = idUsuario($id);

    //echo "<pre>";
    //print_r($usuario);
    //echo "</pre>";
    //die(); 

    //Salvando dados editados
    if($_POST){

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        editarUsuario($_GET['id'], $nome, $email, $senha);

        header('location: editaUsuario.php');
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Editar usuário</title>
    <!--CSS-->
    <link rel="stylesheet" href="css/estilo.css">
    <!--BOOTSTRAP-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="col-12">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nome">Nome do usuário:</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $usuario['nome'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $usuario['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="senha">Senha:
                    <input type="password" class="form-control" id="senha" name="senha" value="<?= $usuario['senha'] ?>">
                    <small class="form-text text-muted">Mínimo de 6 caracteres</small>
                    <?= ($senhaOk? '' : '<span> A senha deve ter pelo menos 6 caracteres </span>') ?>
                    </label>
                </div> 
                <div>
                    <button class="btn" type="submit">Enviar</button>
                    <button class="btn" type="reset">Limpar</button>
                </div>
            </form>
        </div>
    </div>



    <!--BOOTSTRAP-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>