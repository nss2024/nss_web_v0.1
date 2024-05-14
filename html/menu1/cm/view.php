<?php
session_start();


include "con.php";


include "../../nav.html";



?>

<section>
<div class="s1">
<p class="top">소식ㆍ정보 > 보도자료</p>
<p class="name">보도자료</p>


<!--버튼모음 -->

<?php

/*
<div style="text-align:right">
<button type="button;" onclick=location.href="modify.php?id=<?php echo $id;?>" style="width:80;border-radius:10px;background-color:rgb(97,114,166);padding:3px;margin-left:20px;border:1px solid rgb(97,114,166);color:white;cursor: pointer;">글 수정</button>
<button type="button;" onclick=location.href="delete.php?id=<?php echo $id;?>" style="width:80;border-radius:10px;background-color:rgb(97,114,166);padding:3px;margin-left:20px;border:1px solid rgb(97,114,166);color:white;cursor: pointer;">글 삭제</button>

<button type="button;" onclick="javascript:history.go(-1)" style="border:1px solid rgb(167,176,205);color:white;width:80;border-radius:10px;background-color:rgb(167,176,205);padding:3px;margin-left:20px;margin-right:25;cursor: pointer;">뒤로가기</button>
</div>

*/?>

<br><br>




<?php
$id = $_GET["id"];
$r = mysqli_query($con, "select * from bodo where no = $id");

$row = mysqli_fetch_array($r)

?>



<table style="margin:50px auto; width:1050px;font-size:20px;margin-top:-20;">
<tr>
<th width="20%"  >제목</th><th width="80%" style="text-align:justify;padding-left:10;"><?=$row['title']?></th></tr>

<!--날짜 수정 -->
<tr><th >날짜</th>
<th width="80%" style="text-align:justify;padding-left:10;">
<?php 
$current = time();
$post_time = strtotime($row['date']);

if(date('Ymd',$current)==date('Ymd',$post_time))
{
echo date("H:i",$post_time);
}else{
echo date("Y-m-d",$post_time);
}
?>

</th></tr>

<tr>
<th width="20%">첨부파일</th><th width="80%" style="text-align:justify;padding-left:10;"><a href="file/<?=$row['file']?>">다운로드</a></th></tr>




<br><br><br>


<?php

if ($row['img']!="none")
{
$img = $row['img'];

echo '<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr><td colspan="2" style="text-align:center"><img style="margin-top:20" width=800 height=1200 src="img/'.$img.'"></td></tr>';
}
?>









</table>





</div>





</section>

<div style="width:1050px;margin:50 auto;">

<!--
<button type="button;" onclick=location.href="delete.php?id=<?php echo $id;?>" style="background-color:white;padding:3px;margin-left:30px;border:2px solid red;color:red">글 삭제</button>
-->

<?php
if ($row['img']!="none")
{
echo"<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
}

?>


<br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<br><br><br><br><br><br>
<div style="text-align:left">
<button type="button;" onclick="javascript:history.go(-1)" style="border:1px solid rgb(167,176,205);color:white;width:80;border-radius:10px;background-color:rgb(167,176,205);padding:3px;cursor: pointer;">뒤로가기</button>
</div>





</div>



<?php include "../../footer.html";?>
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
.s1{width:1050px; height:600px;background-color:white; margin:0 auto;font-family:'s4'}
.top{text-align:center; padding:50px; z-index:0; position:relative; color:gray; font-size:13px;font-family:'s5'}
.name{text-align:center; font-size:40px; font-weight:bold; color:#0351c5;font-family:'s5'}

.th0{width:50px; text-align:center;}
.th1{width:500px; text-align:center;}
.th2{width:175px; text-align:center;}


th{border:1px solid black;line-height:1.9}

</style>
