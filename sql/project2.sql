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
insert into user values ('00004', 'leo', 'loep', '0', '00002');

insert into books values ('00001', 'Love World', 'Love', '00001', 'lovewriter', 'lovetraslator', '1', '299', '1999-01-01', 'about love story', '299', '20', '15', '2', 'English', '1');
insert into books values ('00002', 'Murder on the Orient Express', 'Suspense', '00001', 'suspensewriter', 'suspentraslator', '2', '399', '2000-01-01', 'about murder story', '399', '25', '20', '2', 'English', '1');
insert into books values ('00003', 'The Romance of the Three Kingdoms', 'History', '00002', 'lo kuan chung', 'me', '1', '399', '1888-01-01', 'about chinese story', '399', '30', '20', '3', 'Chinese', '0');
insert into books values ('00004', 'Science Door', 'science', '00002', 'sciencewriter', 'me', '1', '299', '2001-01-01', 'about science story', '299', '15', '10', '3', 'English', '0');
insert into books values ('00005', 'Say Goodbye', 'Love', '00003', 'lovewriter', 'lovetraslator', '1', '399', '1999-02-02', 'about love story2', '299', '15', '10', '3', 'English', '0');
insert into books values ('00006', 'sad World', 'Love', '00001', 'lovewriter', 'lovetraslator', '1', '299', '1999-01-01', 'about love story', '299', '20', '15', '2', 'English', '1');
insert into books values ('00007', 'steel on the Orient Express', 'Suspense', '00001', 'suspensewriter', 'suspentraslator', '2', '399', '2000-01-01', 'about murder story', '399', '25', '20', '2', 'English', '1');
insert into books values ('00008', 'The sedness of the Three Kingdoms', 'History', '00002', 'lo kuan chung', 'me', '1', '399', '1888-01-01', 'about chinese story', '399', '30', '20', '3', 'Chinese', '0');
insert into books values ('00009', 'stone Door', 'science', '00002', 'sciencewriter', 'me', '1', '299', '2001-01-01', 'about science story', '299', '15', '10', '3', 'English', '0');
insert into books values ('00010', 'Say Hi', 'Love', '00003', 'lovewriter', 'lovetraslator', '1', '399', '1999-02-02', 'about love story2', '299', '15', '10', '3', 'English', '0');

insert into transaction values ('00001', '0', '00001', '2020-05-11 20:49:45', '399', '0000-00-00 00:00:00');
insert into transaction values ('00002', '1', '00002', '2020-05-11 20:49:46', '399', '0000-00-00 00:00:00');
insert into transaction values ('00003', '0', '00001', '2020-05-11 20:49:45', '299', '2020-05-12 20:49:45');
insert into transaction values ('00004', '1', '00003', '2020-05-11 21:49:46', '798', '0000-00-00 00:00:00');
insert into transaction values ('00005', '0', '00004', '2020-05-11 20:49:45', '399', '0000-00-00 00:00:00');
insert into transaction values ('00006', '1', '00004', '2020-05-11 20:49:46', '399', '0000-00-00 00:00:00');
insert into transaction values ('00007', '0', '00001', '2020-05-11 20:49:45', '299', '2020-05-12 20:49:45');
insert into transaction values ('00008', '1', '00002', '2020-05-11 21:49:46', '798', '0000-00-00 00:00:00');
insert into transaction values ('00009', '0', '00003', '2020-05-11 20:49:45', '299', '2020-05-12 20:49:45');
insert into transaction values ('00010', '1', '00004', '2020-05-11 21:49:46', '798', '0000-00-00 00:00:00');

insert into books_trans values ('00002', '00001', '3');
insert into books_trans values ('00003', '00001', '2');
insert into books_trans values ('00001', '00002', '4');
insert into books_trans values ('00005', '00002', '5');
insert into books_trans values ('00002', '00003', '6');
insert into books_trans values ('00002', '00003', '3');
insert into books_trans values ('00003', '00004', '2');
insert into books_trans values ('00001', '00004', '4');
insert into books_trans values ('00010', '00005', '5');
insert into books_trans values ('00008', '00006', '6');
insert into books_trans values ('00009', '00007', '3');
insert into books_trans values ('00007', '00008', '2');
insert into books_trans values ('00006', '00009', '4');
insert into books_trans values ('00005', '00010', '5');
insert into books_trans values ('00004', '00010', '6');

insert into promotion values ('00001', '2020-05-11', '2020-06-11', 'book_00001+00002 => 80% off');
insert into promotion values ('00002', '2020-06-11', '2020-07-11', 'book_00003+00004 => 60% off');

insert into store values ('00001', 'Zhongzheng Store', '1F., No.1, Gongyuan Rd., Zhongzheng Dist., Taipei City 100, Taiwan (R.O.C.)');
insert into store values ('00002', 'Xindian Store', '1F., 1F., No.1, Sanmin Rd., Xindian Dist., New Taipei City 231, Taiwan (R.O.C.)');
insert into store values ('00003', 'Xin Store', '2F., 2F., No.2, Sanmin Rd., Xindian Dist., New Taipei City 222, Taiwan (R.O.C.)');

insert into involve values ('00001', '00001', '00001');
insert into involve values ('00001', '00002', '00001');
insert into involve values ('00002', '00003', '00002');
insert into involve values ('00002', '00004', '00002');

insert into storage values ('00001', '00001', '100');
insert into storage values ('00001', '00002', '50');
insert into storage values ('00001', '00003', '100');
insert into storage values ('00001', '00004', '50');
insert into storage values ('00001', '00005', '100');
insert into storage values ('00001', '00006', '100');
insert into storage values ('00001', '00007', '50');
insert into storage values ('00001', '00008', '100');
insert into storage values ('00001', '00009', '50');
insert into storage values ('00001', '000010', '100');
insert into storage values ('00002', '00001', '100');
insert into storage values ('00002', '00002', '100');
insert into storage values ('00002', '00003', '100');
insert into storage values ('00002', '00004', '50');
insert into storage values ('00002', '00005', '100');
insert into storage values ('00003', '00006', '50');
insert into storage values ('00003', '00007', '100');
insert into storage values ('00003', '00008', '100');
insert into storage values ('00003', '00009', '100');
insert into storage values ('00003', '00010', '100');