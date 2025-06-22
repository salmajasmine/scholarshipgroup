CREATE DATABASE `prestigo` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2025 at 10:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prestigo`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(7, 'user', '1111', 'user', '2025-06-20 12:54:59'),
(8, 'admin', '2222', 'admin', '2025-06-20 12:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `api_logs`
--

CREATE TABLE `api_logs` (
  `id` int(11) NOT NULL,
  `api_name` varchar(50) NOT NULL COMMENT 'Twitter/NodeJS/etc',
  `endpoint` varchar(255) NOT NULL,
  `parameters` text DEFAULT NULL,
  `response_code` int(11) DEFAULT NULL,
  `response_time` float DEFAULT NULL COMMENT 'Dalam detik',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('Male','Female','Other','Prefer not to say') DEFAULT NULL,
  `education_level` enum('High School','Undergraduate','Graduate','Vocational') NOT NULL,
  `institution` varchar(100) DEFAULT NULL,
  `gpa` decimal(3,2) NOT NULL,
  `essay` text NOT NULL,
  `reference_name` varchar(100) DEFAULT NULL,
  `reference_contact` varchar(100) DEFAULT NULL,
  `document_path` varchar(255) NOT NULL,
  `twitter_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`twitter_data`)),
  `similarity_score` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `full_name`, `email`, `phone`, `address`, `dob`, `gender`, `education_level`, `institution`, `gpa`, `essay`, `reference_name`, `reference_contact`, `document_path`, `twitter_data`, `similarity_score`, `created_at`) VALUES
(15, 'aaa', 'palemfolope@gmail.com', '34343125', 'aa', '2025-06-22', 'Male', 'Undergraduate', '112', 2.00, 'adbadb', 'awfsaf', 'aaa', 'uploads/Modul 06_Reina Shafira Gayatri_245150407141004.pdf', NULL, NULL, '2025-06-21 04:08:49'),
(16, 'aa', 'fkdakfaf@gmail.com', '0w15919uw51', 'asmvsavajv', '2025-06-09', 'Female', 'Undergraduate', '2', 2.00, '2', '2', '2', 'uploads/Modul 05_Reina Shafira Gayatri_245150407141004.pdf', NULL, NULL, '2025-06-21 04:22:50'),
(17, 'amboy', 'anabda@gmail.com', '2431414', 'aaa', '2025-06-19', 'Female', 'High School', 'aaa', 3.00, 'aaa', 'aa', 'aaa', 'uploads/Modul 05_Reina Shafira Gayatri_245150407141004.pdf', NULL, NULL, '2025-06-21 04:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beasiswa`
--

INSERT INTO `beasiswa` (`id`, `judul`, `deskripsi`, `deadline`, `link`) VALUES
(1, 'Beasiswa Djarum Plus untuk Mahasiswa S1 dan D4', 'n ncd', '2025-07-03', 'https://register.djarumbeasiswaplus.org/'),
(2, 'Beasiswa S2 Double Degree dari Kemenag RI', 'Lewat beasiswa S2 double degree ini, kamu bisa meraih dua gelar akademis dalam satu periode studi. Kamu akan kuliah di perguruan tinggi di Indonesia dan di luar negeri, sehingga bisa merasakan langsung pengalaman belajar internasional. Selain menambah ilmu, kamu juga akan memperluas jaringan pertemanan, memperkaya wawasan budaya, dan tentu saja meningkatkan kemampuan bahasa asingmu.', '2025-06-27', 'https://beasiswa.kemenag.go.id/pendaftaran-penjadwalan/ '),
(3, 'Beasiswa Unggulan Kemdikbud', 'Beasiswa penuh bagi mahasiswa berprestasi.', '2025-08-01', 'https://beasiswa.kemdikbud.go.id'),
(4, 'Beasiswa Gondal Gandil', 'hai wak', '2025-06-20', ''),
(5, 'Beasiswa Tes', 'testseresettset', '2025-06-28', ''),
(6, 'Coba', 'ababab', '2025-06-28', ''),
(7, 'Cobaaaa ascac', 'tess', '2025-06-22', ''),
(8, 'Beasiswa dassafiasfnasf', 'ansafsaf', '2025-06-22', ''),
(9, 'cscassc', 'ascacaca', '2025-06-19', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `api_logs`
--
ALTER TABLE `api_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_api_name` (`api_name`),
  ADD KEY `idx_created_at` (`created_at`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_email` (`email`);

--
-- Indexes for table `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `api_logs`
--
ALTER TABLE `api_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
