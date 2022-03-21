-- ここは全部gitbashに打ち込む用
-- もしPOSSEっていうデータベースがあったら消してください
-- DROP DATABASE IF EXISTS webapp;
-- CREATE DATABASE webapp;
-- USE mysql;
-- alter user 'rei' @'%' identified with mysql_native_password by 'password';
-- -- -- docker-compose.ymlのdbのembironmentのquizyに切り替える
-- USE webapp;
-- set
--   character_set_client = utf8mb4;
-- set
--   character_set_connection = utf8mb4;
-- set
--   character_set_results = utf8mb4;
-- DROP TABLE IF EXIST `contents`;
-- CREATE TABLE `contents` (
--   `id` INT NOT NULL AUTO_INCREMENT,
--   `created_at` timestamp NOT NULL,
--   `updated_at` timestamp NULL,
--   `name` VARCHAR(40) NOT NULL,
--   `color` VARCHAR(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
--   PRIMARY KEY (id)
-- ) COMMENT '学習コンテンツのテーブル';
-- INSERT INTO
--   `contents` (name, color)
-- VALUES
-- ('N予備校','0345EC'),
-- ('ドットインストール','0F71BD'),
-- ('POSSE課題','20BDDE');
-- DROP TABLE IF EXIST `languages`;
-- CREATE TABLE `languages` (
--   `id` INT NOT NULL AUTO_INCREMENT,
--   `created_at` timestamp NOT NULL,
--   `updated_at` timestamp NULL,
--   `name` VARCHAR(40) NOT NULL,
--   `color` VARCHAR(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
--   PRIMARY KEY (id)
-- ) COMMENT '学習言語のテーブル';
-- DROP TABLE IF EXIST `study_reports`;
-- CREATE TABLE `study_reports` (
--   `id` INT NOT NULL AUTO_INCREMENT,
--   `updated_at` timestamp NULL,
--   `study_date` DATE NOT NULL,
--   `study_time` FLOAT NOT NULL,
--   `language_id` INT NOT NULL,
--   `content_id` INT NOT NULL,
--   PRIMARY KEY (id)
-- ) COMMENT '記録時に送信されるテーブル';
-- INSERT INTO
--   `study_reports` (`study_date`, `study_time`, `language_id`, `content_id`)
-- VALUES
--   ('2022-03-1', 4, 8, 3),
--   ('2022-03-2', 4, 2, 1),
--   ('2022-03-3', 4, 5, 1),
--   ('2022-03-4', 3, 3, 2),
--   ('2022-03-5', 3, 1, 3),
--   ('2022-03-8', 3, 4, 2),
--   ('2022-03-11', 2, 6, 2),
--   ('2022-03-12', 2, 7, 3),
--   ('2022-03-13', 5, 2, 1),
--   ('2022-03-14', 4, 5, 1),
--   ('2022-03-16', 3, 5, 1),
--   ('2022-03-17', 6, 3, 2),
--   ('2022-03-18', 4, 1, 3),
--   ('2022-03-19', 3, 4, 2),
--   ('2022-03-21', 3, 5, 1),
--   ('2022-03-23', 6, 6, 2);
-- -- ALTER TABLE
-- --   `study_reports`
-- -- ADD
-- --   CONSTRAINT FK_languages_TO_study_reports FOREIGN KEY (`language_id`) REFERENCES languages (`id`);
-- -- ALTER TABLE
-- --   `study_reports`
-- -- ADD
-- --   CONSTRAINT FK_contents_TO_study_reports FOREIGN KEY (`content_id`) REFERENCES contents (`id`);
DROP SCHEMA IF EXISTS webapp;

CREATE SCHEMA webapp;

USE webapp;

alter user 'rei' @'%' identified with mysql_native_password by 'password';

set
  character_set_client = utf8mb4;

set
  character_set_connection = utf8mb4;

set
  character_set_results = utf8mb4;

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
  `id` INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `name` VARCHAR(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `color` VARCHAR(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
);

INSERT INTO
  `languages` (`name`, `color`)
VALUES
  ('JavaScript', '1754EF'),
  ('CSS', '1071BD'),
  ('PHP', '20BEDE'),
  ('HTML', '3CCEFE'),
  ('Lalavel', 'B29EF3'),
  ('SQL', '6D46EC'),
  ('SHELL', '4A18EF'),
  ('情報システム基礎知識（その他)', '3105C0');

DROP TABLE IF EXISTS `contents`;

CREATE TABLE `contents` (
  `id` INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `name` VARCHAR(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `color` VARCHAR(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
);

INSERT INTO
  `contents` (`name`, `color`)
VALUES
  ('ドットインストール', '1754EF'),
  ('N予備校', '1071BD'),
  ('POSSE課題', '20BEDE');

DROP TABLE IF EXISTS `study_reports`;

CREATE TABLE `study_reports` (
  `id` INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `study_date` date NOT NULL,
  `language_id` INT NOT NULL,
  `content_id` INT NOT NULL,
  `study_hour` INT
);

INSERT INTO
  `study_reports` (
    `study_date`,
    `language_id`,
    `content_id`,
    `study_hour`
  )
VALUES
  ('2022-3-05', 1, 1, 1),
  ('2022-3-06', 3, 2, 1),
  ('2022-3-07', 4, 3, 1),
  ('2022-3-08', 2, 1, 1),
  ('2022-3-09', 1, 1, 2),
  ('2022-3-10', 5, 2, 2),
  ('2022-3-11', 6, 3, 2),
  ('2022-3-12', 7, 3, 2),
  ('2022-3-13', 3, 1, 3),
  ('2022-3-14', 3, 2, 3),
  ('2022-3-15', 8, 3, 3),
  ('2022-3-16', 3, 2, 3),
  ('2022-4-17', 4, 1, 1),
  ('2022-4-17', 3, 2, 1),
  ('2022-4-17', 2, 3, 2),
  ('2022-4-17', 3, 1, 2),
  ('2022-5-17', 4, 1, 3),
  ('2022-5-17', 3, 2, 3),
  ('2022-5-17', 2, 3, 3);
