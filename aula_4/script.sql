CREATE TABLE usuario (
	id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    senha VARCHAR(255)
);

CREATE TABLE cliente (
    id INT PRIMARY KEY,
    cpf VARCHAR(11) UNIQUE,
    FOREIGN KEY (id) REFERENCES usuario (id)
);

CREATE TABLE administrador (
    id INT PRIMARY KEY,
    FOREIGN KEY (id) REFERENCES usuario (id)
);

CREATE TABLE categoria (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100)
);

CREATE TABLE produto (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    preco FLOAT,
    descricao VARCHAR(1000),
    categoria INT,
    FOREIGN KEY (categoria) REFERENCES categoria (id)
);

CREATE TABLE venda (
    id INT PRIMARY KEY AUTO_INCREMENT,
    data_hora DATETIME,
    cliente INT,
    FOREIGN KEY (cliente) REFERENCES cliente (id)
);

CREATE TABLE produto_venda (
    id_produto INT,
    id_venda INT,
    quantidade INT,
    PRIMARY KEY (id_produto, id_venda),
    FOREIGN KEY (id_produto)  produto (id),
    FOREIGN KEY (id_venda) venda (id)
);