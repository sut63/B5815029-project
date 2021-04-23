<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?PHP
include "connect_db.php";
$sql_emp = mysqli_query($con,"SELECT * FROM ".$member." WHERE mb_id='".$_SESSION['sess_emp_id']."'");
$rs_emp = mysqli_fetch_array($sql_emp);

if($rs_emp['mb_status']=='1'){
	$txt_status = "ผู้ดูแลระบบ";
	
}else if($rs_emp['mb_status']=='2'){
	$txt_status = "พนักงาน";	
}

 





