<?php
session_start();

// 사용자 로그인 확인
if(isset($_SESSION['id'])) {
    include "../../nav.html";
    include "con.php";
    
    // 테이블 만들기 게시판 alter table name add column name varchar()
    $sql = "create table if not exists infoboard(
    no int auto_increment primary key,
    title varchar(80) not null,
    comment text not null,
    nick varchar(80) not null,
    date datetime not null,
    view int not null,
    image varchar(80),
    pass varchar(80))";
    $con->query($sql);
    
    
    
    
?>

<section>
    <div class="s1">
        <p class="top">소식ㆍ정보 > 일반게시판</p>
        <p class="name">일반게시판</p>
        
        <!-- 테이블 타이틀 (제목) -->
<table style="margin:50px auto; width:1000px;font-size:20px;">
<tr>
<th class="th0">번호</th><th class="th1">제목</th><th class="th2">작성자</th><th class="th2">날짜</th><th class="th0">조회수</th>
</tr>





<?php 


// 한페이지에 표시할 게시물
$per_page = 5;

// get받기 없으면 1
$page = isset($_GET['page'])? $_GET['page']:1;

//시작
$start_from = ($page-1)*$per_page;





$sql = "select * from infoboard order by no desc limit $start_from, $per_page";

$r = $con->query($sql);
while($row=mysqli_fetch_array($r))
{

 ?>



<!-- 테이블  (내용) -->
<tr style="height:40px">
<td class="th0"><?=$row['no'];?></td>
<td class="th1"><a href="view.php?id=<?=$row['no']?>">
	<?=$row['title'];?>
</a></td>

<td class="th2"><?=$row['nick']?></td>
<td class="th2"><?php 
$current = time();
$post_time = strtotime($row['date']);

if(date('Ymd',$current)==date('Ymd',$post_time))
{
echo '<span style=color:#f3521a>'.date("H:i",$post_time).'</span>';
}else{
echo '<span style=color:gray>'.date("Y-m-d",$post_time).'</span>';
}
?>
</td>
<td class="th2"><?=$row['view']?></td>

</tr>

<?php
}
?>



<!-- 밑줄 -->
<tr>
  <td colspan="5" style="border-bottom: 1px solid #ccc; padding-top:10px;"></td>
</tr>

<!-- 페이지 숫자 -->
<tr>
<td colspan="5" style="text-align:center;">


<?php

$tot_q = "select count(*) as total from infoboard";
$tot_r = mysqli_query($con,$tot_q);
$tot_row = mysqli_fetch_assoc($tot_r);

$tot_page = ceil($tot_row['total']/$per_page);



// 중간에 표시되는 숫자 범위(숫자가 낮을수록 표시되는 페이지도 낮아짐)
$start = max(1,$page-2);
$end = min($tot_page,$page+2);

// 1페이지에서는 page의 값이 0이므로 이전이 안보임
if($page>1){
echo "<a href='?page=".($page-1)."'><span style='font-size:15px'> &lt;이전</span></a>";
}


// 이전과 다음 사이에 표시되는 페이지들
for($i=$start;$i<=$end;$i++){
echo "<a style='text-decoration:none;' href='?page=".$i."&search=".($search)."'><span style='font-size:15px'> [".$i."] </span></a>";
}


// 맨 마지막 page에서는 다음이 안보임
if($page < $tot_page) {
echo "<a href='?page=".($page+1)."'><span style='font-size:15px'> 다음&gt;</span></a>";
}

?>







</table>
        

       <div style="padding-top:30"></div>
       <button type="button;" onclick="location.href='write.php'" style="background-color:rgb(97,114,166);color:white;padding:3px;margin-left:30px;border:1px solid rgb(97,114,166);border-radius:10px;width:80;cursor: pointer;">글쓰기</button>
        
        
        
    </div>
</section>








<style>
    /* section 1 */
    .s1 { width: 1050px; height: 600px; background-color: white; margin: 0 auto; }
    .top { text-align: center; padding: 50px; z-index: 0; position: relative; color: gray; font-size: 13px; }
    .name { text-align: center; font-size: 40px; font-weight: bold; color: #0351c5; }




th{border:1px solid black;}
.th0{width:45px; text-align:center;line-height:1.9;}
.th1{width:450px; text-align:center;line-height:1.9;}
.th2{width:130px; text-align:center;line-height:1.9;}







</style>
<br><br><br>
<?php
    include "../../footer.html";
} else {
    echo "<script>alert('로그인이 필요합니다.');location.href='login.php'</script>";
}
?>

