<?php
    session_start();
    if(array_key_exists('nome', $_SESSION) == false){
        $erro = "Acesso Negado!";        
        $_SESSION["erro"] = $erro;
        header('Location: formLogin.php');
        exit();
    } else {
        $nome = $_SESSION["nome"];
        echo "Seja bem vindo $nome!<br>";
        echo "<a href='sair.php'>Sair</a>";
    }
?>