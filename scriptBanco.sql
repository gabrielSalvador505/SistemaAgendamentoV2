create database SITE_AGENDA;

create table servico(
cod_servico INT PRIMARY KEY,
nome_servico VARCHAR(45),
descricao_servico VARCHAR(200),
valor_servico FLOAT(5,2),
duracao_servico TIME);

create table jornada(
cod_jornada INT PRIMARY KEY,
entrada_jornada TIME,
saida_intervalo_jornada TIME,
entrada_intervalo_jornada TIME,
saida_jornada TIME);

create table funcionario(	
id_func INT PRIMARY KEY,
nome_func VARCHAR(45),
telefone_func BIGINT(11),
endereco_func VARCHAR(45),
data_nasc_func DATE,
senha_func VARCHAR(32),
email_func VARCHAR(45),
jornada_cod INT,
servico_cod INT,
CONSTRAINT FK_CodJornada FOREIGN KEY(jornada_cod) references jornada(cod_jornada),
CONSTRAINT FK_CodServico FOREIGN KEY(servico_cod) references servico(cod_servico));

create table cliente(
id_cliente INT PRIMARY KEY,
nome_cliente VARCHAR(45),
telefone_cliente BIGINT(11),
email_cliente VARCHAR(45),
senha_cliente VARCHAR(32));

create table agendamento(
cod_agendamento INT PRIMARY KEY,
cliente_id INT,
dia_cod INT,
hora_cod INT,
CONSTRAINT FK_IdCLiente FOREIGN KEY(cliente_id) references cliente(id_cliente),
CONSTRAINT FK_CodDia FOREIGN KEY(dia_cod) references dia(cod_dia),
CONSTRAINT FK_CodHora FOREIGN KEY(hora_cod) references hora(hora_cod));

create table servico_agendamento(
servico_cod INT,
agendamento_cod INT,
CONSTRAINT FK_CodServico FOREIGN KEY(servico_cod) references servico(cod_servico),
CONSTRAINT FK_CodAgendamento FOREIGN KEY(agendamento_cod) references agendamento(cod_agendamento));

