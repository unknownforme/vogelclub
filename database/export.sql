-- --------------------------------------------------------
-- Host:                         C:\Users\unknown\Documents\school\vogelclub\database\database.sqlite
-- Server version:               3.53.4
-- Server OS:                    
-- HeidiSQL Version:             12.22.0.7382
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES  */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for database
CREATE DATABASE "database";
;

-- Dumping structure for table database.addresses
CREATE TABLE IF NOT EXISTS "addresses" ("id" integer primary key autoincrement not null, "street" varchar not null, "house_number" integer not null, "postal_code" varchar not null, "city" varchar not null, "created_at" datetime, "updated_at" datetime);

-- Dumping data for table database.addresses: 1 rows
INSERT INTO "addresses" ("id", "street", "house_number", "postal_code", "city", "created_at", "updated_at") VALUES
	(1, 'Diamond Spurs', 152, '8Z8627', 'Altenwerthtown', NULL, NULL);

-- Dumping structure for table database.breeding_numbers
CREATE TABLE IF NOT EXISTS "breeding_numbers" ("id" integer primary key autoincrement not null, "breeding_number" varchar not null, "member_id" integer not null, "created_at" datetime, "updated_at" datetime);

-- Dumping data for table database.breeding_numbers: 8 rows
INSERT INTO "breeding_numbers" ("id", "breeding_number", "member_id", "created_at", "updated_at") VALUES
	(1, 'BN-0001', 9, '2026-11-02 18:42:38', '2026-11-02 18:42:38'),
	(2, 'BN-0002', 5, '2026-11-02 18:42:38', '2026-11-02 18:42:38'),
	(3, 'BN-0003', 7, '2026-11-02 18:42:38', '2026-11-02 18:42:38'),
	(4, 'BN-0004', 1, '2026-11-02 18:42:38', '2026-11-02 18:42:38'),
	(5, 'BN-0005', 4, '2026-11-02 18:42:38', '2026-11-02 18:42:38'),
	(6, 'BN-0006', 10, '2026-11-02 18:42:38', '2026-11-02 18:42:38'),
	(7, 'BN-0007', 3, '2026-11-02 18:42:38', '2026-11-02 18:42:38'),
	(8, 'BN-0008', 2, '2026-11-02 18:42:38', '2026-11-02 18:42:38');

-- Dumping structure for table database.cache
CREATE TABLE IF NOT EXISTS "cache" ("key" varchar not null, "value" text not null, "expiration" integer not null, primary key ("key"));
;
CREATE INDEX "cache_expiration_index" on "cache" ("expiration");

-- Dumping data for table database.cache: 0 rows

-- Dumping structure for table database.cache_locks
CREATE TABLE IF NOT EXISTS "cache_locks" ("key" varchar not null, "owner" varchar not null, "expiration" integer not null, primary key ("key"));
;
CREATE INDEX "cache_locks_expiration_index" on "cache_locks" ("expiration");

-- Dumping data for table database.cache_locks: 0 rows

-- Dumping structure for table database.failed_jobs
CREATE TABLE IF NOT EXISTS "failed_jobs" ("id" integer primary key autoincrement not null, "uuid" varchar not null, "connection" text not null, "queue" text not null, "payload" text not null, "exception" text not null, "failed_at" datetime not null default CURRENT_TIMESTAMP);
CREATE UNIQUE INDEX "failed_jobs_uuid_unique" on "failed_jobs" ("uuid");

-- Dumping data for table database.failed_jobs: 0 rows

-- Dumping structure for table database.invoices
CREATE TABLE IF NOT EXISTS "invoices" ("id" integer primary key autoincrement not null, "member_id" integer not null, "amount" numeric not null, "description" varchar not null, "created_at" datetime, "updated_at" datetime, "status" varchar not null default 'unpaid', foreign key("member_id") references "members"("id") on delete cascade);

