CREATE TABLE usuarios(
    id int primary key auto_increment,
    id_admin int,
    email varchar(120) unique,
    senha varchar(120)
);
CREATE TABLE tarefas(
    id int primary key auto_increment,
    id_admin int,
    id_tarefa int,
    nome varchar(250)
);
insert into admin(email,senha) values("wrsilva832@gmail.com","0123");
insert into admin(email,senha) values("wellington@gmail.com","0123");
-- ok