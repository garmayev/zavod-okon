-- MySQL dump 10.19  Distrib 10.3.30-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: zavod_okon
-- ------------------------------------------------------
-- Server version	10.3.30-MariaDB-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) DEFAULT NULL,
  `summary` varchar(256) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-article-image_id` (`image_id`),
  CONSTRAINT `fk-article-image_id` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (1,'Завод окон предлагает - лучшее решение на рынке пластиковых окон','',NULL,1623114226,'<div style=\"text-align: center; margin: 0 auto; width: 100%\">\n<video width=\"400\" controls autoplay>\n    <source src=\"/img/IMG_3002.MOV\" type=\"video/mp4\">\n</video>\n</div>'),(2,'Первая тестовая статья','Проверка раздела новостей, когда несколько',NULL,1633214226,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id nunc tempus, varius felis in, molestie lacus. Aliquam erat nunc, consequat vitae lacinia at, pellentesque at enim. Proin id felis nibh. Donec finibus interdum turpis. Cras sollicitudin urna vel imperdiet venenatis. Sed nibh turpis, tristique ut tincidunt dignissim, mollis eu neque. In luctus aliquam pulvinar. In fringilla eleifend diam in congue. Maecenas fringilla orci in sapien pulvinar, a ultrices dolor ullamcorper. Curabitur feugiat augue nec risus dictum, et convallis leo rutrum. Mauris magna nisi, molestie ut libero eu, maximus tincidunt nunc. Quisque et tellus imperdiet, ullamcorper odio nec, mollis neque. Fusce pharetra quis lectus id efficitur. Aliquam non tellus elit.</p>\n<p>Phasellus neque lorem, faucibus vehicula libero sed, pharetra congue sem. Nunc suscipit, ante vel ultrices vestibulum, nibh ligula cursus est, sit amet volutpat nisl ligula ut neque. Sed vitae fringilla massa. Etiam consectetur in risus vel suscipit. Maecenas ut tincidunt magna. Phasellus vitae pharetra nisi. Morbi porta varius felis ac dignissim. Mauris sit amet ex orci.</p>\n<p>Donec ac aliquam metus, et blandit augue. Pellentesque venenatis lobortis massa gravida pharetra. Nunc molestie dictum convallis. Nulla varius ipsum sem, nec ultrices enim porta ut. Aliquam placerat massa nec auctor vulputate. Suspendisse dolor augue, commodo sit amet odio in, blandit sodales dui. Etiam eu finibus diam, laoreet pulvinar nibh. Fusce lacinia aliquet euismod. Aliquam fermentum justo velit, vel maximus erat auctor eget. In quis tristique erat, commodo efficitur diam. Aliquam ultricies pellentesque tellus non varius.</p>\n<p>Duis vel iaculis nunc, elementum feugiat tortor. Integer porta metus id augue feugiat, vitae consequat lorem ullamcorper. Nunc in condimentum libero, ac tempus orci. Morbi et ex velit. Sed egestas consectetur volutpat. Aenean a lectus sem. Praesent ornare neque a lacus rhoncus ullamcorper. Nulla purus quam, porttitor nec justo ut, mollis condimentum quam. Suspendisse lacinia placerat mattis. Phasellus sagittis neque non nulla dapibus euismod. Ut a euismod odio. Suspendisse eu sollicitudin magna. Vivamus sit amet lacus sed turpis laoreet laoreet id vitae elit. Praesent scelerisque viverra dignissim.</p>\n<p>Morbi nibh nibh, blandit eu interdum ut, eleifend ac lacus. Quisque nec ligula eu lectus bibendum suscipit. Aliquam nec mattis ligula. Quisque augue dolor, euismod non lacinia in, vestibulum nec ante. Vestibulum urna eros, cursus in fringilla vel, varius quis eros. Maecenas tristique, mi congue elementum dignissim, quam ex molestie lacus, vitae sagittis lacus nisi et enim. Aenean pulvinar imperdiet arcu. Integer in volutpat purus, sed hendrerit risus. Nullam pharetra, eros ut tincidunt feugiat, odio justo dignissim libero, vel sollicitudin leo risus eget risus. Pellentesque pretium luctus suscipit. Nulla sodales et orci non tempor. Aenean ornare arcu ac nisl sodales, a commodo neque iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam condimentum tellus vel ex euismod feugiat. Vestibulum vestibulum sed odio sed tristique. Donec aliquet enim nec lobortis tincidunt.</p>\n<p>Maecenas facilisis mattis neque ac sollicitudin. Quisque placerat nisl euismod laoreet auctor. Proin suscipit quis massa sed elementum. Curabitur vel tristique lectus, in rutrum augue. Pellentesque venenatis eget eros eget feugiat. Maecenas pulvinar quis sapien nec accumsan. Phasellus auctor varius leo eu porttitor. Duis eget venenatis est, sit amet commodo mi. Sed iaculis in magna vitae placerat. Donec vehicula nec augue in iaculis.</p>\n<p>Integer luctus justo non neque aliquet efficitur. Duis accumsan ipsum ante, ut tincidunt libero vestibulum eget. Proin mattis nisi et metus tristique pharetra. Nam condimentum laoreet consequat. Maecenas a tortor tellus. Aenean semper eu ligula in finibus. Nam semper lacus in tempor volutpat. In fringilla lectus eget leo efficitur, vitae varius turpis iaculis.</p>\n<p>Suspendisse iaculis gravida purus, vel suscipit sem ultrices tincidunt. Suspendisse potenti. Ut lectus tortor, hendrerit sed erat et, malesuada rutrum ante. Proin pellentesque pellentesque lacinia. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque vel libero eu orci consectetur scelerisque. Ut feugiat tellus sit amet placerat bibendum. In nec sapien pretium, maximus augue eu, sollicitudin massa. Etiam sit amet ex non odio accumsan eleifend. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis ultrices sed metus ac suscipit. Phasellus fermentum purus nec metus bibendum tincidunt. Fusce egestas, nisl at pharetra sodales, velit enim placerat est, non porttitor nisi nibh at purus.</p>\n<p>Nullam ultricies arcu ut tortor ultrices, id iaculis nunc egestas. Curabitur sodales vitae augue non varius. In ac purus ligula. Suspendisse rhoncus metus fringilla libero auctor, a faucibus libero porta. Cras viverra tellus eu lorem blandit interdum. Cras mollis luctus quam, nec lacinia elit varius sit amet. Fusce dictum maximus lacinia.</p>\n<p>Integer nec fringilla nisi. Mauris ut molestie ipsum, in fringilla diam. Aenean sit amet enim non odio eleifend rutrum at vitae est. Nunc imperdiet tincidunt velit eget ultrices. Nunc sollicitudin mattis varius. Aenean mollis quis ligula eget euismod. Cras aliquet nisi in euismod imperdiet. Maecenas pellentesque mollis eros id ornare. Curabitur at dignissim ante, sit amet vulputate sapien. Maecenas a bibendum justo. Nullam auctor tempor nibh, nec faucibus lectus tincidunt vitae.</p>\n<p>Fusce blandit leo a sagittis ultrices. Cras in mollis nisl, a lacinia dui. Ut condimentum bibendum ante in sodales. Ut a ipsum nulla. Cras pharetra luctus nunc quis efficitur. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi ultrices quam et odio eleifend ullamcorper. Suspendisse interdum mi erat, vitae cursus dolor ultricies fermentum.</p>\n<p>Nunc ac luctus ligula. Cras consequat nulla sit amet lacus fermentum viverra at nec nisl. In tincidunt massa et ex vulputate, vel lacinia urna ultricies. Aenean convallis augue faucibus, iaculis libero vel, commodo purus. Nunc ligula sem, condimentum sit amet porta sed, laoreet vitae augue. Quisque non mi ligula. Etiam at lectus mauris. Nam a dolor tellus. Etiam iaculis ligula eget ligula iaculis volutpat. Donec vitae eros egestas diam vulputate iaculis vitae non purus. Phasellus tempus dapibus pulvinar. Nulla mauris orci, maximus a metus non, dictum dapibus justo.</p>\n<p>Aliquam eget metus elementum, malesuada metus in, convallis enim. Nam sed dolor arcu. Nulla vel sapien mauris. Praesent tristique diam at lacus volutpat tristique. Nam et dignissim risus. In hac habitasse platea dictumst. Mauris elementum at justo a scelerisque. Duis tristique tincidunt purus, at porta dolor sodales id. Phasellus feugiat dictum euismod. Donec vitae fermentum tortor. Nunc efficitur imperdiet urna, et vestibulum ligula posuere sed. In ut eros ut eros venenatis vestibulum sit amet vitae metus.</p>\n<p>Aliquam leo ante, egestas vitae ante sit amet, bibendum sollicitudin mi. Vestibulum hendrerit ultricies lorem, vitae tristique justo. Ut molestie blandit leo, nec vulputate orci consequat id. Praesent eu mollis nibh. Vestibulum pharetra, ligula eget sodales lacinia, erat nisi molestie elit, ut faucibus tellus erat scelerisque magna. Nam tristique, lorem facilisis aliquet pharetra, nulla arcu condimentum eros, nec sollicitudin sapien eros et arcu. Etiam euismod nulla sit amet congue auctor.</p>\n<p>In sit amet laoreet tortor. Nulla ut tincidunt dui. Praesent tincidunt porta lobortis. Suspendisse iaculis aliquet nulla ac posuere. Fusce quis commodo mi. Pellentesque eu magna at urna dignissim fermentum. Donec non varius nisi. Cras a nunc eget quam volutpat ornare eu non diam. Etiam iaculis, ex et eleifend gravida, mauris nisl iaculis tellus, nec accumsan odio nulla a purus. Maecenas vitae metus quis justo efficitur bibendum. Suspendisse pretium arcu at tortor viverra porttitor. Integer eu odio sollicitudin, tristique libero vitae, consequat mi. Pellentesque ac urna in lacus venenatis mattis.</p>'),(3,'Вторая тестовая статья','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id nunc tempus, varius felis in, molestie lacus.</p>',NULL,1643254226,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id nunc tempus, varius felis in, molestie lacus. Aliquam erat nunc, consequat vitae lacinia at, pellentesque at enim. Proin id felis nibh. Donec finibus interdum turpis. Cras sollicitudin urna vel imperdiet venenatis. Sed nibh turpis, tristique ut tincidunt dignissim, mollis eu neque. In luctus aliquam pulvinar. In fringilla eleifend diam in congue. Maecenas fringilla orci in sapien pulvinar, a ultrices dolor ullamcorper. Curabitur feugiat augue nec risus dictum, et convallis leo rutrum. Mauris magna nisi, molestie ut libero eu, maximus tincidunt nunc. Quisque et tellus imperdiet, ullamcorper odio nec, mollis neque. Fusce pharetra quis lectus id efficitur. Aliquam non tellus elit.</p>\n<p>Phasellus neque lorem, faucibus vehicula libero sed, pharetra congue sem. Nunc suscipit, ante vel ultrices vestibulum, nibh ligula cursus est, sit amet volutpat nisl ligula ut neque. Sed vitae fringilla massa. Etiam consectetur in risus vel suscipit. Maecenas ut tincidunt magna. Phasellus vitae pharetra nisi. Morbi porta varius felis ac dignissim. Mauris sit amet ex orci.</p>\n<p>Donec ac aliquam metus, et blandit augue. Pellentesque venenatis lobortis massa gravida pharetra. Nunc molestie dictum convallis. Nulla varius ipsum sem, nec ultrices enim porta ut. Aliquam placerat massa nec auctor vulputate. Suspendisse dolor augue, commodo sit amet odio in, blandit sodales dui. Etiam eu finibus diam, laoreet pulvinar nibh. Fusce lacinia aliquet euismod. Aliquam fermentum justo velit, vel maximus erat auctor eget. In quis tristique erat, commodo efficitur diam. Aliquam ultricies pellentesque tellus non varius.</p>\n<p>Duis vel iaculis nunc, elementum feugiat tortor. Integer porta metus id augue feugiat, vitae consequat lorem ullamcorper. Nunc in condimentum libero, ac tempus orci. Morbi et ex velit. Sed egestas consectetur volutpat. Aenean a lectus sem. Praesent ornare neque a lacus rhoncus ullamcorper. Nulla purus quam, porttitor nec justo ut, mollis condimentum quam. Suspendisse lacinia placerat mattis. Phasellus sagittis neque non nulla dapibus euismod. Ut a euismod odio. Suspendisse eu sollicitudin magna. Vivamus sit amet lacus sed turpis laoreet laoreet id vitae elit. Praesent scelerisque viverra dignissim.</p>\n<p>Morbi nibh nibh, blandit eu interdum ut, eleifend ac lacus. Quisque nec ligula eu lectus bibendum suscipit. Aliquam nec mattis ligula. Quisque augue dolor, euismod non lacinia in, vestibulum nec ante. Vestibulum urna eros, cursus in fringilla vel, varius quis eros. Maecenas tristique, mi congue elementum dignissim, quam ex molestie lacus, vitae sagittis lacus nisi et enim. Aenean pulvinar imperdiet arcu. Integer in volutpat purus, sed hendrerit risus. Nullam pharetra, eros ut tincidunt feugiat, odio justo dignissim libero, vel sollicitudin leo risus eget risus. Pellentesque pretium luctus suscipit. Nulla sodales et orci non tempor. Aenean ornare arcu ac nisl sodales, a commodo neque iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam condimentum tellus vel ex euismod feugiat. Vestibulum vestibulum sed odio sed tristique. Donec aliquet enim nec lobortis tincidunt.</p>\n<p>Maecenas facilisis mattis neque ac sollicitudin. Quisque placerat nisl euismod laoreet auctor. Proin suscipit quis massa sed elementum. Curabitur vel tristique lectus, in rutrum augue. Pellentesque venenatis eget eros eget feugiat. Maecenas pulvinar quis sapien nec accumsan. Phasellus auctor varius leo eu porttitor. Duis eget venenatis est, sit amet commodo mi. Sed iaculis in magna vitae placerat. Donec vehicula nec augue in iaculis.</p>\n<p>Integer luctus justo non neque aliquet efficitur. Duis accumsan ipsum ante, ut tincidunt libero vestibulum eget. Proin mattis nisi et metus tristique pharetra. Nam condimentum laoreet consequat. Maecenas a tortor tellus. Aenean semper eu ligula in finibus. Nam semper lacus in tempor volutpat. In fringilla lectus eget leo efficitur, vitae varius turpis iaculis.</p>\n<p>Suspendisse iaculis gravida purus, vel suscipit sem ultrices tincidunt. Suspendisse potenti. Ut lectus tortor, hendrerit sed erat et, malesuada rutrum ante. Proin pellentesque pellentesque lacinia. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque vel libero eu orci consectetur scelerisque. Ut feugiat tellus sit amet placerat bibendum. In nec sapien pretium, maximus augue eu, sollicitudin massa. Etiam sit amet ex non odio accumsan eleifend. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis ultrices sed metus ac suscipit. Phasellus fermentum purus nec metus bibendum tincidunt. Fusce egestas, nisl at pharetra sodales, velit enim placerat est, non porttitor nisi nibh at purus.</p>\n<p>Nullam ultricies arcu ut tortor ultrices, id iaculis nunc egestas. Curabitur sodales vitae augue non varius. In ac purus ligula. Suspendisse rhoncus metus fringilla libero auctor, a faucibus libero porta. Cras viverra tellus eu lorem blandit interdum. Cras mollis luctus quam, nec lacinia elit varius sit amet. Fusce dictum maximus lacinia.</p>\n<p>Integer nec fringilla nisi. Mauris ut molestie ipsum, in fringilla diam. Aenean sit amet enim non odio eleifend rutrum at vitae est. Nunc imperdiet tincidunt velit eget ultrices. Nunc sollicitudin mattis varius. Aenean mollis quis ligula eget euismod. Cras aliquet nisi in euismod imperdiet. Maecenas pellentesque mollis eros id ornare. Curabitur at dignissim ante, sit amet vulputate sapien. Maecenas a bibendum justo. Nullam auctor tempor nibh, nec faucibus lectus tincidunt vitae.</p>\n<p>Fusce blandit leo a sagittis ultrices. Cras in mollis nisl, a lacinia dui. Ut condimentum bibendum ante in sodales. Ut a ipsum nulla. Cras pharetra luctus nunc quis efficitur. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi ultrices quam et odio eleifend ullamcorper. Suspendisse interdum mi erat, vitae cursus dolor ultricies fermentum.</p>\n<p>Nunc ac luctus ligula. Cras consequat nulla sit amet lacus fermentum viverra at nec nisl. In tincidunt massa et ex vulputate, vel lacinia urna ultricies. Aenean convallis augue faucibus, iaculis libero vel, commodo purus. Nunc ligula sem, condimentum sit amet porta sed, laoreet vitae augue. Quisque non mi ligula. Etiam at lectus mauris. Nam a dolor tellus. Etiam iaculis ligula eget ligula iaculis volutpat. Donec vitae eros egestas diam vulputate iaculis vitae non purus. Phasellus tempus dapibus pulvinar. Nulla mauris orci, maximus a metus non, dictum dapibus justo.</p>\n<p>Aliquam eget metus elementum, malesuada metus in, convallis enim. Nam sed dolor arcu. Nulla vel sapien mauris. Praesent tristique diam at lacus volutpat tristique. Nam et dignissim risus. In hac habitasse platea dictumst. Mauris elementum at justo a scelerisque. Duis tristique tincidunt purus, at porta dolor sodales id. Phasellus feugiat dictum euismod. Donec vitae fermentum tortor. Nunc efficitur imperdiet urna, et vestibulum ligula posuere sed. In ut eros ut eros venenatis vestibulum sit amet vitae metus.</p>\n<p>Aliquam leo ante, egestas vitae ante sit amet, bibendum sollicitudin mi. Vestibulum hendrerit ultricies lorem, vitae tristique justo. Ut molestie blandit leo, nec vulputate orci consequat id. Praesent eu mollis nibh. Vestibulum pharetra, ligula eget sodales lacinia, erat nisi molestie elit, ut faucibus tellus erat scelerisque magna. Nam tristique, lorem facilisis aliquet pharetra, nulla arcu condimentum eros, nec sollicitudin sapien eros et arcu. Etiam euismod nulla sit amet congue auctor.</p>\n<p>In sit amet laoreet tortor. Nulla ut tincidunt dui. Praesent tincidunt porta lobortis. Suspendisse iaculis aliquet nulla ac posuere. Fusce quis commodo mi. Pellentesque eu magna at urna dignissim fermentum. Donec non varius nisi. Cras a nunc eget quam volutpat ornare eu non diam. Etiam iaculis, ex et eleifend gravida, mauris nisl iaculis tellus, nec accumsan odio nulla a purus. Maecenas vitae metus quis justo efficitur bibendum. Suspendisse pretium arcu at tortor viverra porttitor. Integer eu odio sollicitudin, tristique libero vitae, consequat mi. Pellentesque ac urna in lacus venenatis mattis.</p>'),(4,'Test',NULL,NULL,1623728007,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum bibendum ullamcorper ornare. Vestibulum euismod sapien eu luctus porta. Nam ac nibh eget dui cursus tincidunt. Aliquam pretium molestie placerat. Nunc suscipit dolor ac ligula viverra volutpat. Fusce non rutrum justo. Praesent lacinia purus eget dignissim fermentum. Praesent dignissim sit amet risus eget aliquet.\r\n\r\nIn hac habitasse platea dictumst. Donec auctor, nibh sed consequat accumsan, massa eros lacinia enim, sit amet vulputate ipsum ipsum suscipit ipsum. Nullam quam magna, eleifend nec rhoncus sit amet, iaculis non mi. Nam vel quam sit amet nunc laoreet varius sed eu ipsum. Pellentesque pretium ex ut risus viverra, at pretium libero tempor. Integer et velit eu turpis feugiat pharetra non vitae massa. Nulla rutrum gravida vulputate. Mauris vulputate iaculis diam, eu malesuada tellus feugiat et. Nunc volutpat libero vel pretium tincidunt.\r\n\r\nIn in aliquam justo. In pellentesque, tellus eu ultricies faucibus, erat nunc viverra metus, sit amet mattis diam ex accumsan neque. Sed pulvinar nunc turpis, ac pharetra ex semper sed. Vestibulum id sapien sit amet nisi hendrerit dictum. Phasellus ultrices nulla ultricies fringilla vestibulum. Quisque tempus feugiat ligula sed faucibus. Ut in feugiat felis. Etiam commodo magna consectetur, maximus ante vel, malesuada elit. Praesent ornare est in lacus tristique hendrerit.\r\n\r\nPraesent a cursus lorem, a blandit orci. Suspendisse ut felis mauris. Etiam laoreet interdum nulla, a laoreet ante fringilla at. Vivamus quam massa, ultricies quis nunc eu, molestie aliquam lectus. Duis a tellus nec elit porttitor fringilla at eget mi. Nulla molestie, felis nec vulputate blandit, massa ipsum convallis ligula, nec euismod mauris elit in augue. Donec vel nulla neque. Sed aliquet sollicitudin dolor, vitae efficitur erat tincidunt eget. Curabitur ac enim vitae lacus aliquet convallis. Nunc sit amet tempus eros, ut sagittis neque. Mauris tellus felis, aliquam id egestas feugiat, hendrerit in orci. Nullam vel elementum ante. Aliquam erat volutpat. Curabitur molestie porttitor elementum.\r\n\r\nMauris ultricies sapien id arcu sagittis, a mattis velit elementum. In viverra in eros in fermentum. Nam non ligula sit amet libero commodo malesuada. Fusce nec eros ut quam tincidunt porttitor in sit amet dolor. Quisque egestas feugiat erat. Nullam lacinia tempor diam, quis iaculis dolor vestibulum eu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse quis eleifend elit, ut rutrum velit. Maecenas ex velit, condimentum in tellus ac, maximus varius mi. In a lacus non dolor hendrerit euismod. Aenean eget venenatis mauris.');
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_tags`
--

