<?php include "nav.html";?>



<section style="postion:relative">
<div style="width:1050px; height:100px;margin:0 auto;z-index:1;">

<form action="index2.php" method="get">
<div style="padding-top:290;padding-left:320">
<input type="text" placeholder="정보보안" name="search" style="border:1px solid #e0e0e3;width:400;margin-top:25;height:50;border-radius:8px;padding:15;font-size:20">
<button type="submit" style="position:absolute;z-index:1;margin-left:-45;margin-top:37;background-color:white;
border:none"><img src="img/img/search.png"></button>
</div>
</form>
</div>
</section>


<section style="postion:relative;margin-top:-80">
<?php
// 최근 이미지 업로드 찾기
$last_upload = get_image();
function get_image() {
	$upload_dir = "./img/";
	$last_image = "";
	$images = glob($upload_dir."*.png");

	foreach($images as $image){
		if(filemtime($image) > filemtime($last_image))
			{$last_image = $image;}
	}
	return $last_image;
}



if(isset($_FILES["file"]))
{ $file = $_FILES["file"]; 



// 메인 배경 이미지 업로드
$file_name = $_FILES["file"]["name"];
$file_tmpname = $_FILES["file"]["tmp_name"];
$file_size = $_FILES["file"]["size"];
$file_ex = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

if($file_ex ==="png")
{
	if($file_size < 5000000)
	{
		$move = "./img/".$file_name;
		move_uploaded_file($file_tmpname, $move);
		echo "<script>alert('성공적으로 파일을 업로드했습니다.');window.location.href='/index.php';</script>";
	}
	else { echo "<script>alert('업로드할 수 있는 파일의 크기가 초과되었습니다.')</script>"; }
}
else { echo "<script>alert('PNG 확장자를 가진 이미지 파일만 가능합니다.')</script>"; }

}



// user인 쿠키의 이름이 agent라면 배경 이미지 변경 가능
if(isset($_COOKIE['user']) && $_COOKIE['user']==='agent')
{
echo '<div class="s1">';
echo '	<form action="./index.php" method="post" enctype="multipart/form-data" class="img_up">';
echo '	<label for="file">이미지 선택</label>';
echo '	<input type="file" name="file" id="file" style="display:none;">';
echo '	<button type="submit">Upload</button>';
echo '	</form>';
}
else { echo '<div class="s1" onclick="alert(\'관리자만 배경화면을 변경할 수 있습니다.\')">'; }

echo'</div>';
?>
&nbsp;&nbsp;&nbsp;&nbsp;

</section>













<div style="height:70"></div>










<section>
<div class="s2">


<table width="1050">
<tr>

<td width="100"><h1 style="font-family:s4;font-size:30;display:inline-block">
<div style="width:10;height:10;background-color:#0351C4;display:inline-block;vertical-align:middle;margin-right:12px;margin-top:-10"></div>

카드뉴스</h1><br><br></td>
<td width="50" style="border:0px solid red"></td>

<td width="700"><h1 style="font-family:s4;font-size:30;display:inline-block">
<div style="width:10;height:10;background-color:#0351C4;display:inline-block;vertical-align:middle;margin-right:12px;margin-top:-10"></div>
보도자료</h1><br><br></td>
</tr>


<tr>
<td width="300" height="300"  style="border:1px solid #e0e0e3;overflow:hidden;border-radius:8px">
<?php
$con = new mysqli("mysql-db","root","apmsetup","news");
$sql = "select * from news order by date desc limit 1";
$r = $con->query($sql);

if($r){
$row = $r->fetch_assoc();
$path= "/menu1/news/img/".$row['img1'];
$name= $row['title'];
}



$con->close();






$con2 = new mysqli("mysql-db","root","apmsetup","cm");
$sql2 = "select * from bodo order by date desc limit 1";
$r2 = $con2->query($sql2);
if($r2){
$row2 = $r2->fetch_assoc();
$title2 = $row2['title'];
$path2 = $row2['no'];
}





?>



<a href='/menu1/news/view.php?id=<?=$row["no"]?>'>
<img class="up"   width=300 height=300 src="<?=$path?>"></a>
</td>



<td  style="border:0px solid red"></td>




<td width="670"  height="300"  style="border:1px solid #e0e0e3;overflow:hidden;border-radius:8px"><a href="/menu1/cm/view.php?id=<?=$path2?>">
<img class="up"  width="670" src="t5.png"></a></td>

</tr>




<tr>
<td width="300" style="border:0px solid black;font-family:s4;font-size:18;padding-top:10">
<?=$name?>
</td>

<td style="border:0px solid red"></td>


<td width="370" style="border:0px solid black;font-family:s4;font-size:18;padding-top:10">
<?=$title2?>
</td>
</tr>

</table>








</div>



</section>










<div style="margin-top:-30">

<section>
<div class="s2">



<div style="width:10;height:10;background-color:#0351C4;display:inline-block;vertical-align:middle;margin-right:12px;margin-top:-15"></div>
<h1 style="font-family:s4;font-size:30;display:inline-block">실시간 채팅</h1><br>
<?php

$url = "/chat/submit.php";?>

<iframe src=<?=$url?> style="overflow:hidden;border:none;margin-top:15" width="1100" height="400"></iframe>




</div>
</section>


</div>

























<?php
include "footer.html";
?>


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

.s1{width:1050px; height:600px;background-color:black;opacity:1; background-image:url('<?php echo $last_upload; ?>'); margin:0 auto; background-repeat:no-repeat; background-size:contain;}
<!-- background-position:center -->
.img_up{margin-top:560px; padding:10px; float:right; color:lightgreen;}
.img_up button{background-color:white; border:dotted; padding:3px;}




/* section 2 */
.s2{width:1050px; height:500px;margin:0 auto; user-select: none;}



@keyframes incre{
0%{transform:scale(1);}
100%{transform:scale(1.1);}
}
@keyframes decre{
0%{transform:scale(1.1);}
100%{transform:scale(1);}
}

.up{
opacity:1;

}

.up:hover{
animation:incre 0.5s forwards;

opacity:0.8;
}
.up:not(:hover)
{
animation:decre 0.5s;
}

</style>
