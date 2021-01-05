-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(10) unsigned NOT NULL,
  `products_id` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`),
  KEY `products_id` (`products_id`),
  CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `carts` (`id`, `users_id`, `products_id`, `quantity`, `created_at`, `updated_at`) VALUES
(7,	1,	26,	1,	'2021-01-05 12:14:19',	'2021-01-05 12:14:19');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2014_10_12_200000_add_two_factor_columns_to_users_table',	1),
(4,	'2019_08_19_000000_create_failed_jobs_table',	1),
(5,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(6,	'2020_12_28_131654_create_sessions_table',	1),
(7,	'2020_12_28_132121_create_products_table',	1),
(8,	'2020_12_28_132139_create_carts_table',	1),
(9,	'2021_01_02_132944_create_orderlists_table',	1),
(10,	'2021_01_02_133006_create_orderdetails_table',	1);

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE `orderdetails` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orderlists_id` int(10) unsigned NOT NULL,
  `products_id` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_id` (`products_id`),
  KEY `orderlists_id` (`orderlists_id`),
  CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`),
  CONSTRAINT `orderdetails_ibfk_4` FOREIGN KEY (`orderlists_id`) REFERENCES `orderlists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orderdetails` (`id`, `orderlists_id`, `products_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(43,	59,	28,	1,	185,	'2021-01-02 12:20:53',	'2021-01-02 12:20:53'),
(44,	60,	7,	1,	299,	'2021-01-02 12:56:42',	'2021-01-02 12:56:42'),
(45,	60,	10,	3,	49,	'2021-01-02 12:56:42',	'2021-01-02 12:56:42'),
(46,	61,	26,	1,	179,	'2021-01-03 05:26:35',	'2021-01-03 05:26:35'),
(47,	62,	26,	1,	179,	'2021-01-03 05:26:53',	'2021-01-03 05:26:53'),
(48,	63,	29,	1,	179,	'2021-01-03 08:24:11',	'2021-01-03 08:24:11'),
(49,	64,	28,	1,	185,	'2021-01-03 08:25:43',	'2021-01-03 08:25:43'),
(54,	69,	28,	2,	185,	'2021-01-05 12:00:19',	'2021-01-05 12:00:19'),
(55,	69,	12,	1,	185,	'2021-01-05 12:00:19',	'2021-01-05 12:00:19');

DROP TABLE IF EXISTS `orderlists`;
CREATE TABLE `orderlists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(10) unsigned NOT NULL,
  `total` int(11) NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`),
  CONSTRAINT `orderlists_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orderlists` (`id`, `users_id`, `total`, `method`, `status`, `created_at`, `updated_at`) VALUES
(59,	1,	185,	'預定快取',	'已完成',	'2021-01-02 12:20:53',	'2021-01-03 06:16:42'),
(60,	1,	446,	'預定快取',	'已完成',	'2021-01-02 12:56:42',	'2021-01-03 06:16:49'),
(61,	2,	179,	'預定快取',	'已完成',	'2021-01-03 05:26:35',	'2021-01-03 06:16:53'),
(62,	3,	179,	'預定快取',	'已完成',	'2021-01-03 05:26:53',	'2021-01-03 06:16:56'),
(63,	2,	179,	'預定快取',	'已完成',	'2021-01-03 08:24:11',	'2021-01-05 11:38:19'),
(64,	2,	185,	'預定快取',	'已完成',	'2021-01-03 08:25:43',	'2021-01-05 11:38:27'),
(69,	3,	555,	'預定快取',	'準備中',	'2021-01-05 12:00:19',	'2021-01-05 12:00:19');

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`, `name`, `detail`, `img`, `img2`, `price`, `type`, `created_at`, `updated_at`) VALUES
(1,	'香酥脆薯(大)',	'香酥脆薯(大)X1',	'img/單點/香酥脆薯(大).jpg',	'img/單點小張/香酥脆薯(大).jpg',	48,	'單點',	NULL,	NULL),
(2,	'香酥洋蔥圈',	'香酥洋蔥圈X1',	'img/單點/香酥洋蔥圈.jpg',	'img/單點小張/香酥洋蔥圈.jpg',	48,	'單點',	NULL,	NULL),
(3,	'點心盒-勁爆雞米花+香酥脆薯(小)',	'點心盒-勁爆雞米花、香酥脆薯(小)',	'img/單點/點心盒-勁爆雞米花+香酥脆薯(小).jpg',	'img/單點小張/點心盒-勁爆雞米花+香酥脆薯(小).jpg',	49,	'單點',	NULL,	NULL),
(4,	'勁爆雞米花分享盒',	'勁爆雞米花分享盒X1',	'img/單點/勁爆雞米花分享盒.jpg',	'img/單點小張/勁爆雞米花分享盒.jpg',	129,	'單點',	NULL,	NULL),
(5,	'雞汁風味飯',	'雞汁風味飯X1',	'img/單點/雞汁風味飯.jpg',	'img/單點小張/雞汁風味飯.jpg',	39,	'單點',	NULL,	NULL),
(6,	'上校雞塊分享盒',	'上校雞塊X20塊',	'img/單點/上校雞塊分享盒.jpg',	'img/單點小張/上校雞塊分享盒.jpg',	179,	'單點',	NULL,	NULL),
(7,	'經典拼盤',	'香酥脆薯(中)X2、勁爆雞米花(大)X2、上校雞塊X6、經典玉米X3、',	'img/單點/經典拼盤.jpg',	'img/單點小張/經典拼盤.jpg',	299,	'單點',	NULL,	NULL),
(8,	'鮮蔬沙拉(千島醬)',	'鮮蔬沙拉(千島醬)X1',	'img/單點/鮮蔬沙拉(千島醬).jpg',	'img/單點小張/鮮蔬沙拉(千島醬).jpg',	40,	'單點',	NULL,	NULL),
(9,	'經典玉米',	'經典玉米X1',	'img/單點/經典玉米.jpg',	'img/單點小張/經典玉米.jpg',	29,	'單點',	NULL,	NULL),
(10,	'雙色轉轉QQ球',	'雙色轉轉QQ球X1份',	'img/單點/雙色轉轉QQ球.jpg',	'img/單點小張/雙色轉轉QQ球.jpg',	49,	'單點',	NULL,	NULL),
(11,	'原味蛋撻',	'原味蛋撻X1顆',	'img/單點/原味蛋撻.jpg',	'img/單點小張/原味蛋撻.jpg',	35,	'單點',	NULL,	NULL),
(12,	'原味蛋撻禮盒',	'原味蛋撻X6',	'img/單點/原味蛋撻禮盒.jpg',	'img/單點小張/原味蛋撻禮盒.jpg',	185,	'單點',	NULL,	NULL),
(13,	'歡聚炸雞餐',	'咔啦脆雞(中辣)X8、原味蛋撻x6、香酥脆薯(中)X2、百事可樂(小)X4',	'img/多人/歡聚炸雞餐.jpg',	'img/多人小張/歡聚炸雞餐.jpg',	499,	'多人餐',	NULL,	NULL),
(14,	'派對B餐-10塊雞桶',	'咔啦脆雞(中辣)X10、香酥脆薯(大)X2、勁爆雞米花(大)X1、上校雞塊X10、1.25L百事可樂(瓶)X1',	'img/多人/派對B餐-10塊雞桶.jpg',	'img/多人小張/派對B餐-10塊雞桶.jpg',	649,	'多人餐',	NULL,	NULL),
(15,	'派對B餐-8塊雞桶',	'咔啦脆雞(中辣)X8、香酥脆薯(中)X2、勁爆雞米花(大)X1、上校雞塊X8、1.25L百事可樂(瓶)X1',	'img/多人/派對B餐-8塊雞桶.jpg',	'img/多人小張/派對B餐-8塊雞桶.jpg',	535,	'多人餐',	NULL,	NULL),
(16,	'派對B餐-6塊雞桶',	'咔啦脆雞(中辣)X6、香酥脆薯(中)X1、勁爆雞米花(大)X1、上校雞塊X6、百事可樂(中)X3',	'img/多人/派對B餐-6塊雞桶.jpg',	'img/多人小張/派對B餐-6塊雞桶.jpg',	409,	'多人餐',	NULL,	NULL),
(17,	'好食雞同樂餐',	'咔啦脆雞(中辣)X16、香酥脆薯(小)X3、原味蛋撻X6、1.25L百事可樂(瓶)X1',	'img/多人/好食雞同樂餐.jpg',	'img/多人小張/好食雞同樂餐.jpg',	985,	'多人餐',	NULL,	NULL),
(18,	'烤炸雙拼餐',	'咔啦脆雞(中辣)X6、美式BBQ烤雞腿X6、香酥脆薯(小)X3、原味蛋撻x6、1.25L百事可樂(瓶)X1',	'img/多人/烤炸雙拼餐.jpg',	'img/多人小張/烤炸雙拼餐.jpg',	785,	'多人餐',	NULL,	NULL),
(19,	'義式香草紙包雞同樂餐',	'咔啦脆雞(中辣)X6、義式香草紙包雞X3、雞汁風味飯X3、原味蛋撻x6、1.25L百事可樂(瓶)X1',	'img/多人/義式香草紙包雞同樂餐.jpg',	'img/多人小張/義式香草紙包雞同樂餐.jpg',	785,	'多人餐',	NULL,	NULL),
(20,	'麻吉桶餐',	'咔啦脆雞(中辣)(烤/炸任選)X5、原味蛋撻X2、雙色轉轉QQ球X1、冰紅茶(小)X2',	'img/多人/麻吉桶餐.jpg',	'img/多人小張/麻吉桶餐.jpg',	279,	'多人餐',	NULL,	NULL),
(21,	'開燻雙拼餐',	'美式BBQ烤雞腿X4、咔啦脆雞(中辣)X4、香酥脆薯(中)X2、原味蛋撻x6、1.25L百事可樂(瓶)X1',	'img/多人/開燻雙拼餐.jpg',	'img/多人小張/開燻雙拼餐.jpg',	499,	'多人餐',	NULL,	NULL),
(22,	'5塊雞桶餐',	'咔啦脆雞(中辣)X5',	'img/多人/5塊雞桶餐.jpg',	'img/多人小張/5塊雞桶餐.jpg',	215,	'多人餐',	NULL,	NULL),
(23,	'經典A餐-6塊雞桶',	'咔啦脆雞(中辣)X6、香酥脆薯(中)X1',	'img/多人/經典A餐-6塊雞桶.jpg',	'img/多人小張/經典A餐-6塊雞桶.jpg',	299,	'多人餐',	NULL,	NULL),
(24,	'經典A餐-10塊雞桶',	'卡啦脆雞(中辣)X10、香酥脆薯(中)X2',	'img/多人/經典A餐-10塊雞桶.jpg',	'img/多人小張/經典A餐-10塊雞桶.jpg',	479,	'多人餐',	NULL,	NULL),
(25,	'巴黎卡菲嫩雞捲套餐',	'巴黎卡菲嫩雞捲X1、香酥脆薯(中)X1、百事可樂(中)X1',	'img/個人/巴黎卡菲嫩雞捲套餐.jpg',	'img/個人小張/巴黎卡菲嫩雞捲套餐.jpg',	99,	'個人餐',	NULL,	NULL),
(26,	'紐奧良烤雞腿堡XL套餐',	'紐奧良烤雞腿堡X1、咔啦脆雞(中辣)X1、原味蛋撻X1、香酥脆薯(中)X1、百事可樂(中)X1',	'img/個人/紐奧良烤雞腿堡XL套餐.jpg',	'img/個人小張/紐奧良烤雞腿堡XL套餐.jpg',	179,	'個人餐',	NULL,	NULL),
(27,	'義式香草紙包雞XL套餐',	'義式香草紙包雞X1份、雞汁風味飯X1、勁爆雞米花(小)X1、原味蛋撻X1、百事可樂(中)X1',	'img/個人/義式香草紙包雞XL套餐.jpg',	'img/個人小張/義式香草紙包雞XL套餐.jpg',	179,	'個人餐',	NULL,	NULL),
(28,	'花生培根咔啦雞腿堡XL套餐',	'花生培根咔啦雞腿堡x1、咔啦脆雞x1、香酥脆薯(中)x1、原味蛋撻、百事可樂(中)x1',	'img/個人/花生培根咔啦雞腿堡XL套餐.jpg',	'img/個人小張/花生培根咔啦雞腿堡XL套餐.jpg',	185,	'個人餐',	NULL,	NULL),
(29,	'吮指雙雞XL套餐',	'咔啦脆雞(中辣)X2、勁爆雞米花(小)X1、原味蛋撻X1、香酥脆薯(中)X1、百事可樂(中)X1',	'img/個人/吮指雙雞XL套餐.jpg',	'img/個人小張/吮指雙雞XL套餐.jpg',	179,	'個人餐',	NULL,	NULL),
(30,	'紐奧良烤雞腿堡套餐',	'紐奧良烤雞腿堡X1、香酥脆薯(中)X1、百事可樂(中)X1',	'img/個人/紐奧良烤雞腿堡套餐.jpg',	'img/個人小張/紐奧良烤雞腿堡套餐.jpg',	129,	'個人餐',	NULL,	NULL),
(31,	'8塊上校雞塊套餐',	'上校雞塊X8、香酥脆薯(中)X1、百事可樂(中)X1',	'img/個人/8塊上校雞塊套餐.jpg',	'img/個人小張/8塊上校雞塊套餐.jpg',	99,	'個人餐',	NULL,	NULL),
(32,	'吮指雙雞套餐',	'卡啦脆雞(中辣)X2、香酥脆薯(中)X1、百事可樂(中)X1、',	'img/個人/吮指雙雞套餐.jpg',	'img/個人小張/吮指雙雞套餐.jpg',	149,	'個人餐',	NULL,	NULL),
(33,	'咔啦雞腿堡套餐',	'卡啦雞腿堡X1、香酥脆薯(中)X1、百事可樂(中)X1',	'img/個人/卡拉雞腿堡套餐.jpg',	'img/個人小張/卡拉雞腿堡套餐.jpg',	129,	'個人餐',	NULL,	NULL),
(34,	'上校原味脆腿堡套餐',	'上校原味脆腿堡X1、香酥脆薯(中)X1、百事可樂(中)X1',	'img/個人/上校原味脆腿堡套餐.jpg',	'img/個人小張/上校原味脆腿堡套餐.jpg',	99,	'個人餐',	NULL,	NULL),
(35,	'花生熔岩咔啦雞腿堡餐',	'花生熔岩咔啦雞腿堡X1、香酥脆薯(中)X1、百事可樂(中)X1',	'img/個人/花生熔岩咔啦雞腿堡餐.jpg',	'img/個人小張/花生熔岩咔啦雞腿堡餐.jpg',	149,	'個人餐',	NULL,	NULL),
(36,	'上校私廚烤雞腿溫沙拉套餐',	'上校私廚烤雞腿溫沙拉X1、玉米濃湯(小)X1',	'img/個人/上校私廚烤雞腿溫沙拉套餐.jpg',	'img/個人小張/上校私廚烤雞腿溫沙拉套餐.jpg',	149,	'個人餐',	NULL,	NULL);

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('HkXuesdIKRabJqnhldyJEiUsiqxlYHAILOs0WBMf',	1,	'::1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36',	'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiS3R6MjhCVXpQV1VNM05JS283YkFLcFdqc3FheUVIQlFRUDV0NjhwVCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRRRDhubXRzWE11UWFZU29PSHJxUS5lRHpKL2JCSXcuSU1XbVY0ei9mWHdUbFpsa2hYUVlzQyI7fQ==',	1609850305),
('pl1jtlOKmwVBBlYdNJSJtcpAih2WMqomws8pAZaV',	NULL,	'::1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiODFwUFN0VnV4NW5WZTB6eHpWenRBbDFQRWhmeGVHOUtSNWE0dzZpcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1609846640);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '會員',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `account`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `name`, `email`, `email_verified_at`, `address`, `telephone`, `type`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1,	'benabcd5779',	'$2y$10$QD8nmtsXMuQaYSoOHrqQ.eDzJ/bBIw.IMWmV4z/fXwTlZlkhXQYsC',	NULL,	NULL,	'胡東霖',	'benabcd5779@gmail.com',	NULL,	'台中市豐原區建成路69號',	'0955102930',	'管理員',	'suLGxqCu6zLF7CgniJeuVd3jxPeuMYUg9YC8OLApYBRCN4oh9kvCjlYEw9ql',	NULL,	NULL,	'2020-12-18 07:26:40',	'2020-12-18 09:31:06'),
(2,	'a01',	'$2y$10$7q98KwMGVhIy4EFjuEenP./9ETy5bXZblBK7.4NfVjWdqvjvBlV26',	NULL,	NULL,	'王曉明',	'a01@gmail.com',	NULL,	'台中市太平區中山路二段57號',	'0800000123',	'會員',	NULL,	NULL,	NULL,	'2020-12-19 05:26:23',	'2020-12-19 05:26:23'),
(3,	'a02',	'$2y$10$5JH1JjQdLKsJ5wJS.9puNeKFmEQJcF5NzsY45u/YCRuBxMAuDzT6e',	NULL,	NULL,	'無雨汝',	'a02@gmail.com',	NULL,	'台中市太平區中山路二段58號',	'0800123456',	'會員',	NULL,	NULL,	NULL,	'2020-12-19 05:28:33',	'2020-12-19 05:28:33');

-- 2021-01-05 13:24:58
