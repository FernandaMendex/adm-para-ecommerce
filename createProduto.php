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

    $nome = '';
    $descricao = '';
    $preco = '';

    $nomeOk = true;
    $descricaoOk = true;
    $precoOk = true;
    $imagem = null;

    if($_POST){

        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];

        if($_FILES){
            $tmpName = $_FILES['imagem']['tmp_name'];
            $fileName = uniqid()."-". $_FILES['imagem']['name'];
            $error = $_FILES['imagem']['error'];
            move_uploaded_file($tmpName, 'imagens/'.$fileName);
            $imagem = 'imagens/'.$fileName;
        } else {
            $imagem = null;
        }

        if($nomeOk && $descricaoOk && $precoOk){
            addProduto($nome, $descricao, $preco, $imagem);

            header('location: criaProduto.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Cadastro de produtos</title>
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
        <h5 class="table-title">Insira os dados do novo produto</h5>
        <div class="col-12">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nome">Nome do produto:</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <input type="text" class="form-control" id="descricao" name="descricao">
                </div>
                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <input type="number" pattern="[0-9]+([,][0-9]+)?" min="0" step="any" class="form-control" id="preco" name="preco">
                    <small class="form-text text-muted">Ex: 999,99</small>
                </div> 

                <div class="form-group">
                    <label for="imagem">Imagem do produto:
                    <input type="file" id="imagem" name="imagem" accept=".jpg, .jfif, .png" onchange="previewImagem()" required>
                    <br><br>
                    <img name="imagem" style="max-width: 200px;">
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

    <!-- Preview da imagem adicionada -->
    <script>
        function previewImagem() {
            var imagem = document.querySelector('input[name="imagem"]').files[0];
            var preview = document.querySelector('img[name="imagem"]');

            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            }
            if(imagem) {
                reader.readAsDataURL(imagem);
            }
        }
    </script>
</body>
</html>