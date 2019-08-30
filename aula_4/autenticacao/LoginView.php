<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
</head>
<body>
<h1>Login</h1>

<form action="LoginCtrl.php" method="post">
    <p>
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
    </p>
    <p>
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha">
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
        <a href="../cadastro/CadastroView.php">Cadastre-se</a>
    </p>
</form>
</body>
</html>