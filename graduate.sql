/*
SQLyog 企业版 - MySQL GUI v8.14 
MySQL - 5.5.24-log : Database - graduate
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`graduate` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `graduate`;

/*Table structure for table `apply` */

DROP TABLE IF EXISTS `apply`;

CREATE TABLE `apply` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `stuid` int(10) DEFAULT NULL,
  `scname` varchar(50) DEFAULT NULL,
  `sdeptid` varchar(50) DEFAULT '1',
  `bscore` int(10) DEFAULT '0',
  `mscore` int(10) DEFAULT '0',
  `time` varchar(50) DEFAULT NULL,
  `tag` varchar(10) DEFAULT '0',
  `bz` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `apply` */

insert  into `apply`(`id`,`stuid`,`scname`,`sdeptid`,`bscore`,`mscore`,`time`,`tag`,`bz`) values (11,271040219,'东北师范大学','1',0,0,'2014-05-05 12:26:20','1','0'),(12,271040219,'长春大学','5',88,140,'2014-05-05 12:26:32','4','1'),(13,271040219,'东北电力大学','3',0,0,'2014-05-05 12:26:49','0','0'),(14,271040201,'长春大学','2',59,114,'2014-05-05 12:27:14','2','0'),(15,271040202,'长春大学','1',75,116,'2014-05-05 12:27:46','2','0'),(16,271040203,'长春大学','4',90,120,'2014-05-05 12:28:05','4','1'),(17,271040201,'东北电力大学','6',0,0,'2014-05-06 01:29:50','0','0'),(18,271040205,'长春大学','1',80,50,'2014-05-14 16:02:44','2',''),(19,271040205,'东北师范大学','1',0,0,'2014-05-14 16:03:06','0',''),(21,271040204,'长春大学','2',0,0,'2014-05-15 19:52:45','2','');

/*Table structure for table `manager` */

DROP TABLE IF EXISTS `manager`;

CREATE TABLE `manager` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `scid` varchar(20) NOT NULL,
  `pw` char(32) NOT NULL,
  `point` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `manager` */

insert  into `manager`(`id`,`scid`,`pw`,`point`) values (2,'ccuadmin','223a1853ad808bf954cc41469f65cfc4','ccuadmin@163.com'),(3,'jjuadmin','53b3aa8fd5d8ffdb45ed71e50367a44c','jjuadmin@163.com'),(6,'cclguadmin','53b3aa8fd5d8ffdb45ed71e50367a44c','111'),(7,'dbsfuadmin','53b3aa8fd5d8ffdb45ed71e50367a44c','222'),(8,'dbdluadmin','53b3aa8fd5d8ffdb45ed71e50367a44c','2222'),(9,'ybuadmin','53b3aa8fd5d8ffdb45ed71e50367a44c','222'),(10,'dbuadmin','53b3aa8fd5d8ffdb45ed71e50367a44c','154258');