DROP TABLE IF EXISTS `article_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_tags` (
  `article_id` int(11) NOT NULL,
  `tags_id` int(11) NOT NULL,
  PRIMARY KEY (`article_id`,`tags_id`),
  KEY `idx-article_tags-article_id` (`article_id`),
  KEY `idx-article_tags-tags_id` (`tags_id`),
  CONSTRAINT `fk-article_tags-article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-article_tags-tags_id` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_tags`
--

LOCK TABLES `article_tags` WRITE;
/*!40000 ALTER TABLE `article_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `article_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_assignment`
--

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
INSERT INTO `auth_assignment` VALUES ('admin','1',1626116856),('manager','2',1626226656),('manager','3',1626226787),('master','4',1626226856),('master','8',1624350843);
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item`
--

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` VALUES ('admin',1,'Admin',NULL,NULL,1623739649,1623739649),('manager',1,'Manager',NULL,NULL,1623739620,1623739620),('master',1,'Master',NULL,NULL,1623739589,1623739589),('user',1,'User',NULL,NULL,1623739589,1623739589);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item_child`
--

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
INSERT INTO `auth_item_child` VALUES ('admin','manager'),('manager','master'),('master','user');
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_rule`
--

LOCK TABLES `auth_rule` WRITE;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `sessionId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cartData` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sessionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES ('ma7okuv7js85nulnthh7oj3v4g','a:2:{i:1;O:36:\"frontend\\modules\\shop\\models\\Product\":11:{s:36:\"\0yii\\db\\BaseActiveRecord\0_attributes\";a:5:{s:2:\"id\";i:1;s:5:\"title\";s:12:\"Кирпич\";s:11:\"description\";s:65:\"Кирпич классический, для битья морд\";s:5:\"price\";i:1000;s:5:\"thumb\";s:14:\"/img/block.png\";}s:39:\"\0yii\\db\\BaseActiveRecord\0_oldAttributes\";a:5:{s:2:\"id\";i:1;s:5:\"title\";s:12:\"Кирпич\";s:11:\"description\";s:65:\"Кирпич классический, для битья морд\";s:5:\"price\";i:1000;s:5:\"thumb\";s:14:\"/img/block.png\";}s:33:\"\0yii\\db\\BaseActiveRecord\0_related\";a:0:{}s:47:\"\0yii\\db\\BaseActiveRecord\0_relationsDependencies\";a:0:{}s:23:\"\0yii\\base\\Model\0_errors\";N;s:27:\"\0yii\\base\\Model\0_validators\";N;s:25:\"\0yii\\base\\Model\0_scenario\";s:7:\"default\";s:27:\"\0yii\\base\\Component\0_events\";a:0:{}s:35:\"\0yii\\base\\Component\0_eventWildcards\";a:0:{}s:30:\"\0yii\\base\\Component\0_behaviors\";a:0:{}s:12:\"\0*\0_quantity\";N;}i:2;O:36:\"frontend\\modules\\shop\\models\\Product\":11:{s:36:\"\0yii\\db\\BaseActiveRecord\0_attributes\";a:5:{s:2:\"id\";i:2;s:5:\"title\";s:18:\"Сковорода\";s:11:\"description\";s:88:\"Сковорода чугунная, для встречи пьяного супруга\";s:5:\"price\";i:1200;s:5:\"thumb\";s:15:\"/img/female.png\";}s:39:\"\0yii\\db\\BaseActiveRecord\0_oldAttributes\";a:5:{s:2:\"id\";i:2;s:5:\"title\";s:18:\"Сковорода\";s:11:\"description\";s:88:\"Сковорода чугунная, для встречи пьяного супруга\";s:5:\"price\";i:1200;s:5:\"thumb\";s:15:\"/img/female.png\";}s:33:\"\0yii\\db\\BaseActiveRecord\0_related\";a:0:{}s:47:\"\0yii\\db\\BaseActiveRecord\0_relationsDependencies\";a:0:{}s:23:\"\0yii\\base\\Model\0_errors\";N;s:27:\"\0yii\\base\\Model\0_validators\";N;s:25:\"\0yii\\base\\Model\0_scenario\";s:7:\"default\";s:27:\"\0yii\\base\\Component\0_events\";a:0:{}s:35:\"\0yii\\base\\Component\0_eventWildcards\";a:0:{}s:30:\"\0yii\\base\\Component\0_behaviors\";a:0:{}s:12:\"\0*\0_quantity\";N;}}');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_items`
--

DROP TABLE IF EXISTS `cart_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart_items` (
  `user_id` int(11) unsigned NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  `quantity` int(11) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`product_id`),
  KEY `idx-cart_items-user_id` (`user_id`),
  KEY `idx-cart_items-product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_items`
--

LOCK TABLES `cart_items` WRITE;
/*!40000 ALTER TABLE `cart_items` DISABLE KEYS */;
INSERT INTO `cart_items` VALUES (1,1,1),(1,2,1);
/*!40000 ALTER TABLE `cart_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `thumbs` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Окна ПВХ','<p>Окна из ПВХ-профилей (в просторечии — пластиковые окна) начали массово производиться в Западной Европе и США в шестидесятые годы 20 века.</p>\n<p>Оконные профили из ПВХ производят на специальных предприятиях методом экструзии. Специально подготовленное сырьё (т. наз. экструзионный компаунд) под давлением проходит через специальную матрицу — экструзионную фильеру, в которой формируется «тело» производимого профильного артикула. После выхода из фильеры профиль калибруется, охлаждается, на него наносится маркировка и наклеивается защитная плёнка для защиты от транспортных повреждений. Обрезка профиля происходит в конце экструзионной линии либо дисковой пилой, либо специальной термической гильотиной (разогретый металлический нож).</p>\n<p>Пластик обладает относительно высоким коэффициентом линейного расширения, легко изгибается, но при этом, совершенно не реагирует на воду. Для сохранения геометрической устойчивости окон из ПВХ в профили (за исключением некоторых артикулов, например, штапика) помещают, чаще всего оцинкованные металлические усилительные вкладыши.</p>','/img/plastikovoe-okno-profil.jpg'),(2,'Деревянные окна','<p></p>','/img/uploads/full/der-okna.jpg'),(3,'Стеллажи','<p></p>','/img/uploads/full/stellazhi.jpg'),(5,'Деревянные изделия','Деревянные изделия','/img/uploads/thumbnails/derizd_600x450_80a.jpg'),(6,'Офисные перегородки','Офисные перегородки','/img/uploads/thumbnails/5_600x450_80a.jpg'),(7,'Рольставни','Рольставни','/img/uploads/thumbnails/6_600x450_80a.jpg'),(8,'Жалюзи','Жалюзи','/img/uploads/thumbnails/7_600x450_80a.jpg'),(9,'Алюминевые двери','Алюминевые двери','/img/uploads/thumbnails/8_600x450_80a.jpg'),(10,'Фасадные конструкции','Фасадные конструкции','/img/uploads/thumbnails/9_600x450_80a.jpg'),(11,'Раздвижные алюминиевые лоджии','Раздвижные алюминиевые лоджии','/img/uploads/thumbnails/11_600x450_80a.jpg'),(12,'Входные группы','Входные группы','/img/uploads/thumbnails/vhod-group_600x450_80a.jpg');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `patronymic` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (9,'г. Улан-Удэ, 111 микрорайон, д. 3/1, кв. 44','+79503975524','Бато','Александрович','Гармаев',1),(13,'','','Андрей','Валерьевич','Коновалов',2),(27,'','+79503975524','Олег','Алексеевич','Горбун',3);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dealer`
--

DROP TABLE IF EXISTS `dealer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dealer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `pass` varchar(128) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-dealer-user_id` (`user_id`),
  CONSTRAINT `fk-dealer-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dealer`
--

LOCK TABLES `dealer` WRITE;
/*!40000 ALTER TABLE `dealer` DISABLE KEYS */;
INSERT INTO `dealer` VALUES (2,'ZOBABUSHKINA','YOY1uTttlk3)','+79025346363',1);
/*!40000 ALTER TABLE `dealer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thumbs` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(32) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `favourite` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (22,'/img/uploads/thumbnails/img_2646.jpg','/img/uploads/full/img_2646.jpg','','',0,1),(23,'/img/uploads/thumbnails/img_2647.jpg','/img/uploads/full/img_2647.jpg','','',0,1),(24,'/img/uploads/thumbnails/img_2648.jpg','/img/uploads/full/img_2648.jpg','','',0,1),(25,'/img/uploads/thumbnails/img_2649.jpg','/img/uploads/full/img_2649.jpg','','',0,1),(26,'/img/uploads/thumbnails/img_2650.jpg','/img/uploads/full/img_2650.jpg','','',0,1),(27,'/img/uploads/thumbnails/img_2651.jpg','/img/uploads/full/img_2651.jpg','','',0,1),(28,'/img/uploads/thumbnails/img_2652.jpg','/img/uploads/full/img_2652.jpg','','',0,1),(29,'/img/uploads/thumbnails/img_2653.jpg','/img/uploads/full/img_2653.jpg','','',0,1),(30,'/img/uploads/thumbnails/img_2654.jpg','/img/uploads/full/img_2654.jpg','','',0,1),(31,'/img/uploads/thumbnails/img_2655.jpg','/img/uploads/full/img_2655.jpg','','',0,1),(32,'/img/uploads/thumbnails/img_2658.jpg','/img/uploads/full/img_2658.jpg','','',0,0);
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `sum` decimal(10,2) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pay_time` timestamp NULL DEFAULT NULL,
  `method` varchar(7) NOT NULL,
  `orderId` varchar(255) DEFAULT NULL,
  `remote_id` int(11) DEFAULT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (3,2,24,3200.00,'I','2021-06-15 08:58:17',NULL,'SB',NULL,NULL,'{\"uniqid\":\"3-1623747497\"}',NULL),(6,3,27,3400.00,'I','2021-06-16 05:07:37',NULL,'SB',NULL,NULL,'{\"uniqid\":\"6-1623820057\"}',NULL),(7,1,28,4400.00,'I','2021-06-16 07:43:18',NULL,'SB',NULL,NULL,'{\"uniqid\":\"7-1623829398\"}',NULL),(8,1,29,5600.00,'I','2021-06-16 07:43:50',NULL,'SB',NULL,NULL,'{\"uniqid\":\"8-1623829430\"}',NULL),(9,1,30,3200.00,'I','2021-06-16 07:45:01',NULL,'SB',NULL,NULL,'{\"uniqid\":\"9-1623829501\"}',NULL),(10,1,31,2200.00,'I','2021-06-16 07:48:44',NULL,'SB',NULL,NULL,'{\"uniqid\":\"10-1623829724\"}',NULL),(11,1,32,4400.00,'I','2021-06-16 07:52:35',NULL,'SB',NULL,NULL,'{\"uniqid\":\"11-1623829955\"}',NULL),(12,1,33,4400.00,'I','2021-06-16 07:55:04',NULL,'SB',NULL,NULL,'{\"uniqid\":\"12-1623830104\"}',NULL),(13,1,34,3200.00,'I','2021-06-16 07:58:25',NULL,'SB',NULL,NULL,'{\"uniqid\":\"13-1623830305\"}',NULL),(14,1,35,8800.00,'I','2021-06-16 08:17:09',NULL,'SB',NULL,NULL,'{\"uniqid\":\"14-1623831429\"}',NULL),(15,1,45,81600.00,'I','2021-07-13 05:22:20',NULL,'SB',NULL,NULL,'{\"uniqid\":\"15-1626153740\"}',NULL);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_product`
--

DROP TABLE IF EXISTS `main_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `main_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `main_product-category_id` (`category_id`),
  CONSTRAINT `fk-main_product-category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_product`
--

LOCK TABLES `main_product` WRITE;
/*!40000 ALTER TABLE `main_product` DISABLE KEYS */;
INSERT INTO `main_product` VALUES (1,'Трехкамерный ПВХ профиль','<p class=\"about_content\">Посредством перегородок 3-камерный оконный профиль делится на три <strong>«воздушные подушки»</strong></p><p class=\"about_content\">ПВХ с 3 камерами подходят для монтажа в небольших оконных проемах, приемлемы для квартир. Они достаточно хорошо защищают от летнего зноя и зимнего холода.</p>','/img/plastikovoe-okno-profil.jpg',1),(2,'Пятикамерный ПВХ профиль','<p class=\"about_content\">Такие изделия эффективнее защищают от уличного шума, непогоды, осадков, но обходятся дороже. Их чаще монтируют в городских зданиях и на требовательных к теплоизоляции объектах.</p>\n<p class=\"about_content\">Пятикамерные окна с монтажной глубиной 7 см сложнее разбить</p>\n<p class=\"about_content\">Они помогают экономить на энергоресурсах, лучше удерживая в доме тепло, особенно подходят для остекления коттеджей</p>\n<p class=\"about_content\">Изделия служат надежной защитой от промерзания, не способствуют формированию конденсата, максимально изолируют звук</p>','/img/plastikovoe-okno-profil.jpg',1),(3,'Шестикамерный ПВХ профиль','<p class=\"about_content\">Шестикамерный ПВХ профиль</p>','/img/plastikovoe-okno-profil.jpg',1),(4,'Классические','<p>Классические деревянные окна</p>','/img/uploads/full/der-okna.jpg',2),(5,'Паллетные','','/img/uploads/full/stellazhi.jpg',3),(6,'Офисные','Офисные стеллажи','/img/uploads/full/stellazhi.jpg',3),(8,'Архивные','Архивные стеллажи','/img/uploads/full/stellazhi.jpg',3),(9,'Передвижные','Передвижные стеллажи','/img/uploads/full/stellazhi.jpg',3),(10,'Металлические','Металлические стеллажи','/img/uploads/full/stellazhi.jpg',3),(11,'Торговые','Торговые стеллажи','/img/uploads/full/stellazhi.jpg',3),(12,'Мебель','Мебель','/img/uploads/thumbnails/derizd_600x450_80a.jpg',5),(13,'Офисная мебель','Офисная мебель','/img/uploads/thumbnails/derizd_600x450_80a.jpg',5),(14,'Цельностеклянные перегородки','Цельностеклянные перегородки','/img/uploads/thumbnails/5_600x450_80a.jpg',6),(15,'Офисные перегородки','Офисные перегородки','/img/uploads/thumbnails/5_600x450_80a.jpg',6),(16,'Стационарные перегородки','Стационарные перегородки\r\n','/img/uploads/thumbnails/5_600x450_80a.jpg',6),(17,'Встроенные рольставни','Встроенные рольставни','/img/uploads/thumbnails/6_600x450_80a.jpg',7),(18,'Накладные рольставни','Накладные рольставни','/img/uploads/thumbnails/6_600x450_80a.jpg',7),(19,'Пластиковые рольставни','Пластиковые рольставни','/img/uploads/thumbnails/6_600x450_80a.jpg',7),(20,'Стальные рольставни','Стальные рольставни\r\n','/img/uploads/thumbnails/6_600x450_80a.jpg',7),(21,'Алюминиевые рольставни','Алюминиевые рольставни','/img/uploads/thumbnails/6_600x450_80a.jpg',7),(22,'Бронированные рольставни','Бронированные рольставни','/img/uploads/thumbnails/6_600x450_80a.jpg',7),(23,'Перфорированные рольставни','Перфорированные рольставни','/img/uploads/thumbnails/6_600x450_80a.jpg',7),(24,'Вертикальные','Вертикальные жалюзи','/img/uploads/full/7_600x450_80a.jpg',8),(25,'Мультифактурные','Мультифактурные жалюзи','/img/uploads/full/7_600x450_80a.jpg',8),(26,'Фотожалюзи','Фотожалюзи','/img/uploads/full/5_600x450_80a.jpg',8),(27,'Горизонтальные','Горизонтальные жалюзи','/img/uploads/full/7_600x450_80a.jpg',8),(28,'Плиссе','Жалюзи плиссе','/img/uploads/full/7_600x450_80a.jpg',8),(29,'Рулонные','Рулонные жалюзи','/img/uploads/full/7_600x450_80a.jpg',8),(30,'Межрамные (встроенные)','Межрамные (встроенные) жалюзи','/img/uploads/full/7_600x450_80a.jpg',8),(31,'Римские','Римские жалюзи','/img/uploads/full/7_600x450_80a.jpg',8),(32,'Жалюзи с электроприводом','Жалюзи с электроприводом','/img/uploads/full/7_600x450_80a.jpg',8),(33,'Роллеты','Роллеты','/img/uploads/full/7_600x450_80a.jpg',8),(34,'Двустворчатые и одностворчатые','Двустворчатые и одностворчатые','/img/uploads/full/8_600x450_80a.jpg',9),(35,'Наружного и внутреннего открывания','Наружного и внутреннего открывания','/img/uploads/full/8_600x450_80a.jpg',9),(36,'Распашные, раздвижные и маятниковые','Распашные, раздвижные и маятниковые','/img/uploads/full/8_600x450_80a.jpg',9),(37,'Металлокассеты','Металлокассеты','/img/uploads/full/9_600x450_80a.jpg',10),(38,'Металлический сайдинг','Металлический сайдинг','/img/uploads/full/9_600x450_80a.jpg',10),(39,'Композитные панели','Композитные панели','/img/uploads/full/9_600x450_80a.jpg',10),(40,'Сендвич-панели','Сендвич-панели','/img/uploads/full/9_600x450_80a.jpg',10),(41,'Теплое остекление','Теплое остекление','/img/uploads/full/11_600x450_80a.jpg',11),(42,'Холодное остекление','Холодное остекление','/img/uploads/full/11_600x450_80a.jpg',11),(43,'Отделка балконов и лоджий','Отделка балконов и лоджий','/img/uploads/full/11_600x450_80a.jpg',11),(44,'Балкон с выносом','Балкон с выносом\r\n','/img/uploads/full/11_600x450_80a.jpg',11),(45,'Отделка вагонкой','Отделка вагонкой','/img/uploads/full/11_600x450_80a.jpg',11),(46,'Револьверные двери','Револьверные двери','/img/uploads/full/vhod-group_600x450_80a.jpg',12),(47,'Автоматические двери ','Автоматические двери ','/img/uploads/full/vhod-group_600x450_80a.jpg',12),(48,'Противопожарные двери','Противопожарные двери','/img/uploads/full/vhod-group_600x450_80a.jpg',12),(49,'Двухрамный','<p><strong>Двухрамные</strong> деревянные окна</p>',NULL,2);
/*!40000 ALTER TABLE `main_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1619749867),('m130524_201442_init',1619762764),('m140209_132017_init',1619749870),('m140403_174025_create_account_table',1619749870),('m140504_113157_update_tables',1619749870),('m140504_130429_create_token_table',1619749870),('m140506_102106_rbac_init',1619750159),('m140830_171933_fix_ip_field',1619749871),('m140830_172703_change_account_table_name',1619749871),('m141222_110026_update_ip_field',1619749871),('m141222_135246_alter_username_length',1619749871),('m150614_103145_update_social_account_table',1619749871),('m150623_212711_fix_username_notnull',1619749871),('m151218_234654_add_timezone_to_profile',1619749871),('m160516_095943_init',1620793477),('m160929_103127_add_last_login_at_to_user_table',1619749871),('m161109_124936_rename_cart_table',1620793477),('m161119_153348_alter_cart_data',1620793477),('m170512_035857_create_invoice_table',1623745609),('m170907_052038_rbac_add_index_on_auth_assignment_user_id',1619750159),('m180331_054705_invoice_order_id_set_default_null',1623745609),('m180331_054941_add_remote_id_column_to_invoice_table',1623745609),('m180331_055030_add_data_column_to_invoice_table',1623745609),('m180410_053203_add_url_column_to_invoice_table',1623745609),('m180523_151638_rbac_updates_indexes_without_prefix',1619750159),('m180604_202836_create_cart_items_table',1620875086),('m200409_110543_rbac_update_mssql_trigger',1619750159),('m210430_055650_create_dealer_table',1619762981),('m210504_005432_create_product_table',1620089832),('m210504_010958_create_cart_table',1620090748),('m210505_035402_create_client_table',1620187102),('m210505_037544_create_order_table',1620187102),('m210505_038121_create_junction_table_for_order_and_product_table',1620187102),('m210520_043258_create_telegram_user_table',1624338866),('m210520_044106_create_telegram_action_table',1624338866),('m210608_041402_create_junction_table_for_article_and_tags_tables',1623125665);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-order_client_id` (`client_id`),
  CONSTRAINT `fk-order_client_id` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (27,'hs8q79l9befi3tuk075n71lu4s',9,3,3400),(29,'80givroq3t5v5enjiq81aj0763',9,1,10000),(34,'80givroq3t5v5enjiq81aj0763',9,0,9800),(35,'hsec3rjebic8d71g1p06rhnacd',9,1,8800),(36,'hs8q79l9befi3tuk075n71lu4s',9,4,0),(38,'hs8q79l9befi3tuk075n71lu4s',9,4,NULL),(39,'hs8q79l9befi3tuk075n71lu4s',9,4,NULL),(40,'hs8q79l9befi3tuk075n71lu4s',9,4,NULL),(41,'hs8q79l9befi3tuk075n71lu4s',9,4,NULL),(42,'hs8q79l9befi3tuk075n71lu4s',9,4,NULL),(43,'hs8q79l9befi3tuk075n71lu4s',9,4,NULL),(44,'hs8q79l9befi3tuk075n71lu4s',9,4,NULL),(45,'hs8q79l9befi3tuk075n71lu4s',9,0,81600);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`,`product_id`),
  KEY `idx-order_product-order_id` (`order_id`),
  KEY `idx-order_product-product_id` (`product_id`),
  CONSTRAINT `fk-order_product-order_id` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-order_product-product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_product`
--

LOCK TABLES `order_product` WRITE;
/*!40000 ALTER TABLE `order_product` DISABLE KEYS */;
INSERT INTO `order_product` VALUES (27,1,1),(27,2,2),(29,1,4),(29,2,5),(34,1,5),(34,2,4),(35,1,4),(35,2,4),(38,1,3),(38,2,1),(41,1,3),(41,2,2),(43,1,2),(43,2,2),(45,1,3),(45,2,3);
/*!40000 ALTER TABLE `order_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `thumb` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Кирпич','Кирпич классический, для битья морд',1000,'/img/block.png'),(2,'Сковорода','Сковорода чугунная, для встречи пьяного супруга',1200,'/img/female.png');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `area` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telegram_chat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` VALUES (1,'Бато Гармаев','garmayev@yandex.ru','garmayev@yandex.ru','5cef7656beeb7b5181824a0778c6e0f0','Улан-Удэ, 111 микрорайон, д 3/1, кв. 44','http://garmayev.ru','','Asia/Irkutsk','+79503975524','Октябрьский',443353023),(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,581330380),(3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','Железнодорожный',NULL),(4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','Железнодорожный',NULL),(8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','Советский',NULL);
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) DEFAULT NULL,
  `client_phone` varchar(15) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request`
--

LOCK TABLES `request` WRITE;
/*!40000 ALTER TABLE `request` DISABLE KEYS */;
INSERT INTO `request` VALUES (26,'Vlad','+79503975524',0,'г Улан-Удэ, ул Банзарова, д 4 ',1624351063,NULL),(34,'Бато Гармаев','79503975524',0,'г Улан-Удэ, ул Терешковой, д 28 ',1624352099,NULL),(35,'Влад','89245512676',0,'г Улан-Удэ, ул Жердева, д 66 ',1624352188,NULL),(88,'Бато Гармаев','+79503975524',NULL,NULL,NULL,NULL),(89,'Бато Гармаев','+79503975524',0,'г Улан-Удэ, ул Терешковой, д 33 ',1624849568,NULL),(90,'Бато Гармаев','+79503975524',0,'г Улан-Удэ, мкр 111-й, д 3/1, кв 44',1626233138,NULL),(91,'Андрей','+79244561056',0,'г Улан-Удэ, ул Гагарина, д 83, кв 25',1626233267,NULL),(92,'Андрей Коновалов','+79244561056',0,'г Улан-Удэ, ул Гагарина, д 83, кв 25',1626234490,NULL),(93,'Андрей','+79244561056',0,'г Улан-Удэ, ул Гагарина, д 83, кв 56',1626234936,NULL),(94,'Бато','+79503975524',0,'г Улан-Удэ, мкр 111-й, д 3/1, кв 44',1626235104,NULL),(95,'Бато','+79503975524',0,'г Улан-Удэ, мкр 111-й, д 3/1, кв 44',1626235161,NULL),(96,'Бато','+79503975524',0,'г Улан-Удэ, мкр 111-й, д 3/1, кв 44',1626235475,NULL),(97,'Бато Гармаев','+79503975524',0,'г Улан-Удэ, мкр 111-й, д 3/1, кв 44',1626235499,NULL),(98,'Бато Гармаев','+79503975524',0,'г Улан-Удэ, мкр 111-й, д 3/1, кв 44',1626235515,NULL),(99,'Бато Гармаев','+79503975524',0,'г Улан-Удэ, мкр 111-й, д 3/1, кв 44',1626235641,NULL),(100,'Бато Гармаев','+79503975524',0,'г Улан-Удэ, мкр 111-й, д 3/1, кв 44',1626235650,NULL),(101,'Андрей Коновалов','+79244561056',0,'г Улан-Удэ, ул Гагарина, д 83, кв 25',1626235695,NULL),(102,'Олег','+79999999999',0,'Респ Бурятия, Иволгинский р-н, село Красноярово, ул Партизанская, д 30Б ',1626235779,NULL),(103,'andrey','89244561056',0,'г Улан-Удэ, ул Гагарина, д 83, кв 25',1626243110,NULL),(104,'andrey','89244561056',0,'Респ Бурятия, село Тарбагатай, ул Баннова ',1626243179,NULL);
/*!40000 ALTER TABLE `request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_account`
--

DROP TABLE IF EXISTS `social_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`provider`,`client_id`),
  UNIQUE KEY `account_unique_code` (`code`),
  KEY `fk_user_account` (`user_id`),
  CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_account`
--

LOCK TABLES `social_account` WRITE;
/*!40000 ALTER TABLE `social_account` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telegram_action`
--

DROP TABLE IF EXISTS `telegram_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telegram_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `chat_id` int(11) DEFAULT NULL,
  `value` text DEFAULT NULL,
  `action_name` varchar(128) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-telegram_action-user_id` (`user_id`),
  CONSTRAINT `fk-telegram_action-user_id` FOREIGN KEY (`user_id`) REFERENCES `telegram_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telegram_action`
--

LOCK TABLES `telegram_action` WRITE;
/*!40000 ALTER TABLE `telegram_action` DISABLE KEYS */;
INSERT INTO `telegram_action` VALUES (7,NULL,443353023,NULL,'signin',NULL);
/*!40000 ALTER TABLE `telegram_action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telegram_user`
--

DROP TABLE IF EXISTS `telegram_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telegram_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-telegram_user-user_id` (`user_id`),
  CONSTRAINT `fk-telegram_user-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=581330381 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telegram_user`
--

LOCK TABLES `telegram_user` WRITE;
/*!40000 ALTER TABLE `telegram_user` DISABLE KEYS */;
INSERT INTO `telegram_user` VALUES (435190684,'Vladislav','Ivanyuk','ivanyukvl',8),(443353023,'Бато','Гармаев','garmayev',NULL),(581330380,'Andrey','Kon','',NULL);
/*!40000 ALTER TABLE `telegram_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `token`
--

DROP TABLE IF EXISTS `token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`),
  CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `token`
--

LOCK TABLES `token` WRITE;
/*!40000 ALTER TABLE `token` DISABLE KEYS */;
INSERT INTO `token` VALUES (3,'s5PjQXsKhwZ4adgBzaZmquSm8OWj7xTH',1620965094,0),(8,'cmgls_heHQX7vhfqhSdexj2YvbSdAIZS',1624350807,0);
/*!40000 ALTER TABLE `token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT 0,
  `last_login_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_username` (`username`),
  UNIQUE KEY `user_unique_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'garmayev','garmayev@yandex.ru','$2y$10$DyWxha.I5IqteXkxSs9y1OuloWZ/MoQJfgykztwWYMaL3euIBtHCG','IDpR2u3opPeAiVZYN-2Q1oDjNaJDdkdc',1619750065,NULL,NULL,'127.0.0.1',1619750037,1624241198,0,1627538728),(2,'ak561056','ak561056@mail.ru','$2y$10$7FwJxhgoo3usR.h.Ptt9VehaOs6F/h8B5mnYmcEMMjD/OX8Gqfyg6','ylkeFNAivbhgfiBXmdp1aJE33GGgHtse',1620881451,NULL,NULL,'127.0.0.1',1620881375,1620881375,0,1626245358),(3,'garmayev.ba','garmayev.ba@gmail.com','$2y$10$YZFNcw4i8y9ZzqBfoeg0.e3CZjfTinVBebIHTQjs5dgKxB3unTgS6','tmWKiZuFesx-yaBS5spDfIL3DKBKhU1O',1620965094,NULL,NULL,'127.0.0.1',1620965094,1620965094,0,1623902723),(4,'master','master@garmayev.ru','$2y$10$XasRoET6SoE6JzATBhCDFu40sBwFlg.0/W0Bq2k6Ic3nRPptkAFqm','S3x6l1YSF_xYI8QrwHmZvMpb6OTnoL7W',1624010676,NULL,NULL,NULL,1624010676,1624010676,0,1624010847),(8,'vlad','vlad@mail.ru','$2y$10$E.E18g7xXHVr3GvC/dBha.wXm27ruP52lFjmJedr5wwdPPbXVxcWu','bFUe7aLu9y3S4chFwT4UjcaGG0Jd65cV',NULL,NULL,NULL,'78.136.232.103',1624350807,1624350807,0,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-05 10:59:12
