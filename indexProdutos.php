<?php

    //Iniciar a session
    session_start();

    //Testar se o usário tem a session
    if(!$_SESSION){

        //Redirecionando para a página de login, caso usuário não tenha
        header('location: login.php');
    }

    //Includes
    include('includes/funcoesProduto.php');

    $produtos = carregaProduto();

    //echo "<pre>";
    //print_r($produtos);
    //echo "</pre>";
    //die();  

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Lista de produtos</title>
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
        <h5 class="table-title">Lista de produtos</h5>
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Produto</th>
            <th scope="col">Descrição</th>
            <th scope="col">Preço</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($produtos as $produto) :
            ?>
            <tr>
            <th scope="row"><?= $produto['id'] ?></th>
            <td><?= $produto['nome'] ?></td>
            <td><?= $produto['descricao'] ?></td>
            <td><?= $produto['preco'] ?></td>
            <td>
                <button class="btn"><a href="showProduto.php?id=<?= $produto['id'] ?>">Detalhes</a></button>
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