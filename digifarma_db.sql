/*criando o banco:*/
create database digifarma_db;

/*usando o mesmo bacno* */
use digifarma_db;

/*criando a tabela de usuarios pois serão dois usuarios:
adm==1
vendedor==2
*/
create table usuario(
	id int auto_increment primary key,
    nome varchar(50),
    senha varchar(20),
    cargo int,
    salario double,
    bloqueio boolean
);

/*criando a tabela de produtos*/
create table medicamento(
	id int auto_increment primary key,
    nome varchar(50),
    quantidade int,
    data_validade date,
    preco  double,
    disponivel boolean,
    endereco_foto text
);

/*criando a tabela de vendas*/
create table venda(
	id int auto_increment primary key,
    id_usuario int,
    nome_cliente varchar(50),
    data_da_venda date,
    valor_de_entrada double,
    valor_de_saida double,
    lucro double,
    foreign key(id_usuario) references usuario(id)
);

/*criando a tabelas dos produtos vendidos, pois pode ser mais de um produto7*/
create table venda_produto(
	id int auto_increment primary key,
    id_venda int,
    id_medicamento int,
    quantidade_medicamento int,
    foreign key(id_venda) references venda(id),
	foreign key(id_medicamento) references medicamento(id)
);

/*criando a tabela de finanças */
create table financa (
	id int auto_increment primary key,
	data_financa date,
    orcamento double,
    saida double
);

create table devolucao(
    id int auto_increment primary key,
    id_venda int,
    id_usuario int,
    foreign key(id_usuario) references usuario(id),
    foreign key(id_venda) references venda(id)
);

create table saidas(
	id int AUTO_INCREMENT PRIMARY KEY,
    motivo varchar(50),
    data_saida date,
    valor double
);