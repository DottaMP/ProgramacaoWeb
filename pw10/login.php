<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PHP LISTA!</title>
</head>

<body>
    <!--PARA AUTENTICAR E REALIZAR O LOGIN-->
    <div class="container justify-content-center py-5">
        <div class="row">
            <div class="col-sm-6 text-center">
                        <h1>Login</h1>
                        <form method="post" action="login.php">
                            <div class="form-floating mt-3 mb-3">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="name@example.com">
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                                <label for="senha">Senha</label>
                            </div>
                            <div class="text-center mb-3">
                                <button type="submit" class="btn btn-primary" name="bt1">Logar</button>
                                <button type="submit" class="btn btn-danger"><a class="text-white" href="cliente.php">Cancelar</a></button>
                            </div>
                        </form>

                    <?php 
                        if(isset($_POST["bt1"])) fazerLogin();
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

<?php 
    function fazerLogin(){
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $conexao = new mysqli("localhost", "root", "root", "pw10"); //conexão com o BD

        //para inserir é criado a variável sql e executado o comando sql de insert, onde vai inserir um registro no BD usando as variáveis ($) que recuperou do formulário enviado via post
        $sql = "select * from cliente where email='$email' and senha=md5('$senha')"; //a senha será criptografada utilizando o md5
        
        $resultado = mysqli_query($conexao, $sql); //será retornado um resultado

        if($reg = mysqli_fetch_array($resultado)){//se encontrar quer dizer que encontrou o e-mail e a senha criptografada           
            //para guardar o código do cliente é utilizado variáveis de sessão
            //é a conexão entre navegador e o servidor de aplicação
            //para cada usuário/navegador que está acessando vai criar uma sessão

            session_start(); //se conseguir logar será iniciado a sessão

            //variavel global
            $_SESSION["codigo"] = $reg["codigo"];
            $_SESSION["nome"] = $reg["nome"];
            $_SESSION["email"] = $reg["email"];
            
            //redirecionar para outro página, após logado
            header("location: listaCliente.php");

        }else{ //se não consegue extrair um registro irá cair direto no else
            echo "<br><h4>Email ou Senha inválidos!</h4>";
        }

        mysqli_close($conexao); //desconectar
    }
?>