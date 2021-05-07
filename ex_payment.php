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
<body id="Page9">
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
	  <table width="100%" height="500" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="top"><div class="title">
              <h2> ชำระเงินผ่านธนคาร </h2>
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
$limit = 5;
$Search = trim($_POST['txtSearch']); 

	$Qtotal = mysqli_query($con,"SELECT * FROM  ".$bank."");
	$total = mysqli_num_rows($Qtotal); 
	$Query = mysqli_query($con,"SELECT * FROM ".$bank." ORDER BY bn_id DESC LIMIT $start,$limit"); 

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
                            <td align="left" valign="top" id="prd_bottom">
		
                                <?PHP
			
			  if(!$result['']==""){ ?>
                                <a href="Product/<?=$result['']?>" rel="lightbox" title="<?=$result['bn_bank']?>" > <img  class="photo" src="Product/<?=$result['bn_photo']?>" width="48" height="48" border="0" /> </a>
                                <?php }else{ ?>
                                
                                <?php } ?>
                              </div>
                                <div id="prd_line_height">
                                  <ul id="prd_ul" style="margin-left: 70px;">
                                    <li><strong>ธนาคาร</strong> : <?=$result['bn_bank']?></li>
                                    <li><strong>ชื่อบัญชี</strong> : <?=$result['bn_name']?> |  <strong>เลขที่บัญชี</strong> :  <?=$result['bn_number']?> | <strong>สาขา</strong> : <?=$result['bn_branch']?></li>
                                   <br>
                                    <li div align="center" bgcolor="red" style="color:red; "<b>**เมื่อลูกค้าทำการโอนเเล้วโปรดเเจ้ง**  </b></div></li>
                                  
                                   
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
				<p>
		    
				<p>&nbsp;</p>
          <p>&nbsp;</p></td>
        </tr>
      </table>
	  <p>&nbsp;</p>
    </div>
	  
<div class="menu_right"><!-- เมนูด้านซ้าย -->
<!-- เมนูด้านซ้าย -->
<p style="clear:both;"></p>
    </div><!-- ปิด เมนูด้านซ้าย -->
	  
  </div>
<div id="footer_front">
	<div class="data_footer">
      <p>
        <?PHP include "footer.php"; ?>
      </p>
      
	</div>
	
</div>
<div style="clear:both;"></div>
	   <!-- End menu -->
</div>
	<!-- end Container -->
</body>
</html>
