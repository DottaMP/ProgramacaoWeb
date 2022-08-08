<?php
$to_email = "email@email.com";
$subject = "Teste simples de envio de email via PHP";
$body = "Olá, este é um email de teste enviado por PHP Script";
$headers = "From: sender\'s email";
 
ini_set('smtp_port', 587);
if (mail($to_email, $subject, $body, $headers)) {
    echo "Email enviado com sucesso para $to_email.";
} else {
    echo "Falha no envio do email.";
}
?>