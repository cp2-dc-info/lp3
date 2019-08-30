<html>
    <head>
        <title>Home</title>
    </head>
    <body>

    <?php
        session_start();
        if(isset($_SESSION['nome'])) {
            $nome = $_SESSION['nome'];
        } else {
            header('Location: ../autenticacao/LoginView.php');
        }
    ?>

    <p> Seja bem vindo <?php echo $nome?>!</p> 
    <a href='../autenticacao/LogoutAction.php'>Sair</a>
    
    </body>
</html>