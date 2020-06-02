<?php

    //Includes
    include('includes/funcoesUsuario.php');

    $loginOk = true;

    //Verificando se o form de login foi enviado
    if ($_POST){

        //Buscando e-mail e senha enviados
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $usuarios = carregaUsuario();

        foreach ($usuarios as $usuario) {
            //Testando se o usuário está cadastrado
            if ($usuario['email'] == $email){
                //Se usuário cadastrado, verificando senha
                if (password_verify($senha, $usuario['senha'])){

                    //Senha também ok, iniciando a session
                    session_start();

                    //Criando session para o usuário
                    $_SESSION['nome'] = $usuario['nome'];
                    $_SESSION['email'] = $usuario['email'];

                    header('location: createProduto.php');
                }
            }
        }
        //Se usuário não cadastrado, exibir erro
        $loginOk = false;     
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Bem vindo!</title>
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
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha:
                    <input type="password" class="form-control" id="senha" name="senha">
                    <?= ($loginOk? '' : '<span> Usuário ou senha inválidos </span>') ?>
                    </label>
                </div>
                <div>
                    <button class="btn" type="submit">Entrar</button>
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