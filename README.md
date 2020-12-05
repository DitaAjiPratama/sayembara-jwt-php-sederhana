# PAPA JWT (Basic JWT Implementation PHP)

this project using https:://https://web-token.spomky-labs.com/ library

## Pre-requisite

- Php 7.2+
- Mysql 5.6+
- JWT Framework

This project tested on Php 7.3.9
and mysql version 5.7.26

## Installation
- Clone this project
- Copy to your htdocs folder
- Setup your config database on class database.php
- Create table on your databse with this query
```sql
create table Users
(
	id int auto_increment
		primary key,
	fullname varchar(150) not null,
	username varchar(50) not null,
	phone varchar(20) not null,
	email varchar(50) null,
	password varchar(255) null
);
```
- change your issuer value on config file with your own