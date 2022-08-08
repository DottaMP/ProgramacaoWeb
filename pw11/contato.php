<!--2-Utilizando o formulário da atividade (PW03), 
    faça a validação dos campos ao clicar no botão enviar-->

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>JS and PHP</title>
</head>

<body>
    <div class="container">
        <h1 class="mt-1 text-danger"><strong><em>Contato</em></strong></h1>
        <p class="mt-2"><em>Seja bem vindo, preencha o <strong>formulário</strong> abaixo para:</em></p>
        <ul>
            <li>Dúvidas</li>
            <li>Sugestões</li>
            <li>Críticas</li>
            <li>Orçamentos</li>
        </ul>
        <p>Caso queira ver nossos produtos, <a href="http://professor.norton.net.br/index.php/2022/03/17/pw-bootstrap/"
                target="_blank">clique aqui</a></p>
        <form class="form-horizontal" id="frm1" method="post" action="contato.php?enviar=1"> <!--parametro via get ?enviar=1"-->
            <div class="col-lg-8">
                <div class="row form-group">
                    <label class="control-label col-sm-2 mt-2" for="nome">Nome:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu nome" name="nome">
                    </div>
                </div>
                <div class="row mt-3 form-group">
                    <label class="control-label col-sm-2 mt-2" for="email">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu email" name="email">
                    </div>
                </div>
                <div class="row mt-3 form-group">
                    <label class="control-label col-sm-2 mt-2" for="telefone">Telefone:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Digite seu telefone"
                            name="phone">
                    </div>
                </div>

                <div class="col-sm-offset-2 col-sm-2 mt-3">
                    <select class="form-select" aria-label="Default select example" name="assunto" id="assunto">
                        <option selected>Assunto</option>
                        <option>Dúvidas</option>
                        <option>Sugestões</option>
                        <option>Críticas</option>
                    </select>
                </div>

                <h6 class="mt-3">Deseja receber uma copia deste e-mail:</h6>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="opS" name="recebe" value="option1" checked>
                    <label class="form-check-label" for="radio1">Sim</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="opN" name="recebe" value="option2">
                    <label class="form-check-label" for="radio2">Não</label>
                </div>  

                <div class="row mt-3 form-group">
                    <label class="control-label col-sm-2 mt-2" for="telefone">Mensagem:</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" name="mensagem" id="mensagem" placeholder="Escreva aqui sua mensagem"
                            name="phone"></textarea>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button id="bt1" type="button" onclick="validar()" class="btn btn-outline-success">Enviar</button>
                    </div>
                </div>
            </div>
        </form>
        <?php enviarEmail()?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>

<script lang="javascript">
    function validar() {
    if (nome.value.length <= 3) {
        alert("Digite seu nome completo!");
        nome.value = "";
        nome.focus();
        return false;
    }

    if (email.value.length < 6 || email.value.indexOf("@") <= 0 || email.value.lastIndexOf(".") <= email.value.indexOf("@")) {
        alert("Email invalido!");
        email.focus();
        email.value = "";
        return false;
    }

    if (phone.value == "" || isNaN(phone.value)) {
        alert("Digite seu telefone! Apenas Números!");
        phone.value = "";
        phone.focus();
        return false;
    } else if (phone.value.length < 11 || phone.value.length > 11) {
        alert("Seu telefone precisa ter 11 números no formato 99999999999");
        phone.value = "";
        phone.focus();
        return false;
    }
    if (mensagem.value.length <= 10) {
        alert("Sua mensagem não pode ter menos do que 50 caracteres.");
        mensagem.value = "";
        mensagem.focus();
        return false;
    }

    frm1.submit(); //o submit envia o form via post para o php
}
</script>

<?php
    function enviarEmail(){
        //se o parâmetro via get foi transmitido vai recuperar todos os demais parametros e enviar por email
        if(isset($_GET["enviar"])){ 
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $assunto = $_POST["assunto"];
            $recebe = $_POST["recebe"];
            $mensagem = $_POST["mensagem"];
            $msg = "<b>nome:</b><b>$nome</b>
            <b>email:</b><b>$email</b>
            <b>Telefone:</b><b>$phone</b>
            <b>mensagem:</b><b>$mensagem</b>";
            
            //cabeçalho do e-mail
            //é preciso configurar o arquivo sendmail.init no xampp
            $headers  = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html; harset=UTF-8" . "\r\n";
            $headers .= "From: Equipe Fatec <equipe.fatec.ipiranga@gmail.com>" . "\r\n";
            
            if(mail($email, $assunto, $msg, $headers)){
                echo "Email enviado com sucesso";
            } else {
                echo "Ocorreu um erro no envio do email";
            }
        }
    }
?>