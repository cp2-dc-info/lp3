<?php
    session_start();
    if(array_key_exists('nome', $_SESSION) == false){
        header('Location: login.php');
    } else {
        $nome = $_SESSION["nome"];
        echo "Seja bem vindo $nome!<br>";
        echo "<a href='sair.php'>Sair</a>";
    }
?>