-- Dumping data for table database.invoices: 15 rows
INSERT INTO "invoices" ("id", "member_id", "amount", "description", "created_at", "updated_at", "status") VALUES
	(1, 7, 4444, 'Factuur 1', '2026-11-02 18:42:38', '2026-11-02 18:42:38', 'unpaid'),
	(2, 6, 3502, 'Factuur 2', '2026-11-02 18:42:38', '2026-11-02 18:42:38', 'paid'),
	(3, 4, 3678, 'Factuur 3', '2026-11-02 18:42:38', '2026-11-02 18:42:38', 'unpaid'),
	(4, 5, 3299, 'Factuur 4', '2026-11-02 18:42:38', '2026-11-02 18:42:38', 'paid'),
	(5, 1, 4435, 'Factuur 5', '2026-11-02 18:42:38', '2026-11-02 18:42:38', 'unpaid'),
	(6, 5, 3547, 'Factuur 6', '2026-11-02 18:42:38', '2026-11-02 18:42:38', 'paid'),
	(7, 4, 1944, 'Factuur 7', '2026-11-02 18:42:38', '2026-11-02 18:42:38', 'unpaid'),
	(8, 7, 1105, 'Factuur 8', '2026-11-02 18:42:38', '2026-11-02 18:42:38', 'paid'),
	(9, 1, 4484, 'Factuur 9', '2026-11-02 18:42:38', '2026-11-02 18:42:38', 'unpaid'),
	(10, 10, 3932, 'Factuur 10', '2026-11-02 18:42:38', '2026-11-02 18:42:38', 'paid'),
	(11, 8, 3323, 'Factuur 11', '2026-11-02 18:42:38', '2026-11-02 18:42:38', 'unpaid'),
	(12, 6, 4616, 'Factuur 12', '2026-11-02 18:42:38', '2026-11-02 18:42:38', 'paid'),
	(13, 4, 1573, 'Factuur 13', '2026-11-02 18:42:38', '2026-11-02 18:42:38', 'unpaid'),
	(14, 8, 4518, 'Factuur 14', '2026-11-02 18:42:38', '2026-11-02 18:42:38', 'paid'),
	(15, 3, 1597, 'Factuur 15', '2026-11-02 18:42:38', '2026-11-02 18:42:38', 'unpaid');

-- Dumping structure for table database.job_batches
CREATE TABLE IF NOT EXISTS "job_batches" ("id" varchar not null, "name" varchar not null, "total_jobs" integer not null, "pending_jobs" integer not null, "failed_jobs" integer not null, "failed_job_ids" text not null, "options" text, "cancelled_at" integer, "created_at" integer not null, "finished_at" integer, primary key ("id"));
;

-- Dumping data for table database.job_batches: 0 rows

-- Dumping structure for table database.jobs
CREATE TABLE IF NOT EXISTS "jobs" ("id" integer primary key autoincrement not null, "queue" varchar not null, "payload" text not null, "attempts" integer not null, "reserved_at" integer, "available_at" integer not null, "created_at" integer not null);
CREATE INDEX "jobs_queue_index" on "jobs" ("queue");

-- Dumping data for table database.jobs: 0 rows

-- Dumping structure for table database.member_types
CREATE TABLE IF NOT EXISTS "member_types" ("id" integer primary key autoincrement not null, "name" varchar not null, "description" varchar not null, "price" integer not null, "created_at" datetime, "updated_at" datetime, "announced_price" numeric);

-- Dumping data for table database.member_types: 3 rows
INSERT INTO "member_types" ("id", "name", "description", "price", "created_at", "updated_at", "announced_price") VALUES
	(1, 'volwassen lid', 'een lid wie ouder is dan 18', 3600, NULL, NULL, NULL),
	(2, 'jeugdlid', 'een lid wie jonger dan 18 is', 1800, NULL, NULL, NULL),
	(3, 'gastlid', 'een lid van de vereniging die geen NBvV-lid is, en dus geen kweeknummer heeft', 1800, NULL, NULL, NULL);

-- Dumping structure for table database.members
CREATE TABLE IF NOT EXISTS "members" ("id" integer primary key autoincrement not null, "member_type_id" integer not null, "address_id" integer not null, "first_name" varchar not null, "middle_name" varchar, "last_name" varchar not null, "birth_date" date not null, "nbvv_number" varchar not null, "is_active" integer not null, "created_at" datetime, "updated_at" datetime, "deleted_at" datetime, "email" varchar not null, "price" numeric not null default '0', "cancellation_requested" tinyint(1) not null default '0', foreign key("member_type_id") references "member_types"("id"), foreign key("address_id") references "addresses"("id"));
CREATE UNIQUE INDEX "members_email_unique" on "members" ("email");

