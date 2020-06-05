<?php

    //Includes
    include('includes/funcoesUsuario.php');

    $nome = '';
    $email = '';
    $senha = '';
    $confirmacao = '';

    $nomeOk = true;
    $emailOk = true;
    $senhaOk = true;
    $confirmacaoOk = true;

    if($_POST){

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confirmacao = $_POST['confirmacao'];

        if(strlen($senha) < 6 || $senha != $confirmacao){
            $senhaOk = false;
            $confirmacaoOk = false;
        }

        //Se formulário ok, salvo o usuário
        if($nomeOk && $emailOk && $senhaOk){
            addUsuario($nome, $email, $senha);

            header('location: criaUsuario.php');
        }
    }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Cadastro de usuários</title>
    <!--CSS-->
    <link rel="stylesheet" href="css/style.css">
    <!--BOOTSTRAP-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
    <?php
        include 'includes/header.php';
        include 'includes/footer.php';
    ?>

    <div class="container border">
        <h5 class="table-title">Insira os dados do novo usuário</h5>
        <div class="col-12">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nome">Nome do usuário:</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha:
                    <input type="password" class="form-control" id="senha" name="senha">
                    <small class="form-text text-muted">Mínimo de 6 caracteres</small>
                    <?= ($senhaOk? '' : '<span> A senha deve ter pelo menos 6 caracteres </span>') ?>
                    </label>
                </div>
                <div class="form-group">
                    <label for="confirmacao">Confirme a senha:
                    <input type="password" class="form-control" id="confirmacao" name="confirmacao">
                    <?= ($confirmacaoOk? '' : '<span> As senha digitadas não são iguais </span>') ?>
                    </label>
                </div>
                <div>
                    <button class="btn" type="submit">Enviar</button>
                    <button class="btn" type="reset">Limpar</button>
                </div>
            </form>
        </div>
    </div>

    <?php

        $usuarios = carregaUsuario();
        //echo "<pre>";
        //print_r ($usuarios);
        //echo "</pre>";
        //die();

    ?>

    <div class="container border">
        <h5 class="table-title">Usuários cadastrados</h5>
        <br>
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Usuário</th>
            <th scope="col">E-mail</th>
            <th></th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($usuarios as $usuario) :
            ?>
            <tr>
            <th scope="row"><?= $usuario['id'] ?></th>
            <td><?= $usuario['nome'] ?></td>
            <td><?= $usuario['email'] ?></td>
            <td>
                <button class="btn"><a href="editUsuario.php?id=<?= $usuario['id'] ?>">Editar</a></button>
            </td>
            <td>
                <button class="btn"><a href="excluiUsuario.php?id=<?= $usuario['id'] ?>">Excluir</a></button>
            </td>
            </tr>
            <?php 
                endforeach;
            ?>
        </tbody>
        </table>
    </div>

    <!--BOOTSTRAP-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>