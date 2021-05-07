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
<link rel="stylesheet" type="text/css" href="css_style_page.css" /></head>
<body id="Page1">
<div id="container">
  <div id="bander_front">
    <?php include "bander_front.php"; ?>
    <div id="menu_top">
     	 <p>
       	 <?php include "menu_top1.php"; ?>
      	</p>
    </div>
  </div>
  
 <div class="menu_left"><!-- เมนูด้านซ้าย -->
	<?php  include "menu_left_front.php"; ?>
  </div><!-- จบเมนูด้านซ้าย --> 

<div class="data_center"><!-- ส่วนกลางของเว็บ -->
	<div class="data_center_back">
	  <table width="100%" height="850" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="top"><div class="title">
              <h2> ข้อมูลสินค้าที่ต้องการสั่ง </h2>
          </div>
            <form action="<?php echo $_SESSION['PHP_SELF']; ?>" method="post" name="FromSellPrd" id="FromSellPrd" onsubmit="return CHLSellprd();">
              <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#ECE9D8" bgcolor="orange">
                <tr>
                  <td class="sell" width="9%" height="30" bgcolor="orange"><div align="center"><strong>สินค้า</strong></div></td>
                  <td class="sell" width="46%" height="30" bgcolor="orange"><div align="left" style="padding-left: 5px;"><strong>รายการสินค้าที่เลือกไว้</strong></div></td>
                  <td  width="14%" bgcolor="orange" class="sell"><div align="center"><strong>จำนวน</strong></div></td>
                  <td class="sell"  width="15%" bgcolor="orange"><div align="center"><strong>ราคา/หน่วย</strong></div></td>
                  <td class="sellright"  width="16%" height="30" bgcolor="orange"><div align="center"><strong>ราคารวม</strong></div></td>
                </tr>
                <?php
				
 
				
if(count($_SESSION['sess_id'])=="0"){
echo "<script>alert('ไม่มีสินค้า')</script>";
echo "<meta http-equiv='refresh' content='0; url=product_new.php'>";
}else{
?>
                <?php
	//หาvat
	for($i=0;$i<count($_SESSION['sess_id']);$i++){

	$total_unit_price = $_SESSION['sess_num'][$i] * $_SESSION['sess_price'][$i];
	$total_price = $total_price + $total_unit_price;

	?>
                <tr>
                  <td  class="sell1" height="30" bgcolor="#FFFFFF"><div style="text-align:center;">
                     <?php echo sprintf("%05d",$_SESSION['sess_id'][$i]); ?>
                  </div></td>
                  <td class="sell1" height="30" bgcolor="#FFFFFF"><div style="padding-left: 5px;"><?php echo $_SESSION['sess_name'][$i]; ?></div></td>
                  <td height="30" bgcolor="#FFFFFF" class="sell1"><div align="center">
                      <?php echo  $_SESSION['sess_num'][$i]; ?>
                  </div></td>
                  <td class="sell1" height="30" bgcolor="#FFFFFF"><div align="center"><?php echo "".number_format($_SESSION['sess_price'][$i],2).""; ?> บาท </div></td>
                  <td class="sellright1" height="30" bgcolor="#FFFFFF"><div align="center"><?php echo "".number_format($total_unit_price,2).""; ?> บาท </div></td>
                </tr>
                <?php 
			} }
			?>
                <tr>
                  <td class="sell1" height="25" colspan="4" bordercolor="#F5F5F5" bgcolor="#FFFFFF"><div align="right"><b>รวม : </b></div></td>
                  <td class="sellright1" height="25" bgcolor="#FFFFFF"><div align="center"><u>
                    <?=number_format($total_price,2)?>
                  </u> บาท</div></td>
                </tr>
				 <tr>
				 <?PHP
					include "connect_db.php";
					$sql_EMS = mysqli_query($con,"SELECT * FROM $ems WHERE ems_id = '".$_GET['EmsID']."'");
					$rs_ems = mysqli_fetch_array($sql_EMS);
					$ems_name = $rs_ems['ems_name'];
					 $ems_price = $rs_ems['ems_price'];
					 
					 $Total = $total_price+$ems_price;
				 ?>
                  <td class="sell1" height="25" colspan="4" bordercolor="#F5F5F5" bgcolor="#FFFFFF"><div align="right"><b><strong>จัดส่งแบบ</strong> 
                        <?=$ems_name?> 
                      : </b></div></td>
                  <td class="sellright1" height="25" bgcolor="#FFFFFF"><div align="center"><u>
                    <?=number_format($ems_price,2)?>
                  </u>บาท</div></td>
                </tr>
                <tr>
                  <td class="sell1" height="25" colspan="4" bordercolor="#F5F5F5" bgcolor="#FFFFFF"><div align="right"><b>ยอดที่ต้องชำระ : </b></div></td>
                  <td class="sellright1" height="25" bgcolor="#FFFFFF"><div align="center" style="color:orange; font-weight:bold;"><u>
                    <?=number_format($Total,2)?>
                  </u> บาท</div></td>
                </tr>
                <tr>
                  <td class="sellright1" height="50" colspan="5" align="center" bordercolor="orange" bgcolor="orange"><p><span style="border:0px;"><span style="text-align:right; padding-top:5px;"> </span>
                    <input  type="submit" name="complete" value="ยืนยันการสั่งซื้อ" />
                    <input name="btn_add"  type="submit" id="btn_add" value="ย้อนกลับ" />
                    <input type="hidden" name="total_price" value="<?=$Total?>" />
