

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'satu', NULL, NULL);



INSERT INTO `pengaduan` (`id_pengaduan`, `id_masyarakat`, `id_kategori`, `tgl_pengaduan`, `isi_pengaduan`, `foto`, `status_pengaduan`, `tanggapan`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '0000-00-00', 'adu ayam', '630e592122828.png', 'proses', '', '2022-08-30 10:38:25', '2022-08-30 10:40:11');

INSERT INTO `users` (`id`, `name`, `nik`, `dusun`, `telp`, `email`, `email_verified_at`, `password`, `role`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '', '', '', 'admin@mail.com', NULL, '$2y$10$N6nmGrHUtLAw5/5SlPZqEehn.S5KDNDFHf1yuW184mEw5zLWhVeLm', 'Administrator', '61b5cf20cb753.jpg', NULL, '2021-11-24 09:06:43', '2021-12-11 18:29:52'),
(2, 'sekdes', '', '', '', 'sekdes@mail.com', NULL, '$2y$10$c7J2BDTGhwGT3fXJewCRAupWjnLuGWaiDYML78C/xs.QaMtQlbE5m', 'sekdes', '', NULL, '2022-08-30 10:36:01', '2022-08-30 10:36:01'),
(3, 'baco', '', '', '', 'baco', NULL, '$2y$10$3tWHCByj2uAHVODjHQGj/.7RvKaUDAs130371rHPqXp6TwXmUO7Ge', 'masyarakat', '', NULL, '2022-08-30 10:36:12', '2022-08-30 10:36:12'),
(4, 'kepala', '', '', '', 'kepala', NULL, '$2y$10$wq8dyDPpIL60Diq1OvRZA.ef5flXixxAUnDK5Bd0O4oLTQv.BWzBO', 'kepala_desa', '', NULL, '2022-08-30 10:37:32', '2022-08-30 10:37:32');
