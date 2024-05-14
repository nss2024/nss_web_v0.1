<?php
session_start();

if(!isset($_SESSION['id']))
{
	echo"<script>window.location.href='login.php';</script>";
	exit;
}

include "con.php";

$title = $_POST['subject'];
$pass = $_POST['pass'];
$comm = $_POST['comm'];

if(empty($title)||empty($pass)||empty($comm))
{
	echo"<script>alert('내용을 입력해주세요.');history.back()</script>";
	exit;
}




$title = htmlspecialchars($title);
$pass = htmlspecialchars($pass);
$comm = htmlspecialchars($comm);

// 이미지 ᅟ업로드
if(isset($_FILES['imgfile']))
{
	$img = $_FILES['imgfile'];

	// 확장자
	if($img['error']===UPLOAD_ERR_OK){
	$allowed = array('png','jpg');
	$uploaded = strtolower(pathinfo($img['name'],PATHINFO_EXTENSION));
	
	if(!in_array($uploaded,$allowed))
	{
		echo "<script>alert('이미지 파일은 png 또는 jpg 형식이어야 합니다.');history.back();</script>";
		exit;
	}
	
	// 크기
	if($img['size']>3*1024*1024){
	
		echo "<script>alert('이미지 파일의 크기는 3MB를 초과할 수 없습니다.');history.back();</script>";
		exit;
	}
	
	
	
	
	// 이미지 이동
	$file_name = $img['name'].'_'.uniqid();
	
	$file_tmp = $img['tmp_name'];
	
	$move = './img/'.$file_name;

	move_uploaded_file($file_tmp,$move);
	
	

	
	$img = $file_name;
	}
	else
	{
		$img = none;
		
	}


// db에 데이터 넣기	
//$title
//$pass
//$comm
//$view?
//$ip?
//$nick?
	$ip = $_SERVER['REMOTE_ADDR'];
	$view = 0;
	$nick= $_SESSION['id'];
	$date = date("Y-m-d H:i:s");
	
	
	$sql = "insert into infoboard(title,comment,nick,date,view,image,pass) values('$title','$comm','$nick','$date','$view','$img','$pass')";
	
	$con->query($sql);
	
	echo"<script>alert('게시물을 등록했습니다.');window.location.href='index.php';</script>";
	exit;
	
	

}
?>
