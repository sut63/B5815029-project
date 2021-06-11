<?php 
include "session_admin.php";
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
</head>
<body id="Page4">
<div id="container">
  <div id="bander_back">
    <?PHP include "bander_back.php"; ?>
    <div id="menu_top">
     	 <p>
       	 <?PHP include "menu_top2.php"; ?>
      	</p>
    </div>
  </div>
  
  <div class="menu_left"><!-- เมนูด้านซ้าย -->
	<?PHP  include "menu_left_back.php"; ?>
  </div><!-- จบเมนูด้านซ้าย --> 

<div class="data_center"><!-- ส่วนกลางของเว็บ -->
	<div class="data_center_back">
	  <table width="100%" height="850" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td align="left" valign="top">
                <div class="title">
                    <h2>เพิ่มข้อมูลธนาคาร</h2>
                </div>
				<p>&nbsp;</p>				
				<form action="<?PHP $_SERVER['PHP_SELF']?>" method="post" name="form1" id="form1" enctype="multipart/form-data" onsubmit="return chk_txt();" >
				                    <script language="JavaScript" type="text/javascript">
				  	function chk_txt(){
							if(document.form1.txt_bank.value==""){
									alert("กรุณากรอก ชื่อธนาคาร ด้วยนะ");
									document.form1.txt_bank.focus();
									return false;
							}
							else if(document.form1.txt_name.value==""){
									alert("กรุณากรอก ชื่อบัญชี ด้วยนะ");
									document.form1.txt_name.focus();
									return false;
							}
							else if(document.form1.txt_num.value==""){
									alert("กรุณากรอก เลขที่บัญชี ด้วยนะ");
									document.form1.txt_num.focus();
									return false;
							}
							else if(document.form1.txt_branch.value==""){
									alert("กรุณากรอก สาขาธนาคาร ด้วยนะ");
									document.form1.txt_branch.focus();
									return false;
							}
								else {
									return true;
							}
						
					}
				  </script>
				                    <table width="99%" border="0">
                                      <tr>
                                        <td width="20%" height="22" align="right" valign="middle"><strong>ชื่อธนาคาร :</strong></td>
                                        <td width="80%" height="22" align="left" valign="middle"><input name="txt_bank" type="text"  id="txt_bank" accesskey="p" style="width: 250px;" /></td>
                                      </tr>
                                      <tr>
                                        <td height="22" align="right" valign="middle"><strong>ชื่อบัญชี :</strong></td>
                                        <td height="22" align="left" valign="middle"><input name="txt_name" type="text"  id="txt_name"  style="width: 250px;" accesskey="p" /></td>
                                      </tr>
                                      <tr>
                                        <td height="22" align="right" valign="middle"><strong>เลขที่บัญชี :</strong></td>
                                        <td height="22" align="left" valign="middle"><input name="txt_num" type="text" id="txt_num"  style="width: 250px;" accesskey="p" maxlength="10" /></td>
                                      </tr>
                                      <tr>
                                        <td height="22" align="right" valign="middle"><strong>ขาสา :</strong></td>
                                        <td height="22" align="left" valign="middle"><input name="txt_branch" type="text"  id="txt_branch" accesskey="p" style="width: 250px;" /></td>
                                      </tr>
                                      <tr>
                                        <td height="22" align="right" valign="middle"><strong>รูปธนาคาร : </strong></td>
                                        <td height="22" align="left" valign="middle"><input name="FileUpload" type="file" id="FileUpload" size="45" /></td>
                                      </tr>
                                      <tr>
                                        <td height="22" align="right" valign="middle">&nbsp;</td>
                                        <td height="22" align="left" valign="middle">
										<input type="submit" name="btnSubmit" id="btnSubmit" value="บันทึกข้อมูล" />
                     					 <input type="reset" name="btnSubmit2" id="btnSubmit2" value="ยกเลิก" />										 </td>
                                      </tr>
                                    </table>
				                    
				</form>
		
				<p>&nbsp;</p>				
				<table border="0" cellpadding="0" cellspacing="0" style="border-top: 0px solid #eee; width:100%; padding:0px; margin:0px;">
                  <tr>
                    <td align="left" valign="middle"><?php
//ติดต่อฐานข้อมูล
include "connect_db.php";

//

	
?> <?php  ?>
                
            
          </table>
	  	  <p>&nbsp;</p>

    </div>
	  
		<!-- เมนูด้านซ้าย -->
	    <p style="clear:both;"></p>
  		<!-- ปิด เมนูด้านซ้าย -->
	  
  </div>
<div id="footer_front">
	<div class="data_footer">
      <p>
        <?PHP include "footer.php"; ?>
        <span style="padding-top:30px; text-align:center; font-size:11px; ">
        <?PHP
if($_POST){
	//ติดต่อฐานข้อมูล
	include "connect_db.php";
		
	$FileName 	= $_FILES['FileUpload'] ['name'];
	$Filetype 		= $_FILES['FileUpload'] ['type'];
	$FileSize 		= $_FILES['FileUpload'] ['size'];
	$FileUpLoadtmp = $_FILES['FileUpload'] ['tmp_name'];
			
if($FileUpLoadtmp){					 
	$array_last = explode(".",$FileName); 	
	$c = count($array_last) - 1; 
	$lname = strtolower($array_last [$c]); 
	$NewFileupload = date("U"); 
	$NewFile = $NewFileupload.".$lname"; 
	}


$Str = "INSERT INTO ".$bank." VALUES "
		."(0,
		'".$_POST['txt_bank']."', 
		'".$_POST['txt_name']."',
		'".$_POST['txt_num']."',
		'".$_POST['txt_branch']."',
		'".$NewFile."')";
		
$sql_add = mysqli_query($con,$Str);


if($sql_add){ 
			
		if($lname=="gif" or $lname=="jpg" or $lname=="jpeg" or $lname=="png"){
			
				$UploadFile = move_uploaded_file($FileUpLoadtmp, "Product/".$NewFile);					
			}	
			
			   echo "<script>alert('บันทึกข้อมูลเสร็จแล้ว')</script>";
			   echo "<meta http-equiv='refresh' content='0; url=admin_add_bank.php?m_page=3'>";
			}else{
			   echo "<script>alert('error: บันทึกข้อมูลไม่ได้')</script>";
			   echo "<meta http-equiv='refresh' content='0; url=admin_add_bank.php?m_page=3'>";
		}		
}

?>
      </span></p>
      
	</div>
	
</div>
<div style="clear:both;"></div>
	   <!-- End menu -->
</div>
	<!-- end Container -->
</body>
</html>
