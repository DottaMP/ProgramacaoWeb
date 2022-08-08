create database pw11;

use pw11;

create table cesta(
	codigo bigint primary key auto_increment,
	codigoProduto bigint,
    qtd bigint,
    sessionId varchar(200)
);

select * from cesta;