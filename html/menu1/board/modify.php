<?php
session_start();

if(!isset($_SESSION['id']))
{
	echo"<script>window.location.href='login.php';</script>";
	exit;
}



include "con.php";


$userid= $_SESSION['id'];
$commid = $_GET['id'];


$sql = "select * from infoboard where no='$commid' and nick='$userid'";
$r = $con->query($sql);

if($r->num_rows==0)
{
echo "<script>alert('게시글을 수정할 권한이 없습니다.');history.back();</script>";exit;
}

$row=$r->fetch_assoc();


include "../../nav.html";
?>
<section>
<div class="s1">
<p class="top">소식ㆍ정보 > 일반게시판</p>
<p class="name">일반게시판</p>






<form action="modify_chk.php?id=<?=$commid;?>" method="post" enctype="multipart/form-data">
<table style="margin-top:50px; width:1000px;">
<tr>
<th style="text-align:justify;font-size:20px;padding-top:30px;">제목 : 
<input type="text" value="<?=$row['title'];?>" name="subject" required style="vertical-align:middle;height:30px;width:300px;padding-left:10px; font-size:15px;"></th>
</tr>


<?php
/*
<tr>
<th style="text-align:justify;font-size:20px;padding-top:30px;">게시글 비밀번호 : 
<input type="text" name="pass" required style="vertical-align:middle;height:30px;width:300px;padding-left:10px; font-size:15px;"></th>
</tr>*/
?>


<?php
/*
<tr>
<th style="text-align:justify;font-size:20px;padding-top:30px;">작성자 : 
<input type="text" name="user" style="vertical-align:middle;height:30px;width:280px;padding-left:10px; font-size:15px;"></th>

</tr>
*/
?>





<tr>
<th style="text-align:justify;font-size:20px;padding-top:30px;">내용
<textarea name="comm" required style="vertical-align:middle;height:300px;width:1045px;padding-left:10px;margin-top:10px;padding-top:10px; font-size:20px;"><?=$row['comment'];?></textarea></th>

</tr>


<?php
/*<tr><th style="text-align:justify;font-size:20px;padding-top:30px;">첨부파일
<input type="file" name="imgfile" style="border:1px dashed black;">
</th>*/
?>



</tr>





</table>
<br><br><br><br>
<button type="button" value="뒤로" style="width:80;background-color:rgb(167,176,205);color:white;padding:3px;margin-top:10px;margin-left:1px;border:1px solid rgb(167,176,205);border-radius:30px;cursor: pointer; "onclick='history.back()'>뒤로
</button>
<input type="submit" value="등록" style="width:80;color:white;background-color:rgb(97,114,166);padding:3px;margin-top:10px;margin-left:1px;border:1px solid rgb(97,114,166);border-radius:30px;cursor: pointer;">

</form>
<div style="margin-top:30px;"></div>
<?php include "../../footer.html"?>



</section>










<style>
/* section 1 */
.s1{width:1050px; height:600px;background-color:white; margin:0 auto;}
.top{text-align:center; padding:50px; z-index:0; position:relative; color:gray; font-size:13px;}
.name{text-align:center; font-size:40px; font-weight:bold; color:#0351c5;}



</style>

