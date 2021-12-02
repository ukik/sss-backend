# Host: localhost  (Version 5.7.24)
# Date: 2021-11-26 23:02:05
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "__jam"
#

DROP TABLE IF EXISTS `__jam`;
CREATE TABLE `__jam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL,
  `waktu_mulai` varchar(255) DEFAULT NULL,
  `jam_ke` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `waktu_selesai` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "__jam"
#


#
# Structure for table "__kategori"
#

DROP TABLE IF EXISTS `__kategori`;
CREATE TABLE `__kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL,
  `tipe` enum('pengumuman','berita') DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "__kategori"
#


#
# Structure for table "__poin_afektif_psikomotor"
#

DROP TABLE IF EXISTS `__poin_afektif_psikomotor`;
CREATE TABLE `__poin_afektif_psikomotor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'LB-AF-SD-{UUID}',
  `tipe` enum('k1','k2','k3') DEFAULT NULL COMMENT 'k1 = spiritual, k2 = sosial, k3 = keterampilan',
  `label` enum('beribadah','akhlak','disiplin','jujur','peduli','percaya_diri','santun','tanggung_jawab','keterampilan') DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='default';

#
# Data for table "__poin_afektif_psikomotor"
#


#
# Structure for table "__ruangan"
#

DROP TABLE IF EXISTS `__ruangan`;
CREATE TABLE `__ruangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-KBM-FKG-{UUID}',
  `user_id` varchar(255) DEFAULT NULL,
  `ruangan` varchar(255) DEFAULT NULL,
  `original_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `og_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_image_two` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_image_two` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_image_three` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='default';

#
# Data for table "__ruangan"
#


#
# Structure for table "__sekolah"
#

DROP TABLE IF EXISTS `__sekolah`;
CREATE TABLE `__sekolah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  `nis` varchar(255) DEFAULT NULL COMMENT 'NIS/NSS/NDS',
  `alamat_sekolah` text,
  `kode_pos` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `keluharan` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "__sekolah"
#


#
# Structure for table "berita"
#

DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `status` enum('published','draft') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "berita"
#


#
# Structure for table "berita_image"
#

DROP TABLE IF EXISTS `berita_image`;
CREATE TABLE `berita_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` varchar(255) DEFAULT NULL,
  `berita_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "berita_image"
#


#
# Structure for table "berita_tag"
#

DROP TABLE IF EXISTS `berita_tag`;
CREATE TABLE `berita_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `berita_id` varchar(255) DEFAULT NULL,
  `tag_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='pivot';

#
# Data for table "berita_tag"
#


#
# Structure for table "eskul"
#

DROP TABLE IF EXISTS `eskul`;
CREATE TABLE `eskul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-KBM-FKG-{UUID}',
  `user_id` varchar(255) DEFAULT NULL,
  `tahun_ajar` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `waktu_mulai` varchar(255) DEFAULT NULL,
  `waktu_selesai` varchar(255) DEFAULT NULL,
  `hari` varchar(255) DEFAULT NULL,
  `original_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `og_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_image_two` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_image_two` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_image_three` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "eskul"
#


#
# Structure for table "eskul_pembimbing"
#

DROP TABLE IF EXISTS `eskul_pembimbing`;
CREATE TABLE `eskul_pembimbing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guru_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "eskul_pembimbing"
#


#
# Structure for table "failed_jobs"
#

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

#
# Data for table "failed_jobs"
#


#
# Structure for table "galeri"
#

DROP TABLE IF EXISTS `galeri`;
CREATE TABLE `galeri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `original_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `og_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_image_two` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_image_two` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_image_three` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "galeri"
#


#
# Structure for table "guru"
#

