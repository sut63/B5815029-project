<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
function displaydate_eng($x) {
	$thai_m=array("January","February","March","April","May","June","July","August","September","October","November","December");
	$txt = substr($x,0,10); //ตัดข้อความ เวลาออก 2012-08-05 17:35:20
	$time = substr($x,10); //ตัดข้อความ วันที่ออก 2012-08-05 17:35:20
	$date_array=explode("-",$txt);
	$y=$date_array[0];
	$m=$date_array[1]-1;
	$d=$date_array[2];
	$m=$thai_m[$m];
	$y=$y;
	$displaydate_eng="$d $m $y / $time";
	return $displaydate_eng;//อังกฤษ
}
$chkpage='phone';
function displaydate($x) {
	$thai_m=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	$txt = substr($x,0,10); //ตัดข้อความ เวลาออก 2012-08-05 17:35:20
	$time = substr($x,10); //ตัดข้อความ วันที่ออก 2012-08-05 17:35:20
	$date_array=explode("-",$txt);
	$y=$date_array[0];
	$m=$date_array[1]-1;
	$d=$date_array[2];
	$m=$thai_m[$m];
	$y=$y+543;
	$displaydate_th="$d $m $y";
	return $displaydate_th;//ไทย
}
function datetime($x) {
	$thai_m=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	$txt = substr($x,0,10); //ตัดข้อความ เวลาออก 2012-08-05 17:35:20
	$time = substr($x,10); //ตัดข้อความ วันที่ออก 2012-08-05 17:35:20
	$date_array=explode("-",$txt);
	$y=$date_array[0];
	$m=$date_array[1]-1;
	$d=$date_array[2];
	$m=$thai_m[$m];
	$y=$y+543;
	$datetime="$d $m $y เวลา $time วินาที";
	return $datetime;
}

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
