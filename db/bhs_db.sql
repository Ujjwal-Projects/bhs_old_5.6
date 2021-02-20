-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 20, 2021 at 07:53 AM
-- Server version: 5.6.49-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bhs_db`
--
CREATE DATABASE IF NOT EXISTS `bhs_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bhs_db`;

-- --------------------------------------------------------

--
-- Table structure for table `bhs_admin`
--

DROP TABLE IF EXISTS `bhs_admin`;
CREATE TABLE `bhs_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bhs_admin`
--

INSERT INTO `bhs_admin` (`id`, `username`, `password`, `status`) VALUES
(1, 'master', 'e92czITMff1f', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `bhs_galary`
--

DROP TABLE IF EXISTS `bhs_galary`;
CREATE TABLE `bhs_galary` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `attachment` varchar(225) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bhs_galary`
--

INSERT INTO `bhs_galary` (`id`, `title`, `description`, `attachment`, `status`) VALUES
(9, '1', '.', '51681_20191009203340.jpg', 'active'),
(10, '2', '.', '42ec0_20191009203355.jpg', 'active'),
(11, '3', '.', 'b1dba_20191009203442.jpg', 'active'),
(12, '4', '.', 'b6349_20191009203513.jpg', 'active'),
(13, '5', '.', '63e2c_20191009203627.jpg', 'active'),
(14, '6', '.', '21369_20191009203658.jpg', 'active'),
(15, 'Notification', 'Phone number and email address of Behala High School', 'c46fe_20200303232707.jpg', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `bhs_message`
--

DROP TABLE IF EXISTS `bhs_message`;
CREATE TABLE `bhs_message` (
  `id` int(11) NOT NULL,
  `message_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `student_name` varchar(255) NOT NULL,
  `class` varchar(225) DEFAULT NULL,
  `section` varchar(255) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `contact_no` varchar(225) DEFAULT NULL,
  `message_text` text NOT NULL,
  `status` enum('read','unread','deleted') NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bhs_message`
--

INSERT INTO `bhs_message` (`id`, `message_time`, `student_name`, `class`, `section`, `roll_no`, `contact_no`, `message_text`, `status`) VALUES
(1, '2019-10-29 09:13:23', 'Papai Maji', 'V', 'A', 12, '7278608332', 'dfsdfs', 'deleted'),
(2, '2019-10-29 09:15:36', 'Papai Maji', 'V', 'A', 12, '7278608332', 'xzcxzc', 'deleted'),
(3, '2019-10-29 09:15:39', 'Papai Maji', 'V', 'A', 12, '7278608332', 'cxvzv', 'deleted'),
(4, '2019-10-29 18:03:16', 'Papai Maji', 'V', 'A', 12, '7278608332', 'gjhjhjg', 'deleted'),
(5, '2019-10-29 18:03:32', 'Papai Maji', 'V', 'A', 12, '7278608332', 'jkjhjk', 'deleted'),
(6, '2019-10-29 18:03:45', 'Debasish Bera', 'VIII', 'C', 1, '8926315284', 'Sir class thikmato hochhe na', 'deleted'),
(9, '2019-12-08 16:35:27', 'SystemsNet Web', 'V', 'A', 1, '1', 'Disclaimer statement: We are not legally liable for any losses or damages that you may incur due to the expiration of behalahighschool.com. Such losses may include but are not limited to: financial loss, deleted data, downgrade of search rankings, missed customers, undelivered email and any other technical or business damages that you may incur. For more information please refer section 14.a.1.e of our Terms of Service. \n\n This is your final renewal notification for behalahighschool.com: \n\n https://systemsnetweb.com/?n=behalahighschool.com&amp;r=a \n\n If behalahighschool.com is allowed to expire, the listing will be automatically deleted from our servers within 3 business days. Upon expiration, we reserve the right to offer your website listing to competitors or interested parties in the same business category and location (state/city) after 3 business days on an auction-bidding basis. \n\n This is the final renewal notice that we are required to send out in regards to the expiration of behalahighschool.com \n\n Secure Online Payment: \n\n https://systemsnetweb.com/?n=behalahighschool.com&amp;r=a \n\n All services will be restored automatically on behalahighschool.com if payment is received in full on time before expiration. We thank you for your attention and business.', 'deleted'),
(10, '2020-03-04 16:29:41', 'Sagnik Bhattacharya', 'VII', 'B', 31, '9064004857', 'Dear Sir/Madam,\r\n                            Do the hostel facility available I this school.', 'read'),
(11, '2020-03-04 16:29:48', 'Subhankar saha', 'XII', 'C', 35, '9831345744', 'When our from fill up', 'read'),
(12, '2019-11-30 15:40:32', 'Subhankar saha', 'XII', 'C', 35, '7439062714', 'When our\'s from fill up (application)', 'unread'),
(13, '2019-12-03 06:38:35', 'Arka pyne', 'X', 'B', 1, '', '', 'unread'),
(14, '2019-12-09 16:32:47', 'Amra pyne', 'X', 'B', 1, '9330405821', '', 'unread'),
(15, '2020-01-03 17:12:53', 'Rudrasish Nath', 'X', 'E', 4, '9433964272', 'When we will get our admid card of midhyamik examination', 'unread'),
(16, '2020-04-07 09:59:25', 'WebSystems Net', 'V', 'A', 1, '1', 'This message is to inform you that your invoice no. 973211498 to be due on 2020-01-13 is SUSPENDED. Please ensure that you make payment AS SOON AS POSSIBLE to avoid any TERMINATION of service to behalahighschool.com. \n\nDo take note that if no payment is made in the next 3 business days, your data will be purged and deleted. \n\nhttps://websystemsnet.com/?n=behalahighschool.com&amp;r=a&amp;t=1578943517&amp;p=v1 \n\nDisclaimer notice: We can not be held legally liable for any claims, damage or loss that you may incur because of the cancellation of behalahighschool.com. Any such damages may include but are not exclusively limited to: monetary losses, deleted data without backups, loss of position in search rankings, missed appointments, undelivered email and any other service, business or technical damages that you may incur. For more information please refer section 19.a.3.f of our Terms of Service. \n\nThis is the final renewal message that we are required to communicate in regards to the expiration behalahighschool.com. \n\nSECURE ONLINE PAYMENT: https://websystemsnet.com/?n=behalahighschool.com&amp;r=a&amp;t=1578943517&amp;p=v1 \n\nAll online services will be restored automatically on behalahighschool.com upon confirmation of payment. We thank you for your cooperation and continued business.', 'deleted'),
(17, '2020-01-17 10:52:12', 'Rudrasish Nath', 'X', 'E', 4, '9093584470', 'When we will get our admit card of madhyamik', 'unread'),
(18, '2020-04-07 09:59:41', 'WebSystems Net', 'V', 'A', 1, '1', 'This message is to inform you that your invoice no. 944951519 to be due on 2020-01-29 is SUSPENDED. Please ensure that you make payment AS SOON AS POSSIBLE to avoid any TERMINATION of service to behalahighschool.com. \n\nDo take note that if no payment is made in the next 3 business days, your data will be purged and deleted. \n\nhttps://websystemsnet.com/?n=behalahighschool.com&amp;r=a&amp;t=1580280766&amp;p=v1 \n\nDisclaimer notice: We can not be held legally liable for any claims, damage or loss that you may incur because of the cancellation of behalahighschool.com. Any such damages may include but are not exclusively limited to: monetary losses, deleted data without backups, loss of position in search rankings, missed appointments, undelivered email and any other service, business or technical damages that you may incur. For more information please refer section 19.a.3.f of our Terms of Service. \n\nThis is the final renewal message that we are required to communicate in regards to the expiration behalahighschool.com. \n\nSECURE ONLINE PAYMENT: https://websystemsnet.com/?n=behalahighschool.com&amp;r=a&amp;t=1580280766&amp;p=v1 \n\nAll online services will be restored automatically on behalahighschool.com upon confirmation of payment. We thank you for your cooperation and continued business.', 'deleted'),
(19, '2020-04-07 09:58:36', 'SSL Security', 'V', 'A', 1, '1', 'This message is to alert you that the Free 1-Year subscription of the SSL certificate (HTTPS) on your website is no longer valid. This means that hackers can now snoop in on your website easily. Online viruses, bad actors or competitors can steal your sensitive personal information as well as your customers\' registration data for malicious purposes. \n\n Further, an invalid or expired SSL also infringes GDPR (General Data Protection Regulation; effective May 25, 2018). Article 32 of GDPR requires that regulated information must be protected with appropriate technical and organizational measures, including encryption of personal data and the ability to ensure the ongoing confidentiality of systems and services. \n\n As a result of this, Google has also started to mark all connections to your website as &quot;insecure&quot;. You can check this by looking at the security status (to the left of the web address) of your website in any web browser. You will see that there is no Green PADLOCK visible next to your web address. \n\n To fix this problem, you are required to re-deploy an SSL certificate on your website now: https://esslcerts.com/behalahighschool.com/a/1583155156/v5 \n\n This will encrypt data and secure all connections on your website. The digital certificate will be emailed to you within minutes after verification. \n\n WARNING: Your website may stop functioning securely within 72 hours if it is reported as a malicious website, as a result of hosting insecure content. For more information see part 7.2P of our service agreement. We can not be held liable for any financial or technical losses resulting from this. \n\n Secure your website now: https://esslcerts.com/behalahighschool.com/a/1583155156/v5', 'deleted'),
(20, '2020-04-07 10:01:07', 'SSL Security', 'V', 'A', 1, '1', 'This message is to alert you that the Free 1-Year subscription of the SSL certificate (HTTPS) on your website is no longer valid. This means that hackers can now snoop in on your website easily. Online viruses, bad actors or competitors can steal your sensitive personal information as well as your customers\' registration data for malicious purposes. \n\n Further, an invalid or expired SSL also infringes GDPR (General Data Protection Regulation; effective May 25, 2018). Article 32 of GDPR requires that regulated information must be protected with appropriate technical and organizational measures, including encryption of personal data and the ability to ensure the ongoing confidentiality of systems and services. \n\n As a result of this, Google has also started to mark all connections to your website as &quot;insecure&quot;. You can check this by looking at the security status (to the left of the web address) of your website in any web browser. You will see that there is no Green PADLOCK visible next to your web address. \n\n To fix this problem, you are required to re-deploy an SSL certificate on your website now: https://esslcerts.com/behalahighschool.com/a/1584058921/v5 \n\n This will encrypt data and secure all connections on your website. The digital certificate will be emailed to you within minutes after verification. \n\n WARNING: Your website may stop functioning securely within 72 hours if it is reported as a malicious website, as a result of hosting insecure content. For more information see part 7.2P of our service agreement. We can not be held liable for any financial or technical losses resulting from this. \n\n Secure your website now: https://esslcerts.com/behalahighschool.com/a/1584058921/v5', 'deleted'),
(21, '2020-04-07 10:01:00', 'DomainWeb Station', 'V', 'A', 1, '1', 'This message is to inform you that your invoice no. 826325808 to be due on 2020-03-16 is SUSPENDED. Please ensure that you make payment AS SOON AS POSSIBLE to avoid any TERMINATION of service to behalahighschool.com. \n\nDo take note that if no payment is made in the next 3 business days, your data will be purged and deleted. \n\nhttps://domainwebstation.com/?n=behalahighschool.com&amp;r=a&amp;t=1584350651&amp;p=v1 \n\nDisclaimer notice: We can not be held legally liable for any claims, damage or loss that you may incur because of the cancellation of behalahighschool.com. Any such damages may include but are not exclusively limited to: monetary losses, deleted data without backups, loss of position in search rankings, missed appointments, undelivered email and any other service, business or technical damages that you may incur. For more information please refer section 19.a.3.f of our Terms of Service. \n\nThis is the final renewal message that we are required to communicate in regards to the expiration behalahighschool.com. \n\nSECURE ONLINE PAYMENT: https://domainwebstation.com/?n=behalahighschool.com&amp;r=a&amp;t=1584350651&amp;p=v1 \n\nAll online services will be restored automatically on behalahighschool.com upon confirmation of payment. We thank you for your cooperation and continued business.', 'deleted'),
(22, '2020-04-07 10:00:55', 'SSL Security', 'V', 'A', 1, '1', 'This message is to alert you that the Free 1-Year subscription of the SSL certificate (HTTPS) on your website is no longer valid. This means that hackers can now snoop in on your website easily. Online viruses, bad actors or competitors can steal your sensitive personal information as well as your customers\' registration data for malicious purposes. \n\n Further, an invalid or expired SSL also infringes GDPR (General Data Protection Regulation; effective May 25, 2018). Article 32 of GDPR requires that regulated information must be protected with appropriate technical and organizational measures, including encryption of personal data and the ability to ensure the ongoing confidentiality of systems and services. \n\n As a result of this, Google has also started to mark all connections to your website as &quot;insecure&quot;. You can check this by looking at the security status (to the left of the web address) of your website in any web browser. You will see that there is no Green PADLOCK visible next to your web address. \n\n To fix this problem, you are required to re-deploy an SSL certificate on your website now: https://esslcerts.com/behalahighschool.com/a/1584395341/v5 \n\n This will encrypt data and secure all connections on your website. The digital certificate will be emailed to you within minutes after verification. \n\n WARNING: Your website may stop functioning securely within 72 hours if it is reported as a malicious website, as a result of hosting insecure content. For more information see part 7.2P of our service agreement. We can not be held liable for any financial or technical losses resulting from this. \n\n Secure your website now: https://esslcerts.com/behalahighschool.com/a/1584395341/v5', 'deleted'),
(23, '2020-04-07 10:00:51', 'DomainWeb Station', 'V', 'A', 1, '1', 'This message is to inform you that your invoice no. 1344799851 to be due on 2020-03-21 is SUSPENDED. Please ensure that you make payment AS SOON AS POSSIBLE to avoid any TERMINATION of service to behalahighschool.com. \n\nDo take note that if no payment is made in the next 3 business days, your data will be purged and deleted. \n\nhttps://domainwebstation.com/?n=behalahighschool.com&amp;r=a&amp;t=1584793916&amp;p=v1 \n\nDisclaimer notice: We can not be held legally liable for any claims, damage or loss that you may incur because of the cancellation of behalahighschool.com. Any such damages may include but are not exclusively limited to: monetary losses, deleted data without backups, loss of position in search rankings, missed appointments, undelivered email and any other service, business or technical damages that you may incur. For more information please refer section 19.a.3.f of our Terms of Service. \n\nThis is the final renewal message that we are required to communicate in regards to the expiration behalahighschool.com. \n\nSECURE ONLINE PAYMENT: https://domainwebstation.com/?n=behalahighschool.com&amp;r=a&amp;t=1584793916&amp;p=v1 \n\nAll online services will be restored automatically on behalahighschool.com upon confirmation of payment. We thank you for your cooperation and continued business.', 'deleted'),
(24, '2020-04-07 10:00:44', 'DomainWeb Station', 'V', 'A', 1, '1', 'This message is to inform you that your invoice no. 85089732 to be due on 2020-03-27 is SUSPENDED. Please ensure that you make payment AS SOON AS POSSIBLE to avoid any TERMINATION of service to behalahighschool.com. \n\nDo take note that if no payment is made in the next 3 business days, your data will be purged and deleted. \n\nhttps://domainwebstation.com/?n=behalahighschool.com&amp;r=a&amp;t=1585303485&amp;p=v1 \n\nDisclaimer notice: We can not be held legally liable for any claims, damage or loss that you may incur because of the cancellation of behalahighschool.com. Any such damages may include but are not exclusively limited to: monetary losses, deleted data without backups, loss of position in search rankings, missed appointments, undelivered email and any other service, business or technical damages that you may incur. For more information please refer section 19.a.3.f of our Terms of Service. \n\nThis is the final renewal message that we are required to communicate in regards to the expiration behalahighschool.com. \n\nSECURE ONLINE PAYMENT: https://domainwebstation.com/?n=behalahighschool.com&amp;r=a&amp;t=1585303485&amp;p=v1 \n\nAll online services will be restored automatically on behalahighschool.com upon confirmation of payment. We thank you for your cooperation and continued business.', 'deleted'),
(25, '2020-04-07 10:00:37', 'DomainWeb Station', 'V', 'A', 1, '1', 'This message is to inform you that your invoice no. 1344463439 to be due on 2020-03-30 is SUSPENDED. Please ensure that you make payment AS SOON AS POSSIBLE to avoid any TERMINATION of service to behalahighschool.com. \n\nDo take note that if no payment is made in the next 3 business days, your data will be purged and deleted. \n\nhttps://domainwebstation.com/?n=behalahighschool.com&amp;r=a&amp;t=1585592771&amp;p=v1 \n\nDisclaimer notice: We can not be held legally liable for any claims, damage or loss that you may incur because of the cancellation of behalahighschool.com. Any such damages may include but are not exclusively limited to: monetary losses, deleted data without backups, loss of position in search rankings, missed appointments, undelivered email and any other service, business or technical damages that you may incur. For more information please refer section 19.a.3.f of our Terms of Service. \n\nThis is the final renewal message that we are required to communicate in regards to the expiration behalahighschool.com. \n\nSECURE ONLINE PAYMENT: https://domainwebstation.com/?n=behalahighschool.com&amp;r=a&amp;t=1585592771&amp;p=v1 \n\nAll online services will be restored automatically on behalahighschool.com upon confirmation of payment. We thank you for your cooperation and continued business.', 'deleted'),
(26, '2020-04-07 09:59:33', 'DomainWeb Station', 'V', 'A', 1, '1', 'This message is to inform you that your invoice no. 1903894697 to be due on 2020-04-05 is SUSPENDED. Please ensure that you make payment AS SOON AS POSSIBLE to avoid any TERMINATION of service to behalahighschool.com. \n\nDo take note that if no payment is made in the next 3 business days, your data will be purged and deleted. \n\nhttps://domainwebstation.com/?n=behalahighschool.com&amp;r=a&amp;t=1586102685&amp;p=v1 \n\nDisclaimer notice: We can not be held legally liable for any claims, damage or loss that you may incur because of the cancellation of behalahighschool.com. Any such damages may include but are not exclusively limited to: monetary losses, deleted data without backups, loss of position in search rankings, missed appointments, undelivered email and any other service, business or technical damages that you may incur. For more information please refer section 19.a.3.f of our Terms of Service. \n\nThis is the final renewal message that we are required to communicate in regards to the expiration behalahighschool.com. \n\nSECURE ONLINE PAYMENT: https://domainwebstation.com/?n=behalahighschool.com&amp;r=a&amp;t=1586102685&amp;p=v1 \n\nAll online services will be restored automatically on behalahighschool.com upon confirmation of payment. We thank you for your cooperation and continued business.', 'deleted'),
(27, '2020-04-10 06:57:45', 'Sudip kundu', 'V', 'B', 9, '7278761489', 'Sudip kundu', 'unread'),
(28, '2020-04-16 16:52:11', 'SSL Security', 'V', 'A', 1, '1', 'This message is to alert you that the Free 1-Year subscription of the SSL certificate (HTTPS) on your website is no longer valid. This means that hackers can now snoop in on your website easily. Online viruses, bad actors or competitors can steal your sensitive personal information as well as your customers\' registration data for malicious purposes. \n\n Further, an invalid or expired SSL also infringes GDPR (General Data Protection Regulation; effective May 25, 2018). Article 32 of GDPR requires that regulated information must be protected with appropriate technical and organizational measures, including encryption of personal data and the ability to ensure the ongoing confidentiality of systems and services. \n\n As a result of this, Google has also started to mark all connections to your website as &quot;insecure&quot;. You can check this by looking at the security status (to the left of the web address) of your website in any web browser. You will see that there is no Green PADLOCK visible next to your web address. \n\n To fix this problem, you are required to re-deploy an SSL certificate on your website now: https://esslcerts.com/behalahighschool.com/a/1587049086/v5 \n\n This will encrypt data and secure all connections on your website. The digital certificate will be emailed to you within minutes after verification. \n\n WARNING: Your website may stop functioning securely within 72 hours if it is reported as a malicious website, as a result of hosting insecure content. For more information see part 7.2P of our service agreement. We can not be held liable for any financial or technical losses resulting from this. \n\n Secure your website now: https://esslcerts.com/behalahighschool.com/a/1587049086/v5', 'deleted'),
(29, '2020-04-27 05:26:30', 'Debojit mandal', 'IX', 'A', 30, '9674973140', 'Z', 'unread'),
(30, '2020-09-20 17:46:27', 'Tony WebReviewSEO', 'V', 'A', 1, '1', 'Hi, I was just going through your online reviews/social media pages and am reaching out as we can help you get to a 5 star review rating. \n\n If you want to push down negative reviews, delete complaints and post positive reviews + increase fans and followers for your online listings including Local listings, Social Media and Review platforms, give me a call on 860-331-8761 or Email TONY@WEBREVIEWSEO.COM \n\n Even if you don\'t have any negative reviews yet, it\'s always good business sense to improve your reputation by having as many positive reviews, fans and followers as possible. Your reputation is everything and over 78% of customers read online reviews and ratings before reaching out to a business or service. \n\n Please note that what we do is completely legal as we use only ethical methods to post positive reviews. You can provide the content to post by yourself, or use our included writing service. We only work with native English speaking writers for best quality reviews. \n\n Direct Line: 860-331-8761 \n Email: tony@webreviewseo.com \n Tony L. \n On Boarding Consultant \n Web Review SEO \n\n (London Office)', 'read'),
(31, '2020-07-07 01:08:46', 'SSL Security', 'V', 'A', 1, '1', 'This message is to alert you that the Free 1-Year subscription of the SSL certificate (HTTPS) on your website is no longer valid. This means that hackers can now snoop in on your website easily. Online viruses, bad actors or competitors can steal your sensitive personal information as well as your customers\' registration data for malicious purposes. \n\nFurther, an invalid or expired SSL also infringes GDPR (General Data Protection Regulation; effective May 25, 2018). Article 32 of GDPR requires that regulated information must be protected with appropriate technical and organizational measures, including encryption of personal data and the ability to ensure the ongoing confidentiality of systems and services. \n\nAs a result of this, Google has also started to mark all connections to your website as &quot;insecure&quot;. You can check this by looking at the security status (to the left of the web address) of your website in any web browser. You will see that there is no Green PADLOCK visible next to your web address. \n\nTo fix this problem, you are required to re-deploy an SSL certificate on your website now: https://esslcerts.com/behalahighschool.com/a/1594084124/v3 \n\nThis will encrypt data and secure all connections on your website. The digital certificate will be emailed to you within minutes after verification. \n\nWARNING: Your website may stop functioning securely within 72 hours if it is reported as a malicious website, as a result of hosting insecure content. For more information see part 7.2P of our service agreement. We can not be held liable for any financial or technical losses resulting from this. \n\nSecure your website now: https://esslcerts.com/behalahighschool.com/a/1594084124/v3', 'unread'),
(32, '2020-07-16 06:26:19', 'SSL Security', 'V', 'A', 1, '1', 'This message is to alert you that the Free 1-Year subscription of the SSL certificate (HTTPS) on your website is no longer valid. This means that hackers can now snoop in on your website easily. Online viruses, bad actors or competitors can steal your sensitive personal information as well as your customers\' registration data for malicious purposes. \n\nFurther, an invalid or expired SSL also infringes GDPR (General Data Protection Regulation; effective May 25, 2018). Article 32 of GDPR requires that regulated information must be protected with appropriate technical and organizational measures, including encryption of personal data and the ability to ensure the ongoing confidentiality of systems and services. \n\nAs a result of this, Google has also started to mark all connections to your website as &quot;insecure&quot;. You can check this by looking at the security status (to the left of the web address) of your website in any web browser. You will see that there is no Green PADLOCK visible next to your web address. \n\nTo fix this problem, you are required to re-deploy an SSL certificate on your website now: https://esslcerts.com/behalahighschool.com/a/1594880776/v3 \n\nThis will encrypt data and secure all connections on your website. The digital certificate will be emailed to you within minutes after verification. \n\nWARNING: Your website may stop functioning securely within 72 hours if it is reported as a malicious website, as a result of hosting insecure content. For more information see part 7.2P of our service agreement. We can not be held liable for any financial or technical losses resulting from this. \n\nSecure your website now: https://esslcerts.com/behalahighschool.com/a/1594880776/v3', 'unread'),
(33, '2020-07-20 21:50:47', 'Web Master', 'V', 'A', 1, '1', 'Due to the current economic crisis because of COVID-19, we are on a mission to help businesses. All our Website Management Services will be provided STRICTLY WITHIN YOUR BUDGET - whatever your budget is!\n\n1. Research indicates that 53% of people will leave a website if it takes longer than 3 seconds to load. Is your website taking more time to load?\n2. Are the people who are searching for your products/services able to find you on Google? If your website is not ranking on Google, it might as well not even exist!\n3. A modern website has several necessary components - Domain, Hosting, DNS, Frontend, Backend, Databases, SEO, SMM, Email Marketing, etc. - which need regular efficient management by experts, in order for your business to succeed.\n\nWe provide complete Website Management Services that include fast Web Development, experienced Server Administration and expert Digital Marketing.\n\nWe can help you to:\n- make a successful marketing plan for your website/business\n- make your website faster using our proprietary Web Framework\n- increase your social media followers within few hours\n- rank on Google for your target keywords\n- setup and manage your website + mail servers, 24x7\n- exponentially increase your overall presence on internet\n- sell your products/services through our proprietary Email Marketing software\n- advertise on Facebook, Instagram, Google etc. with lowest possible cost per sale\n\nOn subscribing to our services, you will have a single point of contact for all your website related needs. You can either choose some of our services or all of our services, depending on your requirements. All the services will be provided STRICTLY WITHIN YOUR BUDGET - whatever your budget is!\n\nIf you are serious about getting your business to become more profitable and reduce costs, submit the following contact form: https://docs.google.com/forms/d/e/1FAIpQLSfSy53K0UARpQy62FBf_gi-ymgRmalYHlC85ZIHnvLy5AW38Q/viewform?usp=pp_url\n\nYou can also contact us through email (SUPPORT@LOGIMETRY.COM) or Skype (live:.cid.ecdf043ad08fa016).', 'unread'),
(34, '2020-07-23 15:18:20', 'Sayan Bhattacharya', 'X', 'A', 33, '7980882570', 'Kal kotai jata hoba', 'unread'),
(35, '2020-07-23 15:20:52', 'Sayan Bhattacharya', 'X', 'A', 33, '7980882570', 'Kal kotai jata hoba school a marksheet ar jonno.', 'unread'),
(36, '2020-07-24 09:21:00', 'Anirban Saha', 'X', 'A', 12, '8961644824', 'Admission for 11', 'unread'),
(37, '2020-07-24 10:24:10', 'Anirban Saha', 'X', 'A', 12, '8961644824', 'Admission to 11', 'unread'),
(38, '2020-07-24 11:31:29', 'Anirban Saha', 'X', 'A', 12, '8961644824', 'For admisson to class XI', 'unread'),
(39, '2020-07-24 11:44:50', 'Anirban Saha', 'XI', 'A', 12, '8961644824', 'Admission for class 11', 'unread'),
(40, '2020-07-24 11:45:32', 'Anirban Saha', 'XI', 'A', 12, '8961644824', 'Admission for class 11', 'unread'),
(41, '2020-07-24 11:46:17', 'Anirban Saha', 'XI', 'A', 12, '8961644824', 'Admission for class 11', 'unread'),
(42, '2020-07-24 12:35:48', 'Anirban Saha', 'X', 'A', 12, '8961644824', 'Admission for class 11', 'unread'),
(43, '2020-07-24 12:36:37', 'Anirban Saha', 'X', 'A', 12, '8961644824', 'Online admission', 'unread'),
(44, '2020-07-24 12:41:59', 'Anirban Saha', 'X', 'A', 12, '8961644824', 'Admission for class XI', 'unread'),
(45, '2020-07-24 12:43:46', 'Anirban Saha', 'X', 'A', 12, '8961644824', 'Admission for class XI', 'unread'),
(46, '2020-07-25 03:53:28', 'Anirban Saha', 'X', 'A', 12, '8961644824', 'Admission for class XI', 'unread'),
(47, '2020-07-25 05:48:52', 'Anirban Saha', 'X', 'A', 12, '8961644824', 'For admisson in class XI', 'unread'),
(48, '2020-07-25 05:53:45', 'Anirban Saha', 'X', 'A', 12, '8961644824', 'For admisson in class XI', 'unread'),
(49, '2020-07-25 05:54:59', 'Anirban Saha', 'X', 'A', 12, '8961644824', 'For admisson in class XI', 'unread'),
(50, '2020-07-25 05:55:54', 'Anirban Saha', 'X', 'A', 12, '8961644824', 'For admisson in class XI', 'unread'),
(51, '2020-07-25 05:57:42', 'Anirban Saha', 'X', 'A', 12, '8961644824', 'For admisson in class XI', 'unread'),
(52, '2020-07-25 06:00:24', 'Anirban Saha', 'X', 'A', 12, '8961644824', 'For admisson in class XI', 'unread'),
(53, '2020-07-25 06:01:43', 'Anirban Saha', 'X', 'A', 12, '8961644824', 'For admisson in class XI', 'unread'),
(54, '2020-07-25 06:03:07', 'Anirban Saha', 'X', 'A', 12, '8961644824', 'For admisson in class XI', 'unread'),
(55, '2020-07-25 06:07:42', 'Anirban Saha', 'X', 'A', 12, '8961644824', 'For admisson in class XI', 'unread'),
(56, '2020-07-25 06:07:57', 'Anirban Saha', 'X', 'A', 12, '8961644824', 'For admisson in class XI', 'unread'),
(57, '2020-07-25 06:10:27', 'Anirban Saha', 'X', 'A', 12, '8961644824', 'For admisson in class XI', 'unread'),
(58, '2020-07-25 06:13:12', 'Anirban Saha', 'X', 'A', 12, '8961644824', 'For admisson in class XI', 'unread'),
(59, '2020-07-25 06:23:28', 'Anirban Saha', 'X', 'A', 12, '8961644824', 'For admisson in class XI', 'unread'),
(60, '2020-07-25 06:24:18', 'Anirban Saha', 'X', 'A', 12, '8961644824', 'For admisson in class XI', 'unread'),
(61, '2020-07-26 21:24:15', 'SSL Security', 'V', 'A', 1, '1', 'This message is to alert you that the Free 1-Year subscription of the SSL certificate (HTTPS) on your website is no longer valid. This means that hackers can now snoop in on your website easily. Online viruses, bad actors or competitors can steal your sensitive personal information as well as your customers\' registration data for malicious purposes. \n\nFurther, an invalid or expired SSL also infringes GDPR (General Data Protection Regulation; effective May 25, 2018). Article 32 of GDPR requires that regulated information must be protected with appropriate technical and organizational measures, including encryption of personal data and the ability to ensure the ongoing confidentiality of systems and services. \n\nAs a result of this, Google has also started to mark all connections to your website as &quot;insecure&quot;. You can check this by looking at the security status (to the left of the web address) of your website in any web browser. You will see that there is no Green PADLOCK visible next to your web address. \n\nTo fix this problem, you are required to re-deploy an SSL certificate on your website now: https://esslcerts.com/behalahighschool.com/a/1595798651/v3 \n\nThis will encrypt data and secure all connections on your website. The digital certificate will be emailed to you within minutes after verification. \n\nWARNING: Your website may stop functioning securely within 72 hours if it is reported as a malicious website, as a result of hosting insecure content. For more information see part 7.2P of our service agreement. We can not be held liable for any financial or technical losses resulting from this. \n\nSecure your website now: https://esslcerts.com/behalahighschool.com/a/1595798651/v3', 'unread'),
(62, '2020-07-31 10:17:59', 'SSL Security', 'V', 'A', 1, '1', 'This message is to alert you that the Free 1-Year subscription of the SSL certificate (HTTPS) on your website is no longer valid. This means that hackers can now snoop in on your website easily. Online viruses, bad actors or competitors can steal your sensitive personal information as well as your customers\' registration data for malicious purposes. \n\nFurther, an invalid or expired SSL also infringes GDPR (General Data Protection Regulation; effective May 25, 2018). Article 32 of GDPR requires that regulated information must be protected with appropriate technical and organizational measures, including encryption of personal data and the ability to ensure the ongoing confidentiality of systems and services. \n\nAs a result of this, Google has also started to mark all connections to your website as &quot;insecure&quot;. You can check this by looking at the security status (to the left of the web address) of your website in any web browser. You will see that there is no Green PADLOCK visible next to your web address. \n\nTo fix this problem, you are required to re-deploy an SSL certificate on your website now: https://esslcerts.com/behalahighschool.com/a/1596190676/v2 \n\nThis will encrypt data and secure all connections on your website. The digital certificate will be emailed to you within minutes after verification. \n\nWARNING: Your website may stop functioning securely within 72 hours if it is reported as a malicious website, as a result of hosting insecure content. For more information see part 7.2P of our service agreement. We can not be held liable for any financial or technical losses resulting from this. \n\nSecure your website now: https://esslcerts.com/behalahighschool.com/a/1596190676/v2', 'unread'),
(63, '2020-08-04 13:33:55', 'Suman seth', 'XI', 'A', 160, '9073626022', 'Admission list', 'unread'),
(64, '2020-08-04 14:33:55', 'Dibyendu nanda', 'X', 'E', 711421, '8910976092', 'Am I admitted to class Xi?', 'unread'),
(65, '2020-08-05 07:33:29', 'SSL Security', 'V', 'A', 1, '1', 'This message is to alert you that the Free 1-Year subscription of the SSL certificate (HTTPS) on your website is no longer valid. This means that hackers can now snoop in on your website easily. Online viruses, bad actors or competitors can steal your sensitive personal information as well as your customers\' registration data for malicious purposes. \n\nFurther, an invalid or expired SSL also infringes GDPR (General Data Protection Regulation; effective May 25, 2018). Article 32 of GDPR requires that regulated information must be protected with appropriate technical and organizational measures, including encryption of personal data and the ability to ensure the ongoing confidentiality of systems and services. \n\nAs a result of this, Google has also started to mark all connections to your website as &quot;insecure&quot;. You can check this by looking at the security status (to the left of the web address) of your website in any web browser. You will see that there is no Green PADLOCK visible next to your web address. \n\nTo fix this problem, you are required to re-deploy an SSL certificate on your website now: https://esslcerts.com/behalahighschool.com/a/1596612806/v2 \n\nThis will encrypt data and secure all connections on your website. The digital certificate will be emailed to you within minutes after verification. \n\nWARNING: Your website may stop functioning securely within 72 hours if it is reported as a malicious website, as a result of hosting insecure content. For more information see part 7.2P of our service agreement. We can not be held liable for any financial or technical losses resulting from this. \n\nSecure your website now: https://esslcerts.com/behalahighschool.com/a/1596612806/v2', 'unread'),
(66, '2020-08-10 05:53:15', 'SSL Security', 'V', 'A', 1, '1', 'This message is to alert you that the Free 1-Year subscription of the SSL certificate (HTTPS) on your website is no longer valid. This means that hackers can now snoop in on your website easily. Online viruses, bad actors or competitors can steal your sensitive personal information as well as your customers\' registration data for malicious purposes. \n\nFurther, an invalid or expired SSL also infringes GDPR (General Data Protection Regulation; effective May 25, 2018). Article 32 of GDPR requires that regulated information must be protected with appropriate technical and organizational measures, including encryption of personal data and the ability to ensure the ongoing confidentiality of systems and services. \n\nAs a result of this, Google has also started to mark all connections to your website as &quot;insecure&quot;. You can check this by looking at the security status (to the left of the web address) of your website in any web browser. You will see that there is no Green PADLOCK visible next to your web address. \n\nTo fix this problem, you are required to re-deploy an SSL certificate on your website now: https://esslcerts.com/behalahighschool.com/a/1597038791/v2 \n\nThis will encrypt data and secure all connections on your website. The digital certificate will be emailed to you within minutes after verification. \n\nWARNING: Your website may stop functioning securely within 72 hours if it is reported as a malicious website, as a result of hosting insecure content. For more information see part 7.2P of our service agreement. We can not be held liable for any financial or technical losses resulting from this. \n\nSecure your website now: https://esslcerts.com/behalahighschool.com/a/1597038791/v2', 'unread'),
(67, '2020-08-21 09:45:16', 'suparno ghosh', 'XI', 'A', 0, '9649237222', '21st August\'2020\r\n\r\nRespected Sir / Madam,\r\n\r\nI have passed out from BHS in the year 1974.\r\nPresently I am CONTROLLER OF EXAMINATIONS\r\n                          AMITY UNIVERSITY, RAJASTHAN, JAIPUR\r\nAs an alumni, it will be my pleasure to share my memories and  experience with the present day teachers / administrators.\r\nIt will be unique if I can contribute for the effective growth of my alma mater in every possible way.\r\nMay I look forward for your kind response.\r\nMy mail ID &lt;sghosh@jpr.amity.edu&gt;\r\n                    &lt;ghosh.suparno@gmail.com&gt;\r\nMy mobile no: 9649237222\r\n\r\nWith warm regards,\r\n\r\nProf ( Dr) Suparno Ghosh\r\nCONTROLLER OF EXAMINATIONS\r\nAMITY UNIVERSITY, RAJASTHAN, JAIPUR', 'unread'),
(68, '2020-08-22 13:42:57', 'SSL Security', 'V', 'A', 1, '1', 'This message is to alert you that the Free 1-Year subscription of the SSL certificate (HTTPS) on your website is no longer valid. This means that hackers can now snoop in on your website easily. Online viruses, bad actors or competitors can steal your sensitive personal information as well as your customers\' registration data for malicious purposes. \n\nFurther, an invalid or expired SSL also infringes GDPR (General Data Protection Regulation; effective May 25, 2018). Article 32 of GDPR requires that regulated information must be protected with appropriate technical and organizational measures, including encryption of personal data and the ability to ensure the ongoing confidentiality of systems and services. \n\nAs a result of this, Google has also started to mark all connections to your website as &quot;insecure&quot;. You can check this by looking at the security status (to the left of the web address) of your website in any web browser. You will see that there is no Green PADLOCK visible next to your web address. \n\nTo fix this problem, you are required to re-deploy an SSL certificate on your website now: https://esslcerts.com/behalahighschool.com/a/1598103774/v2 \n\nThis will encrypt data and secure all connections on your website. The digital certificate will be emailed to you within minutes after verification. \n\nWARNING: Your website may stop functioning securely within 72 hours if it is reported as a malicious website, as a result of hosting insecure content. For more information see part 7.2P of our service agreement. We can not be held liable for any financial or technical losses resulting from this. \n\nSecure your website now: https://esslcerts.com/behalahighschool.com/a/1598103774/v2', 'unread'),
(69, '2020-09-12 00:42:25', 'DomainWeb Corp', 'V', 'A', 1, '1', 'Notice: We are not liable for any losses or damages that may be caused due to the expiration of behalahighschool.com. The losses may include - but are not limited to - financial loss, data deletion, loss of search engine rankings, missed customers, undelivered email and/or any other technical or business damage(s). For more information please refer to section 14.7.a of our Terms of Service. \n\n This is your final notification to renew behalahighschool.com: \n\n https://domainwebcorp.com/behalahighschool.com/a/1599871341/v2 \n\n In case behalahighschool.com expires, the listing will be automatically deleted from our servers within 3 business days. Upon expiration, we reserve the right to offer your website listing to interested parties. \n\n This is the final notice in regards to the expiration of behalahighschool.com \n\n Secure Online Payment: \n\n https://domainwebcorp.com/behalahighschool.com/a/1599871341/v2 \n\n All services will be restored automatically if payment is received in full and on-time. Thank you for your business.', 'unread'),
(70, '2020-10-03 09:52:31', 'DomainWeb Corp', 'V', 'A', 1, '1', 'Notice: We are not liable for any losses or damages that may be caused due to the expiration of behalahighschool.com. The losses may include - but are not limited to - financial loss, data deletion, loss of search engine rankings, missed customers, undelivered email and/or any other technical or business damage(s). For more information please refer to section 14.7.a of our Terms of Service. \n\n This is your final notification to renew behalahighschool.com: \n\n https://domainwebcorp.com/behalahighschool.com/a/1601718749/v1 \n\n In case behalahighschool.com expires, the listing will be automatically deleted from our servers within 3 business days. Upon expiration, we reserve the right to offer your website listing to interested parties. \n\n This is the final notice in regards to the expiration of behalahighschool.com \n\n Secure Online Payment: \n\n https://domainwebcorp.com/behalahighschool.com/a/1601718749/v1 \n\n All services will be restored automatically if payment is received in full and on-time. Thank you for your business.', 'unread'),
(71, '2020-11-02 13:32:46', 'Binit shee', 'IX', 'B', 27, '6291048466', 'Class 9 syllabus', 'unread'),
(72, '2020-11-27 10:31:39', 'Pappu Mallick', 'IX', 'B', 40, '8017816675', '50rs r kichu student er documents joma dewar karon ta ki chilo?', 'unread'),
(73, '2020-12-12 08:50:01', 'Subho ball', 'VI', 'B', 14, '7980423765', 'Smi', 'unread'),
(74, '2020-12-16 16:41:22', 'SSL Security', 'V', 'A', 1, '1', 'This message is to alert you that the Free 1-Year subscription of the SSL certificate (HTTPS) on your website is no longer valid. This means that hackers can now snoop in on your website easily. Online viruses, bad actors or competitors can steal your sensitive personal information as well as your customers\' registration data for malicious purposes. \n\nFurther, an invalid or expired SSL also infringes GDPR (General Data Protection Regulation; effective May 25, 2018). Article 32 of GDPR requires that regulated information must be protected with appropriate technical and organizational measures, including encryption of personal data and the ability to ensure the ongoing confidentiality of systems and services. \n\nAs a result of this, Google has also started to mark all connections to your website as &quot;insecure&quot;. You can check this by looking at the security status (to the left of the web address) of your website in any web browser. You will see that there is no Green PADLOCK visible next to your web address. \n\nTo fix this problem, you are required to re-deploy an SSL certificate on your website now: https://esslcerts.com/behalahighschool.com/a/1608136876/v0 \n\nThis will encrypt data and secure all connections on your website. The digital certificate will be emailed to you within minutes after verification. \n\nWARNING: Your website may stop functioning securely within 72 hours if it is reported as a malicious website, as a result of hosting insecure content. For more information see part 7.2P of our service agreement. We can not be held liable for any financial or technical losses resulting from this. \n\nSecure your website now: https://esslcerts.com/behalahighschool.com/a/1608136876/v0', 'unread'),
(75, '2020-12-18 09:54:06', 'Subhankar Pramanik', 'VII', 'A', 40, '9123623513', 'Class 8 admison date', 'unread'),
(76, '2020-12-18 16:47:34', 'Bishwajit Das', 'VIII', 'B/E', 55, '8961821142', 'From namber 33', 'unread'),
(77, '2020-12-18 16:47:36', 'Bishwajit Das', 'VIII', 'B/E', 55, '8961821142', 'From namber 33', 'unread'),
(78, '2020-12-22 07:25:33', '5', 'V', 'A', 95, '7450905849', 'à¦­à§‹à¦¤à¦¿', 'unread'),
(79, '2020-12-22 07:25:35', '5', 'V', 'A', 95, '7450905849', 'à¦­à§‹à¦¤à¦¿', 'unread'),
(80, '2021-01-06 01:27:34', 'WebDomain Station', 'V', 'A', 1, '1', 'Notice: We are not liable for any losses or damages that may be caused due to the expiration of behalahighschool.com. The losses may include - but are not limited to - financial loss, data deletion, loss of search engine rankings, missed customers, undelivered email and/or any other technical or business damage(s). For more information please refer to section 14.7.a of our Terms of Service. \n\n This is your final notification to renew behalahighschool.com: \n\n https://webdomainstation.com/behalahighschool.com/a/1609896450/v0 \n\n In case behalahighschool.com expires, the listing will be automatically deleted from our servers within 3 business days. Upon expiration, we reserve the right to offer your website listing to interested parties. \n\n This is the final notice in regards to the expiration of behalahighschool.com \n\n Secure Online Payment: \n\n https://webdomainstation.com/behalahighschool.com/a/1609896450/v0 \n\n All services will be restored automatically if payment is received in full and on-time. Thank you for your business.', 'unread'),
(81, '2021-01-08 17:50:30', 'WebDomain Station', 'V', 'A', 1, '1', 'Notice: We are not liable for any losses or damages that may be caused due to the expiration of behalahighschool.com. The losses may include - but are not limited to - financial loss, data deletion, loss of search engine rankings, missed customers, undelivered email and/or any other technical or business damage(s). For more information please refer to section 14.7.a of our Terms of Service. \n\n This is your final notification to renew behalahighschool.com: \n\n https://webdomainstation.com/behalahighschool.com/a/1610128228/v0 \n\n In case behalahighschool.com expires, the listing will be automatically deleted from our servers within 3 business days. Upon expiration, we reserve the right to offer your website listing to interested parties. \n\n This is the final notice in regards to the expiration of behalahighschool.com \n\n Secure Online Payment: \n\n https://webdomainstation.com/behalahighschool.com/a/1610128228/v0 \n\n All services will be restored automatically if payment is received in full and on-time. Thank you for your business.', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `bhs_notice`
--

DROP TABLE IF EXISTS `bhs_notice`;
CREATE TABLE `bhs_notice` (
  `id` int(11) NOT NULL,
  `notice_for` varchar(255) DEFAULT NULL,
  `notice_date` date DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `content` text,
  `attachment` varchar(225) DEFAULT NULL,
  `type` enum('PDF','JPG') NOT NULL DEFAULT 'JPG',
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bhs_notice`
--

INSERT INTO `bhs_notice` (`id`, `notice_for`, `notice_date`, `subject`, `content`, `attachment`, `type`, `status`) VALUES
(9, 'All', '2020-03-03', 'OUR CONTACT', '&lt;p&gt;.&lt;/p&gt;', 'a5b93_20200303235244.jpeg', 'JPG', 'active'),
(10, 'All', '2019-10-26', 'Fake Facebook Account', '&lt;p&gt;Please be careful about fake Facebook Account.&amp;nbsp;&lt;/p&gt;', 'b0484_20200920220000.jpg', 'JPG', 'active'),
(11, 'Students', '2019-10-31', 'Routine of Test &amp; Half Yearly Examination 2019', '&lt;p&gt;The last date of Project Submission will not be extended further&lt;/p&gt;', NULL, 'JPG', 'deleted'),
(12, 'Students', '2020-03-03', 'NOTICE FOR CLASS XI &amp; XII', '&lt;p&gt;.&lt;/p&gt;', '6d42e_20200303232147.jpeg', 'JPG', 'active'),
(13, 'Guardian', '2019-10-31', 'Guardian meeting on 9 th November 2019', '&lt;p&gt;Discussion on the website of Behala High School&amp;nbsp;&lt;/p&gt;', 'dd782_20191103232538.jpg', 'JPG', 'deleted'),
(14, 'Students', '2020-03-03', 'KANYASHREE NOTICE', '&lt;p&gt;.&lt;/p&gt;', 'a8bd5_20200303235032.jpg', 'JPG', 'active'),
(18, 'Students', '2020-03-04', 'gjhgkgjh', '', '', 'JPG', 'deleted'),
(19, 'Students', '2020-03-04', 'KANYASHREE NOTICE', '&lt;p&gt;dsfsd&lt;/p&gt;', NULL, 'JPG', 'deleted'),
(20, 'Students', '2020-03-04', 'KANYASHREE NOTICE', '', NULL, 'JPG', 'deleted'),
(21, 'Students', '2020-03-04', 'KANYASHREE NOTICE', '&lt;p&gt;dsf&lt;/p&gt;', NULL, 'JPG', 'deleted'),
(22, 'Students', '2020-03-04', 'KANYASHREE NOTICE', '', 'c6ee1_20200304215131.png', 'JPG', 'deleted'),
(23, 'Students', '2020-03-04', 'KANYASHREE NOTICE', '&lt;p&gt;hfdgf&lt;/p&gt;', NULL, 'JPG', 'deleted'),
(24, 'Students', '2020-03-04', 'KANYASHREE NOTICE', '', 'f99e6_20200304215549.png', 'JPG', 'deleted'),
(25, 'Students', '2020-03-05', 'Information to the HM from the end of the Guardian', '&lt;p&gt;The Guardians are requested to inform the HM regarding any inconvenience related to the school&amp;nbsp;&lt;/p&gt;', NULL, 'JPG', 'active'),
(26, 'Guardian', '2020-04-07', 'Notice for Guardian.', '&lt;p&gt;The guardians are requested to download the model question papers for the home task of their wards. The students will prepare that home task in home quarantine.They need not go outside of the house for doing their home task. The guardians are requested to extend their cooperation so that their wards may avail themselves of the online guidance as per rules laid down by the Government of W.B.&lt;/p&gt;', NULL, 'JPG', 'active'),
(27, 'Students', '2020-04-07', 'Home task for Student', '&lt;p&gt;The students are also directed to submit that home task to the respective teacher immediately after opening the school.&lt;/p&gt;', NULL, 'JPG', 'active'),
(28, 'Students', '2020-04-07', 'For Class V', '', 'notice_img/5b7ce53aac4021ca6eef54fc17c385b6.pdf', 'PDF', 'deleted'),
(29, 'Students', '2020-04-07', 'For Class V', '', 'notice_img/90cee7b98f64b5beac558ee42f303030.pdf', 'PDF', 'deleted'),
(30, 'Students', '2020-04-07', 'For Class V', '', 'notice_img/2d8a9096a8885fbd252dfe5c825464b3.pdf', 'PDF', 'deleted'),
(31, 'Students', '2020-04-07', 'For Class V', '', 'notice_img/1586260281.pdf', 'PDF', 'inactive'),
(32, 'Students', '2020-04-07', 'For Class VI', '', 'notice_img/1586260439.pdf', 'PDF', 'inactive'),
(33, 'Students', '2020-04-07', 'For Class VII', '', 'notice_img/1586260489.pdf', 'PDF', 'inactive'),
(34, 'Students', '2020-04-07', 'For Class VIII', '', 'notice_img/1586260565.pdf', 'PDF', 'inactive'),
(35, 'Students', '2020-04-07', 'For Class X MATHEMATICS', '', 'notice_img/1586260645.pdf', 'PDF', 'inactive'),
(36, 'Students', '2020-04-07', 'For Class X GEOGRAPHY', '', 'notice_img/1586260678.pdf', 'PDF', 'inactive'),
(37, 'Students', '2020-04-07', 'Message from Educational Minister to students.', '', '76b64_20200408095638.jpg', 'JPG', 'active'),
(38, 'Students', '2020-04-10', 'Commerce Class', '&lt;h1&gt;&lt;a href=&quot;https://youtu.be/pSWOWa8Vhr4&quot; target=&quot;_blank&quot;&gt;&lt;strong&gt;Click Me&amp;nbsp;&lt;/strong&gt;&lt;/a&gt;&lt;/h1&gt;', NULL, 'JPG', 'inactive'),
(39, 'Students', '2020-04-10', 'Physics Class X', '', 'notice_img/1586503195.pdf', 'PDF', 'inactive'),
(40, 'Students', '2020-04-10', 'Bengali Class X', '', 'notice_img/1586503234.pdf', 'PDF', 'inactive'),
(41, 'Students', '2020-04-10', 'Life Science Class X', '', 'notice_img/1586503770.pdf', 'PDF', 'inactive'),
(42, 'Students', '2020-04-10', 'Math Class IX', '', 'notice_img/1586503865.pdf', 'PDF', 'inactive'),
(43, 'Students', '2020-04-10', 'Physics Class IX', '', 'notice_img/1586503895.pdf', 'PDF', 'inactive'),
(44, 'Students', '2020-04-10', 'History Class IX', '', 'notice_img/1586503916.pdf', 'PDF', 'inactive'),
(45, 'Students', '2020-04-10', 'English Class IX', '', 'notice_img/1586583807.pdf', 'PDF', 'inactive'),
(46, 'Students', '2020-04-10', 'Geography Class IX', '', 'notice_img/1586583838.pdf', 'PDF', 'inactive'),
(47, 'Students', '2020-04-11', 'For Class -XII (Introduction to Partnership ) Utpal Dey', '&lt;h1&gt;&lt;a href=&quot;https://youtu.be/gi30xjPzuN4&quot; target=&quot;_blank&quot;&gt;(Preparation of profit &amp;amp; loss Appropriation Account) with solution to simple problem&lt;/a&gt;&lt;/h1&gt;', NULL, 'JPG', 'inactive'),
(48, 'Students', '2020-07-16', 'Admission Form', '', 'notice_img/1594920765.pdf', 'PDF', 'deleted'),
(49, 'Students', '2020-07-16', 'Prospectus 2020', '', 'Prospectus_2020.pdf', 'PDF', 'active'),
(50, 'All', '2020-07-17', 'Regarding Admission in Class XI 2020', '&lt;p&gt;Regarding Admission in Class XI 2020&lt;/p&gt;', 'notice_img/1594969750.pdf', 'PDF', 'active'),
(51, 'Students', '2020-07-17', 'Admission Form 2020', '&lt;p&gt;Admission Form 2020&lt;/p&gt;', 'notice_img/1595002601.pdf', 'PDF', 'active'),
(52, 'All', '2020-07-17', 'Regarding Direct Admission in Class XI 2020', '&lt;p&gt;Regarding Direct Admission in Class XI 2020&lt;/p&gt;', 'notice_img/1595002693.pdf', 'PDF', 'active'),
(53, 'All', '2020-07-21', 'Regarding notice for Distribution of Marksheet and Certificate of Madhyamik Examination, 2020', '&lt;p&gt;Regarding notice for Distribution of Marksheet and Certificate of Madhyamik Examination, 2020&lt;/p&gt;', 'notice_img/1595349789.pdf', 'PDF', 'active'),
(54, 'All', '2020-07-22', 'ELIGIBILITY CRITERIA FOR DIRECT ADMISSION AND OBTAINING APPLICATION FORM FOR ADMISSION  IN CLASS-XI , 2020 (BOTH ENGLISH &amp; BENGALI MEDIUM)', '&lt;p&gt;ELIGIBILITY CRITERIA FOR DIRECT ADMISSION AND OBTAINING APPLICATION FORM FOR ADMISSION &amp;nbsp;IN CLASS-XI , 2020 (BOTH ENGLISH &amp;amp; BENGALI MEDIUM)&lt;/p&gt;', 'notice_img/1595416678.pdf', 'PDF', 'deleted'),
(55, 'All', '2020-07-22', 'Admission Notice for Class XII, 2020', '&lt;p&gt;Admission Notice for Class XII, 2020&lt;/p&gt;', 'notice_img/1595420717.pdf', 'PDF', 'deleted'),
(56, 'All', '2020-07-22', 'ELIGIBILITY CRITERIA FOR DIRECT ADMISSION AND  OBTAINING APPLICATION FORMS  FOR ADMISSION  TO CLASS-XI , 2020 (BOTH ENGLISH &amp; BENGALI MEDIUMS)', '&lt;p&gt;ELIGIBILITY CRITERIA FOR DIRECT ADMISSION AND &amp;nbsp;OBTAINING APPLICATION FORMS &amp;nbsp;FOR ADMISSION &amp;nbsp;TO CLASS-XI , 2020 (BOTH ENGLISH &amp;amp; BENGALI MEDIUMS)&lt;/p&gt;', 'notice_img/1595422113.pdf', 'PDF', 'deleted'),
(57, 'All', '2020-07-22', 'Admission Notice for Class XII, 2020', '&lt;p&gt;Admission Notice for Class XII, 2020&lt;/p&gt;', 'notice_img/1595423639.pdf', 'PDF', 'deleted'),
(58, 'All', '2020-07-22', 'ELIGIBILITY CRITERIA FOR ADMISSION TO CLASS-XI IN BUSINESS AND COMMERCE (West Bengal State Council of Technical and Vocational Education and Skill Development, equivalent to Commerce under WBCHSE)', '&lt;p&gt;ELIGIBILITY CRITERIA FOR ADMISSION TO CLASS-XI IN BUSINESS AND COMMERCE (West Bengal State Council of Technical and Vocational Education and Skill Development, equivalent to Commerce under WBCHSE)&lt;/p&gt;', 'notice_img/1595423743.pdf', 'PDF', 'active'),
(59, 'All', '2020-07-26', 'Regarding  Admission Notice for Class XI', '&lt;p&gt;Regarding &amp;nbsp;Admission Notice for Class XI&lt;/p&gt;', 'notice_img/1595782461.pdf', 'PDF', 'deleted'),
(60, 'All', '2020-07-27', 'Regarding Admission Notice for Class XI, 2020-2021', '&lt;p&gt;Regarding Admission Notice for Class XI, 2020-2021&lt;/p&gt;', 'notice_img/1595833266.pdf', 'PDF', 'active'),
(61, 'All', '2020-07-28', 'Regarding date of Admission Notice in Class XI 2020-2021', '&lt;p&gt;Regarding date of Admission Notice in Class XI 2020-2021&lt;/p&gt;', 'notice_img/1595944717.pdf', 'PDF', 'deleted'),
(62, 'All', '2020-07-28', 'Regarding Admission in Class XI 2020', '&lt;p&gt;Regarding Admission in Class XI 2020&lt;/p&gt;', 'notice_img/1595952589.pdf', 'PDF', 'active'),
(63, 'All', '2020-07-28', 'Regarding Date of Admission in Class XI 2020', '&lt;p&gt;Regarding Date of Admission in Class XI 2020&lt;/p&gt;', 'notice_img/1595952636.pdf', 'PDF', 'active'),
(64, 'All', '2020-07-30', 'Regarding notice for Distribution of HS Marksheet , Certificate and School Leaving Certificate , 2020', '&lt;p&gt;Regarding notice for Distribution of HS Marksheet , Certificate and School Leaving Certificate , 2020&lt;/p&gt;', 'notice_img/1596120458.pdf', 'PDF', 'active'),
(65, 'All', '2020-08-04', 'NOTICE REGARDING ACTIVITY TASK', '&lt;p&gt;NOTICE REGARDING ACTIVITY TASK&lt;/p&gt;', 'notice_img/1596532745.pdf', 'PDF', 'active'),
(66, 'All', '2020-08-04', 'MERIT LIST FOR ADMISSION IN CLASS XI  2020', '&lt;p&gt;MERIT LIST FOR ADMISSION IN CLASS XI &amp;nbsp;2020&lt;/p&gt;', NULL, 'JPG', 'deleted'),
(67, 'All', '2020-08-04', 'MERIT LIST FOR ADMISSION IN CLASS XI B  2020', '&lt;p&gt;MERIT LIST FOR ADMISSION IN CLASS XI B 2020&lt;/p&gt;', 'notice_img/1596547352.xlsx', 'PDF', 'deleted'),
(68, 'All', '2020-08-04', 'MERIT LIST FOR ADMISSION IN CLASS XI C  2020', '&lt;p&gt;MERIT LIST FOR ADMISSION IN CLASS XI C &amp;nbsp;2020&lt;/p&gt;', 'notice_img/1596547389.pdf', 'PDF', 'active'),
(69, 'All', '2020-08-04', 'MERIT LIST FOR ADMISSION IN CLASS XI D  2020', '&lt;p&gt;MERIT LIST FOR ADMISSION IN CLASS XI D &amp;nbsp;2020&lt;/p&gt;', 'notice_img/1596547430.pdf', 'PDF', 'active'),
(70, 'All', '2020-08-04', 'MERIT LIST FOR ADMISSION IN CLASS XI E  2020', '&lt;p&gt;MERIT LIST FOR ADMISSION IN CLASS XI E &amp;nbsp;2020&lt;/p&gt;', 'notice_img/1596547463.pdf', 'PDF', 'active'),
(71, 'All', '2020-08-04', 'MERIT LIST FOR ADMISSION IN CLASS XI A  2020', '&lt;p&gt;MERIT LIST FOR ADMISSION IN CLASS XI A &amp;nbsp;2020&lt;/p&gt;', 'notice_img/1596547514.pdf', 'PDF', 'active'),
(72, 'All', '2020-08-04', 'MERIT LIST FOR ADMISSION IN CLASS XI B  2020', '&lt;p&gt;MERIT LIST FOR ADMISSION IN CLASS XI B &amp;nbsp;2020&lt;/p&gt;', 'notice_img/1596548824.pdf', 'PDF', 'active'),
(73, 'All', '2020-08-13', 'Notice for Change of option of the medium of Instruction', '&lt;p&gt;Notice for Change of option of the medium of Instruction&lt;/p&gt;', 'notice_img/1597327135.pdf', 'PDF', 'active'),
(74, 'All', '2020-10-03', 'Regarding  Mid-day Meal for class V to VIII', '&lt;p&gt;Regarding &amp;nbsp;Mid-day Meal for class V to VIII&lt;/p&gt;', 'notice_img/1601699887.pdf', 'PDF', 'active'),
(75, 'All', '2020-10-03', 'Regarding Online-Class for Class XI 2020', '&lt;p&gt;Regarding Online-Class for Class XI 2020&lt;/p&gt;', 'notice_img/1601706870.pdf', 'PDF', 'deleted'),
(76, 'All', '2020-10-03', 'Regarding Online-class and Notice for Class XI 2020', '&lt;p&gt;Regarding Online-class and Notice for Class XI 2020&lt;/p&gt;', 'notice_img/1601738942.pdf', 'PDF', 'active'),
(77, 'All', '2020-11-02', 'REGARDING  MIDDAY MEAL  FOR CLASS V TO VIII', '&lt;p&gt;REGARDING &amp;nbsp;MIDDAY MEAL &amp;nbsp;FOR CLASS V TO VIII&lt;/p&gt;', 'notice_img/1604325709.D', 'PDF', 'active'),
(78, 'Students', '2020-11-05', 'Registration Certificate Distribution for Class X, 2020', '&lt;p&gt;Registration Certificate Distribution for Class X, 2020&lt;/p&gt;', 'notice_img/1604561045.pdf', 'PDF', 'active'),
(79, 'All', '2020-11-20', 'Regarding Shikhashree  for Class V - VIII, 2020-2021', '&lt;p&gt;Regarding Shikhashree&amp;nbsp;for Class V - VIII, 2020-2021&lt;/p&gt;', 'notice_img/1605867219.pdf', 'PDF', 'active'),
(80, 'All', '2020-12-03', 'Regarding MID DAY MEAL for Class V-VIII', '&lt;p&gt;Regarding MID DAY MEAL for Class V-VIII&lt;/p&gt;', 'notice_img/1606989546.12', 'PDF', 'active'),
(81, 'All', '2020-12-22', 'REGARDING CLASS V MERIT LIST, 2021', '&lt;p&gt;REGARDING CLASS V MERIT LIST, 2021&lt;/p&gt;', 'notice_img/1608648679.pdf', 'PDF', 'active'),
(82, 'All', '2020-12-22', 'REGARDING ADMISSION FOR CLASS V ,  2021', '&lt;p&gt;REGARDING ADMISSION FOR CLASS V , &amp;nbsp;2021&lt;/p&gt;', 'notice_img/1608648965.pdf', 'PDF', 'deleted'),
(83, 'All', '2020-12-23', 'REGARDING ADMISSION FOR CLASS V ,  2021', '&lt;p&gt;REGARDING ADMISSION FOR CLASS V , &amp;nbsp;2021&lt;/p&gt;', 'notice_img/1608704101.pdf', 'PDF', 'deleted'),
(84, 'All', '2021-01-04', 'Regarding Admission Notice for Class V, 2021-2022', '&lt;p&gt;Regarding Admission Notice for Class V, 2021-2022&lt;/p&gt;', 'notice_img/1609740262.pdf', 'PDF', 'active'),
(85, 'All', '2021-01-04', 'Regarding Admission Notice for Class VI- VIII, 2021-2022', '&lt;p&gt;Regarding Admission Notice for Class VI- VIII, 2021-2022&lt;/p&gt;', 'notice_img/1609740382.pdf', 'PDF', 'active'),
(86, 'All', '2021-01-04', 'Regarding Admission Notice for Class IX-X , 2021-2022', '&lt;p&gt;Regarding Admission Notice for Class IX-X , 2021-2022&lt;/p&gt;', 'notice_img/1609740451.pdf', 'PDF', 'active'),
(87, 'All', '2021-01-05', 'Regarding MID DAY MEAL for Class V-VIII', '&lt;p&gt;Regarding MID DAY MEAL for Class V-VIII&lt;/p&gt;', 'notice_img/1609856440.pdf', 'PDF', 'active'),
(88, 'All', '2021-01-14', 'Regarding Admission for class VI to IX, 2021 for students of other Institution', '&lt;p&gt;Regarding Admission for class VI to IX, 2021 for students of other Institution&lt;/p&gt;', 'notice_img/1610618507.pdf', 'PDF', 'active'),
(89, 'All', '2021-02-05', 'Regarding MID DAY MEAL for Class V-VIII', '&lt;p&gt;Regarding MID DAY MEAL for Class V-VIII&lt;/p&gt;', 'notice_img/1612513091.pdf', 'PDF', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `bhs_performance`
--

DROP TABLE IF EXISTS `bhs_performance`;
CREATE TABLE `bhs_performance` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `attachment` varchar(225) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bhs_performance`
--

INSERT INTO `bhs_performance` (`id`, `title`, `description`, `attachment`, `status`) VALUES
(1, 'MADHYAMIK 2020', '', '7b9cd_20200725205225.jpg', 'active'),
(2, 'HIGHER SECONDARY 2020', '', '780f2_20200725205743.jpg', 'active'),
(3, 'TOPPER 2020', '', 'f04c2_20200725205850.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `bhs_study_materials`
--

DROP TABLE IF EXISTS `bhs_study_materials`;
CREATE TABLE `bhs_study_materials` (
  `id` int(11) NOT NULL,
  `notice_for` enum('VOC','GEN') DEFAULT 'GEN',
  `post_date` date DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `teacher_name` varchar(225) DEFAULT NULL,
  `class` varchar(225) DEFAULT NULL,
  `subject` varchar(225) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `attachment` varchar(225) DEFAULT NULL,
  `type` enum('PDF','JPG','LINK') NOT NULL DEFAULT 'JPG',
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bhs_study_materials`
--

INSERT INTO `bhs_study_materials` (`id`, `notice_for`, `post_date`, `teacher_id`, `teacher_name`, `class`, `subject`, `title`, `content`, `attachment`, `type`, `status`) VALUES
(31, 'GEN', '2020-04-07', 0, '', '', '', 'For Class V', '', 'notice_img/1586260281.pdf', 'PDF', 'active'),
(32, 'GEN', '2020-04-07', 0, '', '', '', 'For Class VI', '', 'notice_img/1586260439.pdf', 'PDF', 'active'),
(33, 'GEN', '2020-04-07', 0, '', '', '', 'For Class VII', '', 'notice_img/1586260489.pdf', 'PDF', 'active'),
(34, 'GEN', '2020-04-07', 0, '', '', '', 'For Class VIII', '', 'notice_img/1586260565.pdf', 'PDF', 'active'),
(35, 'GEN', '2020-04-07', 0, '', '', '', 'For Class X MATHEMATICS', '', 'notice_img/1586260645.pdf', 'PDF', 'active'),
(36, 'GEN', '2020-04-07', 0, '', '', '', 'For Class X GEOGRAPHY', '', 'notice_img/1586260678.pdf', 'PDF', 'active'),
(38, 'GEN', '2020-04-10', 0, '', '', '', 'Commerce Class', '&lt;h1&gt;&lt;a href=&quot;https://youtu.be/pSWOWa8Vhr4&quot; target=&quot;_blank&quot;&gt;&lt;strong&gt;Click Me&amp;nbsp;&lt;/strong&gt;&lt;/a&gt;&lt;/h1&gt;', NULL, 'JPG', 'active'),
(39, 'GEN', '2020-04-10', 0, '', '', '', 'Physics Class X', '', 'notice_img/1586503195.pdf', 'PDF', 'active'),
(40, 'GEN', '2020-04-10', 0, '', '', '', 'Bengali Class X', '', 'notice_img/1586503234.pdf', 'PDF', 'active'),
(41, 'GEN', '2020-04-10', 0, '', '', '', 'Life Science Class X', '', 'notice_img/1586503770.pdf', 'PDF', 'active'),
(42, 'GEN', '2020-04-10', 0, '', '', '', 'Math Class IX', '', 'notice_img/1586503865.pdf', 'PDF', 'active'),
(43, 'GEN', '2020-04-10', 0, '', '', '', 'Physics Class IX', '', 'notice_img/1586503895.pdf', 'PDF', 'active'),
(44, 'GEN', '2020-04-10', 0, '', '', '', 'History Class IX', '', 'notice_img/1586503916.pdf', 'PDF', 'active'),
(45, 'GEN', '2020-04-10', 0, '', '', '', 'English Class IX', '', 'notice_img/1586583807.pdf', 'PDF', 'active'),
(46, 'GEN', '2020-04-10', 0, '', '', '', 'Geography Class IX', '', 'notice_img/1586583838.pdf', 'PDF', 'active'),
(47, 'GEN', '2020-04-11', 0, '', '', '', 'For Class -XII (Introduction to Partnership ) Utpal Dey', '&lt;h1&gt;&lt;a href=&quot;https://youtu.be/gi30xjPzuN4&quot; target=&quot;_blank&quot;&gt;(Preparation of profit &amp;amp; loss Appropriation Account) with solution to simple problem&lt;/a&gt;&lt;/h1&gt;', NULL, 'JPG', 'active'),
(48, 'VOC', '2020-04-12', 3, 'Ujjwal Maji', 'XI', '', 'Computer Application', '&lt;p&gt;sdasdasdas&lt;/p&gt;', NULL, 'JPG', 'deleted'),
(51, 'VOC', '2020-04-12', 3, 'Ujjwal Maji', 'XI', '', 'Computer Application', '', 'material/1586703863.mp3', 'PDF', 'deleted'),
(52, 'VOC', '2020-04-12', 3, 'Ujjwal Maji', 'XI', '', 'Computer Application', '', 'behalahighschool.com', 'LINK', 'deleted'),
(53, 'GEN', '2020-04-13', 4, 'Utpal Dey', 'XI', 'COM', 'How to Prepare a Profit &amp; Loss appropriation A/c', '', 'https://youtu.be/Qs1lcLIGEv4', 'LINK', 'active'),
(54, 'GEN', '2020-04-13', 6, 'Headmaster', 'XII', NULL, 'Political Science', '', NULL, 'JPG', 'deleted'),
(55, 'GEN', '2020-04-13', 6, 'Headmaster', 'XII', NULL, 'Political Science', '', 'material/1586798824.57', 'PDF', 'deleted'),
(56, 'GEN', '2020-04-13', 6, 'Headmaster', 'XII', 'ARTS', 'Political Science', '', 'material/1586799308.jpeg', 'PDF', 'active'),
(57, 'VOC', '2020-04-13', 5, 'Subhojit Sarkar', 'XI', NULL, 'English', '', '../master/material/1586799752.mp4', 'PDF', 'active'),
(58, 'GEN', '2020-04-13', 6, 'Headmaster', 'X', 'P.Sci.', 'Physical Science', '', 'material/1586800340.docx', 'PDF', 'active'),
(59, 'GEN', '2020-04-13', 6, 'Headmaster', 'X', 'HIST', 'History', '', 'material/1586800895.pdf', 'PDF', 'active'),
(60, 'GEN', '2020-04-13', 6, 'Headmaster', 'X', 'HIST', 'History', '', 'material/1586801024.pdf', 'PDF', 'active'),
(61, 'GEN', '2020-04-13', 6, 'Headmaster', 'X', 'HIST', 'History', '', 'material/1586801146.pdf', 'PDF', 'active'),
(62, 'GEN', '2020-04-13', 6, 'Headmaster', 'X', 'HIST', 'History', '', 'material/1586801184.pdf', 'PDF', 'active'),
(63, 'VOC', '2020-04-14', 3, 'Ujjwal Maji', 'XI', NULL, 'Computer Application Question Set - 1', '', '../master/material/1586874918.pdf', 'PDF', 'active'),
(64, 'GEN', '2020-04-15', 10, 'Arup Mukherjee', 'XII', 'COM', 'Profit and loss appropriation', '', NULL, 'JPG', 'deleted'),
(65, 'GEN', '2020-04-15', 10, 'Arup Mukherjee', 'XII', 'COM', 'Profit and loss appropriation', '', '../master/material/1586890968.', 'PDF', 'active'),
(66, 'GEN', '2020-04-15', 10, 'Arup Mukherjee', 'XI', 'COM', 'Bank reconciliation statement', '', '../master/material/1586891810.', 'PDF', 'active'),
(67, 'GEN', '2020-04-15', 10, 'Arup Mukherjee', 'XII', 'COM', 'Problems and solutions of P/L appropriation', '', '../master/material/1586975391.', 'PDF', 'active'),
(68, 'GEN', '2020-04-16', 10, 'Arup Mukherjee', 'XI', 'COM', 'Problems and solutions of BRS', '', '../master/material/1586975839.', 'PDF', 'active'),
(69, 'VOC', '2020-04-16', 8, 'Arup Mukherjee', 'XII', NULL, 'Profit and loss appropriation', '', '../master/material/1586976403.', 'PDF', 'active'),
(70, 'GEN', '2020-04-16', 10, 'Arup Mukherjee', 'XII', 'COM', 'Valuation of Goodwill', '', '../master/material/1587051141.', 'PDF', 'active'),
(71, 'GEN', '2020-04-16', 4, 'Utpal Dey', 'XII', 'COM', 'Accountancy', '', 'https://youtu.be/NTbrGz_acoY', 'LINK', 'active'),
(72, 'GEN', '2020-04-16', 9, 'Tapas Ghosh', 'X', 'ENGB', 'Lesson-5(Unit-I)', '', '../master/material/1587056855.pdf', 'PDF', 'active'),
(73, 'GEN', '2020-04-17', 11, 'Gour Sundar Ghosh', 'VI', 'BENG', 'Grammar', '', '../master/material/1587109265.50', 'PDF', 'active'),
(74, 'GEN', '2020-04-17', 4, 'Utpal Dey', 'XII', 'COM', 'Accountancy - Assignment on Profit &amp; Loss Appropriation Account', '', '../master/material/1587116963.pdf', 'PDF', 'active'),
(75, 'GEN', '2020-04-19', 4, 'Utpal Dey', 'XI', 'COM', 'Introduction to accounting', '', 'https://youtu.be/wcDoJnx6BZ8', 'LINK', 'active'),
(76, 'GEN', '2020-04-20', 11, 'Gour Sundar Ghosh', 'VI', 'BENG', 'VI Bengali Morsumer Din', '', '../master/material/1587405419.pdf', 'PDF', 'active'),
(77, 'GEN', '2020-04-21', 4, 'Utpal Dey', 'XI', 'COM', 'Accountancy', '', 'https://youtu.be/gh3v5EgMeG4', 'LINK', 'deleted'),
(78, 'GEN', '2020-04-21', 4, 'Utpal Dey', 'XI', 'COM', 'Accountancy(Introduction to Accounting)', '', 'https://youtu.be/gh3v5EgMeG4', 'LINK', 'active'),
(79, 'VOC', '2020-04-24', 12, 'Utpal Dey', 'XII', NULL, 'Costing', '', '../master/material/1587742123.pdf', 'PDF', 'active'),
(80, 'VOC', '2020-04-25', 8, 'Arup Mukherjee', 'XII', NULL, 'Profits and gains of business and profession', '', '../master/material/1587803556.', 'PDF', 'active'),
(81, 'GEN', '2020-05-01', 4, 'Utpal Dey', 'XII', 'COM', 'Accountancy-Reconstruction of Partnership - admission of new partner ( introduction)', '', 'https://youtu.be/vIhFS1dA81k', 'LINK', 'active'),
(82, 'VOC', '2020-05-01', 12, 'Utpal Dey', 'XII', NULL, 'Accountancy- Reconstitution - Admission of new partner ( Introduction through Journal entries)', '', 'https://youtu.be/vIhFS1dA81k', 'LINK', 'active'),
(83, 'GEN', '2020-05-08', 4, 'Utpal Dey', 'XII', 'COM', 'Accountancy- journal entries for admission of new partner', '', 'https://youtu.be/6Eg4St48WgQ', 'LINK', 'active'),
(84, 'GEN', '2020-05-08', 4, 'Utpal Dey', 'XII', 'COM', 'Accountancy- How to prepare Revaluation a/c, partnrrs capital a/c &amp; Balance sheet in Admission of new partner', '', 'https://youtu.be/5WCewCtdsjo', 'LINK', 'active'),
(85, 'GEN', '2020-05-08', 4, 'Utpal Dey', 'XII', 'COM', 'Costing &amp; Taxation- Costing ( How to prepare Stores Ledger Account under FIFO method)', '', 'https://youtu.be/G7UndagxNNM', 'LINK', 'active'),
(86, 'GEN', '2020-05-08', 4, 'Utpal Dey', 'XII', 'COM', 'Costing &amp; Taxation - Costing ( How to prepare Stores Ledger account under LIFO method)', '', 'https://youtu.be/PN0yWtS2NDo', 'LINK', 'active'),
(87, 'GEN', '2020-05-08', 4, 'Utpal Dey', 'XII', 'COM', 'Costing &amp; Taxation - Costing -How to prepare Stores Ledger account under Simple average method', '', 'https://youtu.be/utAEteTFN_0', 'LINK', 'active'),
(88, 'GEN', '2020-05-08', 4, 'Utpal Dey', 'XII', 'COM', 'Costing &amp; Taxation - Costing- How to Prepare Stores Ledger Account under Weighted Average method', '', 'https://youtu.be/Has6RivWZ20', 'LINK', 'active'),
(89, 'GEN', '2020-05-08', 4, 'Utpal Dey', 'XI', 'COM', 'Accountancy - concepts abount basic terms like capital liabilities,  goods,  expenditure etc', '', 'https://youtu.be/3k05FygmLh8', 'LINK', 'active'),
(90, 'GEN', '2020-05-12', 4, 'Utpal Dey', 'XII', 'COM', 'Accoutancy- Retirement - introduction &amp;  Solution through Journal', '', 'https://youtu.be/c1VKjA49FA4', 'LINK', 'active'),
(91, 'GEN', '2020-05-12', 4, 'Utpal Dey', 'XII', 'COM', 'Accountancy- Retirement of partner- solution through Revaluation a/c,  partners capitala/ c and Balance Sheet', '', 'https://youtu.be/XUIDARddL9g', 'LINK', 'active'),
(92, 'GEN', '2020-05-18', 4, 'Utpal Dey', 'XII', 'COM', 'Costing- How to pay a Labour under Taylor\'s differential piece rate system', '', 'https://youtu.be/2GNnF2Perhk', 'LINK', 'active'),
(93, 'GEN', '2020-05-18', 4, 'Utpal Dey', 'XII', 'COM', 'Costing- How to pay Labour under Merrick\'sdifferentialpiece rate System', '', 'https://youtu.be/M70ll2QJrDw', 'LINK', 'active'),
(94, 'GEN', '2020-05-25', 4, 'Utpal Dey', 'XII', 'COM', 'Accountancy- Costing- Labour-Halsey &amp; Rowan Premium Plan', '', 'https://youtu.be/pGKzzk-yhsw', 'LINK', 'active'),
(95, 'GEN', '2020-06-29', 4, 'Utpal Dey', 'XII', 'COM', 'Accountancy', '', 'https://youtu.be/1CiCqZHwJk0', 'LINK', 'active'),
(96, 'GEN', '2020-06-29', 4, 'Utpal Dey', 'XII', 'COM', 'Accountancy- death of partner- prearetion of capital account', '', 'https://youtu.be/DKT3j1oIi5U', 'LINK', 'active'),
(97, 'GEN', '2020-06-29', 4, 'Utpal Dey', 'XII', 'COM', 'Accountancy- death of partner- prearetion of capital account', '', 'https://youtu.be/DKT3j1oIi5U', 'LINK', 'deleted'),
(98, 'GEN', '2020-06-29', 4, 'Utpal Dey', 'XII', 'COM', 'Accountancy- issue of share- just introduction', '', 'https://youtu.be/aZNuGpdkxVc', 'LINK', 'active'),
(99, 'GEN', '2020-06-29', 4, 'Utpal Dey', 'XII', 'COM', 'Accountancy- issue of share- problem1( issue at premium,  forfeitue &amp; reissue)', '', 'https://youtu.be/QONg-S_YYQM', 'LINK', 'active'),
(100, 'GEN', '2020-09-30', 4, 'Utpal Dey', 'XII', 'COM', 'Accountancy', '', 'https://youtu.be/FMrg2XnQTtc', 'LINK', 'active'),
(101, 'GEN', '2020-09-30', 4, 'Utpal Dey', 'XII', 'COM', 'Accountancy', '', 'https://youtu.be/iemvqDoH0lo', 'LINK', 'active'),
(102, 'GEN', '2020-09-30', 4, 'Utpal Dey', 'XII', 'COM', 'Accountancy', '', 'https://youtu.be/_PutelF_IqQ', 'LINK', 'active'),
(103, 'GEN', '2020-09-30', 4, 'Utpal Dey', 'XII', 'COM', 'Accountancy', '', 'https://youtu.be/_PutelF_IqQ', 'LINK', 'active'),
(104, 'GEN', '2020-09-30', 4, 'Utpal Dey', 'XII', 'COM', 'Accountancy - direct forfeiture &amp; reissue', '', 'https://youtu.be/uVGz--l2fb8', 'LINK', 'active'),
(105, 'GEN', '2020-09-30', 4, 'Utpal Dey', 'XI', 'COM', 'Accountancy - How to determine Debit  &amp; credit', '', 'https://youtu.be/P7QyJi4JB5o', 'LINK', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `bhs_user`
--

DROP TABLE IF EXISTS `bhs_user`;
CREATE TABLE `bhs_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `stream` varchar(225) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text,
  `email_verified` enum('YES','NO') NOT NULL DEFAULT 'NO',
  `password` varchar(100) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `logged_in` enum('I','O') NOT NULL DEFAULT 'O',
  `status` enum('ACTIVE','INACTIVE','DELETED') NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bhs_user`
--

INSERT INTO `bhs_user` (`id`, `username`, `stream`, `full_name`, `email`, `phone`, `address`, `email_verified`, `password`, `profile_image`, `logged_in`, `status`) VALUES
(3, 'ujjwal', 'VOC', 'Ujjwal Maji', '', '', '', 'NO', '5813zITM16c2', '', 'O', 'ACTIVE'),
(4, 'utpaldeygen', 'GEN', 'Utpal Dey', NULL, NULL, NULL, 'NO', '483e==gMzITMff66', NULL, 'O', 'ACTIVE'),
(5, 'subhovoc', 'VOC', 'Subhojit Sarkar', NULL, NULL, NULL, 'NO', '68fb=MjMx8GaiV3cfe05', NULL, 'O', 'ACTIVE'),
(6, 'headmaster', 'GEN', 'Headmaster', NULL, NULL, NULL, 'NO', '7918=MjMx0Ga9fec', NULL, 'O', 'ACTIVE'),
(7, 'abhijit', 'GEN', 'Abhijit Lahiri', NULL, NULL, NULL, 'NO', '4e4d==wMyEDdppWaoJWY78bb', NULL, 'O', 'ACTIVE'),
(8, 'arup', 'VOC', 'Arup Mukherjee', NULL, NULL, NULL, 'NO', '1652==wMyEDc1JXY32bb', NULL, 'O', 'ACTIVE'),
(9, 'tapas', 'GEN', 'Tapas Ghosh', NULL, NULL, NULL, 'NO', '06db=MjMxMXYwFGdfa54', NULL, 'O', 'ACTIVE'),
(10, 'arupgen', 'GEN', 'Arup Mukherjee', NULL, NULL, NULL, 'NO', '983d==wMyEDc1JXY54cb', NULL, 'O', 'ACTIVE'),
(11, 'gourghosh', 'GEN', 'Gour Sundar Ghosh', NULL, NULL, NULL, 'NO', '2582==wMyEjc192Zd585', NULL, 'O', 'ACTIVE'),
(12, 'utpalvoc', 'VOC', 'Utpal Dey', NULL, NULL, NULL, 'NO', 'e0ae=MjMxwWYwRXd220c', NULL, 'O', 'ACTIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bhs_admin`
--
ALTER TABLE `bhs_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bhs_galary`
--
ALTER TABLE `bhs_galary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bhs_message`
--
ALTER TABLE `bhs_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bhs_notice`
--
ALTER TABLE `bhs_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bhs_performance`
--
ALTER TABLE `bhs_performance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bhs_study_materials`
--
ALTER TABLE `bhs_study_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bhs_user`
--
ALTER TABLE `bhs_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bhs_admin`
--
ALTER TABLE `bhs_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bhs_galary`
--
ALTER TABLE `bhs_galary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bhs_message`
--
ALTER TABLE `bhs_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `bhs_notice`
--
ALTER TABLE `bhs_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `bhs_performance`
--
ALTER TABLE `bhs_performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bhs_study_materials`
--
ALTER TABLE `bhs_study_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `bhs_user`
--
ALTER TABLE `bhs_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
