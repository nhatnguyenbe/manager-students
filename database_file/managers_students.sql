-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th9 05, 2023 lúc 09:53 PM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `managers_students`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diems`
--

CREATE TABLE `diems` (
  `id` int UNSIGNED NOT NULL,
  `MaSV` int UNSIGNED NOT NULL,
  `MaMH` int UNSIGNED NOT NULL,
  `NamHoc` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HocKi` int DEFAULT NULL,
  `LanHoc` int NOT NULL DEFAULT '1',
  `LanThi` int NOT NULL DEFAULT '1',
  `DiemCC` int DEFAULT NULL,
  `DiemGK` int DEFAULT NULL,
  `DiemCK` int DEFAULT NULL,
  `DiemHS10` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DiemHS4` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DiemAlphabet` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DanhGia` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diems`
--

INSERT INTO `diems` (`id`, `MaSV`, `MaMH`, `NamHoc`, `HocKi`, `LanHoc`, `LanThi`, `DiemCC`, `DiemGK`, `DiemCK`, `DiemHS10`, `DiemHS4`, `DiemAlphabet`, `DanhGia`, `created_at`, `updated_at`) VALUES
(4, 6, 1, '2021-2022', 2, 1, 1, 4, 6, 4, '5.2', '1.5', 'D+', 1, '2023-08-13 16:02:55', '2023-08-13 16:02:55'),
(5, 7, 1, '2020-2021', 1, 1, 1, 3, 1, 4, '3.1', '0', 'F', 0, '2023-08-27 05:49:11', '2023-08-27 05:49:34'),
(6, 2, 4, '2018-2019', 2, 1, 1, 7, 6, 8, '7.9', '3', 'B', 1, '2023-08-29 11:25:01', '2023-08-29 11:25:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem_danhs`
--

CREATE TABLE `diem_danhs` (
  `id` int UNSIGNED NOT NULL,
  `MaSV` int UNSIGNED NOT NULL,
  `MaMH` int UNSIGNED NOT NULL,
  `BuoiVang` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `he_dao_taos`
--

CREATE TABLE `he_dao_taos` (
  `id` int UNSIGNED NOT NULL,
  `MaHeDT` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenHeDT` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `he_dao_taos`
--

INSERT INTO `he_dao_taos` (`id`, `MaHeDT`, `TenHeDT`, `created_at`, `updated_at`) VALUES
(1, 'VX-CHINHQUY', 'Chính quy', '2023-08-03 17:05:22', '2023-08-05 00:50:15'),
(2, 'VX-LIENTHONG', 'Liên thông', '2023-08-03 17:06:33', '2023-08-03 17:06:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoas`
--

CREATE TABLE `khoas` (
  `id` int UNSIGNED NOT NULL,
  `MaKhoa` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenKhoa` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DienThoai` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ThanhLap` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoas`
--

INSERT INTO `khoas` (`id`, `MaKhoa`, `TenKhoa`, `DienThoai`, `ThanhLap`, `created_at`, `updated_at`) VALUES
(1, 'VXCNTT', 'Công nghệ thông tin', '0365253011', '2018-11-17', '2023-08-02 17:00:00', '2023-08-03 10:41:09'),
(4, 'VXSIHOC', 'Công nghệ sinh học', '0123456789', '2023-08-04', '2023-08-03 19:31:34', '2023-08-06 00:56:37'),
(5, 'VXKTTC', 'Kế toán', '0982465125', '2018-06-06', '2023-08-06 00:56:19', '2023-08-20 11:37:55'),
(6, 'VXUTKS', 'Khách sạn', '0987654321', '2023-08-13', '2023-08-13 16:00:12', '2023-08-20 11:11:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa_hocs`
--

CREATE TABLE `khoa_hocs` (
  `id` int UNSIGNED NOT NULL,
  `MaKhoaHoc` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenKhoaHoc` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoa_hocs`
--

INSERT INTO `khoa_hocs` (`id`, `MaKhoaHoc`, `TenKhoaHoc`, `created_at`, `updated_at`) VALUES
(1, '2018-K10', 'Khoá 10', '2023-08-03 14:59:01', '2023-08-05 19:53:30'),
(2, '2019-k11', 'Khoá 11', '2023-08-03 15:10:28', '2023-08-05 19:53:39'),
(5, '2021-K13', 'Khoá 13', '2023-08-13 15:57:45', '2023-08-13 15:57:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lops`
--

CREATE TABLE `lops` (
  `id` int UNSIGNED NOT NULL,
  `MaLop` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenLop` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MaKhoa_ID` int UNSIGNED NOT NULL,
  `MaHeDT_ID` int UNSIGNED NOT NULL,
  `MaKhoaHoc_ID` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lops`
--

INSERT INTO `lops` (`id`, `MaLop`, `TenLop`, `MaKhoa_ID`, `MaHeDT_ID`, `MaKhoaHoc_ID`, `created_at`, `updated_at`) VALUES
(3, 'IT112019', 'Công nghệ thông tin 11', 1, 1, 2, '2023-08-05 22:53:47', '2023-08-13 15:58:27'),
(4, 'IT102018', 'Công nghệ thông tin 10', 1, 1, 1, '2023-08-05 22:55:56', '2023-08-13 15:58:40'),
(5, 'KS112019', 'Quản trị và du lịch', 6, 1, 2, '2023-08-06 00:57:29', '2023-08-13 16:01:16'),
(6, 'SH102018', 'Công nghệ sinh học 10', 4, 1, 1, '2023-08-08 19:03:54', '2023-08-13 15:58:54'),
(7, 'IT132021', 'Công nghệ thông tin 13', 1, 1, 5, '2023-08-13 15:57:15', '2023-08-13 15:58:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2023_08_02_001645_add_foreign_groups_table', 3),
(10, '2023_08_02_002005_add_foreign_users_table', 3),
(26, '2023_08_02_180332_create_khoas_table', 4),
(27, '2023_08_02_182229_create_khoa_hocs_table', 4),
(28, '2023_08_02_182555_create_he_dao_taos_table', 4),
(29, '2023_08_03_022604_create_mon_hocs_table', 4),
(30, '2023_08_03_024942_create_lops_table', 4),
(31, '2023_08_03_025406_create_sinh_viens_table', 4),
(32, '2023_08_03_031847_create_diems_table', 5),
(33, '2023_08_03_032230_create_diem_danhs_table', 6),
(36, '2023_08_03_032824_add_foreign_lops_table', 7),
(37, '2023_08_03_033656_add_foreign_mon_hoc_table', 7),
(38, '2023_08_03_035136_add_foreign_sinh_vien_table', 8),
(39, '2023_08_03_035733_add_foreign_diem_table', 9),
(40, '2023_08_03_040302_add_foreign_diem_danh_table', 10),
(51, '2014_10_12_000000_create_users_table', 11),
(52, '2023_08_02_001442_create_roles_table', 11),
(53, '2023_08_16_073641_add_foreign_users_table', 11),
(54, '2023_08_16_083339_create_model_table', 12),
(55, '2023_08_16_083640_create_models_table', 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `models`
--

CREATE TABLE `models` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `function` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `models`
--

INSERT INTO `models` (`id`, `name`, `description`, `function`, `created_at`, `updated_at`) VALUES
(1, 'departments', 'Quản lý khoa.', '{\"view\":\"Xem\",\"add\":\"Th\\u00eam\",\"edit\":\"S\\u1eeda\",\"delete\":\"Xo\\u00e1\"}', '2023-08-16 02:22:18', '2023-08-16 18:32:50'),
(2, 'courses', 'Quản lý khoá học', '{\"view\":\"Xem\",\"add\":\"Th\\u00eam\",\"edit\":\"S\\u1eeda\",\"delete\":\"Xo\\u00e1\"}', '2023-08-16 02:30:06', '2023-08-16 23:37:30'),
(3, 'trainings', 'Quản lý hệ đào tạo.', '{\"view\":\"Xem\",\"add\":\"Th\\u00eam\",\"edit\":\"S\\u1eeda\",\"delete\":\"Xo\\u00e1\"}', '2023-08-16 02:30:44', '2023-08-16 23:37:54'),
(4, 'subjects', 'Quản lý môn học', '{\"view\":\"Xem\",\"add\":\"Th\\u00eam\",\"edit\":\"S\\u1eeda\",\"delete\":\"Xo\\u00e1\"}', '2023-08-16 02:31:09', '2023-08-16 23:38:02'),
(5, 'classroom', 'Quản lý lớp.', '{\"view\":\"Xem\",\"add\":\"Th\\u00eam\",\"edit\":\"S\\u1eeda\",\"delete\":\"Xo\\u00e1\"}', '2023-08-16 02:31:44', '2023-08-16 23:38:11'),
(6, 'students', 'Quản lý sinh viên.', '{\"view\":\"Xem\",\"add\":\"Th\\u00eam\",\"edit\":\"S\\u1eeda\",\"delete\":\"Xo\\u00e1\",\"view_detail\":\"Xem chi ti\\u1ebft\"}', '2023-08-16 02:32:17', '2023-08-17 09:13:30'),
(7, 'points', 'Quản lý điểm.', '{\"view\":\"Xem\",\"add\":\"Th\\u00eam\",\"edit\":\"S\\u1eeda\",\"delete\":\"Xo\\u00e1\",\"view_detail\":\"Xem chi ti\\u1ebft\",\"check\":\"Xem \\u0111i\\u1ec3m\"}', '2023-08-16 02:32:57', '2023-08-20 11:40:54'),
(8, 'users', 'Quản lý người dùng.', '{\"view\":\"Xem\",\"add\":\"Th\\u00eam\",\"edit\":\"S\\u1eeda\",\"delete\":\"Xo\\u00e1\",\"delete_all\":\"Xo\\u00e1 to\\u00e0n b\\u1ed9\"}', '2023-08-16 02:33:36', '2023-08-17 03:32:05'),
(9, 'roles', 'Quản lý quyền.', '{\"view\":\"Xem\",\"add\":\"Th\\u00eam\",\"edit\":\"S\\u1eeda\",\"delete\":\"Xo\\u00e1\",\"permission\":\"Ph\\u00e2n quy\\u1ec1n\"}', '2023-08-16 02:33:57', '2023-08-16 19:22:42'),
(10, 'model', 'Quản lý model phân quyền.', '{\"view\":\"Xem\",\"add\":\"Th\\u00eam\",\"edit\":\"S\\u1eeda\",\"delete\":\"Xo\\u00e1\"}', '2023-08-16 02:34:46', '2023-08-16 23:38:37'),
(17, 'settings', 'Quản lý cài đặt', '{\"view\":\"Xem\"}', '2023-08-20 11:59:53', '2023-08-20 11:59:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon_hocs`
--

CREATE TABLE `mon_hocs` (
  `id` int UNSIGNED NOT NULL,
  `MaMH` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenMH` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MaKhoa_ID` int UNSIGNED NOT NULL,
  `SoTc` int DEFAULT NULL,
  `SoTiet` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mon_hocs`
--

INSERT INTO `mon_hocs` (`id`, `MaMH`, `TenMH`, `MaKhoa_ID`, `SoTc`, `SoTiet`, `created_at`, `updated_at`) VALUES
(1, 'MAT3003', 'Toán rời rạc', 1, 3, 32, '2023-08-03 20:19:03', '2023-08-13 15:49:31'),
(3, 'INT3206', 'Thiết kế web', 1, 3, 23, '2023-08-12 02:07:28', '2023-08-12 02:07:28'),
(4, 'INT3201', 'Hệ quản trị cơ sở dữ liệu', 1, 3, 24, '2023-08-12 02:08:09', '2023-08-12 02:08:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` int UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `permission`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '{\"departments\":[\"view\",\"add\",\"edit\",\"delete\"],\"courses\":[\"view\",\"add\",\"edit\",\"delete\"],\"trainings\":[\"view\",\"add\",\"edit\",\"delete\"],\"subjects\":[\"view\",\"add\",\"edit\",\"delete\"],\"classroom\":[\"view\",\"add\",\"edit\",\"delete\"],\"students\":[\"view\",\"add\",\"edit\",\"delete\",\"view_detail\"],\"points\":[\"view\",\"add\",\"edit\",\"delete\",\"view_detail\",\"check\"],\"users\":[\"view\",\"add\",\"edit\",\"delete\",\"delete_all\"],\"roles\":[\"view\",\"add\",\"edit\",\"delete\",\"permission\"],\"model\":[\"view\",\"add\",\"edit\",\"delete\"],\"settings\":[\"view\"]}', '2023-08-16 00:44:21', '2023-08-29 11:23:49'),
(2, 'Manager', '{\"courses\":[\"view\",\"add\",\"edit\"],\"trainings\":[\"view\",\"add\",\"edit\"],\"subjects\":[\"view\",\"add\",\"edit\"],\"classroom\":[\"view\",\"add\",\"edit\"],\"students\":[\"view\",\"add\",\"edit\",\"view_detail\"],\"points\":[\"view\",\"add\",\"edit\"],\"users\":[\"view\",\"add\",\"edit\",\"delete_all\"]}', '2023-08-16 23:49:02', '2023-08-17 04:01:00'),
(3, 'Students', '{\"points\":[\"view\",\"check\"]}', '2023-08-16 23:50:06', '2023-08-20 11:53:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinh_viens`
--

CREATE TABLE `sinh_viens` (
  `id` int UNSIGNED NOT NULL,
  `MaSV` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenSV` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cccd` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GioiTinh` tinyint DEFAULT NULL,
  `MaLop_ID` int UNSIGNED NOT NULL,
  `NamNH` date DEFAULT NULL,
  `NamKT` date DEFAULT NULL,
  `DienThoai` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NoiSinh` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `QueQuan` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DanToc` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TonGiao` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sinh_viens`
--

INSERT INTO `sinh_viens` (`id`, `MaSV`, `TenSV`, `NgaySinh`, `email`, `cccd`, `GioiTinh`, `MaLop_ID`, `NamNH`, `NamKT`, `DienThoai`, `NoiSinh`, `QueQuan`, `DanToc`, `TonGiao`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, '19110045', 'Lê Duy Hào', '2001-08-08', 'haole@gmail.com', '1236363637', 1, 3, '2019-08-01', NULL, '0123456789', 'Nghệ An', 'Nghệ An', 'Kinh', 'Không', '669c8c4045aeea63716b9df8db31c1734b885271.jpg', 1, '2023-08-06 00:47:39', '2023-08-13 15:48:26'),
(4, '18110010', 'Nguyễn Thành Nhật', '1999-11-20', 'nhat@gmail.com', '066099019289', 1, 4, '2018-08-08', NULL, '0365253011', 'Krong Năng, Đắk Lắk', 'Vũ Quang, Hà Tĩnh', 'Kinh', 'Không', '16224f4e0e0468f13ba80d250605d8a194266be4.jpg', 4, '2023-08-08 19:27:24', '2023-08-09 10:53:51'),
(6, '21110018', 'Nguyễn Văn Hưng', '2003-02-06', 'hung@gmail.com', '040203001326', 1, 7, '2021-08-18', NULL, '0369163771', 'Diễn châu, Nghệ An', 'Diễn châu, Nghệ An', 'Kinh', 'Không', '0527badf7c0036c6394d6bde092944cdde4e5dc5.png', 1, '2023-08-13 15:55:53', '2023-08-13 16:02:17'),
(7, '21110016', 'Võ Hoài An', '2003-07-15', 'hoaian20031@gmail.com', '040203009455', 2, 7, '2021-09-18', NULL, '0389931274', 'Quỳnh Lư', 'Quỳnh Lưu', 'Kinh', 'Không', '516855dd3cae296735433515175861b22fa73ba9.jpg', 1, '2023-08-27 05:47:20', '2023-08-27 05:47:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `images`, `role_id`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Quản Trị', 'admin@2023', 'admin@gmail.com', '20214736369bae7c7e6e57949304bb8cc2d2b7f7.png', 1, NULL, '$2y$10$NV5/RPmRuHUOB8RaMhLEMOTDU1Bw7tk9LGDX1q91cZBtwgqyfDMtO', 1, NULL, '2023-08-16 00:45:12', '2023-08-29 10:52:09'),
(2, 'Lê Duy Hào', 'haole2k1', 'haole@gmail.com', '807a0e51497f89e7a685e0f68e66bb337feada3b.jpg', 1, NULL, '$2y$10$GmSTwGLwkfji3mhHSWLDdeR64PoEdvpDyIATNIdPpPkeWL6YIaELq', 1, NULL, '2023-08-16 00:49:57', '2023-08-17 03:00:18'),
(3, 'Tài khoản sinh viên', 'qlpm@2023', 'qlpm@gmail.com', '1440bbc66cc6298ddd98e5f2964a83da918af004.jpg', 3, NULL, '$2y$10$RkfsevZAKQ7sSqVi4dHQZO5hPM10CrpEN99IGXaloqI6hETayjhPi', 1, NULL, '2023-08-17 02:51:53', '2023-08-27 05:53:32');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `diems`
--
ALTER TABLE `diems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diems_masv_foreign` (`MaSV`),
  ADD KEY `diems_mamh_foreign` (`MaMH`);

--
-- Chỉ mục cho bảng `diem_danhs`
--
ALTER TABLE `diem_danhs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diem_danhs_masv_foreign` (`MaSV`),
  ADD KEY `diem_danhs_mamh_foreign` (`MaMH`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `he_dao_taos`
--
ALTER TABLE `he_dao_taos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `he_dao_taos_mahedt_unique` (`MaHeDT`);

--
-- Chỉ mục cho bảng `khoas`
--
ALTER TABLE `khoas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `khoas_makhoa_unique` (`MaKhoa`);

--
-- Chỉ mục cho bảng `khoa_hocs`
--
ALTER TABLE `khoa_hocs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `khoa_hocs_makhoahoc_unique` (`MaKhoaHoc`);

--
-- Chỉ mục cho bảng `lops`
--
ALTER TABLE `lops`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lops_malop_unique` (`MaLop`),
  ADD KEY `lops_makhoa_id_foreign` (`MaKhoa_ID`),
  ADD KEY `lops_mahedt_id_foreign` (`MaHeDT_ID`),
  ADD KEY `lops_makhoahoc_id_foreign` (`MaKhoaHoc_ID`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mon_hocs`
--
ALTER TABLE `mon_hocs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mon_hocs_mamh_unique` (`MaMH`),
  ADD KEY `mon_hocs_makhoa_id_foreign` (`MaKhoa_ID`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sinh_viens`
--
ALTER TABLE `sinh_viens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sinh_viens_masv_unique` (`MaSV`),
  ADD KEY `sinh_viens_malop_id_foreign` (`MaLop_ID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `diems`
--
ALTER TABLE `diems`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `diem_danhs`
--
ALTER TABLE `diem_danhs`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `he_dao_taos`
--
ALTER TABLE `he_dao_taos`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `khoas`
--
ALTER TABLE `khoas`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `khoa_hocs`
--
ALTER TABLE `khoa_hocs`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `lops`
--
ALTER TABLE `lops`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `models`
--
ALTER TABLE `models`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `mon_hocs`
--
ALTER TABLE `mon_hocs`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sinh_viens`
--
ALTER TABLE `sinh_viens`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `diems`
--
ALTER TABLE `diems`
  ADD CONSTRAINT `diems_mamh_foreign` FOREIGN KEY (`MaMH`) REFERENCES `mon_hocs` (`id`),
  ADD CONSTRAINT `diems_masv_foreign` FOREIGN KEY (`MaSV`) REFERENCES `sinh_viens` (`id`);

--
-- Các ràng buộc cho bảng `diem_danhs`
--
ALTER TABLE `diem_danhs`
  ADD CONSTRAINT `diem_danhs_mamh_foreign` FOREIGN KEY (`MaMH`) REFERENCES `mon_hocs` (`id`),
  ADD CONSTRAINT `diem_danhs_masv_foreign` FOREIGN KEY (`MaSV`) REFERENCES `sinh_viens` (`id`);

--
-- Các ràng buộc cho bảng `lops`
--
ALTER TABLE `lops`
  ADD CONSTRAINT `lops_mahedt_id_foreign` FOREIGN KEY (`MaHeDT_ID`) REFERENCES `he_dao_taos` (`id`),
  ADD CONSTRAINT `lops_makhoa_id_foreign` FOREIGN KEY (`MaKhoa_ID`) REFERENCES `khoas` (`id`),
  ADD CONSTRAINT `lops_makhoahoc_id_foreign` FOREIGN KEY (`MaKhoaHoc_ID`) REFERENCES `khoa_hocs` (`id`);

--
-- Các ràng buộc cho bảng `mon_hocs`
--
ALTER TABLE `mon_hocs`
  ADD CONSTRAINT `mon_hocs_makhoa_id_foreign` FOREIGN KEY (`MaKhoa_ID`) REFERENCES `khoas` (`id`);

--
-- Các ràng buộc cho bảng `sinh_viens`
--
ALTER TABLE `sinh_viens`
  ADD CONSTRAINT `sinh_viens_malop_id_foreign` FOREIGN KEY (`MaLop_ID`) REFERENCES `lops` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
