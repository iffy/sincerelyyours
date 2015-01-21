-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 21, 2015 at 04:15 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `story`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) COLLATE ascii_bin NOT NULL,
  `password` varchar(40) COLLATE ascii_bin NOT NULL,
  `email` varchar(40) COLLATE ascii_bin NOT NULL,
  `firstname` varchar(20) COLLATE ascii_bin NOT NULL,
  `lastname` varchar(20) COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=10 ;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `username`, `password`, `email`, `firstname`, `lastname`) VALUES
(1, 'jebarlow', '9a2c0bcff61f44d19181fd22360061f280299ea3', 'jebarlow@gmail.com', 'Joseph', 'Barlow'),
(9, 'ebarlow', '9a2c0bcff61f44d19181fd22360061f280299ea3', 'jebarlow@ymail.com', 'Eddie', 'Barlow');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guests`
--

CREATE TABLE IF NOT EXISTS `tbl_guests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) COLLATE ascii_bin NOT NULL,
  `firstname` varchar(20) COLLATE ascii_bin NOT NULL,
  `lastname` varchar(20) COLLATE ascii_bin NOT NULL,
  `email` varchar(40) COLLATE ascii_bin NOT NULL,
  `relation` varchar(20) COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_guests`
--

INSERT INTO `tbl_guests` (`id`, `username`, `firstname`, `lastname`, `email`, `relation`) VALUES
(3, 'jebarlow', 'Eddie', 'Barlow', 'jebarlow@ymail.com', 'Friend'),
(4, 'jebarlow', 'Sharilyn', 'Barlow', 'sjbarlow@gmail.com', 'Wife'),
(5, 'ebarlow', 'David', 'Barlow', 'dave.tyler.barlow@gmail.com', 'Son');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE IF NOT EXISTS `tbl_images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE ascii_bin NOT NULL,
  `type` varchar(40) COLLATE ascii_bin NOT NULL,
  `images_path` varchar(200) COLLATE ascii_bin NOT NULL,
  `submission_date` date DEFAULT NULL,
  `size` varchar(40) COLLATE ascii_bin NOT NULL,
  `storyname` varchar(60) COLLATE ascii_bin NOT NULL,
  `image_name` varchar(255) COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_images`
--

INSERT INTO `tbl_images` (`image_id`, `username`, `type`, `images_path`, `submission_date`, `size`, `storyname`, `image_name`) VALUES
(18, 'jebarlow', 'image/jpeg', 'images/jebarlow', '0000-00-00', '27730', 'Elder and the Egg', 'creamed possum.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_story`
--

CREATE TABLE IF NOT EXISTS `tbl_story` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE ascii_bin NOT NULL,
  `storyname` varchar(50) COLLATE ascii_bin NOT NULL,
  `stories` longtext COLLATE ascii_bin NOT NULL,
  `date` varchar(20) COLLATE ascii_bin NOT NULL,
  `guest_id` tinytext COLLATE ascii_bin NOT NULL,
  `image_name` varchar(40) COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name_2` (`name`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tbl_story`
--

INSERT INTO `tbl_story` (`id`, `name`, `storyname`, `stories`, `date`, `guest_id`, `image_name`) VALUES
(14, 'jebarlow', 'Tyler''s Forehead', 'We moved to California shortly after I graduated from BYU so I could work for a company called Access HealthNet. We lived in a place called Camarillo and I worked in Thousand Oaks meaning I had to drive up and down the 101 freeway to and from work.\r\nLiving in a small apartment we learned to look for the best of things. One of the funniest things was to watch Tyler run into the room whenever he heard the theme song for Star Trek ? The Next Generation. He would zoom into the room past the TV and zoom back, running as fast as he could during the music. \r\nWe loved it, it was fun to watch and fun for him. One morning Tyler came running out o f his room as he did so many times before but this time he slipped. Slipped and went sliding head first into the corner of a cabinet, splitting he head wide open.\r\nInstant blood, instant panic; here is my three year old son with an enormous gash in his forehead. First thing in the morning, blood all over the floor I grab Ty and rush out the door and headed for the hospital.\r\nThe hospital is one exit down the 101 from where we were, I knew that, but I did not know anything else. I was counting on signs to point me towards where I needed to go. Holding a towel on his forehead and trying to hold Ty still while driving and finding the hospital, I was lead right to the emergency entrance.\r\nI walked in with a crying, bleeding three year old child and walked to the head of the line in the emergency room.  We walked into a small surgical room and the doctor asked if I wanted to sedate my son, in which case we would be there all day, or if I could just hold him down while they stitched him up.\r\nI elected to hold him still. They put him in a papoose looking thing and I held his head as the doctors gave him a local anesthesia and then stitched him up. Screams and cries and then whimpers when they finished. I held him close to comfort him and we went home.\r\nWe watched that cute little boy of 3 forever point to his scar and say ?my owey?', '0000-00-00', '0', ''),
(31, 'jebarlow', 'Elder and the Egg', 'I have one more food story, mixed with a companion story. When I became a trainer I got this kid that had never been out of Farmington, UT. The food was really getting to him and I was feeling bad for him. We did not eat dinner in the mission we just got something on the go, and this time I told him we would get just a regular plain old chicken egg for him to eat. Not what I wanted, I got the duck egg. We got ordered one for him and the lady proceeded to peel it for him.\r\n\r\nBy the time she was done the egg was black. Her hands we black because she had been tending the coals of the fire the egg were roasting in. My companion looked at the egg and then at me and then back at the egg with this lady watching the whole thing and could see the disappointment on his face. This poor new kid from the U.S. just wanted a regular meal and was being handed a black egg. As the lady realized what was going on and that the back egg had turned off the young Elder, she popped the whole egg in her mouth, rinsing it off and then handed it back to him.\r\n\r\nTo his credit I will say the Elder took the egg from the lady and paid her for it and we walked a way. Never had I seen this Elder so surprised and never had I wanted to laugh so hard in all my life', '01/02/2015', 'on', ''),
(32, 'jebarlow', 'test story', 'This is a test story', '01/02/2015', 'on', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
