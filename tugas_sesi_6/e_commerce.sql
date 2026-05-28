create table products (
    -> id int auto_increment primary key,
    -> nama_produk varchar (200) not null,
    -> harga int not null,
    -> deskripsi varchar (1000),
    -> stok int );

 create table users (
    -> id int auto_increment primary key,
    -> nama varchar (200) not null,
    -> email varchar (200) unique not null,
    -> password varchar (50) not null );

 CREATE TABLE orders (
    ->     id INT AUTO_INCREMENT PRIMARY KEY,
    ->     user_id INT,
    ->     product_id INT,
    ->     quantity INT,
    ->     total INT,
    -> 
    ->     FOREIGN KEY (user_id) REFERENCES users(id),
    ->     FOREIGN KEY (product_id) REFERENCES products(id)
    -> );

INSERT INTO products (nama_produk, harga, deskripsi, stok)
VALUES
('Laptop Asus', 12000000, 'Laptop gaming RTX', 10),
('iPhone 15', 18000000, 'Apple smartphone', 5),
('Mechanical Keyboard', 850000, 'Keyboard RGB', 20),
('Mouse Logitech', 350000, 'Wireless mouse', 15),
('Monitor LG 24', 2200000, 'Monitor IPS Full HD', 8);

INSERT INTO users (nama, email, password)
VALUES
('Bor', 'bor@gmail.com', '123456'),
('Andi', 'andi@gmail.com', 'password'),
('Sinta', 'sinta@gmail.com', 'abcdef'),
('Budi', 'budi@gmail.com', 'qwerty'),
('Clara', 'clara@gmail.com', 'zxcvb');

INSERT INTO orders (user_id, product_id, quantity, total)
VALUES
(1, 1, 1, 12000000),
(2, 3, 2, 1700000),
(3, 2, 1, 18000000),
(4, 4, 3, 1050000),
(5, 5, 1, 2200000);

SELECT * FROM products;
SELECT * FROM users;
SELECT * FROM orders;

UPDATE products
SET harga = 15000000,
    stok = 7
WHERE id = 1;

UPDATE users
SET nama = 'john doe',
    email = 'jhondoe@gmail.com'
WHERE id = 1;

UPDATE orders
SET quantity = 2,
    total = 24000000
WHERE id = 1;

DELETE FROM products
WHERE id = 5;

DELETE FROM users
WHERE id = 5;

DELETE FROM orders
WHERE id = 5;

