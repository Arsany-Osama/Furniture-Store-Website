DROP DATABASE IF EXISTS furniture;

CREATE DATABASE furniture;

USE furniture;

CREATE TABLE `user`(
	id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100) UNIQUE NOT NULL, 
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(50) NOT NULL,
    fname VARCHAR(25) NOT NULL,
    lname VARCHAR(25) NOT NULL,
    telephone VARCHAR(12) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE user_address(
	id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    address VARCHAR(80) NOT NULL,
    city VARCHAR(30)  NOT NULL,
    country VARCHAR(30) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP  DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE product(
	id INT PRIMARY KEY AUTO_INCREMENT,
    category_id INT NOT NULL,
    inventory_id INT NOT NULL,
    name VARCHAR(30) UNIQUE NOT NULL,
    price INT NOT NULL,
    discount INT NOT NULL,
    discount_percent INT NOT NULL,
    description VARCHAR(255) NULL,
    image VARCHAR(255) NOT NULL,
    added_by INT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP  DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE product_category(
	id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(20) UNIQUE NOT NULL,
    added_by INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE product_inventory (
    id INT PRIMARY KEY AUTO_INCREMENT,
    quantity INT NOT NULL CHECK (quantity >= 0),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE order_item(
	id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP  DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE admin(
	id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100) UNIQUE NOT NULL, 
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(50) NOT NULL,
    fname VARCHAR(25) NOT NULL,
    lname VARCHAR(25) NOT NULL,
    telephone VARCHAR(12) NOT NULL,
    type_id INT NOT NULL,
    last_login TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE admin_address(
	id INT PRIMARY KEY AUTO_INCREMENT,
    admin_id INT NOT NULL,
    address VARCHAR(80) NOT NULL,
    city VARCHAR(30) NOT NULL,
    country VARCHAR(30) NOT NULL
);

CREATE TABLE admin_type (
    id INT PRIMARY KEY AUTO_INCREMENT,
    admin_type VARCHAR(20) NOT NULL,
    permissions VARCHAR(5) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create Index To Speed Up Search 
-- CREATE UNIQUE INDEX index_name ON table(column(1) , column(2) , ... , column(n))
-- Creates a unique index on a table. Duplicate values are not allowed:
CREATE UNIQUE INDEX user_index ON user(id);

CREATE UNIQUE INDEX user_address_index ON user_address(id);

CREATE UNIQUE INDEX admin_address_index ON admin_address(id);

CREATE UNIQUE INDEX product_index ON product(id);

CREATE UNIQUE INDEX product_category_index ON product_category(id);

CREATE UNIQUE INDEX product_inventory_index ON product_inventory(id);

CREATE UNIQUE INDEX order_item_index ON order_item(id);

CREATE UNIQUE INDEX admin_index ON admin(id);


-- FOREIGN KEYS
ALTER TABLE user_address ADD CONSTRAINT user_address_user_id_user FOREIGN KEY (user_id) REFERENCES user(id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE admin_address ADD CONSTRAINT admin_address_admin_id_admin FOREIGN KEY (admin_id) REFERENCES admin(id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE order_item ADD CONSTRAINT order_item_order_id_user FOREIGN KEY (user_id) REFERENCES user(id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE order_item ADD CONSTRAINT order_item_product_id_product FOREIGN KEY (product_id) REFERENCES product(id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE product ADD CONSTRAINT product_category_id_category FOREIGN KEY (category_id) REFERENCES product_category(id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE product ADD CONSTRAINT product_inventory_id_product_inventory FOREIGN KEY (inventory_id) REFERENCES product_inventory(id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE admin ADD CONSTRAINT admin_type_id_admin_type FOREIGN KEY (type_id) REFERENCES admin_type(id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE product_category ADD CONSTRAINT product_category_id_admin FOREIGN KEY (added_by) REFERENCES admin(id) ON UPDATE CASCADE ON DELETE CASCADE;

INSERT INTO admin_type (admin_type, permissions) VALUES
('admin1', 'ARAR'),
('admin2', 'ARAx'),
('admin3', 'ARxR'),
('admin4', 'AxAR'),
('admin5', 'xRAR'),
('admin6', 'ARxx'),
('admin7', 'AxxR'),
('admin8', 'xxAR'),
('admin9', 'xRAx'),
('admin10', 'AxAx'),
('admin11', 'xRxR'),
('admin12', 'Axxx'),
('admin13', 'xRxx'),
('admin14', 'xxAx'),
('admin15', 'xxxR');