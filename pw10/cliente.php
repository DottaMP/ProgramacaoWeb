<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PHP CRUD!</title>
</head>

<body>
    <!--CRUD E CONEXÃO COM O BANCO DE DADOS-->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
            
                <h1>Cliente</h1>

                <div class="col-lg-6">
                    <div>
                        <a href="listaCliente.php">Listar Clientes</a>
                    </div>
                    <div>
                        <a href="login.php">Logar</a>
                    </div>

                    <form method="post" action="cliente.php"> <!--não esquecer de informar o método e a action-->
                        <div class="form-floating mt-3 mb-3">
                            <input type="number" class="form-control" id="codigo" name="codigo" placeholder="Código">
                            <label for="codigo">Código</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                            <label for="nome">Nome</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="name@example.com">
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                            <label for="senha">Senha</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="b1">Inserir</button>
                            <button type="submit" class="btn btn-primary" name="b2">Pesquisar</button>
                            <button type="submit" class="btn btn-primary" name="b3">Alterar</button>
                            <button type="submit" class="btn btn-primary" name="b4">Remover</button>
                        </div>
                    </form>

                    <?php 
                        if (isset($_POST["b1"])) inserir ();
                        if (isset($_POST["b2"])) pesquisar ($_POST["codigo"]); //o parametro da pesquisa será o campo código
                        if (isset($_POST["b3"])) alterar ();
                        if (isset($_POST["b4"])) remover ();   
                        if (isset($_GET["codigo"])) pesquisar ($_GET ["codigo"]); //parametro de função GET               
                    ?>

                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>
</html>

<!--SEMPRE conectar no banco de dados, executar o comando e fechar a conexão-->
<?php 
    function inserir(){
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        //abrindo a conexão com o banco de dados mysql
        $conexao = new mysqli("localhost", "root", "root", "pw10"); //informar o endereço do banco, usuário, senha, nome do banco de dados que será utilizado

        //para inserir é criado a variável sql e executado o comando sql de insert, onde vai inserir um registro no BD usando as variáveis ($) que recuperou do formulário enviado via post
        $sql = "insert into cliente (nome, email, senha) 
            values ('$nome', '$email', md5('$senha'))"; //a senha será criptografada utilizando o md5
        
        //para executar o comando do sql utiliza o mysqli_query onde é passado a conexão aberta e o comando sql que deverá ser executado
        mysqli_query($conexao, $sql);

        //por último, deverá desconectar do banco de dados, fechando a conexão.
        mysqli_close($conexao);
    
        echo "<br><h4>Registro inserido com sucesso!</h4>";
    }

    function pesquisar($codigo){ //o parametro da pesquisa será o campo código

        $conexao = new mysqli("localhost", "root", "root", "pw10"); //abre conexão

        //para pesquisar é criado a variável sql e executado o comando sql de select, onde o codigo será igual ao código informado via post
        $sql = "select * from cliente where codigo=$codigo";

        $resultado = mysqli_query($conexao, $sql); //será retornado um resultado no caso de pesquisa

        //se encontrar valor será extraído o registro ($reg) desse resultado utilizando o comando mysqli_fetch_array
        if($reg = mysqli_fetch_array($resultado)){
            //se encontrar será recuperado os campos nome e email
            $nome = $reg["nome"];
            $email = $reg["email"];

            //será utilizado um recurso técnico de script js para mostrar o que foi extraído na página
            //gera uma função do js para pegar o id do objeto e trocar pelo valor da varivável que foi recuperada
            echo "<script lang='javascript'>";
            echo "codigo.value='$codigo';";
            echo "nome.value='$nome';";
            echo "email.value='$email';";
            echo "</script>";
            //o php gerou um javascript que atualizou esses dados 


        }else{ //se não consegue extrair um registro irá cair direto no else
            echo "<br><h4>Registro não encontrado!</h4>";
        }
        mysqli_close($conexao); //fecha conexão
    }

    function alterar(){
        $codigo = $_POST["codigo"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        //abre conexão
        $conexao = new mysqli("localhost", "root", "root", "pw10");

        //para alterar é criado a variável sql e executado o comando sql de update
        $sql = "update cliente set nome='$nome', email='$email', senha=md5('$senha') where codigo='$codigo'";
        
        mysqli_query($conexao, $sql); //executa o comando sql
        mysqli_close($conexao); //fecha conexão
    
        echo "<br><h4>Registro alterado com sucesso!</h4>";
    }

    function remover(){
        $codigo = $_POST["codigo"];

        //abre conexão
        $conexao = new mysqli("localhost", "root", "root", "pw10");

        //para remover é criado a variável sql e executado o comando sql de delete
        $sql = "delete from cliente where codigo='$codigo'";
        
        mysqli_query($conexao, $sql); //executa o comando sql
        mysqli_close($conexao); //fecha conexão
    
        echo "<br><h4>Registro removido com sucesso!</h4>";

    }
                
?>