CREATE DATABASE `ITECH3108_your student number_A1`;

CREATE TABLE IF NOT EXISTS User (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30),
    email VARCHAR(30),
    password VARCHAR(255),
    profile VARCHAR(100),
    photo_url VARCHAR(100);


CREATE TABLE Likes (
    user_id INT,
    FOREIGN KEY (id)
        REFERENCES User (id),
    sharedinterest_id INT,
    FOREIGN KEY (id)
        REFERENCES SharedInterest (id),
);

CREATE TABLE SharedInterest (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(30),
);

CREATE TABLE Message (
     from_user_id INT,
    FOREIGN KEY (id)
        REFERENCES User (id),
	to_user_id INT,
    FOREIGN KEY (id)
        REFERENCES User (id),
    datetime DATE,
    text VARCHAR(500)
);
