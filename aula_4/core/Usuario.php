<?php

    class Usuario {

        private $id;
        private $nome;
        private $email;
        private $senha;

        // construtuores

        public function __construct($nome, $email, $senha) {
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
        }

        // getters e setters

        protected function setId($id) {
            $this->id = $id;
        }

        public function getId() {
            return $this->id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function salvar() {

        }

        public static function buscar($email) {

            $conn = ConnectionFactory::getConnection();

            $stmt = $conn->prepare('SELECT id,nome,email,senha FROM students WHERE email = :email');
            $stmt->bindParam(':email', $email);

            try {
                if ($row = $stmt->fetch()) {

                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $usuario = new Usuario();
                    $usuario->setId($row['id']);
                    $usuario->setNome($row['nome']);
                    $usuario->setEmail($row['email']);
                    $usuario->setSenha($row['senha']);
    
                    return $usuario;
                }
            } catch (PDOException $e) {
                die("Erro ao buscar usuário" . $e->getMessage());
            }
            
            return null;
        }
    }

?>