create table publisher
	(ID		char(5),
	name		varchar(20),
	contact		char(10),
	primary key (ID)
)ENGINE=INNODB;

create table user
	(ID		char(5),
 name		varchar(20),
 password	varchar(20),
 authority	tinyint(1),
 store_ID	char(5),
 primary key ( ID)
)ENGINE=INNODB;

create table books
	(ID		char(5),
	 name		varchar(50),
	 catergory	varchar(20),
	 publisher_ID	char(5),
	 writer		varchar(20),
	 traslator	varchar(20),
	 version	numeric(10,0),
	 price		numeric(10,0),
	 date_of_publish	date,
	 intro		text,
	 pages		numeric(10,0),
	 size_l		numeric(10,0),
	 size_w		numeric(10,0),
	 size_h		numeric(10,0),
	 language	varchar(20),
	 binding	tinyint,
	 primary key (ID),
 foreign key ( publisher_ID) references publisher(ID)
	on delete cascade
	) ENGINE=INNODB;

create table transaction
	(ID		char(5),
	way		tinyint,
	user_ID	char(5) not null,
	time		timestamp,
	total		int,
	invalid_time	timestamp,
	primary key ( ID),
foreign key (user_ID) references user(ID)
	on delete cascade
) ENGINE=INNODB;

	
create table books_trans
	(book_ID	char(5),
 transaction_ID	char(5),
 amount numeric(3, 0),
 primary key ( book_ID,  transaction_ID),
 foreign key (book_ID) references books(ID)
	on delete cascade,
 foreign key (transaction_ID) references transaction(ID)
	on delete cascade
) ENGINE=INNODB;

create table promotion
	(ID		char(5),
 start_time	date,
 end_time	date,
 content	text,
 primary key (ID)
)ENGINE=INNODB;

create table store
	(ID		char(5),
 name		varchar(20),
 address	varchar(100),
 primary key ( ID)
)ENGINE=INNODB;

create table involve
	(promotion_ID	char(5),
 books_ID	char(5),
 store_ID	char(5),
 primary key (promotion_ID, books_ID, store_ID),
 foreign key (promotion_ID)  references promotion(ID)
	on delete cascade,
	 foreign key (books_ID)  references books(ID)
		on delete cascade,
	 foreign key (store_ID)  references store(ID)
		on delete cascade
)ENGINE=INNODB;

	
create table storage
	(store_ID	char(5),
 books_ID	char(5),
 number	numeric(3, 0),
 primary key ( store_ID,  books_ID),
 foreign key (store_ID) references store(ID)
	on delete cascade,
 foreign key (books_ID) references books(ID)
	on delete cascade
)ENGINE=INNODB;


