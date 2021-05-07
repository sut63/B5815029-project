<?PHP
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>ใบจัดซื้อสินค้า</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="images/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="slimbox/js/slimbox2.js"></script>
<link rel="stylesheet" href="slimbox/css/slimbox2.css" type="text/css" media="screen" />
<style type="text/css">
h1, h2, h3, h4, h5, h6, ul, ol, hr, p,form {
	padding: 0;
	margin: 0;
	}
	body {
	height:auto;
	margin: auto;
	padding-right: 3px;
	font-family:Tahoma, Vernada, Arial, Helvetica, sans-serif;
	font-size: 13px;
}
table {
	border: 0px;
}
#PrintMember {
display:block; 
width:800px; 
height:auto;
margin: 0 auto;
text-align:left; 
padding-top:20px;
padding-bottom: 10px;
}
#PrintMember a:link {
text-decoration: none;
}
table td.sell {
border-left: 1px dotted #666;
border-top: 1px dotted #666;
border-bottom: 1px dotted #666;
}
table td.sellright {
border-left: 1px dotted #666;
border-top: 1px dotted #666;
border-bottom: 1px dotted #666;
border-right: 1px dotted #666;
}
table td.sell1 {
border-left: 1px dotted #666;
border-bottom: 1px dotted #666;
}
table td.sellright1 {
border-left: 1px dotted #666;
border-bottom: 1px dotted #666;
border-right: 1px dotted #666;
}


</style>
</head>
<body style="background:#fafafa; padding-top: 20px;">
 <iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="PopCalendarXP/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
<?PHP
	include "connect_db.php";
	include "function.php";
	$sql_select1 = mysqli_query($con,"SELECT * FROM ".$order." WHERE ord_id='".$_GET['ID']."'");
	$rs1 = mysqli_fetch_array($sql_select1);
	$status = $rs1['ord_status'];
	
	$sql_select2 = mysqli_query($con,"SELECT * FROM ".$member." WHERE mb_id='".$rs1['ord_idmb']."'");
	$rs2 = mysqli_fetch_array($sql_select2);
	
	
?>




<a href="#"onClick="window.print();"></a></div>
<div style="display:block; border:1px dotted #333; width:800px; height:auto; background:white; margin: 0 auto;">
<div style="display:block; padding:5px; height:auto;">

  	<p style="display:block; padding-top: 10px; font-size:11px; text-align:right; padding-right: 10px;">ใบสั่งซื้อสินค้าเลขที่ : 
    <?=sprintf("%05d",$_GET['ID'])?></p>
 	<div style="padding: 10px; text-align:center; font-size:20px;">
	<?PHP if($status=='Y'){ ?>
                <p>ใบสั่งซื้อสินค้า</p>
                <?php }else if($status=='3'){ ?>
                <p>ใบส่งของ</p>
                 <?php }else if($status=='N'){ ?>
               <p>ใบสั่งซื้อสินค้า ยกเลิกแล้ว</p>
                <?php } ?>
 	  
 	  <p style="font-size:13px;">
	  <?PHP include "footer.php"; ?>
	   </p>
 	</div>
	<table width="100%" height="24" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="75%" height="24" align="right" valign="middle"><div style="padding-right: 120px;"></div></td>
        <td width="25%" height="24" align="left" valign="middle"> <p style="display:block;  font-size:11px; text-align:right; padding-right: 10px;">วันที่ : 
       <?=displaydate($rs1['ord_date'])?></p></td>
      </tr>
    </table>
	<div style="border-top: 2px dotted #999;"></div>
	<table width="100%" height="60" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="40" align="center" valign="middle"><div style="padding-top: 10px; font-weight: bold; font-size:14px;">ข้อมูลผู้สั่งซื้อสินค้า</div></td>
      </tr>
      <tr>
        <td height="25" align="center" valign="middle"><div style="padding: 10px; text-align:center;"><strong>ชื่อ - สกุล :</strong> 
        <?=$rs2['mb_name']?> 
        <strong>ที่อยู่ :</strong> 
        <?=$rs2['mb_address']?> 
        <strong>เบอร์โทร :</strong> 
        <?=$rs2['mb_tel']?>
        <strong> อีเมล์ :</strong> 
        <?=$rs2['mb_email']?></div></td>
      </tr>
    </table>
	<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#ECE9D8" bgcolor="#F5F5F5">
      <tr>
        <td class="sell" width="10%" height="30" bgcolor="#CCCCCC"><div align="center"><strong>รหัสสินค้า</strong></div></td>
        <td width="51%" height="30" bgcolor="#CCCCCC" class="sell"><div align="left" style="padding-left: 5px;"><strong>รายการสินค้าที่เลือก</strong></div></td>
        <td class="sell"  width="10%" bgcolor="#CCCCCC"><div align="center"><strong>จำนวน</strong></div></td>
        <td class="sell"  width="13%" bgcolor="#CCCCCC"><div align="center"><strong>ราคา/หน่วย</strong></div></td>
        <td class="sellright"  width="16%" height="30" bgcolor="#CCCCCC"><div align="center"><strong>ราคารวม</strong></div></td>
      </tr>

