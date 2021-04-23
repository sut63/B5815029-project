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
                <h2></h2>
              </div>
              <p>
  
              </p>
              <p>&nbsp;</p>

<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
 <?PHP 
	 //ติดต่อฐานข้อมูล
	 include "connect_db.php";
	 $sql_num = mysqli_query("SELECT * FROM ".$board_question."");
	$num = mysqli_num_rows($sql_num);
	 ?>
<tr>

              </samp> 
              <div style="padding:10px; font-size:15px; font-weight:bold; color:#FF0000; border-bottom: 1px solid #eee;">
	 <form id="form1" name="form1" method="post" action="board.php">
		หัวข้อกระทู้ : 
		<input name="txtSearch" type="text" id="txtSearch" style="width: 300px;" />
		<input type="submit" name="Submit" value="ค้าหา" />
	</form>
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
