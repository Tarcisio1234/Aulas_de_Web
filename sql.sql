create database tintas_web default character set utf8mb4 collate utf8mb4_general_ci;

create table gerenciamento(idProduto int  auto_increment not null primary key, nome varchar(18) not null, descricao text(100) not null, marca varchar(18), cor varchar(15) not null, tipo varchar(15) not null, unidadeMedida double not null, precoCusto double not null, precoVenda double not null);


create table cadCliente(idCliente int not null auto_increment primary key, nome varchar (45) not null, cpf double, cnpj varchar(20), celular varchar(20) not null, rua varchar(60) not null, numero varchar(10) not null, bairro varchar(15) not null, cidade varchar(20) not null, estado varchar(15)not null );


create table cadFornecedor(idFornecedor int not null auto_increment primary key, nome varchar (45) not null, cnpj varchar(20) not null, celular varchar(20) not null, rua varchar(60) not null, numero varchar(10) not null, bairro varchar(15) not null, cidade varchar(20) not null, estado varchar(15)not null );

create table vendas(idVenda int not null auto_increment primary key, idCliente int, idProduto int, dataVenda date, qtdVenda int, formaPagamento varchar(20), valorTotal double, numeNF double, descricao varchar(25));

alter table vendas add constraint fkCliente foreign key (idVenda) references cadcliente(idCliente);

alter table vendas add constraint fkProduto foreign key (idVenda) references gerenciamento(idProduto);


alter table vendas drop foreign key fkCliente;

alter table vendas drop foreign key fkProduto;vendas

alter table vendas add constraint fkCliente foreign key(idCliente) references cadCliente(idCliente);

alter table vendas add constraint fkProduto foreign key(idProduto) references gerenciamento(idProduto);