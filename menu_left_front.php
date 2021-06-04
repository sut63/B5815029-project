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
 <html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.dropbtn {
  background-color: #FF9900;
  color: black;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: white;
}

#myInput {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
}

#myInput:focus {outline: 3px solid #ddd;}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 230px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: white;}

.show {display: block;}
</style>
</head>
<body>


<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">ค้นหาสินค้า</button>
  <div id="myDropdown" class="dropdown-content">
    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
    <a href="#about">กีต้าร์</a>
    <a href="#base">กลอง</a>
    <a href="#blog">คีบอร์ด</a>
    <a href="#contact">Accessorie</a>
    <a href="#custom">เเอมป์</a>

  </div>
</div>

<script>

function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
</script>

</body>
</html>

  
        
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

</div> 
<a href="logout.php"> ออกจากระบบ </a>
<br />

		
		  </ul>
		<?php  } ?>
</p> </td>
		

     


<p>&nbsp;</p>
		<p>&nbsp;</p>
		