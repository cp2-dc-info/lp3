<?php
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    echo "$nome<br/>";
    echo "$email<br/>";
    echo "$senha<br/>";

    $connection = mysqli_connect("localhost", "root", "", "ygor");
 
    // Check connection
    if($connection === false){
        die("Deu ruim mano!" . mysqli_connect_error());
    }

    $sql = "INSERT INTO usuario (nome, email, senha) VALUES
            ('$nome', '$email', '$senha')";
    if(mysqli_query($connection, $sql)){
        echo "Cadastro Concluído";
    } else{
        echo "Deu ruim no cadastro $sql. " . mysqli_error($connection);
    }

    mysqli_close($connection);
?>