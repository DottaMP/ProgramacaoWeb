create database pw10_atividade;

use pw10_atividade;

create table produto(
	codigo bigint primary key auto_increment,
	titulo varchar(100),
	descritivo varchar(100),
	valor decimal (18,2),
	qtd bigint,
	categoria varchar(100)
);

select * from produto;