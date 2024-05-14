<?php
session_start();
if(!isset($_SESSION['id'])) {
echo "<script>alert('로그인이 필요합니다.');location.href='login.php'</script>";
}

include "con.php";


include "../../nav.html";

// 조회수 증가
$id = $_GET['id'];

if(!isset($_SESSION['view']))
{
	//세션변수초기화
	$_SESSION['view']=array();
}

if(!in_array($id,$_SESSION['view']))
{
$_SESSION['view'][]=$id;
$con->query("update infoboard set view = view+1 where no=$id");
}



?>

<section>
<div class="s1">
<p class="top">소식ㆍ정보 > 일반게시판</p>
<p class="name">일반게시판</p>


<!--버튼모음 -->


<br><br><br>

<div style="text-align:right">
<button type="button;" onclick=location.href="modify.php?id=<?php echo $id;?>" style="width:80;border-radius:10px;background-color:rgb(97,114,166);padding:3px;margin-left:20px;border:1px solid rgb(97,114,166);color:white;cursor: pointer;">글 수정</button>
<button type="button;" onclick=location.href="delete.php?id=<?php echo $id;?>" style="width:80;border-radius:10px;background-color:rgb(97,114,166);padding:3px;margin-left:20px;border:1px solid rgb(97,114,166);color:white;cursor: pointer;">글 삭제</button>

<button type="button;" onclick="javascript:history.go(-1)" style="border:1px solid rgb(167,176,205);color:white;width:80;border-radius:10px;background-color:rgb(167,176,205);padding:3px;margin-left:20px;margin-right:25;cursor: pointer;">뒤로가기</button>
</div>




<table style="margin:50px auto; width:1000px;font-size:20px;">
<tr>
<th class="th1">제목</th><th class="th2">작성자</th><th class="th2">날짜</th>
<th class="th2">조회수</th>
</tr>


<?php
$id = $_GET["id"];
$r = mysqli_query($con, "select * from infoboard where no = $id");

$row = mysqli_fetch_array($r)

?>


<tr>


<!-- 정보 -->
<td class="th1">
<?=$row['title']?>
</td>
<td class="th2"><?=$row['nick']?></td>


<!--날짜 수정 -->
<td class="th2">

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




</td>

<td class="th2"><?=$row['view']?></td>
</tr>

<tr>
<td style="padding-top:50px" colspan="3"></td>
</tr>


<?php

if ($row['image']!="none")
{
$img = $row['image'];

echo '<tr><td colspan="4" style="text-align:center"><img width=300 height=300 src="img/'.$img.'"></td></tr>';
}


?>




<tr>
<th colspan="4" style="text-align:center;border:1px solid black;padding:3px;">내용</th>
</tr>



<tr>
<td colspan="4" style="padding-top:15px; ">
<!-- 스크롤 생성-->
<div style="max-height:240px;overflow-y:auto; border: 1px solid navy; padding:5px">
<?=nl2br($row['comment'])?>
</div>
</td>
</tr>
</table>





</div>





</section>

<div style="width:1050px;margin:50 auto;">

<!--
<button type="button;" onclick=location.href="delete.php?id=<?php echo $id;?>" style="background-color:white;padding:3px;margin-left:30px;border:2px solid red;color:red">글 삭제</button>
-->

<?php
if ($row['image']!="none")
{
echo"<br><br><br><br><br><br><br><br><br><br><br><br><br>";
}

?>


<br><br><br>
</div>



<?php include "../../footer.html";?>
<style>
/* section 1 */
.s1{width:1050px; height:600px;background-color:white; margin:0 auto;}
.top{text-align:center; padding:50px; z-index:0; position:relative; color:gray; font-size:13px;}
.name{text-align:center; font-size:40px; font-weight:bold; color:#0351c5;}

.th0{width:50px; text-align:center;}
.th1{width:500px; text-align:center;}
.th2{width:175px; text-align:center;}


th{border:1px solid black;line-height:1.9}

</style>