-- Dumping data for table database.members: 10 rows
INSERT INTO "members" ("id", "member_type_id", "address_id", "first_name", "middle_name", "last_name", "birth_date", "nbvv_number", "is_active", "created_at", "updated_at", "deleted_at", "email", "price", "cancellation_requested") VALUES
	(1, 1, 1, 'Naam1', NULL, 'Achternaam1', '1980-01-01', 'NBVV-0001', 1, '2026-11-02 18:42:38', '2026-11-02 18:42:38', NULL, 'member1@example.com', 3600, 0),
	(2, 2, 1, 'Naam2', NULL, 'Achternaam2', '1980-01-01', 'NBVV-0002', 1, '2026-11-02 18:42:38', '2026-11-02 18:42:38', NULL, 'member2@example.com', 3600, 0),
	(3, 1, 1, 'Naam3', NULL, 'Achternaam3', '1980-01-01', 'NBVV-0003', 0, '2026-11-02 18:42:38', '2026-11-02 18:42:38', NULL, 'member3@example.com', 3600, 0),
	(4, 1, 1, 'Naam4', NULL, 'Achternaam4', '1980-01-01', 'NBVV-0004', 1, '2026-11-02 18:42:38', '2026-11-02 18:42:38', NULL, 'member4@example.com', 3600, 0),
	(5, 1, 1, 'Naam5', NULL, 'Achternaam5', '1980-01-01', 'NBVV-0005', 1, '2026-11-02 18:42:38', '2026-11-02 18:42:38', NULL, 'member5@example.com', 3600, 0),
	(6, 2, 1, 'Naam6', NULL, 'Achternaam6', '1980-01-01', 'NBVV-0006', 0, '2026-11-02 18:42:38', '2026-11-02 18:42:38', NULL, 'member6@example.com', 3600, 0),
	(7, 3, 1, 'Naam7', NULL, 'Achternaam7', '1980-01-01', 'NBVV-0007', 1, '2026-11-02 18:42:38', '2026-11-02 18:42:38', NULL, 'member7@example.com', 3600, 0),
	(8, 2, 1, 'Naam8', NULL, 'Achternaam8', '1980-01-01', 'NBVV-0008', 1, '2026-11-02 18:42:38', '2026-11-02 18:42:38', NULL, 'member8@example.com', 3600, 0),
	(9, 2, 1, 'Naam9', NULL, 'Achternaam9', '1980-01-01', 'NBVV-0009', 0, '2026-11-02 18:42:38', '2026-11-02 18:42:38', NULL, 'member9@example.com', 3600, 0),
	(10, 3, 1, 'Naam10', NULL, 'Achternaam10', '1980-01-01', 'NBVV-0010', 1, '2026-11-02 18:42:38', '2026-11-02 18:42:38', NULL, 'member10@example.com', 3600, 0);

-- Dumping structure for table database.migrations
CREATE TABLE IF NOT EXISTS "migrations" ("id" integer primary key autoincrement not null, "migration" varchar not null, "batch" integer not null);

-- Dumping data for table database.migrations: 13 rows
INSERT INTO "migrations" ("id", "migration", "batch") VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_09_08_122051_create_member_types_table', 1),
	(5, '2026_09_08_122052_create_addresses_table', 1),
	(6, '2026_09_08_122114_create_members_table', 1),
	(7, '2026_09_08_122139_create_breeding_numbers_table', 1),
	(8, '2026_10_27_070225_add_announced_price_to_member_types_table', 1),
	(9, '2026_10_27_070226_create_invoices_table', 1),
	(10, '2026_10_27_155454_add_email_to_members_table', 1),
	(11, '2026_10_27_182406_add_price_to_members_table', 1),
	(12, '2026_10_27_204313_add_cancellation_requested_to_members_table', 1),
	(13, '2026_11_02_145344_add_status_to_invoices_table', 1);

-- Dumping structure for table database.password_reset_tokens
CREATE TABLE IF NOT EXISTS "password_reset_tokens" ("email" varchar not null, "token" varchar not null, "created_at" datetime, primary key ("email"));
;

-- Dumping data for table database.password_reset_tokens: 0 rows

-- Dumping structure for table database.sessions
CREATE TABLE IF NOT EXISTS "sessions" ("id" varchar not null, "user_id" integer, "ip_address" varchar, "user_agent" text, "payload" text not null, "last_activity" integer not null, primary key ("id"));
;
CREATE INDEX "sessions_user_id_index" on "sessions" ("user_id");
CREATE INDEX "sessions_last_activity_index" on "sessions" ("last_activity");

-- Dumping data for table database.sessions: 0 rows

-- Dumping structure for table database.users
CREATE TABLE IF NOT EXISTS "users" ("id" integer primary key autoincrement not null, "name" varchar not null, "email" varchar not null, "email_verified_at" datetime, "password" varchar not null, "remember_token" varchar, "created_at" datetime, "updated_at" datetime);
CREATE UNIQUE INDEX "users_email_unique" on "users" ("email");

-- Dumping data for table database.users: 1 rows
INSERT INTO "users" ("id", "name", "email", "email_verified_at", "password", "remember_token", "created_at", "updated_at") VALUES
	(1, 'Test User', 'test@example.com', '2026-11-02 18:42:39', '$2y$12$RPZMkoHx/1sSZhymusNDZe49ER/rGmABn3qa.f9HcNoyrIS8jTrkO', 'jAGWj4YGlZapC3DzP2xFP0u6SAUhK7VeA2CLVKDh6R0bXV1W7A2TnCm5V5rf', '2026-11-02 18:42:39', '2026-11-02 18:42:39');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