DROP TABLE IF EXISTS `guru`;
CREATE TABLE `guru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `nuptk` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `golongan` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kelurahan` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `original_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `og_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_image_two` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_image_two` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_image_three` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "guru"
#


#
# Structure for table "guru_jabatan"
#

DROP TABLE IF EXISTS `guru_jabatan`;
CREATE TABLE `guru_jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guru_id` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "guru_jabatan"
#


#
# Structure for table "guru_pangkat"
#

DROP TABLE IF EXISTS `guru_pangkat`;
CREATE TABLE `guru_pangkat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guru_id` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "guru_pangkat"
#


#
# Structure for table "guru_pembimbing"
#

DROP TABLE IF EXISTS `guru_pembimbing`;
CREATE TABLE `guru_pembimbing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guru_id` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "guru_pembimbing"
#


#
# Structure for table "images"
#

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL,
  `galeri_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `original_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `og_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_image_two` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_image_two` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_image_three` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "images"
#


#
# Structure for table "jadwal_pelajaran"
#

DROP TABLE IF EXISTS `jadwal_pelajaran`;
CREATE TABLE `jadwal_pelajaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-KBM-FKG-{UUID}',
  `user_id` varchar(255) DEFAULT NULL,
  `ruangan_id` varchar(255) DEFAULT NULL,
  `tahun_ajar` varchar(255) DEFAULT NULL,
  `jam_ke` varchar(255) DEFAULT NULL,
  `durasi_mengajar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "jadwal_pelajaran"
#


#
# Structure for table "mapel"
#

DROP TABLE IF EXISTS `mapel`;
CREATE TABLE `mapel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'MP-{UUID}',
  `label` varchar(255) DEFAULT NULL COMMENT 'long name dipisah dengan _ dan huruf kecil',
  `deskripsi` varchar(255) DEFAULT NULL COMMENT 'nama mata pelajaran',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "mapel"
#


#
# Structure for table "migrations"
#

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "migrations"
#

INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2021_11_26_152823_create_permission_tables',2),(6,'2021_11_26_152905_create_products_table',3);

#
# Structure for table "misi"
#

DROP TABLE IF EXISTS `misi`;
CREATE TABLE `misi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "misi"
#


#
# Structure for table "password_resets"
#

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "password_resets"
#


#
# Structure for table "pengumuman"
#

DROP TABLE IF EXISTS `pengumuman`;
CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL COMMENT 'larangan,himbauan,perintah,saran,ajakan,informasi',
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "pengumuman"
#


#
# Structure for table "personal_access_tokens"
#

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

#
# Data for table "personal_access_tokens"
#


#
# Structure for table "rpp"
#

DROP TABLE IF EXISTS `rpp`;
CREATE TABLE `rpp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL COMMENT 'RPP',
  `uuid` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `tema_id` varchar(255) DEFAULT NULL,
  `subtema_id` varchar(255) DEFAULT NULL,
  `mapel` int(11) DEFAULT NULL COMMENT 'MULTIPLE: label dari table mapel',
  `semester` varchar(255) DEFAULT NULL,
  `tahun_ajar` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `jumlah_pertemuan` varchar(255) DEFAULT NULL,
  `durasi_mengajar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "rpp"
#


#
# Structure for table "rpp_indikator"
#

DROP TABLE IF EXISTS `rpp_indikator`;
CREATE TABLE `rpp_indikator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-IK-{UUID}',
  `rpp_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `tema_id` varchar(255) DEFAULT NULL,
  `subtema_id` varchar(255) DEFAULT NULL,
  `mapel` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "rpp_indikator"
#


#
# Structure for table "rpp_kegiatan_pembelajaran_foto_kegiatan"
#

DROP TABLE IF EXISTS `rpp_kegiatan_pembelajaran_foto_kegiatan`;
CREATE TABLE `rpp_kegiatan_pembelajaran_foto_kegiatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-KBM-FKG-{UUID}',
  `rpp_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `tema_id` varchar(255) DEFAULT NULL,
  `subtema_id` varchar(255) DEFAULT NULL,
  `original_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `og_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_image_two` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_image_two` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_image_three` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "rpp_kegiatan_pembelajaran_foto_kegiatan"
