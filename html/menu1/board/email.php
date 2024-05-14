<?php
include "con.php";



$code = $_POST['code'];
$id = $_POST['id'];
$pw = $_POST['pw'];



$sql = "select * from userdb where id='$id' and pw='$pw' and code='$code'";
$r = $con->query($sql);

if($r->num_rows!=0)
{
$sql = "update userdb set code=NULL where id='$id' and pw='$pw'";
$con->query($sql);

echo "<script>alert('이메일 인증이 완료되었습니다.\\n다시 로그인을 해 주시기 바랍니다.');location.href='login.php'</script>";
exit;
}
else{echo"history.back()";}

?>
