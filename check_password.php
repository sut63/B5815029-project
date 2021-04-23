<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
	  include "connect_db.php";
if($_POST['register']){ 
			echo "<meta http-equiv='refresh' content='0;url=add_member.php'>" ; 	
			exit();
			
}else if($_POST['Login']){
	   $user = $_POST['txt_user'];
       $pass = $_POST['txt_pass'];
	  	//ถ้าไม่มีข้อมูล
	  if($user == "" or $pass == ""){
	 		 echo "<script>alert('กรุณากรอกข้อมูลให้ครบด้วยนะ')</script>";
		 	echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 	
			exit();
	  }else{
 
	  $SQL = mysqli_query($con,"SELECT * FROM ".$member." WHERE mb_user='".$user."' AND mb_pass='".$pass."'");
	  $num = mysqli_num_rows($SQL);
	  
 	if($num == 1){
	
	  	$value = mysqli_fetch_array($SQL);




		
		// ตรวจสอบผู้ที่ไม่มีสิทธิ์เข้าใช้ระบบ
			if($value['mb_status']=='N'){
			  echo "<script>alert('คุณไม่สิทธิเข้าใช้ระบบแล้ว')</script>";
			  echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 	
			  exit();


//--------------------------------------------------------------

			  //ลงทะเที่ยนการเข้าใช้งานระบบ ส่วนของสมาชิก
			  }else if($value['mb_status']=='M'){
			  		$_SESSION['sess_mb_id'] = $value['mb_id'];
					$_SESSION['sess_mb_user'] = $value['mb_user'];
					$_SESSION['sess_mb_name'] = $value['mb_name'];
					$_SESSION['sess_mb_status'] = $value['mb_status'];
					$_SESSION['sess_mb_userid'] = session_id();
					session_write_close();
							$Title_Name = $_SESSION['sess_mb_name'];
							if($_SESSION['sess_mb_status']=='M'){
								echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-874\" />";
								echo "<script>alert('ยินดีต้อนรับ เข้าระบบ')</script>";
								echo "<meta http-equiv='refresh' content='0;url=index.php'>"; 
								exit();
							}

//--------------------------------------------------------------

			   //ลงทะเที่ยนการเข้าใช้่งานระบบ ส่วนของผู้ดูแลระบบ
				}else if($value['mb_status']=='1' or $value['mb_status']=='2'){
					$_SESSION['sess_emp_id'] = $value['mb_id'];
					$_SESSION['sess_emp_user'] = $value['mb_user'];
					$_SESSION['sess_emp_name'] = $value['mb_name'];
					$_SESSION['sess_emp_status'] = $value['mb_status'];
					$_SESSION['sess_emp_userid'] = session_id();
					session_write_close();
					
					$Title_Name = $_SESSION['sess_emp_name'];
					
							if($_SESSION['sess_emp_status']==1 or $_SESSION['sess_emp_status']==2){
								echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-874\" />";
								echo "<script>alert('ยินดีต้อนรับผู้ดูแลระบบ ".$Title_Name." เข้าระบบ')</script>";
								echo "<meta http-equiv='refresh' content='0;url=admin_main.php?m_page=1'>"; 
								exit();
							}
					
					
			   // เกิดข้อผิดพลาด
			  }else{
				  echo "<script>alert('ข้อมูลผิดพลา กรุณาลงชื่อเข้าระบบใหม่')</script>";
				  echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 	
				  exit();
			  }
			  //ถ้า username และ รหัสผ่านไม่ถูกต้อง
			}else{
				echo "<script>alert('Username หรือ Password ไม่ถูกต้อง')</script>";
				echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 	
				exit();
			}  
		}
	}

?>