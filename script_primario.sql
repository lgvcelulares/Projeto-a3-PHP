create database if not exists phpa3;
use phpa3;
create table if not exists funcionarios(
id_fun int primary key auto_increment,
nome_fun varchar(45) not null,
status_fun enum('ativo', 'inativo'),
matricula varchar(45)
);
create table if not exists vendas(
id_vendas int primary key auto_increment,
data_venda varchar(45) not null
);
create table if not exists produtos(
id_prod int primary key auto_increment,
nome_prod varchar(45) not null,
preco_prod int not null,
id_fun int,
id_vendas int,
constraint fk_fun foreign key(id_fun) references funcionarios(id_fun),
constraint fk_ven foreign key(id_vendas) references vendas(id_vendas)
);