<?php

session_start();

unset($_SESSION['active']);


if(!empty($_SESSION['id']))
{


include "con.php";
$id =$_SESSION['id'];

$sql="update userdb set active=0 where id='$id'";
$con->query($sql);

unset($_SESSION['id']);
echo "<script>alert('로그아웃 완료');</script>";
}
else{
echo "<script>history.back();</script>";
}

?>

