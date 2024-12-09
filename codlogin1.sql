create database codlogin1;
use codlogin1;

create table usuarios(
	id int auto_increment primary key,
    nome varchar(50) not null,
    senha varchar(200) not null
);
select * from codlogin1.usuarios;