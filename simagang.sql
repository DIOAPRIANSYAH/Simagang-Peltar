-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2024 at 04:40 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simagang4`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_users` bigint(20) UNSIGNED DEFAULT NULL,
  `id_magang` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `agama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_induk` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3',
  `sertifikat_kelulusan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_profile_linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_profile_instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Selesai','Belum Selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum Selesai',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `verification_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `id_users`, `id_magang`, `nama`, `tgl_lahir`, `agama`, `jenis_kelamin`, `nama_sekolah`, `pendidikan`, `jurusan`, `nomor_induk`, `no_hp`, `email`, `password`, `type`, `sertifikat_kelulusan`, `foto`, `cv`, `link_profile_linkedin`, `link_profile_instagram`, `provinsi`, `kabupaten`, `kecamatan`, `desa`, `status`, `created_at`, `updated_at`, `verification_token`, `is_verified`) VALUES
(1, 22, 1, 'Andi Affandi', '2024-06-09', 'Islam', 'Perempuan', 'POLINEMA', 'D4', 'Teknologi Informasi', '4342313323', '0827736761387', 'andi@gmail.com', '$2y$12$RYaI9fqnbFAfaWrXs8hpOuozk18eTkWtFwl2BK3WSyRPsv7/6Bite', '3', 'Andi Affandi_4342313323_sertifikat.pdf', 'Andi Affandi_4342313323_fotoProfil.png', 'Andi Affandi_4342313323_cv.pdf', 'https://.polinema.ac.id/beranda', 'https://siakad.polinema.ac.id/beranda', 'JAWA TIMUR', 'KABUPATEN PROBOLINGGO', 'KRAKSAAN', 'ALASSUMUR KULON', 'Belum Selesai', '2024-06-01 23:39:30', '2024-06-01 23:39:30', NULL, 1),
(2, 22, 1, 'Alfiya Khairunisa', '2024-06-13', 'Khatolik', 'Perempuan', 'POLINEMA', 'S1', 'Manajemen Informatika', '5466466', '0827736761387', 'alfiya@gmail.com', '$2y$12$RYaI9fqnbFAfaWrXs8hpOuozk18eTkWtFwl2BK3WSyRPsv7/6Bite\r\n', '3', 'Alfiya Khairunisa_5466466_sertifikat.pdf', 'Alfiya Khairunisa_5466466_fotoProfil.jpeg', 'Alfiya Khairunisa_5466466_cv.pdf', NULL, 'https://.polinema.ac.id/beranda', 'JAWA BARAT', 'KABUPATEN PURWAKARTA', 'BABAKANCIKAO', 'CIGELAM', 'Belum Selesai', '2024-06-02 02:47:32', '2024-06-02 02:47:32', NULL, 1),
(46, 18, 13, 'sethos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sethos@gmail.com', '$2y$12$RYaI9fqnbFAfaWrXs8hpOuozk18eTkWtFwl2BK3WSyRPsv7/6Bite', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Belum Selesai', '2024-06-15 07:48:02', '2024-06-15 07:48:02', 'HYof0N93Om8GbXTfFmsPfOu5pXLurml0', 1),
(47, 4, 5, 'Kurniawan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kurniawan@gmail.com', '$2y$12$NFAC6GtAkdjcMapdAM/h9Okk7Fb/O0gKlhe4LiLysd4bsbmPlkjH6', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Belum Selesai', '2024-06-18 21:05:18', '2024-06-18 21:06:06', NULL, 1),
(48, 4, 5, 'COBA 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'coba@gmail.com', '$2y$12$WiUykJy3RWqe2YtaFzRtgejZ1/rpNnAfF54NNL7.bZl1xOJ.LyV2a', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Belum Selesai', '2024-06-18 21:20:33', '2024-06-18 21:20:33', 'CEbJbPHkDxZg8GhX7EU8wMLJJab5CJsb', 0),
(49, 4, 5, 'coba1111', '2024-06-10', 'Khatolik', 'Laki-laki', 'Universitas Jember', 'D4', 'Akutansi Manajemen', '122244554', '0862557168793', 'coba1@gmail.com', '$2y$12$RYaI9fqnbFAfaWrXs8hpOuozk18eTkWtFwl2BK3WSyRPsv7/6Bite', '3', 'coba1111_122244554_sertifikat.pdf', 'coba1111_122244554_fotoProfil.jpg', 'coba1111_122244554_cv.pdf', 'https://siakad.polinema.ac.id/beranda', 'https://siakad.polinema.ac.id/beranda', 'JAWA TIMUR', 'KABUPATEN JOMBANG', 'KUDU', 'KEPUHREJO', 'Belum Selesai', '2024-06-19 07:08:45', '2024-06-19 22:02:22', NULL, 1),
(50, 18, 13, 'coba2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'boba2@gmail.com', '$2y$12$a1/tIm1.pPIxP8owkGWTBe/MbB/139ZspfrjvlK5.Bhw0v6WZr8vC', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Belum Selesai', '2024-06-20 02:01:25', '2024-06-20 02:01:25', '9BTVKKclxPjZSmYXRyREhr9pNnGJltBT', 0),
(51, 18, 13, 'Ahmad Dahani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ahmad@gmail.com', '$2y$12$3l07Bpw5LU96N3yBFG.nnO6WcIvT6c7DZyLkxGpzvrypG1wG4eCEG', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Belum Selesai', '2024-06-21 00:15:38', '2024-06-21 00:16:20', NULL, 1),
(61, 22, 1, 'Naruto Uzumaki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'naruti@gmail.com', '$2y$12$YUc1z3wV27xnbe6asmYi5.yrvbeY9ki68Yu0aoGxELBdVR2Uy6Y6y', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Belum Selesai', '2024-06-23 08:42:13', '2024-06-23 08:42:13', '3Lo54QJOAyZGQdNRrlKeUp1xnvkGv0wI', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_users`
--

CREATE TABLE `detail_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_magang` bigint(20) UNSIGNED NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `id_projek` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `judul`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Berapa lama durasi maksimal magang di PT. Bukit Asam Unit Pelabuhan Tarahan??????????', 'Peserta magang di perkenankan mendaftar dengan durasi maksimal paling lama 3 bulan............', '2024-06-16 00:04:22', '2024-06-16 00:18:31'),
(2, 'Apakah menerima pengajuan magang wajib sekolah/kampus (PKL)?', 'Kami sangat terbuka untuk menerima pengajuan magang wajib sekolah/kampus, dengan rangkaian seleksi individual yang sama dengan pengajuan magang reguler.', '2024-06-16 00:04:58', '2024-06-23 09:05:56'),
(3, 'Berapa lama durasi maksimal magang di PT. Bukit Asam Unit Pelabuhan Tarahan?', 'Kami menerima pengajuan kelompok dengan jumlah maksimal 3 orang tiap kelompok yang berasal dari jurusan atau program studi yang sama.', '2024-06-16 00:05:11', '2024-06-23 09:07:09'),
(4, 'Apakah magang di PT. Bukit Asam Unit Pelabuhan Tarahan mendapatkan upah bulanan?', 'Saat ini sistem magang yang berlaku di PT. Bukit Asam Unit Pelabuhan Tarahan adalah Paid Internship, kami selalu mengevaluasi dan memberikan apresiasi kepada siapapun yang telah memberikan kontribusi dan impact kepada PT. Bukit Asam Unit Pelabuhan Tarahan .', '2024-06-23 09:08:46', '2024-06-23 09:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_satker`
--

CREATE TABLE `kegiatan_satker` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_satker` bigint(20) UNSIGNED NOT NULL,
  `judul_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKegiatan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatan_satker`
--

INSERT INTO `kegiatan_satker` (`id`, `id_satker`, `judul_kegiatan`, `deskripsi`, `fotoKegiatan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Eksplorasi Mangrove', 'safafasfafasf', 'jm3W6Jl9NAj7dXkEyLFRyzxaUwiI9iJzUgtlN2OY.png', '2024-05-01 06:45:53', '2024-06-05 05:51:35'),
(2, 1, 'Eksplorasi Mangrove', 'safafasfafasf', '1714571166.jpg', '2024-05-01 06:46:06', '2024-05-01 06:46:06'),
(5, 2, 'Kunjungan Tahunan PTBA', 'DHGTTTTTTHERGG', 'Nn6kgB6uW7DrPIfS77nNc2F6kHb8lE25zRDIe7r8.png', '2024-05-01 08:17:40', '2024-05-01 08:52:21'),
(6, 1, 'Sosialisasi Desa', 'saffasfasffafsfs', '1714577080.png', '2024-05-01 08:24:40', '2024-05-01 08:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `kualifikasi`
--

CREATE TABLE `kualifikasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_satker` bigint(20) UNSIGNED NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perangkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penempatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `durasi` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kompetensi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kualifikasi`
--

INSERT INTO `kualifikasi` (`id`, `id_satker`, `gender`, `pendidikan`, `jurusan`, `perangkat`, `penempatan`, `durasi`, `kompetensi`, `created_at`, `updated_at`) VALUES
(2, 1, 'Laki-laki/Perempuan', 'SMA/SMK/PTN/PTS', 'Akutansi Manajemen', 'Laptop dan Handphone', 'Unit Pelabuhan Tarahan', 'Max 3 Bulan', 'Microsoft Excel & Microsoft Word', '2024-05-01 09:12:12', '2024-06-05 05:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `magang`
--

CREATE TABLE `magang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_projek` bigint(20) UNSIGNED DEFAULT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `surat_rekomendasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proposal` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'Document Submitted',
  `surat_pengantar` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dosen_pembimbing_lapangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dosen_pembimbing_kampus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan_kerja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_berakhir` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `magang`
--

INSERT INTO `magang` (`id`, `id_projek`, `id_users`, `surat_rekomendasi`, `proposal`, `status`, `surat_pengantar`, `dosen_pembimbing_lapangan`, `dosen_pembimbing_kampus`, `satuan_kerja`, `tanggal_mulai`, `tanggal_berakhir`, `created_at`, `updated_at`) VALUES
(1, NULL, 22, 'Bella Jhonshon xxpppp_233314444444_surat_rekomendasi.pdf', '', 'On Review', 'Bella Jhonshon xxpppp_233314444444_surat_pengantar.pdf', 'Agus Sunyoto', 'Lukman Affandi', 'IT & Automation Muda', '2024-05-06', '2024-06-28', '2024-05-29 20:13:31', '2024-06-17 20:34:55'),
(5, NULL, 4, 'ABD Ghafur_32212212_surat_rekomendasi.pdf', 'ABD Ghafur_32212212_Proposal.pdf', 'Rejected', 'ABD Ghafur_32212212_surat_pengantar.pdf', NULL, 'Pramana Yoga Saputra', 'Kelistrikan', '2024-06-03', '2024-06-29', '2021-06-05 02:04:25', '2024-06-20 10:03:37'),
(12, NULL, 2, NULL, NULL, 'Document Submitted', 'Dio Apriansyah_746423123_surat_pengantar.pdf', 'Agus Sunyoto', 'Lukman Affandi', 'Supply Chain Management', '2024-06-10', '2024-06-26', '2024-06-10 06:47:51', '2024-06-12 21:11:44'),
(13, NULL, 18, 'Cloud Retainer_3213324254_surat_rekomendasi.pdf', 'Cloud Retainer_3213324254_Proposal.pdf', 'Accepted', 'Cloud Retainer_3213324254_surat_pengantar.pdf', NULL, 'Lukman Affandi', 'Penunjang Umum', '2024-06-05', '2024-06-21', '2024-06-14 01:30:31', '2024-06-14 01:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_05_18_025712_magang', 1),
(2, '2024_05_18_030456_detail_users', 2),
(3, '2024_06_01_045146_create_anggota_table', 3),
(4, '2024_06_16_063502_create_faqs_table', 4),
(5, '2024_06_16_072544_create_testimonials_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projek`
--

CREATE TABLE `projek` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_magang` bigint(20) UNSIGNED DEFAULT NULL,
  `judul` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_github` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumentasi_pengerjaan1` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumentasi_pengerjaan2` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumentasi_pengerjaan3` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projek`
--

INSERT INTO `projek` (`id`, `id_magang`, `judul`, `jenis`, `status`, `link_github`, `dokumentasi_pengerjaan1`, `dokumentasi_pengerjaan2`, `dokumentasi_pengerjaan3`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Sistem Informasi Pendaftaran Magang Berbasis Web di PT Bukit Asam Unit Pelabuhan Tarahan', 'Pengembangan', 'Pengerjaan', 'https://www.youtube.com/watch?v=YxIiPLVR6NA&list=RDqt7ox1M_XG4&index=9', 'Sistem Informasi Pendaftaran Magang Berbasis Web di PT Bukit Asam Unit Pelabuhan Tarahan__Dokumentasijpg', 'Sistem Informasi Pendaftaran Magang Berbasis Web di PT Bukit Asam Unit Pelabuhan Tarahan__Dokumentasijpg', 'Sistem Informasi Pendaftaran Magang Berbasis Web di PT Bukit Asam Unit Pelabuhan Tarahan__Dokumentasiwebp', '2024-06-05 08:06:19', '2024-06-05 08:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `satker`
--

CREATE TABLE `satker` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_satker` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `satker`
--

INSERT INTO `satker` (`id`, `nama_satker`, `foto`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'CSR (Corporate Social Responsibility)', '5615623_2911786.jpg', 'Mengembangkan dan melaksanakan program-program sosial yang bertujuan meningkatkan kesejahteraan masyarakat sekitar dan menjaga hubungan baik dengan komunitas lokal. Tugas mereka meliputi kegiatan filantropi seperti pembangunan fasilitas umum.', '2024-05-01 02:53:54', '2024-06-17 20:48:40'),
(2, 'Humas', '', 'Katalis komunikasi antara perusahaan dan publik, menyusun serta menyebarkan informasi resmi perusahaan, mengelola hubungan dengan media massa, dan menangani komunikasi internal serta eksternal. Mereka juga berperan dalam menjaga reputasi perusahaan.', '2024-05-01 01:54:23', '2024-05-25 07:24:25'),
(4, 'IT & Automation Muda', '', 'Penggunaan instruksi untuk menciptakan proses berulang yang menggantikan pekerjaan manual profesional TI di pusat data dan penerapan cloud serta pengamanan cyber. Alat, kerangka kerja, dan peralatan perangkat lunak otomasi menjalankan tugas dengan intervensi administrator minimal.', '2024-05-25 06:59:08', '2024-05-25 07:25:12'),
(5, 'Penunjang Operasi', '', 'Memastikan kelancaran operasional penambangan dengan mengelola peralatan dan kendaraan operasional, menyediakan bahan bakar dan pelumas, serta mengkoordinasikan pemeliharaan dan perbaikan alat berat. Mereka juga menyediakan dukungan logistik untuk memastikan operasi penambangan berjalan lancar dan efisien setiap hari.', '2024-05-25 07:03:32', '2024-05-25 07:03:32'),
(6, 'Penunjang Umum', '', 'Mendukung operasional perusahaan secara keseluruhan dengan mengelola administrasi dan dokumentasi, menyediakan layanan kebersihan dan keamanan, serta menyediakan fasilitas pendukung seperti kantin dan transportasi.', '2024-05-25 07:05:01', '2024-05-25 07:19:51'),
(7, 'Kelistrikan', '', 'Menyediaan dan memeliharaan listrik di area operasional perusahaan, memastikan pasokan listrik yang stabil dan aman, serta melakukan perawatan dan perbaikan peralatan listrik. Mereka juga menyusun rencana kebutuhan listrik untuk mendukung operasi perusahaan secara optimal.', '2024-05-25 07:05:24', '2024-05-25 07:05:46'),
(8, 'Laboratorium', '', 'Mengujian dan meganalisis kualitas batu bara yang dihasilkan, melakukan analisis kimia dan fisika, serta menyediakan data dan laporan hasil uji untuk keperluan operasional dan pemasaran. Mereka memastikan bahwa standar kualitas produk sesuai dengan regulasi dan kebutuhan pasar.', '2024-05-25 07:06:19', '2024-05-25 07:06:19'),
(9, 'Supply Chain Management', '', 'Mengelola rantai pasok perusahaan dengan mengkoordinasikan pembelian bahan baku dan peralatan, pengiriman, dan penyimpanan barang. Mereka memastikan ketersediaan barang yang diperlukan untuk operasi serta mengoptimalkan biaya dan efisiensi dalam pengelolaan rantai pasok.', '2024-05-25 07:06:48', '2024-05-25 07:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `rate` tinyint(4) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `id_users`, `rate`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 22, 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sit suscipit consectetur autem perspiciatis, expedita odio rerum aliquid eius ex repellendus! Aperiam, voluptates! Exercitationem, animi. Saepe nam assumenda quasi nostrum?', '2024-06-16 00:57:47', '2024-06-16 00:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_detail_users` bigint(20) UNSIGNED DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `agama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_induk` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sertifikat_kelulusan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tidak Aktif',
  `cv` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_profile_linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_profile_instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provinsi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_detail_users`, `google_id`, `github_id`, `facebook_id`, `linkedin_id`, `tgl_lahir`, `agama`, `jenis_kelamin`, `nama_sekolah`, `pendidikan`, `jurusan`, `nomor_induk`, `no_hp`, `sertifikat_kelulusan`, `foto`, `status`, `cv`, `link_profile_linkedin`, `link_profile_instagram`, `name`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`, `provinsi`, `kabupaten`, `kecamatan`, `desa`) VALUES
(1, NULL, NULL, NULL, '', NULL, '2024-06-17', 'Islam', 'Laki-laki', 'Universitas Jember', 'D3', 'Manajemen Informatika', '2131750005', '0862557676', 'Dio Apriansyah_2131750005_sertifikat.pdf', 'Dio Apriansyah_2131750005_fotoProfil.jpg', 'Aktif', 'Dio Apriansyah_2131750005_cv.pdf', 'https://siakad.polinema.ac.id/beranda', 'https://siakad.polinema.ac.id/beranda', 'Reyhan Farahardi', 'reyhan@gmail.com', NULL, '$2y$12$lPw5PSOPFaLGX0hJtiwcWONAyz1MNDIowFWKOSHatlx8Qe7Gv8kLO', 1, 'xWckRD3XY5vnarbWGWbJ0t5gEX9eELUdUZiahk7KQVKNH57zCUzCSPMlu3bM', '2024-03-28 00:33:52', '2024-06-05 06:48:54', 'DI YOGYAKARTA', 'KABUPATEN SLEMAN', 'PRAMBANAN', 'WUKIR HARJO'),
(2, NULL, NULL, NULL, '1671059610298751', NULL, '2024-06-10', 'Islam', 'Laki-laki', 'Universitas Lampung', 'S1', 'Teknik Kimia', '746423123', '0827736761387', 'Dio Apriansyah_746423123_sertifikat.pdf', 'Dio Apriansyah_746423123_fotoProfil.jpeg', 'Aktif', 'Dio Apriansyah_746423123_cv.pdf', 'https://siakad.polinema.ac.id/beranda', 'https://siakad.polinema.ac.id/beranda', 'Dio Apriansyah', 'dioapriansyah47@gmail.com', NULL, '$2y$12$o5pvSSw1fUaQ2/UMzEdGjO0uFHQoaDBlwCIv3xtKjYTo2.wRoGfw.', 2, NULL, '2024-03-28 00:34:13', '2024-06-12 20:58:27', 'JAWA TIMUR', 'KABUPATEN SIDOARJO', 'WARU', 'KUREKSARI'),
(3, NULL, NULL, NULL, '', NULL, '2024-06-12', 'Islam', 'Laki-laki', 'Politeknik Negeri Madura', 'D3', 'Manajemen Informatika', '42314524', '0827736761387', 'Annas_42314524_sertifikat.pdf', 'Annas_42314524_fotoProfil.jpg', 'Tidak Aktif', 'Annas_42314524_cv.pdf', 'https://siakad.polinema.ac.id/beranda', 'https://siakad.polinema.ac.id/beranda', 'Annas Aminulloh T.H', 'annas@gmail.com', NULL, '$2y$12$4U9v533LvS8ntgtOSrRe6Ov3qXXEVlcTOpgk6m/LrXzQ7cnwyGyG2', 0, NULL, '2024-03-28 00:34:49', '2024-06-05 06:50:01', 'JAWA TIMUR', 'KABUPATEN SAMPANG', 'TORJUN', 'PATAPAN'),
(4, NULL, NULL, NULL, '', NULL, '2024-06-10', 'Islam', 'Laki-laki', 'Universitas Brawijaya', 'D3', 'Manajemen Informatika', '32212212', '0827736761387', 'ABD Ghafur_32212212_sertifikat.pdf', 'ABD Ghafur_32212212_fotoProfil.jpeg', 'Tidak Aktif', 'ABD Ghafur_32212212_cv.pdf', 'https://siakad.polinema.ac.id/beranda', 'https://.polinema.ac.id/beranda', 'ABD Ghafur', 'ghafur@gmail.com', NULL, '$2y$12$WoY0sBKBo1aUdKr7D6zjqel4o.g/zUtDZAEqB0.k14SzyWsQR/jpe', 0, NULL, '2024-03-28 00:59:39', '2024-06-09 07:15:25', 'SULAWESI TENGAH', 'KABUPATEN PARIGI MOUTONG', 'PARIGI TENGAH', 'PELAWA'),
(5, NULL, NULL, NULL, '', NULL, '2024-06-04', 'Budha', 'Laki-laki', 'Universitas Jember', 'S1', 'Teknik Pertambangan', '98237736746', '0827736761387', NULL, NULL, 'Aktif', NULL, 'https://siakad.polinema.ac.id/beranda', 'https://siakad.polinema.ac.id/beranda', 'Naruto Uzumaki', 'naruto@gmail.com', NULL, '$2y$12$hkwy71FsEuHijHOTjHj.zugwpPouGfrow5XHWc71ddwELIN60x2sy', 0, NULL, '2024-03-28 01:04:33', '2024-06-09 07:16:01', 'BANTEN', 'KABUPATEN SERANG', 'KRAGILAN', 'PEMATANG'),
(6, NULL, NULL, NULL, '', NULL, '2024-05-28', 'Islam', 'Laki-laki', 'Universitas Brawijaya', 'D4', 'Administrasi Bisnis', '455644323', '0827736761387', NULL, 'Nadhif Adyatma Zain_455644323_fotoProfil.jpg', 'Aktif', NULL, 'https://siakad.polinema.ac.id/beranda', 'https://siakad.polinema.ac.id/beranda', 'Nadhif Adyatma Zain', 'nadif@gmail.com', NULL, '$2y$12$lUA1JgiwMjQSiPaSuPu3tea6/lFwbn3BEor/DA4nlsU/eUExIZYhC', 0, NULL, '2024-03-28 01:22:35', '2024-06-05 06:54:21', 'JAWA TENGAH', 'KABUPATEN KARANGANYAR', 'GONDANGREJO', 'TUBAN'),
(8, NULL, NULL, NULL, '', NULL, '2024-05-26', 'Kristen', 'Perempuan', 'Universitas Indonesia', 'S1', 'Teknik Geologi', '112133243', '0827736761387', NULL, NULL, 'Tidak Aktif', NULL, 'https://siakad.polinema.ac.id/beranda', 'https://siakad.polinema.ac.id/beranda', 'Bella Cantika Putri', 'bella@gmail.com', NULL, '$2y$12$MjRbdoRcvW1XebPMAJUQUu4DWbufH9AqOfgFRUtYReFba.txSYPOu', 0, NULL, '2024-04-04 00:12:35', '2024-06-05 06:55:56', 'JAWA BARAT', 'KABUPATEN BEKASI', 'TAMBUN UTARA', 'SRIMUKTI'),
(9, NULL, NULL, NULL, '', NULL, '2024-06-12', 'Khatolik', 'Perempuan', 'Universitas Lampung', 'S1', 'Manajemen Syari\'ah', '152763543', '0827736761387', NULL, NULL, 'Aktif', NULL, 'https://siakad.polinema.ac.id/beranda', 'https://siakad.polinema.ac.id/beranda', 'Rika Annabela', 'rika@gmail.com', NULL, '$2y$12$SaV4sd5TmWEkh1RatKZPGOyoOB3GX58Yexm.jyyXJ77ZNz3d8KXo2', 0, NULL, '2024-04-15 04:43:52', '2024-06-09 07:15:04', 'BENGKULU', 'KABUPATEN BENGKULU UTARA', 'TANJUNG AGUNG PALIK', 'SAWANG LEBAR'),
(11, NULL, NULL, NULL, '', NULL, '2024-06-26', NULL, 'Laki-laki', 'Politeknik Negeri Malang', 'D4', 'Teknik Kimia Industri', '231212234', '0827736761387', NULL, NULL, 'Aktif', NULL, 'https://siakad.polinema.ac.id/beranda', 'https://siakad.polinema.ac.id/beranda', 'Kamisato Ayato', 'ayato@gmail.com', NULL, '$2y$12$Jgl1KS.61gxWztxyf2iMyOnH7ZVd1.fC1a3j49oyqr/nCESeiOd5y', 0, NULL, '2024-05-23 18:39:51', '2024-06-05 06:59:40', 'JAWA TIMUR', 'KABUPATEN JOMBANG', 'TEMBELANG', 'GABUSBANARAN'),
(14, NULL, NULL, NULL, '', NULL, NULL, 'Kristen', NULL, 'POLINEMA', 'D3', 'Manajemen Informatika', '12331313', '0862557676', '1716520327_sertifikat.pdf', '1716520327.jpg', 'Tidak Aktif', '1716520327_cv.pdf', NULL, NULL, 'agus', 'agus@gmail.com', NULL, '$2y$12$OAovF9N13tOZ75xR.Nlei.DPQAS/Wtgpon0PIbQNkXiFMgFg.WEP.', 0, NULL, '2024-05-23 20:12:07', '2024-05-23 20:12:07', NULL, NULL, NULL, NULL),
(16, NULL, NULL, NULL, '', NULL, '2024-06-21', 'Islam', 'Perempuan', 'Universitas Jember', 'S1', 'Teknik Kimia Industri', '126176226', '0827736761387', NULL, NULL, 'Aktif', NULL, 'https://siakad.polinema.ac.id/beranda', 'https://siakad.polinema.ac.id/beranda', 'Kokomi', 'kokomi@gmail.com', NULL, '$2y$12$VGUCVPgrGWS2g.8G6OVXueUzbyTnNFz/2aYgfQeYxjCyd3zeVOHYS', 0, NULL, '2024-05-26 05:22:30', '2024-06-09 07:17:03', 'JAWA TIMUR', 'KABUPATEN MALANG', 'DAMPIT', 'BUMIREJO'),
(17, NULL, NULL, NULL, '', NULL, '2024-05-08', 'Khatolik', 'Laki-laki', NULL, NULL, NULL, '42314524', '0827736761387', NULL, 'Neuvillete_42314524_fotoProfil.jpeg', 'Tidak Aktif', NULL, NULL, NULL, 'Neuvillete', 'neuviilete@gmail.com', NULL, '$2y$12$GXLEcLdYiKklvFp3Cbrilu9J6ohohGQe6tOT5QBbiNB1mfV8I1GCC', 0, NULL, '2024-05-26 05:37:17', '2024-05-26 05:37:17', NULL, NULL, NULL, NULL),
(18, NULL, NULL, NULL, '', NULL, '2024-05-15', 'Kristen', 'Perempuan', 'POLINEMA', 'D3', 'Teknologi Informasi', '3213324254', '0862557168793', 'Cloud Retainer_3213324254_sertifikat.pdf', 'Cloud Retainer_3213324254_fotoProfil.jpg', 'Aktif', 'Cloud Retainer_3213324254_cv.pdf', 'https://siakad.polinema.ac.id/beranda', 'https://siakad.polinema.ac.id/beranda', 'Cloud Retainer', 'xianyun@gmail.com', NULL, '$2y$12$KOgcL7eUndEfbllRh8HF3.Nr2TsU1kiPQLHHW65Wzn8euciHvZnPC', 0, NULL, '2024-05-28 01:49:06', '2024-06-21 20:55:15', 'JAMBI', 'KABUPATEN TANJUNG JABUNG TIMUR', 'MUARA SABAK BARAT', 'NIBUNG PUTIH'),
(19, NULL, NULL, NULL, '', NULL, '2024-05-31', 'on', 'Laki-laki', 'POLINEMA', 'on', 'Akutansi Manajemen', '5361351434', '0827736761387', 'Wanderer_5361351434_sertifikat.pdf', 'Wanderer_5361351434_fotoProfil.jpeg', 'Tidak Aktif', 'Wanderer_5361351434_cv.pdf', NULL, NULL, 'Wanderer', 'wanderer@gmail.com', NULL, '$2y$12$zyI0Mf62qR1iAtvkk1.EvOKAHTMyeolaC3f.Y53N9baNxOl33gzyG', 0, NULL, '2024-05-28 02:05:22', '2024-05-28 02:05:22', 'JAMBI', NULL, 'MUARA TEMBESI', 'SUKARAMAI'),
(21, NULL, NULL, NULL, '', NULL, '2024-06-01', 'Hindu', 'Laki-laki', 'POLINEMA', 'S1', 'Teknologi Informasi', '5361351434', '0827736761387', 'Reza Kurnia_5361351434_sertifikat.pdf', 'Reza Kurnia_5361351434_fotoProfil.png', 'Tidak Aktif', 'Reza Kurnia_5361351434_cv.pdf', 'https://siakad.polinema.ac.id/beranda', 'https://siakad.polinema.ac.id/beranda', 'Reza Kurnia', 'reza@gmail.com', NULL, '$2y$12$01vKutECdfjrQeb9ICvj8.0bO2KcpnqN3ru15ac9DzrEMrZbeOX3K', 0, NULL, '2024-05-28 05:53:23', '2024-05-28 05:53:23', 'SUMATERA BARAT', NULL, 'TIGO LURAH', 'TANJUANG BALIK SUMISO'),
(22, NULL, NULL, NULL, '', NULL, '2024-06-11', 'Islam', 'Laki-laki', 'Universitas Brawijaya', 'SMA/SMK', 'Administrasi Bisnis', '233314444444', '08277344444444444', 'Bella Jhonshon_23331351434_sertifikat.pdf', 'Bella Jhonshon_23331351434_fotoProfil.jpeg', 'Tidak Aktif', 'Bella Jhonshon_23331351434_cv.pdf', 'https://.polinema.ac.id/beranda', 'https://.polinema.ac.id/beranda', 'Bella Jhonshon xxpppp aa', 'jean@gmail.com', NULL, '$2y$12$p52kjdW/GZQiXScWeoO4qOugjMISUAnBKEHAlJ8LI0RQ71VW0AeWu', 0, NULL, '2024-05-28 06:09:22', '2024-06-09 07:18:13', 'JAWA BARAT', 'KABUPATEN PURWAKARTA', 'BOJONG', 'SINDANGPANON'),
(23, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tidak Aktif', NULL, NULL, NULL, 'Alhaitham', 'alhaitham@gmail.com', NULL, '$2y$12$XupCvta9JBjQJmt5IzES9u8PXpAbPznz0btxo8v5U1KUIjdwyr9/e', 0, NULL, '2024-06-05 19:00:03', '2024-06-05 19:00:03', NULL, NULL, NULL, NULL),
(24, NULL, '100780071595688108408', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tidak Aktif', NULL, NULL, NULL, 'Fikri irmansyah (fikmen)', 'mochvitra@gmail.com', NULL, '$2y$12$L4jp1w20WkIMEy8RMp9U..e3zdjFuEeF2GuhwrS9Nw8KW8KHmS7H.', 0, NULL, '2024-06-11 06:59:36', '2024-06-11 06:59:36', NULL, NULL, NULL, NULL),
(30, NULL, '106716464334500378468', '160445602', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tidak Aktif', NULL, NULL, NULL, 'Squid-IO', 'lordkings481@gmail.com', NULL, '$2y$12$4yvaXebIbiCBWYZILlk0x.gsS8wLC7zzUIBbMKtnvp7U7noGMLx66', 0, NULL, '2024-06-12 19:48:46', '2024-06-12 19:51:40', NULL, NULL, NULL, NULL),
(31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tidak Aktif', NULL, NULL, NULL, 'Laras', 'laras@gmail.com', NULL, '$2y$12$nvtX4sG4qItCmdYyEF.XkO7zKzVGeztSH5OY2MtDeGKCkGiaGSbT.', 0, NULL, '2024-06-21 19:58:54', '2024-06-21 19:58:54', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `anggota_email_unique` (`email`),
  ADD KEY `anggota_id_users_foreign` (`id_users`),
  ADD KEY `fk_id_magang` (`id_magang`);

--
-- Indexes for table `detail_users`
--
ALTER TABLE `detail_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_users_id_magang_foreign` (`id_magang`),
  ADD KEY `detail_users_id_users_foreign` (`id_users`),
  ADD KEY `detail_users_id_projek_foreign` (`id_projek`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan_satker`
--
ALTER TABLE `kegiatan_satker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kegiatan_satker_id_satker_foreign` (`id_satker`);

--
-- Indexes for table `kualifikasi`
--
ALTER TABLE `kualifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kualifikasi_id_satker_foreign` (`id_satker`);

--
-- Indexes for table `magang`
--
ALTER TABLE `magang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `magang_id_projek_foreign` (`id_projek`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projek`
--
ALTER TABLE `projek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satker`
--
ALTER TABLE `satker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonials_id_users_foreign` (`id_users`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_detail_users` (`id_detail_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `detail_users`
--
ALTER TABLE `detail_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kegiatan_satker`
--
ALTER TABLE `kegiatan_satker`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kualifikasi`
--
ALTER TABLE `kualifikasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `magang`
--
ALTER TABLE `magang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projek`
--
ALTER TABLE `projek`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `satker`
--
ALTER TABLE `satker`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `fk_id_magang` FOREIGN KEY (`id_magang`) REFERENCES `magang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_users`
--
ALTER TABLE `detail_users`
  ADD CONSTRAINT `detail_users_id_magang_foreign` FOREIGN KEY (`id_magang`) REFERENCES `magang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_users_id_projek_foreign` FOREIGN KEY (`id_projek`) REFERENCES `projek` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_users_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kegiatan_satker`
--
ALTER TABLE `kegiatan_satker`
  ADD CONSTRAINT `kegiatan_satker_id_satker_foreign` FOREIGN KEY (`id_satker`) REFERENCES `satker` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kualifikasi`
--
ALTER TABLE `kualifikasi`
  ADD CONSTRAINT `kualifikasi_id_satker_foreign` FOREIGN KEY (`id_satker`) REFERENCES `satker` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `magang`
--
ALTER TABLE `magang`
  ADD CONSTRAINT `magang_id_projek_foreign` FOREIGN KEY (`id_projek`) REFERENCES `projek` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_detail_users`) REFERENCES `detail_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
