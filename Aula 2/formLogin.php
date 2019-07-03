<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
</head>
<body>
<h1>Login</h1>
<form action="login.php" method="post">
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
        if(array_key_exists('erro', $_SESSION) == true){
            $erro = $_SESSION["erro"];
            echo "<br><b>$erro</b>";
        }
    ?>
    <p>
        <a href="cadastro.html">Cadastre-se</a>
    </p>
</form>
</body>
</html>