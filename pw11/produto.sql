create database pw11;

use pw11;

create table produto(
	codigo bigint primary key auto_increment,
	titulo varchar(100),
	descritivo varchar(100),
	valor decimal (18,2),
	qtd bigint,
	categoria varchar(100)
);

select * from produto;

create table cesta(
	codigo bigint primary key auto_increment,
	codigoProduto bigint,
    qtd int,
    sessionId varchar(200)
);

select * from cesta;