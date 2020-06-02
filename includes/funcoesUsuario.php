<?php

    function carregaUsuario(){
        //Lê o arquivo para um variável string
        $strJson = file_get_contents("./data/usuarios.json");

        $usuarios = json_decode($strJson, true);

        return $usuarios;

    }

    //Se todos os dados forem inseridos serão guardados em um arquivo json
    function addUsuario($nome, $email, $senha){

        //Carrega os usuarios para $usuarios
        $usuarios = carregaUsuario();

        //Adiciona um ID único para cada usuário
        $id = uniqid();
        
        //Cria um novo array associativo com as informações cadastradas
        $usuario = ['id'=>$id, 'nome'=>$nome, 'email'=>$email, 'senha'=>password_hash($senha, PASSWORD_DEFAULT)];

        //Adiciona o array formado pelo novo produto adicionado ao array usuarios
        $usuarios[] = $usuario;

        //Transforma o array de produtos de volta em string json
        $stringjson = json_encode($usuarios);

        if($stringjson){

            file_put_contents("./data/usuarios.json", $stringjson);

        }
    }

    function idUsuario($id){
        $usuarios = carregaUsuario();

        foreach ($usuarios as $usuario){
            if($usuario['id'] == $id){
                return $usuario;
            }
            //return false;
        }   
    }

    function deleteUsuario($id){
        $usuarios = carregaUsuario();

        foreach ($usuarios as $key => $usuario) {
            if ($usuario['id'] == $id){
                $posicao = $key;

            }
        }

        unset($usuarios[$posicao]);
        
        $stringjson = json_encode($usuarios);
        return file_put_contents("./data/usuarios.json", $stringjson);
    }

    function editarUsuario($id, $nome, $email, $senha){
        $usuarios = carregaUsuario();

        foreach ($usuarios as $key => $usuario) {
            if ($usuario['id'] == $id){
                $posicao = $key;
            }
        }

        $usuarioEditado = ['id'=>$id, 'nome'=>$nome, 'email'=>$email, 'senha'=>password_hash($senha, PASSWORD_DEFAULT)];

        $usuarios[$posicao] = $usuarioEditado;

        $stringjson = json_encode($usuarios);
        return file_put_contents("./data/usuarios.json", $stringjson);
    }