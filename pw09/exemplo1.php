<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
<body>
    <div class="container m-5">
        <h1 class="mb-5">Teste de PHP</h1>

        <!--GET tem de ser por link ou por botão-->
        <a href="exemplo1.1.php?n1=23&n2=45&nome=joana" >Teste Get</a>
        
        <form method="post" action="exemplo1.php" class="mt-5">
            <div class="row form-group mb-5">
                <label class="control-label col-sm-1 mt-2" for="n1">n1:</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="n1" name="n1">
                </div>
            </div>
            <div class="row form-group mb-5">
                <label class="control-label col-sm-1 mt-2" for="n2">n2:</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="n2" name="n2">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-3" name="bt1">Media</button>
            <button type="submit" class="btn btn-primary mb-3" name="bt2">Tabuada</button>
        </form>

        <?php
            if(isset($_POST["bt1"])) media(); 
            if(isset($_POST["bt2"])) tabuada();
        ?>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>

<!--tudo que começa com $ é uma variável/vetor/objeto, tudo o que esta na memória, não te declaração de tipagem-->
<?php
    function media(){
        //retorna true se o botão bt1 for clicado  - if(isset($_POST["bt1"])) 
            $a = $_POST["n1"];
            $b = $_POST["n2"];
            $c = ($a + $b)/2;
            //$nome = "maria";
            echo "<h4> Olá, a média é -> $c </h4>";
    }

    function tabuada (){
        //retorna true se o botão bt2 for clicado  - if(isset($_POST["bt2"]))
        $a = $_POST["n1"];
        echo "<ul>";
        for ($i=1; $i<=10; $i++){
            $p = $a * $i;
            echo "<li>$a X $i = $p </li>";
        }
        echo "</ul>";
    }
?>