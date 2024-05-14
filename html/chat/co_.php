<?php

$con = new mysqli("mysql-db", "root", "apmsetup");


$sql = "create database if not exists chat";
$con->query($sql);
$con->close();


$con = new mysqli("mysql-db", "root", "apmsetup", "chat");
$sql = "create table if not exists chat(
	id int auto_increment primary key,
	name varchar(50),
	memo text,
	date datetime)";
	
$con->query($sql);

?>
