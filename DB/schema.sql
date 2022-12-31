DROP DATABASE IF EXISTS food_order;

CREATE DATABASE food_order;

USE food_order;

CREATE TABLE admin
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(50) NOT NULL,
    gender ENUM("Male", "Female", "Custom"),
    email VARCHAR(120),
    password VARCHAR(120),
    date DATETIME NOT NULL DEFAULT current_timestamp(),
    picture VARCHAR(120),
    status INT DEFAULT 1
);


CREATE TABLE menu 
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    decription VARCHAR(600),
    price FLOAT NOT NULL,
    picture VARCHAR(50),
    status INT DEFAULT 1
);

CREATE TABLE order_now
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    number VARCHAR(14) NOT NULL,
    your_order VARCHAR(50) NOT NULL,
    aditional VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    date VARCHAR(50),
    address VARCHAR(300),
    message VARCHAR(300),
    status ENUM("Pending", "Delivered", "Canceled") DEFAULT "Pending"
);


INSERT INTO admin
(
    user_name,
    gender, 
    email,
    password,
    picture
)VALUES(
    'Aimalyar',
    'Male',
    'aimal@gmail.com',
    'admin',
    '1.jpg'
);


INSERT INTO menu
(
    title,
    decription,
    price,
    picture
)VALUES(
    'Burger',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem fugiat um magni excepturi, illum quod perspiciatis nihil in minima at harum deleniti libero.',
    23.4,
    'dish-1.png'
),(
    'Sandwitch',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem fugiat um magni excepturi, illum quod perspiciatis nihil in minima at harum deleniti libero.',
    30.4,
    'dish-3.png'
),(
    'Pizza',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem fugiat um magni excepturi, illum quod perspiciatis nihil in minima at harum deleniti libero.',
    19.4,
    'dish-4.png'
),(
    'Sweets',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem fugiat um magni excepturi, illum quod perspiciatis nihil in minima at harum deleniti libero.',
    25.4,
    'dish-5.png'
),(
    'Home mad',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem fugiat um magni excepturi, illum quod perspiciatis nihil in minima at harum deleniti libero.',
    50.4,
    'dish-6.png'
),(
    'Pizza',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem fugiat um magni excepturi, illum quod perspiciatis nihil in minima at harum deleniti libero.',
    10.4,
    'menu-1.jpg'
),(
    'Burger',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem fugiat um magni excepturi, illum quod perspiciatis nihil in minima at harum deleniti libero.',
    15,
    'menu-2.jpg'
),(
    'Hot Checken',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem fugiat um magni excepturi, illum quod perspiciatis nihil in minima at harum deleniti libero.',
    22.5,
    'menu-3.jpg'
);