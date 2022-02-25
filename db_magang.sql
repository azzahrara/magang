-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Feb 2022 pada 08.32
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balitklimat_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bt_alasan`
--

CREATE TABLE `bt_alasan` (
  `id_alasan` varchar(20) NOT NULL,
  `nama_alasan` varchar(256) NOT NULL,
  `ket_alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bt_alasan`
--

INSERT INTO `bt_alasan` (`id_alasan`, `nama_alasan`, `ket_alasan`) VALUES
('ALS01', 'alasan1', 'alasn111'),
('ALS02', 'alasan2', 'asada'),
('ALS03', 'alasan3edt', 'asdasdaedit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bt_keperluan`
--

CREATE TABLE `bt_keperluan` (
  `id_keperluan` varchar(10) NOT NULL,
  `nama_keperluan` varchar(256) NOT NULL,
  `ket_keperluan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bt_keperluan`
--

INSERT INTO `bt_keperluan` (`id_keperluan`, `nama_keperluan`, `ket_keperluan`) VALUES
('KEP01', 'Keperluan 1', 'ket kep1 edit'),
('KEP02', 'keperluan 2', 'keperluan 2'),
('KEP03', 'keperluan 3', 'ket kep3\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `id_buku_tamu` varchar(20) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `nama_lengkap` varchar(256) NOT NULL,
  `asal_instansi` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `no_wa` int(11) NOT NULL,
  `divisi_id` varchar(30) NOT NULL,
  `pegawai_nip` varchar(20) DEFAULT NULL,
  `id_keperluan` varchar(20) NOT NULL,
  `id_alasan` varchar(20) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku_tamu`
--

INSERT INTO `buku_tamu` (`id_buku_tamu`, `jenis`, `tanggal`, `waktu`, `nama_lengkap`, `asal_instansi`, `email`, `no_wa`, `divisi_id`, `pegawai_nip`, `id_keperluan`, `id_alasan`, `keterangan`) VALUES
('BT220223001', 'A', '2022-02-25', '20:37:00', 'AZZAHRA RAMADIANA ARIFANI', 'ipb', 'azzahrara.0210@gmail.com', 2147483647, 'yantek', '12345678', 'KEP01', NULL, 'test 1'),
('BT220223002', 'A', '2022-02-23', '20:39:00', 'fee', 'xsda', 'feliia@gmail.com', 11111, 'yantek', NULL, 'KEP02', NULL, ''),
('BT220223003', 'B', '2022-02-23', '20:40:00', 'sehun', 'sm', 'sehun@gmail.com', 242111, 'tu', '12345678', 'KEP02', NULL, ''),
('BT220223004', 'B', '2022-02-23', '20:42:00', 'alasannnnnnnnnnnnnn', 'ipb', '10969zrazzahra@apps.ipb.ac.id', 812334123, 'tu', NULL, 'KEP02', 'ALS03', 'testsssssssssssssssssss');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_divisi`
--

CREATE TABLE `data_divisi` (
  `id_divisi` int(11) NOT NULL,
  `divisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_divisi`
--

INSERT INTO `data_divisi` (`id_divisi`, `divisi`) VALUES
(2, 'Jasa Penelitian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_golongan`
--

CREATE TABLE `data_golongan` (
  `id_golongan` int(11) NOT NULL,
  `golongan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jabatan`
--

CREATE TABLE `data_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_jabatan`
--

INSERT INTO `data_jabatan` (`id_jabatan`, `jabatan`) VALUES
(2, 'Plt. Kepala Balai'),
(3, 'Peneliti Ahli Utama'),
(4, 'Peneliti Ahli Madya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pangkat`
--

CREATE TABLE `data_pangkat` (
  `id_pangkat` int(11) NOT NULL,
  `pangkat` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pangkat`
--

INSERT INTO `data_pangkat` (`id_pangkat`, `pangkat`) VALUES
(2, 'Pembina Utama'),
(3, 'Pembina Utama Muda'),
(4, 'Pembina'),
(6, 'Penata'),
(7, 'Penata Tk I'),
(8, 'Pengatur Tk I');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `nip` varchar(18) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `golongan` int(11) NOT NULL,
  `status_kepegawaian` int(11) NOT NULL,
  `pangkat` int(11) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_whatsapp` varchar(20) NOT NULL,
  `admin` varchar(5) NOT NULL,
  `pumk` varchar(5) NOT NULL,
  `kpa` varchar(5) NOT NULL,
  `ppk` varchar(5) NOT NULL,
  `pj` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pegawai`
--

INSERT INTO `data_pegawai` (`nip`, `nama_pegawai`, `foto`, `golongan`, `status_kepegawaian`, `pangkat`, `jabatan`, `id_divisi`, `nik`, `email`, `password`, `no_whatsapp`, `admin`, `pumk`, `kpa`, `ppk`, `pj`) VALUES
('195805161993032002', 'Dr. Nani Heryani', 'fix_kolokium.jpg', 0, 0, 0, 0, 0, '3271055605580006', 'administrator@gmail.com', '876543221', '6281973034079', 'Iya', 'Tidak', 'Tidak', 'Tidak', 'Tidak'),
('196401211990031002', 'Dr. Ir. A. Arivin Rivaie, M.Sc', 'WhatsApp Image 2022-01-14 at 14.30.57.jpeg', 0, 0, 0, 0, 0, '3271062101640004', 'feliia@gmail.com', '11111111', '6281973034079', 'Iya', 'Iya', 'Iya', 'Iya', 'Tidak'),
('196411291990032002', 'Dr. Ir. Popi Redjekiningrum Dwi Mustatingingsih', 'DSCF5201-removebg-preview.png', 0, 0, 0, 0, 0, '3201296911640001', 'administrator@gmail.com', '12345678', '6281973034079', 'Iya', 'Iya', 'Tidak', 'Tidak', 'Tidak'),
('196710081994032013', 'Dr. Woro Estiningtyas', 'fix_kolokium.jpg', 0, 0, 0, 0, 0, '3201294810670003', 'lugasmunaya@gmail.com', '12345678', '6281973034079', 'Iya', 'Iya', 'Tidak', 'Tidak', 'Tidak'),
('196901241998032001', 'Dr. Elza Surmaini', 'new.JPG', 0, 0, 0, 0, 0, '3271066401690004', 'lugasmunayasika@gmail.com', '12345678', '6281973034079', 'Iya', 'Iya', 'Tidak', 'Tidak', 'Iya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_role`
--

CREATE TABLE `data_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_role`
--

INSERT INTO `data_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(3, 'PUMK'),
(4, 'Bendahara ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_tugas`
--

CREATE TABLE `detail_tugas` (
  `id_det_tugas` varchar(20) NOT NULL,
  `id_tugas` varchar(20) NOT NULL,
  `id_pm` varchar(20) NOT NULL,
  `hasil_tugas` text NOT NULL,
  `dok_hasil_tugas` varchar(256) DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_tugas`
--

INSERT INTO `detail_tugas` (`id_det_tugas`, `id_tugas`, `id_pm`, `hasil_tugas`, `dok_hasil_tugas`, `status`) VALUES
('DPN2202011', 'PN220201', 'PM22001', '', NULL, 'Berlangsung'),
('DPN2202012', 'PN220201', 'PM22004', '', NULL, 'Berlangsung'),
('DPN2202013', 'PN220201', 'PM22006', '', NULL, 'Berlangsung'),
('DPN2202021', 'PN220202', 'PM22004', '', 'ASSIGMENT_BOOK.docx', 'Terkumpul'),
('DPN2202022', 'PN220202', 'PM22006', '', NULL, 'Berlangsung'),
('DPN2202031', 'PN220203', 'PM22004', 'kjasdgkasdg', 'pdf_form_012.pdf', 'Terkumpul'),
('DPN2202041', 'PN220204', 'PM22001', '', NULL, 'Berlangsung'),
('DPN2202042', 'PN220204', 'PM22002', '', NULL, 'Berlangsung'),
('DPN2202043', 'PN220204', 'PM22004', 'gaubah file', 'Surat_TUGAS_PKL_Balai_Penelitian_Agroklimat_Hidrologi.pdf', 'Terkumpul'),
('DPN2202061', 'PN220206', 'PM22001', '', NULL, 'Berlangsung'),
('DPN2202071', 'PN220207', 'PM22002', '', NULL, 'Berlangsung'),
('DPN2202081', 'PN220208', 'PM22002', '', NULL, 'Berlangsung'),
('DPN2202082', 'PN220208', 'PM22006', '', NULL, 'Berlangsung'),
('DPN2202091', 'PN220209', 'PM22001', '', NULL, 'Berlangsung'),
('DPN2202092', 'PN220209', 'PM22004', '', NULL, 'Berlangsung'),
('DPN2202101', 'PN220210', 'PM22004', '', NULL, 'Berlangsung'),
('DPN2202111', 'PN220211', 'PM22001', '', NULL, 'Berlangsung'),
('DPN2202112', 'PN220211', 'PM22004', '', NULL, 'Berlangsung'),
('DPN2202121', 'PN220212', 'PM22001', '', NULL, 'Berlangsung'),
('DPN2202122', 'PN220212', 'PM22004', '', NULL, 'Berlangsung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_mingguan`
--

CREATE TABLE `laporan_mingguan` (
  `id_lap_ming` varchar(20) NOT NULL,
  `tgl_lap_ming` date NOT NULL,
  `isi_lap_ming` text NOT NULL,
  `dok_lap_ming` varchar(256) DEFAULT NULL,
  `id_pm` varchar(20) NOT NULL,
  `review_lap` text NOT NULL,
  `status_rev` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan_mingguan`
--

INSERT INTO `laporan_mingguan` (`id_lap_ming`, `tgl_lap_ming`, `isi_lap_ming`, `dok_lap_ming`, `id_pm`, `review_lap`, `status_rev`) VALUES
('LM220201', '2022-02-11', 'ini abis diedit2yyaok', 'filebaruww.pdf', 'PM22004', '', ''),
('LM220202', '2022-02-09', 'testtestetst', 'pdf_form_012_J3C119027_signed.pdf', 'PM22004', 'ini perbarui', 'read'),
('LM220203', '2022-02-11', 'JJGJHGJ', 'pdf_form_012.pdf', 'PM22004', '', ''),
('LM220204', '2022-02-18', 'asfasdfad', 'Profil_Instansi_Balitklimat.pdf', 'PM22003', '', ''),
('LM220205', '2022-02-22', 'adfaedare', 'pdf_form_012_J3C119027_signed.pdf', 'PM22003', '', ''),
('LM220206', '2022-02-18', 'asdaera', '1-FRM_KESEDIAAN_PKL_TA_2122_INF.pdf', 'PM22002', '', ''),
('LM220207', '2022-02-26', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam pellentesque auctor. Mauris luctus mi leo, eget vulputate augue dignissim ac. Nulla auctor tortor tortor, ac finibus magna scelerisque non. Suspendisse ultrices justo eros, quis mollis nisi condimentum ut. Curabitur eu dictum arcu, a luctus mi. Morbi ac convallis libero. Duis et varius ipsum. Aenean euismod neque vel arcu semper vulputate. Quisque facilisis ipsum lectus, id molestie erat pretium nec. Curabitur et vestibulum ante.\r\n\r\nAenean eget mauris at est viverra ornare sed vitae sapien. Quisque sed purus iaculis, tincidunt purus in, porttitor nulla. Sed in nunc eu erat finibus semper vel a risus. Phasellus sagittis tellus in lectus efficitur fringilla. Quisque lacinia sed ipsum in pulvinar. Cras massa odio, gravida non metus ac, viverra commodo velit. Donec varius ante eu nunc dapibus, eget scelerisque lorem dapibus. Pellentesque non finibus elit, quis lacinia lorem. Maecenas pellentesque justo et ipsum volutpat, aliquam sodales ligula dignissim. Cras non tincidunt felis. Pellentesque hendrerit nunc et arcu tempor, sed bibendum leo congue. Vivamus et mi sed metus suscipit efficitur quis non nisi. Integer fermentum odio nec risus malesuada consequat. Suspendisse potenti. Nullam consectetur rhoncus tellus semper vehicula.\r\n\r\nSuspendisse potenti. Pellentesque vestibulum mauris est, eu facilisis lacus pulvinar et. Morbi lorem erat, lobortis vitae convallis nec, maximus sit amet eros. In lacinia sit amet nunc eu placerat. Aenean dapibus cursus nunc, quis ullamcorper diam finibus ac. Aliquam augue nisi, blandit id felis a, posuere tristique leo. Aliquam ac odio dictum lacus mollis dictum a vel nisi. Aenean dapibus tincidunt sem et sagittis. Donec commodo tortor egestas, dapibus est sed, fringilla dolor. Donec in sodales nibh. Nullam tempor lectus quis ipsum placerat interdum. Integer luctus neque eget quam aliquet, nec ornare nisi maximus. Aliquam in sapien sed ligula ultrices interdum. Nam dignissim, quam sit amet vestibulum ornare, dui nunc tempus neque, a rhoncus risus elit vel nibh. Nam vel vulputate mauris. ', 'Balai_Penelitian_Agroklimat_Hidrologi.pdf', 'PM22002', 'test', 'sent'),
('LM220208', '2022-02-26', 'hohohohoohoh', 'J3C118143-04-Fiya_Mahdaula-Pendahuluan.pdf', 'PM22004', '', ''),
('LM220209', '2022-02-19', 'ini dr halo halo', 'Proyek_Aplikasi_WebGIS.pdf', 'PM22006', '', ''),
('LM220210', '2022-02-17', 'ini dr halo halo jg', NULL, 'PM22006', '', ''),
('LM220211', '2022-02-16', 'gdgdfdf', 'Surat_TUGAS_PKL_Balai_Penelitian_Agroklimat_Hidrologi3.pdf', 'PM22004', '', ''),
('LM220212', '2022-02-18', ' yoyoyoyadasyoyoyoyadasyoyoyoyadasyoyoyoyadasyoyoyoyadasyoyoyoyadasyoyoyoyadasyoyoyoyadasyoyoyoyadasyoyoyoyadasyoyoyoyadasyoyoyoyadasyoyoyoyadasyoyoyoyadasyoyoyoyadasyoyoyoyadasyoyoyoyadasyoyoyoyadasyoyoyoyadasyoyoyoyadasyoyoyoyadasyoyoyoyadasyoyoyoyadasyoyoyoyadas', 'Profil_Instansi_Balitklimat1.pdf', 'PM22004', '', ''),
('LM220213', '2022-02-18', 'aaaa', NULL, 'PM22004', '', ''),
('LM220214', '2022-02-18', 'azzahra', '2.pdf', 'PM22004', '', ''),
('LM220215', '2022-02-25', 'tes ga ada file', NULL, 'PM22006', '', ''),
('LM220216', '2022-02-22', 'tes ada file', '7.pdf', 'PM22006', '', ''),
('LM220217', '2022-02-21', 'test file baru', 'filebaru.pdf', 'PM22004', '', ''),
('LM220218', '2022-02-24', 'hi hi hi', 'BDA4.pdf', 'PM22004', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notif_peserta`
--

CREATE TABLE `notif_peserta` (
  `id_np` varchar(20) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `id_aksi` varchar(20) NOT NULL,
  `status_np` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notif_peserta`
--

INSERT INTO `notif_peserta` (`id_np`, `jenis`, `id_aksi`, `status_np`) VALUES
('NP2202004', 'Review', 'LM220202', 'read'),
('NP2202005', 'PReview', 'LM220202', 'read'),
('NP2202007', 'Review', 'DPN2202091', 'sent'),
('NP2202008', 'Tugas', 'DPN2202092', 'read'),
('NP2202009', 'Review', 'PN220210', 'sent'),
('NP2202010', 'Tugas', 'DPN2202111', 'sent'),
('NP2202011', 'Tugas', 'DPN2202112', 'read'),
('NP2202013', 'Tugas', 'DPN2202121', 'sent'),
('NP2202014', 'Tugas', 'DPN2202122', 'read'),
('NP2202015', 'Review', 'LM220207', 'sent');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_magang`
--

CREATE TABLE `peserta_magang` (
  `id_pm` varchar(50) NOT NULL,
  `nama_pm` varchar(150) NOT NULL,
  `jk_pm` varchar(8) NOT NULL,
  `email_pm` varchar(150) NOT NULL,
  `no_wa_pm` int(15) NOT NULL,
  `jns_magang` varchar(10) NOT NULL,
  `asal_instansi_pm` varchar(150) NOT NULL,
  `jurusan_pm` varchar(128) NOT NULL,
  `pi_pm` varchar(150) NOT NULL,
  `no_wa_pi_pm` int(15) NOT NULL,
  `tgl_mli_pm` date NOT NULL,
  `tgl_sls_pm` date NOT NULL,
  `s_pengajuan_pm` varchar(150) NOT NULL,
  `s_penerimaan_pm` varchar(150) NOT NULL,
  `pembimbing_balai` varchar(256) NOT NULL,
  `kata_sandi_pm` varchar(256) NOT NULL,
  `status_pm` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peserta_magang`
--

INSERT INTO `peserta_magang` (`id_pm`, `nama_pm`, `jk_pm`, `email_pm`, `no_wa_pm`, `jns_magang`, `asal_instansi_pm`, `jurusan_pm`, `pi_pm`, `no_wa_pi_pm`, `tgl_mli_pm`, `tgl_sls_pm`, `s_pengajuan_pm`, `s_penerimaan_pm`, `pembimbing_balai`, `kata_sandi_pm`, `status_pm`) VALUES
('PM22001', 'AZZAHRA RAMADIANA ARIFANI', 'Wanita', 'albumfotoku2aaa@gmail.com', 2147483647, 'Siswa', 'xsda', 'ijurusan', 'asdjabsdja', 231231, '2022-02-03', '2022-03-03', 'Pengajuan.pdf', 'Pengajuan.pdf', '196401211990031002', '$2y$10$HIlVr6nNCsbCCJQ.kQk4zuq5uZGo9Pu8o2MTycMYXhqIBeHO4aDbu', 'berlangsung'),
('PM22002', 'Arima', 'Wanita', 'tugastugasku01@gmail.com', 11111, 'Siswa', 'xsda', 'ijurusan', 'asdas', 0, '2022-02-09', '2022-02-16', 'Surat_TUGAS_PKL_Balai_Penelitian_Agroklimat_Hidrologi.pdf', 'Profil_Instansi_Balitklimat2.pdf', '196401211990031002', '$2y$10$pNbY72one63X6i7uFHGRvOJsfgdC1UROh//v8heHNlT1nh1C6ffke', 'berlangsung'),
('PM22003', 'Amaira', 'Wanita', 'amaisiamaira@gmail.com', 123849523, 'Siswa', 'dfad', 'asdasd', 'asdasd', 1312434, '2022-02-11', '2022-02-28', 'Surat_TUGAS_PKL_Balai_Penelitian_Agroklimat_Hidrologi6.pdf', 'Profil_Instansi_Balitklimat8.pdf', '195805161993032002', '$2y$10$lgFydGQRwGOODt6ta211Ie2Syo6rEhJ7i.sdHSrQZK0lAXloB6.fq', 'berlangsung'),
('PM22004', 'ini user', 'Pria', 'azzahrara.0210@gmail.com', 85643, 'Mahasiswa', 'xsdaaa', 'asdasda', 'xsda', 8534234, '2022-02-01', '2022-03-28', 'filebaru.pdf', 'DEATH_NOTE1.pdf', '196401211990031002', '$2y$10$VVOsl.PoNHLDdhzNB0IOr.bPLViPUZq14ePQ6CoOSAqqHMxyKStwy', 'berlangsung'),
('PM22005', 'amaira rasyidah', 'Wanita', 'amai@gmail.com', 2147483647, 'Siswa', 'asal insdatra', 'jrururuur', 'pbbbei', 423434123, '2022-02-01', '2022-02-28', 'J3C118156-04-Nadya_Rahma_Lestanti-pendahuluan.pdf', 'JC3116009-05-Aisyah-Pendahuluan.pdf', '195805161993032002', '$2y$10$08Unb1Y0R6uTTZI74PKNYebKG55n8xPUULCMqyhwu9gG7kIfXzPrK', 'berlangsung'),
('PM22006', 'halo halo', 'Wanita', 'halohalo@gmail.com', 12312312, 'Mandiri', 'asal insdatra', 'jrururuur', 'pbbbei', 21331231, '2022-02-01', '2022-02-28', '221021_Progres_kel07_INFB.pdf', 'Proyek_Aplikasi_WebGIS1.pdf', '196401211990031002', '$2y$10$aGzqLplfYAI3kb1u.ulagOEGRMBWKIQtf3DroqY5WQcymNYQzv5AG', 'berlangsung'),
('PM22007', 'magang mandiri', 'Pria', 'magangmandiri@gmail.com', 2147483647, 'Mandiri', 'ia', 'iyawawa', '', 0, '2022-02-21', '2022-02-15', 'BDA4.pdf', 'TUGAS_PROBSTAT_1.pdf', '195805161993032002', '$2y$10$0olnIpO2R4oM.acibQqyQ.gXL9at2tbjTA4sznT.Y6pFzrps7DLCS', 'berlangsung'),
('PM22008', 'nojk', '', 'nojk@gmail.com', 2147483647, 'Mahasiswa', 'asal insdatra', 'asdasda', 'asdasdas', 0, '2022-02-23', '2022-02-26', 'Doc1.pdf', 'Doc11.pdf', '196710081994032013', '$2y$10$6O9xhWBg.Q4C8Tz1wuhndu4.aHSZ18etJsi7knrlThQHCZdwj0uRC', 'berlangsung'),
('PM22009', 'confirm', '', 'confirm@gmail.com', 2147483647, 'Mahasiswa', 'asal insdatra', 'asdasda', 'pbbbei', 21331231, '2022-02-11', '2022-02-23', 'yg_ini.pdf', 'DEATH_NOTE.pdf', '195805161993032002', '$2y$10$/NQIYcvtsRUxIYcVd57Fj.j6XqX4p9aDQULFjKVFpqFFIlU4Y4QMO', 'selesai'),
('PM22010', 'test surat', '', 'testsurat@gmail.com', 2147483647, 'Mandiri', 'asal insdatra', 'asdasda', '', 0, '2022-02-25', '2022-02-28', 'TUGAS_PROBSTAT_11.pdf', 'J3C11027_Azzahra_Ramadiana_A1.pdf', '195805161993032002', '$2y$10$Vs7VY4PR9zsk2DQYBJXC1.csFrNwag431j3UrSimg3y6fRQaZfTZe', 'berlangsung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_kepegawaian`
--

CREATE TABLE `status_kepegawaian` (
  `id_status_peg` int(11) NOT NULL,
  `status_kepegawaian` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_kepegawaian`
--

INSERT INTO `status_kepegawaian` (`id_status_peg`, `status_kepegawaian`) VALUES
(1, 'PNS'),
(2, 'PNS/TB'),
(3, 'CPNS'),
(5, 'PPNPN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` varchar(20) NOT NULL,
  `isi_tugas` text NOT NULL,
  `jumlah_pm` int(11) NOT NULL,
  `tgl_pengumpulan` date NOT NULL,
  `dok_tugas` varchar(256) DEFAULT NULL,
  `pembimbing_balai` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `isi_tugas`, `jumlah_pm`, `tgl_pengumpulan`, `dok_tugas`, `pembimbing_balai`) VALUES
('PN220201', 'haloo', 3, '2022-02-19', '', '196401211990031002'),
('PN220202', 'Tugas 2 buat ini user dan halo halo', 2, '2022-02-21', '', '196401211990031002'),
('PN220203', 'ga ubah f', 1, '2022-02-24', 'Profil_Instansi_Balitklimat.pdf', '196401211990031002'),
('PN220204', 'tugas 4', 3, '2022-02-25', '', '196401211990031002'),
('PN220206', 'ini tugas buat zahra di tanggal 22', 1, '2022-02-25', '', '196401211990031002'),
('PN220207', 'ini diedit tanpa ubah file trs ubah tanggal jadi 28', 1, '2022-02-28', 'Surat_TUGAS_PKL_Balai_Penelitian_Agroklimat_Hidrologi1.pdf', '196401211990031002'),
('PN220208', 'jadi buat arima ama halo halo aja, terus abis itu diubah jadi tanggal 28 trs abis itu ditambahin dokumen jadi  jurnal', 2, '2022-02-28', 'Jurnal_Harian_PKL.docx', '196401211990031002'),
('PN220209', 'notif', 2, '2022-02-25', '', '196401211990031002'),
('PN220210', 'buta ini userrrr', 1, '2022-02-26', '', '196401211990031002'),
('PN220211', 'ini buat user ama zahra', 2, '2022-02-25', '', '196401211990031002'),
('PN220212', 'tes notif lg', 2, '2022-02-26', '', '196401211990031002');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bt_alasan`
--
ALTER TABLE `bt_alasan`
  ADD PRIMARY KEY (`id_alasan`);

--
-- Indeks untuk tabel `bt_keperluan`
--
ALTER TABLE `bt_keperluan`
  ADD PRIMARY KEY (`id_keperluan`);

--
-- Indeks untuk tabel `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`id_buku_tamu`);

--
-- Indeks untuk tabel `data_divisi`
--
ALTER TABLE `data_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `data_golongan`
--
ALTER TABLE `data_golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indeks untuk tabel `data_jabatan`
--
ALTER TABLE `data_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `data_pangkat`
--
ALTER TABLE `data_pangkat`
  ADD PRIMARY KEY (`id_pangkat`);

--
-- Indeks untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `data_role`
--
ALTER TABLE `data_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `detail_tugas`
--
ALTER TABLE `detail_tugas`
  ADD PRIMARY KEY (`id_det_tugas`);

--
-- Indeks untuk tabel `laporan_mingguan`
--
ALTER TABLE `laporan_mingguan`
  ADD PRIMARY KEY (`id_lap_ming`);

--
-- Indeks untuk tabel `notif_peserta`
--
ALTER TABLE `notif_peserta`
  ADD PRIMARY KEY (`id_np`);

--
-- Indeks untuk tabel `peserta_magang`
--
ALTER TABLE `peserta_magang`
  ADD PRIMARY KEY (`id_pm`);

--
-- Indeks untuk tabel `status_kepegawaian`
--
ALTER TABLE `status_kepegawaian`
  ADD PRIMARY KEY (`id_status_peg`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_divisi`
--
ALTER TABLE `data_divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_golongan`
--
ALTER TABLE `data_golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `data_jabatan`
--
ALTER TABLE `data_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_pangkat`
--
ALTER TABLE `data_pangkat`
  MODIFY `id_pangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `data_role`
--
ALTER TABLE `data_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `status_kepegawaian`
--
ALTER TABLE `status_kepegawaian`
  MODIFY `id_status_peg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
