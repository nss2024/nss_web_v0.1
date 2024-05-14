<?php

$id = $_GET['id'];
$pw = $_POST['pass'];


$connect = mysqli_connect("mysql-db", "root", "apmsetup", "board");


$sql = "select * from board where id='$id' and pass='$pw'";
$result = mysqli_query($connect, $sql);

if ($result)
{
	if (mysqli_num_rows($result)==1)
	{
		// 삭제할 게시글의 정보 가져오기
		$row = mysqli_fetch_assoc($result);
				

	$a = $row['id'];
	$b = $row['title'];
	$c = $row['comment'];
	$d = $row['pass'];
	$e = $row['date'];

	
		$sql = "insert into deltable (id, title, comment, pass, date) values ('$a', '$b', '$c', '$d', '$e')";



		mysqli_query($connect, $sql);
		mysqli_query($connect, "delete from board where id='$id' and pass='$pw' ");



		echo "<script>alert('게시글을 삭제했습니다.');location.href='index.php'</script>";
	}
	else
	{
		echo "<script>alert('패스워드가 일치하지 않습니다');history.go(-1)</script>";
	}

}

?>




