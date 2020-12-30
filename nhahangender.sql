-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for nhahangender
CREATE DATABASE IF NOT EXISTS `nhahangender` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `nhahangender`;

-- Dumping structure for table nhahangender.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nhahangender.admin: ~0 rows (approximately)
DELETE FROM `admin`;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`) VALUES
	(1, 'ender@gmail.com', '009e13e3fdf6d6c36312c77804b18df9', 'Ender', '0999999999');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table nhahangender.ban
CREATE TABLE IF NOT EXISTS `ban` (
  `IdBan` int(11) NOT NULL,
  `IdLoaiBan` int(11) NOT NULL,
  `IdSanh` int(11) NOT NULL,
  `TenBan` varchar(32) NOT NULL,
  `TrangThai` varchar(32) NOT NULL,
  PRIMARY KEY (`IdBan`),
  KEY `FK_ban_loaiban` (`IdLoaiBan`),
  KEY `FK_ban_sanh` (`IdSanh`),
  CONSTRAINT `FK_ban_loaiban` FOREIGN KEY (`IdLoaiBan`) REFERENCES `loaiban` (`IdLoaiBan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_ban_sanh` FOREIGN KEY (`IdSanh`) REFERENCES `sanh` (`IdSanh`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.ban: ~0 rows (approximately)
DELETE FROM `ban`;
/*!40000 ALTER TABLE `ban` DISABLE KEYS */;
/*!40000 ALTER TABLE `ban` ENABLE KEYS */;

-- Dumping structure for table nhahangender.ban_phieudatban
CREATE TABLE IF NOT EXISTS `ban_phieudatban` (
  `IdBan` int(11) NOT NULL,
  `IdDatBan` int(11) NOT NULL,
  PRIMARY KEY (`IdBan`,`IdDatBan`),
  KEY `IdBan` (`IdBan`),
  KEY `IdDatBan` (`IdDatBan`),
  CONSTRAINT `FK__ban` FOREIGN KEY (`IdBan`) REFERENCES `ban` (`IdBan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK__phieudatban` FOREIGN KEY (`IdDatBan`) REFERENCES `phieudatban` (`IdDatBan`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table nhahangender.ban_phieudatban: ~0 rows (approximately)
DELETE FROM `ban_phieudatban`;
/*!40000 ALTER TABLE `ban_phieudatban` DISABLE KEYS */;
/*!40000 ALTER TABLE `ban_phieudatban` ENABLE KEYS */;

-- Dumping structure for table nhahangender.catruc
CREATE TABLE IF NOT EXISTS `catruc` (
  `IdCaTruc` int(11) NOT NULL,
  `SttCa` int(11) NOT NULL,
  `GioBatDau` time NOT NULL,
  `GioKetThuc` time NOT NULL,
  PRIMARY KEY (`IdCaTruc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.catruc: ~3 rows (approximately)
DELETE FROM `catruc`;
/*!40000 ALTER TABLE `catruc` DISABLE KEYS */;
INSERT INTO `catruc` (`IdCaTruc`, `SttCa`, `GioBatDau`, `GioKetThuc`) VALUES
	(1, 1, '06:00:00', '12:00:00'),
	(2, 2, '12:00:00', '17:00:00'),
	(3, 3, '17:00:00', '22:00:00');
/*!40000 ALTER TABLE `catruc` ENABLE KEYS */;

