
CREATE DATABASE glsystem;
USE glsystem;
Create table glsystem.cargo(
id Int Primary key auto_increment,
nome_cargo Varchar(255)
);

Create table endereco(
id Int Primary key Not Null auto_increment,
cidade Varchar(55) Not Null,
estado Varchar(55) Not Null,
cep Varchar(9) Not Null,
endereco Varchar(55) Not Null,
bairro Varchar (55) Not Null,
numero int Not Null,
complemento Varchar(55) Not Null
);

Create table glsystem.funcionario(
id Int Primary key Not Null auto_increment,
nome_completo Varchar(55) Not Null,
dt_nascimento Date Not Null,
rg Varchar(12) Not Null,
cpf Varchar(14) Not Null,
id_Cargo Int Not Null,
dt_admissao date Not Null,
salario Float Not Null,
contato Varchar(15),
id_endereco Int Not Null,
CONSTRAINT fk_cargo FOREIGN KEY (id_cargo) REFERENCES cargo(id),
CONSTRAINT fk_endereco FOREIGN KEY (id_endereco) REFERENCES endereco(id) 
);

Create table glsystem.cliente(
id Int Primary key auto_increment,
nome Varchar(255) Not Null,
cpf Varchar(14)
);

Create table glsystem.venda(
id Int Primary key auto_increment,
id_funcionario Int Not null,
vlr_final Float Not Null,
id_cliente Int ,
CONSTRAINT fk_funcionario FOREIGN KEY (id_funcionario) REFERENCES funcionario(id),
CONSTRAINT fk_cliente FOREIGN KEY (id_cliente) REFERENCES cliente(id) 
);

Create table glsystem.tipo_pagamento(
id Int Primary key auto_increment,
desc_tipo_pagamento Varchar(255) Not Null
);

Create table glsystem.pagamento(
id Int Primary key auto_increment,
id_tipo_pagamento Int Not Null,
id_venda int Not Null,
CONSTRAINT fk_venda FOREIGN KEY (id_venda) REFERENCES venda(id),
CONSTRAINT fk_tipo_pagamento FOREIGN KEY (id_tipo_pagamento) REFERENCES tipo_pagamento(id)
);

Create table glsystem.ingrediente(
id Int Primary key auto_increment,
nome_ingrediente Varchar(255) Not Null
);

Create table glsystem.medida(
id Int Primary key auto_increment,
tipo_medida Varchar(255) Not Null,
id_ingrediente Int Not Null,
CONSTRAINT fk_ingrediente FOREIGN KEY (id_ingrediente) REFERENCES ingrediente(id) 
);

Create table glsystem.clas_fornecedor(
id Int Primary Key auto_increment,
nome_desc Varchar(55)
);

Create table glsystem.fornecedor(
id Int Primary key auto_increment,
cnpj Varchar(21) Not Null,
nome_fornecedor Varchar(55) Not Null,
nome_fantasia Varchar(55),
e_mail Varchar(55),
cep Varchar(9) Not Null,
contato Varchar(15),
celular Varchar(15),
nome_contato varchar(55),
id_clas_fornecedor Int Not Null,
id_endereco Int Not Null,
CONSTRAINT fk_clas_fornecedor FOREIGN KEY (id_clas_fornecedor) REFERENCES clas_fornecedor(id),
CONSTRAINT fk_endereco1 FOREIGN KEY (id_endereco) REFERENCES endereco(id) 
);

Create table glsystem.Estoque(
id Int Primary key auto_increment,
id_ingrediente Int Not Null,
qtde Float Not Null,
CONSTRAINT fk_ingrediente2 FOREIGN KEY (id_ingrediente) REFERENCES ingrediente(id)
);

Create table glsystem.entrega(
id Int Primary key auto_increment,
id_Fornecedor Int Not Null,
dt_Pedido Datetime Not Null,
dt_Recebido Datetime,
vlr_Total Float Not Null,
CONSTRAINT fk_fornecedor FOREIGN KEY (id_fornecedor) REFERENCES fornecedor(id)
);

Create table glsystem.Item_Entrega(
id Int Primary key auto_increment,
id_ingrediente Int Not Null, 
qtde Float Not Null,
vlr_ingrediente Float Not Null,
id_entrega int Not Null,
id_estoque Int Not Null,
CONSTRAINT fk_ingrediente1 FOREIGN KEY (id_ingrediente) REFERENCES ingrediente(id),
CONSTRAINT fk_entrega1 FOREIGN KEY (id_entrega) REFERENCES entrega(id),
CONSTRAINT fk_estoque FOREIGN KEY (id_estoque) REFERENCES estoque(id)
);

Create table glsystem.receita(
id Int Primary key auto_increment,
nome_receita Varchar(55)
);

Create table glsystem.categoria(
id Int Primary key auto_increment,
nome_categoria Varchar(55)
);

Create table glsystem.categoria(
id Int Primary key auto_increment,
nome_categoria Varchar(55)
);

Create table glsystem.produto(
id Int Primary key auto_increment,
id_receita Int Not Null,
valor Float Not Null,
id_categoria Int Not Null,
id_categoria Int Not Null,
CONSTRAINT fk_receita FOREIGN KEY (id_receita) REFERENCES receita(id),
CONSTRAINT fk_categoria FOREIGN KEY (id_categoria) REFERENCES categoria(id),
CONSTRAINT fk_categoria FOREIGN KEY (id_categoria) REFERENCES categoria(id)
);

Create table glsystem.Item_receita(
id Int Primary key auto_increment,
id_ingrediente Int Not Null,
qtde Float Not Null,
id_receita Int Not Null,
CONSTRAINT fk_receita1 FOREIGN KEY (id_receita) REFERENCES receita(id)
);

Create table glsystem.item_venda(
id Int Primary key auto_increment,
id_venda Int Not Null,
id_produto Int Not Null,
qtde Float Not Null,
CONSTRAINT fk_produto FOREIGN KEY (id_produto) REFERENCES produto(id),
CONSTRAINT fk_venda1 FOREIGN KEY (id_venda) REFERENCES venda(id)
);

Create table glsystem.login(
id Int Primary key auto_increment,
id_funcionario Int Not Null,
senha Varchar(30),
CONSTRAINT fk_funcionario1 FOREIGN KEY (id_funcionario) REFERENCES funcionario(id)
);