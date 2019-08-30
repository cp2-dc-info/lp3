<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Formulário de Cadastro</title>
</head>
<body>
<h1>Cadastro</h1>
<form action="CadastroCtrl.php" method="post">
    <p>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome">
    </p>
    <p>
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
    </p>
    <p>
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha">
    </p>
    <p>
        <label for="senha">Confirmação</label>
        <input type="password" name="confirmaSenha" id="confirmaSenha">
    </p>
    <input type="submit" value="Enviar">

    <?php
        session_start();
        if(isset($_SESSION["erro"])) {
            $erro = $_SESSION["erro"];
            foreach ($erro as $e)
                echo "<br><b>$e</b>";
            unset($_SESSION["erro"]);
        }
    ?>
    
    <p>
        <a href="../autenticacao/LoginView.php">Login</a>
    </p>
</form>
</body>
</html>