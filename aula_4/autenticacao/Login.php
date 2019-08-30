<?php

    require_once "../core/ConnectionFactory.php";
    require_once "../core/Usuario.php";

    class Login {

        public function autenticar($email, $senha) {
        
            $usuario = Usuario::buscar($email);

            //die("chega aqui");
            //exit();
        
            if (is_null($usuario)) {
                die("user not found");
                exit();
            }
                

            if (!password_verify($senha, $usuario->getSenha())) {
                die("password differ");
                exit();
            }
                
                
            //return null;
        }   
    }
    
?>