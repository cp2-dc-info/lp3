<html>
    <head>
        <title>Home</title>
    </head>
    <body>

    <?php
        session_start();
        if(isset($_SESSION['usuario'])) {
            $usuario = $_SESSION['usuario'];
        } else {
            header('Location: ../autenticacao/LoginView.php');
        }
    ?>

    <p> Seja bem vindo <?php echo $usuario->getNome?>!</p> 
    <a href='../autenticacao/LogoutAction.php'>Sair</a>
    
    </body>
</html>