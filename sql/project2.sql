delete from publisher;
delete from user;
delete from books;
delete from transaction;
delete from books_trans;
delete from promotion;
delete from store;
delete from involve;
delete from storage;

insert into publisher values ('00001', 'publisher1', '0900000001');
insert into publisher values ('00002', 'publisher2', '0900000002');
insert into publisher values ('00003', 'publisher3', '0900000003');

insert into user values ('00001', 'jimmy', 'jimmyp', '1', '00001');
insert into user values ('00002', 'keven', 'kevenp', '0', '00001');
insert into user values ('00003', 'jesica', 'jesicap', '1', '00002');

insert into books values ('00001', 'Love World', 'Love', '00001', 'lovewriter', 'lovetraslator', '1', '299', '1999-01-01', 'about love story', '299', '20', '15', '2', 'English', '1');
insert into books values ('00002', 'Murder on the Orient Express', 'Suspense', '00001', 'suspensewriter', 'suspentraslator', '2', '399', '2000-01-01', 'about murder story', '399', '25', '20', '2', 'English', '1');
insert into books values ('00003', 'The Romance of the Three Kingdoms', 'History', '00002', 'lo kuan chung', 'me', '1', '399', '1888-01-01', 'about chinese story', '399', '30', '20', '3', 'Chinese', '0');
insert into books values ('00004', 'Science Door', 'science', '00002', 'sciencewriter', 'me', '1', '299', '2001-01-01', 'about science story', '299', '15', '10', '3', 'English', '0');
insert into books values ('00005', 'Say Goodbye', 'Love', '00003', 'lovewriter', 'lovetraslator', '1', '399', '1999-02-02', 'about love story2', '299', '15', '10', '3', 'English', '0');

insert into transaction values ('00001', '0', '00001', '2020-05-11 20:49:45', '399', 'NULL');
insert into transaction values ('00002', '1', '00002', '2020-05-11 20:49:46', '399', 'NULL');
insert into transaction values ('00003', '0', '00001', '2020-05-11 20:49:45', '299', '2020-05-12 20:49:45');
insert into transaction values ('00004', '1', '00003', '2020-05-11 21:49:46', '798', 'NULL');

insert into books_trans values ('00002', '00001', '3');
insert into books_trans values ('00003', '00002', '2');
insert into books_trans values ('00001', '00003', '4');
insert into books_trans values ('00005', '00004', '5');
insert into books_trans values ('00002', '00004', '6');

insert into promotion values ('00001', '2020-05-11', '2020-06-11', 'book_00001+00002 => 80% off');
insert into promotion values ('00002', '2020-06-11', '2020-07-11', 'book_00002+00003 => 60% off');

insert into store values ('00001', 'Zhongzheng Store', '1F., No.1, Gongyuan Rd., Zhongzheng Dist., Taipei City 100, Taiwan (R.O.C.)');
insert into store values ('00002', 'Xindian Store', '1F., 1F., No.1, Sanmin Rd., Xindian Dist., New Taipei City 231, Taiwan (R.O.C.)');

insert into involve values ('00001', '00001', '00001');
insert into involve values ('00001', '00002', '00001');
insert into involve values ('00002', '00003', '00002');
insert into involve values ('00002', '00004', '00002');

insert into storage values ('00001', '00001', '100');
insert into storage values ('00001', '00002', '50');
insert into storage values ('00001', '00003', '100');
insert into storage values ('00001', '00004', '50');
insert into storage values ('00002', '00002', '100');
insert into storage values ('00002', '00003', '100');
insert into storage values ('00002', '00004', '100');