-- ここは全部gitbashに打ち込む用

-- もしPOSSEっていうデータベースがあったら消してください
DROP DATABASE IF EXISTS webapp;

CREATE DATABASE webapp;

USE mysql;


alter user 'rei'@'%' identified with mysql_native_password by 'password';


-- docker-compose.ymlのdbのembironmentのquizyに切り替える
USE webapp;




set character_set_client = utf8mb4;
set character_set_connection = utf8mb4;
set character_set_results = utf8mb4;

CREATE TABLE contents
(
  id         INT         NOT NULL AUTO_INCREMENT,
  created_at timestamp   NOT NULL,
  updated_at timestamp   NULL    ,
  name       VARCHAR(40) NOT NULL,
  PRIMARY KEY (id)
) COMMENT '学習コンテンツのテーブル';

CREATE TABLE languages
(
  id         INT         NOT NULL AUTO_INCREMENT,
  created_at timestamp   NOT NULL,
  updated_at timestamp   NULL    ,
  name       VARCHAR(40) NOT NULL,
  PRIMARY KEY (id)
) COMMENT '学習言語のテーブル';

CREATE TABLE study_reports
(
  id          INT       NOT NULL AUTO_INCREMENT,
  created_at  timestamp NOT NULL,
  updated_at  timestamp NULL    ,
  study_time  FLOAT     NOT NULL,
  language_id INT       NOT NULL,
  content_id  INT       NOT NULL,
  PRIMARY KEY (id)
) COMMENT '記録時に送信されるテーブル';

ALTER TABLE study_reports
  ADD CONSTRAINT FK_languages_TO_study_reports
    FOREIGN KEY (language_id)
    REFERENCES languages (id);

ALTER TABLE study_reports
  ADD CONSTRAINT FK_contents_TO_study_reports
    FOREIGN KEY (content_id)
    REFERENCES contents (id);
