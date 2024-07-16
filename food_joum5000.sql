-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 22, 2020 at 03:57 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_joum5000`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_user` varchar(255) CHARACTER SET utf8 NOT NULL,
  `admin_password` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_user`, `admin_password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `contact_des` longtext NOT NULL,
  `add_time` varchar(100) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact_from`
--

CREATE TABLE `contact_from` (
  `contact_from_id` int(11) NOT NULL,
  `contact_from_name` varchar(255) NOT NULL,
  `contact_from_remark` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact_grade`
--

CREATE TABLE `contact_grade` (
  `contact_grade_id` int(11) NOT NULL,
  `contact_grade_name` varchar(255) NOT NULL,
  `contact_grade_remark` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact_list`
--

CREATE TABLE `contact_list` (
  `contact_list_id` int(11) NOT NULL,
  `contact_list_detail` text NOT NULL,
  `contact_from_id` int(11) NOT NULL,
  `contact_grade_id` int(11) NOT NULL,
  `product_service_id` int(11) NOT NULL,
  `customer_reasonbuy_id` int(11) NOT NULL,
  `customer_reasonnotbuy_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `addtime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_add_wallet`
--

CREATE TABLE `customer_add_wallet` (
  `caw_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `money_add` decimal(65,0) NOT NULL,
  `add_time` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_center`
--

CREATE TABLE `customer_center` (
  `cus_cen_id` int(11) NOT NULL,
  `cus_cen_name` varchar(100) NOT NULL,
  `cus_cen_tel` int(10) NOT NULL,
  `cus_cen_email` varchar(100) NOT NULL,
  `cus_cen_add_time` varchar(100) NOT NULL,
  `cus_cen_code` varchar(100) NOT NULL,
  `type_bu_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_group`
--

CREATE TABLE `customer_group` (
  `customer_group_id` int(11) NOT NULL,
  `customer_group_name` varchar(255) NOT NULL,
  `customer_group_remark` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_level`
--

CREATE TABLE `customer_level` (
  `customer_level_id` int(11) NOT NULL,
  `customer_level_name` varchar(255) NOT NULL,
  `customer_level_remark` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_owner`
--

CREATE TABLE `customer_owner` (
  `cus_id` int(11) NOT NULL,
  `wallet` decimal(65,0) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_address` varchar(255) NOT NULL,
  `cus_tel` varchar(15) NOT NULL,
  `cus_email` varchar(100) NOT NULL,
  `cus_birthday` varchar(20) NOT NULL,
  `customer_group_id` int(11) NOT NULL,
  `customer_level_id` int(11) NOT NULL,
  `customer_sex_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `amphur_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `cus_address_postcode` varchar(5) NOT NULL,
  `cus_remark` varchar(255) NOT NULL,
  `product_score_all` decimal(65,2) NOT NULL,
  `cus_add_time` varchar(100) NOT NULL,
  `cus_edit_time` varchar(100) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_point_gift_list`
--

CREATE TABLE `customer_point_gift_list` (
  `gift_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(255) CHARACTER SET utf8 NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `point_use` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_reasonbuy`
--

CREATE TABLE `customer_reasonbuy` (
  `customer_reasonbuy_id` int(11) NOT NULL,
  `customer_reasonbuy_name` varchar(255) NOT NULL,
  `customer_reasonbuy_remark` text NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_reasonnotbuy`
--

CREATE TABLE `customer_reasonnotbuy` (
  `customer_reasonnotbuy_id` int(11) NOT NULL,
  `customer_reasonnotbuy_name` varchar(255) NOT NULL,
  `customer_reasonnotbuy_remark` text NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_sex`
--

CREATE TABLE `customer_sex` (
  `customer_sex_id` int(11) NOT NULL,
  `customer_sex_name` varchar(255) NOT NULL,
  `customer_sex_remark` text NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_use_point_gift_list`
--

CREATE TABLE `customer_use_point_gift_list` (
  `cupgl_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `gift_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(255) CHARACTER SET utf8 NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `point_use` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `add_time` varchar(255) NOT NULL,
  `shift_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_use_wallet`
--

CREATE TABLE `customer_use_wallet` (
  `cuw_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `money_use` decimal(65,0) NOT NULL,
  `add_time` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `sale_runno` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discount_from_buy_rule`
--

CREATE TABLE `discount_from_buy_rule` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `money_if` int(11) NOT NULL,
  `money_will_discount` int(11) NOT NULL,
  `remark` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount_from_buy_rule`
--

INSERT INTO `discount_from_buy_rule` (`id`, `code`, `money_if`, `money_will_discount`, `remark`) VALUES
(1, 1, 100, 0, '111');

-- --------------------------------------------------------

--
-- Table structure for table `food_table`
--

CREATE TABLE `food_table` (
  `food_table_id` int(11) NOT NULL,
  `food_table_name` varchar(255) NOT NULL,
  `food_table_seat` int(11) NOT NULL,
  `food_table_status` int(1) NOT NULL,
  `food_table_opentime` varchar(255) NOT NULL,
  `food_brand_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_table`
--

INSERT INTO `food_table` (`food_table_id`, `food_table_name`, `food_table_seat`, `food_table_status`, `food_table_opentime`, `food_brand_id`, `user_id`, `store_id`) VALUES
(1, '1', 4, 1, '', 0, 1, 1),
(2, '2', 4, 0, '', 0, 1, 1),
(3, '3', 4, 0, '', 0, 1, 1),
(4, '4', 4, 0, '', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `log_delete_order`
--

CREATE TABLE `log_delete_order` (
  `logdo_id` int(11) NOT NULL,
  `s_ID` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `product_sale_num` int(11) NOT NULL,
  `table_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `shift_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `adddate` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_delete_order`
--

INSERT INTO `log_delete_order` (`logdo_id`, `s_ID`, `product_id`, `product_name`, `product_sale_num`, `table_name`, `shift_id`, `name`, `adddate`) VALUES
(1, 2, 1, 'pepsi', 1, '1', 1, 'Admin', '1579228706'),
(2, 1, 1, 'pepsi', 1, '1', 1, 'Admin', '1579228708'),
(3, 3, 1, 'pepsi', 1, '1', 1, 'Admin', '1579229225'),
(4, 5, 1, 'pepsi', 1, '1', 1, 'Admin', '1579229282'),
(5, 11, 1, 'pepsi', 2, '3', 1, 'Admin', '1579248252'),
(6, 14, 1, 'pepsi', 1, '4', 1, 'Admin', '1579248338'),
(7, 13, 1, 'pepsi', 1, '4', 1, 'Admin', '1579248339'),
(8, 10, 1, 'pepsi', 1, '2', 1, 'Admin', '1579248526'),
(9, 12, 1, 'pepsi', 1, '3', 1, 'Admin', '1579248532'),
(10, 15, 1, 'pepsi', 1, '4', 1, 'Admin', '1579248537'),
(11, 19, 1, 'pepsi', 1, '1', 1, 'sale1', '1579665154');

-- --------------------------------------------------------

--
-- Table structure for table `money_to_point_rule`
--

CREATE TABLE `money_to_point_rule` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `cus_money_if` decimal(65,0) NOT NULL,
  `point_will` int(11) NOT NULL,
  `remark` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `money_to_point_rule`
--

INSERT INTO `money_to_point_rule` (`id`, `code`, `cus_money_if`, `point_will`, `remark`) VALUES
(1, 1, '10', 0, 'ราคาซื้อเปลี่ยนเป็นคะแนน  ถ้าซื้อ  xxx บาท จะได้คะแนน x คะแนน  (เฉพาะสมาชิก)');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `owner_id` int(11) NOT NULL,
  `owner_logo` varchar(255) NOT NULL,
  `owner_bgimg` varchar(255) NOT NULL,
  `owner_vat` int(11) NOT NULL,
  `owner_vat_status` int(1) NOT NULL,
  `store_id` int(11) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `owner_address` varchar(255) NOT NULL,
  `owner_tax_number` varchar(100) NOT NULL,
  `province_id` int(11) NOT NULL,
  `amphur_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `postcode` int(5) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `add_time` varchar(100) NOT NULL,
  `end_time` varchar(100) NOT NULL,
  `owner_type_id` int(11) NOT NULL,
  `owner_email` varchar(100) NOT NULL,
  `owner_pass` varchar(100) NOT NULL,
  `type_bu_id` int(3) NOT NULL,
  `owner_money` int(100) NOT NULL,
  `status_pay` int(1) NOT NULL,
  `aff_id` int(10) NOT NULL,
  `aff_tag` varchar(20) NOT NULL,
  `aff_income` int(10) NOT NULL,
  `cashier_printer_ip` varchar(255) NOT NULL,
  `printer_type` int(1) NOT NULL COMMENT '1=55mm, 2=80mm',
  `printer_ul` int(1) NOT NULL COMMENT '0=usbonline,1=usboffline,2=lannetwork',
  `printer_name` varchar(255) NOT NULL,
  `printer_order_type` int(1) NOT NULL,
  `footer_slip` varchar(255) NOT NULL,
  `ads` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`owner_id`, `owner_logo`, `owner_bgimg`, `owner_vat`, `owner_vat_status`, `store_id`, `owner_name`, `owner_address`, `owner_tax_number`, `province_id`, `amphur_id`, `district_id`, `postcode`, `tel`, `add_time`, `end_time`, `owner_type_id`, `owner_email`, `owner_pass`, `type_bu_id`, `owner_money`, `status_pay`, `aff_id`, `aff_tag`, `aff_income`, `cashier_printer_ip`, `printer_type`, `printer_ul`, `printer_name`, `printer_order_type`, `footer_slip`, `ads`) VALUES
(1, '', 'pic/bg/1/1557927765e4232e264d0818c07f0d5afda9d46601.jpg', 0, 0, 1, 'Food', 'ນະຄອນຫຼວງ', '', 0, 0, 0, 0, '020 59339954', '1519664151', '', 0, '06b73f026451d2e3fb08383185fc0fbc', '06b73f026451d2e3fb08383185fc0fbc', 0, 0, 0, 0, '', 0, '192.168.0.100', 2, 0, 'xp', 0, 'ขอบคุณที่ใช้บริการค่ะ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_material`
--

CREATE TABLE `product_material` (
  `m_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_id_material` int(11) NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_price_cus`
--

CREATE TABLE `product_price_cus` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `product_price_cus` decimal(65,2) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_return_datail`
--

CREATE TABLE `product_return_datail` (
  `ID` int(11) NOT NULL,
  `return_runno` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_sale_num` int(255) NOT NULL,
  `product_price_discount` decimal(65,2) NOT NULL,
  `product_score` int(11) NOT NULL,
  `adddate` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_return_header`
--

CREATE TABLE `product_return_header` (
  `ID` int(11) NOT NULL,
  `return_runno` varchar(255) NOT NULL,
  `sale_runno` varchar(255) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `cus_address_all` text NOT NULL,
  `sumsale_discount` decimal(65,2) NOT NULL,
  `sumsale_num` int(255) NOT NULL,
  `sumsale_price` decimal(65,2) NOT NULL,
  `money_from_customer` decimal(65,2) NOT NULL,
  `money_changeto_customer` decimal(65,2) NOT NULL,
  `vat` int(2) NOT NULL,
  `product_score_all` int(11) NOT NULL,
  `adddate` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_service`
--

CREATE TABLE `product_service` (
  `product_service_id` int(11) NOT NULL,
  `product_service_name` varchar(255) NOT NULL,
  `product_service_price` int(11) NOT NULL,
  `product_service_remark` text NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_buy_detail`
--

CREATE TABLE `purchase_buy_detail` (
  `importproduct_detail_id` int(11) NOT NULL,
  `importproduct_header_code` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `importproduct_detail_pricebase` decimal(65,2) NOT NULL,
  `importproduct_detail_num` int(11) NOT NULL,
  `price_per_num` decimal(65,2) NOT NULL,
  `importproduct_detail_date` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_buy_detail`
--

INSERT INTO `purchase_buy_detail` (`importproduct_detail_id`, `importproduct_header_code`, `product_id`, `importproduct_detail_pricebase`, `importproduct_detail_num`, `price_per_num`, `importproduct_detail_date`, `owner_id`, `user_id`, `store_id`) VALUES
(1, 'PN1557928157', 1, '0.00', 1, '1.00', '1557928157', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_buy_header`
--

CREATE TABLE `purchase_buy_header` (
  `importproduct_header_id` int(11) NOT NULL,
  `importproduct_header_code` varchar(255) NOT NULL,
  `importproduct_header_refcode` varchar(50) NOT NULL,
  `importproduct_header_num` int(11) NOT NULL,
  `allprice` decimal(65,2) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `vendor_name` text NOT NULL,
  `importproduct_header_amount` decimal(65,2) NOT NULL,
  `importproduct_header_remark` varchar(255) NOT NULL,
  `importproduct_header_date` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0=new, 1=instock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_buy_header`
--

INSERT INTO `purchase_buy_header` (`importproduct_header_id`, `importproduct_header_code`, `importproduct_header_refcode`, `importproduct_header_num`, `allprice`, `vendor_id`, `vendor_name`, `importproduct_header_amount`, `importproduct_header_remark`, `importproduct_header_date`, `owner_id`, `user_id`, `store_id`, `status`) VALUES
(1, 'PN1557928157', '', 1, '1.00', 0, '', '0.00', '', '1557928157', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quotation_list_datail`
--

CREATE TABLE `quotation_list_datail` (
  `ID` int(11) NOT NULL,
  `s_ID` int(11) NOT NULL,
  `sale_runno` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_price` decimal(65,2) NOT NULL,
  `product_sale_num` int(255) NOT NULL,
  `product_price_discount` decimal(65,2) NOT NULL,
  `product_score` int(11) NOT NULL,
  `note_order` varchar(11) NOT NULL,
  `status` int(1) NOT NULL,
  `table_id` int(11) NOT NULL,
  `adddate` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `so_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_list_header`
--

CREATE TABLE `quotation_list_header` (
  `ID` int(11) NOT NULL,
  `sale_runno` varchar(255) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `cus_address_all` text NOT NULL,
  `sumsale_discount` decimal(65,2) NOT NULL,
  `sumsale_num` int(255) NOT NULL,
  `sumsale_price` decimal(65,2) NOT NULL,
  `money_from_customer` decimal(65,2) NOT NULL,
  `money_changeto_customer` decimal(65,2) NOT NULL,
  `vat` int(2) NOT NULL,
  `product_score_all` int(11) NOT NULL,
  `sale_type` int(1) NOT NULL COMMENT '1=ขายปลีก,2=ขายส่ง',
  `pay_type` int(1) NOT NULL COMMENT '1=ເງິນສົດ,2=โอน,3=บัตรเครดิต,4=ค้างชำระ',
  `reserv` int(1) NOT NULL COMMENT '1=จอง',
  `discount_last` decimal(65,2) NOT NULL COMMENT 'ส่วนลดท้ายบิล',
  `adddate` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `number_for_cus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sale_list_datail`
--

CREATE TABLE `sale_list_datail` (
  `ID` int(11) NOT NULL,
  `sale_runno` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_price` decimal(65,2) NOT NULL,
  `product_sale_num` int(255) NOT NULL,
  `product_sale_num2` int(11) NOT NULL,
  `product_price_discount` decimal(65,2) NOT NULL,
  `product_score` int(11) NOT NULL,
  `adddate` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `s_ID` int(11) NOT NULL,
  `so_order` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `note_order` varchar(255) NOT NULL,
  `shift_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sale_list_datail`
--

INSERT INTO `sale_list_datail` (`ID`, `sale_runno`, `product_id`, `product_name`, `product_code`, `product_price`, `product_sale_num`, `product_sale_num2`, `product_price_discount`, `product_score`, `adddate`, `owner_id`, `user_id`, `store_id`, `table_id`, `table_name`, `s_ID`, `so_order`, `status`, `note_order`, `shift_id`) VALUES
(1, '0000000001', 1, 'pepsi', '1579228599', '5000.00', 3, 1, '0.00', 0, '1579248190', 1, 1, 1, 2, '', 9, 3, 0, '', 1),
(2, '0000000002', 1, 'pepsi', '1579228599', '5000.00', 3, 1, '0.00', 0, '1579248393', 1, 1, 1, 1, '', 16, 3, 0, '', 1),
(3, '0000000003', 3, 'o', '1579248642', '0.00', 2, 1, '0.00', 0, '1579248755', 1, 1, 1, 1, '', 18, 2, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sale_list_datail_bak`
--

CREATE TABLE `sale_list_datail_bak` (
  `ID_auto` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `sale_runno` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_price` decimal(65,2) NOT NULL,
  `product_sale_num` int(255) NOT NULL,
  `product_sale_num2` int(11) NOT NULL,
  `product_price_discount` decimal(65,2) NOT NULL,
  `product_score` int(11) NOT NULL,
  `adddate` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `s_ID` int(11) NOT NULL,
  `so_order` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `note_order` varchar(255) NOT NULL,
  `shift_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sale_list_header`
--

CREATE TABLE `sale_list_header` (
  `ID` int(11) NOT NULL,
  `sale_runno` varchar(255) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `cus_address_all` text NOT NULL,
  `sumsale_discount` decimal(65,2) NOT NULL,
  `sumsale_num` int(255) NOT NULL,
  `sumsale_price` decimal(65,2) NOT NULL,
  `money_from_customer` decimal(65,2) NOT NULL,
  `money_changeto_customer` decimal(65,2) NOT NULL,
  `vat` int(2) NOT NULL,
  `product_score_all` int(11) NOT NULL,
  `sale_type` int(1) NOT NULL COMMENT '1=ขายปลีก,2=ขายส่ง',
  `pay_type` int(1) NOT NULL COMMENT '1=ເງິນສົດ,2=โอน,3=บัตรเครดิต,4=ค้างชำระ,5=qrpayment,6=usewallet',
  `reserv` int(1) NOT NULL COMMENT '1=จอง',
  `discount_last` decimal(65,2) NOT NULL COMMENT 'ส่วนลดท้ายบิล',
  `adddate` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_ordering_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `s_ID` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sale_list_header`
--

INSERT INTO `sale_list_header` (`ID`, `sale_runno`, `cus_name`, `cus_id`, `cus_address_all`, `sumsale_discount`, `sumsale_num`, `sumsale_price`, `money_from_customer`, `money_changeto_customer`, `vat`, `product_score_all`, `sale_type`, `pay_type`, `reserv`, `discount_last`, `adddate`, `owner_id`, `user_id`, `user_ordering_id`, `store_id`, `table_id`, `table_name`, `s_ID`, `shift_id`) VALUES
(1, '0000000001', '', 0, '', '0.00', 3, '15000.00', '333333.00', '318333.00', 0, 0, 1, 1, 0, '0.00', '1579248190', 1, 1, 0, 1, 2, '2', 0, 1),
(2, '0000000002', '', 0, '', '0.00', 3, '15000.00', '333333.00', '318333.00', 0, 0, 1, 1, 0, '0.00', '1579248393', 1, 1, 0, 1, 1, '1', 0, 1),
(3, '0000000003', '', 0, '', '0.00', 2, '0.00', '3333.00', '3333.00', 0, 0, 1, 1, 0, '0.00', '1579248755', 1, 1, 0, 1, 1, '1', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sale_list_header_bak`
--

CREATE TABLE `sale_list_header_bak` (
  `ID_auto` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `sale_runno` varchar(255) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `cus_address_all` text NOT NULL,
  `sumsale_discount` decimal(65,2) NOT NULL,
  `sumsale_num` int(255) NOT NULL,
  `sumsale_price` decimal(65,2) NOT NULL,
  `money_from_customer` decimal(65,2) NOT NULL,
  `money_changeto_customer` decimal(65,2) NOT NULL,
  `vat` int(2) NOT NULL,
  `product_score_all` int(11) NOT NULL,
  `sale_type` int(1) NOT NULL COMMENT '1=ขายปลีก,2=ขายส่ง',
  `pay_type` int(1) NOT NULL COMMENT '1=ເງິນສົດ,2=โอน,3=บัตรเครดิต,4=ค้างชำระ,5=qrpayment,6=usewallet',
  `reserv` int(1) NOT NULL COMMENT '1=จอง',
  `discount_last` decimal(65,2) NOT NULL COMMENT 'ส่วนลดท้ายบิล',
  `adddate` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `s_ID` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `user_name_del` varchar(255) NOT NULL,
  `del_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sale_list_order`
--

CREATE TABLE `sale_list_order` (
  `s_ID` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_sale_num` int(255) NOT NULL,
  `product_price_discount` decimal(65,2) NOT NULL,
  `product_score` int(11) NOT NULL,
  `note_order` varchar(255) NOT NULL,
  `adddate` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sale_list_order`
--

INSERT INTO `sale_list_order` (`s_ID`, `product_id`, `product_category_id`, `product_name`, `product_code`, `product_price`, `product_sale_num`, `product_price_discount`, `product_score`, `note_order`, `adddate`, `owner_id`, `user_id`, `store_id`, `table_id`) VALUES
(20, 1, 1, 'pepsi', '1579228599', 5000, 1, '0.00', 0, '', '1579665171', 1, 7, 1, 1),
(21, 1, 1, 'pepsi', '1579228599', 5000, 1, '0.00', 0, '', '1579665180', 1, 7, 1, 1),
(22, 1, 1, 'pepsi', '1579228599', 5000, 1, '0.00', 0, '', '1579665183', 1, 7, 1, 1),
(23, 1, 1, 'pepsi', '1579228599', 5000, 1, '0.00', 0, '', '1579665185', 1, 7, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sale_list_order_kitchen`
--

CREATE TABLE `sale_list_order_kitchen` (
  `k_ID` int(11) NOT NULL,
  `s_ID` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_sale_num` int(255) NOT NULL,
  `product_price_discount` decimal(65,2) NOT NULL,
  `product_score` int(11) NOT NULL,
  `note_order` varchar(255) NOT NULL,
  `adddate` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0=มาใหม่,1=เริ่มทำ,2=ทำเสร็จแล้ว,3=ยกเลิก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sale_list_table`
--

CREATE TABLE `sale_list_table` (
  `s_ID` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_price` decimal(65,2) NOT NULL,
  `product_sale_num` int(255) NOT NULL,
  `product_price_discount` decimal(65,2) NOT NULL,
  `product_score` int(11) NOT NULL,
  `note_order` varchar(255) NOT NULL,
  `adddate` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sale_list_table`
--

INSERT INTO `sale_list_table` (`s_ID`, `product_id`, `product_category_id`, `product_name`, `product_code`, `product_price`, `product_sale_num`, `product_price_discount`, `product_score`, `note_order`, `adddate`, `owner_id`, `user_id`, `store_id`, `table_id`, `status`) VALUES
(20, 1, 1, 'pepsi', '1579228599', '5000.00', 1, '0.00', 0, '', '1579665171', 1, 7, 1, 1, 0),
(21, 1, 1, 'pepsi', '1579228599', '5000.00', 1, '0.00', 0, '', '1579665180', 1, 7, 1, 1, 0),
(22, 1, 1, 'pepsi', '1579228599', '5000.00', 1, '0.00', 0, '', '1579665183', 1, 7, 1, 1, 0),
(23, 1, 1, 'pepsi', '1579228599', '5000.00', 1, '0.00', 0, '', '1579665185', 1, 7, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sale_list_table_move_log`
--

CREATE TABLE `sale_list_table_move_log` (
  `ID` int(11) NOT NULL,
  `old_table_id` int(11) NOT NULL,
  `new_table_id` int(11) NOT NULL,
  `mover` varchar(255) NOT NULL,
  `move_date` varchar(255) NOT NULL,
  `s_ID` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_price` decimal(65,2) NOT NULL,
  `product_sale_num` int(255) NOT NULL,
  `product_price_discount` decimal(65,2) NOT NULL,
  `product_score` int(11) NOT NULL,
  `note_order` varchar(255) NOT NULL,
  `adddate` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sale_table_discount_last`
--

CREATE TABLE `sale_table_discount_last` (
  `table_id` int(11) NOT NULL,
  `discount_last` decimal(65,2) NOT NULL,
  `discount_percent` int(1) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `customer_product_score_all` decimal(60,0) NOT NULL,
  `customer_wallet` decimal(60,0) NOT NULL,
  `cus_address_all` varchar(255) CHARACTER SET utf8 NOT NULL,
  `selecttable` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_table_discount_last`
--

INSERT INTO `sale_table_discount_last` (`table_id`, `discount_last`, `discount_percent`, `customer_id`, `customer_name`, `customer_product_score_all`, `customer_wallet`, `cus_address_all`, `selecttable`) VALUES
(2, '0.00', 0, 0, '', '0', '0', '', 0),
(1, '0.00', 0, 0, '', '0', '0', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_charge_rule`
--

CREATE TABLE `service_charge_rule` (
  `id` int(11) NOT NULL,
  `product_code` varchar(255) CHARACTER SET utf8 NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `servicecharge_percent` int(11) NOT NULL,
  `remark` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_charge_rule`
--

INSERT INTO `service_charge_rule` (`id`, `product_code`, `product_name`, `servicecharge_percent`, `remark`) VALUES
(1, '1529152104', 'Service Charge', 0, 'เปอร์เซ็น เพิ่มราคาจากการซื้อ เนื่องจากเป็นค่าบริกร');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `shift_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `shift_start_time` varchar(255) NOT NULL,
  `shift_end_time` varchar(255) NOT NULL,
  `shift_money_start` decimal(65,2) NOT NULL,
  `shift_money_end` decimal(65,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`shift_id`, `user_id`, `user_name`, `shift_start_time`, `shift_end_time`, `shift_money_start`, `shift_money_end`) VALUES
(1, 1, 'Admin', '1579228370', '', '100000.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `store_manager`
--

CREATE TABLE `store_manager` (
  `store_id` int(11) NOT NULL,
  `store_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `store_storename` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'ชื่อร้าน',
  `store_tel` varchar(255) NOT NULL,
  `store_email` varchar(255) NOT NULL,
  `store_password` varchar(255) NOT NULL,
  `max_user` int(10) NOT NULL,
  `store_type` int(1) NOT NULL COMMENT '0=pos , 1=ร้านอาหาร'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_manager`
--

INSERT INTO `store_manager` (`store_id`, `store_name`, `store_storename`, `store_tel`, `store_email`, `store_password`, `max_user`, `store_type`) VALUES
(1, 'yo', '11111111', '11111111', 'yo@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `supplier_card_tax` varchar(255) NOT NULL,
  `supplier_code` varchar(255) NOT NULL,
  `supplier_bd` varchar(255) NOT NULL,
  `supplier_address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `supplier_tel` varchar(255) NOT NULL,
  `supplier_image` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_ordering_table`
--

CREATE TABLE `user_ordering_table` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_owner`
--

CREATE TABLE `user_owner` (
  `user_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_type` int(2) NOT NULL COMMENT '0=พนักงานเปิดบิล,1=พนักงานขายแคชเชียร์,2=สต๊อกร้าน ,3=พนักงานคุมคลังสินค้าใหญ่,4=admin ร้าน , 9 พนักงานรับออเดอร์, 10 หน้าจอลูกค้า,15จอchef',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `store_type` int(1) NOT NULL COMMENT '0=pos , 1=ร้านอาหาร',
  `food_brand_id` int(11) NOT NULL,
  `apartment_brand_id` int(11) NOT NULL,
  `food_table_id` int(11) NOT NULL,
  `kitchen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_owner`
--

INSERT INTO `user_owner` (`user_id`, `owner_id`, `store_id`, `name`, `user_email`, `user_password`, `user_type`, `create_date`, `store_type`, `food_brand_id`, `apartment_brand_id`, `food_table_id`, `kitchen_id`) VALUES
(1, 1, 1, 'Admin', 'admin', '5594b3d057f8dac26dcc9ccef2c06d95', 4, '2018-02-26 16:56:19', 0, 0, 0, 0, 0),
(7, 1, 1, 'sale1', 's1', '6aecf3c31b664261934b9e9c19f1e30f', 1, '2020-01-22 03:49:35', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vat_rule`
--

CREATE TABLE `vat_rule` (
  `id` int(11) NOT NULL,
  `product_code` varchar(255) CHARACTER SET utf8 NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `vat_percent` int(11) NOT NULL,
  `remark` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vat_rule`
--

INSERT INTO `vat_rule` (`id`, `product_code`, `product_name`, `vat_percent`, `remark`) VALUES
(1, '1530802118', 'VAT', 0, 'เปอร์เซ็น เพิ่มราคาจากการซื้อ เนื่องจากเป็นภาษี');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `vendor_name` longtext CHARACTER SET utf8 NOT NULL,
  `vendor_address` longtext CHARACTER SET utf8 NOT NULL,
  `id_vat` varchar(255) NOT NULL,
  `vat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `whbig_exportproduct_datail`
--

CREATE TABLE `whbig_exportproduct_datail` (
  `ID` int(11) NOT NULL,
  `sale_runno` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `zone_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_sale_num` int(255) NOT NULL,
  `product_price_discount` decimal(65,2) NOT NULL,
  `product_score` int(11) NOT NULL,
  `adddate` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `whbig_exportproduct_header`
--

CREATE TABLE `whbig_exportproduct_header` (
  `ID` int(11) NOT NULL,
  `sale_runno` varchar(255) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `cus_address_all` text NOT NULL,
  `sumsale_discount` decimal(65,2) NOT NULL,
  `sumsale_num` int(255) NOT NULL,
  `sumsale_price` decimal(65,2) NOT NULL,
  `money_from_customer` decimal(65,2) NOT NULL,
  `money_changeto_customer` decimal(65,2) NOT NULL,
  `vat` int(2) NOT NULL,
  `product_score_all` int(11) NOT NULL,
  `adddate` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `whbig_importproduct_detail`
--

CREATE TABLE `whbig_importproduct_detail` (
  `importproduct_detail_id` int(11) NOT NULL,
  `importproduct_header_code` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `importproduct_detail_pricebase` decimal(65,2) NOT NULL,
  `importproduct_detail_num` int(11) NOT NULL,
  `importproduct_detail_date` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `whbig_importproduct_header`
--

CREATE TABLE `whbig_importproduct_header` (
  `importproduct_header_id` int(11) NOT NULL,
  `importproduct_header_code` int(11) NOT NULL,
  `importproduct_header_refcode` varchar(50) NOT NULL,
  `importproduct_header_num` int(11) NOT NULL,
  `importproduct_header_amount` decimal(65,2) NOT NULL,
  `importproduct_header_remark` varchar(255) NOT NULL,
  `importproduct_header_date` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wh_exportproduct_detail`
--

CREATE TABLE `wh_exportproduct_detail` (
  `importproduct_detail_id` int(11) NOT NULL,
  `importproduct_header_code` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `importproduct_detail_pricebase` decimal(65,2) NOT NULL,
  `importproduct_detail_num` int(11) NOT NULL,
  `importproduct_detail_date` varchar(255) NOT NULL,
  `lotno` varchar(255) NOT NULL,
  `date_end` varchar(255) NOT NULL,
  `date_end2` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wh_exportproduct_header`
--

CREATE TABLE `wh_exportproduct_header` (
  `importproduct_header_id` int(11) NOT NULL,
  `importproduct_header_code` int(11) NOT NULL,
  `importproduct_header_refcode` varchar(50) NOT NULL,
  `importproduct_header_num` int(11) NOT NULL,
  `importproduct_header_amount` decimal(65,2) NOT NULL,
  `importproduct_header_remark` varchar(255) NOT NULL,
  `importproduct_header_date` varchar(255) NOT NULL,
  `lotno` varchar(255) NOT NULL,
  `date_end` varchar(255) NOT NULL,
  `date_end2` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wh_importproduct_detail`
--

CREATE TABLE `wh_importproduct_detail` (
  `importproduct_detail_id` int(11) NOT NULL,
  `importproduct_header_code` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `importproduct_detail_pricebase` decimal(65,2) NOT NULL,
  `importproduct_detail_num` int(11) NOT NULL,
  `importproduct_detail_date` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wh_importproduct_header`
--

CREATE TABLE `wh_importproduct_header` (
  `importproduct_header_id` int(11) NOT NULL,
  `importproduct_header_code` int(11) NOT NULL,
  `importproduct_header_refcode` varchar(50) NOT NULL,
  `importproduct_header_num` int(11) NOT NULL,
  `importproduct_header_amount` decimal(65,2) NOT NULL,
  `importproduct_header_remark` varchar(255) NOT NULL,
  `importproduct_header_date` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wh_product_category`
--

CREATE TABLE `wh_product_category` (
  `product_category_id` int(11) NOT NULL,
  `product_category_name` varchar(255) NOT NULL,
  `printer_ip` varchar(255) NOT NULL,
  `kitchen_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wh_product_category`
--

INSERT INTO `wh_product_category` (`product_category_id`, `product_category_name`, `printer_ip`, `kitchen_id`, `owner_id`, `user_id`, `store_id`) VALUES
(1, 'ອາຫານ', '', 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wh_product_category_kitchen`
--

CREATE TABLE `wh_product_category_kitchen` (
  `kitchen_id` int(11) NOT NULL,
  `kitchen_name` varchar(255) NOT NULL,
  `printer_ip` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wh_product_list`
--

CREATE TABLE `wh_product_list` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(65,2) NOT NULL,
  `product_wholesale_price` decimal(65,2) NOT NULL,
  `product_pricebase` decimal(65,2) NOT NULL,
  `product_price_discount` decimal(65,2) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_stock_num` int(11) NOT NULL,
  `product_num_all` int(255) NOT NULL,
  `product_whbig_num` int(11) NOT NULL,
  `product_price_value` decimal(65,2) NOT NULL,
  `product_score` decimal(65,2) NOT NULL,
  `product_rank` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wh_product_list`
--

INSERT INTO `wh_product_list` (`product_id`, `product_code`, `product_name`, `product_image`, `product_price`, `product_wholesale_price`, `product_pricebase`, `product_price_discount`, `product_category_id`, `product_stock_num`, `product_num_all`, `product_whbig_num`, `product_price_value`, `product_score`, `product_rank`, `zone_id`, `supplier_id`, `owner_id`, `user_id`, `store_id`, `add_date`) VALUES
(1, '1579228599', 'pepsi', '', '5000.00', '0.00', '0.00', '0.00', 1, 100, 0, 0, '0.00', '0.00', 1579228663, 0, 0, 1, 1, 1, '2020-01-17 02:36:40'),
(2, '1579248575', 'p', '', '0.00', '0.00', '0.00', '0.00', 1, 0, 0, 0, '0.00', '0.00', 1579248584, 0, 0, 1, 1, 1, '2020-01-17 08:09:35'),
(3, '1579248642', 'o', '', '0.00', '0.00', '0.00', '0.00', 1, -1, 0, 0, '0.00', '0.00', 1579248652, 0, 0, 1, 1, 1, '2020-01-17 08:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `wh_product_other`
--

CREATE TABLE `wh_product_other` (
  `pot_ID` int(11) NOT NULL,
  `product_ot_image` varchar(255) NOT NULL,
  `product_ot_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `product_ot_price` decimal(65,0) NOT NULL,
  `show_all` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wh_product_other_list`
--

CREATE TABLE `wh_product_other_list` (
  `potl_ID` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pot_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wh_product_unit`
--

CREATE TABLE `wh_product_unit` (
  `product_unit_id` int(11) NOT NULL,
  `product_unit_name` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `zone_id` int(11) NOT NULL,
  `zone_name` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `contact_from`
--
ALTER TABLE `contact_from`
  ADD PRIMARY KEY (`contact_from_id`);

--
-- Indexes for table `contact_grade`
--
ALTER TABLE `contact_grade`
  ADD PRIMARY KEY (`contact_grade_id`);

--
-- Indexes for table `contact_list`
--
ALTER TABLE `contact_list`
  ADD PRIMARY KEY (`contact_list_id`);

--
-- Indexes for table `customer_add_wallet`
--
ALTER TABLE `customer_add_wallet`
  ADD PRIMARY KEY (`caw_id`);

--
-- Indexes for table `customer_center`
--
ALTER TABLE `customer_center`
  ADD PRIMARY KEY (`cus_cen_id`),
  ADD UNIQUE KEY `cus_cen_email` (`cus_cen_email`),
  ADD UNIQUE KEY `cus_cen_tel` (`cus_cen_tel`);

--
-- Indexes for table `customer_group`
--
ALTER TABLE `customer_group`
  ADD PRIMARY KEY (`customer_group_id`);

--
-- Indexes for table `customer_level`
--
ALTER TABLE `customer_level`
  ADD PRIMARY KEY (`customer_level_id`);

--
-- Indexes for table `customer_owner`
--
ALTER TABLE `customer_owner`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `customer_point_gift_list`
--
ALTER TABLE `customer_point_gift_list`
  ADD PRIMARY KEY (`gift_id`);

--
-- Indexes for table `customer_reasonbuy`
--
ALTER TABLE `customer_reasonbuy`
  ADD PRIMARY KEY (`customer_reasonbuy_id`);

--
-- Indexes for table `customer_reasonnotbuy`
--
ALTER TABLE `customer_reasonnotbuy`
  ADD PRIMARY KEY (`customer_reasonnotbuy_id`);

--
-- Indexes for table `customer_sex`
--
ALTER TABLE `customer_sex`
  ADD PRIMARY KEY (`customer_sex_id`);

--
-- Indexes for table `customer_use_point_gift_list`
--
ALTER TABLE `customer_use_point_gift_list`
  ADD PRIMARY KEY (`cupgl_id`);

--
-- Indexes for table `customer_use_wallet`
--
ALTER TABLE `customer_use_wallet`
  ADD PRIMARY KEY (`cuw_id`);

--
-- Indexes for table `discount_from_buy_rule`
--
ALTER TABLE `discount_from_buy_rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_table`
--
ALTER TABLE `food_table`
  ADD PRIMARY KEY (`food_table_id`);

--
-- Indexes for table `log_delete_order`
--
ALTER TABLE `log_delete_order`
  ADD PRIMARY KEY (`logdo_id`);

--
-- Indexes for table `money_to_point_rule`
--
ALTER TABLE `money_to_point_rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`owner_id`),
  ADD UNIQUE KEY `owner_email` (`owner_email`);

--
-- Indexes for table `product_material`
--
ALTER TABLE `product_material`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `product_price_cus`
--
ALTER TABLE `product_price_cus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_return_datail`
--
ALTER TABLE `product_return_datail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product_return_header`
--
ALTER TABLE `product_return_header`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product_service`
--
ALTER TABLE `product_service`
  ADD PRIMARY KEY (`product_service_id`);

--
-- Indexes for table `purchase_buy_detail`
--
ALTER TABLE `purchase_buy_detail`
  ADD PRIMARY KEY (`importproduct_detail_id`);

--
-- Indexes for table `purchase_buy_header`
--
ALTER TABLE `purchase_buy_header`
  ADD PRIMARY KEY (`importproduct_header_id`);

--
-- Indexes for table `quotation_list_datail`
--
ALTER TABLE `quotation_list_datail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `quotation_list_header`
--
ALTER TABLE `quotation_list_header`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sale_list_datail`
--
ALTER TABLE `sale_list_datail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sale_list_datail_bak`
--
ALTER TABLE `sale_list_datail_bak`
  ADD PRIMARY KEY (`ID_auto`);

--
-- Indexes for table `sale_list_header`
--
ALTER TABLE `sale_list_header`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `sale_runno` (`sale_runno`);

--
-- Indexes for table `sale_list_header_bak`
--
ALTER TABLE `sale_list_header_bak`
  ADD PRIMARY KEY (`ID_auto`);

--
-- Indexes for table `sale_list_order`
--
ALTER TABLE `sale_list_order`
  ADD PRIMARY KEY (`s_ID`);

--
-- Indexes for table `sale_list_order_kitchen`
--
ALTER TABLE `sale_list_order_kitchen`
  ADD PRIMARY KEY (`k_ID`);

--
-- Indexes for table `sale_list_table`
--
ALTER TABLE `sale_list_table`
  ADD PRIMARY KEY (`s_ID`);

--
-- Indexes for table `sale_list_table_move_log`
--
ALTER TABLE `sale_list_table_move_log`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `service_charge_rule`
--
ALTER TABLE `service_charge_rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `store_manager`
--
ALTER TABLE `store_manager`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `user_ordering_table`
--
ALTER TABLE `user_ordering_table`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_owner`
--
ALTER TABLE `user_owner`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vat_rule`
--
ALTER TABLE `vat_rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `whbig_exportproduct_datail`
--
ALTER TABLE `whbig_exportproduct_datail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `whbig_exportproduct_header`
--
ALTER TABLE `whbig_exportproduct_header`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `whbig_importproduct_detail`
--
ALTER TABLE `whbig_importproduct_detail`
  ADD PRIMARY KEY (`importproduct_detail_id`);

--
-- Indexes for table `whbig_importproduct_header`
--
ALTER TABLE `whbig_importproduct_header`
  ADD PRIMARY KEY (`importproduct_header_id`);

--
-- Indexes for table `wh_exportproduct_detail`
--
ALTER TABLE `wh_exportproduct_detail`
  ADD PRIMARY KEY (`importproduct_detail_id`);

--
-- Indexes for table `wh_exportproduct_header`
--
ALTER TABLE `wh_exportproduct_header`
  ADD PRIMARY KEY (`importproduct_header_id`);

--
-- Indexes for table `wh_importproduct_detail`
--
ALTER TABLE `wh_importproduct_detail`
  ADD PRIMARY KEY (`importproduct_detail_id`);

--
-- Indexes for table `wh_importproduct_header`
--
ALTER TABLE `wh_importproduct_header`
  ADD PRIMARY KEY (`importproduct_header_id`);

--
-- Indexes for table `wh_product_category`
--
ALTER TABLE `wh_product_category`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `wh_product_category_kitchen`
--
ALTER TABLE `wh_product_category_kitchen`
  ADD PRIMARY KEY (`kitchen_id`);

--
-- Indexes for table `wh_product_list`
--
ALTER TABLE `wh_product_list`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- Indexes for table `wh_product_other`
--
ALTER TABLE `wh_product_other`
  ADD PRIMARY KEY (`pot_ID`);

--
-- Indexes for table `wh_product_other_list`
--
ALTER TABLE `wh_product_other_list`
  ADD PRIMARY KEY (`potl_ID`);

--
-- Indexes for table `wh_product_unit`
--
ALTER TABLE `wh_product_unit`
  ADD PRIMARY KEY (`product_unit_id`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`zone_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact_from`
--
ALTER TABLE `contact_from`
  MODIFY `contact_from_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact_grade`
--
ALTER TABLE `contact_grade`
  MODIFY `contact_grade_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact_list`
--
ALTER TABLE `contact_list`
  MODIFY `contact_list_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_add_wallet`
--
ALTER TABLE `customer_add_wallet`
  MODIFY `caw_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_center`
--
ALTER TABLE `customer_center`
  MODIFY `cus_cen_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_group`
--
ALTER TABLE `customer_group`
  MODIFY `customer_group_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_level`
--
ALTER TABLE `customer_level`
  MODIFY `customer_level_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_owner`
--
ALTER TABLE `customer_owner`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_point_gift_list`
--
ALTER TABLE `customer_point_gift_list`
  MODIFY `gift_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_reasonbuy`
--
ALTER TABLE `customer_reasonbuy`
  MODIFY `customer_reasonbuy_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_reasonnotbuy`
--
ALTER TABLE `customer_reasonnotbuy`
  MODIFY `customer_reasonnotbuy_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_sex`
--
ALTER TABLE `customer_sex`
  MODIFY `customer_sex_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_use_point_gift_list`
--
ALTER TABLE `customer_use_point_gift_list`
  MODIFY `cupgl_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_use_wallet`
--
ALTER TABLE `customer_use_wallet`
  MODIFY `cuw_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `discount_from_buy_rule`
--
ALTER TABLE `discount_from_buy_rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `food_table`
--
ALTER TABLE `food_table`
  MODIFY `food_table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `log_delete_order`
--
ALTER TABLE `log_delete_order`
  MODIFY `logdo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `money_to_point_rule`
--
ALTER TABLE `money_to_point_rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product_material`
--
ALTER TABLE `product_material`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_price_cus`
--
ALTER TABLE `product_price_cus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_return_datail`
--
ALTER TABLE `product_return_datail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_return_header`
--
ALTER TABLE `product_return_header`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_service`
--
ALTER TABLE `product_service`
  MODIFY `product_service_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase_buy_detail`
--
ALTER TABLE `purchase_buy_detail`
  MODIFY `importproduct_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `purchase_buy_header`
--
ALTER TABLE `purchase_buy_header`
  MODIFY `importproduct_header_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `quotation_list_datail`
--
ALTER TABLE `quotation_list_datail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quotation_list_header`
--
ALTER TABLE `quotation_list_header`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale_list_datail`
--
ALTER TABLE `sale_list_datail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sale_list_datail_bak`
--
ALTER TABLE `sale_list_datail_bak`
  MODIFY `ID_auto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale_list_header`
--
ALTER TABLE `sale_list_header`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sale_list_header_bak`
--
ALTER TABLE `sale_list_header_bak`
  MODIFY `ID_auto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale_list_order`
--
ALTER TABLE `sale_list_order`
  MODIFY `s_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `sale_list_order_kitchen`
--
ALTER TABLE `sale_list_order_kitchen`
  MODIFY `k_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale_list_table`
--
ALTER TABLE `sale_list_table`
  MODIFY `s_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `sale_list_table_move_log`
--
ALTER TABLE `sale_list_table_move_log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service_charge_rule`
--
ALTER TABLE `service_charge_rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `shift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `store_manager`
--
ALTER TABLE `store_manager`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_ordering_table`
--
ALTER TABLE `user_ordering_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_owner`
--
ALTER TABLE `user_owner`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `vat_rule`
--
ALTER TABLE `vat_rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `whbig_exportproduct_datail`
--
ALTER TABLE `whbig_exportproduct_datail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `whbig_exportproduct_header`
--
ALTER TABLE `whbig_exportproduct_header`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `whbig_importproduct_detail`
--
ALTER TABLE `whbig_importproduct_detail`
  MODIFY `importproduct_detail_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `whbig_importproduct_header`
--
ALTER TABLE `whbig_importproduct_header`
  MODIFY `importproduct_header_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wh_exportproduct_detail`
--
ALTER TABLE `wh_exportproduct_detail`
  MODIFY `importproduct_detail_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wh_exportproduct_header`
--
ALTER TABLE `wh_exportproduct_header`
  MODIFY `importproduct_header_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wh_importproduct_detail`
--
ALTER TABLE `wh_importproduct_detail`
  MODIFY `importproduct_detail_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wh_importproduct_header`
--
ALTER TABLE `wh_importproduct_header`
  MODIFY `importproduct_header_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wh_product_category`
--
ALTER TABLE `wh_product_category`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wh_product_category_kitchen`
--
ALTER TABLE `wh_product_category_kitchen`
  MODIFY `kitchen_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wh_product_list`
--
ALTER TABLE `wh_product_list`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wh_product_other`
--
ALTER TABLE `wh_product_other`
  MODIFY `pot_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wh_product_other_list`
--
ALTER TABLE `wh_product_other_list`
  MODIFY `potl_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wh_product_unit`
--
ALTER TABLE `wh_product_unit`
  MODIFY `product_unit_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `zone_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
