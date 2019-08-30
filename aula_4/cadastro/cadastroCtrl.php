<?php
    
    require "Cadastro.php";

    class CadastroCtrl {

        public function doPost() {
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            $confirmaSenha = $_POST["confirmaSenha"]; 

            $this->cadastrarCliente($nome, $email, $senha, $confirmaSenha);
        }

        public function cadastrarCliente($nome, $email, $senha, $confirmaSenha) {
            session_start();

            if (empty($nome))
                $erro[] = "O campo nome é obrigatório";

            if (empty($email))
                $erro[] = "O campo email é obrigatório";
            
            if (empty($senha))
                $erro[] = "O campo senha é obrigatório";  

            if ($senha != $confirmaSenha)
                $erro[] = "As senhas não coincidem"; 

            if (!empty($erro)) {
                $_SESSION["erro"] = $erro;
                header("Location: CadastroView.php");
                exit();
            }
        
            $model = new Cadastro();
            if ($model->cadastrarCliente($nome, $email, $senha)) {
                header("Location: ../autenticacao/LoginView.php");
                exit();
            } else {
                $erro[] = "E-mail indisponível";
                $_SESSION["erro"] = $erro;
                header("Location: CadastroView.php");
                exit();
            }
        }
    }

    
    $controller = new CadastroCtrl();
    if(!empty($_POST)) {
        $controller->doPost();
    } else {
        header('Location: CadastroView.php');
        exit();
    }
?>