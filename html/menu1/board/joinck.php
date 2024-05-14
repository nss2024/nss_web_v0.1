<?php

include "con.php";






$id = $_POST["id"];
$pw = $_POST["pw"];
$mail = $_POST["mail"];
$nick = $_POST["nick"];
$ip = $_SERVER["REMOTE_ADDR"];




$id = htmlspecialchars($id);
$pw = htmlspecialchars($pw);
$mail = htmlspecialchars($mail);
$nick = htmlspecialchars($nick);


// 중복 아이디 확인
$sql = "select * from userdb where id='$id'";
$r = $con->query($sql);
if($r->num_rows !=0)
{
	echo"<script>alert('이미 사용중인 아이디 입니다.');history.back();</script>";
	exit;
}


// 중복 닉네임 확인
$sql = "select * from userdb where nick ='$nick'";
$r = $con->query($sql);
if($r->num_rows!=0)
{
	echo"<script>alert('이미 사용중인 닉네임 입니다.');history.back();</script>";
	exit;
}


// 중복 이메일 확인
$sql = "select * from userdb where email ='$mail'";
$r = $con->query($sql);
if($r->num_rows!=0)
{
	echo"<script>alert('이미 사용중인 이메일 입니다.');history.back();</script>";
	exit;
}




// 필터링
if (strpos($id, "'") !== false || strpos($pw, "'") !== false || strpos($mail, "'") !== false || strpos($nick, "'") !== false) {
    echo "<script>alert('잘못된 입력입니다.');history.back();</script>";
    exit;
}

// email 인증 진행 sendmail 설치하면 됨


$to = $mail; // 수신자 이메일 주소
$subject = "ncsc 홈페이지 회원가입 이메일 인증코드";
$code = rand(1000,9999);
$content = "회원가입 인증 코드 : ".$code;
$headers = "From: test@test.com"."\r\n";
$headers .= "Reply-To: test@test.com"."\r\n";
//$headers .= 'Organization: Sender Organization' . "\r\n";
//$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
//$headers .= 'X-Priority: 3' ."\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion() . "\r\n"; // PHP 버전 추가

$mailsent = mail($to, $subject, $content, $headers);
if($mailsent)
{
echo "<script>alert('성공적으로 메일을 발송했습니다. \\n가입 시 일회용 이메일 주소를 권장드립니다.')</script>";


$sql = "insert into userdb(id,pw,email,nick,ip,code,mode) values('$id','$pw','$mail','$nick','$ip','$code',1)";
$con->query($sql);





echo "<script>alert('회원가입을 완료했습니다!');location.href='login.php';</script>";
exit;
}
else
{
echo "<script>alert('메일 발송 실패')</script>";
exit;
}






?>
