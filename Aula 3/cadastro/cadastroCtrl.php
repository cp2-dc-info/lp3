<?php
    
    require "cadastroUsuario.php";

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confirmaSenha = $_POST["confirmaSenha"];

    session_start();

    if ($senha != $confirmaSenha) {    
        $erro = "As senhas não coincidem";        
        $_SESSION["erro"] = $erro;
        header("Location: cadastroView.php");
        exit();
    }

    $erro = "";

    if (cadastroUsuario($nome, $email $senha) == true) {
        session_unset();
        header("Location: loginView.php");
        exit();
    } else {
        $erro = "E-mail indisponível";        
        $_SESSION["erro"] = $erro;
        header("Location: cadastroView.php");
        exit();
    }

?>