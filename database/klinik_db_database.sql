/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 10.3.13-MariaDB : Database - klinik_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`klinik_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `klinik_db`;

/*Table structure for table `doctors` */

DROP TABLE IF EXISTS `doctors`;

CREATE TABLE `doctors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telepon` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `doctors` */

insert  into `doctors`(`id`,`nama`,`alamat`,`nomor_telepon`,`kategori`,`rating`,`created_at`,`updated_at`) values 
(1,'Dr. Krista','Amerika serikat','08123','Anak',3.9,'2019-12-29 17:46:43','2020-01-11 05:43:33'),
(2,'Dr. Beck','Belanda','08456','Gigi',3.2,'2019-12-30 17:46:43','2020-01-12 17:46:43'),
(3,'Dr. Chandi','Chile','08789','Jantung',3.6,'2019-12-31 17:46:43','2020-01-13 17:46:43'),
(4,'Dr. Donglo','Damaskus','08321','Kandungan',3.8,'2020-01-01 17:46:43','2020-01-14 17:46:43'),
(5,'Dr. Ersano','Euthopia','08654','Mata',3.6,'2020-01-02 17:46:43','2020-01-15 17:46:43'),
(6,'Dr. Famor','Filiphina','08987','THT',3.7,'2020-01-03 17:46:43','2020-01-16 17:46:43'),
(7,'Dr. Guntur','Gorontalo','08159','Gigi',3.9,'2020-01-04 17:46:43','2020-01-17 17:46:43'),
(8,'Dr. Humblerr','Hungaria','08753','Jantung',3.1,'2020-01-05 17:46:43','2020-01-18 19:19:14'),
(94,'Dr. Togar','Laguboti','08753','Jantung',3.4,'2020-01-17 01:50:30','2020-01-17 01:50:30'),
(97,'Dr,krista','Sitoluama','0813xxxxx','THT',4,'2020-01-17 10:44:49','2020-01-17 10:44:49');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `medical_records` */

DROP TABLE IF EXISTS `medical_records`;

CREATE TABLE `medical_records` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_dokter` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_penyakit` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date DEFAULT NULL,
  `total_biaya` bigint(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `medical_records` */

insert  into `medical_records`(`id`,`nama_pasien`,`nama_dokter`,`jenis_penyakit`,`tanggal`,`total_biaya`,`created_at`,`updated_at`) values 
(1,'Rudi','Dr. Chandi','Sakit Jantung','2020-01-15',400000,'2020-01-15 04:01:22','2020-01-15 04:01:22'),
(2,'Budi','Dr. Abdul','Mata Minus','2020-01-16',500000,'2020-01-15 04:01:22','2020-01-15 04:01:22'),
(3,'Nuni','Dr. Beck','Hamil','2020-01-17',1000000,'2020-01-15 04:01:22','2020-01-15 04:01:22'),
(4,'Rani','Dr. Famor','Sesak Nafas','2020-01-18',750000,'2020-01-15 04:01:22','2020-01-15 04:01:22'),
(5,'Sadi','Dr. Donglo','THT','2020-01-19',800000,'2020-01-15 04:01:22','2020-01-15 04:01:22'),
(31,'Badiman','Dr. Hooman','Sakit Jantung','2020-01-15',NULL,'2020-01-17 01:47:57','2020-01-17 01:47:57'),
(32,'Boomer','Dr. Hooman','Sakit Jantung','2020-01-15',400000,'2020-01-17 01:48:38','2020-01-17 01:48:38'),
(33,'krista','dr,enike','jantung','2020-01-17',500000,'2020-01-17 10:54:49','2020-01-17 10:54:49'),
(34,'krista','dr,enike','jantung','2020-01-17',500000,'2020-01-17 10:54:49','2020-01-17 10:54:49'),
(35,'krista','dr,enike','jantung','2020-01-17',500000,'2020-01-17 10:54:52','2020-01-17 10:54:52'),
(36,'krista','dr,enike','jantung','2020-01-17',500000,'2020-01-17 10:54:56','2020-01-17 10:54:56'),
(37,'krista','dr,enike','jantung','2020-01-17',500000,'2020-01-17 10:54:56','2020-01-17 10:54:56'),
(38,'krista','dr,enike','jantung','2020-01-17',500000,'2020-01-17 10:54:57','2020-01-17 10:54:57'),
(39,'lavenia','Dr.enjelin','diare','2020-01-17',200000,'2020-01-17 10:57:19','2020-01-17 10:57:19'),
(40,'lavenia','Dr.enjelin','diare','2020-01-17',200000,'2020-01-17 10:57:24','2020-01-17 10:57:24'),
(41,'lavenia','Dr.enjelin','diare','2020-01-17',200000,'2020-01-17 10:57:25','2020-01-17 10:57:25'),
(42,'lavenia','Dr.enjelin','diare','2020-01-17',200000,'2020-01-17 10:57:26','2020-01-17 10:57:26'),
(43,'lavenia','Dr.enjelin','diare','2020-01-17',200000,'2020-01-17 10:57:27','2020-01-17 10:57:27');

/*Table structure for table `medicines` */

DROP TABLE IF EXISTS `medicines`;

CREATE TABLE `medicines` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `medicines` */

insert  into `medicines`(`id`,`nama_obat`,`keterangan`,`harga`,`created_at`,`updated_at`) values 
(1,'Paracetamol','102',NULL,'2020-01-14 19:08:14','2020-01-15 05:44:56'),
(3,'Cloromenamat','150',30000,'2020-01-14 19:08:15','2020-01-14 19:08:15'),
(4,'Betadine','300',25000,'2020-01-14 19:08:15','2020-01-14 19:08:15'),
(5,'Fluoride','450',50000,'2020-01-14 19:08:15','2020-01-14 19:08:15'),
(32,'paracetamol','demam',15000,'2020-01-17 10:47:16','2020-01-17 10:47:16'),
(33,'paracetamol','demam',15000,'2020-01-17 10:51:32','2020-01-17 10:51:32'),
(34,'paracetamol','demam',15000,'2020-01-17 10:51:32','2020-01-17 10:51:32');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2020_01_14_043953_create_patients_table',1),
(5,'2020_01_14_144555_create_doctors_table',2),
(6,'2020_01_14_171011_create_doctors_table',3),
(7,'2020_01_14_173620_create_doctors_table',4),
(8,'2020_01_14_190114_create_medicines_table',5),
(9,'2020_01_14_192143_create_medicalrecords_table',6),
(10,'2020_01_14_194347_create_medicalrecords',7),
(11,'2020_01_15_033646_create_medicalrecords_table',8),
(12,'2020_01_15_035527_create_medicalrecords_table',9);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `patients` */

DROP TABLE IF EXISTS `patients`;

CREATE TABLE `patients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `umur` bigint(20) DEFAULT NULL,
  `jenis_penyakit` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_telepon` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `patients` */

insert  into `patients`(`id`,`nama`,`alamat`,`jenis_kelamin`,`umur`,`jenis_penyakit`,`nomor_telepon`,`created_at`,`updated_at`) values 
(1,'Testt','Test','Perempuan',20,'A','0819','2020-01-01 04:48:34','2020-01-15 05:29:54'),
(2,'Budi','Samosir','Laki-laki',24,'G','0813','2020-01-02 04:48:34','2020-01-14 04:48:34'),
(5,'Dody','Papua','Laki-laki',17,'E','0815','2020-01-03 04:48:35','2020-01-14 04:48:35'),
(6,'Enrico','Laguboti','Laki-laki',50,'D','0816','2020-01-04 04:48:35','2020-01-14 04:48:35'),
(7,'Frandy','Balige','Laki-laki',44,'C','0817','2020-01-05 04:48:35','2020-01-14 04:48:35');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
