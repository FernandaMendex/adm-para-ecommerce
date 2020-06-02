<?php

    //Includes
    include('includes/funcoesProduto.php');

    $produtos = carregaProduto();

    $id = $_GET['id'];

    $produto = idProduto($id);

    //echo "<pre>";
    //print_r($produto);
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
    <link rel="stylesheet" href="css/estilo.css">
    <!--BOOTSTRAP-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="<?= $produto['imagem'] ?>" alt="Imagem do produto">
        <div class="card-body">
            <h5 class="card-title"><?= $produto['nome'] ?></h5>
            <p class="card-text">R$ <?= $produto['preco'] ?></p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><?= $produto['descricao'] ?></li>
        </ul>
        <div class="card-body">
            <a href="editProduto.php?id=<?= $produto['id'] ?>" class="card-link">Editar</a>
            <a href="excluiProduto.php?id=<?= $produto['id'] ?>" class="card-link">Excluir</a>
        </div>
        </div>
    </div>






    <!--BOOTSTRAP-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>