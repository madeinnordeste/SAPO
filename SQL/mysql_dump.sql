# Sequel Pro dump
# Version 1630
# http://code.google.com/p/sequel-pro
#
# Host: 127.0.0.1 (MySQL 5.1.33)
# Database: sap
# Generation Time: 2010-04-16 16:25:41 -0300
# ************************************************************

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table acessos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `acessos`;

CREATE TABLE `acessos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_acesso_id` int(11) NOT NULL,
  `metodo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=726 DEFAULT CHARSET=latin1;

LOCK TABLES `acessos` WRITE;
/*!40000 ALTER TABLE `acessos` DISABLE KEYS */;
INSERT INTO `acessos` (`id`,`grupo_acesso_id`,`metodo`)
VALUES
	(599,1,'advogados/lista'),
	(600,1,'advogados/formulario'),
	(598,1,'advogados/index'),
	(725,2,'usuarios/excluir'),
	(724,2,'usuarios/salvar'),
	(723,2,'usuarios/formulario'),
	(722,2,'usuarios/meu_cadastro'),
	(721,2,'usuarios/lista'),
	(720,2,'tipo_procedimentos/excluir'),
	(719,2,'tipo_procedimentos/salvar'),
	(718,2,'tipo_procedimentos/formulario'),
	(717,2,'relatorios/processos_esfera'),
	(716,2,'relatorios/processos_tempo'),
	(715,2,'processos/excluir'),
	(714,2,'processos/salvar'),
	(713,2,'processos/formulario'),
	(712,2,'processos/lista'),
	(711,2,'procedimentos/excluir'),
	(710,2,'procedimentos/salvar'),
	(709,2,'procedimentos/formulario'),
	(708,2,'pessoas/excluir'),
	(707,2,'pessoas/salvar'),
	(706,2,'pessoas/formulario'),
	(705,2,'pessoas/lista'),
	(704,2,'orgaos/excluir'),
	(703,2,'orgaos/salvar'),
	(702,2,'orgaos/formulario'),
	(701,2,'grupo_procedimentos/excluir'),
	(700,2,'grupo_procedimentos/salvar'),
	(699,2,'grupo_procedimentos/formulario'),
	(698,2,'grupo_procedimentos/lista'),
	(697,2,'grupo_acessos/excluir'),
	(696,2,'grupo_acessos/salvar'),
	(695,2,'grupo_acessos/formulario'),
	(694,2,'grupo_acessos/lista'),
	(693,2,'gavetas/excluir'),
	(692,2,'gavetas/salvar'),
	(691,2,'gavetas/formulario'),
	(690,2,'esferas/excluir'),
	(689,2,'esferas/salvar'),
	(688,2,'esferas/formulario'),
	(687,2,'esferas/lista'),
	(686,2,'armarios/excluir'),
	(685,2,'armarios/salvar'),
	(684,2,'armarios/formulario'),
	(683,2,'armarios/lista'),
	(682,2,'advogados/excluir'),
	(681,2,'advogados/salvar'),
	(679,2,'advogados/lista'),
	(680,2,'advogados/formulario'),
	(635,4,'tipo_procedimentos/excluir'),
	(634,4,'tipo_procedimentos/salvar'),
	(633,4,'tipo_procedimentos/formulario'),
	(632,4,'tipo_procedimentos/index'),
	(631,4,'relatorios/index'),
	(630,4,'processos/salvar'),
	(629,4,'processos/formulario'),
	(628,4,'processos/lista'),
	(627,4,'processos/index'),
	(626,4,'procedimentos/salvar'),
	(625,4,'procedimentos/formulario'),
	(624,4,'procedimentos/index'),
	(623,4,'pessoas/salvar'),
	(622,4,'pessoas/formulario'),
	(621,4,'pessoas/lista'),
	(620,4,'pessoas/index'),
	(619,4,'orgaos/salvar'),
	(618,4,'orgaos/formulario'),
	(617,4,'orgaos/index'),
	(616,4,'gavetas/salvar'),
	(615,4,'gavetas/formulario'),
	(614,4,'gavetas/index'),
	(613,4,'esferas/salvar'),
	(612,4,'esferas/formulario'),
	(611,4,'esferas/lista'),
	(610,4,'esferas/index'),
	(609,4,'armarios/salvar'),
	(608,4,'armarios/formulario'),
	(607,4,'armarios/lista'),
	(606,4,'armarios/index'),
	(605,4,'advogados/salvar'),
	(604,4,'advogados/formulario'),
	(603,4,'advogados/lista'),
	(602,4,'advogados/index'),
	(601,1,'advogados/salvar');

/*!40000 ALTER TABLE `acessos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table advogados
# ------------------------------------------------------------

DROP TABLE IF EXISTS `advogados`;

CREATE TABLE `advogados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `observacoes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

LOCK TABLES `advogados` WRITE;
/*!40000 ALTER TABLE `advogados` DISABLE KEYS */;
INSERT INTO `advogados` (`id`,`nome`,`observacoes`)
VALUES
	(1,'Leonardo Davinci',''),
	(7,'Albert Einstein','');

