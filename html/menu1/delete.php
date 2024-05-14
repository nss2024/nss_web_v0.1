<?php


$connect = mysqli_connect("mysql-db", "root", "apmsetup", "board");




$deltable = "create table if not exists deltable(
id int primary key,
title varchar(20),
comment text,
pass varchar(20),
date date)";

if($connect){ mysqli_query($connect, $deltable);}










include "../nav.html";
?>

<section>
<div class="s1">
<p class="top">소식ㆍ정보 > 익명게시판</p>
<p class="name">익명게시판</p>



<br><br><br><br><br><br><br>

<center>
<h3>게시글을 삭제하시겠습니까?</h3><br>
* 비밀번호를 입력하세요 *


<form action="./delete_chk.php?id=<?php echo $_GET['id'];?>" method="post">
<input type="text" style="height:30;width:300" name="pass"><br><br>
<input type="submit" value="확인" style="width:80;background-color:rgb(97,114,166);color:white;padding:3px;margin-left:0px;border:1px solid rgb(167,176,205);border-radius:30px;cursor:pointer">
</form>



</center>



</section>

<div style="width:1050px;margin:50 auto;">







<button type="button" value="뒤로" style="width:80;background-color:rgb(167,176,205);color:white;padding:3px;margin-top:10px;margin-left:30px;border:1px solid rgb(167,176,205);border-radius:30px;cursor:pointer " onclick="history.back()">뒤로
</button>









</div>




<?php include "../footer.html";?>
<style>
@FONT-FACE{
font-family:'s6';
src:url('/fonts/s6.woff');
}
@FONT-FACE{
font-family:'s5';
src:url('/fonts/s5.woff');
}

@FONT-FACE{
font-family:'s4';
src:url('/fonts/s4.woff');
}

/* section 1 */
.s1{width:1050px; height:600px;background-color:white; margin:0 auto;font-family:"s4"}
.top{text-align:center; padding:50px; z-index:0; position:relative; color:gray; font-size:13px;font-family:"s5"}
.name{text-align:center; font-size:40px; font-weight:bold; color:#0351c5;font-family:"s5"}

.th0{width:50px; text-align:center;}
.th1{width:700px; text-align:center;}
.th2{width:175px; text-align:center;}


</style>
