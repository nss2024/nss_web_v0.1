<?php

$con = new mysqli("mysql-db","root","apmsetup");

$sql = "create database if not exists cm";


$con->query($sql);
$con->select_db("cm");

$sql = "create table if not exists bodo(
no int auto_increment primary key,
title varchar(80) not null,
date datetime,
img varchar(80),
file varchar(80))";
$con->query($sql);


?>
