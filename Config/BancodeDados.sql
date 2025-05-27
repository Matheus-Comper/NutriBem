create database nutri_bem;

create table refeicao(
	id INT AUTO_INCREMENT primary key ,
    tipo varchar(250),
    descricao varchar(250),
    proteina varchar(250),
    carboidrato varchar(250),
    gordura varchar(250),
    calorias varchar(250)
);
