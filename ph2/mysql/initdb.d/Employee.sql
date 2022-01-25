-- ここは全部gitbashに打ち込む用







-- もしPOSSEっていうデータベースがあったら消してください
DROP DATABASE IF EXISTS quizy;

CREATE DATABASE quizy;

-- docker-compose.ymlのdbのembironmentのquizyに切り替える
USE quizy;

-- テストテーブルがあったら消してください
DROP TABLE IF EXISTS test_table;

-- ビッククエスチョンズを作ってください　かっこの中がテーブルの構成
CREATE TABLE big_questions (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name TEXT NOT NULL
) DEFAULT CHARACTER SET = utf8;

-- 上でできたテーブルに値を入れる
INSERT INTO
  big_questions (name)
VALUES
  ("東京の難読地名クイズ"),
("広島の難読地名クイズ");






-- questionsテーブル作成
DROP TABLE IF EXISTS questions;
create table questions
(id int,big_question_id int,img varchar(40))DEFAULT CHARACTER SET = utf8;


insert into
  questions
values
  (1,1, 'takanawa.png');


insert into
  questions
values
  (2, 1, 'kameido.png');


insert into
  questions
values
  (3, 2, 'mukainada.png');






-- choicesテーブル作成
DROP TABLE IF EXISTS choices;

create table choices (id int, question_id int, name varchar(40),valid int) DEFAULT CHARACTER SET = utf8;

insert into
  choices
values
  (1, 1, 'takanawa',1);
insert into
  choices
values
  (2, 1, 'takawa', 0);
insert into
  choices
values
  (3, 1, 'kouwa', 0);
insert into
  choices
values
  (4, 2, 'kameto', 0);
insert into
  choices
values
  (5, 2, 'kamedo', 0);
insert into
  choices
values
  (6, 2, 'kameido', 1);
insert into
  choices
values
  (7, 3, 'mukouhira',0);
insert into
  choices
values
  (8, 3, 'mukihira', 0);
insert into
  choices
values
  (9, 3, 'mukainada', 1);
