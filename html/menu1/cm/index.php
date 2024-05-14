<?php
session_start();




    include "../../nav.html";
    include "con.php";
    
    
    
    
?>

<section>
    <div class="s1">
        <p class="top">소식ㆍ정보 > 보도자료</p>
        <p class="name">보도자료</p>
        
        <!-- 테이블 타이틀 (제목) -->
<table style="margin:50px auto; width:1000px;font-size:20px;">
<tr>
<th style="border:none" class="th0">번호</th><th style="border:none"  class="th1">제목</th><th style="border:none"  class="th2">날짜</th>
</tr>
<tr><th style="border-bottom:2px solid #0351c5;height:1;line-height:0.5;border-left:none;border-right:none;border-top:none" colspan="5"><br></th></tr>




<?php 


// 한페이지에 표시할 게시물
$per_page = 5;

// get받기 없으면 1
$page = isset($_GET['page'])? $_GET['page']:1;

//시작
$start_from = ($page-1)*$per_page;





$sql = "select * from bodo order by no desc limit $start_from, $per_page";

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


</tr>


<?php

}?>



<!-- 밑줄 -->
<tr>
  <td colspan="5" style="border-bottom: 1px solid #ccc; padding-top:10px;"></td>
</tr>

<!-- 페이지 숫자 -->
<tr>
<td colspan="5" style="text-align:center;">


<?php

$tot_q = "select count(*) as total from bodo";
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
       
       
       
       <?php
       // 관리자만 글 작성
       if($_SESSION['id']=='agent'){
       ?>
       <button type="button;" onclick="location.href='write.php'" style="background-color:rgb(97,114,166);color:white;padding:3px;margin-left:30px;border:1px solid rgb(97,114,166);border-radius:10px;width:80;cursor: pointer;">글쓰기</button>
       <?php
        }
        ?>
        
        
    </div>
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
    .s1 { width: 1050px; height: 600px; background-color: white; margin: 0 auto; font-family:'s4'}
    .top { text-align: center; padding: 50px; z-index: 0; position: relative; color: gray; font-size: 13px; font-family:'s5'}
    .name { text-align: center; font-size: 40px; font-weight: bold; color: #0351c5; font-family:'s5'}




th{border:1px solid black;}
.th0{width:45px; text-align:center;line-height:1.9;}
.th1{width:450px; text-align:center;line-height:1.9;}
.th2{width:130px; text-align:center;line-height:1.9;}







</style>
<br><br><br>
<?php
    include "../../footer.html";

?>

