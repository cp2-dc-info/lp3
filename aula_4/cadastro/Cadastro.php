<?php

    require_once "../core/ConnectionFactory.php";
    require_once "../core/Usuario.php";

    class Cadastro {

        function cadastrarCliente($nome, $email, $senha) {

            if (is_null(Usuario::buscar($email))) {
                   
                $hash = password_hash($senha, PASSWORD_DEFAULT);
                $usuario = new Usuario($nome, $email, $hash);
                $usuario->salvar();
                return $usuario;
            } 

            return null;
        }
    }    
    
?>