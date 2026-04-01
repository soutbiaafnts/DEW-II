drop database if exists atividade03;

create database atividade03;
use atividade03;

create table if not exists people (
	id int auto_increment primary key,
    person_name varchar(50) not null,
    person_type varchar(50) not null,
    cpf_cnpj varchar(50) not null    
);

insert into people (person_name, person_type, cpf_cnpj) values
('João Silva', 'F', '12345678900'),
('Maria Oliveira', 'F', '98765432100'),
('Empresa XYZ', 'J', '12345678000100');