<?php

    require_once "Login.php";

    class LoginCtrl {

        public function doPost() {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $this->login($email, $senha);
        }
        public function login($email, $senha) {
            session_start();

            $model = new Login();
            if ($usuario = $model->autenticar($email, $senha)) {
                session_unset();
                $_SESSION["usuario"] = $usuario;
                header("Location: home.php");
                exit();
            }
            else {
                $erro[] = "Login ou senha incorretos";        
                $_SESSION["erro"] = $erro;
                header("Location: LoginView.php");
                exit();
            } 
        }
        public function logout() {
            session_start();    
            session_unset();
            session_destroy();
            header('Location: LoginView.php');
            exit();
        }
    }
       
    $controller = new LoginCtrl();
    if(!empty($_POST)) {
        $controller->doPost();
    } else {
        header('Location: LoginView.php');
        exit();
    }
?>