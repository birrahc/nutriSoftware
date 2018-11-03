create database nutricao;
use nutricao;
create table sexo(
id_sexo int auto_increment,
sexo varchar(12),
primary key(id_sexo)
);
insert into sexo(sexo)values('M'),('F');

create table tipo(
id_tipo int auto_increment,
tipo varchar(45),
primary key(id_tipo)
);

insert into tipo(tipo)values
('Consulta'),
('Retorno'),
('Consulta Pacote'),
('Retorno Pacote'),
('Desafio');

create table local_atendimento(
id_local int auto_increment,
nome varchar(45),
endereco varchar(60),
telefone varchar(13),
primary key (id_local)
);


insert into local_atendimento(nome)values
('Consultorio Campinas SJ'),
('Consultório Palhoça'),
('Soma Palhoça'),
('Guarani Palhoça');

create table local_almoco(
id_local_alm int auto_increment,
local_almoco varchar(50),
primary key(id_local_alm)
);

insert into local_almoco(local_almoco)values
('Trabalho'),
('Em Casa');


create table pacientes(
id_paciente int auto_increment,
nome varchar(45),
sexo int,
data_nascimento date,
profissao varchar(45),
telefone varchar(12),
email varchar(45),
primary key(id_paciente),
foreign key(sexo) references sexo(id_sexo)
);

create table classificacao(
id_class int auto_increment,
tipo_class int,
descricao varchar(60),
data_inicial date,
data_final date,
paciente_class int,
primary key(id_class),
foreign key(tipo_class)references tipo(id_tipo),
foreign key(paciente_class)references pacientes(id_paciente)
);


create table anaminese(
id_anaminese int auto_increment,
paciente int unique key,
objetivo varchar(60),
diagnostico_medico varchar(45),
exames varchar(45),
medicamentos varchar(50),
suplementos varchar(45),
historico_familiar varchar(45),
sinais_sintomas varchar(45),
habito_intestinal varchar(45),
tabagismo varchar(45),
etilismo varchar(45),
Atividades_fisicas varchar(45),
primary key(id_anaminese),
foreign key(paciente)references pacientes(id_paciente)
);

create table avaliacao_antropometrica(
id_avalicao int auto_increment,
tipo_aval int,
paciente int,
consulta int,
data_avalicao date,
peso float,
c_cintura float,
c_abdominal float,
c_quadril float,
c_peito float,
c_braco_d float,
c_braco_e float,
c_coxa_d float,
c_coxa_e float,
dc_triceps float,
dc_escapular float,
dc_supra_iliaca float,
dc_abdominal float,
dc_axilar float,
dc_peitoral float,
dc_coxa float,
primary key(id_avalicao),
foreign key(tipo_aval)references tipo(id_tipo),
foreign key(paciente)references pacientes(id_paciente)
);

create table afirmacao(
id_afirmacao int auto_increment,
afirmacao varchar(45),
primary key(id_afirmacao)
);

insert into afirmacao(afirmacao)values('Sim'),('Não');

create table consumos(
id_consumo int auto_increment,
paciente_id int unique key,
agua int,
obs_agua varchar(45),
sucos int,
obs_sucos varchar(45),
durante_refeicoes int,
obs_refeicoes varchar(45),
acucares int, 
obs_acucares varchar(45),
sodio int,
obs_sodio varchar(45),
refrigerantes int,
obs_refri varchar(45),
cereais int,
obs_cereais varchar(45),
frutas int,
obs_frutas varchar(45),
verduras int,
obs_verduras varchar(45),
local_almoco int,
preferencias varchar(45),
aversoes varchar(45),
primary key(id_consumo),
foreign key(agua)references afirmacao(id_afirmacao),
foreign key(sucos)references afirmacao(id_afirmacao),
foreign key(durante_refeicoes)references afirmacao(id_afirmacao),
foreign key(acucares)references afirmacao(id_afirmacao),
foreign key(sodio)references afirmacao(id_afirmacao),
foreign key(refrigerantes)references afirmacao(id_afirmacao),
foreign key(cereais)references afirmacao(id_afirmacao),
foreign key(frutas)references afirmacao(id_afirmacao),
foreign key(verduras)references afirmacao(id_afirmacao),
foreign key(local_almoco)references local_almoco(id_local_alm)
);



create table status(
id_status int auto_increment,
status varchar(45),
primary key(id_status)
);

insert into status(status) values ('Confirmado'), ('Cancelado');

create table agenda(
id_agenda int auto_increment,
paciente int,
data_consulta date,
horario time,
tipo int,
status int,
primary key(id_agenda),
foreign key(paciente)references pacientes(id_paciente),
foreign key(tipo)references tipo(id_tipo),
foreign key(status)references status(id_status)
);

create table dietas(
id_dieta int auto_increment,
plano_alimentar varchar(60),
paciente int,
data_dieta date,
alimento varchar(60),
quantidade float,
substituicao varchar(60),
intervalos varchar(60),
primary key(id_dieta),
foreign key(paciente)references pacientes(id_paciente)
);

create table anotacoes(
id_anotacao int auto_increment,
data_antocao date,
paciente_anot int,
decricao text,
primary key(id_anotacao),
foreign key(paciente_anot)references pacientes(id_paciente));

create table login(
id_login int auto_increment,
login varchar(60),
senha varchar(60),
permissao int,
primary key(id_login)
);

SELECT  id_consumo,p .nome, agua.afirmacao, obs_agua, sucos.afirmacao, obs_sucos, refeicao.afirmacao, obs_refeicoes,
acucares.afirmacao, obs_acucares, sodio.afirmacao, obs_sodio, refri.afirmacao, obs_refri, cereais.afirmacao,
obs_cereais, frutas.afirmacao, obs_frutas, verduras.afirmacao, obs_verduras,l.local_almoco, preferencias,
aversoes FROM consumos c
inner join pacientes p on paciente_id=p.id_paciente
inner join afirmacao agua on agua= agua.id_afirmacao
inner join afirmacao sucos on sucos= sucos.id_afirmacao
inner join afirmacao refeicao on durante_refeicoes= refeicao.id_afirmacao
inner join afirmacao acucares on acucares= acucares.id_afirmacao
inner join afirmacao sodio on sodio= sodio.id_afirmacao
inner join afirmacao refri on refrigerantes= refri.id_afirmacao
inner join afirmacao cereais on cereais= cereais.id_afirmacao
inner join afirmacao frutas on frutas= frutas.id_afirmacao
inner join afirmacao verduras on verduras= verduras.id_afirmacao
inner join local_almoco l on c.local_almoco= l.id_local_alm


