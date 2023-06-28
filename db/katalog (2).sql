-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2023 at 03:25 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `katalog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `banner` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `banner`) VALUES
(1, 'Bags', 'Bags1.png'),
(2, 'Clutch', 'Clutch.png'),
(3, 'Boxes', 'Boxes.png');

-- --------------------------------------------------------

--
-- Table structure for table `log_activities`
--

CREATE TABLE `log_activities` (
  `id` int(11) NOT NULL,
  `tables_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `before` varchar(255) DEFAULT NULL,
  `after` varchar(255) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `create_by` varchar(75) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `mat_id` int(11) NOT NULL,
  `material_name` varchar(100) NOT NULL,
  `mat_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`mat_id`, `material_name`, `mat_code`) VALUES
(1, 'Rekta Pandan', 'RTPD'),
(2, 'Embroider Lurik', 'EBLRK'),
(4, 'Batik', 'BTK'),
(5, 'Rekta Leather', 'RTLT'),
(6, 'Batik Ecoprint', 'BTKEC'),
(7, 'Leather Lukis', 'LTLK'),
(8, 'Square Pandan', 'SQPD'),
(9, 'Bambu', 'BM');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `mat_id` int(11) DEFAULT NULL,
  `product_name` varchar(256) NOT NULL,
  `length` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `picture` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `product_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `sub_id`, `mat_id`, `product_name`, `length`, `width`, `height`, `picture`, `description`, `price`, `product_code`) VALUES
(30, 25, 2, 'Wiguna Totebags', 25, 15, 18, 'Wiguna_Totebag.png', 'esdfghjj', 400000, '001'),
(31, 25, 1, 'Wiguna Mix Sibori Totebag', 37, 15, 27, 'Wiguna_Mix_Sibori_Totebag.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem laborum excepturi fugiat iusto sapiente minus, repellendus sed, quia cupiditate, unde quaerat eum voluptate? Dolorem eius, dicta hic nihil tenetur voluptas maiores quos nesciunt impedit, distinctio architecto fuga dolor optio veritatis beatae molestiae minima? Ipsa mollitia, earum saepe provident natus vel?', 350000, '001'),
(32, 35, 1, 'Pandan Segoro Painting', 40, 20, 30, 'Pandan_Segoro_Painting.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem laborum excepturi fugiat iusto sapiente minus, repellendus sed, quia cupiditate, unde quaerat eum voluptate? Dolorem eius, dicta hic nihil tenetur voluptas maiores quos nesciunt impedit, distinctio architecto fuga dolor optio veritatis beatae molestiae minima? Ipsa mollitia, earum saepe provident natus vel?', 350000, '001'),
(33, 35, 1, 'Natural Pandan Segoro Shopping Bag', 40, 20, 30, 'Natural_Pandan_Segoro_Shopping_Bag.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem laborum excepturi fugiat iusto sapiente minus, repellendus sed, quia cupiditate, unde quaerat eum voluptate? Dolorem eius, dicta hic nihil tenetur voluptas maiores quos nesciunt impedit, distinctio architecto fuga dolor optio veritatis beatae molestiae minima? Ipsa mollitia, earum saepe provident natus vel?', 250000, '002'),
(34, 32, 7, 'RANU Hand Bag', 25, 15, 27, 'RANU_Hand_Bag.jpg', 'RANU Hand Bag, tas jinjing yang elegan namun juga ecofriendly. \r\n\r\nDibuat dari anyaman daun pandan warna natural yang dikombinasikan dengan kulit pada handle tas. Tampil menawan ketika dibawa ke suatu pesta atau pun acara formal lainnya. \r\n\r\nDi dalamnya terdapat ruang yang cukup lega untuk menampung barang-barang bawaan seperti smartphone atau gadget, dompet dan peralatan make up. ', 1500000, '001'),
(35, 32, 5, 'Purana Hand Bag', 25, 15, 27, 'Purana_HandBag.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem laborum excepturi fugiat iusto sapiente minus, repellendus sed, quia cupiditate, unde quaerat eum voluptate? Dolorem eius, dicta hic nihil tenetur voluptas maiores quos nesciunt impedit, distinctio architecto fuga dolor optio veritatis beatae molestiae minima? Ipsa mollitia, earum saepe provident natus vel?', 1000000, '001'),
(36, 30, 5, 'PUNJUNG Hampers Bag', 30, 15, 15, 'PUNJUNG_Hampers_Bag.jpeg', 'PUNJUNG Hampers Bag, tas hantaran ramah lingkungan yang praktis dan mudah dibawa!\r\n\r\nDibuat dari anyaman daun pandan yang dikombinasikan dengan kulit untuk Logo Perusahaan dengan teknik engraving.\r\n\r\nPUNJUNG Hampers Bag sangat kuat dan kokoh menahan berat/isi di dalam tas. Bisa digunakan sebagai hampers bag atau tas hantaran pada event-event special bersama keluarga atau sahabat tercinta.', 150000, '001');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `sub_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(100) NOT NULL,
  `image` varchar(256) NOT NULL,
  `sub_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`sub_id`, `category_id`, `subcategory_name`, `image`, `sub_code`) VALUES
(25, 1, 'Tote Bag', 'Tote_Bag.png', 'TB'),
(28, 3, 'Hampers Box', 'Hampers_Box.jpeg', 'HMB'),
(30, 1, 'Hampers Bags', 'Hampers_Bags.jpeg', 'HB'),
(31, 2, 'Envelope Clutch', 'Envelope_Clutch.jpg', 'EC'),
(32, 1, 'HandBags', 'HandBags.jpg', 'HNB'),
(33, 2, 'Test', 'Test.png', 'TS'),
(34, 3, 'Boxes Mix', 'coba.jpg', 'BM'),
(35, 1, 'Shopping Bag', 'Shopping_Bag.png', 'SB');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `no` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`no`, `email`, `username`, `password`, `role`, `image`) VALUES
(1, 'pandamadiwastrajanaloka@gmail.com', 'administrator', '200ceb26807d6bf99fd6f4f0d1ca54d4', 'administrator', 'favicon.png');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip_address`, `timestamp`) VALUES
(1, '::1', '2023-06-26 15:51:53'),
(2, '::1', '2023-06-26 16:05:18'),
(3, '127.0.0.1', '2023-06-26 16:11:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `log_activities`
--
ALTER TABLE `log_activities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`mat_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `mat_id` (`mat_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `log_activities`
--
ALTER TABLE `log_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `mat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subcategory` (`sub_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`mat_id`) REFERENCES `material` (`mat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