/*Table structure for table `news` */

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scid` varchar(30) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `content` text,
  `time` varchar(30) DEFAULT NULL,
  `issuer` varchar(200) DEFAULT NULL,
  `rcount` int(5) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `news` */

insert  into `news`(`id`,`scid`,`title`,`content`,`time`,`issuer`,`rcount`) values (9,'ccuadmin','长春大学15年推免复试要求成绩','<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<caption>\r\n	<h2 style=\"font-style:italic;\"><strong><span style=\"font-size:18px\">2015年长春大学复试要求</span></strong></h2>\r\n\r\n	<p>&nbsp;</p>\r\n	</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>德育</td>\r\n			<td>智育</td>\r\n			<td>总分</td>\r\n		</tr>\r\n		<tr>\r\n			<td>60</td>\r\n			<td>65</td>\r\n			<td>125</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><span style=\"font-family:arial,helvetica,sans-serif\"><span style=\"font-size:14px\">请达到复试要求的同学与2015年3月20到综A1005报到。</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n','2014-04-01 22:55:37','长春大学研招办',2),(10,'ccuadmin','长春大学推免生报到信息','<p>请推免成功的同学，与5月1号之前提交档案<img alt=\"\" src=\"/ckfinder/userfiles/images/2.jpg\" style=\"height:67px; width:100px\" /></p>\r\n','2014-05-01 22:56:52','长春大学研招办',0),(12,'cclguadmin','15年长春理工大学推免要求','<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<caption>2015年长春理工大学复试要求</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>德育</td>\r\n			<td>60</td>\r\n		</tr>\r\n		<tr>\r\n			<td>智育</td>\r\n			<td>60</td>\r\n		</tr>\r\n		<tr>\r\n			<td>总分</td>\r\n			<td>140</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n','2014-06-01 23:06:27','长春理工大学研招办',8),(13,'dbsfuadmin','东北师范大学15推免要求成绩','<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<caption>东北师范大学复试要求</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>德育</td>\r\n			<td>70</td>\r\n		</tr>\r\n		<tr>\r\n			<td>智育</td>\r\n			<td>70</td>\r\n		</tr>\r\n		<tr>\r\n			<td>总分</td>\r\n			<td>140</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>请务必于3月20号参加笔试和面试，地点逸夫楼205</p>\r\n','2014-05-01 23:12:50','东北师范大学研招办',0),(14,'dbdluadmin','东北电力大学2015推免要求','<table align=\"left\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<caption><span style=\"color:#FF0000\">东北电力大学成绩</span></caption>\r\n	<tbody>\r\n		<tr>\r\n			<td><span style=\"color:#FF0000\">德育</span></td>\r\n			<td><span style=\"color:#FF0000\">智育</span></td>\r\n			<td><span style=\"color:#FF0000\">总分</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"color:#FF0000\">60</span></td>\r\n			<td><span style=\"color:#FF0000\">65</span></td>\r\n			<td><span style=\"color:#FF0000\">130</span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"background-color:#F0F8FF\">符合条件的学生与15年4月1号报到，地点A区1005。</span></p>\r\n','2014-05-03 00:07:32','东北电力大学研招办',0),(15,'ccuadmin','长春大学优惠政策','<p>凡高于160的学生，免笔试面试，直接入学。</p>\r\n','2014-05-03 00:15:19','长春大学研招办',0),(16,'ybuadmin','延边大学推免成绩公示','<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<caption>2015年延边大学推免成绩要求</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>德育</td>\r\n						<td>60+</td>\r\n					</tr>\r\n					<tr>\r\n						<td>智育</td>\r\n						<td>60+</td>\r\n					</tr>\r\n					<tr>\r\n						<td>总分</td>\r\n						<td>140+</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;</p>\r\n</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n','2014-05-03 15:58:45','延边大学研招办',0),(17,'ccuadmin','长春大学成绩公示','<p>大家继续努力</p>\r\n','2014-05-04 15:19:01','长春大学研招办',0),(18,'ccuadmin','长春大学推免生成绩公示','<table style=\"border-collapse:collapse; height:76px; width:540.00pt\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">申请编号</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">身份证号</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">推免学校</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">姓名</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">德育</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">智育</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">笔试</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">面试</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">总分</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">名次</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">10</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">10000</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">长春大学</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">西去东来</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">85</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">80</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">85</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">62</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">312</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">1</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">7</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">10001</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">长春大学</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">研三颜色</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">66</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">69</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">84</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">90</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">309</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">2</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">2</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">123456</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">长春大学</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">单智同学</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">75</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">66</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">87</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">80</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">308</td>\r\n			<td style=\"height:14.25pt; vertical-align:middle; width:54pt\">3</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n','2014-05-04 16:13:20','长春大学研招办',0),(20,'ccuadmin','长春大学推免生成绩公示','<p>录取成绩要求<span style=\"background-color:rgb(242, 242, 242); color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:12px\">德育：</span><input size=\"1\" style=\"height:12px\" type=\"text\" value=\"60\" /><span style=\"background-color:rgb(242, 242, 242); color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:12px\">&nbsp;+ 智育：</span><input size=\"1\" style=\"height:12px\" type=\"text\" value=\"65\" /><span style=\"background-color:rgb(242, 242, 242); color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:12px\">&nbsp;&lt; &nbsp;=推荐总分：</span><input name=\"tms\" size=\"1\" style=\"height:12px\" type=\"text\" value=\"125\" /><span style=\"background-color:rgb(242, 242, 242); color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:12px\">&nbsp;+ 笔试：</span><input name=\"bs\" size=\"4\" style=\"border:1px solid rgb(39, 179, 254); height:15px\" type=\"text\" value=\"90\" /><span style=\"background-color:rgb(242, 242, 242); color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:12px\">&nbsp;+ 面试：</span><input name=\"ms\" size=\"4\" style=\"border:1px solid rgb(39, 179, 254); height:15px\" type=\"text\" value=\"98\" /><span style=\"background-color:rgb(242, 242, 242); color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:12px\">&nbsp;&lt; &nbsp;=录取总分：</span><input name=\"allscore\" size=\"4\" style=\"border:1px solid rgb(39, 179, 254); height:15px\" type=\"text\" value=\"320\" /><span style=\"background-color:rgb(242, 242, 242); color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:12px\">.</span></p>\r\n','2014-05-05 18:46:38','长春大学研招办',0),(21,'ccuadmin','长春大学推免生成绩公示','<p>录取成绩要求<span style=\"background-color:rgb(242, 242, 242); color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:12px\">德育：</span><input size=\"1\" style=\"height:12px\" type=\"text\" value=\"60\" /><span style=\"background-color:rgb(242, 242, 242); color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:12px\">&nbsp;+ 智育：</span><input size=\"1\" style=\"height:12px\" type=\"text\" value=\"65\" /><span style=\"background-color:rgb(242, 242, 242); color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:12px\">&nbsp;&lt; &nbsp;=推荐总分：</span><input name=\"tms\" size=\"1\" style=\"height:12px\" type=\"text\" value=\"125\" /><span style=\"background-color:rgb(242, 242, 242); color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:12px\">&nbsp;+ 笔试：</span><input name=\"bs\" size=\"4\" style=\"border:1px solid rgb(39, 179, 254); height:15px\" type=\"text\" value=\"1\" /><span style=\"background-color:rgb(242, 242, 242); color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:12px\">&nbsp;+ 面试：</span><input name=\"ms\" size=\"4\" style=\"border:1px solid rgb(39, 179, 254); height:15px\" type=\"text\" value=\"1\" /><span style=\"background-color:rgb(242, 242, 242); color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:12px\">&nbsp;&lt; &nbsp;=录取总分：</span><input name=\"allscore\" size=\"4\" style=\"border:1px solid rgb(39, 179, 254); height:15px\" type=\"text\" value=\"\" /><span style=\"background-color:rgb(242, 242, 242); color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:12px\">.</span></p>\r\n','2014-05-05 23:03:31','长春大学研招办',0);

/*Table structure for table `point` */

DROP TABLE IF EXISTS `point`;

CREATE TABLE `point` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `t1` int(5) DEFAULT NULL,
  `t2` int(5) DEFAULT NULL,
  `t3` int(5) DEFAULT NULL,
  `t4` int(5) DEFAULT NULL,
  `t5` int(5) DEFAULT NULL,
  `t6` int(5) DEFAULT NULL,
  `t7` int(5) DEFAULT NULL,
  `t8` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `point` */

insert  into `point`(`id`,`t1`,`t2`,`t3`,`t4`,`t5`,`t6`,`t7`,`t8`) values (1,0,0,0,250,350,650,400,200);

/*Table structure for table `response` */

DROP TABLE IF EXISTS `response`;

CREATE TABLE `response` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `rvid` int(10) DEFAULT NULL,
  `content` varchar(50) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `response` */

insert  into `response`(`id`,`rvid`,`content`,`time`) values (3,3,'死去吧','2014-05-11 15:01:35'),(4,5,'啥事','2014-05-11 15:03:18'),(5,10,'啥','2014-05-11 15:05:51'),(7,4,'不需要','2014-05-11 15:09:43'),(8,10,'傻逼','2014-05-11 15:11:56'),(10,2,'发','2014-05-11 15:16:21'),(11,1,'没有','2014-05-11 16:53:27'),(13,13,'有','2014-05-19 18:01:44'),(14,9,'继续努力','2014-05-25 17:17:59'),(15,9,'继续加油','2014-05-25 17:18:14');

/*Table structure for table `review` */

DROP TABLE IF EXISTS `review`;

CREATE TABLE `review` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `newid` int(5) DEFAULT NULL,
  `stuid` int(5) DEFAULT NULL,
  `ques` varchar(50) DEFAULT NULL,
  `content` varchar(50) DEFAULT NULL,
  `time` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `review` */

insert  into `review`(`id`,`newid`,`stuid`,`ques`,`content`,`time`) values (1,12,271040202,'奖学金','160分有奖学金吗？','2014-05-03 16:51:41'),(2,12,271040202,'住宿','贵校是几人寝室','2014-05-03 16:55:24'),(3,12,271040202,'肥大','大','2014-05-03 16:56:23'),(4,12,271040202,'气候','需要带什么衣服','2014-05-03 16:57:13'),(5,12,271040203,'评论没有用','？？？？？','2014-05-03 18:46:59'),(6,16,271040201,'学校周围情况怎么样？','同问题','2014-05-03 19:32:59'),(7,12,271040219,'终于做好了','记录下时间','2014-05-03 20:56:51'),(8,14,271040219,'成绩很高','自己加油啊','2014-05-08 15:19:09'),(9,18,271040219,'成绩有问题啊','发送','2014-05-10 16:17:02'),(10,12,271040219,'凑热闹','放大萨法送','2014-05-11 00:33:49'),(11,12,271040219,'号码','是什么？','2014-05-11 18:06:51'),(12,9,271040205,'怎么很低啊','成绩很低啊','2014-05-19 17:59:43'),(13,9,271040205,'录取多少人啊','总共大概有30人吗','2014-05-19 18:00:19');

/*Table structure for table `school` */

DROP TABLE IF EXISTS `school`;

CREATE TABLE `school` (
  `scid` varchar(20) DEFAULT NULL,
  `scname` varchar(20) DEFAULT NULL,
  `sctype` varchar(20) DEFAULT NULL,
  `dyscore` int(5) DEFAULT '60',
  `zyscore` int(5) DEFAULT '60',
  `sumscore` int(5) DEFAULT '120',
  `bscore` int(5) DEFAULT '0',
  `mscore` int(5) DEFAULT '0',
  `allscore` int(5) DEFAULT '0',
  `pic` varchar(100) DEFAULT NULL,
  `content` mediumtext,
  `email` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `clip` int(5) DEFAULT '1',
  `tag` varchar(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `school` */

insert  into `school`(`scid`,`scname`,`sctype`,`dyscore`,`zyscore`,`sumscore`,`bscore`,`mscore`,`allscore`,`pic`,`content`,`email`,`phone`,`clip`,`tag`) values ('ccuadmin','长春大学','省重点',60,65,125,80,80,310,'1398402681changda.jpg','<div style=\"width: 80%\">\r\n<h3><strong>长春大学简介</strong></h3>\r\n\r\n<p>图片<br />\r\n<img alt=\"\" src=\"/ckfinder/userfiles/images/changda.jpg\" style=\"height:150px; width:212px\" /></p>\r\n\r\n<p><span style=\"color:#008000\"><span style=\"background-color:rgb(255, 255, 255); font-family:arial; font-size:10.5pt\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;长春大学有着悠久的办学历史，这里曾是1938年</span></span><a href=\"http://baike.baidu.com/view/38996.htm\"><span style=\"color:#008000\"><span style=\"background-color:rgb(255, 255, 255); font-family:arial; font-size:10.5pt\">伪满洲国</span></span></a><span style=\"color:#008000\"><span style=\"background-color:rgb(255, 255, 255); font-family:arial; font-size:10.5pt\">最高学府长春建国大学的校址，1946年国民党统治时期在此设立长春大学农学院。学校现有20个教学院部，50个本科专业，涵盖经济学、法学、教育学、文学、理学、工学、农学、医学、管理学、艺术学十大学科门类。全日制在校学生15455人。</span></span></p>\r\n</div>\r\n','421170702@qq.com','15543261882',107,'0'),('jjuadmin','吉林大学','985工程',70,70,150,0,0,0,'1398354718jida.jpg','<blockquote>\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<caption>吉林大学简介\r\n	<p>吉林大学是教育部直属的一所全国重点综合性大学，1995年首批通过国家教委&ldquo;211工程&rdquo;审批，2001年被列入&ldquo;985工程&rdquo;国家重点建设的大学之一。吉林大学已成为我国目前办学规模最大的高等学府，在人才培养、科学研究、学科建设、师资队伍等方面呈现出更加广泛的发展前景。到2020年，学校的奋斗目标是努力建成&nbsp;&nbsp;国家高素质创新人才培养、高水平科学技术研究和成果转化、高层次决策咨询的重要基地，使之成为一所在国家和区域经济社会发展中占有重要地位、国际知名的高水平研究型大学，成为让教职工引以自豪、让学生全面发展、让社会高度赞誉，让世界一流大学广泛认可的大学。</p>\r\n	</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<ul>\r\n				<li>教师资源</li>\r\n			</ul>\r\n			</td>\r\n			<td>优秀</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<ul>\r\n				<li>计算机行业</li>\r\n			</ul>\r\n			</td>\r\n			<td>优秀</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<ul>\r\n				<li>前景发展</li>\r\n			</ul>\r\n			</td>\r\n			<td>你好</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</blockquote>\r\n\r\n<h3><span dir=\"rtl\"><strong>。</strong></span></h3>\r\n\r\n<p>&nbsp;</p>\r\n','1975149281@qq.com','18744033060',112,'0'),('cclguadmin','长春理工大学','省重点',60,60,140,0,0,0,'1398957469changli.jpg','<h3><img alt=\"\" src=\"/ckfinder/userfiles/images/changli.jpg\" style=\"float:left; height:100px; margin-right:10px; width:130px\" />长春理工大学</h3>\r\n\r\n<p><u><strong><span style=\"color:rgb(0, 0, 0); font-family:arial; font-size:10.5pt\">长春理工大学（原长春光学精密机械学院）是一所以光电技术为特色，光、机、电、算、材相结合为优势，工、理、文、经、管、法协调发展的吉林省省属</span><a href=\"http://baike.so.com/doc/5642694.html\"><span style=\"color:rgb(19, 110, 194); font-family:arial; font-size:10.5pt\">重点大学</span></a><span style=\"color:rgb(0, 0, 0); font-family:arial; font-size:10.5pt\">。学校的发展目标是：建成一所以工为主、理工结合、文理交融、军民兼顾，光电技术特色鲜明，重点学科优势突出，工、理、文、经、管、法协调发展的多科性、开放式、高水平教学研究型大学，实现&ldquo;省内领先、国内先进、国际知名&rdquo;的奋斗目标。长春理工大学（原长春光学精密机械学院）是一所以光电技术为特色，光、机、电、算、材相结合为优势，工、理、文、经、管、法协调发展的吉林省省属</span><a href=\"http://baike.so.com/doc/5642694.html\"><span style=\"color:rgb(19, 110, 194); font-family:arial; font-size:10.5pt\">重点大学</span></a><span style=\"color:rgb(0, 0, 0); font-family:arial; font-size:10.5pt\">。学校的发展目标是：建成一所以工为主、理工结合、文理交融、军民兼顾，光电技术特色鲜明，重点学科优势突出，工、理、文、经、管、法协调发展的多科性、开放式、高水平教学研究型大学，实现&ldquo;省内领先、国内先进、国际知名&rdquo;的奋斗目标。</span></strong></u></p>\r\n','1975149281@qq.com','58965856',85,'0'),('dbsfuadmin','东北师范大学','211工程',70,70,140,0,0,0,'1398957780dongshi.jpg','<h3><img alt=\"\" src=\" \" style=\"float:left; height:100px; margin-right:10px; width:100px\" />东北师范大学</h3>\r\n\r\n<p><span style=\"color:rgb(0, 0, 0); font-family:arial; font-size:10.5pt\">学校原名东北大学，</span><a href=\"http://baike.so.com/doc/2495870.html?from=121151&amp;redirect=merge#refff_2495870-7523737-1\"><span style=\"color:rgb(0, 0, 255); font-family:arial; font-size:9pt\">[1]</span></a><a name=\"refer_2495870-7523737-2934109\"></a><span style=\"color:rgb(0, 0, 0); font-family:arial; font-size:10.5pt\">1946年建校于本溪，是中国共产党在东北地区创建的第一所综合性大学，1949年定址于长春。1950年，根据国家教育事业发展的需要，易名为东北师范大学。学校现有各类全日制在校学生19575人，其中，本科生14466人，博士、硕士研究生4583人，外国留学生164人。学校注重开展广泛的国际合作与交流，已经先后与美国、加拿大、日本、英国、韩国、澳大利亚、俄罗斯等20多个国家和地区的110余所大学和科研机构建立了合作与交流关系，开展了一系列重要的交流合作项目。2000年以来学校聘请了长期外籍专家学者193人来校授课，先后聘请了以诺贝尔奖获得者杨振宁教授为代表的38名外籍专家学者为名誉教授、客座教授。每年派出近百名教师出国访学、进修，开展国际学术交流。近年来，举办了30多个国际性和区域性学术会议，开展了多项重大合作研究，促进了学校的建设发展，扩大了学校的影响和国际知名度。</span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<caption>计算机类介绍</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>计算机软件与理论</td>\r\n			<td><span style=\"color:#FF0000\">优秀</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>计算机系统结构</td>\r\n			<td><span style=\"color:#B22222\">优秀</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>计算机应用</td>\r\n			<td><span style=\"color:#FF0000\">优秀</span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n','1975149281@qq.com','18744033060',56,'0'),('dbdluadmin','东北电力大学','省重点',65,60,130,0,0,0,'1399046533dongdian.jpg','<h3><img alt=\"\" src=\"/ckfinder/userfiles/images/dongdian.jpg\" style=\"float:left; height:100px; margin-right:10px; width:120px\" />东北电力大学简介</h3>\r\n\r\n<p><span style=\"color:rgb(0, 0, 0); font-family:arial; font-size:10.5pt\">东北电力大学创建于1948&nbsp;年，是吉林省属</span><a href=\"http://baike.so.com/doc/5642694.html\"><span style=\"color:rgb(19, 110, 194); font-family:arial; font-size:10.5pt\">重点大学</span></a><span style=\"color:rgb(0, 0, 0); font-family:arial; font-size:10.5pt\">，是我国首批具有学士、硕士学位授予权的高等院校之一，1993&nbsp;年成为吉林省省属院校中最早获得博士学位授权单位的高校，是国家农业部与吉林省人民政府推进共建学校。学校办学历史悠久，文化底蕴深厚，学校依托雄厚的学科实力和教学科研资源优势，坚持&ldquo;以服务地方经济建设和社会发展为己任&rdquo;的办学理念，倡导&ldquo;明德崇智、厚朴笃行&rdquo;的校训精神，以内涵发展为主题，大力推进以提高教学质量和学生综合素质为核心的教育教学改革，探索并运行了&ldquo;基础+平台&rdquo;的人才培养模式，努力培养宽口径、厚基础、强能力、高素质的复合型与创造性人才。坚持科技为地方经济建设服务的方针，走出了一条&ldquo;把论文写在吉林大地上&rdquo;的科教服务之路。</span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<caption><span style=\"font-size:14px\"><span style=\"color:#FF0000\"><u>计算机院</u></span></span></caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>计算机应用</td>\r\n			<td>一般</td>\r\n		</tr>\r\n		<tr>\r\n			<td>计算机软件与理论</td>\r\n			<td>优秀</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n','421170702@qq.com','18744033060',6,'0'),('ybuadmin','延边大学','211工程',60,60,140,0,0,0,'1400087065yanbian.jpg','<h3><img alt=\"\" src=\"/ckfinder/userfiles/images/yanbian.jpg\" style=\"float:left; height:100px; margin-right:10px; width:100px\" />放大萨法发</h3>\r\n','1975149281@qq.com','14585696658',42,'0');

/*Table structure for table `scsdept` */

DROP TABLE IF EXISTS `scsdept`;

CREATE TABLE `scsdept` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `scid` varchar(10) DEFAULT NULL,
  `sdeptid` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `scsdept` */

insert  into `scsdept`(`id`,`scid`,`sdeptid`) values (1,'cclguadmin',1),(2,'cclguadmin',2),(3,'ybuadmin',1),(4,'ybuadmin',6),(5,'ybuadmin',4),(6,'cclguadmin',5),(7,'cclguadmin',4),(8,'jjuadmin',1),(9,'jjuadmin',2),(10,'jjuadmin',3),(11,'jjuadmin',4),(12,'jjuadmin',5),(13,'jjuadmin',6),(14,'ccuadmin',1),(15,'ccuadmin',2),(16,'ccuadmin',4),(17,'ccuadmin',6),(18,'dbsfuadmin',1),(19,'dbsfuadmin',2),(20,'dbsfuadmin',3),(21,'dbsfuadmin',5),(22,'dbsfuadmin',6);

/*Table structure for table `sdept` */

DROP TABLE IF EXISTS `sdept`;

CREATE TABLE `sdept` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `dis` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `sdept` */

insert  into `sdept`(`id`,`name`,`dis`) values (1,'计算机学院-软件理论',NULL),(2,'计算机学院-系统结构',NULL),(3,'计算机学院-密码安全',NULL),(4,'计算机学院-应用技术',NULL),(5,'计算机学院-军器工业',NULL),(6,'计算机学院-软件工程',NULL),(7,'电科院-计算机技术',NULL),(9,'电科院-网络安全',NULL),(10,'电信工程学院-电路分析','很好'),(11,'电科院-软件工程','前景很好');

/*Table structure for table `student` */

DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
  `zzid` bigint(20) NOT NULL AUTO_INCREMENT,
  `id` bigint(20) DEFAULT NULL,
  `pw` varchar(32) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `dyscore` varchar(8) DEFAULT NULL,
  `zyscore` varchar(8) DEFAULT NULL,
  `scid` varchar(100) DEFAULT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `tmresult` varchar(10) DEFAULT '0',
  PRIMARY KEY (`zzid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `student` */