#


#
# Structure for table "rpp_kegiatan_pembelajaran_inti"
#

DROP TABLE IF EXISTS `rpp_kegiatan_pembelajaran_inti`;
CREATE TABLE `rpp_kegiatan_pembelajaran_inti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-KBM-IN-{UUID}',
  `rpp_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `tema_id` varchar(255) DEFAULT NULL,
  `subtema_id` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "rpp_kegiatan_pembelajaran_inti"
#


#
# Structure for table "rpp_kegiatan_pembelajaran_jadwal_kelas"
#

DROP TABLE IF EXISTS `rpp_kegiatan_pembelajaran_jadwal_kelas`;
CREATE TABLE `rpp_kegiatan_pembelajaran_jadwal_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-KBM-JK-{UUID}',
  `rpp_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `tema_id` varchar(255) DEFAULT NULL,
  `subtema_id` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `kelas_mulai` varchar(255) DEFAULT NULL,
  `toleransi_terlambat` varchar(255) DEFAULT NULL,
  `kelas_tutup` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "rpp_kegiatan_pembelajaran_jadwal_kelas"
#


#
# Structure for table "rpp_kegiatan_pembelajaran_nilai_afektif"
#

DROP TABLE IF EXISTS `rpp_kegiatan_pembelajaran_nilai_afektif`;
CREATE TABLE `rpp_kegiatan_pembelajaran_nilai_afektif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-KBM-NAF-{UUID}',
  `rpp_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `siswa_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `tema_id` varchar(255) DEFAULT NULL,
  `subtema_id` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `nilai` varchar(255) DEFAULT NULL,
  `poin_nilai` json DEFAULT NULL COMMENT '{ uuid: __poin_afektif_psikomotor UUID, nilai: 1-4 }',
  `jenis` enum('k1','k2') DEFAULT NULL,
  `catatan` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "rpp_kegiatan_pembelajaran_nilai_afektif"
#


#
# Structure for table "rpp_kegiatan_pembelajaran_nilai_kognitif"
#

DROP TABLE IF EXISTS `rpp_kegiatan_pembelajaran_nilai_kognitif`;
CREATE TABLE `rpp_kegiatan_pembelajaran_nilai_kognitif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-KBM-NKG-{UUID}',
  `rpp_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `siswa_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `tema_id` varchar(255) DEFAULT NULL,
  `subtema_id` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `nilai` varchar(255) DEFAULT NULL,
  `latihan_ke` varchar(255) DEFAULT NULL,
  `catatan` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "rpp_kegiatan_pembelajaran_nilai_kognitif"
#


#
# Structure for table "rpp_kegiatan_pembelajaran_nilai_psikomotor"
#

DROP TABLE IF EXISTS `rpp_kegiatan_pembelajaran_nilai_psikomotor`;
CREATE TABLE `rpp_kegiatan_pembelajaran_nilai_psikomotor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-KBM-NPS-{UUID}',
  `rpp_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `siswa_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `tema_id` varchar(255) DEFAULT NULL,
  `subtema_id` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `nilai` varchar(255) DEFAULT NULL,
  `poin_nilai` json DEFAULT NULL COMMENT '{ uuid: __poin_afektif_psikomotor UUID, nilai: 1-4 }',
  `jenis` enum('k3') DEFAULT NULL,
  `catatan` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "rpp_kegiatan_pembelajaran_nilai_psikomotor"
#


#
# Structure for table "rpp_kegiatan_pembelajaran_nilai_remedial"
#

DROP TABLE IF EXISTS `rpp_kegiatan_pembelajaran_nilai_remedial`;
CREATE TABLE `rpp_kegiatan_pembelajaran_nilai_remedial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-KBM-NRM-{UUID}',
  `rpp_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `siswa_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `tema_id` varchar(255) DEFAULT NULL,
  `subtema_id` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `nilai` varchar(255) DEFAULT NULL,
  `remdial_ke` varchar(255) DEFAULT NULL,
  `catatan` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "rpp_kegiatan_pembelajaran_nilai_remedial"
