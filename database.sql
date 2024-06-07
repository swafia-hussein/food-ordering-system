CREATE TABLE `areas` (
  `id` INT PRIMARY KEY NOT NULL ,
 `name` VARCHAR(50) NOT NULL
);
INSERT INTO `areas` (`id`, `name`) VALUES
('0', 'Uswazi juu'),
('1', 'Uswazi chini'),
('2', 'Cafeteria'),
('3', 'IDM');

-- Restaurants Table
CREATE TABLE `restaurants` (
  `id` INT PRIMARY KEY,
  `name` VARCHAR(50) NOT NULL,
  `area_id` INT NOT NULL,
  FOREIGN KEY (area_id) REFERENCES areas(id)
);
INSERT INTO `restaurants` ( `id`,`name`,`area_id`) VALUES
('0','Njogoro rest', '0'),
('1', 'Msukuma rest', '0'),
('2', 'Babu rest', '0'),
('3','Firstchoice rest', '1'),
('4', 'Chaga rest', '1'),
('5', 'Bonimachapati rest', '1'),
('6', 'Cafeteria rest', '2'),
('7', 'IDM rest', '3');

-- Menu Items Table
CREATE TABLE menu_items (
  id INT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  description TEXT,
  price DECIMAL(10,2) NOT NULL,
  restaurant_id INT NOT NULL,
  FOREIGN KEY (restaurant_id) REFERENCES restaurants(id)
);

-- Users Table
CREATE TABLE users (
uid INT NOT NULL AUTO_INCREMENT,
	fname VARCHAR(100) NOT NULL,
	mname VARCHAR(100) NOT NULL,
	lname VARCHAR(100) NOT NULL,
	email VARCHAR(50) NOT NULL UNIQUE,
    place INT(50) NOT NULL,
  phonenumber INT(50) NOT NULL,
	password VARCHAR(100) NOT NULL,
	role VARCHAR(20) NOT NULL,
	PRIMARY KEY (uid)
		);



-- Orders  Table
CREATE TABLE orders (
  id INT PRIMARY KEY,
  user_uid INT NOT NULL,
  restaurant_id INT NOT NULL,
  order_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_uid) REFERENCES users(uid),
  FOREIGN KEY (restaurant_id) REFERENCES restaurants(id)
);

-- Payments Table
CREATE TABLE payments (
  id INT PRIMARY KEY,
  order_id INT NOT NULL,
  amount DECIMAL(10,2) NOT NULL,
  payment_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (order_id) REFERENCES orders(id)
);
