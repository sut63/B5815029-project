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
<body id="Page3">
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
  	  <div class="title"> 
		    <h2><img src="images/plus_48.png" width="48" height="48" /> เพิ่มประเภทสินค้า</h2>
      </div>
	  	  <p>&nbsp;</p>
	  	  <form action="<?PHP $_SERVER['PHP_SELF']?>" method="post"  id="form1"  name="form1" onsubmit="return CHLogIn();">
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="17%" height="25" align="right" valign="middle"><strong>ประเภทสินค้า : </strong></td>
                      <td width="83%" height="25"><input name="txt_name" type="text" id="txt_name"  style="width: 70%;"/></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" valign="middle">&nbsp;</td>
                      <td height="25"><input type="submit" name="Submit2" value="บันทึกข้อมูล" /></td>
                    </tr>
                  </table>
                  <script language="JavaScript" type="text/javascript">
				  	function CHLogIn(){
					
						if(document.form1.txt_name.value==""){
									alert("กรุณากรอกข้อมูล ประเภทสินค้าด้วยนะ");
									document.form1.txt_name.focus();
									return false;
							}else {
									return true;
							}
						
					}
				  </script>
      </form>
	  	  <p>&nbsp;</p>
	  	  <p>&nbsp;</p>
	  	  <div class="title">
            <h2><img src="images/icon-05.png" width="32" height="32" /> รายงานประเภทสินค้า </h2>
      </div>
	  	  <table width="90%" height="650" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="left" valign="top">

	
</div>
<div style="clear:both;"></div>
	   <!-- End menu -->
</div>
	<!-- end Container -->
</body>
</html>
