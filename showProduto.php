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
    <title>Detalhe</title>
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
    
    <div class="container border" style="max-width: 840px;"> 
        <div class="row no-gutters">
            <div class="col-md-4">
                <img class="card-img-top" src="<?= $produto['imagem'] ?>" alt="Imagem do produto">  
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $produto['nome'] ?></h5>
                    <p class="card-text"><?= $produto['descricao'] ?></p>
                    <p class="card-text">R$ <?= $produto['preco'] ?></p>
                    <p class="card-text">
                    <button class="btn"><a href="editProduto.php?id=<?= $produto['id'] ?>" class="card-link">Editar</a></button>
                    <button class="btn"><a href="excluiProduto.php?id=<?= $produto['id'] ?>" class="card-link">Excluir</a></button>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!--BOOTSTRAP-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>