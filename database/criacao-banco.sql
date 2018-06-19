-- -----------------------------------------------------
-- Table BancoRamon.produto
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS BancoRamon.produto (
  idProduto INT NOT NULL auto_increment,
  Nome VARCHAR(200) NOT NULL,
  Descrição VARCHAR(200) NOT NULL,
  PRIMARY KEY (idProduto));


-- -----------------------------------------------------
-- Table BancoRamon.users
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS BancoRamon.users (
  idpessoasCad INT NOT NULL auto_increment,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  senha VARCHAR(250) NOT NULL,
  tipoUsuario ENUM('admin', 'representante', 'cliente') NOT NULL,
  PRIMARY KEY (idpessoasCad));


-- -----------------------------------------------------
-- Table BancoRamon.juridica
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS BancoRamon.juridica (
  idjuridica INT NOT NULL auto_increment,
  inscricaoEstadual VARCHAR(200) NULL,
  cnpj VARCHAR(200) NOT NULL,
  idpessoasCad INT NOT NULL,
  representante TINYINT NOT NULL,
  PRIMARY KEY (idjuridica),
  CONSTRAINT fk_juridica_clientesCad1
    FOREIGN KEY (idpessoasCad)
    REFERENCES BancoRamon.users (idpessoasCad)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table BancoRamon.telefone
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS BancoRamon.telefone (
  idtelefone INT NOT NULL auto_increment,
  telefone VARCHAR(30) NOT NULL,
  idpessoasCad INT NOT NULL,
  PRIMARY KEY (idtelefone),
  CONSTRAINT fk_telefone_clientesCad1
    FOREIGN KEY (idpessoasCad)
    REFERENCES BancoRamon.users (idpessoasCad)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table BancoRamon.endereco
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS BancoRamon.endereco (
  idendereco INT NOT NULL auto_increment,
  rua VARCHAR(45) NOT NULL,
  numero VARCHAR(45) NOT NULL,
  bairro VARCHAR(45) NOT NULL,
  cidade VARCHAR(45) NOT NULL,
  estado VARCHAR(45) NOT NULL,
  complemento VARCHAR(45) NULL,
  cep VARCHAR(45) NOT NULL,
  idpessoasCad INT NOT NULL,
  PRIMARY KEY (idendereco),
  CONSTRAINT fk_endereco_clientesCad1
    FOREIGN KEY (idpessoasCad)
    REFERENCES BancoRamon.users (idpessoasCad)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table BancoRamon.fisica
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS BancoRamon.fisica (
  idfisica INT NOT NULL auto_increment,
  cpf VARCHAR(45) NOT NULL,
  idpessoasCad INT NOT NULL,
  PRIMARY KEY (idfisica),
  CONSTRAINT fk_fisica_clientesCad1
    FOREIGN KEY (idpessoasCad)
    REFERENCES BancoRamon.users (idpessoasCad)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table BancoRamon.requerimento
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS BancoRamon.requerimento (
  idrequerimento INT NOT NULL auto_increment,
  qntIndividual INT NULL DEFAULT '0',
  qntDisplay INT NULL DEFAULT '0',
  qntSm INT NULL DEFAULT '0',
  qntCaixaMasterDisplay INT NULL DEFAULT '0',
  qntCaixaMasterSM INT NULL DEFAULT '0',
  qntCaixaMasterIndInvidual INT NULL DEFAULT '0',
  recebedor INT NOT NULL,
  emissor INT NOT NULL,
  PRIMARY KEY (idrequerimento),
  CONSTRAINT fk_requerimento_users2
    FOREIGN KEY (recebedor)
    REFERENCES BancoRamon.users (idpessoasCad)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_requerimento_users1
    FOREIGN KEY (emissor)
    REFERENCES BancoRamon.users (idpessoasCad)
    ON DELETE CASCADE
    ON UPDATE CASCADE);



Create view TotalProdutosOrcamentados AS(
    SELECT SUM(qntIndividual) as Individual,
    SUM(qntCaixaMasterIndInvidual) as CaixaMasterIndInvidual,
    SUM(qntDisplay) as Display,
    SUM(qntCaixaMasterDisplay) as CaixaMasterDisplay,
    SUM(qntSm) as SM,
    SUM(qntCaixaMasterSM) as CaixaMasterSM
    FROM requerimento
  );

Create view dadosUsuarioFisica AS(
  SELECT nome as Nome,
    email as Email,
    cpf as CPF,
    CONCAT(rua,", ", numero,", ",bairro,". ",cidade," - ",estado," ",complemento)
      as Endereco,
    cep as CEP
   FROM users, fisica, endereco
    WHERE (
    users.idpessoasCad = endereco.idpessoasCad
    and users.idpessoasCad = fisica.idpessoasCad )
    order by nome
  );


Create view dadosUsuarioJuridica AS(
  SELECT nome as Nome,
    email as Email,
    CNPJ as CNPJ,
    inscricaoEstadual as InscricaoEstadual,
    CONCAT(rua,", ", numero,", ",bairro,". ",cidade," - ",estado," ",complemento)
      as Endereco,
    cep as CEP
   FROM users, juridica, endereco
    WHERE (
    users.idpessoasCad = endereco.idpessoasCad
    and users.idpessoasCad = juridica.idpessoasCad
   )
    order by nome
  );


  Create view telefonesUsuarios AS(
    SELECT users.nome, b.telefone, b.idpessoasCad
    from users, telefone as b
    WHERE users.idpessoasCad = b.idpessoasCad
    ORDER BY b.idpessoasCad ASC
  );


INSERT INTO users(nome, email, senha, tipoUsuario)
 VALUES ('Lorenzo Noah Pedro Henrique Almada','lorenzo@email.com','1234','cliente');
INSERT INTO users(nome, email, senha, tipoUsuario)
 VALUES ('Lucas Davi Pires','lucas@email.com','1234','cliente');
INSERT INTO users(nome, email, senha, tipoUsuario)
 VALUES ('Mateus Emanuel Samuel Ramos','mateus@email.com','1234','representante');
INSERT INTO users(nome, email, senha, tipoUsuario)
 VALUES ('Luiz Eduardo Erick Lima','luiz@email.com','1234','cliente');
INSERT INTO users(nome, email, senha, tipoUsuario)
 VALUES ('Gael Gabriel Theo Novaes','gael@email.com','AZ6KwtZwof','representante');


INSERT INTO telefone(telefone, idpessoasCad)
  VALUES ('(95) 98878-5016',1);
INSERT INTO telefone(telefone, idpessoasCad)
  VALUES ('(81) 99231-3658',4);
INSERT INTO telefone(telefone, idpessoasCad)
  VALUES ('(65) 99821-2706',2);
INSERT INTO telefone(telefone, idpessoasCad)
  VALUES ('(91) 99682-6641',3);
INSERT INTO telefone(telefone, idpessoasCad)
  VALUES ('(89) 98305-6812',3);
INSERT INTO telefone(telefone, idpessoasCad)
  VALUES ('(89) 3533-9849',1);
INSERT INTO telefone(telefone, idpessoasCad)
  VALUES ('(83) 99733-4301',5);


INSERT INTO endereco(rua, numero, bairro, cidade,
  estado, complemento, cep,idpessoasCad)
 VALUES ('Conceicao','2','Heliópolis','Belo Horizonte',
   'MG','ap 306','39400265','1');
INSERT INTO endereco(rua, numero, bairro, cidade,
  estado, complemento, cep,idpessoasCad)
 VALUES ('Nair Pentagna Guimarães','3','Serrano','Belo Horizonte',
   'MG','casa','39401145','2');
INSERT INTO endereco(rua, numero, bairro, cidade,
  estado, complemento, cep,idpessoasCad)
 VALUES ('Caiçara','4','Planalto','Montes Claros',
   'MG','casa','39401184','3');
INSERT INTO endereco(rua, numero, bairro, cidade,
  estado, complemento, cep,idpessoasCad)
 VALUES ('Mário de Andrade','5','Centro','Montes Claros',
   'MG','','39401745','4');
INSERT INTO endereco(rua, numero, bairro, cidade,
  estado, complemento, cep,idpessoasCad)
 VALUES ('Travessa Braz Morais','478','São Sebastião','Patos',
   'PB','','58706-328','5');


INSERT INTO juridica(inscricaoEstadual, cnpj, idpessoasCad, representante)
 VALUES ('','22.185.624/0001-63',3,1);
INSERT INTO juridica(inscricaoEstadual, cnpj, idpessoasCad, representante)
 VALUES ('354.410.370/9203','53.951.555/0001-85',1,0);


INSERT INTO fisica(cpf, idpessoasCad)
 VALUES ('658.380.680-00',2);
INSERT INTO fisica(cpf, idpessoasCad)
 VALUES ('116.654.726-42',4);
INSERT INTO fisica(cpf, idpessoasCad)
 VALUES ('471.382.090-37',5);


INSERT INTO produto( Nome, Descrição)
  VALUES ('Embalagem Individual','Em BOPP (sistema Flow Pack), código de barras GS1,
    validade, informação nutricional e demais informações.');
INSERT INTO produto( Nome, Descrição)
  VALUES ('SM – 100g','Contém 04 barras de 25g.
    Validade, informação nutricional e demais informações.');
INSERT INTO produto( Nome, Descrição)
  VALUES ('Embalagem de 450 g','Contém 18 barras de 25 g.
      Embalagem moderna, selada com poliolefínico, informação nutricional,
      validade, código de barra GS1 e demais informações.');
INSERT INTO produto( Nome, Descrição)
  VALUES ('Caixa transporte - Embalagem SM','Com 56 embalagens de 100g.
      Peso: 5,6 Kg');
INSERT INTO produto( Nome, Descrição)
  VALUES ('Caixa transporte - Embalagem 450g','Com 32 embalagens de 450g.
      Peso: 14,4 Kg.');
INSERT INTO produto( Nome, Descrição)
  VALUES ('Embalagem 10 Kg','Com 400 barras de 25g.
    Para atender a merenda escolar, cantinas, cozinhas industriais e demais
    segmentos que não necessitam da embalagem intermediária.');



ALTER TABLE users ADD qntReqEnviado
INT NOT NULL DEFAULT '0' AFTER tipoUsuario;

ALTER TABLE users ADD qntReqRecebido
INT NOT NULL DEFAULT '0' AFTER qntReqEnviado;

delimiter //
CREATE PROCEDURE atualizaUserReq (
  IN idrecebedor int, in idemissor int, in id int
)
  BEGIN
    Declare qntEmissorAtual INT;
    Declare qntRecebedorAtual INT;

   	set @qntEmissorAtual = (select qntReqEnviado from users, requerimento
      where requerimento.idrequerimento = id
      and users.idpessoasCad = requerimento.emissor
    );
    set @qntRecebedorAtual = (select qntReqRecebido from users, requerimento
      where requerimento.idrequerimento = id
      and users.idpessoasCad = requerimento.recebedor);

     UPDATE users SET qntReqEnviado = @qntEmissorAtual + 1
     WHERE idpessoasCad = idemissor;
     UPDATE users SET qntReqRecebido = @qntRecebedorAtual + 1
     WHERE idpessoasCad = idrecebedor;
  END//
delimiter ;



delimiter //
CREATE TRIGGER atualizaUser after insert ON requerimento
FOR EACH ROW
BEGIN
  call atualizaUserReq (new.recebedor, new.emissor, new.idrequerimento);
END//
delimiter ;

  INSERT INTO requerimento(
  qntIndividual, qntDisplay, qntSm,
  qntCaixaMasterDisplay, qntCaixaMasterSM,
  qntCaixaMasterIndInvidual, recebedor, emissor)
  VALUES ('10','20','30','25','0','0','3','2');
  INSERT INTO requerimento(
  qntIndividual, qntDisplay, qntSm,
  qntCaixaMasterDisplay, qntCaixaMasterSM,
  qntCaixaMasterIndInvidual, recebedor, emissor)
  VALUES ('10','20','30','25','0','0','3','3');
  INSERT INTO requerimento(
  qntIndividual, qntDisplay, qntSm,
  qntCaixaMasterDisplay, qntCaixaMasterSM,
  qntCaixaMasterIndInvidual, recebedor, emissor)
  VALUES ('50','30','30','35','0','0','3','1');
  INSERT INTO requerimento(
  qntIndividual, qntDisplay, qntSm,
  qntCaixaMasterDisplay, qntCaixaMasterSM,
  qntCaixaMasterIndInvidual, recebedor, emissor)
  VALUES ('25','0','10','25','10','30','5','3');
  INSERT INTO requerimento(
  qntIndividual, qntDisplay, qntSm,
  qntCaixaMasterDisplay, qntCaixaMasterSM,
  qntCaixaMasterIndInvidual, recebedor, emissor)
  VALUES ('0','0','0','50','20','20','5','2');



SELECT * from dadosUsuarioJuridica;
SELECT * from dadosUsuarioFisica;
SELECT * from telefonesUsuarios;
SELECT * from requerimento;
SELECT * from TotalProdutosOrcamentados;


DELETE FROM users WHERE idpessoasCad = 2;
DELETE FROM users WHERE idpessoasCad = 4;

DELETE FROM requerimento WHERE idrequerimento = 5;
