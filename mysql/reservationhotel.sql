-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jun 2022 pada 09.25
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservationhotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `idBank` int(11) NOT NULL,
  `namaBank` varchar(20) NOT NULL,
  `namaPemilik` varchar(255) NOT NULL,
  `noRekening` int(11) NOT NULL,
  `imageUrl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`idBank`, `namaBank`, `namaPemilik`, `noRekening`, `imageUrl`) VALUES
(25, 'Mandiri', 'PT Giridorzz', 8777992, '0.75133300 1641806837logo_bank-1.jpg'),
(26, 'BCA', 'PT Giridorzz', 765992, '0.01369000 1641806858logo_bank.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `idDiskon` int(11) NOT NULL,
  `namaDiskon` varchar(255) NOT NULL,
  `idKamar` int(11) NOT NULL,
  `jmlhDiskon` int(100) NOT NULL,
  `deskripsiDiskon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`idDiskon`, `namaDiskon`, `idKamar`, `jmlhDiskon`, `deskripsiDiskon`) VALUES
(11, 'Awal Tahun', 86, 40, 'awals tahun adalah waktu yang tepat untuk memulai hal baru, maka dari itu diskon yang besar akan membantu anda memulai tahun yag baru dengan senyuman lebar'),
(12, 'Awal Bulan', 87, 10, 'awal bulan dengan Gaji yang berlimpah, mari nikmati Gaji anda dengan diskon awal bulan yang super melimpah'),
(13, 'Akhir Tahun', 88, 10, 'untuk mengakhiri Tahun dengan indah, mari nikmati hotel dan kamar kami dengan diskon yang kami berikan khusus untuk anda dan pasangan'),
(15, 'Diskon Lebaran', 96, 11, 'Lebaran Hari yang menyenangkan, mari bersilaturahmi bersama keluarga dengan diskon khusus silaturahmi keluarga'),
(16, 'Diskon Hari Valentine', 87, 14, 'Diskon untuk valentine sebesar 14%');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `idFasilitas` int(11) NOT NULL,
  `hotelId` int(11) DEFAULT NULL,
  `kamarId` int(11) DEFAULT NULL,
  `namaFasilitas` varchar(255) NOT NULL,
  `jumlahFasilitas` int(100) DEFAULT NULL,
  `imageUrl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`idFasilitas`, `hotelId`, `kamarId`, `namaFasilitas`, `jumlahFasilitas`, `imageUrl`) VALUES
(106, NULL, 86, 'Kamar Mandi', 1, '0.49996000 1641783689ic_bedroom-1.png'),
(107, NULL, 86, 'Kasur', 1, '0.31737000 1641783773ic_bedroom.png'),
(108, NULL, 86, 'Televisi', 1, '0.22278700 1641783799ic_tv.png'),
(109, NULL, 88, 'Kasur Besar', 1, '0.42475100 1641784845ic_bedroom.png'),
(110, NULL, 88, 'Ruang Tamu', 1, '0.69627100 1641784924ic_livingroom.png'),
(111, NULL, 88, 'Televisi', 1, '0.50262900 1641784934ic_tv.png'),
(112, NULL, 88, 'Kulkas', 1, '0.97706500 1641784943ic_kulkas.png'),
(113, NULL, 87, 'Kasur', 2, '0.07258000 1641785381ic_bedroom.png'),
(114, NULL, 87, 'Televisi', 1, '0.34164400 1641785389ic_tv.png'),
(115, NULL, 87, 'Kamar Mandi', 1, '0.20109000 1641785398ic_bedroom-1.png'),
(116, NULL, 89, 'Kasur', 3, '0.49355700 1641785595ic_bedroom.png'),
(117, NULL, 89, 'Televisi', 2, '0.00937700 1641785607ic_tv.png'),
(118, NULL, 89, 'Kamar Mandi', 2, '0.66311700 1641785616ic_bedroom-1.png'),
(119, NULL, 90, 'Kasur', 2, '0.76288600 1641785927ic_bedroom.png'),
(120, NULL, 90, 'Ruang Tamu', 1, '0.71853500 1641785940ic_livingroom.png'),
(121, NULL, 90, 'Kamar Mandi', 2, '0.74334100 1641785951ic_bedroom-1.png'),
(122, NULL, 91, 'Kasur', 2, '0.81279300 1641786678ic_bedroom.png'),
(123, 28, NULL, 'Parkir', NULL, '0.66615600 1643033151icons8-parking-64.png'),
(124, 28, NULL, 'Kolam Renang', NULL, '0.55131300 1643033213icons8-diving-64.png'),
(125, 28, NULL, 'Restaurant', NULL, '0.14828300 1643033237icons8-restaurant-64.png'),
(126, 28, NULL, 'Wifi', NULL, '0.13827700 1643033248icons8-wifi-64.png'),
(127, 29, NULL, 'Kolam Renang', NULL, '0.87827400 1643034304icons8-diving-64.png'),
(128, 29, NULL, 'Wifi', NULL, '0.54362500 1643034313icons8-wifi-64.png'),
(129, 29, NULL, 'Parkir', NULL, '0.40654800 1643034324icons8-parking-64.png'),
(130, 29, NULL, 'Room Service', NULL, '0.12453700 1643034334icons8-room-service-64.png'),
(132, 29, NULL, 'Gym', NULL, '0.69352400 1643034414icons8-barbell-64.png'),
(133, 30, NULL, 'Parkir', NULL, '0.84705100 1643034440icons8-parking-64.png'),
(134, 30, NULL, 'Kolam Renang', NULL, '0.80439900 1643034449icons8-diving-64.png'),
(135, 30, NULL, 'Wifi', NULL, '0.22973700 1643034460icons8-wifi-64.png'),
(136, 30, NULL, 'Restaurant', NULL, '0.02205200 1643034475icons8-restaurant-64.png'),
(137, 30, NULL, 'Room Service', NULL, '0.02414100 1643034486icons8-room-service-64.png'),
(138, 33, NULL, 'Parkir', NULL, '0.27689900 1643034503icons8-parking-64.png'),
(139, 33, NULL, 'Kolam Renang', NULL, '0.25967500 1643034511icons8-diving-64.png'),
(140, 33, NULL, 'Wifi', NULL, '0.72508300 1643034518icons8-wifi-64.png'),
(141, 33, NULL, 'Restaurant', NULL, '0.40563400 1643034527icons8-restaurant-64.png'),
(142, 33, NULL, 'Room Service', NULL, '0.36561000 1643034546icons8-room-service-64.png'),
(143, 33, NULL, 'Gym', NULL, '0.95762000 1643034554icons8-barbell-64.png'),
(144, 33, NULL, 'Cleaning Service', NULL, '0.83554300 1643034575icons8-broom-64.png'),
(145, 34, NULL, 'Parkir', NULL, '0.16032500 1643034668icons8-parking-64.png'),
(146, 34, NULL, 'Kolam Renang', NULL, '0.39655900 1643034675icons8-diving-64.png'),
(147, 34, NULL, 'Wifi', NULL, '0.28420100 1643034683icons8-wifi-64.png'),
(148, 34, NULL, 'Restaurant', NULL, '0.91995500 1643034697icons8-restaurant-64.png'),
(149, 35, NULL, 'Parkir', NULL, '0.98030500 1643034715icons8-parking-64.png'),
(150, 35, NULL, 'Wifi', NULL, '0.34739100 1643034726icons8-wifi-64.png'),
(151, 35, NULL, 'Restaurant', NULL, '0.57112400 1643034741icons8-restaurant-64.png'),
(152, 36, NULL, 'Parkir', NULL, '0.09097200 1643034755icons8-parking-64.png'),
(153, 36, NULL, 'Wifi', NULL, '0.97200100 1643034764icons8-wifi-64.png'),
(154, 36, NULL, 'Kolam Renang', NULL, '0.35496600 1643034772icons8-diving-64.png'),
(155, 36, NULL, 'Restaurant', NULL, '0.00187400 1643034780icons8-restaurant-64.png'),
(156, 36, NULL, 'Room Service', NULL, '0.97311800 1643034800icons8-room-service-64.png'),
(157, 36, NULL, 'Cleaning Service', NULL, '0.28664100 1643034812icons8-broom-64.png'),
(158, NULL, 97, 'Kamar Mandi', 1, '0.27527800 16430360700.20109000 1641785398ic_bedroom-1.png'),
(159, NULL, 97, 'Kasur', 1, '0.67509300 16430360810.07258000 1641785381ic_bedroom.png'),
(160, NULL, 97, 'Televisi', 1, '0.15910800 16430360960.00937700 1641785607ic_tv.png'),
(161, NULL, 97, 'Kulkas', 2, '0.06607000 16430361290.97706500 1641784943ic_kulkas.png'),
(162, NULL, 96, 'Kamar Mandi', 1, '0.28131000 16430363440.49996000 1641783689ic_bedroom-1.png'),
(163, NULL, 96, 'Kasur', 2, '0.28730500 16430363580.07258000 1641785381ic_bedroom.png'),
(164, NULL, 96, 'Televisi', 1, '0.38268600 16430363710.00937700 1641785607ic_tv.png'),
(165, NULL, 93, 'Televisi', 1, '0.42966600 16430364250.00937700 1641785607ic_tv.png'),
(166, NULL, 93, 'Kasur', 1, '0.36557200 16430364400.07258000 1641785381ic_bedroom.png'),
(167, NULL, 93, 'Kamar Mandi', 1, '0.34992900 16430364520.20109000 1641785398ic_bedroom-1.png'),
(168, NULL, 99, 'Kasur', 2, '0.38082600 16430374900.07258000 1641785381ic_bedroom.png'),
(169, NULL, 99, 'Kamar Mandi', 1, '0.02782400 16430375030.20109000 1641785398ic_bedroom-1.png'),
(170, NULL, 99, 'Televisi', 1, '0.01046300 16430375120.00937700 1641785607ic_tv.png'),
(171, NULL, 99, 'Kulkas', 1, '0.35850800 16430375260.97706500 1641784943ic_kulkas.png'),
(172, NULL, 95, 'Kasur', 2, '0.55950400 16430375600.07258000 1641785381ic_bedroom.png'),
(173, NULL, 95, 'Televisi', 1, '0.76178100 16430375690.00937700 1641785607ic_tv.png'),
(174, NULL, 95, 'Kamar Mandi', 1, '0.91798500 16430375780.02782400 16430375030.20109000 1641785398ic_bedroom-1.png'),
(175, NULL, 95, 'Kulkas', 1, '0.65382400 16430375880.06607000 16430361290.97706500 1641784943ic_kulkas.png'),
(176, NULL, 100, 'Kasur', 1, '0.80478800 16430377270.07258000 1641785381ic_bedroom.png'),
(177, NULL, 100, 'Televisi', 1, '0.18717200 16430377360.01046300 16430375120.00937700 1641785607ic_tv.png'),
(178, NULL, 100, 'Kamar Mandi', 1, '0.00490200 16430377450.02782400 16430375030.20109000 1641785398ic_bedroom-1.png'),
(179, NULL, 100, 'Kulkas', 1, '0.97286000 16430377550.06607000 16430361290.97706500 1641784943ic_kulkas.png'),
(180, NULL, 91, 'Televisi', 1, '0.23603300 16430377930.00937700 1641785607ic_tv.png'),
(181, NULL, 91, 'Kamar Mandi', 1, '0.88729000 16430378050.00490200 16430377450.02782400 16430375030.20109000 1641785398ic_bedroom-1.png'),
(182, NULL, 101, 'Kasur', 3, '0.52274700 16430379820.07258000 1641785381ic_bedroom.png'),
(183, NULL, 101, 'Televisi', 2, '0.83641900 16430379920.00937700 1641785607ic_tv.png'),
(184, NULL, 101, 'Kamar Mandi', 2, '0.45658800 16430380030.00490200 16430377450.02782400 16430375030.20109000 1641785398ic_bedroom-1.png'),
(185, NULL, 101, 'Kulkas', 1, '0.32740700 16430380160.06607000 16430361290.97706500 1641784943ic_kulkas.png'),
(186, NULL, 92, 'Kasur', 1, '0.83257100 16430380330.07258000 1641785381ic_bedroom.png'),
(187, NULL, 92, 'Televisi', 1, '0.03565300 16430380520.00937700 1641785607ic_tv.png'),
(188, NULL, 92, 'Kamar Mandi', 1, '0.72026000 16430380600.02782400 16430375030.20109000 1641785398ic_bedroom-1.png'),
(189, NULL, 92, 'Kulkas', 1, '0.72591700 16430380700.06607000 16430361290.97706500 1641784943ic_kulkas.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `idHotel` int(11) NOT NULL,
  `namaHotel` varchar(255) NOT NULL,
  `kotaHotel` varchar(255) NOT NULL,
  `deskripsiHotel` text NOT NULL,
  `ratingHotel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`idHotel`, `namaHotel`, `kotaHotel`, `deskripsiHotel`, `ratingHotel`) VALUES
