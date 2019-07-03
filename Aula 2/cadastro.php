<?php
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    # password hash
    $hash = password_hash($senha, PASSWORD_DEFAULT);

    $connection = mysqli_connect("localhost", "root", "", "lp3");
 
    // Check connection
    if($connection === false){
        die("Deu ruim mano!" . mysqli_connect_error());
    }

    $sql = "INSERT INTO usuario (nome, email, senha) VALUES
            ('$nome', '$email', '$hash')";
    if(mysqli_query($connection, $sql)){
        header("Location: formLogin.php");
        
    } else{
        echo "Deu ruim no cadastro $sql. " . mysqli_error($connection);
    }

    mysqli_close($connection);
?>