insert  into `student`(`zzid`,`id`,`pw`,`name`,`phone`,`mail`,`dyscore`,`zyscore`,`scid`,`pic`,`tmresult`) values (3,271040201,'53b3aa8fd5d8ffdb45ed71e50367a44c','杨智国','15543261882','leadershanzhi@163.com','75','66','长春师范大学',NULL,'0'),(4,271040202,'53b3aa8fd5d8ffdb45ed71e50367a44c','杨昌青','15543261882','leadershanzhi@163.com','85','80','吉林大学','1399739710IMG_5210.jpg','0'),(5,271040203,'53b3aa8fd5d8ffdb45ed71e50367a44c','黄冰冰','18596586645','leadershanzhi@163.com','66','69','长春理工大学','1399739731IMG_5220.jpg','长春大学'),(6,271040219,'53b3aa8fd5d8ffdb45ed71e50367a44c','单智','18843261882','leadershanzhi@163.com','70','75','延边大学','140109442814.jpg','长春大学'),(7,271040204,'53b3aa8fd5d8ffdb45ed71e50367a44c','王彦朋','14758625968','leadershanzhi@163.com','60','65','长春工业大学',NULL,'0'),(8,271040205,'c8d278dd28e1c4ac23774d004bce1d74','肖冬雪','14585696658','leadershanzhi@163.com','64','77','延边大学','1400054626h.jpg','0');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
