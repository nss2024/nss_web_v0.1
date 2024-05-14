
<?php
session_start();

if(isset($_SESSION['active']))
{

?>
<center><button style="margin-top:0;cursor:pointer;border:none;background-color:white;font-family:'s4';font-size:20;"
onclick='location.href="logout.php"'>로그아웃</button></center><hr>

<?php }

?>




<?php

include "con.php";

$sql = "select * from userdb where active=1 order by id asc";
$r = $con->query($sql);
while($row = $r->fetch_assoc())
{
echo "<span style='font-family:s4;font-size:18'>".$row['id']."</span><br>";
}






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
</style>



