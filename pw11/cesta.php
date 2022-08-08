<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>ATIVIDADE PRODUTO!</title>
</head>

<body>
    
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">

                <h1>Carrinho</h1>

                <div class="col-lg-10">

                    <a href="produto.php">Página Produto</a>

                    <table class="text-center table table-hover mt-3">
                        <thead>
                            <tr class="table-info">
                                <th scope="col">#</th>
                                <th scope="col">Título</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <?php listarCesta(); ?>
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
function listarCesta(){
	session_start();
	$sessionId = session_id();
	
	$conexao = new mysqli("localhost","root","root","pw11");
	$sql = "select p.codigo, p.titulo, c.qtd, p.valor, p.valor*c.qtd as total from 
    produto p inner join cesta c on p.codigo=c.codigoProduto where c.sessionId='$sessionId' order by p.titulo";
    $totalPedido = 0;
	$resultado = mysqli_query($conexao, $sql);
	while($reg = mysqli_fetch_array($resultado)){
		$titulo		=	$reg["titulo"];
		$codigo 	=	$reg["codigo"];	
		$valor		=	$reg["valor"];
		$qtd		=	$reg["qtd"];
		$total	=	$reg["total"];
        echo "<tr>
        <th>$codigo</th>
        <th>$titulo</th>
        <th>$valor</th>
        <th>$qtd</th>
        <th>R$ $total</th>
    </tr>";
$totalPedido = $totalPedido + $total;
	}
	mysqli_close($conexao);
	echo "<tr><td colspan='5'><b>R$ $totalPedido</b></td></tr>";
}
?>