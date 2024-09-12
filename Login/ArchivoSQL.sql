create database promec;
CREATE TABLE users (
    idUser INT (20) PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    passwordU VARCHAR(100) NOT NULL,
    code VARCHAR(10) NULL
);
INSERT into users values (3025809036,"dannysantiago467@gmail.com", "1234", "1234");