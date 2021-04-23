<?php 
session_start(); 
include "function.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>ร้านค้าขายเครื่องดนตรี</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="images/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="slimbox/js/slimbox2.js"></script>
<link rel="stylesheet" href="slimbox/css/slimbox2.css" type="text/css" media="screen" />

<link rel="stylesheet" type="text/css" href="css_style_index.css" />
<link rel="stylesheet" type="text/css" href="css_style_menu.css" />
<link rel="stylesheet" type="text/css" href="css_style_board.css" />
<link rel="stylesheet" type="text/css" href="css_style_page.css" />
<?php include "inc_js_datepicker.php"; ?>
<style type="text/css">
.style2 {color: #FF0000}
</style>
</head>
<body id="Page0">
<div id="container">
  <div id="bander_front">
    <?PHP include "bander_front.php"; ?>
    <div id="menu_top">
     	 <p>
       	 <?PHP include "menu_top1.php"; ?>
      	</p>
    </div>
  </div>
  
 <!--  <div class="menu_left"><!-- เมนูด้านซ้าย -->
<!-- 	<?PHP  include "menu_left_front.php"; ?>
  </div><!-- จบเมนูด้านซ้าย --> 

<div class="data_center"><!-- ส่วนกลางของเว็บ -->
	<div class="data_center_back">
	  <table width="100%" height="850" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="top"><div class="title">
              <h2> สมัครสมาชิกใหม่ </h2>
          </div>
            <table width="99%" border="0" align="center" style="border-bottom: 0px solid #f3f3f3;">
              <tr>
                <td height="30" align="left" valign="top"><p>&nbsp;</p>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" id="FMemBer" name="FMemBer" onsubmit="return CHMEMBER();">
                      <script language="JavaScript" type="text/javascript">
				  	function CHMEMBER(){
							if(document.FMemBer.txtUser.value==""){
									alert("กรุณากรอก ชื่อที่ใช้ Login เข้าระบบด้วยนะ");
									document.FMemBer.txtUser.focus();
									return false;
							}
							else if(document.FMemBer.txtPass.value==""){
									alert("กรุณากรอก รหัสผ่าน ด้วยนะ");
									document.FMemBer.txtPass.focus();
									return false;
							} 
							else if(document.FMemBer.txtName.value==""){
									alert("กรุณากรอก ชื่อ-สกุล ด้วยนะ");
									document.FMemBer.txtName.focus();
									return false;
							}
							else if(document.FMemBer.txtSex.value==0){
									alert("กรุณาเลือกเพศด้วยนะ");
									return false;
							}
							else if(document.FMemBer.txt_date.value==""){
									alert("กรุณาเลือกวันเกิด ด้วยนะ");
									document.FMemBer.txt_date.focus();
									return false;
							}
							else if(document.FMemBer.txtAddress.value==""){
									alert("กรุณากรอก ที่อยู่ด้วยนะ");
									document.FMemBer.txtAddress.focus();
									return false;
								}else if(document.FMemBer.txtEmail.value==""){
									alert("กรุณากรอก อีเมล์ด้วยนะ");
									document.FMemBer.txtEmail.focus();
									return false;
							}else if(document.FMemBer.txtTel.value==""){
									alert("กรุณากรอก เบอร์โทรที่สามารถติดต่อได้ด้วยนะ");
									document.FMemBer.txtTel.focus();
									return false;
						
							}
							else {
									return true;
						}
					}
				  </script>
                      <table width="79%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="19%" height="25" align="right" valign="middle"><strong>Username : </strong></td>
                          <td width="81%" height="25" align="left" valign="middle"><input name="txtUser" type="text" id="txtUser" style="width: 50%" />
                              <span class="style2">*</span></td>
                        </tr>
                        <tr>
                          <td width="19%" height="25" align="right" valign="middle"><strong>Password : </strong></td>
                          <td width="81%" height="25" align="left" valign="middle"><input name="txtPass" type="password" id="txtPass" style="width: 50%" />
                              <span class="style2">*</span></td>
                        </tr>
                        <tr>
                          <td width="19%" height="25" align="right" valign="middle"><strong>ชื่อ-สกุล : </strong></td>
                          <td width="81%" height="25" align="left" valign="middle"><input name="txtName" type="text" id="txtName" style="width: 50%" />
                              <span class="style2">*</span></td>
                        </tr>
                        <tr>
                          <td height="25" align="right" valign="middle"><strong>เพศ : </strong></td>
                          <td height="25" align="left" valign="middle"><select name="txtSex" id="txtSex">
                              <option value="0" selected="selected">เพศ</option>
                              <option value="m">ชาย</option>
                              <option value="f">หญิง</option>
                            </select>
                              <span class="style2">*</span> </td>
                        </tr>
                        <tr>
                          <td height="25" align="right" valign="middle"><strong>วันเกิด : </strong></td>
                          <td height="25" align="left" valign="middle"><input name="txt_date"   type="text" class="frm" id="datepicker-now" style="width: 100px; color:#000;" value="<?=$_POST['txt_date']?>" />                            <span class="style2">*</span></td>
                        </tr>
                        <tr>
                          <td height="25" align="right" valign="middle"><strong>ที่อยู่ :</strong></td>
                          <td height="25" align="left" valign="middle"><textarea name="txtAddress" rows="5" id="txtAddress" style="width: 90%"></textarea>
                              <span class="style2">*</span></td>
                        </tr>
                        <tr>
                          <td height="25" align="right" valign="middle"><strong>เบอร์โทร :</strong></td>
                          <td height="25" align="left" valign="middle">
                            <input name="txtTel" type="text" id="txtTel" style="width: 50%;" maxlength="10" />
                            <span class="style2">*</span></td>
                        </tr>
                        <tr>
                          <td height="25" align="right" valign="middle"><strong>อีเมล์ : </strong></td>
                          <td height="25" align="left" valign="middle"><input name="txtEmail" type="text" id="txtEmail" style="width: 50%" />
                              <span class="style2">*</span></td>
                        </tr>
                      
                        <tr>
                          <td height="30" align="right" valign="middle">&nbsp;</td>
                          <td height="30" align="left" valign="top"><input type="submit" name="Submit2" value="บันทึกข้อมูล" />
                              <input type="reset" name="Submit2" value="ล้างข้อมูล" /></td>
                        </tr>
                      </table>
                    </form></td>
              </tr>
              <tr> </tr>
            </table>
            <p>&nbsp;</p>
            <p>&nbsp;</p></td>
        </tr>
      </table>
	  <p>&nbsp;</p>
    </div>
	  
<div class="menu_right"><!-- เมนูด้านซ้าย -->
	    <div class="menu_left"><!-- เมนูด้านซ้าย -->
      </div>
		<p style="clear:both;"></p>
    </div><!-- ปิด เมนูด้านซ้าย -->
	  
  </div>
<div id="footer_front">
	<div class="data_footer">
      <p>
        <?PHP include "footer.php"; ?>
        <?PHP
if($_POST){

if(!is_numeric($_POST['txtTel'])) { 
							echo "<script>alert('กรุณากรอก - เบอร์โทร เป็นตัวเลขเท่านั้น')</script>"; exit();
							}	
// checkemail($_POST['txtEmail']); // ตรวจสอบรูปแบบเมล์

	//ติดต่อฐานข้อมูล
	include "connect_db.php";
	
	$sql_mb = mysqli_query($con,"SELECT * FROM ".$member." WHERE mb_user='".$_POST['txtUser']."'");
			$num1 = mysqli_num_rows($sql_mb);
			$rs1 = mysqli_fetch_array($sql_mb);

		
	if($num1 >= 1){
		$Name = $rs1['mb_user'];
		echo "<script>alert('ชื่อเข้าระบบ $Name ถูกใช้งานแล้ว')</script>"; exit();
		}
		
	$FileName 	= $_FILES['FileUpload'] ['name'];
	$Filetype 		= $_FILES['FileUpload'] ['type'];
	$FileSize 		= $_FILES['FileUpload'] ['size'];
	$FileUpLoadtmp = $_FILES['FileUpload'] ['tmp_name'];
			
if($FileUpLoadtmp){					 
	$array_last = explode(".",$FileName); // เป็น array หาจำนวน จุด . ของชื่อตัวแปร์		
	$c = count($array_last) - 1; //นับจำนวน จุด "." ของชื่อตัวแปร์ 
	$lname = strtolower($array_last [$c]); // หา นามสกุลไฟล์ ตัวสุดท้ายของ ตัวแปร์
	$NewFileupload = date("U"); 
	$NewFile = $NewFileupload.".$lname"; //รวม ชื่อและนามสกลุดไฟล์เข้าด้วยกัน 
	}


// วัน เดือน ปี
$date_ary = explode("/", $_POST['txt_date']);

$day = $date_ary[0];
$month = $date_ary[1];
$year = $date_ary[2]-543;

$birthday =  $year."-".$month."-".$day; // ทำให้เป็นรูปแบบวันเดือนปีที่ใช้งานได้จริง

//สถานะ พนักงานเท่ากับ 2 ผู้ดูแลระบบเท่ากับ 1
$status = "M";
$Date = date("Y-m-d");
//เพิ่มข้อมูลลงในตาราง
$Str = "INSERT INTO ".$member." VALUES "
		."(0,
		'".$_POST['txtUser']."', 
		'".$_POST['txtPass']."', 
		'".$_POST['txtName']."',
		'".$_POST['txtSex']."', 
		'".$birthday."', 
		'".$_POST['txtAddress']."', 
		'".$_POST['txtTel']."',
		'".$_POST['txtEmail']."', 
		'".$NewFile."', 
		'".$status."', 
		'".$Date."')";
		
$sql_add = mysqli_query($con,$Str);

if($sql_add){
		
	echo "<script>alert('สมัครสมาชิกเรียบร้อยแล้ว Login เข้าระบบเพื่อสั่งซื้อสินค้า')</script>";
	echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}else{
	echo "<script>alert('error: บันทึกข้อมูลไม่ได้')</script>";
	echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	}		
}
					
	?>
      </p>
      
	</div>
	
</div>
<div style="clear:both;"></div>
	   <!-- End menu -->
</div>
	<!-- end Container -->
</body>
</html>
