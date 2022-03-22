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
  `study_time` INT
);

INSERT INTO
  `study_reports` (
    `study_date`,
    `language_id`,
    `content_id`,
    `study_time`
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
