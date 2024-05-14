<?php
session_start();

if(!isset($_SESSION['id']) || $_SESSION['id'] !== 'agent') {
	echo "<script>history.back()</script>";
	exit;
}

include "con.php";

$title = $_POST['subject'];

if(empty($title)) {
	echo "<script>alert('내용을 입력해주세요.');history.back()</script>";
	exit;
}

$title = htmlspecialchars($title);

// 이미지 업로드1
if(isset($_FILES['img'])) {
	$img1 = $_FILES['img'];

	// 확장자
	if($img1['error'] === UPLOAD_ERR_OK) {
		$allowed = array('png', 'jpg');
		$uploaded = strtolower(pathinfo($img1['name'], PATHINFO_EXTENSION));

		if(!in_array($uploaded, $allowed)) {
			echo "<script>alert('이미지 파일은 png 또는 jpg 형식이어야 합니다.');history.back();</script>";
			exit;
		}

		// 크기
		if($img1['size'] > 10 * 1024 * 1024) {
			echo "<script>alert('이미지 파일의 크기는 10MB를 초과할 수 없습니다.');history.back();</script>";
			exit;
		}

		// 이미지 이동
		$file_name = $img1['name'] . '_' . uniqid();
		$file_tmp = $img1['tmp_name'];
		$move = './img/' . $file_name;

		move_uploaded_file($file_tmp, $move);

		$img1 = $file_name;
	} else {
		$img1 = 'none';
	}
}


// 파일업로드



if(isset($_FILES['file'])) {
	$img2 = $_FILES['file'];

	// 확장자
	if($img2['error'] === UPLOAD_ERR_OK) {
		$allowed = array('pdf',"png","jpg");
		$uploaded = strtolower(pathinfo($img2['name'], PATHINFO_EXTENSION));

		if(!in_array($uploaded, $allowed)) {
			echo "<script>alert('첨부파일은 pdf, png, jpg 형식이어야 합니다.');history.back();</script>";
			exit;
		}

		// 크기
		if($img2['size'] > 10 * 1024 * 1024) {
			echo "<script>alert('이미지 파일의 크기는 10MB를 초과할 수 없습니다.');history.back();</script>";
			exit;
		}

		// 이미지 이동
		$file_name = $img2['name'] . '_' . uniqid();
		$file_tmp = $img2['tmp_name'];
		$move = './file/' . $file_name;

		move_uploaded_file($file_tmp, $move);

		$img2 = $file_name;
	} else {
		$img2 = 'none';
	}
}













// db에 데이터 넣기
$date = date("Y-m-d H:i:s");
$sql = "INSERT INTO bodo (title, date, img, file) VALUES ('$title', '$date', '$img1', '$img2')";
$con->query($sql);

echo "<script>alert('게시물을 등록했습니다.');window.location.href='index.php';</script>";
exit;
?>

