<?php
session_start();
if(!isset($_SESSION['id'])) {
echo "<script>alert('로그인이 필요합니다.');location.href='login.php'</script>";exit;
}


include "con.php";


$id = $_GET['id'];
$pw = $_POST['pass'];
$userid = $_SESSION['id'];



$sql = "select * from infoboard where no='$id' and nick='$userid'";
$r = $con->query($sql);

if($r->num_rows==0)
{
echo "<script>alert('게시글을 삭제할 권한이 없습니다.');history.back();</script>";exit;
}














$sql = "select * from infoboard where no='$id' and pass='$pw' and nick='$userid'";
$result = $con->query($sql);


if ($result)
{
	if (mysqli_num_rows($result)==1)
	{
		// 삭제할 게시글의 정보 가져오기
		$row = mysqli_fetch_assoc($result);
				

	$a = $row['no'];
	$b = $row['title'];
	$c = $row['comment'];
	$d = $row['pass'];
	$e = $row['date'];
	$f = $row['nick'];
	$g = $row['image'];

	
		$sql = "insert into deltable (id, title, comment, pass, date,user,img) values ('$a', '$b', '$c', '$d', '$e','$f','$g')";


		$con->query($sql);
		$con->query("delete from infoboard where no='$id' and pass='$pw' and nick='$userid'");
		



		echo "<script>alert('게시글을 삭제했습니다.');location.href='index.php'</script>";
	}
	else
	{
		echo "<script>alert('패스워드가 일치하지 않습니다');history.go(-1)</script>";
	}

}

?>