#


#
# Structure for table "rpp_kegiatan_pembelajaran_pembukaan"
#

DROP TABLE IF EXISTS `rpp_kegiatan_pembelajaran_pembukaan`;
CREATE TABLE `rpp_kegiatan_pembelajaran_pembukaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-KBM-PB-{UUID}',
  `rpp_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `tema_id` varchar(255) DEFAULT NULL,
  `subtema_id` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "rpp_kegiatan_pembelajaran_pembukaan"
#


#
# Structure for table "rpp_kegiatan_pembelajaran_penutup"
#

DROP TABLE IF EXISTS `rpp_kegiatan_pembelajaran_penutup`;
CREATE TABLE `rpp_kegiatan_pembelajaran_penutup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-KBM-PT-{UUID}',
  `rpp_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `tema_id` varchar(255) DEFAULT NULL,
  `subtema_id` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "rpp_kegiatan_pembelajaran_penutup"
#


#
# Structure for table "rpp_kegiatan_pembelajaran_presensi"
#

DROP TABLE IF EXISTS `rpp_kegiatan_pembelajaran_presensi`;
CREATE TABLE `rpp_kegiatan_pembelajaran_presensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-KBM-PR-{UUID}',
  `rpp_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `siswa_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `tema_id` varchar(255) DEFAULT NULL,
  `subtema_id` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `check_in_kelas` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('present','late','out','sick','permit','absence') DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "rpp_kegiatan_pembelajaran_presensi"
#


#
# Structure for table "rpp_kegiatan_pembelajaran_refleksi"
#

DROP TABLE IF EXISTS `rpp_kegiatan_pembelajaran_refleksi`;
CREATE TABLE `rpp_kegiatan_pembelajaran_refleksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-KBM-RF-{UUID}',
  `rpp_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `siswa_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `tema_id` varchar(255) DEFAULT NULL,
  `subtema_id` varchar(255) DEFAULT NULL,
  `catatan` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "rpp_kegiatan_pembelajaran_refleksi"
#


#
# Structure for table "rpp_kegiatan_pembelajaran_refleksi_umum"
#

DROP TABLE IF EXISTS `rpp_kegiatan_pembelajaran_refleksi_umum`;
CREATE TABLE `rpp_kegiatan_pembelajaran_refleksi_umum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-KBM-RFU-{UUID}',
  `rpp_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `tema_id` varchar(255) DEFAULT NULL,
  `subtema_id` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "rpp_kegiatan_pembelajaran_refleksi_umum"
#


#
# Structure for table "rpp_kompetensi_dasar"
#

DROP TABLE IF EXISTS `rpp_kompetensi_dasar`;
CREATE TABLE `rpp_kompetensi_dasar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-KD-{UUID}',
  `rpp_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `tema_id` varchar(255) DEFAULT NULL,
  `subtema_id` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "rpp_kompetensi_dasar"
#


#
# Structure for table "rpp_kompetensi_inti"
#

DROP TABLE IF EXISTS `rpp_kompetensi_inti`;
CREATE TABLE `rpp_kompetensi_inti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-KI-{UUID}',
  `rpp_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `tema_id` varchar(255) DEFAULT NULL,
  `subtema_id` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "rpp_kompetensi_inti"
#


#
# Structure for table "rpp_materi_pembelajaran"
#

DROP TABLE IF EXISTS `rpp_materi_pembelajaran`;
CREATE TABLE `rpp_materi_pembelajaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-MAP-{UUID}',
  `rpp_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `tema_id` varchar(255) DEFAULT NULL,
  `subtema_id` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "rpp_materi_pembelajaran"
#


#
# Structure for table "rpp_metode_pembelajaran"
#

