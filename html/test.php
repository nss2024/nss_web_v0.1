<?php

$con = new mysqli("mysql-db", "agent", "password");
$sql = "create database if not exists test";

$con->query($sql);
mysqli_close($con);

$con2 = new mysqli("mysql-db", "root", "apmsetup");
$sql2 = "create database if not exists test2";
$con2->query($sql2);
mysqli_close($con2);

?>
