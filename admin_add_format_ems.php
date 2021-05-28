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
<style type="text/css">
.style2{ color:red; }
</style>
</head>
<body id="Page6">
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
          <td align="left" valign="top"><div class="title">
              <h2>เพิ่มรูปแบบการจัดส่งสินค้า</h2>
          </div>
              <p>&nbsp;</p>
            <form action="<?PHP $_SERVER['PHP_SELF']?>" method="post" name="form1" id="form1" enctype="multipart/form-data" onsubmit="return chk_txt();" >
                <script language="JavaScript" type="text/javascript">
				  	function chk_txt(){
							if(document.form1.txt_name.value==""){
									alert("กรุณากรอก ข้อมูลรูปแบบการจัดส่ง");
									document.form1.txt_name.focus();
									return false;
							}
							else if(document.form1.txt_price.value==""){
									alert("กรุณากรอก ราคา ");
									document.form1.txt_price.focus();
									return false;
							}
								else {
									return true;
							}
						
					}
				  </script>
                <table width="99%" border="0">
                  <tr>
                    <td width="20%" height="22" align="right" valign="middle"><strong>รูปแบบ :</strong></td>
                    <td width="80%" height="22" align="left" valign="middle"><input name="txt_name" type="text"  id="txt_name" accesskey="p" style="width: 250px;" /></td>
                  </tr>
                  <tr>
                    <td height="22" align="right" valign="middle"><strong>ราคา :</strong></td>
                    <td height="22" align="left" valign="middle"><input name="txt_price" type="text"  id="txt_price"  style="width: 70px;" accesskey="p" /></td>
                  </tr>

                  <tr>
                    <td height="22" align="right" valign="middle">&nbsp;</td>
                    <td height="22" align="left" valign="middle"><input type="submit" name="btnSubmit" id="btnSubmit" value="บันทึกข้อมูล" />
                        <input type="reset" name="btnSubmit2" id="btnSubmit2" value="ยกเลิก" />                    </td>
                  </tr>
                </table>
            </form>
            <div class="title">
                <h2>ข้อมูลรูปแบบการจัดส่งสินค้า</h2>
            </div>
            <p>&nbsp;</p>
            <table border="0" cellpadding="0" cellspacing="0" style="border-top: 0px solid #eee; width:100%; padding:0px; margin:0px;">
                <tr>
                  <td align="left" valign="middle"><?php
//ติดต่อฐานข้อมูล
include "connect_db.php";

//
if(!isset($start)){
$start = 0;
}
$limit = 5;
$Search = trim($_POST['txtSearch']); 

	$Qtotal = mysqli_query($con,"SELECT * FROM  ".$ems.""); //คิวรี่ คำสั่ง
	$total = mysqli_num_rows($Qtotal); 
	$Query = mysqli_query($con,"SELECT * FROM ".$ems." ORDER BY ems_id ASC LIMIT $start,$limit"); //คิวรี่คำสั่ง

$totalp = mysqli_num_rows($Query); 

//
$cols = 1; 
$c = $cols;
?>
                      <table style="width: 100%; ">
                        <tr>
                          <?php
while($result = mysqli_fetch_array($Query)){
$c --;2
?>
                          <td align="left" valign="top" id="prd_bottom">
						  <div id="prd_photo" style="width: 55px;">
						  	 
						  </div>
						  
                              <div id="prd_line_height">
                                <ul id="prd_ul" style="margin-left: 70px;">
								
                                  <li><strong>จัดส่งแบบ</strong> :<?=$result['ems_name']?> </li>
                                  <li><strong>ราคา</strong> : <samp style="color:red;"><?=number_format($result['ems_price'],2)?> </samp> บาท</li>
								  
                                  <li style="padding-top:5px;"> 
								  
								  <a href="del_format_ems.php?m_page=<?=$_GET['m_page']?>&amp;ID=<?=$result['ems_id']?>"  onclick="return confirm('ยืนยัน ลบรูปแบบการจัดส่ง <?=$result['ems_name']?> ออกจากระบบ')"> ลบ </a> </li>
                                </ul>
                              </div></td>
                          <?php
	if($c == 0) {
	$c = $cols;
?>
                        </tr>
                        <?php } } ?>
                    </table></td>
                </tr>
              </table>
            <p><span style="padding-top:10px;">
                <?php  
		
	
	





?>
              </span></p>
            <p>&nbsp;</p></td>
        </tr>
      </table>
	  <p>&nbsp;</p>
	  	  <p>&nbsp;</p>
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

//เพิ่มข้อมูลลงในตาราง
$Str = "INSERT INTO ".$ems." VALUES "
		."(0,
		'".$_POST['txt_name']."', 
		'".$_POST['txt_price']."')";
		
$sql_add = mysqli_query($con,$Str);

if($sql_add){		
			   echo "<script>alert('บันทึกข้อมูลเสร็จแล้ว')</script>";
			   echo "<meta http-equiv='refresh' content='0; url=admin_add_format_ems.php?m_page=3'>";
			}else{
			   echo "<script>alert('error: บันทึกข้อมูลไม่ได้')</script>";
			   echo "<meta http-equiv='refresh' content='0; url=admin_add_format_ems.php?m_page=3'>";
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