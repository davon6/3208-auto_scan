CREATE DATABASE `Auto_scan_db`;

CREATE TABLE IF NOT EXISTS ticket (
    ticket_id INT PRIMARY KEY AUTO_INCREMENT, status VARCHAR(30), title VARCHAR(30), message VARCHAR(255),
     assign_to VARCHAR(30), username VARCHAR(50), priority VARCHAR(10), category VARCHAR(15), due_date DATE, 
     last_updated DATE, created_date DATE, attached_doc BIT,
    CONSTRAINT FK_username FOREIGN KEY (username) REFERENCES users (username)
   
);


CREATE TABLE users (
    us_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    userType VARCHAR(10)NOT NULL
);



CREATE TABLE IF NOT EXISTS user (
    user_id INT PRIMARY KEY AUTO_INCREMENT, fname VARCHAR(30), name VARCHAR(30), position VARCHAR(30), password VARCHAR(60), username VARCHAR(40)  , email VARCHAR(60)  , phone VARCHAR(60) 
);
