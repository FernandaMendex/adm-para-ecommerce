<?php

    function carregaProduto(){
        //Lê o arquivo para um variável string
        $strJson = file_get_contents("./data/produtos.json");

        $produtos = json_decode($strJson, true);

        return $produtos;

    }

    //Se todos os dados forem inseridos serão guardados em um arquivo json
    function addProduto($nome, $descricao, $preco, $imagem){

        //Carrega os produtos para $produtos
        $produtos = carregaProduto();

        //Adiciona um ID único para cada produto
        $id = uniqid();
        
        //Cria um novo array associativo com as informações cadastradas pelo usuário
        $produto = ['id'=>$id, 'nome'=>$nome, 'descricao'=>$descricao, 'preco'=>$preco, 'imagem'=>$imagem];

        //Adiciona o array formado pelo novo produto adicionado ao array produtos
        $produtos[] = $produto;

        //Transforma o array de produtos de volta em string json
        $stringjson = json_encode($produtos);

        if($stringjson){

            file_put_contents("./data/produtos.json", $stringjson);

        }
    }



