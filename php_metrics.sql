-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2016 at 05:25 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php_metrics`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(250) NOT NULL,
  `ca` varchar(250) DEFAULT NULL,
  `cbo` varchar(25) DEFAULT NULL,
  `ce` varchar(250) DEFAULT NULL,
  `cis` varchar(250) DEFAULT NULL,
  `cloc` varchar(250) DEFAULT NULL,
  `cr` varchar(250) DEFAULT NULL,
  `csz` varchar(250) DEFAULT NULL,
  `dit` varchar(250) DEFAULT NULL,
  `eloc` varchar(250) DEFAULT NULL,
  `impl` varchar(250) DEFAULT NULL,
  `lloc` varchar(250) DEFAULT NULL,
  `loc` varchar(250) DEFAULT NULL,
  `ncloc` varchar(250) DEFAULT NULL,
  `noam` varchar(250) DEFAULT NULL,
  `nocc` varchar(250) DEFAULT NULL,
  `nom` varchar(250) DEFAULT NULL,
  `noom` varchar(250) DEFAULT NULL,
  `npm` varchar(250) DEFAULT NULL,
  `rcr` varchar(250) DEFAULT NULL,
  `vars` varchar(250) DEFAULT NULL,
  `varsi` varchar(250) DEFAULT NULL,
  `varsnp` varchar(250) DEFAULT NULL,
  `wmc` varchar(250) DEFAULT NULL,
  `wmci` varchar(250) DEFAULT NULL,
  `wmcnp` varchar(250) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `file_id` int(60) NOT NULL,
  `nr_of_methods` int(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(250) NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `full_path` varchar(250) NOT NULL,
  `cloc` varchar(250) NOT NULL,
  `eloc` varchar(250) NOT NULL,
  `lloc` varchar(250) NOT NULL,
  `loc` varchar(250) NOT NULL,
  `ncloc` varchar(250) NOT NULL,
  `package_id` int(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `methods`
--

CREATE TABLE IF NOT EXISTS `methods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(250) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `ccn` varchar(250) DEFAULT NULL,
  `ccn2` varchar(250) DEFAULT NULL,
  `cloc` varchar(250) DEFAULT NULL,
  `eloc` varchar(250) DEFAULT NULL,
  `lloc` varchar(250) DEFAULT NULL,
  `loc` varchar(250) DEFAULT NULL,
  `ncloc` varchar(250) DEFAULT NULL,
  `npath` varchar(250) DEFAULT NULL,
  `class_id` int(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(250) NOT NULL,
  `cr` varchar(250) DEFAULT NULL,
  `noc` varchar(250) DEFAULT NULL,
  `nof` varchar(250) DEFAULT NULL,
  `noi` varchar(250) DEFAULT NULL,
  `nom` varchar(250) DEFAULT NULL,
  `rcr` varchar(250) DEFAULT NULL,
  `project_name` varchar(250) NOT NULL,
  `nr_of_files` int(250) DEFAULT NULL,
  `nr_of_classes` int(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(160) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(250) NOT NULL,
  `ahh` varchar(250) NOT NULL,
  `andc` varchar(250) NOT NULL,
  `calls` varchar(250) NOT NULL,
  `ccn` varchar(250) NOT NULL,
  `ccn2` varchar(250) NOT NULL,
  `cloc` varchar(250) NOT NULL,
  `clsa` varchar(250) NOT NULL,
  `clsc` varchar(250) NOT NULL,
  `eloc` varchar(250) NOT NULL,
  `fanout` varchar(250) NOT NULL,
  `leafs` varchar(250) NOT NULL,
  `lloc` varchar(250) NOT NULL,
  `loc` varchar(250) NOT NULL,
  `maxDIT` varchar(250) NOT NULL,
  `ncloc` varchar(250) NOT NULL,
  `noc` varchar(250) NOT NULL,
  `nof` varchar(250) NOT NULL,
  `noi` varchar(250) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `nop` varchar(250) NOT NULL,
  `roots` varchar(250) NOT NULL,
  `nr_of_files` varchar(250) NOT NULL,
  `nr_of_packages` int(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
