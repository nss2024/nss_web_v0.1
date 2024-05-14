<?php

//$user = htmlspecialchars($_POST["user"]);
//$sub = isset($_POST["subject"]) ? htmlspecialchars($_POST["subject"]) : "";
//$comm = isset($_POST["comm"]) ? htmlspecialchars($_POST["comm"]) : "";


$sub = $_POST["subject"];
$comm = $_POST["comm"];

$sub = str_replace(["\"","'",">","<"],"",$sub);
$comm= str_replace(["\"","'",">","<"],"",$comm);


$date = date("Y-m-d");

$pass = isset($_POST["pass"]) ? htmlspecialchars($_POST["pass"]) : "";

$a = strlen($sub);
$b = strlen($pass);

if ($a>50 || $b > 50)
{
	echo "<script>alert('최대 입력 가능한 길이는 50자입니다.');history.go(-1);</script>";
	exit();
}





$connect = mysqli_connect("mysql-db", "root", "apmsetup", "board");

if($sub!=""&&$comm!=""){
$r = mysqli_query($connect, "insert into board(user,title,comment,date,pass) values('Anonymous','$sub','$comm','$date','$pass')");
}else{
echo "<script>alert('내용을 필수로 입력해야 합니다.');history.back()</script>";
}

?>

<script>location.href='index.php'</script>


