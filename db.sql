CREATE TABLE `credentials` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--Now creation of products table
CREATE TABLE `products` (
  `pid` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `pname` varchar(100) NOT NULL,
  `stock` INT(10) NOT NULL,
  `price` FLOAT(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO products(pname,stock,price) VALUES ('Iphone',200,100000),
     ('Samsung',230,120000),
     ('MicroMax',220,130000),
     ('Huawei',540,34000),
     ('HP OMEN',156,150000),
     ('MacBook Pro',139,160000),
     ('Iphone 6S',100,80000),
     ('HP CPU',120,111100),
     ('Acer Monitor',234,102010),
     ('Asus Tab',668,50000),
     ('USHA Mixer',2090,10000),
     ('Casio Calculator',2030,7650),
     ('Emporio Armani Watch',20,1000000),
     ('Rolex Watch',10,2550000),
     ('Tommy Hilfiger Shirt',300,10000),
     ('Zara Pant',40,1000),
     ('Motorola GenZ',2100,102367),
     ('Archies',3201,1000);
--Creation of order details
CREATE TABLE `order` (
  `orderid` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `customerid` BIGINT NOT NULL,
  `productid` SMALLINT(6) NOT NULL DEFAULT 0,
  `productprice` FLOAT(6) NOT NULL DEFAULT 0,
  `productname` varchar(100) NOT NULL,
  `quantity` INT NOT NULL DEFAULT 0,
  `total` FLOAT NOT NULL DEFAULT 0
);