-- Dumping structure for table nhahangender.chitietdatban
CREATE TABLE IF NOT EXISTS `chitietdatban` (
  `IdDatBan` int(11) NOT NULL,
  `IdMonAn` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  PRIMARY KEY (`IdDatBan`,`IdMonAn`),
  KEY `IdDatBan` (`IdDatBan`),
  KEY `IdMonAn` (`IdMonAn`),
  CONSTRAINT `FK_datban` FOREIGN KEY (`IdDatBan`) REFERENCES `phieudatban` (`IdDatBan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_monan` FOREIGN KEY (`IdMonAn`) REFERENCES `monan` (`IdMonAn`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.chitietdatban: ~0 rows (approximately)
DELETE FROM `chitietdatban`;
/*!40000 ALTER TABLE `chitietdatban` DISABLE KEYS */;
/*!40000 ALTER TABLE `chitietdatban` ENABLE KEYS */;

-- Dumping structure for table nhahangender.chitietdatmon
CREATE TABLE IF NOT EXISTS `chitietdatmon` (
  `IdMonAn` int(11) NOT NULL,
  `IdDatMon` int(11) NOT NULL,
  `IdNhaHang` int(11) NOT NULL,
  `SoLuongMon` int(11) NOT NULL,
  `DonGiaMon` decimal(10,0) NOT NULL,
  PRIMARY KEY (`IdMonAn`,`IdDatMon`,`IdNhaHang`),
  KEY `IdMonAn` (`IdMonAn`),
  KEY `IdDatMon` (`IdDatMon`),
  KEY `FK_chitietdatmon_nhahang` (`IdNhaHang`),
  CONSTRAINT `FK_chitietdatmon_monan` FOREIGN KEY (`IdMonAn`) REFERENCES `monan` (`IdMonAn`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_chitietdatmon_nhahang` FOREIGN KEY (`IdNhaHang`) REFERENCES `nhahang` (`IdNhaHang`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_phieudatmonan` FOREIGN KEY (`IdDatMon`) REFERENCES `phieudatmonan` (`IdDatMon`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.chitietdatmon: ~0 rows (approximately)
DELETE FROM `chitietdatmon`;
/*!40000 ALTER TABLE `chitietdatmon` DISABLE KEYS */;
/*!40000 ALTER TABLE `chitietdatmon` ENABLE KEYS */;

-- Dumping structure for table nhahangender.chucvu
CREATE TABLE IF NOT EXISTS `chucvu` (
  `IdCV` int(11) NOT NULL AUTO_INCREMENT,
  `IdLuong` int(11) NOT NULL,
  `TenCV` varchar(50) NOT NULL,
  PRIMARY KEY (`IdCV`),
  KEY `IdLuong` (`IdLuong`),
  CONSTRAINT `FK_chucvu_luong` FOREIGN KEY (`IdLuong`) REFERENCES `luong` (`IdLuong`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.chucvu: ~0 rows (approximately)
DELETE FROM `chucvu`;
/*!40000 ALTER TABLE `chucvu` DISABLE KEYS */;
/*!40000 ALTER TABLE `chucvu` ENABLE KEYS */;

-- Dumping structure for table nhahangender.khachhang
CREATE TABLE IF NOT EXISTS `khachhang` (
  `IdKH` int(11) NOT NULL AUTO_INCREMENT,
  `TenKH` varchar(100) NOT NULL,
  `GioiTinhKH` varchar(5) NOT NULL,
  `SdtKH` varchar(20) NOT NULL,
  `DiaChiKH` varchar(1000) NOT NULL,
  `TenTaiKhoan` varchar(100) NOT NULL,
  `MatKhau` varchar(32) NOT NULL,
  `TenHienThi` varchar(32) NOT NULL,
  PRIMARY KEY (`IdKH`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.khachhang: ~0 rows (approximately)
DELETE FROM `khachhang`;
/*!40000 ALTER TABLE `khachhang` DISABLE KEYS */;
INSERT INTO `khachhang` (`IdKH`, `TenKH`, `GioiTinhKH`, `SdtKH`, `DiaChiKH`, `TenTaiKhoan`, `MatKhau`, `TenHienThi`) VALUES
	(1, 'Hà Sỹ Nguyên 2', 'Nam', '0999888666', 'Cần Thơ', 'ender77', '009e13e3fdf6d6c36312c77804b18df9', 'Ender');
/*!40000 ALTER TABLE `khachhang` ENABLE KEYS */;

-- Dumping structure for table nhahangender.khachhang_sothich
CREATE TABLE IF NOT EXISTS `khachhang_sothich` (
  `IdKH` int(11) NOT NULL,
  `IdSoThich` int(11) NOT NULL,
  PRIMARY KEY (`IdKH`,`IdSoThich`),
  KEY `IdKH` (`IdKH`),
  KEY `IdSoThich` (`IdSoThich`),
  CONSTRAINT `FK_khachhang_sothich_khachhang` FOREIGN KEY (`IdKH`) REFERENCES `khachhang` (`IdKH`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_khachhang_sothich_sothich` FOREIGN KEY (`IdSoThich`) REFERENCES `sothich` (`IdSoThich`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table nhahangender.khachhang_sothich: ~0 rows (approximately)
DELETE FROM `khachhang_sothich`;
/*!40000 ALTER TABLE `khachhang_sothich` DISABLE KEYS */;
/*!40000 ALTER TABLE `khachhang_sothich` ENABLE KEYS */;

-- Dumping structure for table nhahangender.lichtruc
CREATE TABLE IF NOT EXISTS `lichtruc` (
  `IdNV` int(11) NOT NULL,
  `IdCaTruc` int(11) NOT NULL,
  `IdNgay` int(11) NOT NULL,
  `TenLichTruc` varchar(50) NOT NULL,
  PRIMARY KEY (`IdNV`,`IdCaTruc`,`IdNgay`),
  KEY `IdNV` (`IdNV`),
  KEY `IdCaTruc` (`IdCaTruc`),
  KEY `IdNgay` (`IdNgay`),
  CONSTRAINT `FK_lichtruc_catruc` FOREIGN KEY (`IdCaTruc`) REFERENCES `catruc` (`IdCaTruc`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_lichtruc_ngaytruc` FOREIGN KEY (`IdNgay`) REFERENCES `ngaytruc` (`IdNgay`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_lichtruc_nhanvien` FOREIGN KEY (`IdNV`) REFERENCES `nhanvien` (`IdNV`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.lichtruc: ~0 rows (approximately)
DELETE FROM `lichtruc`;
/*!40000 ALTER TABLE `lichtruc` DISABLE KEYS */;
/*!40000 ALTER TABLE `lichtruc` ENABLE KEYS */;

-- Dumping structure for table nhahangender.loaiban
CREATE TABLE IF NOT EXISTS `loaiban` (
  `IdLoaiBan` int(11) NOT NULL,
  `TenLoaiBan` varchar(50) NOT NULL,
  PRIMARY KEY (`IdLoaiBan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.loaiban: ~0 rows (approximately)
DELETE FROM `loaiban`;
/*!40000 ALTER TABLE `loaiban` DISABLE KEYS */;
/*!40000 ALTER TABLE `loaiban` ENABLE KEYS */;

-- Dumping structure for table nhahangender.loaimonan
CREATE TABLE IF NOT EXISTS `loaimonan` (
  `IdLoai` int(11) NOT NULL,
  `TenLoai` varchar(32) NOT NULL,
  PRIMARY KEY (`IdLoai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.loaimonan: ~5 rows (approximately)
DELETE FROM `loaimonan`;
/*!40000 ALTER TABLE `loaimonan` DISABLE KEYS */;
INSERT INTO `loaimonan` (`IdLoai`, `TenLoai`) VALUES
	(1, 'Hải Sản'),
	(2, 'Bữa Sáng'),
	(3, 'Đặc Biệt'),
	(4, 'Tráng Miệng'),
	(5, 'Bữa Tối');
/*!40000 ALTER TABLE `loaimonan` ENABLE KEYS */;

-- Dumping structure for table nhahangender.luong
CREATE TABLE IF NOT EXISTS `luong` (
  `IdLuong` int(11) NOT NULL,
  `HeSoLuong` decimal(10,0) NOT NULL,
  PRIMARY KEY (`IdLuong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.luong: ~0 rows (approximately)
DELETE FROM `luong`;
/*!40000 ALTER TABLE `luong` DISABLE KEYS */;
/*!40000 ALTER TABLE `luong` ENABLE KEYS */;

-- Dumping structure for table nhahangender.magiamgia
CREATE TABLE IF NOT EXISTS `magiamgia` (
  `IdMa` int(11) NOT NULL AUTO_INCREMENT,
  `Ma` varchar(50) NOT NULL,
  `PhanTram` int(11) NOT NULL,
  PRIMARY KEY (`IdMa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table nhahangender.magiamgia: ~2 rows (approximately)
DELETE FROM `magiamgia`;
/*!40000 ALTER TABLE `magiamgia` DISABLE KEYS */;
INSERT INTO `magiamgia` (`IdMa`, `Ma`, `PhanTram`) VALUES
	(1, 'ENDER', 10),
	(2, 'ENDER2', 20);
/*!40000 ALTER TABLE `magiamgia` ENABLE KEYS */;

-- Dumping structure for table nhahangender.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nhahangender.migrations: ~2 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2020_06_12_091855_create_admin_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table nhahangender.monan
CREATE TABLE IF NOT EXISTS `monan` (
  `IdMonAn` int(11) NOT NULL,
  `IdLoai` int(11) NOT NULL,
  `TenMon` varchar(100) NOT NULL,
  `DonGia` decimal(10,0) NOT NULL,
  `HinhAnh` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdMonAn`),
  KEY `FK_monan_loaimonan` (`IdLoai`),
  CONSTRAINT `FK_monan_loaimonan` FOREIGN KEY (`IdLoai`) REFERENCES `loaimonan` (`IdLoai`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.monan: ~6 rows (approximately)
DELETE FROM `monan`;
/*!40000 ALTER TABLE `monan` DISABLE KEYS */;
INSERT INTO `monan` (`IdMonAn`, `IdLoai`, `TenMon`, `DonGia`, `HinhAnh`) VALUES
	(1, 2, 'Bánh Mì Sandwich', 35000, 'bread-bg164.png'),
	(2, 3, 'Gà Chiên Nước Mắm', 125000, 'food670.jpg'),
	(3, 4, 'Kem Dâu Cuộn', 20000, 'food947.jpg'),
	(4, 4, 'Salad Sốt Giấm', 20000, 'food868.jpg'),
	(6, 3, 'Bia Tươi', 75000, '12359.jpg'),
	(8, 5, 'Tôm Kho Tàu', 200000, 'About-C-bg77.jpg');
/*!40000 ALTER TABLE `monan` ENABLE KEYS */;

-- Dumping structure for table nhahangender.monan_sothich
CREATE TABLE IF NOT EXISTS `monan_sothich` (
  `IdMonAn` int(11) NOT NULL,
  `IdSoThich` int(11) NOT NULL,
  PRIMARY KEY (`IdMonAn`,`IdSoThich`),
  KEY `IdMonAn` (`IdMonAn`),
  KEY `IdSoThich` (`IdSoThich`),
  CONSTRAINT `FK__monan` FOREIGN KEY (`IdMonAn`) REFERENCES `monan` (`IdMonAn`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK__sothich` FOREIGN KEY (`IdSoThich`) REFERENCES `sothich` (`IdSoThich`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table nhahangender.monan_sothich: ~0 rows (approximately)
DELETE FROM `monan_sothich`;
/*!40000 ALTER TABLE `monan_sothich` DISABLE KEYS */;
/*!40000 ALTER TABLE `monan_sothich` ENABLE KEYS */;

-- Dumping structure for table nhahangender.ngaytruc
CREATE TABLE IF NOT EXISTS `ngaytruc` (
  `IdNgay` int(11) NOT NULL AUTO_INCREMENT,
  `Ngay` date NOT NULL,
  PRIMARY KEY (`IdNgay`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.ngaytruc: ~3 rows (approximately)
DELETE FROM `ngaytruc`;
/*!40000 ALTER TABLE `ngaytruc` DISABLE KEYS */;
INSERT INTO `ngaytruc` (`IdNgay`, `Ngay`) VALUES
	(1, '2020-07-07'),
	(2, '2020-07-08'),
	(3, '2020-07-09');
/*!40000 ALTER TABLE `ngaytruc` ENABLE KEYS */;

-- Dumping structure for table nhahangender.nhahang
CREATE TABLE IF NOT EXISTS `nhahang` (
  `IdNhaHang` int(11) NOT NULL AUTO_INCREMENT,
  `TenNhaHang` varchar(1000) NOT NULL,
  `DiaChi` varchar(1000) NOT NULL,
  PRIMARY KEY (`IdNhaHang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table nhahangender.nhahang: ~0 rows (approximately)
DELETE FROM `nhahang`;
/*!40000 ALTER TABLE `nhahang` DISABLE KEYS */;
/*!40000 ALTER TABLE `nhahang` ENABLE KEYS */;

-- Dumping structure for table nhahangender.nhanvien
CREATE TABLE IF NOT EXISTS `nhanvien` (
  `IdNV` int(11) NOT NULL,
  `IdCV` int(11) NOT NULL,
  `IdNhaHang` int(11) NOT NULL,
  `TenNV` varchar(100) NOT NULL,
  `GioiTinhNV` varchar(5) NOT NULL,
  `SdtNV` char(10) NOT NULL,
  `DiaChiNV` varchar(100) NOT NULL,
  `TaiKhoanNV` varchar(32) NOT NULL,
  `MatKhauNV` varchar(32) NOT NULL,
  PRIMARY KEY (`IdNV`),
  KEY `FK_nhanvien_chucvu` (`IdCV`),
  KEY `FK_nhanvien_nhahang` (`IdNhaHang`),
  CONSTRAINT `FK_nhanvien_chucvu` FOREIGN KEY (`IdCV`) REFERENCES `chucvu` (`IdCV`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_nhanvien_nhahang` FOREIGN KEY (`IdNhaHang`) REFERENCES `nhahang` (`IdNhaHang`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.nhanvien: ~0 rows (approximately)
DELETE FROM `nhanvien`;
/*!40000 ALTER TABLE `nhanvien` DISABLE KEYS */;
/*!40000 ALTER TABLE `nhanvien` ENABLE KEYS */;

-- Dumping structure for table nhahangender.phieudatban
CREATE TABLE IF NOT EXISTS `phieudatban` (
  `IdDatBan` int(11) NOT NULL AUTO_INCREMENT,
  `IdKH` int(11) NOT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT current_timestamp(),
  `SoLuongBan` int(11) NOT NULL,
  `TinhTrang` int(11) NOT NULL,
  PRIMARY KEY (`IdDatBan`),
  KEY `FK_phieudatban_khachhang` (`IdKH`),
  CONSTRAINT `FK_phieudatban_khachhang` FOREIGN KEY (`IdKH`) REFERENCES `khachhang` (`IdKH`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.phieudatban: ~7 rows (approximately)
DELETE FROM `phieudatban`;
/*!40000 ALTER TABLE `phieudatban` DISABLE KEYS */;
INSERT INTO `phieudatban` (`IdDatBan`, `IdKH`, `ThoiGian`, `SoLuongBan`, `TinhTrang`) VALUES
	(7, 1, '2020-12-04 15:31:00', 5, 0),
	(8, 1, '2020-12-31 10:20:00', 4, 0),
	(9, 1, '2020-12-31 10:21:00', 2, 0),
	(10, 1, '2020-12-31 10:26:00', 3, 0),
	(11, 1, '2020-12-31 10:29:00', 4, 0),
	(12, 1, '2020-12-30 10:42:00', 3, 0),
	(13, 1, '2020-12-31 14:43:00', 4, 0);
/*!40000 ALTER TABLE `phieudatban` ENABLE KEYS */;

-- Dumping structure for table nhahangender.phieudatmonan
CREATE TABLE IF NOT EXISTS `phieudatmonan` (
  `IdDatMon` int(11) NOT NULL AUTO_INCREMENT,
  `IdKH` int(11) NOT NULL,
  `TongGiaTien` decimal(10,0) NOT NULL,
  `ThoiGianDat` datetime NOT NULL DEFAULT current_timestamp(),
  `PhuongThucThanhToan` int(11) NOT NULL,
  PRIMARY KEY (`IdDatMon`),
  KEY `FK_phieudatmonan_khachhang` (`IdKH`),
  CONSTRAINT `FK_phieudatmonan_khachhang` FOREIGN KEY (`IdKH`) REFERENCES `khachhang` (`IdKH`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.phieudatmonan: ~0 rows (approximately)
DELETE FROM `phieudatmonan`;
/*!40000 ALTER TABLE `phieudatmonan` DISABLE KEYS */;
INSERT INTO `phieudatmonan` (`IdDatMon`, `IdKH`, `TongGiaTien`, `ThoiGianDat`, `PhuongThucThanhToan`) VALUES
	(9, 1, 40000, '2020-12-28 15:51:44', 0);
/*!40000 ALTER TABLE `phieudatmonan` ENABLE KEYS */;

-- Dumping structure for table nhahangender.sanh
CREATE TABLE IF NOT EXISTS `sanh` (
  `IdSanh` int(11) NOT NULL,
  `IdNhaHang` int(11) NOT NULL DEFAULT 0,
  `TenSanh` varchar(50) NOT NULL,
  PRIMARY KEY (`IdSanh`),
  KEY `FK_sanh_nhahang` (`IdNhaHang`),
  CONSTRAINT `FK_sanh_nhahang` FOREIGN KEY (`IdNhaHang`) REFERENCES `nhahang` (`IdNhaHang`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.sanh: ~0 rows (approximately)
DELETE FROM `sanh`;
/*!40000 ALTER TABLE `sanh` DISABLE KEYS */;
/*!40000 ALTER TABLE `sanh` ENABLE KEYS */;

-- Dumping structure for table nhahangender.sothich
CREATE TABLE IF NOT EXISTS `sothich` (
  `IdSoThich` int(11) NOT NULL,
  `TenSoThich` int(11) NOT NULL,
  PRIMARY KEY (`IdSoThich`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table nhahangender.sothich: ~0 rows (approximately)
DELETE FROM `sothich`;
/*!40000 ALTER TABLE `sothich` DISABLE KEYS */;
/*!40000 ALTER TABLE `sothich` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
