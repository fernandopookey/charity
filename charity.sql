-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Okt 2024 pada 19.21
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `charity`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `abouts`
--

CREATE TABLE `abouts` (
  `id` int(2) NOT NULL,
  `title` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `description` text NOT NULL,
  `logo` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `email`, `phone`, `address`, `description`, `logo`, `created_at`, `updated_at`) VALUES
(2, 'Yayasan HMI', 'hmi@gmail.com', '085151808015', 'Jl. Semarang Raya', 'Kami adalah yayasan HMI', 'assets/about/EFnbj2CuWluUq6FYHWpCITtK0s2TwVDYBSIOOQ5I.png', '2024-10-22 16:41:53', '2024-10-25 08:36:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('nandopookey@gmail.com|127.0.0.1', 'i:1;', 1728750134),
('nandopookey@gmail.com|127.0.0.1:timer', 'i:1728750134;', 1728750134);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `causes`
--

CREATE TABLE `causes` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `raised` int(20) DEFAULT NULL,
  `goal` int(20) NOT NULL,
  `photos` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `causes`
--

INSERT INTO `causes` (`id`, `title`, `raised`, `goal`, `photos`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Bantu Mbah Saiful Berjuang', NULL, 10000000, NULL, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2024-10-13 10:44:56', '2024-10-14 09:14:49'),
(2, '6 Tahun Nahda Berjuang Lawan Cerebral Palsy', NULL, 17000000, NULL, 'Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2024-10-13 12:37:38', '2024-10-14 09:14:23'),
(4, 'Sembako Habis, 80 Anak Yatim Terancam Tdk Makan', NULL, 656765, NULL, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2024-10-14 08:33:12', '2024-10-14 09:13:43'),
(5, 'Kanker Mata! Tolong Anak Ojol Butuh Operasi', NULL, 54654, NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2024-10-14 08:37:07', '2024-10-14 09:13:08'),
(8, 'SEDEKAH JUMAT: Renovasi Sekolah Nyaris Roboh!', NULL, 13000000, NULL, 'ontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '2024-10-14 09:06:06', '2024-10-14 09:06:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cause_images`
--

CREATE TABLE `cause_images` (
  `id` int(11) NOT NULL,
  `cause_id` int(10) NOT NULL,
  `image` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cause_images`
--

INSERT INTO `cause_images` (`id`, `cause_id`, `image`, `created_at`, `updated_at`) VALUES
(6, 5, 'uploads/products/0-1728993993.png', '2024-10-15 19:06:33', '2024-10-15 19:06:33'),
(20, 4, 'uploads/products/0-1729100264.jpg', '2024-10-17 00:37:44', '2024-10-17 00:37:44'),
(32, 2, 'uploads/products/0-1729757041.png', '2024-10-24 15:04:01', '2024-10-24 15:04:01'),
(33, 2, 'uploads/products/1-1729757041.png', '2024-10-24 15:04:01', '2024-10-24 15:04:01'),
(34, 8, 'uploads/products/0-1729757062.jpeg', '2024-10-24 15:04:22', '2024-10-24 15:04:22'),
(35, 8, 'uploads/products/1-1729757062.jpeg', '2024-10-24 15:04:22', '2024-10-24 15:04:22'),
(36, 1, 'uploads/products/0-1729757101.png', '2024-10-24 15:05:01', '2024-10-24 15:05:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contacts`
--

CREATE TABLE `contacts` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `subject` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `subject`, `created_at`, `updated_at`) VALUES
(1, 'Joko Widodo', 'joko@gmail.com', 'lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem', 'Bantuan', '2024-10-23 16:36:25', '2024-10-23 16:36:25'),
(2, 'frege', 'grgre@gmail.com', 'hthrtjrtjffahfsjtjarhar', 'htrh', '2024-10-23 16:37:18', '2024-10-23 16:37:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `footer_contents`
--

CREATE TABLE `footer_contents` (
  `id` int(1) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `description` text NOT NULL,
  `logo` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `footer_contents`
--

INSERT INTO `footer_contents` (`id`, `phone_number`, `email`, `address`, `description`, `logo`, `created_at`, `updated_at`) VALUES
(2, '085254143531', 'nandopookey@gmail.com', 'Jl. Margosari 2, Kota Salatiga, Jawa Tengah', 'Yayasan Yayasan Yayasan Yayasan Yayasan Yayasan Yayasan Yayasan Yayasan Yayasan Yayasan Yayasan Yayasan Yayasan.', 'assets/footer-content/fWoujJdYGBP3oeYO7tC4rdwSggIA5uDuAjlQVKGK.png', '2024-10-20 17:20:55', '2024-10-20 11:57:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galleries`
--

CREATE TABLE `galleries` (
  `id` int(5) NOT NULL,
  `title` varchar(250) NOT NULL,
  `image` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Gallery 1', 'assets/gallery/eq61hzWFGxc03mdRjnsMhJaTG1jzQN1BSnV8Gffi.jpg', '2024-10-24 02:57:15', '2024-10-24 02:57:15'),
(3, 'Image 3 Edit', 'assets/gallery/IiuSSkOhVIOTaM9xyNTb54PIaAVvAMfQ4OBKRv0w.jpg', '2024-10-24 02:57:37', '2024-10-24 03:00:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `help_reasons`
--

CREATE TABLE `help_reasons` (
  `id` int(2) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `image` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `help_reasons`
--

INSERT INTO `help_reasons` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(12, 'Mewujudkan Rasa Kemanusiaan dan Kepedulian Sosial', 'Bantuan kepada panti asuhan mencerminkan nilai-nilai kemanusiaan yang luhur. Dengan berpartisipasi dalam kegiatan sosial ini, kita menunjukkan kepedulian terhadap sesama yang membutuhkan, terutama anak-anak yang kehilangan keluarga dan dukungan sosial mereka.', 'assets/help-reason/vkNFywDmilDjjIpSMh8QNNvhgX5osnBO0KhAf4Yt.jpg', '2024-10-16 07:52:53', '2024-10-16 11:02:06'),
(13, 'Menanamkan Nilai-Nilai Empati dan Kebersamaan', 'Membantu panti asuhan mengajarkan kita untuk lebih empati dan peduli terhadap orang lain. Ini juga memperkuat rasa kebersamaan dalam masyarakat, karena dengan saling membantu, kita dapat menciptakan lingkungan yang harmonis dan saling mendukung.', 'assets/help-reason/UPnE5STxgSKyErYbMZaENjJvAyJX2UJd8RVuK4zq.jpg', '2024-10-16 07:53:20', '2024-10-16 11:02:27'),
(15, 'Meningkatkan Kualitas Hidup Anak-Anak Kurang Beruntung', 'Membantu yayasan panti asuhan adalah salah satu cara untuk memberikan kesempatan kepada anak-anak yatim piatu atau kurang beruntung untuk memiliki masa depan yang lebih baik. Dengan memberikan dukungan finansial, pendidikan, dan moral, kita membantu mereka tumbuh dalam lingkungan yang lebih positif dan sehat.', 'assets/help-reason/V1E3TnxcIeyM4HlyFOJC0l6wpsKxNc7emUjTyxv0.jpg', '2024-10-16 11:01:33', '2024-10-16 11:01:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `home_videos`
--

CREATE TABLE `home_videos` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `video` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `home_videos`
--

INSERT INTO `home_videos` (`id`, `title`, `description`, `video`, `created_at`, `updated_at`) VALUES
(1, 'Test abangkue', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', 'home-video/I8H4sgZrwklVZbq8ZNaybkgmMvQLAR1PVBCmGfvA.mp4', '2024-10-17 09:02:56', '2024-10-17 02:23:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `media_socials`
--

CREATE TABLE `media_socials` (
  `id` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `link` varchar(250) NOT NULL,
  `icon` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `media_socials`
--

INSERT INTO `media_socials` (`id`, `title`, `link`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Instagrammer', 'https://www.instagram.com/', 'assets/media-socials/2fmcsWMya8MqFKzVPM329PGtHLpxPYSUZwc512ne.png', '2024-10-20 09:47:07', '2024-10-20 09:55:58'),
(2, 'Facebook', 'https://www.facebook.com/', 'assets/media-socials/ExEUp9w8NvKQWKO9D07f0A2KdswqHF9VrqkCDwWA.png', '2024-10-20 09:47:34', '2024-10-20 09:47:34'),
(3, 'Twitter', 'https://x.com', 'assets/media-socials/NXyL6MOU385t7x56zddMARdNdDa6i5eyaYjglKWz.png', '2024-10-20 09:48:02', '2024-10-20 09:48:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_12_112145_create_google_id', 2),
(5, '2024_10_17_031631_create_payments_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `navbar_contents`
--

CREATE TABLE `navbar_contents` (
  `id` int(2) NOT NULL,
  `phone_number` varchar(250) NOT NULL,
  `email` varchar(30) NOT NULL,
  `logo` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `navbar_contents`
--

INSERT INTO `navbar_contents` (`id`, `phone_number`, `email`, `logo`, `created_at`, `updated_at`) VALUES
(1, '085254143531', 'nandopookey@gmail.com', 'navbar-content/Bb5V9mrvU1k8A3L4BEimwUIMTXeJ8F5sQHgxzz6D.png', '0000-00-00 00:00:00', '2024-10-20 08:33:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `checkout_link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cause_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `status`, `price`, `item_name`, `customer_name`, `customer_email`, `checkout_link`, `created_at`, `updated_at`, `cause_id`) VALUES
(10, '9e6fa5d6-b08c-4b06-9645-f43b77699193', 'capture', 150000, 'Sembako Habis, 80 Anak Yatim Terancam Tdk Makan', 'Anonymous', 'Anonymous', 'https://app.sandbox.midtrans.com/snap/v4/redirection/1adbc764-3639-46ec-9956-698354b0a8b2', '2024-10-19 00:50:03', '2024-10-19 05:21:01', 4),
(11, 'a50f75ce-714a-41a7-9360-1e49b62b4ed0', 'pending', 245555, '6 Tahun Nahda Berjuang Lawan Cerebral Palsy', 'Nando Pookey', 'nandopookey@gmail.com', 'https://app.sandbox.midtrans.com/snap/v4/redirection/f8c16f8c-dea3-48d5-878a-aad76bfc8d71', '2024-10-19 03:12:43', '2024-10-19 03:12:43', 2),
(13, 'd69a6b47-e547-45b3-a0a1-e8c8aa321486', 'capture', 20000, 'SEDEKAH JUMAT: Renovasi Sekolah Nyaris Roboh!', 'Nando Pookey', 'nandopookey@gmail.com', 'https://app.sandbox.midtrans.com/snap/v4/redirection/1f10d635-58df-420c-98aa-977a220af670', '2024-10-19 03:23:12', '2024-10-19 05:19:51', 8),
(14, 'ee5e71b5-1d5a-4781-93bb-d3d96035efa2', 'pending', 20000, 'SEDEKAH JUMAT: Renovasi Sekolah Nyaris Roboh!', 'Nando Pookey', 'nandopookey@gmail.com', 'https://app.sandbox.midtrans.com/snap/v4/redirection/b949d52f-d387-476a-89f8-21a9993f1830', '2024-10-19 03:27:13', '2024-10-19 03:27:13', 8),
(22, '08c70ac0-b2f4-45db-8154-b28011187ac0', 'pending', 30000, 'Sembako Habis, 80 Anak Yatim Terancam Tdk Makan', 'Anonymous', 'Anonymous', 'https://app.sandbox.midtrans.com/snap/v4/redirection/f70a1c0f-c5a1-4061-857a-23e5d14cea3f', '2024-10-19 11:03:14', '2024-10-19 11:03:14', 4),
(23, 'd92c145e-f2ac-41b9-870d-6bef12b4ce05', 'pending', 10000, 'Kanker Mata! Tolong Anak Ojol Butuh Operasi', 'Nando Pookey', 'nandopookey@gmail.com', 'https://app.sandbox.midtrans.com/snap/v4/redirection/b39f6aff-3f15-42cf-8dad-9714d8aed54a', '2024-10-22 09:15:49', '2024-10-22 09:15:49', 5),
(24, '9b3fb155-a58a-4715-9928-c3aad4907e70', 'pending', 100000, '6 Tahun Nahda Berjuang Lawan Cerebral Palsy', 'Nando Pookey', 'nandopookey@gmail.com', 'https://app.sandbox.midtrans.com/snap/v4/redirection/42396a8b-cd93-4bdb-a3d2-7774db7ae2ba', '2024-10-22 11:26:11', '2024-10-22 11:26:11', 2),
(25, '9d21702b-7a7f-4c89-8966-6d23ea896ae6', 'pending', 20000, 'Sembako Habis, 80 Anak Yatim Terancam Tdk Makan', 'Nando Pookey', 'nandopookey@gmail.com', 'https://app.sandbox.midtrans.com/snap/v4/redirection/1c540a5c-3f7b-4741-846d-a9100dc20479', '2024-10-24 01:43:43', '2024-10-24 01:43:43', 4),
(26, '376febf9-1478-43c4-9957-19a7f33cb624', 'pending', 400765, 'Sembako Habis, 80 Anak Yatim Terancam Tdk Makan', 'Nando Pookey', 'nandopookey@gmail.com', 'https://app.sandbox.midtrans.com/snap/v4/redirection/f3bf234a-8c12-4690-b8a4-70d117f03dc3', '2024-10-24 01:50:49', '2024-10-24 01:50:49', 4),
(27, '7af28dd0-a806-46fa-a4e5-6bb03d438387', 'pending', 120000, 'Bantu Mbah Saiful Berjuang', 'Anonymous', 'Anonymous', 'https://app.sandbox.midtrans.com/snap/v4/redirection/2c765ff7-cf9a-4723-8db8-36dc29e2a136', '2024-10-25 00:24:28', '2024-10-25 00:24:28', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('nLBTf8eaXzP8uBFDQVvyn6a7HyJqnwuNdHKtHKLv', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoibEdHV2pzUU5xQmhDa05SYTBZODNheTdXN0tmaWlQbDh0b0N4VUtkZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NToiYWxlcnQiO2E6MDp7fX0=', 1729852090);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sliders`
--

CREATE TABLE `sliders` (
  `id` int(5) NOT NULL,
  `title` varchar(250) NOT NULL,
  `sub_title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `image` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `sub_title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'Ubah subtitle', 'ubah deskripsi', 'sliders/q2cVh9qoveezBUj8JzweLqRCZ45oWpreKCjyTCHc.jpg', '2024-10-16 11:24:45', '2024-10-16 05:16:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `id` int(20) NOT NULL,
  `cause_id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `google_id`) VALUES
(1, 'Nando Pookey', 'nandopookey@gmail.com', 'admin', NULL, '$2y$12$B5vJxU0kjdEb4.BFlhMGMuNedo7.OqMpx9r2pYkZpB1lams8HO3rC', NULL, '2024-10-10 20:50:10', '2024-10-12 05:00:07', '105663213325192004771'),
(2, 'Naruto Uzumaki', 'borusara1432@gmail.com', 'user', NULL, '$2y$12$jSMWnqy/6aKpIuICIyAIpeN1.OK2BS26ihVNYK3zYnAA8Esha8wcq', NULL, '2024-10-12 05:05:23', '2024-10-12 05:05:23', '100275713985747130548'),
(3, 'Fernando Herman Pookey', '672017197@student.uksw.edu', 'admin', NULL, '$2y$12$NGL6XJn7nhOdGkX7Ud5p0.JV1cKfPdpsQk9HpI/5z3/nG3mDgfWaW', NULL, '2024-10-19 20:36:51', '2024-10-19 20:36:51', NULL),
(4, 'Prabowo Subianto', 'prabowo@gmail.com', 'user', NULL, '$2y$12$xH0cuHfah071X5juA9BP2OnNJg5P1gdb4.Vz/J8uanBIb6NlT1qGW', NULL, '2024-10-19 23:34:40', '2024-10-19 23:34:40', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `causes`
--
ALTER TABLE `causes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cause_images`
--
ALTER TABLE `cause_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cause_id` (`cause_id`);

--
-- Indeks untuk tabel `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `footer_contents`
--
ALTER TABLE `footer_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `help_reasons`
--
ALTER TABLE `help_reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `home_videos`
--
ALTER TABLE `home_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `media_socials`
--
ALTER TABLE `media_socials`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `navbar_contents`
--
ALTER TABLE `navbar_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cause_in_payments` (`cause_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_fk_cause_id` (`cause_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `causes`
--
ALTER TABLE `causes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `cause_images`
--
ALTER TABLE `cause_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `footer_contents`
--
ALTER TABLE `footer_contents`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `help_reasons`
--
ALTER TABLE `help_reasons`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `home_videos`
--
ALTER TABLE `home_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `media_socials`
--
ALTER TABLE `media_socials`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `navbar_contents`
--
ALTER TABLE `navbar_contents`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cause_images`
--
ALTER TABLE `cause_images`
  ADD CONSTRAINT `fk_cause_id` FOREIGN KEY (`cause_id`) REFERENCES `causes` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_cause_in_payments` FOREIGN KEY (`cause_id`) REFERENCES `causes` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_fk_cause_id` FOREIGN KEY (`cause_id`) REFERENCES `causes` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
