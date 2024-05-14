<?php



include "../nav.html";
?>
<section>
<div class="s1">
<p class="top">소식ㆍ정보 > 익명게시판</p>
<p class="name">익명게시판</p>






<form action="write_chk.php" method="post">
<table style="margin-top:50px; width:1000px;">
<tr>
<th style="text-align:justify;font-size:20px;padding-top:30px;">제목 : 
<input type="text" name="subject" style="vertical-align:middle;height:30px;width:300px;padding-left:10px; font-size:15px;"></th>
</tr>



<tr>
<th style="text-align:justify;font-size:20px;padding-top:30px;">비밀번호 : 
<input type="text" name="pass" style="vertical-align:middle;height:30px;width:300px;padding-left:10px; font-size:15px;"></th>
</tr>



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
<textarea name="comm" style="vertical-align:middle;height:300px;width:1045px;padding-left:10px;margin-top:10px;padding-top:10px; font-size:20px;"></textarea></th>

</tr>
</table>
<!--<button type="button" value="뒤로" style="background-color:white;padding:3px;margin-top:10px;margin-left:1px; "onclick='history.back()'>뒤로
</button>-->

<button type="button" value="뒤로" style="width:80;background-color:rgb(167,176,205);color:white;padding:3px;margin-top:10px;margin-left:1px;border:1px solid rgb(167,176,205);border-radius:30px;cursor:pointer " onclick="history.back()">뒤로
</button>




<input type="submit" value="등록" style="background-color:rgb(97,114,166);color:white;padding:3px;margin-left:30px;border:1px solid rgb(97,114,166);border-radius:10px;width:80;cursor: pointer;padding:3px;margin-top:10px;margin-left:1px;">


</form>
<div style="margin-top:30px;"></div>
<?php include "../footer.html"?>



</section>










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



</style>

