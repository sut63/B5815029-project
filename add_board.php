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

<style type="text/css">
</style>
</head>
<body id="Page7">
<div id="container">
  <div id="bander_front">
    <?PHP include "bander_front.php"; ?>
    <div id="menu_top">
     	 <p>
       	 <?PHP include "menu_top1.php"; ?>
      	</p>
    </div>
  </div>
  
 <div class="menu_left"><!-- เมนูด้านซ้าย -->
	<?PHP  include "menu_left_front.php"; ?>
  </div><!-- จบเมนูด้านซ้าย --> 

<div class="data_center"><!-- ส่วนกลางของเว็บ -->
	<div class="data_center_back">
	  <table width="100%" height="400" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td align="left" valign="top">
			  <div class="title">
                <h2> ตั้งกระทู้ถาม</h2>
              </div>
              <p>
  
              </p>
              <p>&nbsp;</p>

<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
 <?PHP 
	 //ติดต่อฐานข้อมูล
	 include "connect_db.php";
	 $sql_num = mysqli_query($con,"SELECT * FROM ".$board_question."");
	$num = mysqli_num_rows($sql_num);
	 ?>
<tr>
<td height="50" colspan="4" align="left" valign="middle" style="border-bottom: 1px solid #f4f4f4;"><div style="padding:10px; font-size:15px; font-weight:bold; border-bottom: 1px solid #eee;">

      <table width="100%" border="0">
	  <form action="<?PHP echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" name="form1" id="form1" style="margin: 5px;" onsubmit="return check_txt();">
 <script language="JavaScript" type="text/javascript">
		function check_txt(){
			if(document.form1.txt_name.value==""){
				alert("กรุณากรอก ชื่อผู้ตั้งคำถามด้วยนะ");
				document.form1.txt_name.focus();
				return false;
			}
			else if(document.form1.txt_title.value==""){
				alert("กรุณากรอก หัวข้อด้วยนะ");
				document.form1.txt_title.focus();
				return false;
				}
			else if(document.form1.txt_email.value==""){
				alert("กรุณากรอก อีเมล์ด้วยนะ");
				document.form1.txt_email.focus();
				return false;
				} 
			else if(document.form1.txt_detail.value==""){
				alert("กรุณากรอก รายละเอียดด้วยนะ");
				document.form1.txt_detail.focus();
				return false;
				}else {
				return true;
			}
		}
 </script>
 
 <?php 
 if($chkpage=='phone'){
 
		$sql2 = mysqli_query($con,"SELECT * FROM ".$member." WHERE mb_id = '".$_SESSION['sess_mb_id']."'");
		$rs1 = mysqli_fetch_array($sql2);

 }
 ?>
                    <tr>
                      <td width="21%" align="right" valign="middle"><span style="width: 12%;">โดย :</span></td>
                      <td width="79%"><input name="txt_name" type="text" id="txt_name" accesskey="p" style="width: 250px; background:#fafafa; border: 1px solid #666;" value="<?=$rs1['mb_user']?>"/></td>
                    </tr>
                    <tr>
                      <td align="right" valign="middle"><span style="width: 12%;">หัวข้อคำถาม :</span></td>
                      <td><input name="txt_title" type="text"  id="txt_title" accesskey="p" maxlength="70" style="width: 250px; background:#fafafa; border: 1px solid #666;"/></td>
                    </tr>
                    <tr>
                      <td align="right" valign="middle"><span style="width: 12%;">อีเมล์ :</span></td>
                      <td><input name="txt_email" type="text" id="txt_email" accesskey="p" style="width: 250px; background:#fafafa; border: 1px solid #666;" value="<?=$rs1['mb_email']?>"/></td>
                    </tr>
                    <tr>
                    
                    </tr>
                    <tr>
                      <td align="right" valign="top"><span style="width: 12%;">รายละเอียด:</span></td>
                      <td><textarea name="txt_detail" rows="5" id="txt_detail" style="width:90%; border: 1px solid #666;"></textarea></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><input type="submit" name="btnSubmit" id="btnSubmit" value="ตั้งกระทู้" />
                          <input type="reset" name="btnSubmit2" id="btnSubmit2" value="ยกเลิก" /></td>
                    </tr>
					</form>
                  </table>

 </div>
 </td>
 <?PHP 
	 //ติดต่อฐานข้อมูล
	 include "connect_db.php";
	 $Search = trim($_POST['txtSearch']); //ตัดซ่องวางของสตริง
	 $sql_select = mysqli_query($con,"SELECT * FROM ".$board_question." WHERE(topic_title LIKE '%".$Search."%') ORDER BY topic_id DESC ");
	$num = mysqli_num_rows($sql_select);
	 ?>
              </tr>
                <tr>
                  <td width="8%" height="35" align="center" valign="middle" bgcolor="#FDD8E0" class="sell"><strong>ลำดับ</strong></td>
                  <td width="76%" height="35" align="center" valign="middle" bgcolor="#FDD8E0" class="sell"><strong>หัวข้อคำถาม</strong></td>
                </tr>
<?PHP
		$i = 1;
		while($result = mysqli_fetch_array($sql_select)){
		$sql_select1 = mysqli_query($con,"SELECT * FROM ".$board_answer."  WHERE ans_IDtopic='".$result['topic_id']."'");
		$num1 = mysqli_num_rows($sql_select1);
		?>
                <tr>
                  <td align="center" valign="middle" class="sell1"><?=$i?></td>
                  <td align="left" valign="middle" class="sell1" style="padding:3px;">
				  
			<a  style="text-decoration:none;"href="update_board.php?ID=<?=$result['topic_id']?>">
			 <?=$result['topic_title']?>
			
			<?=datetime($result['topic_date'])?>
			</a>				  </td>
               </tr>
                <?php } ?>
              </table>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p></td>
            </tr>
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
        <?PHP
	if($_POST){
	include "connect_db.php";
	$date_time = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
	
	$sql_add = mysqli_query($con,"INSERT INTO ".$board_question."
	 VALUES ('0',
		'".$_POST['txt_name']."',
		'".$_POST['txt_title']."',
		'".$_POST['txt_email']."',
		'0','".$_POST['radiobutton']."',
		'".$_POST['txt_detail']."',
		'".$date_time."')");
	
	 if($sql_add){
	 	echo "<script>alert('บันทึกข้อมูลแล้ว')</script>";
		echo "<meta http-equiv='refresh' content='0;url=board.php'>" ; 		
	 }else{
	 	echo "<script>alert('INSERT ข้อมูลไม่ได้')</script>";
		echo "<meta http-equiv='refresh' content='0;url=board.php'>" ; 		
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
