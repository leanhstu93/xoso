-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 06, 2019 lúc 05:17 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `yii2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` int(4) NOT NULL,
  `date_create` int(4) NOT NULL,
  `date_update` int(4) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(4) DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `user_id`, `date_create`, `date_update`, `name`, `image`, `desc`, `link`, `category_id`, `content`, `active`) VALUES
(1, 1, 1565536174, 1572625501, 'slide 1', 'upload/images/banner-slide/h-design-banner-3.png', '', '', 1, '', 1),
(2, 1, 1565536187, 1572710630, 'slide 2', 'upload/images/banner-slide/h-design-banner-1.png', '', '', 1, '', 1),
(3, 1, 1565882490, 1572711542, 'banner 3', 'upload/images/banner-slide/h-design-banner-2-1.png', '', '', 3, '', 1),
(4, 1, 1565882505, 1565882505, 'banner 3', '/admin/upload/files/image-1.jpg', '', '', 3, '', 1),
(5, 1, 1565882513, 1565882513, 'banner 3', '/admin/upload/files/image-1.jpg', '', '', 3, '', 1),
(6, 1, 1565883535, 1572711592, 'Marketing Sáng Tạo', 'upload/images/banner-slide/h-design-banner-2-1.png', '', '', 1, '', 1),
(7, 1, 1566399929, 1566661311, 'Hdesign thiết kế sáng tạo - Digital Marketing', '/admin/upload/files/1%20(1).jpg', 'Hdesign thiết kế sáng tạo - Digital Marketing', '', 4, '', 1),
(8, 1, 1570208355, 1570210341, 'Adams', 'upload/images/author-thumb-1.jpg', '<p>update</p>\r\n', '', 5, '', 1),
(9, 1, 1570210366, 1570210366, 'Lisa', 'upload/images/author-thumb-2.jpg', '', '', 5, '', 1),
(10, 1, 1570210380, 1570210380, 'Toni', 'upload/images/author-thumb-3.jpg', '', '', 5, '', 1),
(11, 1, 1570629704, 1572717769, 'Mang đến giá trị bạn cần', 'upload/images/author-2.jpg', '', '', 6, '<p>Z. Gartrell Wright</p>\r\n\r\n<p>HR Department</p>\r\n\r\n<ul>\r\n	<li><a href=\"http://yii2dev.com:93/#\">example@example.com</a></li>\r\n	<li>07520-664-45</li>\r\n</ul>\r\n', 1),
(12, 1, 1570896935, 1570896935, 'Banner 1', 'upload/images/5.jpg', '', '', 7, '', 1),
(13, 1, 1572365937, 1572365937, 'Banner 1', 'upload/images/ins/thumb-1.jpg', '', '', 8, '', 1),
(14, 1, 1572365945, 1572365945, 'Banner 1', 'upload/images/ins/thumb-2.jpg', '', '', 8, '', 1),
(15, 1, 1572365950, 1572365950, 'Banner 1', 'upload/images/ins/thumb-3.jpg', '', '', 8, '', 1),
(16, 1, 1572365983, 1572365983, 'Banner 1', 'upload/images/ins/thumb-4.jpg', '', '', 8, '', 1),
(17, 1, 1572366036, 1572366036, 'Banner 5', 'upload/images/ins/thumb-5.jpg', '', '', 8, '', 1),
(18, 1, 1572366042, 1572366042, 'Banner 5', 'upload/images/ins/thumb-6.jpg', '', '', 8, '', 1),
(19, 1, 1572448681, 1572448681, 'Banner 1', 'upload/images/banner-left/7.jpg', '', '', 9, '', 1),
(20, 1, 1572625714, 1572716978, 'Chụp hình quảng cáo', 'upload/images/icon/icon-1.png', '', '', 10, '', 1),
(21, 1, 1572625721, 1572716955, 'Video marketing online', 'upload/images/icon/icon-2.png', '', '', 10, '', 1),
(22, 1, 1572625726, 1572716939, 'Marketing online', 'upload/images/icon/icon-3.png', '', '', 10, '', 1),
(23, 1, 1572625735, 1572716925, 'Thiết kế lập trình website', 'upload/images/icon/icon-4.png', '', '', 10, '', 1),
(24, 1, 1572625741, 1572716812, 'Thiết kế sáng tạo', 'upload/images/icon/icon-5.png', '', '', 10, '', 1),
(25, 1, 1572625752, 1572716798, 'Thiết kế online', 'upload/images/icon/icon-6.png', '', '', 10, '', 1),
(26, 1, 1572718006, 1572718006, 'Logo footer', 'upload/images/logo-hdesign%20(1).png', '', '', 11, '', 1),
(27, 1, 1573056181, 1573056181, 'Banner top service', 'upload/images/banner-top-service/banner%202.png', '', '', 12, '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner_category`
--

CREATE TABLE IF NOT EXISTS `banner_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `seo_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(4) NOT NULL,
  `date_update` int(4) NOT NULL,
  `date_create` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `banner_category`
--

INSERT INTO `banner_category` (`id`, `name`, `seo_name`, `desc`, `content`, `active`, `user_id`, `date_update`, `date_create`) VALUES
(1, 'slide', 'slide', '', NULL, 1, 1, 1565535520, 1565097413),
(3, '3 banner dưới banner slide', '3-banner-duoi-banner-slide', '', NULL, 1, 1, 1565882422, 1565882422),
(4, 'Tại sao chọn', 'tai-sao-chon', '', NULL, 1, 1, 1566399876, 1566399876),
(5, 'Danh sách cảm nhận khách hàng', 'danh-sach-cam-nhan-khach-hang', '', NULL, 1, 1, 1566917284, 1566917284),
(6, 'Banner trên footer', 'banner-tren-footer', '', NULL, 1, 1, 1570629675, 1570629675),
(7, 'Banner đầu trang con', 'banner-dau-trang-con', '', NULL, 1, 1, 1570896864, 1570896864),
(8, 'Instagram Feed', 'instagram-feed', '', NULL, 1, 1, 1572365825, 1572365825),
(9, 'Banner left single page', 'banner-left-single-page', '', NULL, 1, 1, 1572448644, 1572448644),
(10, 'banner dich vụ', 'banner-dich-vu', '', NULL, 1, 1, 1572625609, 1572625609),
(11, 'Banner logo footer', 'banner-logo-footer', '', NULL, 1, 1, 1572717948, 1572717948),
(12, 'Banner top trang dịch vụ', 'banner-top-trang-dich-vu', '', NULL, 1, 1, 1573056107, 1573056107);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `member_id` int(4) DEFAULT NULL,
  `date_create` int(4) DEFAULT NULL,
  `fullname` int(50) DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `receive_fullname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `receive_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `receive_phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `receive_address` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `status` tinyint(1) DEFAULT NULL,
  `total_cost` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE IF NOT EXISTS `bill_detail` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `product_id` int(4) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `bill_id` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_items`
--

CREATE TABLE IF NOT EXISTS `cart_items` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` int(4) NOT NULL,
  `product_id` int(4) NOT NULL,
  `quantity` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `favicon` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `google` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `favicon`, `logo`, `email`, `fax`, `tel`, `phone`, `facebook`, `twitter`, `google`, `youtube`, `meta_title`, `meta_keyword`, `meta_desc`) VALUES
(1, 'Hdesign', '528 Huỳnh Tấn Phát, P. Bình Thuận, Q.7, TP. HCM', 'upload/images/logo-hdesign%20(3).png', 'upload/images/logo-hdesign%20(3).png', '', '', '', '0909 651 650', '', '', '', 'a', 'Hdesign', 'Hdesign', 'Hdesign');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `config_page`
--

CREATE TABLE IF NOT EXISTS `config_page` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `seo_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `conten` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `meta_title` text,
  `meta_desc` text,
  `meta_keyword` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `config_page`
--

INSERT INTO `config_page` (`id`, `name`, `seo_name`, `type`, `desc`, `conten`, `meta_title`, `meta_desc`, `meta_keyword`, `status`, `image`, `tags`) VALUES
(1, 'Dịch vụ', 'dich-vu', 1, 'Hdesign giải pháp thương hiệu marketing', '<p>Hdesign giải ph&aacute;p thương hiệu marketing</p>\r\n', '', '', '', 1, '/admin/upload/files/2.jpg', NULL),
(2, 'Tin tức1', 'tin-tuc', 7, '', '', '', '', '', 1, '/admin/upload/files/Screenshot.png', 'design, logo, banner, dev'),
(3, 'Dự án', 'du-an-157124234740', 9, '', '', '', '', '', 1, '', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `config_website`
--

CREATE TABLE IF NOT EXISTS `config_website` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `setting` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `custom`
--

CREATE TABLE IF NOT EXISTS `custom` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `data` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `custom`
--

INSERT INTO `custom` (`id`, `data`) VALUES
(1, '{\"settingLanguage\":{\"vi\":{\"home\":\"Trang chủ\",\"phone\":\"Gửi\"},\"us\":{\"home\":\"Home \",\"phone\":\"Send\"}},\"settingTemplate\":{\"CUSTOM_IMAGE\":{\"slide\":{\"data\":\"1\"},\"list_banner_service\":{\"data\":\"10\"},\"one_banner_top_service\":{\"data\":\"12\"},\"one_banner_logo_footer\":{\"data\":\"11\"},\"background_middle_one\":{\"data\":\"4\"},\"list_customer\":{\"data\":\"5\"},\"one_before_footer\":{\"data\":\"6\"},\"list_image_project_footer\":{\"data\":\"5\"},\"one_page_title\":{\"data\":\"7\"},\"list_instagram_feed\":{\"data\":\"8\"},\"list_banner_single_page_left\":{\"data\":\"9\"}},\"CUSTOM_SINGLE_PAGE\":{\"one_middle_home\":{\"data\":[\"4\"]},\"tree_middle_home\":{\"data\":[\"6\",\"7\",\"8\"]},\"footer_list_col_link_1\":{\"data\":[\"4\",\"5\",\"6\",\"7\",\"8\"]},\"footer_list_col_link_2\":{\"data\":[\"4\",\"5\",\"6\",\"7\",\"8\"]}},\"CUSTOM_NEWS_CATEGORY\":{\"home_news\":{\"data\":\"3\"}}}}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `data_lang`
--

CREATE TABLE IF NOT EXISTS `data_lang` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_object` int(4) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `type` tinyint(1) NOT NULL,
  `code_lang` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `data_lang`
--

INSERT INTO `data_lang` (`id`, `id_object`, `name`, `desc`, `content`, `type`, `code_lang`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(2, 31, 'Business Leadership  in RSA', '', '', 1, 'us', NULL, NULL, NULL),
(3, 31, 'Business Leadership  in RSA', 'Business Leadership  in RSA', '', 1, 'us', NULL, NULL, NULL),
(4, 31, 'Business Leadership  in RSA', 'Business Leadership  in RSA', '', 1, 'us', NULL, NULL, NULL),
(5, 31, 'Business Leadership  in RSA', 'Business Leadership  in RSA', '', 1, 'us', NULL, NULL, NULL),
(6, 31, 'Business Leadership  in RSA', 'Business Leadership  in RSA', '', 1, 'us', NULL, NULL, NULL),
(14, 39, 'Product 9', '', '', 1, 'us', NULL, NULL, NULL),
(28, 40, 'Bản thiết kế #5656', '', '', 1, 'us', NULL, NULL, NULL),
(29, 40, 'Bản thiết kế #5656', '', '', 1, 'us', NULL, NULL, NULL),
(30, 41, 'Product 7', '', '', 1, 'us', NULL, NULL, NULL),
(31, 40, 'Bản thiết kế #5656', '', '', 1, 'us', NULL, NULL, NULL),
(32, 41, 'Product 7', '', '', 1, 'us', NULL, NULL, NULL),
(33, 41, 'Product 7', '', '', 1, 'us', NULL, NULL, NULL),
(34, 42, 'Bản thiết kế #667', '', '', 1, 'us', NULL, NULL, NULL),
(35, 43, 'Bản thiết kế #67676', '', '', 1, 'us', NULL, NULL, NULL),
(36, 44, 'Bản thiết kế #7555', '', '', 1, 'us', NULL, NULL, NULL),
(37, 45, 'Bản thiết kế #78411', '', '', 1, 'us', NULL, NULL, NULL),
(38, 46, 'Bản thiết kế #7844555', '', '', 1, 'us', NULL, NULL, NULL),
(39, 47, 'Bản thiết kế #784777', '', '', 1, 'us', NULL, NULL, NULL),
(40, 48, 'Bản thiết kế #784777', '', '', 1, 'us', NULL, NULL, NULL),
(41, 49, 'Bản thiết kế #78222', '', '', 1, 'us', NULL, NULL, NULL),
(42, 50, 'Bản thiết kế #20FGY', '', '', 1, 'us', NULL, NULL, NULL),
(43, 51, 'Bản thiết kế #2GBDD', '', '', 1, 'us', NULL, NULL, NULL),
(44, 52, 'Bản thiết kế #MFGGG', '', '', 1, 'us', NULL, NULL, NULL),
(45, 53, 'Bản thiết kế #MNNNN', '', '', 1, 'us', NULL, NULL, NULL),
(46, 54, 'Bản thiết kế #UJDDD', '', '', 1, 'us', NULL, NULL, NULL),
(47, 55, 'Bản thiết kế #POOOZ', '', '', 1, 'us', NULL, NULL, NULL),
(48, 56, 'Bản thiết kế #PMOLL', '', '', 1, 'us', NULL, NULL, NULL),
(49, 57, 'Bản thiết kế #PMZAL', '', '', 1, 'us', NULL, NULL, NULL),
(50, 58, 'Bản thiết kế #PZALOP', '', '', 1, 'us', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `form`
--

CREATE TABLE IF NOT EXISTS `form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` int(4) DEFAULT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `form`
--

INSERT INTO `form` (`id`, `name`, `phone`, `email`, `date`, `desc`, `status`) VALUES
(4, 'tuan anh', '34343', 'le@gmail.com', 1570638060, NULL, 1),
(5, 'tuan anh', '222', 'a@gmail.com', 1570638282, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gallery_image`
--

CREATE TABLE IF NOT EXISTS `gallery_image` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` int(4) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `date_create` int(4) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `date_update` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `gallery_image`
--

INSERT INTO `gallery_image` (`id`, `user_id`, `name`, `seo_name`, `image`, `desc`, `content`, `date_create`, `active`, `date_update`) VALUES
(11, 1, 'dự án #6767676', 'du-an-6767676', 'upload/images/project/H-Catalogue-0001_psd.png', '', '', 1572165055, 1, 1572165055),
(12, 1, 'dự án #56565', 'du-an-56565', 'upload/images/project/H-Catalogue-0002.png', '', '', 1572165069, 1, 1572165069),
(13, 1, 'dự án #56676', 'du-an-56676', 'upload/images/project/H-Catalogue-0003.png', '', '', 1572165173, 1, 1572165173),
(14, 1, 'dự án #566898', 'du-an-566898', 'upload/images/project/H-Catalogue-0004.png', '', '', 1572165184, 1, 1572165184),
(15, 1, 'dự án #59898', 'du-an-59898', 'upload/images/project/H-Catalogue-0006.png', '', '', 1572165194, 1, 1572165194),
(16, 1, 'dự án #5898908', 'du-an-5898908', 'upload/images/project/H-Catalogue-0007.png', '', '', 1572165204, 1, 1572165204),
(17, 1, 'dự án #090965', 'du-an-090965', 'upload/images/project/H-Catalogue-0007.png', '', '', 1572165211, 1, 1572165211),
(18, 1, 'dự án #878979', 'du-an-878979', 'upload/images/project/H-Catalogue-0008.png', '', '', 1572165221, 1, 1572165221),
(19, 1, 'dự án #878979', 'du-an-878979-157216523235', 'upload/images/project/H-Catalogue-0009.png', '', '', 1572165232, 1, 1572165232),
(20, 1, 'dự án #78989', 'du-an-78989', 'upload/images/project/H-Catalogue-0010.png', '', '', 1572165245, 1, 1572165245),
(21, 1, 'dự án #7867676', 'du-an-7867676', 'upload/images/project/H-Catalogue-0011.png', '', '', 1572165255, 1, 1572165255);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '0',
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `group` tinyint(1) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `date_created` int(4) NOT NULL,
  `limit_login` int(4) NOT NULL DEFAULT '0',
  `idRole` int(1) DEFAULT '0',
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `member`
--

INSERT INTO `member` (`id`, `fullname`, `avatar`, `gender`, `address`, `email`, `phone`, `is_admin`, `group`, `username`, `password`, `note`, `date_created`, `limit_login`, `idRole`, `password_reset_token`, `password_hash`, `verification_token`, `auth_key`, `status`) VALUES
(1, 'Lê Văn tuấn anh', NULL, 1, NULL, NULL, NULL, 1, 0, 'admin', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 1, 0, 0, NULL, NULL, NULL, 'test100key', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `data` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id`, `data`) VALUES
(1, '[{\"name\":\"Trang ch\\u1ee7\",\"id\":\"mn_home\",\"module\":\"home\",\"link\":\"ourhome\",\"type\":99},{\"id\":\"mn_single_page_5\",\"name\":\"Gi\\u1edbi thi\\u1ec7u\",\"module\":\"single-page\",\"link\":\"\\/single-page\\/update\\/5\"},{\"name\":\"D\\u1ecbch v\\u1ee5\",\"id\":\"mn_product\",\"module\":\"product\",\"link\":\"\\/product\\/config\",\"type\":1},{\"name\":\"Tin t\\u1ee9c\",\"id\":\"mn_news\",\"module\":\"news\",\"link\":\"news\\/config\",\"type\":7},{\"id\":\"mn_single_page_7\",\"name\":\"T\\u1ea7m nh\\u00ecn\",\"module\":\"single-page\",\"link\":\"\\/single-page\\/update\\/7\"},{\"name\":\"Li\\u00ean h\\u1ec7\",\"id\":\"mn_contact\",\"module\":\"contact\",\"link\":\"javascrip:;\",\"type\":11},{\"name\":\"D\\u1ef1 \\u00e1n\",\"id\":\"mn_gallery-image\",\"module\":\"gallery-image\",\"link\":\"gallery-image\\/config\",\"type\":9}]');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `meta`
--

CREATE TABLE IF NOT EXISTS `meta` (
  `id_meta` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL,
  `robots_index` enum('INDEX','NOINDEX') DEFAULT NULL,
  `robots_follow` enum('FOLLOW','NOFOLLOW') DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` text,
  `description` text,
  `info` text,
  `sitemap` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `sitemap_change_freq` varchar(20) DEFAULT NULL,
  `sitemap_priority` varchar(4) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_meta`),
  UNIQUE KEY `hash` (`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1563562433),
('m141023_143432_table_meta', 1563562612);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `seo_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(4) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(4) NOT NULL,
  `date_create` int(4) NOT NULL,
  `date_update` int(4) NOT NULL,
  `count_view` int(4) NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `option` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `category_id` (`category_id`),
  KEY `category_id_2` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `name`, `seo_name`, `category_id`, `order`, `image`, `desc`, `content`, `alias`, `tags`, `user_id`, `date_create`, `date_update`, `count_view`, `meta_title`, `meta_desc`, `meta_keyword`, `active`, `option`) VALUES
(1, 'tin tuc 1', 'tin-tuc-1', 1, 0, 'upload/images/news/4.jpg', '', '', NULL, '', 1, 1564851842, 1572361593, 1, '', '', '', 1, 3),
(2, 'Dịch vụ thiết kế sáng tạo 1', 'dich-vu-thiet-ke-sang-tao-1', 3, 0, 'upload/images/news/4.jpg', '', '', NULL, '', 1, 1570211295, 1572361604, 1, '', '', '', 1, 3),
(3, 'Dịch vụ thiết kế sáng tạo 2', 'dich-vu-thiet-ke-sang-tao-2', 3, 0, 'upload/images/news-2-1.jpg', '', '', NULL, '', 1, 1570211306, 1570211853, 1, '', '', '', 1, 3),
(4, 'Dịch vụ thiết kế sáng tạo 1', 'dich-vu-thiet-ke-sang-tao-1-157021131556', 3, 0, 'upload/images/news-2-1.jpg', '', '', NULL, '', 1, 1570211315, 1570211866, 1, '', '', '', 1, 3),
(5, 'Dịch vụ thiết kế sáng tạo 3', 'dich-vu-thiet-ke-sang-tao-3', 3, 0, '', '', '', NULL, '', 1, 1570211322, 1570211322, 1, '', '', '', 1, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_category`
--

CREATE TABLE IF NOT EXISTS `news_category` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `seo_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `tags` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `option` tinyint(1) NOT NULL DEFAULT '0',
  `meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(4) NOT NULL DEFAULT '0',
  `display_order` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(4) NOT NULL,
  `date_create` int(4) NOT NULL,
  `date_update` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `news_category`
--

INSERT INTO `news_category` (`id`, `name`, `seo_name`, `desc`, `content`, `tags`, `option`, `meta_title`, `meta_desc`, `meta_keyword`, `parent_id`, `display_order`, `image`, `active`, `user_id`, `date_create`, `date_update`) VALUES
(1, 'Thiết Kế Online', 'thiet-ke-online-157236323654', '', NULL, '', 1, '', '', '', 0, 0, '/admin/upload/files/image-1.jpg', 1, 1, 1565021934, 1572363236),
(3, 'Thiết Kế Sáng Tạo', 'thiet-ke-sang-tao', '', NULL, '', 1, '', '', '', 0, 0, '/admin/upload/files/image-1.jpg', 1, 1, 1565883455, 1565883455),
(4, 'Thiết kế lập trình websites', 'thiet-ke-lap-trinh-websites', '', NULL, '', 1, '', '', '', 0, 0, '/admin/upload/files/image-1.jpg', 1, 1, 1565883570, 1565883570),
(5, 'Marketing Online', 'marketing-online', '', NULL, '', 1, '', '', '', 0, 0, '/admin/upload/files/image-1.jpg', 1, 1, 1565883592, 1565883592),
(6, 'Video Marketing', 'video-marketing', '', NULL, '', 1, '', '', '', 0, 0, '/admin/upload/files/image-1.jpg', 1, 1, 1565883619, 1565883619),
(7, 'Chụp hình quảng cáo', 'chup-hinh-quang-cao', '', NULL, '', 1, '', '', '', 0, 0, '/admin/upload/files/image-1.jpg', 1, 1, 1565883645, 1565883645),
(8, 'thiet ke online 1', 'thiet-ke-online-1', '', NULL, '', 5, '', '', '', 1, 0, '', 1, 1, 1572362395, 1572363936),
(9, 'thiet ke online 1.1', 'thiet-ke-online-1-1', '', NULL, '', 5, '', '', '', 8, 0, '', 1, 1, 1572362412, 1572363927);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sku` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `tags` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `count_view` int(4) NOT NULL DEFAULT '1',
  `user_id` int(4) NOT NULL DEFAULT '0',
  `date_update` int(11) NOT NULL,
  `seo_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `target_blank` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `option` tinyint(1) NOT NULL DEFAULT '0',
  `quantity` int(4) DEFAULT '0',
  `weight` double DEFAULT NULL,
  `price` double DEFAULT '0',
  `price_sale` double DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `sku`, `brand_name`, `desc`, `content`, `tags`, `count_view`, `user_id`, `date_update`, `seo_name`, `target_blank`, `image`, `option`, `quantity`, `weight`, `price`, `price_sale`, `active`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(40, 'Bản thiết kế #784', '', '', '', '', '', 1, 1, 1573054695, 'ban-thiet-ke-784', 0, 'upload/images/product/H-Catalogue-0001_psd.png', 3, NULL, NULL, 5000000, 4000000, 1, '', '', ''),
(41, 'Bản thiết kế #756', '', '', '', '', '', 1, 1, 1573054740, 'ban-thiet-ke-756', 0, 'upload/images/product/H-Catalogue-0002.png', 3, NULL, NULL, NULL, NULL, 1, '', '', ''),
(42, 'Bản thiết kế #787', '', '', '', '', '', 1, 1, 1573054783, 'ban-thiet-ke-787', 0, 'upload/images/product/H-Catalogue-0003.png', 3, NULL, NULL, NULL, NULL, 1, '', '', ''),
(43, 'Bản thiết kế #56565', '', '', '', '', '', 1, 1, 1573054818, 'ban-thiet-ke-56565', 0, 'upload/images/product/H-Catalogue-0004.png', 3, NULL, NULL, NULL, NULL, 1, '', '', ''),
(44, 'Bản thiết kế #1455', '', '', '', '', '', 1, 1, 1573054846, 'ban-thiet-ke-1455', 0, 'upload/images/product/H-Catalogue-0006.png', 3, NULL, NULL, NULL, NULL, 1, '', '', ''),
(45, 'Bản thiết kế #7561', '', '', '', '', '', 1, 1, 1573054876, 'ban-thiet-ke-7561', 0, 'upload/images/product/H-Catalogue-0007.png', 3, NULL, NULL, NULL, NULL, 1, '', '', ''),
(46, 'Bản thiết kế #7841024', '', '', '', '', '', 1, 1, 1573054902, 'ban-thiet-ke-7841024', 0, 'upload/images/product/H-Catalogue-0008.png', 3, NULL, NULL, NULL, NULL, 1, '', '', ''),
(47, 'Bản thiết kế #784311', '', '', '', '', '', 1, 1, 1573054941, 'ban-thiet-ke-784311', 0, 'upload/images/product/H-Catalogue-0009.png', 3, NULL, NULL, NULL, NULL, 1, '', '', ''),
(48, 'Bản thiết kế #8555', '', '', '', '', '', 1, 1, 1573054970, 'ban-thiet-ke-8555', 0, 'upload/images/product/H-Catalogue-0010.png', 3, NULL, NULL, NULL, NULL, 1, '', '', ''),
(49, 'Bản thiết kế #20333', '', '', '', '', '', 1, 1, 1573054990, 'ban-thiet-ke-20333', 0, 'upload/images/product/H-Catalogue-0011.png', 3, NULL, NULL, NULL, NULL, 1, '', '', ''),
(50, 'Bản thiết kế #20FGY', '', '', '', '', '', 1, 1, 1573055015, 'ban-thiet-ke-20fgy', 0, 'upload/images/product/H-Catalogue-0012.png', 3, NULL, NULL, NULL, NULL, 1, '', '', ''),
(51, 'Bản thiết kế #2GBDD', '', '', '', '', '', 1, 1, 1573055050, 'ban-thiet-ke-2gbdd', 0, 'upload/images/product/H-Catalogue-0013.png', 3, NULL, NULL, NULL, NULL, 1, '', '', ''),
(52, 'Bản thiết kế #MFGGG', '', '', '', '', '', 1, 1, 1573055170, 'ban-thiet-ke-mfggg', 0, 'upload/images/product/H-Catalogue-0014.png', 3, NULL, NULL, NULL, NULL, 1, '', '', ''),
(53, 'Bản thiết kế #MNNNN', '', '', '', '', '', 1, 1, 1573055250, 'ban-thiet-ke-mnnnn', 0, 'upload/images/product/H-Catalogue-0015.png', 3, NULL, NULL, NULL, NULL, 1, '', '', ''),
(54, 'Bản thiết kế #UJDDD', '', '', '', '', '', 1, 1, 1573055271, 'ban-thiet-ke-ujddd', 0, 'upload/images/product/H-Catalogue-0016.png', 3, NULL, NULL, NULL, NULL, 1, '', '', ''),
(55, 'Bản thiết kế #POOOZ', '', '', '', '', '', 1, 1, 1573055291, 'ban-thiet-ke-poooz', 0, 'upload/images/product/H-Catalogue-0017.png', 3, NULL, NULL, NULL, NULL, 1, '', '', ''),
(56, 'Bản thiết kế #PMOLL', '', '', '', '', '', 1, 1, 1573055310, 'ban-thiet-ke-pmoll', 0, 'upload/images/product/H-Catalogue-0017.png', 3, NULL, NULL, NULL, NULL, 1, '', '', ''),
(57, 'Bản thiết kế #PMZAL', '', '', '', '', '', 1, 1, 1573055329, 'ban-thiet-ke-pmzal', 0, 'upload/images/product/H-Catalogue-0018.png', 3, NULL, NULL, NULL, NULL, 1, '', '', ''),
(58, 'Bản thiết kế #PZALOP', '', '', '', '', '', 1, 1, 1573055355, 'ban-thiet-ke-pzalop', 0, 'upload/images/product/H-Catalogue-0019.png', 3, NULL, NULL, NULL, NULL, 1, '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `seo_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `parent_id` int(4) NOT NULL DEFAULT '0',
  `display_order` int(1) NOT NULL DEFAULT '0',
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `option` tinyint(1) DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `tags` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(4) NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_extend` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `product_category`
--

INSERT INTO `product_category` (`id`, `name`, `seo_name`, `parent_id`, `display_order`, `image`, `option`, `content`, `active`, `desc`, `tags`, `user_id`, `meta_title`, `meta_desc`, `meta_keyword`, `link_extend`) VALUES
(3, 'Thiết kế online', 'thiet-ke-online', 0, 0, 'upload/images/service/image-1-2.jpg', 3, NULL, 1, 'Welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or bligations of business it', '', 1, '', '', '', ''),
(5, 'Thiết kế sáng tạo', 'thiet-ke-sang-tao-156666318226', 0, 0, 'upload/images/service/image-10.jpg', 3, NULL, 1, 'A Performance culture…Don’t we already have that?. A Performance culture…Don’t we already have that?.', '', 1, '', '', '', '/thiet-ke-sang-tao-157244900355'),
(6, 'Thiết kế lập trình websites', 'thiet-ke-lap-trinh-websites-156666319373', 0, 0, 'upload/images/service/image-11.jpg', 3, NULL, 1, 'A Performance culture…Don’t we already have that?. A Performance culture…Don’t we already have that?.', '', 1, '', '', '', ''),
(7, 'Marketing Online', 'marketing-online-156666320485', 0, 0, 'upload/images/service/image-2-2.jpg', 3, NULL, 1, 'A Performance culture…Don’t we already have that?. A Performance culture…Don’t we already have that?.', '', 1, '', '', '', ''),
(8, 'Video Marketing', 'video-marketing-156666321669', 0, 0, 'upload/images/service/image-3-2.jpg', 3, NULL, 1, 'A Performance culture…Don’t we already have that?. A Performance culture…Don’t we already have that?.', '', 1, '', '', '', ''),
(9, 'Chụp hình quảng cáo', 'chup-hinh-quang-cao-156666323032', 0, 0, 'upload/images/service/image-3-2.jpg', 3, NULL, 1, 'A Performance culture…Don’t we already have that?. A Performance culture…Don’t we already have that?.', '', 1, '', '', '', ''),
(12, 'Thiết kế chung', 'thiet-ke-chung', 3, 0, 'upload/images/service/image-9.jpg', 3, NULL, 1, '', '', 1, '', '', '', ''),
(13, 'Thiết kế đặc quyền', 'thiet-ke-dac-quyen', 3, 0, '', 3, NULL, 1, '', '', 1, '', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE IF NOT EXISTS `product_image` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `product_id` int(4) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image`) VALUES
(2, 1, '/admin/upload/files/62214670_657026474760258_7060913869413154816_n.jpg'),
(3, 1, '/admin/upload/files/Screenshot.png'),
(4, 1, '/admin/upload/files/62214670_657026474760258_7060913869413154816_n.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_option`
--

CREATE TABLE IF NOT EXISTS `product_option` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `parent_id` int(4) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` tinyint(1) NOT NULL,
  `product_id` int(4) NOT NULL,
  `code_color` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `display_order` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_variants`
--

CREATE TABLE IF NOT EXISTS `product_variants` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `product_id` int(4) NOT NULL,
  `sku` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `images` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `quantity` int(4) NOT NULL DEFAULT '0',
  `price` double NOT NULL,
  `price_discount` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sku` (`sku`),
  UNIQUE KEY `sku_2` (`sku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_variant_option`
--

CREATE TABLE IF NOT EXISTS `product_variant_option` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `product_id` int(4) NOT NULL,
  `variant_id` int(4) NOT NULL,
  `option_parent_id` int(4) NOT NULL,
  `option_parent_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `option_id` int(4) NOT NULL,
  `option_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rl_product_category`
--

CREATE TABLE IF NOT EXISTS `rl_product_category` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `product_id` int(4) NOT NULL,
  `category_id` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `rl_product_category`
--

INSERT INTO `rl_product_category` (`id`, `product_id`, `category_id`) VALUES
(12, 5, 1),
(13, 22, 2),
(14, 33, 3),
(15, 33, 5),
(16, 33, 6),
(17, 33, 7),
(18, 33, 8),
(19, 33, 9),
(26, 32, 3),
(27, 32, 5),
(28, 32, 6),
(29, 32, 7),
(30, 32, 8),
(31, 32, 9),
(35, 40, 3),
(37, 41, 3),
(38, 42, 3),
(39, 42, 12),
(40, 42, 13),
(41, 43, 13),
(42, 44, 3),
(43, 44, 12),
(44, 44, 13),
(45, 45, 3),
(46, 45, 12),
(47, 45, 13),
(48, 46, 3),
(49, 46, 12),
(50, 46, 13),
(51, 47, 3),
(52, 47, 12),
(53, 47, 13),
(54, 48, 3),
(55, 48, 12),
(56, 48, 13),
(57, 49, 3),
(58, 49, 12),
(59, 49, 13),
(60, 50, 3),
(61, 50, 12),
(62, 50, 13),
(63, 51, 3),
(64, 51, 12),
(65, 51, 13),
(66, 52, 3),
(67, 52, 12),
(68, 52, 13),
(69, 53, 3),
(70, 53, 12),
(71, 53, 13),
(72, 54, 3),
(73, 54, 12),
(74, 54, 13),
(75, 55, 3),
(76, 55, 12),
(77, 55, 13),
(78, 56, 3),
(79, 56, 12),
(80, 56, 13),
(81, 57, 3),
(82, 57, 12),
(83, 57, 13),
(84, 58, 3),
(85, 58, 12),
(86, 58, 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `router`
--

CREATE TABLE IF NOT EXISTS `router` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_object` int(4) NOT NULL,
  `seo_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `type` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `router`
--

INSERT INTO `router` (`id`, `id_object`, `seo_name`, `type`) VALUES
(3, 3, 'thiet-ke-online', 3),
(8, 1, 'tin-tuc-1', 5),
(9, 1, 'thiet-ke-online-157236323654', 7),
(10, 2, 'danh-muc-tin-tuc-1-1', 7),
(11, 1, 'trang-don-1', 5),
(13, 1, 'slide', 19),
(17, 1, 'slide-1', 21),
(18, 2, 'slide-2', 21),
(19, 3, '3-banner-duoi-banner-slide', 19),
(20, 3, 'thiet-ke-sang-tao', 7),
(21, 4, 'thiet-ke-lap-trinh-websites', 7),
(22, 5, 'marketing-online', 7),
(23, 6, 'video-marketing', 7),
(24, 7, 'chup-hinh-quang-cao', 7),
(25, 4, 'thiet-ke-thoi-dai-4-0', 9),
(26, 5, 'gioi-thieu', 9),
(27, 4, 'tai-sao-chon', 19),
(35, 31, 'business-leadership-in-rsa', 1),
(43, 39, 'san-pham-1245678', 1),
(44, 6, 'su-menh', 9),
(45, 7, 'tam-nhin', 9),
(46, 8, 'gia-tri', 9),
(47, 1, 'dich-vu', 15),
(48, 5, 'thiet-ke-sang-tao-156666318226', 3),
(49, 6, 'thiet-ke-lap-trinh-websites-156666319373', 3),
(50, 7, 'marketing-online-156666320485', 3),
(51, 8, 'video-marketing-156666321669', 3),
(52, 9, 'chup-hinh-quang-cao-156666323032', 3),
(53, 5, 'danh-sach-cam-nhan-khach-hang', 19),
(56, 2, 'dich-vu-thiet-ke-sang-tao-1', 5),
(57, 3, 'dich-vu-thiet-ke-sang-tao-2', 5),
(58, 4, 'dich-vu-thiet-ke-sang-tao-1-157021131556', 5),
(59, 5, 'dich-vu-thiet-ke-sang-tao-3', 5),
(60, 6, 'banner-tren-footer', 19),
(61, 7, 'banner-dau-trang-con', 19),
(62, 3, 'du-an-157124234740', 23),
(64, 10, 'san-pham-thiet-ke-chung', 3),
(65, 11, 'san-pham-thiet-ke-dac-quyen', 3),
(66, 12, 'thiet-ke-chung', 3),
(68, 40, 'ban-thiet-ke-784', 1),
(69, 41, 'ban-thiet-ke-756', 1),
(71, 11, 'du-an-6767676', 25),
(72, 12, 'du-an-56565', 25),
(73, 13, 'du-an-56676', 25),
(74, 14, 'du-an-566898', 25),
(75, 15, 'du-an-59898', 25),
(76, 16, 'du-an-5898908', 25),
(77, 17, 'du-an-090965', 25),
(78, 18, 'du-an-878979', 25),
(79, 19, 'du-an-878979-157216523235', 25),
(80, 20, 'du-an-78989', 25),
(81, 21, 'du-an-7867676', 25),
(82, 2, 'tin-tuc', 17),
(83, 8, 'thiet-ke-online-1', 7),
(84, 9, 'thiet-ke-online-1-1', 7),
(85, 8, 'instagram-feed', 19),
(86, 9, 'banner-left-single-page', 19),
(87, 9, 'thiet-ke-sang-tao-157244900355', 9),
(88, 10, 'banner-dich-vu', 19),
(89, 11, 'banner-logo-footer', 19),
(90, 13, 'thiet-ke-dac-quyen', 3),
(91, 42, 'ban-thiet-ke-787', 1),
(92, 43, 'ban-thiet-ke-56565', 1),
(93, 44, 'ban-thiet-ke-1455', 1),
(94, 45, 'ban-thiet-ke-7561', 1),
(95, 46, 'ban-thiet-ke-7841024', 1),
(96, 47, 'ban-thiet-ke-784311', 1),
(97, 48, 'ban-thiet-ke-8555', 1),
(98, 49, 'ban-thiet-ke-20333', 1),
(99, 50, 'ban-thiet-ke-20fgy', 1),
(100, 51, 'ban-thiet-ke-2gbdd', 1),
(101, 52, 'ban-thiet-ke-mfggg', 1),
(102, 53, 'ban-thiet-ke-mnnnn', 1),
(103, 54, 'ban-thiet-ke-ujddd', 1),
(104, 55, 'ban-thiet-ke-poooz', 1),
(105, 56, 'ban-thiet-ke-pmoll', 1),
(106, 57, 'ban-thiet-ke-pmzal', 1),
(107, 58, 'ban-thiet-ke-pzalop', 1),
(108, 12, 'banner-top-trang-dich-vu', 19);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `single_page`
--

CREATE TABLE IF NOT EXISTS `single_page` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_create` int(4) NOT NULL,
  `date_update` int(4) NOT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `tags` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `count_view` int(4) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(4) NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `single_page`
--

INSERT INTO `single_page` (`id`, `name`, `image`, `seo_name`, `date_create`, `date_update`, `desc`, `content`, `tags`, `count_view`, `active`, `user_id`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(4, 'Thiết Kế Thời Đại 4.0', NULL, 'thiet-ke-thoi-dai-4-0', 1566230770, 1566230770, '', '<p>Implementing high technology solutions to transform your business.</p>\r\n\r\n<p>Know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of it is pain some great pleasure.</p>\r\n', '', 1, 1, 1, NULL, NULL, NULL),
(5, 'Giới thiệu', NULL, 'gioi-thieu', 1566232426, 1570951417, '', '', '', 1, 1, 1, NULL, NULL, NULL),
(6, 'sứ mệnh', '/admin/upload/files/feature-1.jpg', 'su-menh', 1566660803, 1566660803, 'Expound the actual teachings the ', '<p>Expound the actual teachings the</p>\r\n', '', 1, 1, 1, NULL, NULL, NULL),
(7, 'Tầm nhìn', '/admin/upload/files/feature-2.jpg', 'tam-nhin', 1566660831, 1566660831, 'Expound the actual teachings the ', '<p>Expound the actual teachings the</p>\r\n', '', 1, 1, 1, NULL, NULL, NULL),
(8, 'Giá trị', '/admin/upload/files/feature-3.jpg', 'gia-tri', 1566660849, 1566660849, 'Expound the actual teachings the ', '<p>Expound the actual teachings the</p>\r\n', '', 1, 1, 1, NULL, NULL, NULL),
(9, 'Thiết kế sáng tạo', NULL, 'thiet-ke-sang-tao-157244900355', 1572449003, 1572450401, '', '<!--What We do -->\r\n                    <div class=\"what-we-do\">\r\n                        <div class=\"row\">\r\n                            <!--Content Column-->\r\n                            <div class=\"Content-column col-md-6\">\r\n                                <div class=\"title-box\">\r\n                                    <h4>With Zuperia Advanced Analytics, you can:</h4>\r\n                                    <div class=\"text\">Owing to the claims of duty or  obligations of business it will that have to be repudiated & annoyances.</div>\r\n                                </div>\r\n                                <!-- What we do block -->\r\n                                <div class=\"what-we-do-block\">\r\n                                    <div class=\"inner-box\">\r\n                                        <div class=\"icon\"><spna class=\"icon-right\"></spna></div>\r\n                                        <h4>Develop the Strategies</h4>\r\n                                        <div class=\"text\">Except to obtain some advantage from  some chooses to enjoy a pleasure.</div>\r\n                                    </div>\r\n                                </div>\r\n                                <!-- What we do block -->\r\n                                <div class=\"what-we-do-block\">\r\n                                    <div class=\"inner-box\">\r\n                                        <div class=\"icon\"><spna class=\"icon-right\"></spna></div>\r\n                                        <h4>Decision Support</h4>\r\n                                        <div class=\"text\">Except to obtain some advantage from  some chooses to enjoy a pleasure.</div>\r\n                                    </div>\r\n                                </div>\r\n                                <!-- What we do block -->\r\n                                <div class=\"what-we-do-block\">\r\n                                    <div class=\"inner-box\">\r\n                                        <div class=\"icon\"><spna class=\"icon-right\"></spna></div>\r\n                                        <h4>Build an Organization</h4>\r\n                                        <div class=\"text\">Except to obtain some advantage from  some chooses to enjoy a pleasure.</div>\r\n                                    </div>\r\n                                </div>\r\n                                <!-- End block -->\r\n                            </div>\r\n                            <!--Image Column-->\r\n                            <div class=\"image-column col-md-6\">\r\n                                <div class=\"image\">\r\n                                    <img src=\"images/resource/single-service.jpg\" alt=\"\">\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n\r\n                    <!-- Feature -->\r\n                    <div class=\"feature-block-three-area\">\r\n                        <div class=\"row\">\r\n                            <div class=\"col-md-4\">\r\n                                <!-- Feature block three -->\r\n                                <div class=\"feature-block-three\">\r\n                                    <div class=\"inner-box\">\r\n                                        <div class=\"icon\"><span class=\"icon-idea\"></span></div>\r\n                                        <h2>Features <br>of Advanced Analytics</h2>\r\n                                    </div>\r\n                                </div>\r\n                            </div>\r\n                            <div class=\"col-md-8\">\r\n                                <div class=\"row\">\r\n                                    <!-- Feature block four -->\r\n                                    <div class=\"feature-block-four col-md-6\">\r\n                                        <div class=\"inner-box\">\r\n                                            <div class=\"quote\"><img src=\"images/icons/quote-2.png\" alt=\"\"></div>\r\n                                            <h4>Successful Marketing</h4>\r\n                                            <div class=\"text\">Foresee the pain & trouble that are bound to ensue all the equaly   fail  through shrinking.</div>\r\n                                            <div class=\"count\">01</div>\r\n                                        </div>\r\n                                    </div>\r\n                                    <!-- Feature block four -->\r\n                                    <div class=\"feature-block-four col-md-6\">\r\n                                        <div class=\"inner-box\">\r\n                                            <div class=\"quote\"><img src=\"images/icons/quote-2.png\" alt=\"\"></div>\r\n                                            <h4>Planning Strategies</h4>\r\n                                            <div class=\"text\">Indignation and dislike men who are so beguileds and demoralized the charms of pleasure.</div>\r\n                                            <div class=\"count\">02</div>\r\n                                        </div>\r\n                                    </div>\r\n                                    <!-- Feature block four -->\r\n                                    <div class=\"feature-block-four col-md-6\">\r\n                                        <div class=\"inner-box\">\r\n                                            <div class=\"quote\"><img src=\"images/icons/quote-2.png\" alt=\"\"></div>\r\n                                            <h4>Build The Next Level</h4>\r\n                                            <div class=\"text\">Power of choice is untrammelled and when nothing prevents our every pleasure to every.</div>\r\n                                            <div class=\"count\">03</div>\r\n                                        </div>\r\n                                    </div>\r\n                                    <!-- Feature block four -->\r\n                                    <div class=\"feature-block-four col-md-6\">\r\n                                        <div class=\"inner-box\">\r\n                                            <div class=\"quote\"><img src=\"images/icons/quote-2.png\" alt=\"\"></div>\r\n                                            <h4>Always Better Decisions</h4>\r\n                                            <div class=\"text\">Occur that pleasures have to be repudiated annoyances accepted  holds matters this principle.</div>\r\n                                            <div class=\"count\">04</div>\r\n                                        </div>\r\n                                    </div>\r\n                                </div>\r\n\r\n                            </div>\r\n                        </div>\r\n                    </div>', '', 1, 1, 1, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
