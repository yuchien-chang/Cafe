CREATE DATABASE IF NOT EXISTS brew_bliss;
USE brew_bliss;

CREATE TABLE login_logs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100),
  login_time DATETIME
);

CREATE TABLE purchases (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100),
  product_name VARCHAR(100),
  purchase_time DATETIME
);

CREATE TABLE comments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100),
  comment TEXT,
  comment_time DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  description TEXT,
  price DECIMAL(5,2),
  image VARCHAR(255)
);

/* Insert sample products */
INSERT INTO products (name, description, price, image) VALUES
('Espresso', 'Strong and bold espresso.', 3.00, 'espresso.jpg'),
('Latte', 'Smooth milk latte.', 3.50, 'latte.jpg'),
('Cappuccino', 'Classic cappuccino with foam.', 4.00, 'cappuccino.jpg'),
('Mocha', 'Chocolate flavored coffee.', 4.50, 'mocha.jpg'),
('Americano', 'Espresso with hot water.', 3.00, 'americano.jpg');
