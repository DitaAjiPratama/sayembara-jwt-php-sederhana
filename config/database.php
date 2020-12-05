<?php
/*
PLEASE CREATE THIS TABLE BEFORE RUN
create table Users
(
	id int auto_increment primary key,
	fullname varchar(150) not null,
	username varchar(50) not null,
	phone varchar(20) not null,
	email varchar(50) null,
	password varchar(255) null
);
*/

class DatabaseService
{
    private $db_host = "localhost:8889";
    private $db_name = "papa_jwt";
    private $db_user = "admin";
    private $db_password = "Password123";

    public function getConnection()
    {
        $connection = null;
        try {
            $connection = new PDO("mysql:host=" . $this->db_host . ";dbname=" . $this->db_name, $this->db_user, $this->db_password);
        } catch (PDOException $exception) {
            echo "Failed connect to database: " . $exception->getMessage();
        }
        return $connection;
    }
}
