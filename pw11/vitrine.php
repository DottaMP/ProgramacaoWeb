<?php ob_start(); ?>
<style>
    * {
    padding: 0;
    margin: 0;
    font-family: 'Bitter', serif;
}

.produto {
    max-width:150px;
    max-height:150px;
    width: auto;
    height: auto;
    object-fit: cover;
}

img {
    width: 150px;
    height: 150px;
    object-fit: scale-down;
}

</style>
<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Vitrine!</title>
</head>

<body>
    
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">

                <h1>Vitrine</h1>

                <div class="col-lg-10">

                    <form method="post" action="listar.php">
                        <div class="form-floating mt-3 mb-3">
                            <div class="col-lg-4 text-end">
                                <input type="text" class="form-control" id="busca" name="busca" placeholder="busca">
                                <button type="submit" class="btn btn-primary mt-2" name="btnBusca">Pesquisar</button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <?php listar(); ?>
                    </div>
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
        $conexao = new mysqli("localhost", "root", "root", "pw11"); 

        if(isset ($_POST["btnBusca"])){ 
            $busca = $_POST["busca"];
            $sql = "select * from produto where titulo like '%$busca%' or descritivo like '%$busca%' or categoria like '%$busca%'";
        } else{ 
            $sql = "select * from produto order by codigo";
        }

        $resultado = mysqli_query($conexao, $sql);

        while($reg = mysqli_fetch_array($resultado)){
            $codigo = $reg["codigo"];
            $titulo = $reg["titulo"];
            $descritivo = $reg["descritivo"];
            $valor = $reg["valor"];
            $qtd = $reg["qtd"];
            $categoria = $reg["categoria"];

            echo "<div class='col-lg-3 text-center'>
                    <div class='card border-0 bg-light mb-2'>
                        <div class='card-body'>
                            <img src='./img/$codigo.jpg' class='img-fluid produto'>
                        </div>
                    </div>
                    <h6><a href='detalhe.php?codigo=$codigo'>$titulo</a></h6>
                    <p>R$ $valor</p>
                    <p><a href='adicionar.php?codigo=$codigo' class='btn btn-primary'>Comprar</a></p>
                </div>";
        }
        mysqli_close($conexao);
    }
?>
<?php ob_end_flush(); ?>