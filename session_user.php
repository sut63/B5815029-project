<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
session_id();

if(!$_SESSION['sess_mb_userid'] == session_id()) { // if นี้ใช้ตรวจสอบถ้าไม่ได้ login ให้ไปหน้า login
			echo "<script>alert('LogIn เข้าระบบก่อน')</script>";
			echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
			exit();
} else { // else คือถ้า login แล้วให้แสดง
$sess_mb_id =  $_SESSION["sess_mb_id"];
$sess_mb_user = $_SESSION['sess_mb_user'];

}
?>
