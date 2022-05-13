<!--Atividade: Usando a tabela abaixo:
produto{codigo, titulo, descritivo, valor, qtd, categoria}
Faça o CRUD em PHP e o arquivo de listagem
produto.php
listaProduto.php-->

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
            
                <h1>Produtos</h1>

                <div class="col-lg-6">
                    <div>
                        <a href="atividade_listaProduto.php">Listar Produtos</a>
                    </div>

                    <form method="post" action="atividade_produto.php">
                        <div class="form-floating mt-3 mb-3">
                            <input type="number" class="form-control" id="codigo" name="codigo" placeholder="Código">
                            <label for="codigo">Código</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título">
                            <label for="titulo">Título</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input textearea class="form-control" id="descritivo" name="descritivo" rows="5" cols="30" placeholder="Descritivo">
                            <label for="descritivo">Descritivo</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="valor" name="valor" step="0.01" placeholder="Valor"> <!--step para formatar o valor-->
                            <label for="valor">Valor</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="qtd" name="qtd" placeholder="Quantidade">
                            <label for="qtd">Quantidade</label>
                        </div>
                        <div>
                            <select class="form-select" aria-label="Default select example" name="categoria" id="categoria">
                                <option selected>Categoria</option>
                                <option value="Eletrônico">Eletrônico</option>
                                <option value="Cozinha">Cozinha</option>
                                <option value="Quarto">Quarto</option>
                            </select>
                        </div>
                        <div class="text-center m-5">
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

<?php 
    /*
    function retornaConexao(){
        $conexao = new mysqli("localhost", "root", "root", "pw10_atividade");
        return $conexao;
    }*/

    function inserir(){
        /*$conexao = retornaConexao();*/
        $titulo = $_POST["titulo"];
        $descritivo = $_POST["descritivo"];
        $valor = $_POST["valor"];
        $qtd = $_POST["qtd"];
        $categoria = $_POST["categoria"];

        $conexao = new mysqli("localhost", "root", "root", "pw10_atividade"); 

        $sql = "insert into produto (titulo, descritivo, valor, qtd, categoria) 
            values ('$titulo', '$descritivo', '$valor', '$qtd', '$categoria')"; 
        
        if(mysqli_query($conexao, $sql)){
            echo "<br><h4>Registro inserido com sucesso!</h4>";
        } else{
            echo "<br><h4>Ocorreu um erro, tente mais tarde!</h4>";
        }

        mysqli_close($conexao);
    
    }

    function pesquisar($codigo){

        $conexao = new mysqli("localhost", "root", "root", "pw10_atividade"); 

        $sql = "select * from produto where codigo=$codigo";

        $resultado = mysqli_query($conexao, $sql);

        if($reg = mysqli_fetch_array($resultado)){
            $titulo = $reg["titulo"];
            $descritivo = $reg["descritivo"];
            $valor = $reg["valor"];
            $qtd = $reg["qtd"];
            $categoria = $reg["categoria"];

            echo "<script lang='javascript'>";
            echo "codigo.value='$codigo';";
            echo "titulo.value='$titulo';";
            echo "descritivo.value='$descritivo';";
            echo "valor.value='$valor';";
            echo "qtd.value='$qtd';";
            echo "categoria.value='$categoria';";
            echo "</script>";

        }else{ 
            echo "<br><h4>Registro não encontrado!</h4>";
        }
        mysqli_close($conexao);
    }

    function alterar(){
        $codigo = $_POST["codigo"];
        $titulo = $_POST["titulo"];
        $descritivo = $_POST["descritivo"];
        $valor = $_POST["valor"];
        $qtd = $_POST["qtd"];
        $categoria = $_POST["categoria"];

        $conexao = new mysqli("localhost", "root", "root", "pw10_atividade");

        $sql = "update produto set titulo='$titulo', descritivo='$descritivo', valor='$valor', 
        qtd='$qtd', categoria='$categoria' where codigo='$codigo'";
        
        mysqli_query($conexao, $sql); 
        mysqli_close($conexao); 
        
        echo "<br><h4>Registro alterado com sucesso!</h4>";
    }

    function remover(){
        $codigo = $_POST["codigo"];
        $conexao = new mysqli("localhost", "root", "root", "pw10_atividade");
        $sql = "delete from produto where codigo='$codigo'";
        
        mysqli_query($conexao, $sql); 
        mysqli_close($conexao);
    
        echo "<br><h4>Registro removido com sucesso!</h4>";

    }
?>