DROP DATABASE IF EXISTS db;

CREATE DATABASE db;

USE db;

create table users(
    user_id  integer not null auto_increment,
    username varchar(30) NOT NULL UNIQUE,
    password varchar(30) NOT NULL,
    email varchar(20) NOT NULL,
    primary key(user_id)
);

create table summary(
    id  integer not null auto_increment,
    total_users integer NOT NULL,
    Yahoo       integer NOT NULL,
    Hotmail     integer NOT NULL,   
    Gmail       integer NOT NULL,
    primary key(id)
);

