<?php 
    session_start();
    session_destroy(); //mata as variáveis globais de sessão
    header("location: login.php"); //redireciona para a pagina de login
?> 