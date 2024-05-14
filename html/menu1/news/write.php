<?php
session_start();

if(!isset($_SESSION['id'])||$_SESSION['id']!=='agent')
{
	echo"<script>history.back()</script>";
	exit;
}



include "../../nav.html";
?>
<section>
<div class="s1">
<p class="top">소식ㆍ정보 > 카드뉴스</p>
<p class="name">카드뉴스</p>






<form action="write_chk.php" method="post" enctype="multipart/form-data">
<table style="margin-top:50px; width:1000px;">
<tr>
<th style="text-align:justify;font-size:20px;padding-top:30px;">제목 : 
<input type="text" name="subject" required style="vertical-align:middle;height:30px;width:300px;padding-left:10px; font-size:15px;"></th>
</tr>










<tr><th style="text-align:justify;font-size:20px;padding-top:30px;">첨부파일<br>
<input type="file" name="img1" style="border:1px dashed black;"><br>
<input type="file" name="img2" style="border:1px dashed black;"><br>
<input type="file" name="img3" style="border:1px dashed black;"><br>
<input type="file" name="img4" style="border:1px dashed black;"><br>
</th>

</tr>





</table>
<br><br><br><br>
<button type="button" value="뒤로" style="width:80;background-color:rgb(167,176,205);color:white;padding:3px;margin-top:10px;margin-left:1px;border:1px solid rgb(167,176,205);border-radius:30px "onclick='history.back()'>뒤로
</button>
<input type="submit" value="등록" style="width:80;color:white;background-color:rgb(97,114,166);padding:3px;margin-top:10px;margin-left:1px;border:1px solid rgb(97,114,166);border-radius:30px">

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

