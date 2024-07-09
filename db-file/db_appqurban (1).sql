-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2024 at 04:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_appqurban`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` varchar(25) NOT NULL,
  `id_invoice` varchar(30) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brgqurban` varchar(255) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_invoice`, `id_brg`, `nama_brgqurban`, `jumlah`, `harga`) VALUES
(27, '11', 'INV-20898922', 6, 'Sapi pak Goni', 1, 2147483647),
(29, '11', 'INV-88102237', 6, 'Sapi pak Goni', 2, 299999999),
(30, '11', 'INV-86229060', 7, 'gh', 1, 30000000),
(31, '11', 'INV-53736805', 7, 'gh', 1, 30000000),
(32, '11', 'INV-11796494', 7, 'gh', 1, 30000000),
(33, '11', 'INV-72860929', 7, 'gh', 1, 30000000),
(34, '11', 'INV-65405078', 7, 'gh', 1, 30000000),
(35, '11', 'INV-90021207', 7, 'gh', 1, 30000000);

--
-- Triggers `cart`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `cart` FOR EACH ROW BEGIN
	UPDATE product SET stok = stok-NEW.jumlah
    WHERE id_brg = NEW.id_brg;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(15) NOT NULL,
  `id_user` int(15) NOT NULL,
  `id_balas` int(15) NOT NULL,
  `chat` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id_chat`, `id_user`, `id_balas`, `chat`, `waktu`) VALUES
(64, 25, 23, 'haloo admin\n', '2024-06-30 21:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(20) NOT NULL,
  `sender_id` int(20) NOT NULL,
  `receiver_id` int(20) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `read_status` tinyint(1) NOT NULL,
  `message_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `timestamp`, `read_status`, `message_id`) VALUES
