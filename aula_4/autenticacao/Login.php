<?php

    require_once "../core/ConnectionFactory.php";
    require_once "../core/Usuario.php";

    class Login {

        public static function autentica($email, $senha) {
        
            $conexao = ConnectionFactory::getConnection();
            $usuario = Usuario::buscar($email);
            $conexao = null;
        
            if ($usuario != null && password_verify($senha, $usuario->senha))
                return $usuario;
                
            return null;
        }   
    }
    
?>