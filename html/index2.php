<?php include "nav.html";

if(isset($_GET['search'])){
$search = $_GET['search'];}
else{

$search='';
}
?>



<section>
<div style="width:1050px; height:100px;margin:0 auto;">
<form action="index2.php" method="get">
<input type="text" name="search" style="width:1050;margin-top:25;height:50;border-radius:8px;padding:15;font-size:20;border:1px solid #0351c5">
<button type="submit" style="position:absolute;z-index:1;margin-left:-50;margin-top:37;background-color:white;
border:none"><img src="img/img/search.png"></button>
</form>
</div>
</section>





<div style="width:1050px; height:200px;margin:0 auto; ">
<div style="margin-top:40"></div>
<h1>카드뉴스</h1><br>
<?php
$con1 = new mysqli("mysql-db","root","apmsetup","news");
$r1 = $con1->query("select * from news where title like '%$search%' order by no desc limit 3");
if($r1->num_rows > 0){
while($row1 = $r1->fetch_assoc())
{
	$id1 = $row1['no'];
	echo "<span style='font-family:s4;line-height:2'><a href='/menu1/news/view.php?id=$id1'>{$row1['title']}</a></span>"."<br>";
}
}
?>
</div>




<div style="width:1050px; height:200px;margin:0 auto; ">
<br>
<h1>보도자료</h1><br>
<?php
$con2 = new mysqli("mysql-db","root","apmsetup","cm");
$r2 = $con2->query("select * from bodo where title like '%$search%' order by no desc limit 3");
if($r2->num_rows >0){
while($row2=$r2->fetch_assoc())
{
	$id2 = $row2['no'];
	echo "<span style='font-family:s4;line-height:2'><a href='/menu1/cm/view.php?id=$id2'>{$row2['title']}</a></span>"."<br>";
}
}

?>
</div>

<br>



<div style="width:1050px; height:200px;margin:0 auto; ">
<br>
<h1>익명게시판</h1><br>
<?php
$con3 = new mysqli("mysql-db","root","apmsetup","board");
$r3 = $con3->query("select * from board where title like '%$search%' or comment like '%$search%' order by id desc limit 3");
if($r3->num_rows >0){
while($row3=$r3->fetch_assoc())
{
	$id3 = $row3['id'];
	echo "<span style='font-family:s4;line-height:2'><a href='/menu1/view.php?id=$id3'>{$row3['title']}</a></span>"."<br>";
}
}

?>



</div>









<br><br>
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
input:focus{outline:none;}
</style>
