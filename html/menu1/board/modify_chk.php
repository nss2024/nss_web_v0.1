<?php
session_start();
if(!isset($_SESSION['id'])) {
echo "<script>alert('로그인이 필요합니다.');location.href='login.php'</script>";exit;
}


include "con.php";

$id = $_GET['id'];
//$pw = $_POST['pass'];
$userid = $_SESSION['id'];
$comm = $_POST['comm'];
$sub = $_POST['subject'];



$sql = "select * from infoboard where no='$id' and nick='$userid'";
$r = $con->query($sql);

if($r->num_rows==0)
{
echo "<script>alert('게시글을 수정할 권한이 없습니다.');history.back();</script>";exit;
}













$sql = "select * from infoboard where no='$id' and nick='$userid'";
$result = $con->query($sql);


if ($result)
{
	if (mysqli_num_rows($result)==1)
	{
		// 수정할 게시글의 정보 가져오기
		$row = mysqli_fetch_assoc($result);
				

	$a = $row['no'];
	$b = $row['title'];
	$c = $row['comment'];
	$d = $row['pass'];
	$e = $row['date'];
	$f = $row['nick'];
	$g = $row['image'];

	
		$sql = "update infoboard set title='$sub', comment='$comm' where no='$id'";


		$con->query($sql);
		
		



		echo "<script>alert('게시글을 수정했습니다.');location.href='index.php'</script>";
	}
	else
	{
		echo "<script>alert('오류가 발생했습니다.');history.go(-1)</script>";
	}

}

?>




