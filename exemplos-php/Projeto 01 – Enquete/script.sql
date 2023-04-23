-- Script sql 
create table enquete(
	id int primary key auto_increment,
    nome varchar(200)
);

create table resposta(
    id int primary key auto_increment,
    id_enquete int not null,
    nome varchar(200),
    quantidade int,
    foreign key (id_enquete) references enquete(id) --referencia ao id tabela enquete
);

-- Insert de uma nova enquete e respostas
insert into enquete(nome) values('Qual carreira você deseja seguir em desenvolvimento?');

--para descobrir o id da enquete
select id from enquete where nome = 'Qual carreira você deseja seguir em desenvolvimento?';

insert  into resposta(id_enquete, nome, quantidade) values(1,'Front End',0);
insert  into resposta(id_enquete, nome, quantidade) values(1,'Back End',0);
insert  into resposta(id_enquete, nome, quantidade) values(1,'Full Stack',0);
insert  into resposta(id_enquete, nome, quantidade) values(1,'UI/UX',0);

--limpar respostas
truncate table enquete;