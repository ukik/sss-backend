# Host: localhost  (Version 5.7.24)
# Date: 2021-11-27 11:23:44
# Generator: MySQL-Front 6.0  (Build 2.20)


CREATE DATABASE IF NOT EXISTS `sekolah-backend`;

#
# Structure for table "__jam"
#

DROP TABLE IF EXISTS `sekolah-backend`.`__jam`;
CREATE TABLE `sekolah-backend`.`__jam` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`__kategori`;
CREATE TABLE `sekolah-backend`.`__kategori` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`__poin_afektif_psikomotor`;
CREATE TABLE `sekolah-backend`.`__poin_afektif_psikomotor` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`__ruangan`;
CREATE TABLE `sekolah-backend`.`__ruangan` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`__sekolah`;
CREATE TABLE `sekolah-backend`.`__sekolah` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`berita`;
CREATE TABLE `sekolah-backend`.`berita` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`berita_image`;
CREATE TABLE `sekolah-backend`.`berita_image` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`berita_tag`;
CREATE TABLE `sekolah-backend`.`berita_tag` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`eskul`;
CREATE TABLE `sekolah-backend`.`eskul` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`eskul_pembimbing`;
CREATE TABLE `sekolah-backend`.`eskul_pembimbing` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`failed_jobs`;
CREATE TABLE `sekolah-backend`.`failed_jobs` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`galeri`;
CREATE TABLE `sekolah-backend`.`galeri` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`guru`;
CREATE TABLE `sekolah-backend`.`guru` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`guru_jabatan`;
CREATE TABLE `sekolah-backend`.`guru_jabatan` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`guru_pangkat`;
CREATE TABLE `sekolah-backend`.`guru_pangkat` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`guru_pembimbing`;
CREATE TABLE `sekolah-backend`.`guru_pembimbing` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`images`;
CREATE TABLE `sekolah-backend`.`images` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`jadwal_pelajaran`;
CREATE TABLE `sekolah-backend`.`jadwal_pelajaran` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`mapel`;
CREATE TABLE `sekolah-backend`.`mapel` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`migrations`;
CREATE TABLE `sekolah-backend`.`migrations` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`misi`;
CREATE TABLE `sekolah-backend`.`misi` (
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
# Structure for table "model_has_permissions"
#

DROP TABLE IF EXISTS `sekolah-backend`.`model_has_permissions`;
CREATE TABLE `sekolah-backend`.`model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `laravel-8-roles-and-permissions`.`permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC COMMENT='core';

#
# Data for table "model_has_permissions"
#

INSERT INTO `model_has_permissions` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',1),(3,'App\\Models\\User',1),(4,'App\\Models\\User',1);

#
# Structure for table "model_has_roles"
#

DROP TABLE IF EXISTS `sekolah-backend`.`model_has_roles`;
CREATE TABLE `sekolah-backend`.`model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `laravel-8-roles-and-permissions`.`roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC COMMENT='core';

#
# Data for table "model_has_roles"
#

INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',2),(3,'App\\Models\\User',3);

#
# Structure for table "password_resets"
#

DROP TABLE IF EXISTS `sekolah-backend`.`password_resets`;
CREATE TABLE `sekolah-backend`.`password_resets` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`pengumuman`;
CREATE TABLE `sekolah-backend`.`pengumuman` (
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
# Structure for table "permissions"
#

DROP TABLE IF EXISTS `sekolah-backend`.`permissions`;
CREATE TABLE `sekolah-backend`.`permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'default: web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "permissions"
#

INSERT INTO `permissions` VALUES (1,'role-list','web','2021-11-26 23:15:41','2021-11-26 23:15:41'),(2,'role-create','web','2021-11-26 23:15:41','2021-11-26 23:15:41'),(3,'role-edit','web','2021-11-26 23:15:41','2021-11-26 23:15:41'),(4,'role-delete','web','2021-11-26 23:15:42','2021-11-26 23:15:42'),(5,'product-list','web','2021-11-26 23:15:42','2021-11-26 23:15:42'),(6,'product-create','web','2021-11-26 23:15:42','2021-11-26 23:15:42'),(7,'product-edit','web','2021-11-26 23:15:42','2021-11-26 23:15:42'),(8,'product-delete','web','2021-11-26 23:15:42','2021-11-26 23:15:42'),(9,'api-product-list','api',NULL,NULL),(10,'api-product-create','api',NULL,NULL),(11,'api-product-edit','api',NULL,NULL),(12,'api-product-delete','api',NULL,NULL);

#
# Structure for table "personal_access_tokens"
#

DROP TABLE IF EXISTS `sekolah-backend`.`personal_access_tokens`;
CREATE TABLE `sekolah-backend`.`personal_access_tokens` (
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
# Structure for table "products"
#

DROP TABLE IF EXISTS `sekolah-backend`.`products`;
CREATE TABLE `sekolah-backend`.`products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "products"
#


#
# Structure for table "role_has_permissions"
#

DROP TABLE IF EXISTS `sekolah-backend`.`role_has_permissions`;
CREATE TABLE `sekolah-backend`.`role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `laravel-8-roles-and-permissions`.`permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `laravel-8-roles-and-permissions`.`roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC COMMENT='core';

#
# Data for table "role_has_permissions"
#

INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,3),(10,2),(10,3);

#
# Structure for table "roles"
#

DROP TABLE IF EXISTS `sekolah-backend`.`roles`;
CREATE TABLE `sekolah-backend`.`roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'web' COMMENT 'default: web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "roles"
#

INSERT INTO `roles` VALUES (1,'Admin','web','2021-11-26 23:15:21','2021-11-26 23:15:21'),(2,'SiswaX','api',NULL,NULL),(3,'Guru','api',NULL,NULL);

#
# Structure for table "rpp_indikator"
#

DROP TABLE IF EXISTS `sekolah-backend`.`rpp_indikator`;
CREATE TABLE `sekolah-backend`.`rpp_indikator` (
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
# Structure for table "rpp_k13"
#

DROP TABLE IF EXISTS `sekolah-backend`.`rpp_k13`;
CREATE TABLE `sekolah-backend`.`rpp_k13` (
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
# Data for table "rpp_k13"
#


#
# Structure for table "rpp_k13_kegiatan_pembelajaran_foto_kegiatan"
#

DROP TABLE IF EXISTS `sekolah-backend`.`rpp_k13_kegiatan_pembelajaran_foto_kegiatan`;
CREATE TABLE `sekolah-backend`.`rpp_k13_kegiatan_pembelajaran_foto_kegiatan` (
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
# Data for table "rpp_k13_kegiatan_pembelajaran_foto_kegiatan"
#


#
# Structure for table "rpp_k13_kegiatan_pembelajaran_inti"
#

DROP TABLE IF EXISTS `sekolah-backend`.`rpp_k13_kegiatan_pembelajaran_inti`;
CREATE TABLE `sekolah-backend`.`rpp_k13_kegiatan_pembelajaran_inti` (
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
# Data for table "rpp_k13_kegiatan_pembelajaran_inti"
#


#
# Structure for table "rpp_k13_kegiatan_pembelajaran_jadwal_kelas"
#

DROP TABLE IF EXISTS `sekolah-backend`.`rpp_k13_kegiatan_pembelajaran_jadwal_kelas`;
CREATE TABLE `sekolah-backend`.`rpp_k13_kegiatan_pembelajaran_jadwal_kelas` (
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
# Data for table "rpp_k13_kegiatan_pembelajaran_jadwal_kelas"
#


#
# Structure for table "rpp_k13_kegiatan_pembelajaran_nilai_afektif"
#

DROP TABLE IF EXISTS `sekolah-backend`.`rpp_k13_kegiatan_pembelajaran_nilai_afektif`;
CREATE TABLE `sekolah-backend`.`rpp_k13_kegiatan_pembelajaran_nilai_afektif` (
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
# Data for table "rpp_k13_kegiatan_pembelajaran_nilai_afektif"
#


#
# Structure for table "rpp_k13_kegiatan_pembelajaran_nilai_kognitif"
#

DROP TABLE IF EXISTS `sekolah-backend`.`rpp_k13_kegiatan_pembelajaran_nilai_kognitif`;
CREATE TABLE `sekolah-backend`.`rpp_k13_kegiatan_pembelajaran_nilai_kognitif` (
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
# Data for table "rpp_k13_kegiatan_pembelajaran_nilai_kognitif"
#


#
# Structure for table "rpp_k13_kegiatan_pembelajaran_nilai_psikomotor"
#

DROP TABLE IF EXISTS `sekolah-backend`.`rpp_k13_kegiatan_pembelajaran_nilai_psikomotor`;
CREATE TABLE `sekolah-backend`.`rpp_k13_kegiatan_pembelajaran_nilai_psikomotor` (
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
# Data for table "rpp_k13_kegiatan_pembelajaran_nilai_psikomotor"
#


#
# Structure for table "rpp_k13_kegiatan_pembelajaran_nilai_remedial"
#

DROP TABLE IF EXISTS `sekolah-backend`.`rpp_k13_kegiatan_pembelajaran_nilai_remedial`;
CREATE TABLE `sekolah-backend`.`rpp_k13_kegiatan_pembelajaran_nilai_remedial` (
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
# Data for table "rpp_k13_kegiatan_pembelajaran_nilai_remedial"
#


#
# Structure for table "rpp_k13_kegiatan_pembelajaran_pembukaan"
#

DROP TABLE IF EXISTS `sekolah-backend`.`rpp_k13_kegiatan_pembelajaran_pembukaan`;
CREATE TABLE `sekolah-backend`.`rpp_k13_kegiatan_pembelajaran_pembukaan` (
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
# Data for table "rpp_k13_kegiatan_pembelajaran_pembukaan"
#


#
# Structure for table "rpp_k13_kegiatan_pembelajaran_penutup"
#

DROP TABLE IF EXISTS `sekolah-backend`.`rpp_k13_kegiatan_pembelajaran_penutup`;
CREATE TABLE `sekolah-backend`.`rpp_k13_kegiatan_pembelajaran_penutup` (
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
# Data for table "rpp_k13_kegiatan_pembelajaran_penutup"
#


#
# Structure for table "rpp_k13_kegiatan_pembelajaran_presensi"
#

DROP TABLE IF EXISTS `sekolah-backend`.`rpp_k13_kegiatan_pembelajaran_presensi`;
CREATE TABLE `sekolah-backend`.`rpp_k13_kegiatan_pembelajaran_presensi` (
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
# Data for table "rpp_k13_kegiatan_pembelajaran_presensi"
#


#
# Structure for table "rpp_k13_kegiatan_pembelajaran_refleksi"
#

DROP TABLE IF EXISTS `sekolah-backend`.`rpp_k13_kegiatan_pembelajaran_refleksi`;
CREATE TABLE `sekolah-backend`.`rpp_k13_kegiatan_pembelajaran_refleksi` (
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
# Data for table "rpp_k13_kegiatan_pembelajaran_refleksi"
#


#
# Structure for table "rpp_k13_kegiatan_pembelajaran_refleksi_umum"
#

DROP TABLE IF EXISTS `sekolah-backend`.`rpp_k13_kegiatan_pembelajaran_refleksi_umum`;
CREATE TABLE `sekolah-backend`.`rpp_k13_kegiatan_pembelajaran_refleksi_umum` (
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
# Data for table "rpp_k13_kegiatan_pembelajaran_refleksi_umum"
#


#
# Structure for table "rpp_k13_kompetensi_dasar"
#

DROP TABLE IF EXISTS `sekolah-backend`.`rpp_k13_kompetensi_dasar`;
CREATE TABLE `sekolah-backend`.`rpp_k13_kompetensi_dasar` (
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
# Data for table "rpp_k13_kompetensi_dasar"
#


#
# Structure for table "rpp_k13_kompetensi_inti"
#

DROP TABLE IF EXISTS `sekolah-backend`.`rpp_k13_kompetensi_inti`;
CREATE TABLE `sekolah-backend`.`rpp_k13_kompetensi_inti` (
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
# Data for table "rpp_k13_kompetensi_inti"
#


#
# Structure for table "rpp_k13_materi_pembelajaran"
#

DROP TABLE IF EXISTS `sekolah-backend`.`rpp_k13_materi_pembelajaran`;
CREATE TABLE `sekolah-backend`.`rpp_k13_materi_pembelajaran` (
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
# Data for table "rpp_k13_materi_pembelajaran"
#


#
# Structure for table "rpp_k13_metode_pembelajaran"
#

DROP TABLE IF EXISTS `sekolah-backend`.`rpp_k13_metode_pembelajaran`;
CREATE TABLE `sekolah-backend`.`rpp_k13_metode_pembelajaran` (
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
# Data for table "rpp_k13_metode_pembelajaran"
#


#
# Structure for table "rpp_k13_penilaian"
#

DROP TABLE IF EXISTS `sekolah-backend`.`rpp_k13_penilaian`;
CREATE TABLE `sekolah-backend`.`rpp_k13_penilaian` (
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
# Data for table "rpp_k13_penilaian"
#


#
# Structure for table "rpp_k13_standar_kompetensi"
#

DROP TABLE IF EXISTS `sekolah-backend`.`rpp_k13_standar_kompetensi`;
CREATE TABLE `sekolah-backend`.`rpp_k13_standar_kompetensi` (
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
# Data for table "rpp_k13_standar_kompetensi"
#


#
# Structure for table "rpp_k13_sumber_belajar"
#

DROP TABLE IF EXISTS `sekolah-backend`.`rpp_k13_sumber_belajar`;
CREATE TABLE `sekolah-backend`.`rpp_k13_sumber_belajar` (
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
# Data for table "rpp_k13_sumber_belajar"
#


#
# Structure for table "rpp_k13_tujuan_pembelajaran"
#

DROP TABLE IF EXISTS `sekolah-backend`.`rpp_k13_tujuan_pembelajaran`;
CREATE TABLE `sekolah-backend`.`rpp_k13_tujuan_pembelajaran` (
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
# Data for table "rpp_k13_tujuan_pembelajaran"
#


#
# Structure for table "siswa"
#

DROP TABLE IF EXISTS `sekolah-backend`.`siswa`;
CREATE TABLE `sekolah-backend`.`siswa` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`subtema`;
CREATE TABLE `sekolah-backend`.`subtema` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`sumber_belajar`;
CREATE TABLE `sekolah-backend`.`sumber_belajar` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`tags`;
CREATE TABLE `sekolah-backend`.`tags` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`tema`;
CREATE TABLE `sekolah-backend`.`tema` (
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

DROP TABLE IF EXISTS `sekolah-backend`.`users`;
CREATE TABLE `sekolah-backend`.`users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'tidak diperlukan',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'Hardik Savani','admin@gmail.com',NULL,'$2y$10$YRX5H9JMvoPyfGjLsup3Ve4s0p49NO3TSUY..x1qE61JvNWnaDtHC',NULL,'2021-11-26 23:15:21','2021-11-26 23:15:21'),(2,'1@gmail.com','1@gmail.com',NULL,'$2y$10$oU41xuAx4MKzX7PPtZDhhuT1vJHRQXdYRuR/T2LVZeb35/YfERT8O',NULL,'2021-11-26 23:30:26','2021-11-27 00:21:54'),(3,'x@gmail.com','x@gmail.com',NULL,'$2y$10$P/wnRCbGW5CP27PTmO185u4h9VDuVU9ROI0ZxSKWaJ2C4ZV3zEhpm',NULL,'2021-11-27 00:22:13','2021-11-27 00:35:08');

#
# Structure for table "visi"
#

DROP TABLE IF EXISTS `sekolah-backend`.`visi`;
CREATE TABLE `sekolah-backend`.`visi` (
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

