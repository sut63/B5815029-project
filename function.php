<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);


function checkemail($checkemail){
	if(ereg( "^[^@]+@([a-zA-Z0-9\-]+\.)+([a-zA-z0-9\-](2)|net|com|gov|mil|org|edu|int|co.th)$",$checkemail)){
		return true ;
		
	}else{
		echo $err_mail = "<script>alert('รูปแบบ e-mail ไม่ถูกต้อง')</script>";
		echo "<script>(history.back());</script>";
		 exit();
		return  false;
	}
}
 $start = $_GET['start'];	
 if(!isset($start)){
	$start = 0;
	}
?>
