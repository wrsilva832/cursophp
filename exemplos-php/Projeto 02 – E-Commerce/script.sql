create table admin(
    id int primary key auto_increment,
    email varchar(100) unique,
    senha varchar(100)
);

create table produto(
    id int primary key auto_increment,
    nome varchar(200),
    valor float,
    image varchar(200)
);

insert into admin(email,senha) values("wellington@gmail.com","0123");
-- ok