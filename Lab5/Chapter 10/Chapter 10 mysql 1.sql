CREATE DATABASE online_stores;
USE online_stores;
CREATE TABLE store_info (storeID VARCHAR(10) PRIMARY KEY,
	name VARCHAR(50), description VARCHAR(200), welcome TEXT,
	css_file VARCHAR(250), email_address VARCHAR(100));
LOAD DATA INFILE 'store_info.txt' INTO TABLE store_info;
CREATE TABLE inventory (storeID VARCHAR(10), productID VARCHAR(10) PRIMARY KEY,
	name VARCHAR(100), description VARCHAR(200), price FLOAT);
LOAD DATA INFILE 'inventory.txt' INTO TABLE inventory;