<?php
$connect = mysqli_connect("mysql-db", "root", "apmsetup", "board");


include "../nav.html";
?>

<section>
<div class="s1">
<p class="top">소식ㆍ정보 > 익명게시판</p>
<p class="name">익명게시판</p>



<table style="margin:50px auto; width:1000px;font-size:20px;">
<tr>
<th class="th1">제목</th><th class="th2">작성자</th><th class="th2">날짜</th>
</tr>


<?php
$id = $_GET["id"];
$r = mysqli_query($connect, "select * from board where id = $id");

$row = mysqli_fetch_array($r)

?>


<tr>


<!-- 정보 -->
<td class="th1">
<?=$row['title']?>
</td>
<td class="th2"><?=$row['user']?></td>
<td class="th2"><?=$row['date']?></td>
</tr>

<tr>
<td style="padding-top:50px" colspan="3"></td>
</tr>
<tr>
<th colspan="3" style="text-align:center;border:1px solid black;padding:3px;">내용</th>
</tr>



<tr>
<td colspan="3" style="padding-top:15px; ">
<!-- 스크롤 생성-->
<div style="max-height:240px;overflow-y:auto; border: 0px solid navy; padding:5px">
<?=nl2br($row['comment'])?>
</div>
</td>
</tr>
</table>





</div>





</section>

<div style="width:1050px;margin:50 auto;">








<button type="button" value="뒤로" style="width:80;background-color:rgb(167,176,205);color:white;padding:3px;margin-top:10px;margin-left:30px;border:1px solid rgb(167,176,205);border-radius:30px;cursor:pointer " onclick="history.back()">뒤로
</button>

<button type="button;" onclick=location.href="delete.php?id=<?php echo $id;?>" style="width:80;background-color:rgb(97,114,166);color:white;padding:3px;margin-left:30px;border:1px solid rgb(167,176,205);border-radius:30px;cursor:pointer">글 삭제</button>















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
