create database consultorio;
use consultorio;

create table pessoa(
	id_pessoa int not null auto_increment,
    nome varchar(150) not null,
    telefone varchar(16) null,
    email varchar(150) null,
    cpf varchar(16) unique,
    senha varchar(12) not null,
    perfil char(3) default 'cli',
    img_perfil varchar(255),
    status boolean default 1,
    constraint primary key (id_pessoa)
);

create table cliente(
	id_cliente int not null auto_increment,
    sexo char(1) default 'M',
    idade int,
    plano_saude varchar(150),
    id_pessoa int not null,
    FOREIGN KEY (id_pessoa) REFERENCES pessoa (id_pessoa),
    CONSTRAINT PRIMARY KEY (id_cliente)
);

create table medico(
	id_medico int not null auto_increment,
    crm varchar(16) not null,
    especialidade varchar(150) null,
    id_pessoa int not null,
    FOREIGN KEY (id_pessoa) REFERENCES pessoa (id_pessoa),
    CONSTRAINT PRIMARY KEY (id_medico)
);

insert into pessoa(nome, telefone, email, cpf, senha, img_perfil) value 
('halyson', '67000000000', 'meuamigaozao@gmail.com', '245753684', '123123123', 'sdgfhidjghsergkseuirgjwseudsfhsfghn');
insert into pessoa(nome, telefone, email, cpf, senha, perfil, img_perfil) value 
('reis', '67111111111', 'seis@gmail.com', '245734562', '321321321', 'med', 'sdighsdfogbhdfhbrdtgisdrbgaesdhrt');

select * from pessoa;

insert into cliente(sexo, idade, plano_saude, id_pessoa) value 
('M', 18, 'unimed', 1);

select * from cliente;

insert into medico(crm, especialidade, id_pessoa) value
('4685674568', 'urologista', 2);

select * from medico;

select 
cli.id_cliente, 
cli.sexo, 
cli.idade, 
cli.plano_saude, 
pes.nome, 
pes.telefone, 
pes.email, 
pes.cpf 
from cliente as cli inner join pessoa as pes 
on cli.id_pessoa = pes.id_pessoa;

select 
med.id_medico, 
med.crm, 
med.especialidade, 
pes.nome, 
pes.telefone, 
pes.email, 
pes.cpf 
from medico as med inner join pessoa as pes 
on med.id_pessoa = pes.id_pessoa;