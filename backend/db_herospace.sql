-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 03:39 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_herospace`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminid` varchar(20) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminid`, `password`, `name`) VALUES
('admin@gmail.com', 'autistic', 'Timothy');

-- --------------------------------------------------------

--
-- Table structure for table `charity`
--

CREATE TABLE `charity` (
  `charityid` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `charity`
--

INSERT INTO `charity` (`charityid`, `password`, `name`) VALUES
('chintimothy45@gmail.com', 'makhijau', 'Persatuan Pengakap Malaysia'),
('testa@gmail.com', 'a123456!', 'Parti Islam Se-Malaysia');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `event_id` varchar(255) DEFAULT NULL,
  `volunteer_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `event_id`, `volunteer_id`) VALUES
(16, 'hello', 'E2', 'admin@gmail.com'),
(17, 'test', 'E2', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` varchar(255) NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `charityid` varchar(255) DEFAULT NULL,
  `event_desc` text NOT NULL,
  `event_req` text NOT NULL,
  `event_fee` int(11) NOT NULL,
  `event_tags` varchar(255) NOT NULL,
  `signup_link` varchar(255) NOT NULL,
  `event_state` varchar(50) NOT NULL,
  `start_time` varchar(64) NOT NULL,
  `end_time` varchar(64) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_date`, `charityid`, `event_desc`, `event_req`, `event_fee`, `event_tags`, `signup_link`, `event_state`, `start_time`, `end_time`, `date_created`) VALUES