(28, 'ASTON Banua Banjarmasin Hotel &amp; Convention Center', 'Banjarmasin, Kalimantan Selatan', 'Our 28sqm Deluxe Rooms come with either a king-sized bed or twin beds, thoughtful work space and complimentary Internet access to keep you connected. Relax with a refreshing shower in the stylish bathroom with premium amenities and enjoy local and international channels on the in-room entertainment system. Special requests are subject to availability upon check in.', '5'),
(29, 'Yogyakarta Marriott Hotel', 'Condong Catur, Yogyakarta', 'Genuine luxury awaits at Yogyakarta Marriott Hotel. Ideally situated in the heart of Jogja, Indonesia, our hotel sits near the Prambanan Temple, the Borobudur Temple, the world-class shopping of Jalan Malioboro and historic Kraton Yogyakarta. Unwind in style during your stay and relax in our sparkling outdoor pool, work out in our 24-hour fitness center or indulge yourself at our signature spa. Plan a business meeting or social function in one of our 11 event venues, offering nearly 28,000 square feet of space, including one of the largest ballrooms in Jogja. Spread out in spacious, modern guest rooms, boasting views of either downtown Jogja or our hotel pool. Reserve a club-level room or suite for lounge access and perks like free snacks, beverages and hors dâ€™oeuvres. Discover the difference at Yogyakarta Marriott Hotel.', '5'),
(30, 'Lafayette Boutique Hotel', 'Catur Tunggal, Yogyakarta', 'Experience the splendor of Yogyakarta from a premier location at Ring Road Utara. Set in an iconic 11 storey tower with sweeping views, our 77 luxurious suites including 1 penthouse are graciously appointed and elegantly furnished for the most discerning guest. Overlooking panoramic views of the majestic Mount Merapi, the Lafayette Hotel provide an unforgettable backdrop to a distinctive address in Yogyakarta with an easy access to the city and tourist attraction sites, making it ideal for business and leisure guests alike. The Keraton (Palace) and the ever bustling and colorful Malioboro Street are nearby as well as our National Cultural Property, the Borobudur and the Prambanan Temple.', '5'),
(33, 'Crown Prince Hotel Surabaya Managed by Midtown Indonesia', 'Genteng, Surabaya', 'It is our pleasure to welcome you by providing a complete facility and friendly service as you need while in Surabaya. With our tagline Refuel - Renew - Relax you will feel a different atmosphere by feeling like recharging your self when entering the Crown Prince Hotel Surabaya. With the new Crown Prince Hotel brand, that\'s where you will feel very relaxed by being in the right hotel to stay overnight.', '4'),
(34, 'Four Points by Sheraton Bali', 'Badung, Bali', 'Located in the heart of the Legian-Kuta region, Four Points by Sheraton Bali, Kuta is only seven kilometers from Bali Ngurah Rai International Airport. Enjoy a true island holiday at our modern resort hotel, just steps away from local restaurants, bars, nightlife, shopping and entertainment. Stop by any of our four hotel restaurants for innovative dining or visit our rooftop pool featuring stunning views of Legian-Kuta. Relax with a massage using natural ingredients in our hotel spa while the kids have fun in our spacious Kid\'s Club. Enjoy access to our room service, fitness center, free Wi-Fi, 24-hour front desk and free shuttle to Kuta Beach. Make yourself at home in one of our contemporary hotel rooms and suites. Each room is complemented by a Four Points by Sheraton Four Comfort Bedâ„¢, modern amenities and a terrace or balcony overlooking the sparkling Lagoon Pool or Junior Pool. Find everything you need for a rewarding stay during your time in Kuta, Indonesia.', '4'),
(35, 'The Aveda Boutique Hotel', 'Seminyak, Bali', 'The Aveda Boutique Hotel is the best hotel with rice field view in Seminyak with a strategic location, situated on Petitenget street and surrounded by restaurants, clubs, cafes, and shopping centers. Close to Petitenget Beach and has been certified CHSE (Cleanliness, Health, Safety &amp; Environment Sustainability) from the Ministry of Tourism and Sucofindo by providing health and hygiene protocol.', '4'),
(36, 'Art Deco Luxury Hotel &amp; Residence', 'Bandung, Jawa Barat', 'Art Deco Luxury Hotel &amp; Residence is the splendid choice for you who are seeking a luxurious treat for your holiday. Get pampered with the most excellent services and make your holiday memorable by staying here. From business event to corporate gathering, Art Deco Luxury Hotel &amp; Residence provides complete services and facilities that you and your colleagues need. Have fun with various entertaining facilities for you and the whole family at Art Deco Luxury Hotel &amp; Residence, a wonderful accommodation for your family holiday.', '4.5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `imgurl`
--

CREATE TABLE `imgurl` (
  `imageId` int(11) NOT NULL,
  `hotelId` int(11) DEFAULT NULL,
  `kamarId` int(11) DEFAULT NULL,
  `imageUrl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `imgurl`
--

INSERT INTO `imgurl` (`imageId`, `hotelId`, `kamarId`, `imageUrl`) VALUES
(243, 28, NULL, '0.48249400 164177021336954222.jpg'),
(244, 28, NULL, '0.48449400 164177021336954227.jpg'),
(245, 29, NULL, '0.79995100 16417703065fc5a81bb4a1c.png'),
(246, 29, NULL, '0.80057000 164177030660c45a3f10552-pkwjt-marriot-01.jpg'),
(247, 30, NULL, '0.19664600 1641770383lafayette-boutique-hotel.jpg'),
(248, 30, NULL, '0.19739600 1641770383Y928716102.jpg'),
(251, 33, NULL, '0.40055300 1641770754crown-prince-hotel.jpg'),
(252, 33, NULL, '0.40123000 1641770754crown-prince-hotel-surabaya-_200219191208-670.jpg'),
(253, 34, NULL, '0.07605900 164177084135622e81fbdd14154ef819c56c8bbbe3.jpg'),
(254, 34, NULL, '0.07767600 1641770841dpskf-pool-6741-hor-feat.jpg'),
(255, 34, NULL, '0.07825700 1641770841REST_DZ9-1080x720-FIT_AND_TRIM-0804fc0260ea5d3ca8a82542a4fb5877.jpeg'),
(256, 35, NULL, '0.00559000 1641770914FOR-SALE-THE-AVEDA-BOUTIQUE-HOTEL-PETITENGET-SEMINYAK-BALI-Seminyak-Indonesia.jpg'),
(257, 35, NULL, '0.00761800 1641770914in-the-heart-of-petitenget.jpg'),
(258, 35, NULL, '0.00913800 1641770914revato-904826-5737740-963713.jpg'),
(259, 36, NULL, '0.08826400 1641770981FOR-SALE-THE-AVEDA-BOUTIQUE-HOTEL-PETITENGET-SEMINYAK-BALI-Seminyak-Indonesia.jpg'),
(260, 36, NULL, '0.08915600 1641770981in-the-heart-of-petitenget.jpg'),
(261, 36, NULL, '0.08976400 1641770981revato-904826-5737740-963713.jpg'),
(262, NULL, 86, '0.38072900 1641782638einzelzimmer_01.jpg'),
(263, NULL, 86, '0.38970700 1641782638hotelcastillo.webp'),
(264, NULL, 86, '0.39331100 1641782638pexels-pixabay-271618.webp'),
(265, NULL, 86, '0.39556100 1641782638single-room-416.jpg'),
(266, NULL, 87, '0.63847500 164178422214_tokyo-prince-hotel-rooms-4-8FSuperiorTwinRoom-noon-.jpg'),
(267, NULL, 87, '0.64093100 1641784222076509800_1553501565-2_twin_room.jpg'),
(268, NULL, 87, '0.64399400 1641784222perbedaan-twin-dan-double-room.jpg'),
(269, NULL, 87, '0.64529200 1641784222skyhotel.webp'),
(270, NULL, 88, '0.29717000 16417845272205512_17080915420055255050.jpg'),
(271, NULL, 88, '0.30346200 1641784527091719500_1553501565-3_double_room.jpg'),
(272, NULL, 88, '0.30881900 1641784527ccb764b3a0f9b7631513a3f096f4ed74470b89c6.jpeg'),
(273, NULL, 88, '0.31172700 1641784527double-room-slid2.jpg'),
(274, NULL, 89, '0.67591700 1641785578004763900_1553501566-4_Triple_room.jpg'),
(275, NULL, 89, '0.68715700 1641785578triple-room.jpeg'),
(276, NULL, 89, '0.69287900 1641785578www.centralhoteldublin.com-triple-room.jpg'),
(277, NULL, 90, '0.78790400 1641785905amoscozy-com.webp'),
(278, NULL, 90, '0.79705200 1641785905download.jpg'),
(279, NULL, 90, '0.80047200 1641785905Junior-Suite.jpg'),
(280, NULL, 91, '0.97113300 1641786652download.jpg'),
(281, NULL, 91, '0.97361200 1641786652hotelciputra-com.jpeg'),
(282, NULL, 91, '0.97628600 1641786652junior-suite-bwp-panbil-batam_20180120_125519.jpg'),
(283, NULL, 92, '0.54793700 1641786749lottehotel1.jpg'),
(284, NULL, 93, '0.17131300 1643006092amoscozy-com.webp'),
(285, NULL, 93, '0.17467100 1643006092download.jpg'),
(286, NULL, 93, '0.17595400 1643006092Junior-Suite.jpg'),
(293, NULL, 95, '0.75419500 1643013052lottehotel1.jpg'),
(294, NULL, 95, '0.75728800 1643013052junior-suite-bwp-panbil-batam_20180120_125519.jpg'),
(295, NULL, 95, '0.75962500 1643013052download.jpg'),
(296, NULL, 96, '0.59469200 1643023169junior-suite-bwp-panbil-batam_20180120_125519.jpg'),
(297, NULL, 96, '0.60084000 1643023169download.jpg'),
(298, NULL, 96, '0.60217600 1643023169hotelciputra-com.jpeg'),
(301, NULL, 97, '0.08065700 16430359930.30346200 1641784527091719500_1553501565-3_double_room.jpg'),
(302, NULL, 99, '0.12892000 16430374150.63847500 164178422214_tokyo-prince-hotel-rooms-4-8FSuperiorTwinRoom-noon-.jpg'),
(303, NULL, 99, '0.12930300 16430374150.64093100 1641784222076509800_1553501565-2_twin_room.jpg'),
(304, NULL, 100, '0.62107500 16430377060.75419500 1643013052lottehotel1.jpg'),
(305, NULL, 100, '0.62148700 16430377060.75728800 1643013052junior-suite-bwp-panbil-batam_20180120_125519.jpg'),
(306, NULL, 101, '0.73968700 16430379550.68715700 1641785578triple-room.jpeg'),
(307, NULL, 101, '0.74026300 16430379550.69287900 1641785578www.centralhoteldublin.com-triple-room.jpg'),
(308, NULL, 101, '0.74051300 16430379550.75419500 1643013052lottehotel1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `idKamar` int(11) NOT NULL,
  `hotelId` int(11) DEFAULT NULL,
  `tipeKamar` varchar(255) NOT NULL,
  `deskripsiKamar` text NOT NULL,
  `hargaKamar` int(11) NOT NULL,
  `jumlahKamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`idKamar`, `hotelId`, `tipeKamar`, `deskripsiKamar`, `hargaKamar`, `jumlahKamar`) VALUES
(86, 29, 'Single Room', 'Single room atau single studio room adalah jenis kamar hotel yang umum dimiliki setiap hotel. Single room biasanya hanya terdiri dari satu ruangan yang berisi hanya satu tempat tidur, sofa, dan kamar mandi.\r\n\r\nJenis kamar hotel single room cocok satu orang saja karena memang fasilitas dan kapasitas yang tidak besar. Single room juga biasanya lebih banyak diminati oleh para traveller yang bepergian sendirian, karena harganya yang lebih murah dibandingkan dengan jenis kamar hotel lainnya.', 70000, 10),
(87, 28, 'Twin Rooms', 'Twin room memiliki dua buah tempat tidur yang biasanya terpisah dan masing-masing berukuran single. Namun dua tempat tidur ini dapat disatukan dan diletakan berdampingan sesuai dengan keinginan pemesan kamar hotel. Twin room biasanya digunakan untuk pasangan suami istri, atau saudara, hingga teman yang menginap bersama.', 90000, 5),
(88, 30, 'Double Room', 'double room memiliki tempat tidur berukuran besar yang muat untuk dua orang. Double room lebih cocok digunakan untuk pasangan suami istri yang sedang berbulan madu atau pasangan suami istri yang belum memiliki anak.', 120000, 5),
(89, 33, 'Triple room', 'triple room atau family room. Seperti namanya, kamar hotel ini cocok untuk keluarga dengan satu tempat tidur berukuran besar untuk dua orang dan satu tempat tidur berukuran kecil atau single. Triple room juga bisa berisi tiga tempat tidur berukuran single. Untuk triple room, ruangan biasanya akan lebih luas.', 180000, 2),
(90, 34, 'Junior Suite Room', 'Junior suit room atau juga sering dikatakan studio (STU) adalah jenis kamar hotel yang memiliki fasilitas seperti tempat duduk atau ruang tamu yang terpisah dengan ruang tidur. Dua ruangan ini terpisah oleh pemisah kecil seperti tembok atau lemari besar. Beberapa hotel yang memiliki jenis kamar junior suit room juga memiliki dapur.', 200000, 5),
(91, 35, 'Suite Room', 'Jenis kamar hotel ini bisa dikatakan mirip dengan sebuah apartemen kecil yang berada di dalam hotel. Dengan fasilitas seperti kamar tidur, dapur, ruang tamu, dan kamar mandi yang terpisah, jenis kamar hotel ini biasanya digunakan oleh orang-orang yang sedang berbisnis hingga keluarga yang ingin menginap cukup lama.', 250000, 5),
(92, 36, 'Presidential Suite', 'Presidential suite merupakan jenis kamar termahal dan tentunya dibekali dengan fasilitas yang paling lengkap.\r\nKamar ini biasanya terletak pada lokasi yang strategis untuk memberikan pemandangan terbaik.', 300000, 1),
(93, 30, 'Single Room', 'Single room: these rooms are assigned to one person or a couple. It may have one or more beds, but the size of the bed depends on the hotel. Some single rooms have a twin bed, most will have a double, few will have a queen bed.', 50000, 3),
(95, 34, 'Double Suite Room', 'Double suit room atau juga sering dikatakan studio (DTU) adalah jenis kamar hotel yang memiliki fasilitas seperti tempat duduk atau ruang tamu yang terpisah dengan ruang tidur. Dua ruangan ini terpisah oleh pemisah kecil seperti tembok atau lemari besar. Beberapa hotel yang memiliki jenis kamar junior suit room juga memiliki dapur.', 20000, 2),
(96, 29, 'Double Room', 'Single room atau single studio room adalah jenis kamar hotel yang umum dimiliki setiap hotel. Single room biasanya hanya terdiri dari satu ruangan yang berisi hanya satu tempat tidur, sofa, dan kamar mandi. Jenis kamar hotel single room cocok satu orang saja karena memang fasilitas dan kapasitas yang tidak besar. Single room juga biasanya lebih banyak diminati oleh para traveller yang bepergian sendirian, karena harganya yang lebih murah dibandingkan dengan jenis kamar hotel lainnya.', 90000, 4),
(97, 28, 'Deluxe', 'Deluxe rooms, are modern decorated, can accommodate up to 2 persons, totally soundproofed and equipped with high tech comforts such as high speed internet access, USB ports , smart TV, room cleaning touch system and private hydromassage bathtub.', 200000, 2),
(99, 33, 'Double Room', 'A double room is a room intended for two people, usually a couple, to stay in. One person occupying a double room has to pay a supplement. She needs two double rooms for four guests. Our double room can accommodate two people.', 200000, 2),
(100, 35, 'Deluxe Room', 'Deluxe rooms, are modern decorated, can accommodate up to 2 persons, totally soundproofed and equipped with high tech comforts such as high speed internet access, USB ports , smart TV, room cleaning touch system and private hydromassage bathtub.', 400000, 4),
(101, 36, 'Triple Room', 'triple room atau family room. Seperti namanya, kamar hotel ini cocok untuk keluarga dengan satu tempat tidur berukuran besar untuk dua orang dan satu tempat tidur berukuran kecil atau single. Triple room juga bisa berisi tiga tempat tidur berukuran single. Untuk triple room, ruangan biasanya akan lebih luas.', 600000, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `idKonsumen` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `telphone` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`idKonsumen`, `nama`, `email`, `telphone`, `tanggal`) VALUES
(7, '', '', '', '0000-00-00 00:00:00'),
(8, '', '', '', '0000-00-00 00:00:00'),
(9, '', '', '', '0000-00-00 00:00:00'),
(10, '', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sb_user`
--

CREATE TABLE `sb_user` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sb_user`
--

INSERT INTO `sb_user` (`username`, `email`, `password`) VALUES
('admin', 'sbadmin@giridorzz.com', 'admin123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idHotel` int(11) DEFAULT NULL,
  `idKamar` int(11) DEFAULT NULL,
  `tglCheckin` date NOT NULL,
  `namaLengkap` varchar(225) NOT NULL,
  `email` varchar(255) NOT NULL,
  `noTelp` int(14) NOT NULL,
  `tglCheckout` date NOT NULL,
  `namaBank` varchar(100) NOT NULL,
  `status` varchar(225) NOT NULL,
  `invoice` int(12) NOT NULL,
  `totalHarga` float NOT NULL,
  `buktiTransfer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `idUser`, `idHotel`, `idKamar`, `tglCheckin`, `namaLengkap`, `email`, `noTelp`, `tglCheckout`, `namaBank`, `status`, `invoice`, `totalHarga`, `buktiTransfer`) VALUES
(11, NULL, 29, 86, '2022-01-12', 'Onny Vergiean Saputra', 'onny@gmail.com', 8222869, '2022-01-18', 'BCA ', 'Selesai', 162885561, 462000, '0.88678300 1641831267Screenshot_8.png'),
(12, NULL, 30, 88, '2022-01-09', 'Asyraf Rizullah', 'Asyraf@gmail.com', 24444, '2022-01-12', 'Mandiri ', 'Reject', 339679956, 396000, '0.56390400 1641832506logo_bank-1.jpg'),
(14, NULL, 30, 88, '2022-01-11', 'Admin', 'Admin@gmail.com', 22444, '2022-01-12', 'Mandiri ', 'Confirm', 205930100, 132000, '0.47326400 1641832628cs.png'),
(15, NULL, 30, 88, '2022-01-11', 'Adas', 'ada@sada', 21313, '2022-01-13', 'asd ', 'Reject', 240345680, 264000, '0.59740300 1641832693cs.png'),
(16, NULL, 29, 86, '2022-01-11', 'asd', 'asd@gmail.com', 64646, '2022-01-13', 'asd ', 'Confirm', 449410094, 154000, '0.36354200 1641833105Picture1.png'),
(17, NULL, 29, 86, '2022-01-12', 'onny', 'sadas@sad', 343535, '2022-01-13', 'BCA ', 'Confirm', 447245282, 77000, '0.56474500 1641884863cs.png'),
(18, NULL, 36, 92, '2022-01-19', 'Onny', 'onny133saputra@gmail.com', 2147483647, '2022-01-20', 'Mandiri ', 'Confirm', 429619945, 330000, '0.58583800 16424832263567801.jpg'),
(35, 1, 30, 88, '2022-01-21', 'oke', 'oke@gmail.com', 90909, '2022-01-22', 'mANDIRI ', 'Proses', 335923350, 132000, '0.44121200 1642579067Picture1.png'),
(36, 1, 29, 86, '2022-01-20', 'sAYA', 'SAYA@GMAIL.CM', 211, '2022-01-22', 'SAYA ', 'Proses', 391445611, 77000, '0.58609200 1642579144Picture1.png'),
(37, 1, 29, 86, '2022-01-26', 'Giri', 'Giri@gmail.com', 99888, '2022-01-28', 'Mandiri ', 'Proses', 433699427, 92400, '0.39637100 1643087188cs.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` int(50) NOT NULL,
  `alamat` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`idUser`, `nama`, `email`, `password`, `phone`, `alamat`) VALUES
(1, 'onny', 'onny@gmail.com', 'onny', 2, 'karanglo'),
(2, 'onny', 'onny133@gmail.com', '909090', 9090909, 'karanglo'),
(3, 'karanglo', 'karanglo@gmail.com', 'aku', 90909, 'karanglo'),
(4, 'giri', 'giri@gmail.com', 'giri123', 89898, 'Karanglo');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`idBank`);

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`idDiskon`),
  ADD KEY `diskon_ibfk_2` (`idKamar`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`idFasilitas`),
  ADD KEY `fasilitas_ibfk_2` (`hotelId`),
  ADD KEY `fasilitas_ibfk_3` (`kamarId`);

