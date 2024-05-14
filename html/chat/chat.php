<?php
session_start();





include "con.php";


//$memo = htmlspecialchars(nl2br($_POST['memo']));
$memo = nl2br($_POST['memo']);
if(strlen($memo)>300)
{
echo "<script>alert('글자의 길이가 300자 이상 초과되었습니다.');history.back()</script>";
exit;
}
else if(strlen($memo)<1)
{
echo "<script>alert('내용을 입력해주세요.');history.back()</script>";
exit;
}

else{
$memo = preg_replace("/<br \/>/","brbrb",$memo);
$memo = preg_replace("/<|>|\'|\"/", "", $memo);
$memo = preg_replace("/brbrb/","<br />",$memo);

if($_SESSION['id'])
{
$user = $_SESSION['id'];
}
else{
$user = 'Anon';
}






$date = date('Y-m-d H:i:s');

$sql = "insert into chat(name,memo,date) values('$user','$memo','$date')";
$con->query($sql);
echo "<script>window.location.href='submit.php'</script>";
exit;
}
?>


