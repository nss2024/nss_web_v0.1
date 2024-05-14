<meta charset='utf-8'>

<?php
$name = $_POST['name'];
$phone = $_POST['phone'];
$memo = $_POST['memo'];


$name = str_replace("'", "", $name);
$phone = str_replace("'", "", $phone);
$memo = str_replace("'", "", $memo);


$ck = 0;
if($name=='' || $phone=='' || $memo=='') {
    $ck=1;
}

if($ck==1) {
    echo "<script>alert('내용을 입력하세요');history.go(-1);</script>";
    exit();
}


$name = substr($name, 0, 30);
$phone = substr($phone, 0, 30);
$memo = substr($memo, 0, 3000);

$con = mysqli_connect('mysql-db', 'root', 'apmsetup') or die('Connect Error!');
mysqli_select_db($con, 'report') or mysqli_query($con, 'create database if not exists report');

$sql = 'create table if not exists report (
    no int primary key not null auto_increment,
    name varchar(50) not null,
    phone varchar(50) not null,
    text varchar(3000) not null,
    date datetime,
    ip varchar(30)
) default charset=utf8';

mysqli_query($con, $sql);

$ip = $_SERVER["REMOTE_ADDR"];
$sql = "insert into report(name, phone, text, date, ip) values('$name', '$phone', '$memo', now(), '$ip')";

mysqli_query($con, $sql);
mysqli_close($con);

echo "<script>alert('신고완료');window.close()</script>";
?>

