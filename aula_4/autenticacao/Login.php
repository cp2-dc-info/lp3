<?php

    require_once "../core/ConnectionFactory.php";
    require_once "../core/Usuario.php";

    class Login {

        public function autenticar($email, $senha) {
        
            $usuario = Usuario::buscar($email);
        
            if (is_null($usuario)) {
                return null;
            }
                

            if (!password_verify($senha, $usuario->getSenha())) {
                return null;
            }

            return $usuario;
        }   
    }
    
?>