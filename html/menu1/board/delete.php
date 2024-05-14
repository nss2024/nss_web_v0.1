<?php
session_start();



if(!isset($_SESSION['id'])) {
echo "<script>alert('로그인이 필요합니다.');location.href='login.php'</script>";exit;
}


include "con.php";


$userid= $_SESSION['id'];
$commid = $_GET['id'];


$sql = "select * from infoboard where no='$commid' and nick='$userid'";
$r = $con->query($sql);

if($r->num_rows==0)
{
echo "<script>alert('게시글을 삭제할 권한이 없습니다.');history.back();</script>";exit;
}







$deltable = "create table if not exists deltable(
id int primary key,
title varchar(80),
comment text,
pass varchar(80),
date date,
user varchar(80),
img varchar(80))";


$con->query($deltable);








include "../../nav.html";
?>

<section>
<div class="s1">
<p class="top">소식ㆍ정보 > 일반게시판</p>
<p class="name">일반게시판</p>



<br><br><br><br><br><br><br>

<center>
<h3>게시글을 삭제하시겠습니까?</h3><br>
* 비밀번호를 입력하세요 *




<form action="./delete_chk.php?id=<?php echo $_GET['id'];?>" method="post">
<input type="text" style="height:30;width:300" name="pass"><br><br>
<input type="submit" value="확인" style="width:80;color:white;background-color:rgb(97,114,166);padding:3px;border:1px solid rgb(97,114,166);border-radius:30px;cursor: pointer;">
</form>



</center>



</section>

<div style="width:1050px;margin:50 auto;">



<button type="button;" onclick="javascript:history.go(-1)" style="background-color:rgb(167,176,205);padding:3px;margin-left:30px;border:1px solid rgb(167,176,205);border-radius:30px;color:white;width:80;cursor: pointer;">뒤로가기</button>
</div>




<?php include "../../footer.html";?>
<style>
/* section 1 */
.s1{width:1050px; height:600px;background-color:white; margin:0 auto;}
.top{text-align:center; padding:50px; z-index:0; position:relative; color:gray; font-size:13px;}
.name{text-align:center; font-size:40px; font-weight:bold; color:#0351c5;}

.th0{width:50px; text-align:center;}
.th1{width:700px; text-align:center;}
.th2{width:175px; text-align:center;}


</style>
