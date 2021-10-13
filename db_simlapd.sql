/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.19-MariaDB : Database - db_simlapd
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_simlapd` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_simlapd`;

/*Table structure for table `tb_detail_spt` */

DROP TABLE IF EXISTS `tb_detail_spt`;

CREATE TABLE `tb_detail_spt` (
  `detailsptId` int(11) NOT NULL AUTO_INCREMENT,
  `detailsptKodeSpt` varchar(20) DEFAULT NULL,
  `detailsptNip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`detailsptId`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `tb_detail_spt` */

insert  into `tb_detail_spt`(`detailsptId`,`detailsptKodeSpt`,`detailsptNip`) values 
(35,'SPT20210906020318001','1234567890'),
(36,'SPT20210906020331001','1234567894'),
(38,'SPT20210906055018001','1234567890'),
(39,'SPT20210906055018001','1234567894');

/*Table structure for table `tb_keberangkatan` */

DROP TABLE IF EXISTS `tb_keberangkatan`;

CREATE TABLE `tb_keberangkatan` (
  `keberangkatanKode` varchar(20) NOT NULL,
  `keberangkatanSpt` varchar(20) DEFAULT NULL,
  `keberangkatanTujuan` int(11) DEFAULT NULL,
  `keberangkatanJangkaWaktu` varchar(20) DEFAULT NULL,
  `keberangkatanTanggalMulai` date DEFAULT NULL,
  `keberangkatanTanggalSelesai` date DEFAULT NULL,
  PRIMARY KEY (`keberangkatanKode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_keberangkatan` */

insert  into `tb_keberangkatan`(`keberangkatanKode`,`keberangkatanSpt`,`keberangkatanTujuan`,`keberangkatanJangkaWaktu`,`keberangkatanTanggalMulai`,`keberangkatanTanggalSelesai`) values 
('K001','SPT20210906055018001',20,'1','2021-09-06','2021-09-06');

/*Table structure for table `tb_pegawai` */

DROP TABLE IF EXISTS `tb_pegawai`;

CREATE TABLE `tb_pegawai` (
  `pegawaiNip` varchar(20) NOT NULL,
  `pegawaiNama` varchar(100) DEFAULT NULL,
  `pegawaiJabatan` varchar(100) DEFAULT NULL,
  `pegawaiGolongan` varchar(100) DEFAULT NULL,
  `pegawaiAlamat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pegawaiNip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_pegawai` */

insert  into `tb_pegawai`(`pegawaiNip`,`pegawaiNama`,`pegawaiJabatan`,`pegawaiGolongan`,`pegawaiAlamat`) values 
('1234567890','Tes','Tes','Tes','Tes'),
('1234567894','TesDua','TesDua','TesDua','TesDua');

/*Table structure for table `tb_pembiayaan` */

DROP TABLE IF EXISTS `tb_pembiayaan`;

CREATE TABLE `tb_pembiayaan` (
  `pembiayaanKode` varchar(20) NOT NULL,
  `pembiayaanKodeBerangkat` varchar(20) DEFAULT NULL,
  `pembiayaanSppd` varchar(20) DEFAULT NULL,
  `pembiayaanPokok` int(11) DEFAULT NULL,
  `pembiayaanTransportasi` int(11) DEFAULT NULL,
  `pembiayaanPenginapan` int(11) DEFAULT NULL,
  `pembiayaanLainLain` int(11) DEFAULT NULL,
  `pembiayaanTotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`pembiayaanKode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_pembiayaan` */

insert  into `tb_pembiayaan`(`pembiayaanKode`,`pembiayaanKodeBerangkat`,`pembiayaanSppd`,`pembiayaanPokok`,`pembiayaanTransportasi`,`pembiayaanPenginapan`,`pembiayaanLainLain`,`pembiayaanTotal`) values 
('P001','K001','SPPD-2021-06001',50000,100,5000,100,55200);

/*Table structure for table `tb_sppd` */

DROP TABLE IF EXISTS `tb_sppd`;

CREATE TABLE `tb_sppd` (
  `sppdKode` varchar(20) NOT NULL,
  `sppdSpt` varchar(20) DEFAULT NULL,
  `sppdKendaraan` varchar(100) DEFAULT NULL,
  `sppdLainLain` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sppdKode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_sppd` */

insert  into `tb_sppd`(`sppdKode`,`sppdSpt`,`sppdKendaraan`,`sppdLainLain`) values 
('SPPD-2021-06001','SPT20210906055018001','Kendaraan Dinas','');

/*Table structure for table `tb_spt` */

DROP TABLE IF EXISTS `tb_spt`;

CREATE TABLE `tb_spt` (
  `sptKode` varchar(20) NOT NULL,
  `sptTanggal` timestamp NULL DEFAULT NULL,
  `sptAgenda` varchar(255) DEFAULT NULL,
  `sptTanggalKegiatan` date DEFAULT NULL,
  PRIMARY KEY (`sptKode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_spt` */

insert  into `tb_spt`(`sptKode`,`sptTanggal`,`sptAgenda`,`sptTanggalKegiatan`) values 
('SPT20210906055018001','2021-09-06 17:50:42','ada','2021-09-06');

/*Table structure for table `tb_temp` */

DROP TABLE IF EXISTS `tb_temp`;

CREATE TABLE `tb_temp` (
  `tempId` int(11) NOT NULL AUTO_INCREMENT,
  `tempKodeSpt` varchar(20) DEFAULT NULL,
  `tempNip` varchar(20) DEFAULT NULL,
  `tempUserId` int(11) DEFAULT NULL,
  PRIMARY KEY (`tempId`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

/*Data for the table `tb_temp` */

/*Table structure for table `tb_tujuan` */

DROP TABLE IF EXISTS `tb_tujuan`;

CREATE TABLE `tb_tujuan` (
  `tujuanId` int(11) NOT NULL AUTO_INCREMENT,
  `tujuanNamaTempat` varchar(100) DEFAULT NULL,
  `tujuanKota` varchar(100) DEFAULT NULL,
  `tujuanProvinsi` varchar(100) DEFAULT NULL,
  `tujuanAlamat` varchar(255) DEFAULT NULL,
  `tujuanNoTelp` varchar(20) DEFAULT NULL,
  `tujuanPimpinan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tujuanId`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `tb_tujuan` */

insert  into `tb_tujuan`(`tujuanId`,`tujuanNamaTempat`,`tujuanKota`,`tujuanProvinsi`,`tujuanAlamat`,`tujuanNoTelp`,`tujuanPimpinan`) values 
(20,'TesTempat','TesTempat','TesTempat','TesTempat','TesTempat','TesTempat');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(100) DEFAULT NULL,
  `userNama` varchar(100) DEFAULT NULL,
  `userPassword` varchar(100) DEFAULT NULL,
  `userLevel` int(1) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`userId`,`userEmail`,`userNama`,`userPassword`,`userLevel`) values 
(11,'superadmin@gmail.com','Super Admin','$2y$10$ya7Tz1dqPrJ7HReS4Hs8GeHqdgoMNWTl54Tj7eCBCSwQPLhtYkq.K',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
