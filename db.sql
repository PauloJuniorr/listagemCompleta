-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.26 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para db
CREATE DATABASE IF NOT EXISTS `db` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci */;
USE `db`;

-- Copiando estrutura para tabela db.empresas
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uf` char(2) COLLATE latin1_general_ci NOT NULL,
  `nome_fantasia` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `cnpj` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Copiando dados para a tabela db.empresas: 2 rows
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` (`id`, `uf`, `nome_fantasia`, `cnpj`, `created_at`, `updated_at`) VALUES
	(11, 'CE', 'Capsule', '111111233', '2020-03-20 18:12:24', '2020-03-20 18:12:24'),
	(10, 'PR', 'Corporation Life', '12233344000133', '2020-03-20 18:04:33', '2020-03-20 18:04:33');
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;

-- Copiando estrutura para tabela db.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE latin1_general_ci NOT NULL,
  `queue` text COLLATE latin1_general_ci NOT NULL,
  `payload` longtext COLLATE latin1_general_ci NOT NULL,
  `exception` longtext COLLATE latin1_general_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Copiando dados para a tabela db.failed_jobs: 0 rows
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Copiando estrutura para tabela db.fornecedors
CREATE TABLE IF NOT EXISTS `fornecedors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) DEFAULT NULL,
  `nome` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tipo_pessoa` char(1) COLLATE latin1_general_ci NOT NULL,
  `cpf_cnpj` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `data_hora` datetime NOT NULL,
  `telefone` int(11) NOT NULL,
  `rg` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fornecedors_id_empresa_foreign` (`id_empresa`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Copiando dados para a tabela db.fornecedors: 0 rows
/*!40000 ALTER TABLE `fornecedors` DISABLE KEYS */;
/*!40000 ALTER TABLE `fornecedors` ENABLE KEYS */;

-- Copiando estrutura para tabela db.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Copiando dados para a tabela db.migrations: 5 rows
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2019_08_19_000000_create_failed_jobs_table', 1),
	(3, '2020_03_18_145203_create_empresas_table', 1),
	(21, '2014_10_12_100000_create_password_resets_table', 2),
	(22, '2020_03_18_174831_create_fornecedors_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Copiando estrutura para tabela db.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `token` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Copiando dados para a tabela db.password_resets: 0 rows
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Copiando estrutura para tabela db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `remember_token` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Copiando dados para a tabela db.users: 0 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
