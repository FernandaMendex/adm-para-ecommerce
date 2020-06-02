<?php

    //Includes
    include('includes/funcoesProduto.php');

    $produtos = carregaProduto();

    $id = $_GET['id'];

    $produto = idProduto($id);

    echo "<pre>";
    print_r($produto);
    echo "</pre>";
    die();    

?>