/*
 Navicat Premium Data Transfer

 Source Server         : Aditya
 Source Server Type    : MySQL
 Source Server Version : 80018
 Source Host           : localhost:3306
 Source Schema         : bhx_interview

 Target Server Type    : MySQL
 Target Server Version : 80018
 File Encoding         : 65001

 Date: 27/06/2021 09:10:38
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for attendance_absenses
-- ----------------------------
DROP TABLE IF EXISTS `attendance_absenses`;
CREATE TABLE `attendance_absenses`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag_verified` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for attendances
-- ----------------------------
DROP TABLE IF EXISTS `attendances`;
CREATE TABLE `attendances`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time_in` time(0) NOT NULL,
  `time_out` time(0) NOT NULL,
  `flag_attendance` int(11) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of attendances
-- ----------------------------
INSERT INTO `attendances` VALUES (1, 1, '2021-06-01', '10:42:00', '20:42:00', 1, 'Hadir', '2021-06-26 03:42:27', '2021-06-26 03:42:27');
INSERT INTO `attendances` VALUES (2, 1, '2021-06-02', '10:42:00', '20:42:00', 1, 'Hadir', '2021-06-26 03:42:27', '2021-06-26 03:42:27');
INSERT INTO `attendances` VALUES (5, 1, '2021-06-07', '10:42:00', '20:42:00', 1, 'Hadir', '2021-06-26 03:42:27', '2021-06-26 03:42:27');
INSERT INTO `attendances` VALUES (6, 1, '2021-06-08', '10:42:00', '20:42:00', 1, 'Hadir', '2021-06-26 03:42:27', '2021-06-26 03:42:27');
INSERT INTO `attendances` VALUES (7, 1, '2021-06-09', '10:42:00', '20:42:00', 1, 'Hadir', '2021-06-26 03:42:27', '2021-06-26 03:42:27');
INSERT INTO `attendances` VALUES (8, 1, '2021-06-10', '10:42:00', '20:42:00', 1, 'Hadir', '2021-06-26 03:42:27', '2021-06-26 03:42:27');
INSERT INTO `attendances` VALUES (9, 1, '2021-06-11', '10:42:00', '20:42:00', 1, 'Hadir', '2021-06-26 03:42:27', '2021-06-26 03:42:27');
INSERT INTO `attendances` VALUES (10, 1, '2021-06-14', '10:42:00', '20:42:00', 1, 'Hadir', '2021-06-26 03:42:27', '2021-06-26 03:42:27');
INSERT INTO `attendances` VALUES (11, 1, '2021-06-15', '10:42:00', '20:42:00', 1, 'Hadir', '2021-06-26 03:42:27', '2021-06-26 03:42:27');
INSERT INTO `attendances` VALUES (12, 1, '2021-06-16', '10:42:00', '20:42:00', 1, 'Hadir', '2021-06-26 03:42:27', '2021-06-26 03:42:27');
INSERT INTO `attendances` VALUES (13, 1, '2021-06-17', '10:42:00', '20:42:00', 1, 'Hadir', '2021-06-26 03:42:27', '2021-06-26 03:42:27');
INSERT INTO `attendances` VALUES (14, 1, '2021-06-18', '10:42:00', '20:42:00', 1, 'Hadir', '2021-06-26 03:42:27', '2021-06-26 03:42:27');
INSERT INTO `attendances` VALUES (15, 1, '2021-06-21', '10:42:00', '20:42:00', 1, 'Hadir', '2021-06-26 03:42:27', '2021-06-26 03:42:27');
INSERT INTO `attendances` VALUES (16, 1, '2021-06-22', '10:42:00', '20:42:00', 1, 'Hadir', '2021-06-26 03:42:27', '2021-06-26 03:42:27');
INSERT INTO `attendances` VALUES (17, 1, '2021-06-23', '10:42:00', '20:42:00', 1, 'Hadir', '2021-06-26 03:42:27', '2021-06-26 03:42:27');
INSERT INTO `attendances` VALUES (18, 1, '2021-06-24', '10:42:00', '20:42:00', 1, 'Hadir', '2021-06-26 03:42:27', '2021-06-26 03:42:27');
INSERT INTO `attendances` VALUES (19, 1, '2021-06-25', '10:42:00', '20:42:00', 1, 'Hadir', '2021-06-26 03:42:27', '2021-06-26 03:42:27');
INSERT INTO `attendances` VALUES (20, 1, '2021-06-28', '10:42:00', '20:42:00', 1, 'Hadir', '2021-06-26 03:42:27', '2021-06-26 03:42:27');
INSERT INTO `attendances` VALUES (21, 1, '2021-06-29', '10:42:00', '20:42:00', 1, 'Hadir', '2021-06-26 03:42:27', '2021-06-26 03:42:27');
INSERT INTO `attendances` VALUES (22, 1, '2021-06-30', '10:42:00', '20:42:00', 1, 'Hadir', '2021-06-26 03:42:27', '2021-06-26 03:42:27');

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nip` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_birth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_birth` date NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` int(11) NOT NULL,
  `allowance` int(11) NULL DEFAULT NULL,
  `active` enum('ON','OFF') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES (1, 123456, 'Aditya Ardiansyah', 'Surabaya', '1999-06-03', 'Laki-Laki', 'Staff', 5000000, 1000000, 'ON', '2021-06-25 23:09:27', '2021-06-25 23:09:27');
INSERT INTO `employees` VALUES (2, 1234567, 'Dimas Widyatama', 'Surabaya', '1999-01-04', 'Laki-Laki', 'Staff', 4000000, 1000000, 'ON', '2021-06-25 23:11:43', '2021-06-25 23:11:43');
INSERT INTO `employees` VALUES (4, 22112211, 'M Abdul', 'Gresik', '1992-01-01', 'Laki-Laki', 'Staff', 5000000, 1000000, 'ON', '2021-06-25 23:15:53', '2021-06-25 23:15:53');
INSERT INTO `employees` VALUES (5, 1232312, 'Khudori', 'Malang', '1992-01-18', 'Laki-Laki', 'Supir', 4000000, 500000, 'ON', '2021-06-25 23:23:31', '2021-06-25 23:23:31');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2021_06_25_124027_create_roles_table', 1);
INSERT INTO `migrations` VALUES (5, '2021_06_25_124042_create_employees_table', 1);
INSERT INTO `migrations` VALUES (6, '2021_06_25_124101_create_attendances_table', 1);
INSERT INTO `migrations` VALUES (7, '2021_06_25_134457_create_attendance_absenses_table', 1);
INSERT INTO `migrations` VALUES (8, '2021_06_25_134512_create_overtimes_table', 1);
INSERT INTO `migrations` VALUES (9, '2021_06_25_134526_create_working_hours_table', 1);
INSERT INTO `migrations` VALUES (10, '2021_06_25_134558_create_payrolls_table', 1);

-- ----------------------------
-- Table structure for overtimes
-- ----------------------------
DROP TABLE IF EXISTS `overtimes`;
CREATE TABLE `overtimes`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time_in` time(0) NOT NULL,
  `time_out` time(0) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of overtimes
-- ----------------------------
INSERT INTO `overtimes` VALUES (2, 1, '2021-06-01', '18:00:00', '20:00:00', 'Lembur aja ya', '2021-06-26 04:53:29', '2021-06-26 05:28:13');
INSERT INTO `overtimes` VALUES (3, 1, '2021-06-02', '17:00:00', '22:00:00', 'Lembur', '2021-06-26 11:05:22', '2021-06-26 11:05:22');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for payrolls
-- ----------------------------
DROP TABLE IF EXISTS `payrolls`;
CREATE TABLE `payrolls`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `periode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_basic_salary` int(11) NOT NULL,
  `total_allowance` int(11) NOT NULL,
  `total_overtime` int(11) NOT NULL,
  `total_bpjs` int(11) NOT NULL,
  `total_nwnp` int(11) NOT NULL,
  `total_accepted` int(11) NOT NULL,
  `is_verified` int(11) NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of payrolls
-- ----------------------------
INSERT INTO `payrolls` VALUES (1, 1, '2021-06', 5000000, 1000000, 346820, 180000, 333333, 5833487, 1, '2021-06-26 14:01:45', '2021-06-26 23:13:48');
INSERT INTO `payrolls` VALUES (2, 2, '2021-06', 4000000, 1000000, 0, 150000, 2933333, 1916667, 0, '2021-06-26 14:01:45', '2021-06-26 14:01:45');
INSERT INTO `payrolls` VALUES (3, 4, '2021-06', 5000000, 1000000, 0, 180000, 3666667, 2153333, 0, '2021-06-26 14:01:45', '2021-06-26 14:01:45');
INSERT INTO `payrolls` VALUES (4, 5, '2021-06', 4000000, 500000, 0, 135000, 2933333, 1431667, 0, '2021-06-26 14:01:45', '2021-06-26 14:01:45');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Staff', '2021-06-25 22:29:09', '2021-06-25 22:29:09');
INSERT INTO `roles` VALUES (2, 'Supervisor', '2021-06-25 22:29:09', '2021-06-25 22:29:09');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Staff HRD', 'staff@gmail.com', NULL, '$2y$10$ZJkms7mIUT/khLrP/0hgUuHqY.5JsVyW4MT/oXBF8PZ4u67/h8mcO', 1, 1, NULL, '2021-06-25 22:29:09', '2021-06-25 22:29:09');
INSERT INTO `users` VALUES (2, 'Supervisor', 'spv@gmail.com', NULL, '$2y$10$wzIjnWsww1D/EHAaP/3vX.wXMqz1p6E0KXkxPdTF.ALFFuTyImDye', 2, 1, NULL, '2021-06-25 22:29:09', '2021-06-25 22:29:09');

-- ----------------------------
-- Table structure for working_hours
-- ----------------------------
DROP TABLE IF EXISTS `working_hours`;
CREATE TABLE `working_hours`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` int(11) NOT NULL,
  `flag_day_off` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
