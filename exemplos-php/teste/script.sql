CREATE TABLE admin(
    id int primary key auto_increment,
    email varchar(120) unique,
    senha varchar(120)
);
CREATE TABLE tarefas(
    id int primary key auto_increment,
    id_tarefa int NOT NULL,
    nome varchar(250)
    FOREIGN KEY (id_tarefa) REFERENCES admin(id);
);
insert into admin(email,senha) values("seu email aqui","sua senha aqui");
-- ok


-- IGNORAR

CREATE TABLE enquete(
    id int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(200)
);

CREATE TABLE resposta(
    id int PRIMARY KEY AUTO_INCREMENT,
    id_enquente int NOT NULL,
    nome varchar(200),
    quantidade int,
    FOREIGN KEY (id_enquente) REFERENCES enquete(id)
);