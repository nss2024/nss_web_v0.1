<?php
session_start();

if(!isset($_SESSION['id']) || $_SESSION['id'] !== 'agent') {
	echo "<script>history.back()</script>";
	exit;
}

include "con.php";

$title = $_POST['subject'];

if(empty($title)) {
// alter table news modify column title varchar(100);


	echo "<script>alert('내용을 입력해주세요.');history.back()</script>";
	exit;
}

//$title = htmlspecialchars($title);

// 이미지 업로드1
if(isset($_FILES['img1'])) {
	$img1 = $_FILES['img1'];

	// 확장자
	if($img1['error'] === UPLOAD_ERR_OK) {
		$allowed = array('png', 'jpg');
		$uploaded = strtolower(pathinfo($img1['name'], PATHINFO_EXTENSION));

		if(!in_array($uploaded, $allowed)) {
			echo "<script>alert('이미지 파일은 png 또는 jpg 형식이어야 합니다.');history.back();</script>";
			exit;
		}

		// 크기
		if($img1['size'] > 3 * 1024 * 1024) {
			echo "<script>alert('이미지 파일의 크기는 3MB를 초과할 수 없습니다.');history.back();</script>";
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

// 이미지 업로드2
// (이하 동일한 패턴으로 나머지 이미지에 대한 업로드 처리)


// 이미지 업로드2
if(isset($_FILES['img2'])) {
	$img2 = $_FILES['img2'];

	// 확장자
	if($img2['error'] === UPLOAD_ERR_OK) {
		$allowed = array('png', 'jpg');
		$uploaded = strtolower(pathinfo($img2['name'], PATHINFO_EXTENSION));

		if(!in_array($uploaded, $allowed)) {
			echo "<script>alert('이미지 파일은 png 또는 jpg 형식이어야 합니다.');history.back();</script>";
			exit;
		}

		// 크기
		if($img2['size'] > 3 * 1024 * 1024) {
			echo "<script>alert('이미지 파일의 크기는 3MB를 초과할 수 없습니다.');history.back();</script>";
			exit;
		}

		// 이미지 이동
		$file_name = $img2['name'] . '_' . uniqid();
		$file_tmp = $img2['tmp_name'];
		$move = './img/' . $file_name;

		move_uploaded_file($file_tmp, $move);

		$img2 = $file_name;
	} else {
		$img2 = 'none';
	}
}







// 이미지 업로드3
if(isset($_FILES['img3'])) {
	$img3 = $_FILES['img3'];

	// 확장자
	if($img3['error'] === UPLOAD_ERR_OK) {
		$allowed = array('png', 'jpg');
		$uploaded = strtolower(pathinfo($img3['name'], PATHINFO_EXTENSION));

		if(!in_array($uploaded, $allowed)) {
			echo "<script>alert('이미지 파일은 png 또는 jpg 형식이어야 합니다.');history.back();</script>";
			exit;
		}

		// 크기
		if($img3['size'] > 3 * 1024 * 1024) {
			echo "<script>alert('이미지 파일의 크기는 3MB를 초과할 수 없습니다.');history.back();</script>";
			exit;
		}

		// 이미지 이동
		$file_name = $img3['name'] . '_' . uniqid();
		$file_tmp = $img3['tmp_name'];
		$move = './img/' . $file_name;

		move_uploaded_file($file_tmp, $move);

		$img3 = $file_name;
	} else {
		$img3 = 'none';
	}
}




// 이미지 업로드4
if(isset($_FILES['img4'])) {
	$img4 = $_FILES['img4'];

	// 확장자
	if($img4['error'] === UPLOAD_ERR_OK) {
		$allowed = array('png', 'jpg');
		$uploaded = strtolower(pathinfo($img4['name'], PATHINFO_EXTENSION));

		if(!in_array($uploaded, $allowed)) {
			echo "<script>alert('이미지 파일은 png 또는 jpg 형식이어야 합니다.');history.back();</script>";
			exit;
		}

		// 크기
		if($img4['size'] > 3 * 1024 * 1024) {
			echo "<script>alert('이미지 파일의 크기는 3MB를 초과할 수 없습니다.');history.back();</script>";
			exit;
		}

		// 이미지 이동
		$file_name = $img4['name'] . '_' . uniqid();
		$file_tmp = $img4['tmp_name'];
		$move = './img/' . $file_name;

		move_uploaded_file($file_tmp, $move);

		$img4 = $file_name;
	} else {
		$img4 = 'none';
	}
}











// db에 데이터 넣기
$date = date("Y-m-d H:i:s");
$sql = "INSERT INTO news (title, date, img1, img2, img3, img4) VALUES ('$title', '$date', '$img1', '$img2', '$img3', '$img4')";
$con->query($sql);

echo "<script>alert('게시물을 등록했습니다.');window.location.href='index.php';</script>";
exit;
?>

