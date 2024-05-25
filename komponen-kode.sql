-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2024 at 06:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `komponen-kode`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kode`
--

CREATE TABLE `data_kode` (
  `id` bigint(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kode` varchar(10000) NOT NULL,
  `komponen_id` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_kode`
--

INSERT INTO `data_kode` (`id`, `nama`, `kode`, `komponen_id`) VALUES
(18, 'Javascript', 'function previewFile() {\r\n    var preview = document.getElementById(\'previewImage\');\r\n    var file = document.querySelector(\'input[type=file]\').files[0];\r\n    var reader = new FileReader();\r\n\r\n    reader.onloadend = function () {\r\n        preview.src = reader.result;\r\n    }\r\n\r\n    if (file) {\r\n        reader.readAsDataURL(file);\r\n    } else {\r\n        preview.src = \"{{ asset(\'img/user.png\') }}\";\r\n    }\r\n};', 18),
(21, 'CSS', 'input[type=\"file\"] {\r\n    display: none;\r\n}\r\n\r\n.file-label {\r\n    display: inline-block;\r\n    cursor: pointer;\r\n    padding: 8px;\r\n    width: 150px;\r\n    border-radius: 5px;\r\n    border: none;\r\n    margin: 20px;\r\n    cursor: pointer;\r\n    background-color: #564577;\r\n    color: #ffffff;\r\n    text-align: center;\r\n    transition: box-shadow 0.3s ease, transform 0.3s ease;\r\n}\r\n.file-label:hover{\r\n    box-shadow: 0 0 8px 2px rgba(237, 147, 255, 0.7); /* Adjust color and size for glow effect */\r\n    color: #e2d2eb;\r\n    background-color: #493a66;\r\n}', 0),
(22, 'HTML', '<input onchange=\"previewFile()\" type=\"file\" id=\"file-input\" name=\"image\"\r\n                                accept=\"image/jpeg, image/png\">\r\n                            <div class=\"cover\">\r\n                                <img id=\"previewImage\" src=\"photo.png\" alt=\"\">\r\n                                <label for=\"file-input\" class=\"file-label\">Upload Image</label>\r\n                            </div>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `komponen`
--

CREATE TABLE `komponen` (
  `id` bigint(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `keterangan` varchar(1000) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komponen`
--

INSERT INTO `komponen` (`id`, `judul`, `keterangan`, `image`, `created_at`) VALUES
(0, 'CSS input file', 'Kode CSS untuk input file style button', '', '2024-05-25 16:33:14'),
(18, 'Preview Image JS', 'Kode untuk menampilkan gambar sebelum post', '1.jpg', '2024-05-25 16:18:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kode`
--
ALTER TABLE `data_kode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komponen`
--
ALTER TABLE `komponen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kode`
--
ALTER TABLE `data_kode`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
