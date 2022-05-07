<!--para pegar a session de quem logou-->
<?php
    session_start();
    //para autenticar a págiga, 
    if (isset($_SESSION["codigo"])==false){
        header("location: login.php"); //se não estiver logado voltar para a página de login
    }

?>

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
    <!--LISTA PARA TRAZER VÁRIOS REGISTRO EM UMA TELA SÓ-->
    <!--SÓ É POSSÍVEL VISUALIZAR ESSA PÁGINA SE ESTIVER LOGADO-->
    
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">

                <h1>Lista de Clientes</h1>

                <div>
                     <!--para mostrar o nome depois de logado-->
                    <h4><?php if(isset($_SESSION["nome"])) echo "Olá, ". $_SESSION["nome"];?></h4>

                    <!--para sair da sessão logada-->
                    <a href="logoff.php">Sair</a>
                </div>

                <div class="col-lg-6">

                    <form method="post" action="listaCliente.php">
                        <!--não esquecer de informar o método e a action-->
                        <div class="form-floating mt-3 mb-3">
                            <div class="col-sm-6 text-end">
                                <input type="text" class="form-control" id="busca" name="busca" placeholder="busca">
                                <button type="submit" class="btn btn-primary mt-2" name="btnBusca">Pesquisar</button>
                            </div>
                        </div>
                    </form>

                    <a href="cliente.php">Página Cliente</a>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <?php listar(); ?>
                    </table>

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
    function listar(){

        $conexao = new mysqli("localhost", "root", "root", "pw10"); //abre conexão

        if(isset ($_POST["btnBusca"])){ //se o botão btnBusca for clicado será feito o select pelo filtro informado no post
            $busca = $_POST["busca"];
            //será listado o parâmetro informado no campo de pesquisa tanto no campo nome quanto no email
            $sql = "select * from cliente where nome like '%$busca%' or email like '%$busca%'";
        } else{ //se não, irá listar todos
            //para listar tudo é criado a variável sql e executado o comando sql de select * from
            $sql = "select * from cliente order by codigo";
        }

        $resultado = mysqli_query($conexao, $sql); //será retornado resultado

        //como vai trazer vários registros, será feito um laço para enquanto houver registro listar
        while($reg = mysqli_fetch_array($resultado)){
            //se encontrar será preenchido na tabela os campos codigo, nome e email
            $codigo = $reg["codigo"];
            $nome = $reg["nome"];
            $email = $reg["email"];

            echo "<tr><th>$codigo</th><th>$nome</th><th>$email</th>
            <th><a href='cliente.php?codigo=$codigo'>editar</a></th>";
        }
        mysqli_close($conexao); //fecha conexão
    }
?>