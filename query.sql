create database festival;

use festival;

create table myfestival(
fno int not null AUTO_INCREMENT PRIMARY KEY,
email varchar(30) not null,
fname varchar(30) not null,
start datetime not null,
end datetime not null,
note varchar(50) not null
);

/* 테스트 케이스 생성용 쿼리입니다.
insert into myfestival(name, start, end, note)
value ('MC THE MAX', '2019-06-22 12:30:00',
'2019-06-22 18:30:00','안녕하세요 테스트입니다.' );
*/

create table user(
    email varchar(30) not null,
    name varchar(20) not null,
    password varchar(20) not null,
    phone int not null,
    primary key(email)
);

create table board(
    no int not null AUTO_INCREMENT,
    email varchar(30) not null,
    wdate date not null,
    title varchar(60) not null,
    note varchar(200) not null,
    primary key(no)
);

/*
insert into board (email, wdate, title, note) values('apple@abc.com', '2019-06-07', '안녕하세요', '테스트입니다.');
*/