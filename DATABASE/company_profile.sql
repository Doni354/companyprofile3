-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Agu 2023 pada 16.08
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company_profile`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(13, '2023-07-20-081917', 'App\\Database\\Migrations\\TbProduk', 'default', 'App', 1690513521, 1),
(14, '2023-07-20-084755', 'App\\Database\\Migrations\\TbSlider', 'default', 'App', 1690513521, 1),
(15, '2023-07-20-085024', 'App\\Database\\Migrations\\TbProfil', 'default', 'App', 1690513521, 1),
(16, '2023-07-28-035902', 'App\\Database\\Migrations\\TbAktivitas', 'default', 'App', 1690517128, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_aktivitas`
--

CREATE TABLE `tb_aktivitas` (
  `id_aktivitas` int(5) UNSIGNED NOT NULL,
  `nama_aktivitas_in` varchar(200) NOT NULL,
  `nama_aktivitas_en` varchar(200) NOT NULL,
  `foto_aktivitas` varchar(100) NOT NULL,
  `deskripsi_aktivitas_in` text DEFAULT NULL,
  `deskripsi_aktivitas_en` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tb_aktivitas`
--

INSERT INTO `tb_aktivitas` (`id_aktivitas`, `nama_aktivitas_in`, `nama_aktivitas_en`, `foto_aktivitas`, `deskripsi_aktivitas_in`, `deskripsi_aktivitas_en`) VALUES
(1, 'Ekspor Kayu Manis', 'Cinnamon Export', 'img_sq_1.jpg', 'Perusahaan kami aktif dalam mengidentifikasi pasar potensial, menjaga kualitas produk, serta menjalankan proses logistik yang efisien untuk memenuhi permintaan internasional dengan tepat waktu.', 'Our company is active in identifying potential markets, maintaining product quality, and running efficient logistics processes to meet international demands in a timely manner.'),
(2, 'Ekspor Cengkeh', 'Clove Export', 'img_sq_3.jpg', 'Perusahaan kami aktif dalam kegiatan ekspor cengkeh, memastikan kualitas yang unggul, dan mengelola logistik secara efisien guna memenuhi permintaan pasar internasional dengan tepat waktu.', 'Our company is active in clove export activities, ensures superior quality, and manages logistics efficiently to meet international market demands in a timely manner.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(5) UNSIGNED NOT NULL,
  `nama_produk_in` varchar(200) NOT NULL,
  `nama_produk_en` varchar(200) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk_in` text DEFAULT NULL,
  `deskripsi_produk_en` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk_in`, `nama_produk_en`, `foto_produk`, `deskripsi_produk_in`, `deskripsi_produk_en`) VALUES
(1, 'Kayu Manis', 'Cinnamon', 'img_sq_1.jpg', 'Kulit kayu manis adalah sejenis rempah-rempah yang diperoleh dari kulit bagian dalam beberapa spesies pohon genus Cinnamomum yang digunakan untuk masakan yang manis dan sedap.', 'Cinnamon bark is a kind of spice obtained from the inner bark of several species of trees of the genus Cinnamomum which is used for sweet and savory dishes.'),
(2, 'Cengkih', 'Cloves', 'img_sq_3.jpg', 'Cengkih atau cengkeh adalah kuncup bunga kering beraroma dari keluarga pohon Myrtaceae. Cengkih adalah tanaman asli Indonesia, banyak digunakan sebagai bumbu masakan pedas di negara-negara Eropa, dan sebagai bahan utama rokok kretek khas Indonesia.', 'Cloves or cloves are the fragrant dried flower buds of the Myrtaceae tree family. Cloves are native to Indonesia, widely used as a spice for spicy dishes in European countries, and as the main ingredient for Indonesian clove cigarettes.'),
(3, 'Pala', 'Nutmeg', 'img_sq_8.jpg', 'Pala merupakan tumbuhan berupa pohon yang berasal dari kepulauan Banda, Maluku. Akibat nilainya yang tinggi sebagai rempah-rempah, buah dan biji pala telah menjadi komoditas perdagangan yang penting sejak masa Romawi.', 'Nutmeg is a plant in the form of a tree originating from the Banda Islands, Maluku. Due to its high value as a spice, nutmeg fruit and seeds have been important trade commodities since Roman times.'),
(4, 'Jintan putih', 'Cumin', 'img_sq_4.jpg', 'Jintan Putih merupakan tumbuhan berbunga dari famili Apiaceae yang berasal dari daerah Laut Tengah bagian timur sampai India bagian timur.', 'Cumin is a flowering plant from the Apiaceae family originating from the eastern Mediterranean region to eastern India.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id_profil` int(5) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `logo_perusahaan` varchar(100) NOT NULL,
  `deskripsi_perusahaan_in` text DEFAULT NULL,
  `deskripsi_perusahaan_en` text DEFAULT NULL,
  `deskripsi_kontak_in` text DEFAULT NULL,
  `deskripsi_kontak_en` text DEFAULT NULL,
  `link_maps` text DEFAULT NULL,
  `link_whatsapp` text DEFAULT NULL,
  `favicon_website` varchar(100) NOT NULL,
  `title_website` varchar(100) NOT NULL,
  `foto_utama` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `teks_footer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tb_profil`
--

INSERT INTO `tb_profil` (`id_profil`, `username`, `password`, `nama_perusahaan`, `logo_perusahaan`, `deskripsi_perusahaan_in`, `deskripsi_perusahaan_en`, `deskripsi_kontak_in`, `deskripsi_kontak_en`, `link_maps`, `link_whatsapp`, `favicon_website`, `title_website`, `foto_utama`, `alamat`, `no_hp`, `email`, `teks_footer`) VALUES
(1, 'user', 'user', 'PT NAKAM Foods Indonesia', 'Logo_PT-NAKAM-Foods-Indonesia_22082023083546.png', '<p>sebuah perusahaan terpercaya yang mengkhususkan diri dalam perdagangan rempah-rempah premium Indonesia. Dengan penekanan kuat pada kualitas dan beragam rasa yang istimewa, kami adalah tujuan utama bagi importir yang mencari sumber rempah-rempah Indonesia berkualitas tinggi untuk usaha perdagangan besar. Di Rempah-Rempah Indonesia (PT NAKAM Foods Indonesia), kami bangga akan pilihan rempah-rempah Indonesia kami yang luas, termasuk kayu manis, cengkeh, pala, kapulaga, dan banyak lagi. Harta karun aromatik ini bersumber langsung dari petani dan petani lokal tepercaya yang telah membudidayakan rempah-rempah ini selama beberapa generasi. Komitmen kami terhadap keaslian dan kesinambungan memastikan bahwa produk kami memiliki kualitas terbaik, menghadirkan esensi sejati masakan Indonesia. Kami memahami permintaan unik dari perdagangan besar, dan tim kami yang berdedikasi berpengalaman dalam memenuhi kebutuhan importir.</p>', 'a trusted company specializing in the trading of premium Indonesian spices. With a strong emphasis on quality and a vast array of exquisite flavors, we are the go-to destination for importers seeking to source high-quality Indonesian spices for big trading ventures. At Indonesia Spices (PT NAKAM Foods Indonesia), we pride ourselves on our extensive selection of Indonesian spices, including cinnamon, cloves, nutmeg, cardamom, and more. These aromatic treasures are sourced directly from trusted local farmers and growers who have been cultivating these spices for generations. Our commitment to authenticity and sustainability ensures that our products are of the highest quality, delivering the true essence of Indonesian cuisine. We understand the unique demands of big trading, and our dedicated team is well-versed in catering to the needs of importers.', 'Provinsi Sumatra Barat', 'West Sumatera Province', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4046040.312635006!2d108.0530452!3d-7.9771059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd629c21940f685%3A0xce6adb8a6aba4f5!2sNakam%20Foods%20Indonesia!5e0!3m2!1sid!2sid!4v1691128148640!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://wa.me/+6282131222332', 'Favicon_PT-NAKAM-Foods-Indonesia_22082023083620.png', 'Indonesia Spices : Supplying Big Trading of Indonesian Spices', 'PT-NAKAM-Foods-Indonesia_22082023082132.jpg', 'West Sumatera Province', '+62 821 3122 2332', 'nakamfoodsindonesia@gmail.com', 'All Rights Reserved. Designed with love by Me');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id_slider` int(5) UNSIGNED NOT NULL,
  `file_foto_slider` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tb_slider`
--

INSERT INTO `tb_slider` (`id_slider`, `file_foto_slider`) VALUES
(1, 'hero_2.jpg'),
(2, 'hero_3.jpg'),
(3, 'hero_4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  MODIFY `id_aktivitas` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id_slider` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
