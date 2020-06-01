### Administrador para e-commerce
Objetivo: por meio de um formulário cadastrar dados de um produto, ter uma página que mostre a relação de produtos cadastrados e que ao clicar em um produto qualquer desta lista o usuário seja redirecionado à uma página que exiba as informações do produto individualmente.

Requisitos:

1. Criar uma tela (createProduto.php) com um formulário a partir do qual o usuário poderá cadastrar produtos. Precisaremos dos seguintes campos:
   1. nome do produto;
   1. descrição do produto;
   1. preço;
   1. foto (upload).

Deve-se validar os campos do lado do servidor e, eventualmente, destacar os campos preenchidos incorretamente segundo os critérios:

* O preço deve ser numérico;
* O nome do produto e a foto são obrigatórios.

A descrição é opcional. Salvar os produtos num arquivo produtos.json. Cada produto deve ter um número inteiro único como identificador.

2. Criar uma tela (indexProdutos.php) que deve mostrar uma tabela com todas as informações de todos os produtos exceto a foto. A última coluna dessa tabela deve ser um link para a tela descrita na tela abaixo.

3. Criar uma tela (showProduto.php) com as informações de um produto. Essa tela deve permitir a exclusão do produto.

4. Fazer uma tela (editProduto.php) que permita a alterção das informações de um produto.

5. Criar uma tela (createUsuario.php) de cadastro de usuários com campos nome, e-mail, senha e confirmação de senha. Guardar usuários num arquivo usuarios.json. Os campos devem ser validados seguindo os seguintes critérios:
   1. O nome e o email são de preenchimentos obrigatórios;
   1. A senha deve ter no mínimo 6 caracteres;   
   1. A senha e a confirmação de senha devem ser iguais.
   
* A senha de cada usuário deve ser armazenada criptografada.
* A tela de cadastro dos usuários também deve conter uma lista com todos os usuários.
* A senha de cada usuário deve ser armazenada criptografada.
* Ao lado de cada usuário acrescente um botão que, quando clicado, deve remover o usuário.

6. Cada item da lista de usuários (item 5) deve conter um link que direciona para uma tela que será capaz de alterar as informações de um usuário.

7. Fazer uma tela de login para os usuários.

8. Fazer com que o acesso às telas construídas nos items 1, 2, 3, 4, 5 e 6. Sejam acessíveis somente a usuários logados.

9. Excetuando a tela de login, todas as telas devem exibir uma barra de navegação para que o usuário possa alternar entre telas e, eventualmente efetuar o logout.