('E0', 'Testing', '2024-01-03', 'chintimothy45@gmail.com', 'desc', 'req', 90, 'Recreation', 'link', 'Kuala Lumpur', '12:21am', '12:12am', '0000-00-00'),
('E1', 'New Event', '2024-02-08', 'chintimothy45@gmail.com', 'Kedah Event', 'Nothing', 90, 'soup kitchen, cleanup, disaster relief', 'google.com', 'Kedah', '12:00am', '12:00pm', '0000-00-00'),
('E10', '121', '0000-00-00', 'testa@gmail.com', '2121', '1212', 1000000, 'orphanage, orphanage, orphanage', '121', 'Penang', '12:12am', '12:12am', '0000-00-00'),
('E11', 'New event', '2024-02-17', 'testa@gmail.com', 'Testing', 'Testing', 900, 'homeless shelter, cleanup, homeless shelter', 'https://forms.gle/MGCUjS15izkJFSW99', 'Sarawak', '12:00am', '12:12am', '2024-02-16'),
('E12', 'Latest Event', '2024-02-17', 'testa@gmail.com', 'Description', 'Requirements', 900, 'old folks home, soup kitchen, old folks home', 'https://forms.gle/MGCUjS15izkJFSW99', 'Negeri Sembilan', '12:00am', '12:00pm', '2024-02-16'),
('E13', 'New event', '2024-02-17', 'testa@gmail.com', 'dqwdq', 'dwqdwq', 900, 'soup kitchen, homeless shelter, orphanage', 'https://forms.gle/MGCUjS15izkJFSW99', 'Malacca', '12:00am', '12:00am', '2024-02-16'),
('E14', 'New event', '2024-02-15', 'testa@gmail.com', 'dwqdq', 'dwqdq', 900, 'animal shelter, orphanage, soup kitchen', 'https://forms.gle/MGCUjS15izkJFSW99', 'Pahang', '12:00am', '8:00pm', '2024-02-16'),
('E15', 'New event', '2024-02-15', 'testa@gmail.com', 'dwqdq', 'dqwdqw', 900, 'soup kitchen, orphanage, orphanage', 'https://forms.gle/MGCUjS15izkJFSW99', 'Negeri Sembilan', '12:00am', '8:00am', '2024-02-16'),
('E16', 'dwqdqw', '2024-02-23', 'testa@gmail.com', 'dqwdwq', 'swdqw', 900, 'orphanage, orphanage, orphanage', 'https://forms.gle/MGCUjS15izkJFSW99', 'Kedah', '12:21am', '8:00am', '2024-02-16'),
('E17', 'New event', '2024-02-15', 'testa@gmail.com', 'dwqdqw', 'dwqdwq', 900, 'homeless shelter, homeless shelter, cleanup', 'https://forms.gle/MGCUjS15izkJFSW99', 'Kedah', '12:00am', '8:00am', '2024-02-16'),
('E2', 'New Event', '2024-02-21', 'chintimothy45@gmail.com', 'We are here', 'Nothing', 100, 'homeless, education, reforestation', 'google.com', 'Johor', '12:00pm', '12:00am', '0000-00-00'),
('E3', 'test', '2024-12-05', 'chintimothy45@gmail.com', 'test', 'underage', 69, 'orphanage, beach, clinic', 'https://forms.gle/MGCUjS15izkJFSW99', 'Kuala Lumpur', '08:00am', '12:00pm', '2024-02-29'),
('E4', 'LGBT Meetup', '2024-06-09', 'testa@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut malesuada turpis ex, in ornare mauris pellentesque ut. Maecenas eget orci sit amet orci congue ullamcorper. Nullam sed tincidunt magna. Sed eleifend quam sem, ut venenatis elit euismod quis. Mauris lobortis egestas purus, at congue turpis porttitor eget. Cras varius, mi eget bibendum scelerisque, metus tortor blandit orci, nec tempor nulla quam sit amet odio. Cras tortor metus, volutpat nec erat eu, interdum suscipit ligula. Nunc pretium diam erat. Ut aliquet condimentum sollicitudin. Morbi quis velit sapien. Aliquam imperdiet aliquam laoreet.\n\nIn suscipit mauris sed purus lacinia scelerisque. Praesent posuere sapien vitae lacinia aliquam. Pellentesque interdum lectus ut orci ultricies, sit amet sollicitudin lorem tempus. Aenean nec consequat eros. Suspendisse eu pulvinar massa. In hac habitasse platea dictumst. Phasellus blandit ornare accumsan. Nunc imperdiet mauris blandit lectus sagittis ornare. Sed tempor ac ipsum sit amet tempus.\n\nPhasellus tincidunt eu neque vitae rutrum. Cras venenatis est id suscipit lacinia. Cras sit amet tortor laoreet enim consequat cursus eget sit amet lacus. Phasellus in aliquam dolor, et finibus tellus. Vivamus euismod eros id justo aliquam, vitae dictum arcu tincidunt. Mauris vel convallis nibh, vel semper dui. Donec est ligula, placerat quis enim porttitor.', 'Be Gay', 0, 'homeless, disaster relief, orphanage', 'https://forms.gle/MGCUjS15izkJFSW99', 'Kelantan', '07:00am', '12:00am', '2024-02-05'),
('E5', 'chink', '2024-12-12', 'testa@gmail.com', 'chink mood', 'none', 0, 'orphanage, elderly, old folks home', 'https://forms.gle/MGCUjS15izkJFSW99', 'Kuala Lumpur', '09:00pm', '11:00pm', '2024-02-04'),
('E6', '44', '2025-12-09', 'testa@gmail.com', '4', '44', 1, 'beach, river, clinic', 'https://forms.gle/MGCUjS15izkJFSW99', 'Kuala Lumpur', '12:00am', '15:00am', '2024-02-26'),
('E7', 'new event', '2000-08-12', 'testa@gmail.com', 'seg', 'gay', 120, 'orphanage, orphanage, orphanage', 'https://forms.gle/MGCUjS15izkJFSW99', 'Kedah', '12:00am', '05:1am', '2024-02-16'),
('E8', 'testing 1', '0012-12-12', 'testa@gmail.com', 'nigga', '123', 12, 'beach, dog shelter, disaster relief', 'https://forms.gle/MGCUjS15izkJFSW99', 'Negeri Sembilan', '12:12am', '12:12am', '2024-02-11'),
('E9', 'Arson', '2024-05-14', 'testa@gmail.com', 'As absolute is by amounted repeated entirely ye returned. These ready timed enjoy might sir yet one since. Years drift never if could forty being no. On estimable dependent as suffering on my. Rank it long have sure in room what as he. Possession travelling sufficient yet our. Talked vanity looked in to. Gay perceive led believed endeavor. Rapturous no of estimable oh therefore direction up. Sons the ever not fine like eyes all sure.\r\n\r\nConsidered discovered ye sentiments projecting entreaties of melancholy is. In expression an solicitude principles in do. Hard do me sigh with west same lady. Their saved linen downs tears son add music. Expression alteration entreaties mrs can terminated estimating. Her too add narrow having wished. To things so denied admire. Am wound worth water he linen at vexed.\r\n\r\nRemember outweigh do he desirous no cheerful. Do of doors water ye guest. We if prosperous comparison middletons at. Park we in lose like at no. An so to preferred convinced distrusts he determine. In musical me my placing clothes comfort pleased hearing. Any residence you satisfied and rapturous certainty two. Procured outweigh as outlived so so. On in bringing graceful proposal blessing of marriage outlived. Son rent face our loud near.\r\n\r\nTen the hastened steepest feelings pleasant few surprise property. An brother he do colonel against minutes uncivil. Can how elinor warmly mrs basket marked. Led raising expense yet demesne weather musical. Me mr what park next busy ever. Elinor her his secure far twenty eat object. Late any far saw size want man. Which way you wrong add shall one. As guest right of he scale these. Horses nearer oh elinor of denote.\r\n\r\nInsipidity the sufficient discretion imprudence resolution sir him decisively. Proceed how any engaged visitor. Explained propriety off out perpetual his you. Feel sold off felt nay rose met you. We so entreaties cultivated astonished is. Was sister for few longer mrs sudden talent become. Done may bore quit evil old mile. If likely am of beauty tastes.\r\n\r\nCarriage quitting securing be appetite it declared. High eyes kept so busy feel call in. Would day nor ask walls known. But preserved advantage are but and certainty earnestly enjoyment. Passage weather as up am exposed. And natural related man subject. Eagerness get situation his was delighted.\r\n\r\nOffered say visited elderly and. Waited period are played family man formed. He ye body or made on pain part meet. You one delay nor begin our folly abode. By disposed replying mr me unpacked no. As moonlight of my resolving unwilling.\r\n\r\nIs post each that just leaf no. He connection interested so we an sympathize advantages. To said is it shed want do. Occasional middletons everything so to. Have spot part for his quit may. Enable it is square my an regard. Often merit stuff first oh up hills as he. Servants contempt as although addition dashwood is procured. Interest in yourself an do of numerous feelings cheerful confined.\r\n\r\nSitting mistake towards his few country ask. You delighted two rapturous six depending objection happiness something the. Off nay impossible dispatched partiality unaffected. Norland adapted put ham cordial. Ladies talked may shy basket narrow see. Him she distrusts questions sportsmen. Tolerably pretended neglected on my earnestly by. Sex scale sir style truth ought.\r\n\r\nSex reached suppose our whether. Oh really by an manner sister so. One sportsman tolerably him extensive put she immediate. He abroad of cannot looked in. Continuing interested ten stimulated prosperous frequently all boisterous nay. Of oh really he extent horses wicket.\r\n', 'As absolute is by amounted repeated entirely ye returned. These ready timed enjoy might sir yet one since. Years drift never if could forty being no. On estimable dependent as suffering on my. Rank it long have sure in room what as he. Possession travelling sufficient yet our. Talked vanity looked in to. Gay perceive led believed endeavor. Rapturous no of estimable oh therefore direction up. Sons the ever not fine like eyes all sure.\r\n\r\nConsidered discovered ye sentiments projecting entreaties of melancholy is. In expression an solicitude principles in do. Hard do me sigh with west same lady. Their saved linen downs tears son add music. Expression alteration entreaties mrs can terminated estimating. Her too add narrow having wished. To things so denied admire. Am wound worth water he linen at vexed.\r\n\r\nRemember outweigh do he desirous no cheerful. Do of doors water ye guest. We if prosperous comparison middletons at. Park we in lose like at no. An so to preferred convinced distrusts he determine. In musical me my placing clothes comfort pleased hearing. Any residence you satisfied and rapturous certainty two. Procured outweigh as outlived so so. On in bringing graceful proposal blessing of marriage outlived. Son rent face our loud near.\r\n\r\nTen the hastened steepest feelings pleasant few surprise property. An brother he do colonel against minutes uncivil. Can how elinor warmly mrs basket marked. Led raising expense yet demesne weather musical. Me mr what park next busy ever. Elinor her his secure far twenty eat object. Late any far saw size want man. Which way you wrong add shall one. As guest right of he scale these. Horses nearer oh elinor of denote.\r\n\r\nInsipidity the sufficient discretion imprudence resolution sir him decisively. Proceed how any engaged visitor. Explained propriety off out perpetual his you. Feel sold off felt nay rose met you. We so entreaties cultivated astonished is. Was sister for few longer mrs sudden talent become. Done may bore quit evil old mile. If likely am of beauty tastes.\r\n\r\nCarriage quitting securing be appetite it declared. High eyes kept so busy feel call in. Would day nor ask walls known. But preserved advantage are but and certainty earnestly enjoyment. Passage weather as up am exposed. And natural related man subject. Eagerness get situation his was delighted.\r\n\r\nOffered say visited elderly and. Waited period are played family man formed. He ye body or made on pain part meet. You one delay nor begin our folly abode. By disposed replying mr me unpacked no. As moonlight of my resolving unwilling.\r\n\r\nIs post each that just leaf no. He connection interested so we an sympathize advantages. To said is it shed want do. Occasional middletons everything so to. Have spot part for his quit may. Enable it is square my an regard. Often merit stuff first oh up hills as he. Servants contempt as although addition dashwood is procured. Interest in yourself an do of numerous feelings cheerful confined.\r\n\r\nSitting mistake towards his few country ask. You delighted two rapturous six depending objection happiness something the. Off nay impossible dispatched partiality unaffected. Norland adapted put ham cordial. Ladies talked may shy basket narrow see. Him she distrusts questions sportsmen. Tolerably pretended neglected on my earnestly by. Sex scale sir style truth ought.\r\n\r\nSex reached suppose our whether. Oh really by an manner sister so. One sportsman tolerably him extensive put she immediate. He abroad of cannot looked in. Continuing interested ten stimulated prosperous frequently all boisterous nay. Of oh really he extent horses wicket.\r\n', 2147483647, 'orphanage, orphanage, orphanage', 'https://forms.gle/MGCUjS15izkJFSW99', 'Kuala Lumpur', '25:00am', '24:12am', '2024-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `update_id` int(11) NOT NULL,
  `update_text` varchar(255) NOT NULL,
  `event_id` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`update_id`, `update_text`, `event_id`, `date`) VALUES
(4, 'jaden is a maire', 'E0', 'February 6, 2024'),
(5, 'This is an update', 'E0', 'February 18, 2024'),
(6, 'This is an update', 'E0', 'February 15, 2024');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `state` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `bio` text NOT NULL,
  `preferences` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`email`, `password`, `name`, `state`, `age`, `gender`, `bio`, `preferences`) VALUES
('charlie123@gmail.com', 'goodjob', 'Charlie', 'Kuala Lumpur', 0, '', 'I love men', ''),
('lolman@gmail.com', '123456', 'Lolman', 'Kuala Lumpur', 20, 'Other', 'This is my biography.', ',cat shelter,beach,cleanup'),
('V001@gmail.com', 'supbro', 'jason', '', 0, '', '', ''),
('V002', 'besboi', 'shan', '', 0, '', '', ''),
('V003', 'babi', 'peppa babi', '', 0, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `charity`
--
ALTER TABLE `charity`
  ADD PRIMARY KEY (`charityid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`update_id`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `update_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
