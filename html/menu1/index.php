<?php

$connect = mysqli_connect("mysql-db", "root", "apmsetup");

if($connect)
{
	mysqli_query($connect, "create database if not exists board");
}

$connect = mysqli_connect("mysql-db", "root", "apmsetup", "board");
$table = "create table if not exists board(
	id int auto_increment primary key,
	user varchar(20) not null,
	title varchar(30) not null,
	comment text not null,
	pass varchar(20) not null,
	date date)";

if($connect){
	mysqli_query($connect, $table);
}


include "../nav.html";
?>


<section>
<div class="s1">
<p class="top">소식ㆍ정보 > 익명게시판</p>
<p class="name">익명게시판</p>


<div style="margin: 20px auto; width: 1000px; text-align: right;">
    <form action="" method="get" >
        <input type="text" name="search" placeholder="검색어를 입력하세요" style="height:21px;border:none; border-bottom: 2px solid black;margin-left:5px;padding:3px;">
        <input type="submit" value="검색" style="background-color:white;width:50px">
    </form>
</div>





<!-- 테이블 타이틀 (제목) -->
<table style="margin:20px auto; width:1000px;font-size:20px;">
<tr>
<th  class="th0">번호</th><th class="th1">제목</th><th class="th2">작성자</th><th class="th2">날짜</th>
</tr>
<tr><th style="border-bottom:2px solid #0351c5;height:1;line-height:0.5" colspan="5"><br></th></tr>




<?php
// 한 페이지에 표시할 게시물
$per_page = 5;

// get으로 page 받음 (없으면 기본값 1로 설정)
$page = isset($_GET['page'])? $_GET['page'] : 1;

// 현재 페이지에서 보여줄 게시물 시작 위치
$start_from = ($page-1)*$per_page;


// 키워드 검색
if(isset($_GET['search'])&&!empty($_GET['search'])){

// sql 인젝션 방어
$search = mysqli_real_escape_string($connect, $_GET['search']);

// 제목과 내용으로 검색


// 
$query = "select * from board where title like '%$search%' or comment like '%$search%' order by id desc limit $start_from, $per_page";
}
else{
$query = "select * from board order by id desc limit $start_from, $per_page";
}






$r = mysqli_query($connect, $query);

while($row = mysqli_fetch_array($r))
{
?>



<!-- 테이블  (내용) -->
<tr style="height:40px">
<td  class="th0"><?=$row['id'];?></td>
<td class="th1"><a href="view.php?id=<?=$row['id']?>">
<?=$row['title']?>
</a>
</td>
<td class="th2"><?=$row['user']?></td>
<td class="th2"><?=$row['date']?></td>
</tr>

<?php
}
?>



<!-- 밑줄 -->
<tr>
  <td colspan="4" style="border-bottom: 1px solid #ccc; padding-top:10px;"></td>
</tr>


<!-- 페이지 숫자 -->
<tr>
<td colspan="4" style="text-align:center;">




<?php

$tot_q = "select count(*) as total from board where title like '%$search%' or comment like '%$search%'";
$tot_r = mysqli_query($connect, $tot_q);
$tot_row = mysqli_fetch_assoc($tot_r);

$tot_page = ceil($tot_row['total']/$per_page);



// 중간에 표시되는 숫자 범위(숫자가 낮을수록 표시되는 페이지도 낮아짐)
$start = max(1,$page-2);
$end = min($tot_page,$page+2);

// 1페이지에서는 page의 값이 0이므로 이전이 안보임
if($page>1){
?>
<button type="button" onclick="location.href='?page=<?=$page-1?>&search=<?php if(isset($search)){echo $search;}?>'" style="background-color:rgb(167,176,205);color:white;padding:3px;margin-left:30px;border:0px solid rgb(97,114,166);border-radius:10px;width:60;cursor: pointer;">이전</button>


<?php
}


// 이전과 다음 사이에 표시되는 페이지들
for($i=$start;$i<=$end;$i++){
echo "<a style='text-decoration:none;' href='?page=".$i."&search=".($search)."'><span style='font-size:15px'> [".$i."] </span></a>";
}


// 맨 마지막 page에서는 다음이 안보임
if($page < $tot_page) {
?>

<button type="button" onclick="location.href='?page=<?=$page+1?>&search=<?php if(isset($search)){echo $search;}?>'" style="background-color:rgb(167,176,205);color:white;padding:3px;margin-left:3;border:0px solid rgb(97,114,166);border-radius:10px;width:60;cursor: pointer;">다음</button>
<?php }
?>
</td>
</tr>











<div style="height:10px;"></div>

</table>
</div>
</section>



<div style="width:1050px;margin:50 auto;">
<!--<button type="button;" onclick="location.href='write.php'" style="background-color:white;padding:3px;margin-left:30px;">글쓰기</button>-->
<button type="button" onclick="location.href='write.php'" style="background-color:rgb(97,114,166);color:white;padding:3px;margin-left:30px;border:1px solid rgb(97,114,166);border-radius:10px;width:80;cursor: pointer;">글쓰기</button>



<div style="margin-top:46px"></div>
<?php include "../footer.html"?>
</div>



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
.th2{width:150px; text-align:center;}




/* search bar */
input[type="text"]:focus{
outline:none;
}

</style>
