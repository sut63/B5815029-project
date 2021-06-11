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
.style2 {color: #FF0000}

</style>
</head>
<body id="Page5">
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
                    <h2>ข้อมูลสมาชิก</h2>
                </div>
				<div style="padding:10px; font-size:15px; font-weight:bold; color:#FF0000; border-bottom: 1px solid #ddd;">
				  <form id="form1" name="form1" method="post" action="admin_member.php?m_page=<?=$_GET['m_page']?>">
				    ชื่อสมาชิก : 
				    <input name="txtSearch" type="text" id="txtSearch" style="width: 300px;" />
				    <input type="submit" name="Submit" value="ค้าหา" />
				  </form>
			    </div>		
				<table border="0" cellpadding="0" cellspacing="0" style="border-top: 0px solid #eee; width:100%; padding:0px; margin:0px;">
                  <tr>
                    <td align="left" valign="middle"><?php
//ติดต่อฐานข้อมูล
include "connect_db.php";

//
if(!isset($start)){
$start = 0;
}
$limit = 5;//$NUMMAX; // แสดงผลหน้าละกี่หัวข้อ
$Search = trim($_POST['txtSearch']); //ตัดซ่องวางของสตริง

	$Qtotal = mysqli_query($con,"SELECT * FROM  ".$member." WHERE(mb_name LIKE '%".$Search."%' AND mb_status IN('M','N'))"); //คิวรี่ คำสั่ง
	$total = mysqli_num_rows($Qtotal); 
	$Query = mysqli_query($con,"SELECT * FROM ".$member." WHERE(mb_name LIKE '%".$Search."%' AND mb_status IN('M','N')) ORDER BY mb_id DESC LIMIT $start,$limit"); //คิวรี่คำสั่ง

$totalp = mysqli_num_rows($Query); 
$page = ceil($total/$limit); 
//
$cols = 1; 
$c = $cols;
?>
                        <table style="width: 100%; ">
                          <tr>
                            <?php
while($result = mysqli_fetch_array($Query)){
$detail_product = substr($result['prd_detail'], 0, 70) . "";
$c --;2
?>
                            <td align="left" valign="top" id="prd_bottom"><div id="prd_photo" style="width: 130px;">
                                <?PHP
			 // ถ้ามีรูปสินค้าให้แสดง แต่ถ้าไม่มีให้ แสดงภาพรอรูป
			  if(!$result['mb_photo']==""){ ?>
								<a href="Member/<?=$result['mb_photo']?>" rel="lightbox" title="<?=$result['mb_name']?>" > 
										<img  class="photo" src="Member/<?=$result['mb_photo']?>" width="110" height="132" border="0" />								</a>
                                <?php }else{ ?>
                           		<a href="images/photo.jpg" rel="lightbox" title="รอรูปสินค้า" > <img class="photo" src="images/photo.jpg" width="110" height="132" border="0" /> </a>
                                <?php } ?>
                              </div>
                                <div id="prd_line_height">
                                  <ul id="prd_ul" style="margin-left: 70px;">
                                    <li><strong>Username</strong> :<?=$result['mb_user']?></li>
                                    <li><strong>ชื่อ-สกุล</strong>: <?=$result['mb_name']?></li>
                                    <li><strong>เพศ</strong>: <? if($result['mb_sex']=='m'){ echo "ชาย"; }else{  echo "หญิง";  } ?> </li>
                                    <li><strong>ที่อยู่</strong>: <?=$result['mb_address']?></li>
                                    <li><strong>เบอร์โทร</strong>: <?=$result['mb_tel']?> </li>
                                    <li><strong>Email </strong>: <?=$result['mb_email']?></li>
                                    <li style="padding-top:5px;">
						<?PHP if($_SESSION['sess_emp_status']=='1'){ ?>
									<a href="edit_member.php?m_page=<?=$_GET['m_page']?>&ID=<?=$result['mb_id']?>"> แก้ไข </a> | 
									<a href="del_member.php?m_page=<?=$_GET['m_page']?>&ID=<?=$result['mb_id']?>"  onclick="return confirm('ยืนยัน ลบสมาชิก <?=$result['mb_name']?> ออกจากระบบ')"> ลบ </a>		<?php }else{ ?>
									<a href="#" style="color:#333;"  onclick=" return confirm('สำหรับผู้ดูแลระบบเท่านั้น')"> แก้ไข </a> | 
									<a href="#" style="color:#333;"  onclick=" return confirm('สำหรับผู้ดูแลระบบเท่านั้น')"> ลบ </a>
							<?php } ?>
									</li>
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


                </span></p>				<p>&nbsp;</p></td>
            </tr>
      </table>
	  	  <p>&nbsp;</p>

    </div>
	  
		<!-- เมนูด้านซ้าย -->
	    <p style="clear:both;"></p>
  		<!-- ปิด เมนูด้านซ้าย -->
	  

	
</div>
<div style="clear:both;"></div>
	   <!-- End menu -->
</div>
	<!-- end Container -->
</body>
</html>
