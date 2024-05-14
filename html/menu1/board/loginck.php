<?php
session_start();
include "../../nav.html";

include "con.php";




$id = $_POST["id"];
$pw = $_POST["pw"];

$id = htmlspecialchars($id);
$pw = htmlspecialchars($pw);
$id = mysqli_real_escape_string($con, $id);
$pw = mysqli_real_escape_string($con, $pw);


$sql = "select * from userdb where id='$id' and pw='$pw'";
$r = $con->query($sql);

if($r->num_rows==0)
{
echo "<script>alert('로그인에 실패하였습니다.');history.back();</script>";
exit;
}
else{
$_SESSION['id']=$id;

$row = $r->fetch_assoc();



if($row['code'] != NULL)
{
?>

<section>
<div class="s1">
<p class="top"> 소식ㆍ정보 > 일반게시판 > 로그인</p>
<p class="name">로그인</p>





<div style="text-align:center;margin-top:100">
<form action="email.php" method="post">


<table width="250" style="text-align:center;margin:0 auto">
<tr>
<td><b>인증코드</b></td><td><input type="text" required name="code" style="letter-spacing:5;width:150;height:30;font-size:15;padding-left:5" autofocus></td></tr>
<tr colspan="2" height="5"></tr>

<tr>
<td colspan="2">
<input type="hidden" name="id" value="<?=$row['id']?>">
<input type="hidden" name="pw" value="<?=$row['pw']?>">
<center>
<input type="submit" value="제출" style="background-color:rgb(97,114,166);color:white;padding:3px;margin-top:10;border:1px solid rgb(97,114,166);border-radius:10px;width:80;cursor: pointer;"></center></td></tr>




</center>
</form>


</table>

<div style="margin-top:5"></div>



</div>





</div>
</section>
<br><br><br>
<?php

include "../../footer.html";
?>



<style>
/* section 1 */
.s1{width:1050px; height:500px;margin:0 auto; user-select: none;}
.top{text-align:center; padding:50px; z-index:0; position:relative; color:gray; font-size:13px;}
.name{text-align:center; font-size:40px; font-weight:bold; color:#0351c5;}

</style>
















<?php
}
else{
$_SESSION['active']=1;
echo "<script>alert('환영합니다!');location.href='index.php';</script>";

$sql="update userdb set active=1 where id='$id'";
$con->query($sql);
}



}
?>
