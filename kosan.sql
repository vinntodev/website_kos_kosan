-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27 Mar 2023 pada 10.47
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kosan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id` int(11) NOT NULL,
  `no_kamar` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id`, `no_kamar`, `status`) VALUES
(1, 1, 'Full');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `nama_penghuni` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `nomor_kamar` int(100) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `jumlah_tagihan` varchar(255) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `nama_penghuni`, `no_hp`, `no_ktp`, `nomor_kamar`, `tanggal_masuk`, `jatuh_tempo`, `jumlah_tagihan`, `bukti_pembayaran`, `status`) VALUES
(1, '6', '088289202209', '13040810109299322', 201, '2023-01-23', '2023-03-16', '1200000', 'profile.jpg', 'lunas'),
(2, '@trubus_wm', '082326019990', '13040810109299554', 202, '2023-03-23', '2023-03-19', '1200000', 'profile.jpg', 'Pending'),
(3, 'Jainuddin', '081218908904', '13040810109299778', 201, '2023-02-23', '2023-03-19', '1200000', 'profile.jpg', 'Pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghuni`
--

CREATE TABLE `penghuni` (
  `id` int(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `no_kamar` int(10) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penghuni`
--

INSERT INTO `penghuni` (`id`, `nama`, `ktp`, `alamat`, `tanggal_masuk`, `tanggal_pembayaran`, `no_kamar`, `pekerjaan`) VALUES
(2, 'Dodis Saufitro', '13040810101023', 'Talang Dasun, Nagari Pasie Laweh kec Sungai Tarab, Tanah Datar', '2023-03-01', '2023-04-01', 1, 'Pegawai Swasta'),
(3, 'Supriadi', '1304404933304', 'Jawa Barat', '2023-03-20', '2023-03-22', 2, 'Mahasiswa'),
(4, 'Dodis Saufitro', '13040810101023', 'Talang Dasun, Nagari Pasie Laweh kec Sungai Tarab, Tanah Datar', '2023-03-01', '2023-04-01', 3, 'Pegawai Swasta'),
(5, 'Supriadi', '1304404933304', 'Jawa Barat', '2023-03-20', '2023-03-22', 4, 'Mahasiswa'),
(6, 'Dodis Saufitro', '13040810101023', 'Talang Dasun, Nagari Pasie Laweh kec Sungai Tarab, Tanah Datar', '2023-03-01', '2023-04-01', 5, 'Pegawai Swasta'),
(7, 'Supriadi', '1304404933304', 'Jawa Barat', '2023-03-20', '2023-03-22', 6, 'Mahasiswa'),
(8, 'Dodis Saufitro', '13040810101023', 'Talang Dasun, Nagari Pasie Laweh kec Sungai Tarab, Tanah Datar', '2023-03-01', '2023-04-01', 7, 'Pegawai Swasta'),
(9, 'Supriadi', '1304404933304', 'Jawa Barat', '2023-03-20', '2023-03-22', 23, 'Mahasiswa'),
(10, 'Dodis Saufitro', '13040810101023', 'Talang Dasun, Nagari Pasie Laweh kec Sungai Tarab, Tanah Datar', '2023-03-01', '2023-04-01', 22, 'Pegawai Swasta'),
(11, 'Supriadi', '1304404933304', 'Jawa Barat', '2023-03-20', '2023-03-22', 23, 'Mahasiswa'),
(12, 'Dodis Saufitro', '13040810101023', 'Talang Dasun, Nagari Pasie Laweh kec Sungai Tarab, Tanah Datar', '2023-03-01', '2023-04-01', 22, 'Pegawai Swasta'),
(13, 'Supriadi', '1304404933304', 'Jawa Barat', '2023-03-20', '2023-03-22', 23, 'Mahasiswa'),
(14, 'Dodis Saufitro', '13040810101023', 'Talang Dasun, Nagari Pasie Laweh kec Sungai Tarab, Tanah Datar', '2023-03-01', '2023-04-01', 22, 'Pegawai Swasta'),
(15, 'Supriadi', '1304404933304', 'Jawa Barat', '2023-03-20', '2023-03-22', 23, 'Mahasiswa'),
(16, 'Dodis Saufitro', '13040810101023', 'Talang Dasun, Nagari Pasie Laweh kec Sungai Tarab, Tanah Datar', '2023-03-01', '2023-04-01', 22, 'Pegawai Swasta'),
(17, 'Supriadi', '1304404933304', 'Jawa Barat', '2023-03-20', '2023-03-22', 23, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `no_kamar` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `no_kamar`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 1, 'Kos Harmoni', 'saufitrod@gmail.com', 'pp.jpg', '$2y$10$L.y/0i6RKVG6Iu0GMG4TL.nQNJV9bpKd0zQqQluCtpADUMNu.bgwC', 1, 1, 1552120289),
(6, 21, 'John Finaldi', 'doddy@gmail.com', 'default1.jpg', '$2y$10$L.y/0i6RKVG6Iu0GMG4TL.nQNJV9bpKd0zQqQluCtpADUMNu.bgwC', 2, 1, 1552285263),
(11, 22, 'Sandhika Galih', 'sandhikagalih@gmail.com', 'default.jpg', '$2y$10$0QYEK1pB2L.Rdo.ZQsJO5eeTSpdzT7PvHaEwsuEyGSs0J1Qf5BoSq', 2, 1, 1553151354);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(7, 1, 3),
(8, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'ni-tv-2', 1),
(2, 2, 'My Profile', 'user', 'ni-calendar-grid-58', 1),
(3, 2, 'Edit Profile', 'user/edit', 'ni-credit-card', 2),
(4, 3, 'Menu Management', 'menu', 'ni-app', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'ni-world-2', 1),
(7, 1, 'Role', 'admin/role', 'ni-single-02', 2),
(8, 2, 'Change Password', 'user/changepassword', 'ni-single-copy-04', 1),
(9, 2, 'Pembayaran', 'user/pembayaran', 'ni-collection', 1),
(10, 1, 'Pembayaran', 'admin/pembayaran', 'fas fa-fw fa-key', 2),
(11, 1, 'Pesan', 'admin/pesan', 'ni-calendar-grid-58', 2),
(12, 3, 'Kamar', 'menu/kamar', 'fas fa-fw fa-home', 1),
(13, 3, 'Penghuni', 'menu/penghuni', 'fas fa-fw fa-user', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `penghuni`
--
ALTER TABLE `penghuni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `penghuni`
--
ALTER TABLE `penghuni`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
