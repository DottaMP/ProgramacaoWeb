create database pw10;

use pw10;

create table cliente(
	codigo bigint primary key auto_increment,
	nome varchar(100),
	email varchar(100),
	senha varchar(100)
);

select * from cliente;