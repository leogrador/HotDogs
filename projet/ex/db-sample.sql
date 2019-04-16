-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Created on: 2012. febr. 20.
-- Server version: 5.5.8
-- PHP version: 5.3.5


SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `classified`
--

USE classified;
-- --------------------------------------------------------


--
-- Table content: `ad`
--

INSERT INTO `ad` (`id`, `user_id`, `name`, `email`, `telephone`, `title`, `description`, `picture`, `category`, `price`, `city`, `region`, `postedon`, `expiry`, `webpage`, `order`, `active`, `code`, `activedon`, `sponsored`, `sponsoredon`, `expirednotice`, `ipaddr`, `lastmodified`) VALUES
(1, 2, 'Dummy User', 'user@test.com', '', 'Molestie velit consectetur', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam diam eros, adipiscing ac tristique non, fringilla sit amet est. Proin adipiscing congue fringilla. Nunc ac ullamcorper est. Nullam felis est, dignissim at faucibus lacinia, imperdiet quis urna. Suspendisse ornare pretium lacinia. Nunc laoreet venenatis sem ac imperdiet. Pellentesque porttitor pellentesque purus eu lacinia. Proin rhoncus scelerisque vulputate.', '', 1, '', '', 1, '2011-11-28', '2011-12-12', 'http://www.dummywebpage.com', 0, 1, 'bcff941a6c91cf3be101d0e00467fa50', '2011-11-28', 0, '0000-00-00', 0, '', '2011-12-02 15:45:20');

-- --------------------------------------------------------

--
-- Table content: `ad_review`
--

INSERT INTO `ad_review` (`id`, `ad_id`, `user_id`, `rate`, `comment`) VALUES
(1, 1, 2, 5, 'Test review.');

-- --------------------------------------------------------

--
-- Table content: `response`
--

INSERT INTO `response` (`id`, `ad_id`, `user_id`, `message`) VALUES
(1, 2, 2, 'Test response.');

-- --------------------------------------------------------

--
-- Table content: `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `order`, `parent`) VALUES
(1, 'Dummy Category', 'dummy-category', 1, 0),
(2, 'Sub Category', 'sub-category', 1, 1);

-- --------------------------------------------------------

--
-- Table content: `region`
--

INSERT INTO `region` (`id`, `name`, `slug`, `order`, `parent`) VALUES
(1, 'Dummy City', 'dummy-city', 1, 0),
(2, 'Sub City', 'sub-city', 1, 1);

-- --------------------------------------------------------

--
-- Table content: `expiry`
--

INSERT INTO `expiry` (`id`, `name`, `period`, `order`) VALUES
(1, '1 week', '7', 1);

-- --------------------------------------------------------

--
-- Table content: `static-content`
--

INSERT INTO `static-content` (`id`, `title`, `slug`, `content`) VALUES
(7, 'Terms of Use', 'terms-of-use', '<h3>Term of Use</h3>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam diam eros, adipiscing ac tristique non, fringilla sit amet est. Proin adipiscing congue fringilla. Nunc ac ullamcorper est. Nullam felis est, dignissim at faucibus lacinia, imperdiet quis urna. Suspendisse ornare pretium lacinia. Nunc laoreet venenatis sem ac imperdiet. Pellentesque porttitor pellentesque purus eu lacinia. Proin rhoncus scelerisque vulputate.\r\n\r\nNulla lorem lectus, interdum ac porttitor sed, ullamcorper nec nisi. Sed id erat quam. Phasellus sed nisi ante, vel adipiscing ligula. Sed at quam tellus, vel consequat archttp://localhost/classified/admin/static-content-edit.php?id=5u. Sed rhoncus dui a turpis varius vitae scelerisque arcu pharetra. Aenean faucibus varius nunc, ornare aliquam sem consectetur eu. Curabitur mattis, est et luctus lobortis, enim leo lacinia nulla, iaculis blandit neque odio vitae dui. Aenean ac leo ac quam imperdiet auctor. Curabitur elit tellus, egestas eget pretium lacinia, rhoncus nec lectus. Donec dapibus interdum urna, in molestie velit consectetur quis. Ut in ligula quis enim dignissim porttitor et ut est.\r\n\r\nDonec interdum mi sed urna pretium nec volutpat leo varius. Nulla elementum pretium mattis. Phasellus varius elit sit amet ipsum ultrices cursus. Integer at sapien et eros semper tempor vitae nec erat. Phasellus suscipit elementum facilisis. Sed risus turpis, cursus ac consequat at, dignissim quis velit. Vivamus sed diam vel sapien ultricies suscipit non quis diam. Cras sit amet interdum massa. Phasellus vulputate, magna vel suscipit mattis, erat nibh mollis leo, non fermentum tortor ligula sit amet metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec semper egestas orci at volutpat. Phasellus nibh justo, accumsan vel hendrerit sed, laoreet ut sem. Quisque fermentum, eros nec molestie consectetur, augue arcu aliquam enim, sed mollis est dolor id sem. Suspendisse potenti. Vestibulum malesuada euismod pellentesque. Vivamus hendrerit mauris at odio feugiat sit amet sollicitudin lorem pharetra. '),
(8, 'Privacy Policy', 'privacy-policy', '<h3>Privacy Policy</h3>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam diam eros, adipiscing ac tristique non, fringilla sit amet est. Proin adipiscing congue fringilla. Nunc ac ullamcorper est. Nullam felis est, dignissim at faucibus lacinia, imperdiet quis urna. Suspendisse ornare pretium lacinia. Nunc laoreet venenatis sem ac imperdiet. Pellentesque porttitor pellentesque purus eu lacinia. Proin rhoncus scelerisque vulputate.\r\n\r\nNulla lorem lectus, interdum ac porttitor sed, ullamcorper nec nisi. Sed id erat quam. Phasellus sed nisi ante, vel adipiscing ligula. Sed at quam tellus, vel consequat archttp://localhost/classified/admin/static-content-edit.php?id=5u. Sed rhoncus dui a turpis varius vitae scelerisque arcu pharetra. Aenean faucibus varius nunc, ornare aliquam sem consectetur eu. Curabitur mattis, est et luctus lobortis, enim leo lacinia nulla, iaculis blandit neque odio vitae dui. Aenean ac leo ac quam imperdiet auctor. Curabitur elit tellus, egestas eget pretium lacinia, rhoncus nec lectus. Donec dapibus interdum urna, in molestie velit consectetur quis. Ut in ligula quis enim dignissim porttitor et ut est.\r\n\r\nDonec interdum mi sed urna pretium nec volutpat leo varius. Nulla elementum pretium mattis. Phasellus varius elit sit amet ipsum ultrices cursus. Integer at sapien et eros semper tempor vitae nec erat. Phasellus suscipit elementum facilisis. Sed risus turpis, cursus ac consequat at, dignissim quis velit. Vivamus sed diam vel sapien ultricies suscipit non quis diam. Cras sit amet interdum massa. Phasellus vulputate, magna vel suscipit mattis, erat nibh mollis leo, non fermentum tortor ligula sit amet metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec semper egestas orci at volutpat. Phasellus nibh justo, accumsan vel hendrerit sed, laoreet ut sem. Quisque fermentum, eros nec molestie consectetur, augue arcu aliquam enim, sed mollis est dolor id sem. Suspendisse potenti. Vestibulum malesuada euismod pellentesque. Vivamus hendrerit mauris at odio feugiat sit amet sollicitudin lorem pharetra. ');

-- --------------------------------------------------------

--
-- Table content: `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `telephone`, `city`, `region`, `category`, `webpage`, `createdon`, `password`, `code`, `active`, `ipaddr`) VALUES
(2, 'Dummy User', 'user', 'user@test.com', '', '', '2', '1', '', '2011-12-03 01:57:26', 'user12', '6895532aee734b7c176e40f737b7e58b', 1, '127.0.0.1');

-- --------------------------------------------------------
