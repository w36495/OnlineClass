/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.17-MariaDB : Database - onlineclass
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`onlineclass` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `onlineclass`;

/*Table structure for table `board` */

DROP TABLE IF EXISTS `board`;

CREATE TABLE `board` (
  `no` int(10) NOT NULL AUTO_INCREMENT,
  `id` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `contents` varchar(100) NOT NULL,
  `rdate` date NOT NULL,
  PRIMARY KEY (`no`),
  KEY `board_ibfk_1` (`id`),
  CONSTRAINT `board_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `board` */

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `no` int(10) NOT NULL AUTO_INCREMENT,
  `id` varchar(20) NOT NULL,
  `lectureName` varchar(50) NOT NULL,
  `teacherName` varchar(20) NOT NULL,
  `count` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `id` (`id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

/*Data for the table `cart` */

/*Table structure for table `lecture` */

DROP TABLE IF EXISTS `lecture`;

CREATE TABLE `lecture` (
  `no` int(10) NOT NULL AUTO_INCREMENT,
  `lectureName` varchar(50) NOT NULL,
  `subject` varchar(10) NOT NULL,
  `teacherName` varchar(20) NOT NULL,
  `lectureImg` varchar(20) NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `teacherName` (`teacherName`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

/*Data for the table `lecture` */

insert  into `lecture`(`no`,`lectureName`,`subject`,`teacherName`,`lectureImg`,`price`) values 
(1,'윤혜정의 개념의 나비효과','국어','윤혜정','th_ko.png',50000),
(2,'윤혜정 국어','국어','윤혜정','th_ko.png',50000),
(3,'윤혜정의 패턴의 나비효과','국어','윤혜정','th_ko.png',50000),
(4,'남궁민 문학','국어','남궁민','th_ko.png',50000),
(5,'남궁민의 문학','국어','남궁민','th_ko.png',50000),
(6,'남궁민의 국어(언어와 매체 선택)','국어','남궁민','th_ko.png',50000),
(7,'명지희의 문학','국어','명지희','th_ko.png',50000),
(8,'명지희의 문학 감상의 기술','국어','명지희','th_ko.png',50000),
(9,'명지희의 문학틍깡(3등급을 부탁해)','국어','명지희','th_ko.png',50000),
(10,'김철회의 국어(언어와 매체 선택)','국어','김철회','th_ko.png',50000),
(11,'김철회의 국어(화법과 작문 선택)','국어','김철회','th_ko.png',50000),
(12,'김철회의 독서','국어','김철회','th_ko.png',50000),
(13,'정종영 수학+확률과 통계(실전편)','수학','정종영','th_ma.png',55000),
(14,'노베이스 OK! 3점 올킬!','수학','정종영','th_ma.png',55000),
(15,'정종영의 수학 나형','수학','정종영','th_ma.png',55000),
(16,'이하영의 전지적 출제자 시점 수학1','수학','이하영','th_ma.png',55000),
(17,'이하영의 전지적 출제자 시험 수학2','수학','이하영','th_ma.png',55000),
(18,'이하영의 수학 나형','수학','이하영','th_ma.png',55000),
(19,'이미지의 수학1','수학','이미지','th_ma.png',55000),
(20,'세젤쉬 50일 프로젝트','수학','이미지','th_ma.png',55000),
(21,'이미지 확률과 통계','수학','이미지','th_ma.png',55000),
(22,'차현우의 스마트 수학1','수학','차현우','th_ma.png',55000),
(23,'차현우의 스마트 수학2','수학','차현우','th_ma.png',55000),
(24,'차현우의 수학','수학','차현우','th_ma.png',55000),
(25,'주혜연의 영어','영어','주혜연','th_en.png',63000),
(26,'고3 경이로운 학습법','영어','주혜연','th_en.png',63000),
(27,'주혜연의 영어독해연습','영어','주혜연','th_en.png',63000),
(28,'정승익의 영어','영어','정승익','th_en.png',63000),
(29,'영어(상)','영어','정승익','th_en.png',63000),
(30,'영어(하)','영어','정승익','th_en.png',63000),
(31,'박재혁의 영어','영어','박재혁','th_en.png',63000),
(32,'박재혁의 10일 완성','영어','박재혁','th_en.png',63000),
(33,'박재혁의 CORE, 영어는 문장이야','영어','박재혁','th_en.png',63000),
(34,'조명훈의 기적의 30일, 영어 새로고침','영어','조명훈','th_en.png',63000),
(35,'조명훈의 영어','영어','조명훈','th_en.png',63000),
(36,'영어(고난도/신유형)','영어','조명훈','th_en.png',63000),
(37,'강승희 생활과 윤리','사회','강승희','th_so.png',45000),
(38,'강승희의 생활과 윤리덕','사회','강승희','th_so.png',45000),
(39,'벤다이어그램으로 생윤 만점 잡기','사회','강승희','th_so.png',45000),
(40,'윤리와 사상','사회','최양진','th_so.png',45000),
(41,'생활과 윤리','사회','최양진','th_so.png',45000),
(42,'최양진의 생활과 윤리 원샷 원킬','사회','최양진','th_so.png',45000),
(43,'사회탐구','사회','한보라','th_so.png',45000),
(44,'윤리와 사상','사회','한보라','th_so.png',45000),
(45,'한보라의 윤리와 사상 개념 스케치','사회','한보라','th_so.png',45000),
(46,'김종익만 가능한 다섯시간에 끝내는 생활과 윤리','사회','김종익','th_so.png',45000),
(47,'김종익 생활과 윤리','사회','김종익','th_so.png',45000),
(48,'김종익의 스토리텔링 생활과 윤리','사회','김종익','th_so.png',45000),
(49,'과학탐구','과학','차영','th_sc.png',45000),
(50,'물리학1','과학','차영','th_sc.png',45000),
(51,'차영의 물리1 빡쓰리','과학','차영','th_sc.png',45000),
(52,'박주원의 화학1','과학','박주원','th_sc.png',45000),
(53,'친절한 주원쌤의 디테일 화학1','과학','박주원','th_sc.png',45000),
(54,'주원쌤의 3강으로 화학반응 양적관계 완전정복','과학','박주원','th_sc.png',45000),
(55,'과학탐구','과학','박소현','th_sc.png',45000),
(56,'하루 30분, 60일에 끝내는 생명과학1','과학','박소현','th_sc.png',45000),
(57,'박소현의 just 10 생명과학1','과학','박소현','th_sc.png',45000),
(58,'영일쌤의 지구과학1 일등급의 기술','과학','정영일','th_sc.png',45000),
(59,'정영일의 지구과학1','과학','정영일','th_sc.png',45000),
(60,'영일쌤의 \"별 볼일 있는 별 이야기\"','과학','정영일','th_sc.png',45000),
(61,'베트남어1','제2외국어','이강우','th_sl.png',35000),
(62,'기초 베트남어','제2외국어','이강우','th_sl.png',35000),
(63,'이강우의 베트남어','제2외국어','이강우','th_sl.png',35000),
(64,'아랍어1','제2외국어','이인섭','th_sl.png',35000),
(65,'기초 아랍어','제2외국어','이인섭','th_sl.png',35000),
(66,'이인섭의 아랍어','제2외국어','이인섭','th_sl.png',35000),
(67,'일본어1','제2외국어','권혜영','th_sl.png',35000),
(68,'일본어2','제2외국어','권혜영','th_sl.png',35000),
(69,'권혜영의 일본어','제2외국어','권혜영','th_sl.png',35000),
(70,'중국어1','제2외국어','이승해','th_sl.png',35000),
(71,'중국어2','제2외국어','이승해','th_sl.png',35000);

/*Table structure for table `order` */

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `no` int(10) NOT NULL AUTO_INCREMENT,
  `orddate` date NOT NULL,
  `id` varchar(20) NOT NULL,
  `lectureName` varchar(50) NOT NULL,
  `lectureCount` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `id` (`id`),
  CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `order` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `tel` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`password`,`email`,`tel`) values 
('admin','admin','admin@onlineclass.co.kr','010-1111-2222');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
