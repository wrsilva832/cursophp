CREATE TABLE admin(
    id int primary key auto_increment,
    email varchar(120) unique,
    senha varchar(120)
);
CREATE TABLE portaria(
    id int primary key auto_increment,
    id_portaria int NOT NULL,
    nome varchar(250),
    placa varchar(10),
    h_entrada time,
    h_saida time,
    FOREIGN KEY (id_portaria) REFERENCES admin(id)
);
insert into admin(email,senha) values("teste@gmail.com","0123");
