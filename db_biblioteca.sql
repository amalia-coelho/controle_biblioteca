create database db_biblioteca;
use db_biblioteca;

create table tb_tipo(
	cd_tipo int primary key auto_increment,
    nm_tipo varchar(40)
);

create table tb_idioma(
	cd_idioma int primary key auto_increment,
    nm_idioma varchar(40)
);

create table tb_livro_idioma(
	cd_livro_idioma int primary key auto_increment,
    id_livro int,
    id_idioma int
);

create table tb_coletanea(
	cd_coletanea int primary key auto_increment,
    nm_coletanea varchar(100) not null,
    id_tipo int
);

create table tb_livro(
	cd_livro int primary key auto_increment,
    nm_livro varchar(100) not null,
    nr_paginas int,
    id_editora int, 
    dt_lancamento date,
    ds_descricao varchar(200),
    st_disponibilidade char(3) not null,
    ds_image varchar(300),
    ds_video varchar(200),
    ds_audio varchar(200),
    ds_sumario varchar(200),
    id_coletanea int
);

create table tb_editora(
	cd_editora int primary key auto_increment,
    nm_editora varchar(100) not null
);

create table tb_genero(
	cd_genero int primary key auto_increment,
    nm_genero varchar(100) not null
);

create table tb_genero_livro(
	cd_genero_livro int primary key auto_increment,
    id_genero int,
    id_livro int
);

create table tb_usuario(
	cd_usuario int primary key auto_increment,
    nm_usuario varchar(100) not null,
    ds_login varchar(30) not null,
    ds_senha varchar(10) not null,
    id_nivel int,
    dt_nascimento date not null,
    ds_imagem varchar(100),
    nr_rm int
);

create table tb_genero_usuario(
	cd_genero_usuario int primary key auto_increment,
    id_genero int,
    id_usuario int
);

create table tb_nivel(
	cd_nivel int primary key auto_increment,
    nm_nivel varchar(100) not null
);

create table tb_autor(
	cd_autor int primary key auto_increment,
    nm_autor varchar(100) not null
);

create table tb_livro_autor(
	cd_livro_autor int primary key auto_increment,
    id_livro int,
    id_autor int
);

create table tb_sugestao(
	cd_sugestao int primary key auto_increment,
    ds_livro varchar(200) not null,
    nr_isbn int not null,
    id_usuario int,
    nr_curtida int,
    nr_descurtida int
);

create table tb_livro_usuario(
	cd_avaliacao_usuario int primary key auto_increment,
    nr_avaliacao_usuario double(2, 1),
    id_usuario int,
    id_livro int,
    ds_comentario varchar(400),
    st_nao_recomendo char(3),
    id_status_livro int,
    st_favorito char(3)
);

create table tb_status_livro(
	cd_status_livro int primary key auto_increment,
    ds_status varchar(100)
);
alter table tb_livro_idioma add foreign key fk_livro_idioma_livro(id_livro) references tb_livro(cd_livro);
alter table tb_livro_idioma add foreign key fk_livro_idioma_idioma(id_idioma) references tb_idioma(cd_idioma);
alter table tb_coletanea add foreign key fk_coletanea_tipo(id_tipo) references tb_tipo(cd_tipo);
alter table tb_livro add foreign key fk_livro_editora(id_editora) references tb_editora(cd_editora);
alter table tb_livro add foreign key fk_livro_coletanea(id_coletanea) references tb_coletanea(cd_coletanea);
alter table tb_genero_livro add foreign key fk_genero_livro_genero(id_genero) references tb_genero(cd_genero);
alter table tb_genero_livro add foreign key fk_genero_livro_livro(id_livro) references tb_livro(cd_livro);
alter table tb_usuario add foreign key fk_usuario_nivel(id_nivel) references tb_nivel(cd_nivel);
alter table tb_genero_usuario add foreign key fk_genero_usuario_genero(id_genero) references tb_genero(cd_genero);
alter table tb_genero_usuario add foreign key fk_genero_usuario_usuario(id_usuario) references tb_usuario(cd_usuario);
alter table tb_livro_autor add foreign key fk_livro_autor_livro(id_livro) references tb_livro(cd_livro);
alter table tb_livro_autor add foreign key fk_livro_autor_autor(id_autor) references tb_autor(cd_autor);
alter table tb_sugestao add foreign key fk_sugestao_usuario(id_usuario) references tb_usuario(cd_usuario);
alter table tb_livro_usuario add foreign key fk_livro_usuario_usuario(id_usuario) references tb_usuario(cd_usuario);
alter table tb_livro_usuario add foreign key fk_livro_usuario_livro(id_livro) references tb_livro(cd_livro);
alter table tb_livro_usuario add foreign key fk_livro_usuario_status_livro(id_status_livro) references tb_status_livro(cd_status_livro);