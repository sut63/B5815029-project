<?php
session_start(); 
include "function.php";
include "function-page.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>ร้านขายเครื่องดนตรี</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="images/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="slimbox/js/slimbox2.js"></script>
<link rel="stylesheet" href="slimbox/css/slimbox2.css" type="text/css" media="screen" />

<link rel="stylesheet" type="text/css" href="css_style_index.css" />
<link rel="stylesheet" type="text/css" href="css_style_menu.css" />
<link rel="stylesheet" type="text/css" href="css_style_board.css" />
<link rel="stylesheet" type="text/css" href="css_style_page.css" />
</head>
<body id="Page1">
<div id="container">
  <div id="bander_front">
    <?php include "bander_front.php"; ?>
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
	  <table width="100%" height="850" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="top"><div class="title">
              <h2> ข้อมูลสินค้า </h2>
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
$limit = 4;//$NUMMAX; // แสดงผลหน้าละกี่หัวข้อ
$Search = trim($_POST['txtSearch']); //ตัดซ่องวางของสตริง

	$Qtotal = mysqli_query($con,"SELECT * FROM  ".$product." WHERE(prd_name LIKE '%".$Search."%') "); //คิวรี่ คำสั่ง
	$total = mysqli_num_rows($Qtotal); // หาจำนวน record 
	$Query = mysqli_query($con,"SELECT * FROM ".$product." WHERE(prd_name LIKE '%".$Search."%') ORDER BY rand()  DESC LIMIT $start,$limit"); //คิวรี่คำสั่ง

$totalp = mysqli_num_rows($Query); // หาจำนวน record ที่เรียกออกมา
$page = ceil($total/$limit); // เอา record ทั้งหมด หารด้วย จำนวนที่จะแสดงของแต่ละหน้า
//
$cols = 2; 
$c = $cols;
?>
                      <table style="width: 100%; ">
                        <tr>
                          <?php
while($result = mysqli_fetch_array($Query)){
$detail_product = substr($result['prd_detail'], 0, 33) . "...";
$c --;2
?>
<?PHP
if(!empty($result['prd_photo'])){
		        $xy = @getimagesize("Product/".$result['prd_photo']."");
                        $tx = $xy[0];
                        $ty = $xy[1];
	

			$x = 110;
			$y = $ty/$tx;
			$y = $y * 110;
}
?>
                          <td align="left" valign="top" id="prd_bottom"><div id="prd_photo">
                              <?PHP
			 // ถ้ามีรูปสินค้าให้แสดง แต่ถ้าไม่มีให้ แสดงภาพรอรูป
			  if(!$result['prd_photo']==""){ ?>
                              <a href="detail_product.php?ID=<?=$result['prd_id']?>"> <img  class="photo" src="Product/<?=$result['prd_photo']?>" width="<?=$x?>" height="<?=$y?>"/> </a>
                              <?php }else{ ?>
                              <a href="detail_product.php?ID=<?=$result['prd_id']?>"> <img class="photo" src="images/photo.jpg" width="110" height="132" border="0" /> </a>
                              <?php } ?>
                            </div>
                              <div id="prd_line_height">
                                <ul id="prd_ul" style="margin-top: 10px;">
                                  <li> <strong><u> <?=$result['prd_name']?></u></strong></li>
								  <li style="font-size:12px; padding:5px;"> <?=$detail_product?></li>

								  <li> ราคา: <samp  style="color:green;">
                                    <b>฿<?=number_format($result['prd_price'],2)?></b>
                                  </samp> บาท </li>
								  
								   <li style="font-size:12px;"> เหลือสินค้า :<samp style="color:red;"><?=$result['prd_stock']?>
                                </samp>ชิ้น</li>
                         
								  <li style="padding-top: 10px;">
	<form action="<?=$_SERVER['PHP_SELF']?>" method="post" name="from1" id="from1" onsubmit="return chk_num();">

                                        <input name="add_basket" type="submit" id="add_basket" value="หยิบใส่ตระกร้า" class="txt_btn" />
                                <input name="btn_detail" type="submit" id="btn_detail" value="รายละเอียด" class="txt_btn" />
                                        <input type="hidden" name="ID" value="<?=$result['prd_id']?>" />
                              </form>
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
            <p><span style="padding-top:10px;">
                <?php  
	
		

	
	


?>
             
	  
<!-- เมนูด้านซ้าย -->
  <p style="clear:both;"></p>
<!-- ปิด เมนูด้านซ้าย -->
	  
</div>
<div id="footer_front">
	<div class="data_footer">
      <p>
        <?php include "footer.php"; ?>
        <?PHP
			if($_POST['add_basket']){
				echo "<meta http-equiv='refresh' content='0; url=add_basket_product.php?ID=".$_POST['ID']."&txt_num=1'>";
			}else if($_POST['btn_detail']){
				echo "<meta http-equiv='refresh' content='0; url=detail_product.php?ID=".$_POST['ID']."'>";
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