--
-- Indeks untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`idHotel`);

--
-- Indeks untuk tabel `imgurl`
--
ALTER TABLE `imgurl`
  ADD PRIMARY KEY (`imageId`),
  ADD KEY `imgurl_ibfk_1` (`kamarId`),
  ADD KEY `hotelId` (`hotelId`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`idKamar`),
  ADD KEY `kamar_ibfk_3` (`hotelId`);

--
-- Indeks untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`idKonsumen`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`),
  ADD KEY `user_ibfk_1` (`idUser`),
  ADD KEY `user_ibfk_2` (`idHotel`),
  ADD KEY `user_ibfk_3` (`idKamar`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `idBank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `diskon`
--
ALTER TABLE `diskon`
  MODIFY `idDiskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `idFasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT untuk tabel `hotel`
--
ALTER TABLE `hotel`
  MODIFY `idHotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `imgurl`
--
ALTER TABLE `imgurl`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `idKamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `idKonsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD CONSTRAINT `diskon_ibfk_2` FOREIGN KEY (`idKamar`) REFERENCES `kamar` (`idKamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fasilitas_ibfk_2` FOREIGN KEY (`hotelId`) REFERENCES `hotel` (`idHotel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fasilitas_ibfk_3` FOREIGN KEY (`kamarId`) REFERENCES `kamar` (`idKamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `imgurl`
--
ALTER TABLE `imgurl`
  ADD CONSTRAINT `imgurl_ibfk_1` FOREIGN KEY (`kamarId`) REFERENCES `kamar` (`idKamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `imgurl_ibfk_2` FOREIGN KEY (`hotelId`) REFERENCES `hotel` (`idHotel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_3` FOREIGN KEY (`hotelId`) REFERENCES `hotel` (`idHotel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`idHotel`) REFERENCES `hotel` (`idHotel`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`idKamar`) REFERENCES `kamar` (`idKamar`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