<?PHP
include "connect_db.php";
	$ii=1;
	$sql_select3 = mysqli_query($con,"SELECT * FROM ".$product.", ".$order_detail."  WHERE prd_id=od_id_prd AND od_id_ord='".$_GET['ID']."' ");
		while($rs3 = mysqli_fetch_array($sql_select3)){
				$code = sprintf("%05d",$rs3['prd_id']);
				$total_unit = ($rs3['od_num'] * $rs3['od_price']);
				$name = $rs3['prd_name'];
				$num = $rs3['od_num'];
				$price = $rs3['od_price'];
			
	?>
      <tr>
        <td  class="sell1" height="30" bgcolor="#FFFFFF"><div style="text-align:center;">
            <?=$code?>
        </div></td>
        <td height="30" bgcolor="#FFFFFF" class="sell1"><div style="padding-left: 5px;"><?=$name?></div></td>
        <td class="sell1" bgcolor="#FFFFFF"><div align="center"><span style="padding-left: 5px;">
          <?=$num?>
        </span></div></td>
        <td class="sell1" height="30" bgcolor="#FFFFFF"><div align="center"><span style="padding-left: 5px;">
          <?=number_format($price,2)?>
        </span> บาท </div></td>
        <td class="sellright1" height="30" bgcolor="#FFFFFF"><div align="center"><? echo "".number_format($total_unit,2).""; ?> บาท </div></td>
      </tr>
      <?php 
		   $total_price = $total_price + $total_unit;
			} 
			?>
	<tr>
        <td class="sell1" height="25" bordercolor="#F5F5F5" bgcolor="#FFFFFF"><div align="right"></div></td>
        <td height="25" bordercolor="#F5F5F5" bgcolor="#FFFFFF" class="sell1">&nbsp;</td>
        <td class="sell1" height="25" bordercolor="#F5F5F5" bgcolor="#FFFFFF">&nbsp;</td>
        <td class="sell1" height="25" bordercolor="#F5F5F5" bgcolor="#FFFFFF">&nbsp;</td>
        <td class="sellright1" height="25" bgcolor="#FFFFFF">&nbsp;</td>
	 </tr>
	 <tr>
        <td class="sell1" height="25" bordercolor="#F5F5F5" bgcolor="#FFFFFF"><div align="right"></div></td>
        <td height="25" bordercolor="#F5F5F5" bgcolor="#FFFFFF" class="sell1">&nbsp;</td>
        <td class="sell1" height="25" bordercolor="#F5F5F5" bgcolor="#FFFFFF">&nbsp;</td>
        <td class="sell1" height="25" bordercolor="#F5F5F5" bgcolor="#FFFFFF">&nbsp;</td>
        <td class="sellright1" height="25" bgcolor="#FFFFFF">&nbsp;</td>
	 </tr>
      <tr>
        <td height="25" colspan="4" align="center" valign="middle" bordercolor="#F5F5F5" bgcolor="#FFFFFF" class="sell1"><div align="right"><b>รวมราคา : </b></div></td>
        <td class="sellright1" height="25" bgcolor="#FFFFFF"><div align="center"><u>
          <?=number_format($total_price,2)?>
        </u> บาท</div></td>
      </tr>
	  <tr>
	   <?PHP
					include "connect_db.php";
					$sql_EMS = mysqli_query($con,"SELECT * FROM ems WHERE ems_id = '".$rs1['ord_idems']."'");
					$rs = mysqli_fetch_array($sql_EMS);
					$ems_name = $rs['ems_name'];
					 $ems_price = $rs['ems_price'];
					 
					 $Total = $total_price+$ems_price;
				 ?>
        <td height="25" colspan="4" align="center" valign="middle" bordercolor="#F5F5F5" bgcolor="#FFFFFF" class="sell1"><div align="right"><b><strong>จัดส่งแบบ</strong>
              <?=$ems_name?>
: </b></div></td>
        <td class="sellright1" height="25" bgcolor="#FFFFFF"><div align="center"><u>
          <?=number_format($ems_price,2)?>
        </u>บาท</div></td>
      </tr>
      <tr>
        <td class="sell1" height="25" colspan="4" bordercolor="#F5F5F5" bgcolor="#FFFFFF"><div align="right"><b>ยอดรวมที่ต้องชำระ : </b></div></td>
        <td class="sellright1" height="25" bgcolor="#FFFFFF"><div align="center" style="color:black; font-weight:bold;"><u>
            <?=number_format($Total,2)?>
        </u> บาท</div></td>
      </tr>
    </table>
	<p>&nbsp;</p>
	
  </div>
</div>
 


</body>
</html>
