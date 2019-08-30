<?php

    class ConnectionFactory {

        private static $servidor = "localhost";
        private static $usuario = "root";
        private static $senha = "";
        private static $banco = "lp3";

        public static function getConnection() {

            $conn = null;

            try {
                $conn = new PDO("mysql:host=" . self::$servidor . ";dbname=" . self::$banco, self::$usuario, self::$senha);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e) {
                die("Falha ao conectar: " . $e->getMessage());
            }

            return $conn;
        }

    }