</span><span style="text-align:center; padding-top:5px;">
<input type="hidden" name="EmsID" value="<?=$_GET['EmsID']?>" />
</span></p></td>
                </tr>
              </table>
            </form>
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
        <span style="padding-top:30px; text-align:center; font-size:11px; ">
        <?php
		
	
if($_POST){
	
	 if($_POST['btn_add']){
				echo "<meta http-equiv='refresh' content='0; url=basket_product.php?ID=".$_GET['ID']."'>";
				exit();
			}else if($_POST['complete']){
							
					include "connect_db.php";
					$sql_select = mysqli_query($con,"SELECT * FROM ".$member." WHERE mb_id='".$_SESSION['sess_mb_id']."'");
					$result = mysqli_fetch_array($sql_select);
					
$status = "Y";
$date_now = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
$sql_add = mysqli_query($con,"INSERT INTO ".$order." VALUES "
		."(0,
		'".$_POST['EmsID']."',  
		'".$result['mb_id']."', 
		'".$result['mb_name']."', 
		'".$result['mb_tel']."', 
		'".$_POST['total_price']."', 
		'".$date_now."',
		'".$status."')");
					
					$sql_row = mysqli_query($con,"SELECT max(ord_id) FROM ".$order."");
					$row = mysqli_fetch_row($sql_row);
					$status = 'N';
					$approve=0;
					
for($i=0;$i<count($_SESSION['sess_id']);$i++){
					$sql_add2 = mysqli_query($con,"INSERT INTO ".$order_detail." VALUES
					
				   ('".$row[0]."', 
					'".$_SESSION['sess_id'][$i]."', 
					'".$_SESSION['sess_num'][$i]."',
					'".$approve."',
					'".$_SESSION['sess_price'][$i]."',
					'".$status."')");
					}
					
					unset($_SESSION['sess_id']);
					unset($_SESSION['sess_name']);
					unset($_SESSION['sess_price']);
					unset($_SESSION['sess_num']);
					unset($_SESSION['sess_Total']);
 
 
 
					
					echo "<script>alert('บันทึกข้อมูลการสั่งซื้อเรียบร้อยแล้ว')</script>";
					echo "<meta http-equiv='refresh' content='0; url=print.php?ID=".$row[0]."'>";
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
