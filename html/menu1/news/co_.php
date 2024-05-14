<?php

$con = new mysqli("mysql-db","root","apmsetup");

$sql = "create database if not exists news";


$con->query($sql);
$con->select_db("news");

$sql = "create table if not exists news(
no int auto_increment primary key,
title varchar(40) not null,
date datetime,
img1 varchar(40),
img2 varchar(40),
img3 varchar(40),
img4 varchar(40))";
$con->query($sql);


?>
