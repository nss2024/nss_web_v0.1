<?php
include "../../nav.html";
?>

<section>
<div class="s1">
<p class="top"> 소식ㆍ정보 > 일반게시판 > 회원가입</p>
<p class="name">회원가입</p>





<div style="text-align:center;margin-top:100">
<form action="joinck.php" method="post">
<table width="250" style="text-align:center;margin:0 auto">
<tr>
<td><b>아 이 디</b></td><td><input type="text" name="id" required style="letter-spacing:5;width:150;height:30;font-size:15;padding-left:5" autofocus></td></tr>

<tr colspan="2" height="5"></tr>

<tr>
<td><b>비밀번호</b></td><td><input type="password" name="pw" required style="letter-spacing:5;width:150;height:30;font-size:15;padding-left:5;"></td>
</tr>

<tr colspan="2" height="5"></tr>
<tr>
<td><b>닉 네 임</b></td><td><input type="text" name="nick" required style="letter-spacing:5;width:150;height:30;font-size:15;padding-left:5;"></td>
</tr>


<tr colspan="2" height="5"></tr>
<tr>
<td><b>이 메 일</b></td><td><input type="email" name="mail" required style="letter-spacing:5;width:150;height:30;font-size:15;padding-left:5;"></td>
</tr>





<tr colspan="2" height="5"></tr>
<tr>
<td><span style="font-size:14;"><a href='login.php' style="color:black;text-decoration:none">로그인</a></span></td>

<td><input type="submit" value="회원가입" style="font-weight:bold;color:#0351c5;font-size:15;cursor:pointer;background-color:White;width:100;height:50;border:none"></td></tr>
</table>

<div style="margin-top:5"></div>


</form>
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
