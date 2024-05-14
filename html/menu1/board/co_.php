<?php

$con = new mysqli("mysql-db","root","apmsetup");

$sql = "create database if not exists newboard";


$con->query($sql);
$con->select_db("newboard");

$sql = "create table if not exists userdb(
no int auto_increment primary key,
id varchar(40) not null,
pw varchar(40) not null,
email varchar(40) not null,
nick varchar(80) not null,
ip varchar(40) not null,
active boolean default false,
code varchar(10) default 'x',
mode int default 1)";

$con->query($sql);


?>