(1, 11, 1, 'halo', '2024-06-15 01:01:43', 0, 0),
(2, 6, 1, 'halo admin', '2024-06-15 01:17:58', 0, 0),
(3, 6, 1, 'halo user', '2024-06-15 01:18:16', 0, 0),
(4, 6, 1, 'haloooo', '2024-06-15 01:26:59', 0, 0),
(5, 6, 1, 'haloo user', '2024-06-15 01:31:20', 0, 0),
(6, 6, 1, 'halo', '2024-06-15 01:32:31', 0, 0),
(7, 6, 1, 'halo', '2024-06-15 01:32:37', 0, 0),
(8, 6, 1, 'halo', '2024-06-15 01:34:38', 0, 0),
(9, 6, 1, 'hai', '2024-06-15 01:34:47', 0, 0),
(10, 6, 1, 'halo', '2024-06-15 01:36:44', 0, 0),
(11, 6, 1, 'user', '2024-06-15 01:39:42', 0, 0),
(12, 6, 1, 'user hayoo', '2024-06-15 01:41:37', 0, 0),
(13, 6, 1, 'haiiiii', '2024-06-15 01:42:09', 0, 0),
(14, 6, 1, 'halo admin', '2024-06-15 01:42:32', 0, 0),
(15, 6, 1, 'adminnnn ', '2024-06-15 02:21:29', 0, 0),
(16, 11, 1, 'hahahaha admin', '2024-06-15 02:43:58', 0, 0),
(17, 11, 1, 'hai', '2024-06-15 02:55:20', 0, 0),
(18, 11, 1, 'hdh', '2024-06-15 03:43:17', 0, 0),
(19, 1, 11, 'ha', '2024-06-14 23:13:03', 0, 0),
(20, 1, 1, 'huhuhu', '2024-06-14 23:16:32', 0, 0),
(21, 1, 1, 'hihihi', '2024-06-14 23:17:22', 0, 0),
(22, 6, 1, 'xixiix', '2024-06-15 04:29:03', 0, 0),
(23, 6, 1, 'hao', '2024-06-15 04:31:05', 0, 0),
(24, 6, 1, 'hao', '2024-06-15 04:34:49', 0, 0),
(25, 6, 1, 'cell', '2024-06-15 04:35:00', 0, 0),
(26, 6, 1, 'hai', '2024-06-15 04:40:42', 0, 0),
(27, 6, 1, 'hello', '2024-06-15 05:00:32', 0, 0),
(28, 11, 1, 'hahahha', '2024-06-15 05:36:08', 0, 0),
(29, 11, 1, 'hello', '2024-06-15 05:42:13', 0, 0),
(30, 11, 1, 'hello', '2024-06-15 05:42:37', 0, 0),
(31, 11, 1, 'hai', '2024-06-15 05:57:25', 0, 0),
(32, 11, 1, 'xiixix', '2024-06-15 05:59:54', 0, 0),
(33, 11, 1, 'hh', '2024-06-15 06:05:17', 0, 0),
(34, 11, 1, 'vvvv', '2024-06-15 07:46:22', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_brg` int(11) NOT NULL,
  `nama_brgqurban` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_brg`, `nama_brgqurban`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(11, 'Sapi milik Pak Dimas', 'Memiliki berat sekitar 200 kg', 'Hewan Qurban', 29000000, 2, 'Sapi1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `order_id` char(30) NOT NULL,
  `id_user` varchar(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `mobile_phone` varchar(15) NOT NULL,
  `city` varchar(255) NOT NULL,
  `kode_pos` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `ekspedisi` varchar(100) NOT NULL,
  `tracking_id` varchar(30) NOT NULL,
  `transaction_time` datetime DEFAULT NULL,
  `payment_limit` datetime DEFAULT NULL,
  `status` varchar(2) NOT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`order_id`, `id_user`, `name`, `email`, `alamat`, `mobile_phone`, `city`, `kode_pos`, `payment_method`, `ekspedisi`, `tracking_id`, `transaction_time`, `payment_limit`, `status`, `gambar`) VALUES
('INV-11796494', '11', 'user', 'user@gmail.com', 'Magelang', '0828897776887', 'Kudus', '1123', 'Direct Bank Transfer', 'SICEPAT', '997592405007', '2024-06-16 09:21:13', '2024-06-17 09:21:13', '1', NULL),
('INV-20898922', '11', 'user', 'user@gmail.com', '08298897776887', '0828897776887', 'Gianyar', '1123', 'Direct Bank Transfer', 'J&T Express', '40528277234', '2024-06-14 04:02:45', '2024-06-15 04:02:45', '1', 'sapi21.jpeg'),
('INV-53736805', '11', 'user', 'user@gmail.com', '08298897776887', '0828897776887', 'Buleleng', '1123', 'Direct Bank Transfer', 'J&T Express', '806116890913', '2024-06-16 08:56:50', '2024-06-17 08:56:50', '0', NULL),
('INV-65405078', '11', 'user', 'user@gmail.com', '08298897776887', '0828897776887', 'Jembrana', '1123', 'Direct Bank Transfer', 'J&T Express', '324712412750', '2024-06-16 10:26:38', '2024-06-17 10:26:38', '0', NULL),
('INV-72860929', '11', 'user', 'user@gmail.com', 'Magelang', '081802927483', 'Magelang', '1123', 'Direct Bank Transfer', 'J&T Express', '1083966765510', '2024-06-16 09:54:04', '2024-06-17 09:54:04', '0', 'bukti3.png'),
('INV-7938235', '11', 'user', 'user@gmail.com', 'Desa sumberjati kec Tmeph Kab Lumajang', '081802927483', 'Lumajang', '1173', 'Direct Bank Transfer', 'J&T Express', '507792154071', '2024-06-14 04:52:47', '2024-06-15 04:52:47', '1', NULL),
('INV-86229060', '11', 'user', 'user@gmail.com', 'Magelang', '0828897776887', 'Hulu Sungai Utara', '1123', 'Direct Bank Transfer', 'J&T Express', '991716926093', '2024-06-15 12:13:34', '2024-06-16 12:13:34', '0', 'bukti12.png'),
('INV-88102237', '11', 'user', 'user@gmail.com', 'Denpasar', '0828897776887', 'Denpasar', '1123', 'Direct Bank Transfer', 'SICEPAT', '959705961240', '2024-06-14 05:18:01', '2024-06-15 05:18:01', '1', 'sapi22.jpeg'),
('INV-90021207', '11', 'user', 'user@gmail.com', '08298897776887', '0828897776887', 'Gianyar', '1123', 'Direct Bank Transfer', 'J&T Express', '402323546757', '2024-06-16 13:43:26', '2024-06-17 13:43:26', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `password`, `level`, `avatar`) VALUES
(15, 'Amin Dias Sasono', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', '2', 'user.png'),
(21, 'dina', 'dina@gmail.com', '$2y$10$8UgtX3K68PWEpAuBlHLhh.FHpztmMx1oRULU7ULM5/pRMcdfIsXjK', '2', 'user.png'),
(22, 'dika', 'dika@gmail.com', '5227ea98f508fe74ff58c397418ad81d', '0', 'user.png'),
(23, 'admin2', 'admin@gmail.com', 'f5052b51e52803ed8d332a0a1cdf339c', '1', 'user.png'),
(24, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '1\r\n', 'user.png'),
(25, 'naila', 'naila@gmail.com', '621a225d0605cc54a91850aaa543c841', '0', 'user.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