/*!40000 ALTER TABLE `advogados` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table armarios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `armarios`;

CREATE TABLE `armarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `observacoes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

LOCK TABLES `armarios` WRITE;
/*!40000 ALTER TABLE `armarios` DISABLE KEYS */;
INSERT INTO `armarios` (`id`,`nome`,`observacoes`)
VALUES
	(1,'Armario - Proc. Civil',''),
	(2,'Armario - Proc. Penal','');

/*!40000 ALTER TABLE `armarios` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table esferas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `esferas`;

CREATE TABLE `esferas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

LOCK TABLES `esferas` WRITE;
/*!40000 ALTER TABLE `esferas` DISABLE KEYS */;
INSERT INTO `esferas` (`id`,`nome`)
VALUES
	(1,'Civil'),
	(2,'Justiça Comum');

/*!40000 ALTER TABLE `esferas` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table gavetas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gavetas`;

CREATE TABLE `gavetas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `armario_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `observacoes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

LOCK TABLES `gavetas` WRITE;
/*!40000 ALTER TABLE `gavetas` DISABLE KEYS */;
INSERT INTO `gavetas` (`id`,`armario_id`,`nome`,`observacoes`)
VALUES
	(1,1,'A-Z',''),
	(2,1,'X,Y,V',''),
	(3,2,'Gaveta Zeta','');

/*!40000 ALTER TABLE `gavetas` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table grupo_acessos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `grupo_acessos`;

CREATE TABLE `grupo_acessos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

LOCK TABLES `grupo_acessos` WRITE;
/*!40000 ALTER TABLE `grupo_acessos` DISABLE KEYS */;
INSERT INTO `grupo_acessos` (`id`,`nome`)
VALUES
	(1,'Estagiários'),
	(2,'Advogados'),
	(4,'Secretário');

/*!40000 ALTER TABLE `grupo_acessos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table grupo_procedimentos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `grupo_procedimentos`;

CREATE TABLE `grupo_procedimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

LOCK TABLES `grupo_procedimentos` WRITE;
/*!40000 ALTER TABLE `grupo_procedimentos` DISABLE KEYS */;
INSERT INTO `grupo_procedimentos` (`id`,`nome`)
VALUES
	(1,'Procedimentos de Audência'),
	(2,'Procedimentos de Prazo'),
	(3,'Procedimentos de Pagamento');

/*!40000 ALTER TABLE `grupo_procedimentos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table orgaos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orgaos`;

CREATE TABLE `orgaos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `esfera_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

LOCK TABLES `orgaos` WRITE;
/*!40000 ALTER TABLE `orgaos` DISABLE KEYS */;
INSERT INTO `orgaos` (`id`,`esfera_id`,`nome`)
VALUES
	(1,1,'1 vara da just civil'),
	(3,0,'Orgão de testes'),
	(12,2,'1 Vara da justiça comum');

/*!40000 ALTER TABLE `orgaos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pessoas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pessoas`;

CREATE TABLE `pessoas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `telefones` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `observacoes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

LOCK TABLES `pessoas` WRITE;
/*!40000 ALTER TABLE `pessoas` DISABLE KEYS */;
INSERT INTO `pessoas` (`id`,`nome`,`telefones`,`data_nascimento`,`observacoes`)
VALUES
	(1,'José Silva','3325-3325 / 2031-2030','2010-02-24',''),
	(2,'Maria Silva','','2010-02-23','');

/*!40000 ALTER TABLE `pessoas` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table procedimentos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `procedimentos`;

CREATE TABLE `procedimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `hora` varchar(10) NOT NULL,
  `advogado_id` int(11) NOT NULL,
  `processo_id` int(11) NOT NULL,
  `tipo_procedimento_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `observacoes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;



# Dump of table processos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `processos`;

CREATE TABLE `processos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gaveta_id` int(11) NOT NULL,
  `orgao_id` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `parte_oposta_id` int(11) NOT NULL,
  `observacoes` text NOT NULL,
  `arquivado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;



# Dump of table tipo_procedimentos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tipo_procedimentos`;

CREATE TABLE `tipo_procedimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_procedimento_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

LOCK TABLES `tipo_procedimentos` WRITE;
/*!40000 ALTER TABLE `tipo_procedimentos` DISABLE KEYS */;
INSERT INTO `tipo_procedimentos` (`id`,`grupo_procedimento_id`,`nome`)
VALUES
	(10,1,'Audência de Instrução'),
	(3,2,'Entrega de documentação'),
	(4,2,'Pesquisa'),
	(5,3,'Pagamento de Honorários'),
	(6,3,'Armotização do débito'),
	(7,0,'procedimento de etstes prazo'),
	(11,1,'Audência de Conciliação');

/*!40000 ALTER TABLE `tipo_procedimentos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table usuarios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_acesso_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`,`grupo_acesso_id`,`nome`,`email`,`senha`)
VALUES
	(1,2,'Root','root@sapo','e10adc3949ba59abbe56e057f20f883e'),
	(8,4,'Secretário','secretario@sapo','e10adc3949ba59abbe56e057f20f883e'),
	(7,1,'estagiario','estagiario@sapo','e10adc3949ba59abbe56e057f20f883e');

/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;





/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