DROP TABLE IF EXISTS `rpp_metode_pembelajaran`;
CREATE TABLE `rpp_metode_pembelajaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-MEP-{UUID}',
  `rpp_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `tema_id` varchar(255) DEFAULT NULL,
  `subtema_id` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "rpp_metode_pembelajaran"
#


#
# Structure for table "rpp_penilaian"
#

DROP TABLE IF EXISTS `rpp_penilaian`;
CREATE TABLE `rpp_penilaian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-PL-{UUID}',
  `rpp_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `tema_id` varchar(255) DEFAULT NULL,
  `subtema_id` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "rpp_penilaian"
#


#
# Structure for table "rpp_standar_kompetensi"
#

DROP TABLE IF EXISTS `rpp_standar_kompetensi`;
CREATE TABLE `rpp_standar_kompetensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-SK-{UUID}',
  `rpp_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `tema_id` varchar(255) DEFAULT NULL,
  `subtema_id` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "rpp_standar_kompetensi"
#


#
# Structure for table "rpp_sumber_belajar"
#

DROP TABLE IF EXISTS `rpp_sumber_belajar`;
CREATE TABLE `rpp_sumber_belajar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-SBL-{UUID}',
  `rpp_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `tema_id` varchar(255) DEFAULT NULL,
  `subtema_id` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "rpp_sumber_belajar"
#


#
# Structure for table "rpp_tujuan_pembelajaran"
#

DROP TABLE IF EXISTS `rpp_tujuan_pembelajaran`;
CREATE TABLE `rpp_tujuan_pembelajaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-TPJ-{UUID}',
  `rpp_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `tema_id` varchar(255) DEFAULT NULL,
  `subtema_id` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "rpp_tujuan_pembelajaran"
#


#
# Structure for table "siswa"
#

DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `nis` varchar(255) DEFAULT NULL COMMENT 'nomor induk siswa (NISN)',
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `status_keluarga` enum('kandung','angkat') DEFAULT NULL,
  `anak_ke` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon_rumah` varchar(255) DEFAULT NULL,
  `sekolah_asal` varchar(255) DEFAULT NULL,
  `diterima_kelas` varchar(255) DEFAULT NULL,
  `diterima_tanggal` varchar(255) DEFAULT NULL,
  `nama_ayah` varchar(255) DEFAULT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `alamat_orangtua` text,
  `pekerjaan_ayah` varchar(255) DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) DEFAULT NULL,
  `nama_wali` varchar(255) DEFAULT NULL,
  `alamat_wali` text,
  `telepon_wali` varchar(255) DEFAULT NULL,
  `pekerjaan_wali` varchar(255) DEFAULT NULL,
  `original_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `og_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `big_image_two` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_image_two` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_image_three` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "siswa"
#


#
# Structure for table "subtema"
#

DROP TABLE IF EXISTS `subtema`;
CREATE TABLE `subtema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-TM-{UUID}',
  `mapel_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `tema_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "subtema"
#


#
# Structure for table "sumber_belajar"
#

DROP TABLE IF EXISTS `sumber_belajar`;
CREATE TABLE `sumber_belajar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-TM-{UUID}',
  `mapel_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `jenis` enum('buku','website','video','media','peraga','gambar') DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "sumber_belajar"
#


#
# Structure for table "tags"
#

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tags"
#


#
# Structure for table "tema"
#

DROP TABLE IF EXISTS `tema`;
CREATE TABLE `tema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL COMMENT 'RPP-TM-{UUID}',
  `mapel_id` varchar(255) DEFAULT NULL,
  `guru_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tema"
#


#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'muhamad duki','1@gmail.com',NULL,'$2y$10$blEdOrqPSkp3MJsifli2Juquwau3JXIAfbIQCPK14pF8JN2yBkowi',NULL,'2021-11-26 15:08:56','2021-11-26 15:08:56');

#
# Structure for table "visi"
#

DROP TABLE IF EXISTS `visi`;
CREATE TABLE `visi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  `tahun_ajar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "visi"
#

