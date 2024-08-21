create table products (
	product_id varchar(50) PRIMARY KEY NOT NULL,
	pro_name varchar(255) NOT NULL,
	pro_price varchar(100) NOT NULL
);

INSERT INTO ecommer_week_one.products (product_id,pro_name,pro_price) VALUES
	 ('SP1','Điện Thoại Iphone 16','20000000'),
	 ('SP2','Điện Thoại Iphone 17','30000000'),
	 ('SP3','Điện Thoại Iphone 18','40000000'),
	 ('SP4','Điện Thoại Iphone 19','50000000'),
	 ('SP5','Điện Thoại Iphone 20','60000000'),
	 ('SP6','Điện Thoại Iphone 21','70000000'),
	 ('SP7','Điện Thoại Iphone 22','80000000'),
	 ('SP8','Điện Thoại Iphone 23','90000000'),
	 ('SP9','Điện Thoại Iphone 24','100000000');