create database nutri_bem;

CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    data_nascimento DATE,
    peso DECIMAL(5, 2),
    altura DECIMAL(3, 2)
);


CREATE TABLE refeicao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo varchar(250),
    descricao varchar(250),
    proteina varchar(250),
    carboidrato varchar(250),
    gordura varchar(250),
    calorias varchar(250)
);