<div id="box" style="max-height:280px;overflow-y:scroll; border:1px solid #e0e0e3;border-radius:8px;">
<div style="padding-top:5;padding-left:10;padding-bottom:5">
<?php

include "con.php";





$sql = "select * from chat";
$r = $con->query($sql);

while($row = $r->fetch_assoc())
{
?>



<?php
$time = strtotime($row['date']);
if(date('Y-m-d',$time)==date('Y-m-d'))
{
$time = date('H:i',$time);
}
else{
$time = date('Y-m-d',$time);
}



if($row['name']=='Anon'){
echo "<span style='font-family:s4'>".$row['memo']."</span> <span style='color:gray;font-size:13'>[<b>".$row['name']."</b> : ".$time."]</span><br>";
}
else
{
echo "<span style='font-family:s4'>".$row['memo']."</span> <span style='color:#0351c5;font-size:13'>[<b>".$row['name']."</b> : ".$time."]</span><br>";
}

echo "<br>";
}






?>
</div>
</div>



<br>



<script>
<!-- 아래로 이동 -->
function scrollbottom(){
	var box = document.getElementById("box");
	box.scrollTop = box.scrollHeight;}
	
window.onload = function(){scrollbottom();}




setInterval(function(){
	var curtime = new Date();
	var sec = curtime.getSeconds();
	
	

		
		if(sec%5==1)
		{
		window.location.reload();
		}
	

	}, 1000);
</script>



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

</style>

