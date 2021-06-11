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
  <p>&nbsp;</p>
<div class="title_data_type">ธนาคาร</div>
   <ul class="ul_type" style="margin-top: 3px; margin-left: 5px;">
 		 <li id="li_type"> <a href="admin_bank.php?m_page=3"> ข้อมูลธนาคาร </a></li>
		 <li id="li_type"> <a href="admin_add_bank.php?m_page=3"> เพิ่มธนาคาร </a></li>
</ul>
<p>&nbsp;</p>
  </div><!-- จบเมนูด้านซ้าย --> 

<div class="data_center"><!-- ส่วนกลางของเว็บ -->
	<div class="data_center_back">
 


	  <table width="100%" height="850" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td align="left" valign="top">
                <div class="title">
                    <h2>ข้อมูลธนาคาร</h2>
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
$limit = 5;//$NUMMAX; // แสดงผลหน้าละกี่หัวข้อ
$Search = trim($_POST['txtSearch']); //ตัดซ่องวางของสตริง

	$Qtotal = mysqli_query($con,"SELECT * FROM  ".$bank.""); //คิวรี่ คำสั่ง
	$total = mysqli_num_rows($Qtotal); // หาจำนวน record 
	$Query = mysqli_query($con,"SELECT * FROM ".$bank." ORDER BY bn_id DESC LIMIT $start,$limit"); //คิวรี่คำสั่ง

$totalp = mysqli_num_rows($Query); // หาจำนวน record ที่เรียกออกมา
$page = ceil($total/$limit); // เอา record ทั้งหมด หารด้วย จำนวนที่จะแสดงของแต่ละหน้า
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
                            <td align="left" valign="top" id="prd_bottom">
			<div id="prd_photo" style="width: 55px;">
                                <?PHP
			 // ถ้ามีรูปสินค้าให้แสดง แต่ถ้าไม่มีให้ แสดงภาพรอรูป
			  if(!$result['bn_photo']==""){ ?>
                                <a href="Product/<?=$result['bn_photo']?>" rel="lightbox" title="<?=$result['bn_bank']?>" > <img  class="photo" src="Product/<?=$result['bn_photo']?>" width="48" height="48" border="0" /> </a>
                                <?php }else{ ?>
                                <a href="images/photo.jpg" rel="lightbox" title="รอรูปสินค้า" > <img class="photo" src="images/photo.jpg" width="48" height="48" border="0" /> </a>
                                <?php } ?>
                              </div>
                                <div id="prd_line_height">
                                  <ul id="prd_ul" style="margin-left: 70px;">
                                    <li><strong>ธนาคาร</strong> : <?=$result['bn_bank']?></li>
                                    <li><strong>ชื่อบัญชี</strong> : <?=$result['bn_name']?> |  <strong>เลขที่บัญชี</strong> :  <?=$result['bn_number']?> | <strong>สาขา</strong> : <?=$result['bn_branch']?></li>

                                    <li style="padding-top:5px;">
									<a href="edit_bank.php?m_page=<?=$_GET['m_page']?>&ID=<?=$result['bn_id']?>">แก้ไข</a> | 
									<a href="del_bank.php?m_page=<?=$_GET['m_page']?>&ID=<?=$result['bn_id']?>"  onclick="return confirm('ยืนยัน การลบข้อมูลธนาคาร <?=$result['bn_bank']?> ออกจากระบบ')"> ลบ </a>
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

                </span></p>				<p>&nbsp;</p>
              </td>
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
