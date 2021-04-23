<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<table width="185" border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<div class="title_data_type" style="margin-top: 5px;"><b> หมวดเลือกสินค้า</b></div>
<ul class="ul_type" style="list-style:none;">
 <?php
include "connect_db.php";
	$sql_select = mysqli_query($con,"SELECT * FROM ".$product_type." ORDER BY type_id ASC");
		while($result = mysqli_fetch_array($sql_select)){
?>
		<li id="li_type"><a href="type_product.php?type_id=<?php echo $result['type_id']; ?>">
		 <?php echo  $result['type_name']; ?> </a></li>
<?php
}
?>
 </ul> 
        
</td>
 </tr>     
</table>
<br />
		<?php if($_SESSION['sess_mb_id']==""){ ?>
		
  	<div class="title_data_type"><strong> ลงชื่อเข้าระบบ </strong></div>
	 
	 <form method="post" action="check_password.php" name="from_login1"  id="from_login1" onSubmit="return chk_txt();" style="padding-top: 5px; margin-left: 0px;">
           <table width="100%" border="0" cellpadding="0" cellspacing="0">
         <tr>
                   <td height="25" align="left" valign="middle" style="text-align:left; padding-left: 18px;">
				   <div style="font-size: 10px;">ชื่อเข้าใช้ระบบ</div>
				   <input name="txt_user" type="text" id="txt_user" style="width: 92%; background:#FFF; border:1px solid #ccc;" accesskey="p"/>		   </td>
</tr>
                 <tr>
                   <td height="25" align="left" valign="middle" style="text-align:left; padding-left: 18px;">
				   <div style="font-size: 10px;">รหัสผ่าน</div> 
				   <input name="txt_pass" type="password" id="txt_pass" style="width: 92%; background:#FFF; border:1px solid #ccc;" /></td>
         </tr>
                 <tr>
                   <td height="27" align="left" valign="middle" style="padding-left: 18px;">
				     <input type="submit" name="Login" id="Login" value="เข้าระบบ" class="buttom_login" style="border:1px solid #333; background:#DDD; color:#333;"/>
					 

  				<input type="submit" name="register" id="register" value="สมัครสมาชิก" class="buttom_login" style="border:1px solid #333; background:#DDD; color:#333;"/>

 
				   </td>
         </tr>
				 <?php }else{?>
				   <tr>
                   <td colspan="2" style="border-bottom: 0px solid #ddd;">

<div class="title_data_type">

ยินดีต้อนรับ<br />




<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<!--<b></b><?php echo $_SESSION['sess_mb_name']; ?></div> -->
<a href="logout.php"> ออกจากระบบ </>
<br />

		
<br />

		
		  </ul>
		<?php  } ?>
</p> </td>
                 </tr>
     

</div>

		