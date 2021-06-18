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
</style>
</head>
<body id="Page1">
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
              <h2>ข้อมูลใบสั่งซื้อสินค้า </h2>
          </div>
		    <table width="99%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="1%" align="left" valign="middle">&nbsp;</td>
                <td width="99%" height="40" align="left" valign="middle">
				<form id="form1" name="form1" method="post" action="admin_main.php?m_page=<?=$_GET['m_page']?>" style="margin:10px;">
                    <strong>รหัสใบสั่งซื้อ</strong> :
                  <input name="txtSearch" type="text" id="txtSearch" style="width: 30%;" />
                    <input type="submit" name="Submit" value="ค้นหา" />
                </form></td>
              </tr>
              <tr>
                <td align="left" valign="middle">&nbsp;</td>
                <td height="30" align="left" valign="middle"><?php  
			include "connect_db.php";
$link= $connect;
?>
                    <?php     
// สร้างฟังก์ชั่น สำหรับแสดงการแบ่งหน้า     
function page_navigator($before_p,$plus_p,$total,$total_p,$chk_page){     
    global $urlquery_str;  
	global $id_type;
    $pPrev=$chk_page-1;  
    $pPrev=($pPrev>=0)?$pPrev:0;  
    $pNext=$chk_page+1;  
    $pNext=($pNext>=$total_p)?$total_p-1:$pNext;       
    $lt_page=$total_p-4;  
    if($chk_page>0){    
        echo "<a  href='?s_page=$pPrev&urlquery_str=".$urlquery_str."' class='naviPN'>Prev</a>";  
    }  
    if($total_p>=11){  
        if($chk_page>=4){  
            echo "<a $nClass href='?s_page=0&urlquery_str=".$urlquery_str."'>1</a><a class='SpaceC'>. . .</a>";     
        }  
        if($chk_page<4){  
            for($i=0;$i<$total_p;$i++){    
                $nClass=($chk_page==$i)?"class='selectPage'":"";  
                if($i<=4){  
                echo "<a $nClass href='?s_page=$i&urlquery_str=".$urlquery_str."'>".intval($i+1)."</a> ";     
                }  
                if($i==$total_p-1 ){   
                echo "<a class='SpaceC'>. . .</a><a $nClass href='?s_page=$i&urlquery_str=".$urlquery_str."'>".intval($i+1)."</a> ";     
                }         
            }  
        }  
        if($chk_page>=4 && $chk_page<$lt_page){  
            $st_page=$chk_page-3;  
            for($i=1;$i<=5;$i++){  
                $nClass=($chk_page==($st_page+$i))?"class='selectPage'":"";  
                echo "<a $nClass href='?s_page=".intval($st_page+$i)."'>".intval($st_page+$i+1)."</a> ";      
            }  
            for($i=0;$i<$total_p;$i++){    
                if($i==$total_p-1 ){   
                $nClass=($chk_page==$i)?"class='selectPage'":"";  
                echo "<a class='SpaceC'>. . .</a><a $nClass href='?s_page=$i&urlquery_str=".$urlquery_str."'>".intval($i+1)."</a> ";     
                }         
            }                                     
        }     
        if($chk_page>=$lt_page){  
            for($i=0;$i<=4;$i++){  
                $nClass=($chk_page==($lt_page+$i-1))?"class='selectPage'":"";  
                echo "<a $nClass href='?s_page=".intval($lt_page+$i-1)."'>".intval($lt_page+$i)."</a> ";     
            }  
        }          
    }else{  
        for($i=0;$i<$total_p;$i++){    
            $nClass=($chk_page==$i)?"class='selectPage'":"";  
            echo "<a href='?s_page=$i&urlquery_str=".$urlquery_str."' $nClass  >".intval($i+1)."</a> ";     
        }         
    }     
    if($chk_page<$total_p-1){  
        echo "<a href='?s_page=$pNext&urlquery_str=".$urlquery_str."'  class='naviPN'>Next</a>";  
    }  
}     
?>
                    </p>
                    <ul class="none">
                      <?php  
 if($_POST){
		$Search = number_format($_POST['txtSearch']); 
}

$q="SELECT * FROM ".$order."  WHERE(ord_id LIKE '%".$Search."%'  AND ord_status IN('Y', '1', '2', '3', '4', '5', '6', 'N') ) ORDER BY ord_status DESC";  
$qr=mysqli_query($con,$q);  
$total=mysqli_num_rows($qr);  


if(!isset($_GET['s_page'])){     
    	$_GET['s_page']=0;     
		
		}else{     
    		$chk_page=$_GET['s_page'];       
 			   $_GET['s_page']=$_GET['s_page']*$e_page;     
		}  
			   
	$q.=" LIMIT ".$_GET['s_page'].",$e_page";  
	$qr=mysqli_query($con,$q);
	  
	if(mysqli_num_rows($qr)>=1){     
    $plus_p=($chk_page*$e_page)+mysqli_num_rows($qr);     
		}else{     
    $plus_p=($chk_page*$e_page);         
	}    
	 
$total_p=ceil($total/$e_page);     
$before_p=($chk_page*$e_page)+1;   
?>
                      <?php  //	ถ้าไม่มีข้อมูล
		if($total==0){
			echo "<div style='padding-top: 20px; color: red;'><h1>ไม่มีข้อมูล</h1></div>";
				}else{
		?>
                      <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="12%" height="30" align="center" valign="middle" bgcolor="yellow" class="sell"><strong>ใบสั่งซื้อ</strong></td>
                          <td width="34%" height="30" align="left" valign="middle" bgcolor="yellow" class="sell"><strong style="padding-left: 5px;">รายชื่อผู้สั่งซื้อ</strong></td>
                          <td width="13%" height="30" align="center" valign="middle" bgcolor="yellow" class="sell"><strong>ราคา</strong></td>
                          <td width="15%" height="30" align="center" valign="middle" bgcolor="yellow" class="sell"><strong>สถานะ</strong></td>
                          <td width="11%" height="30" align="center" valign="middle" bgcolor="yellow" class="sell"><strong>ข้อมูล</strong></td>
                          <td width="15%" height="30" align="center" valign="middle" bgcolor="yellow" class="sellright"><strong>  ยกเลิก </strong></td>
                        </tr>
                        <?php
	}							
  $no = $before_p; 
  $i=0;


				?></td>
          <td width="11%" height="20" align="center" valign="middle" bgcolor="#F0F0F0" class="sell1"> 
				   [<a href="print.php?m_page=<?=$_GET['m_page']?>&ID=<?=$Result['ord_id']?>&amp;ord=101">รหัสใบสั่งซื้อ</a>]
				   </td>
                   <td width="15%" height="20" align="center" valign="middle" bgcolor="#F0F0F0" class="sellright1"> 
				   [<a href="cancle_order.php?m_page=<?=$_GET['m_page']?>&ID_admin=<?=$Result['ord_id']?>" onclick=" return confirm('ยกเลิกใบสั่งซื้อ <?=$code?> ')">ชื่อ</a> |
				
     
				   [<a href="print.php?m_page=<?=$_GET['m_page']?>&ID=<?=$Result['ord_id']?>&amp;ord=101">ข้อมูล</a>]
				   </td>
                   <td width="15%" height="20" align="center" valign="middle" bgcolor="#F0F0F0" class="sellright1"> 
				   [<a href="cancle_order.php?m_page=<?=$_GET['m_page']?>&ID_admin=<?=$Result['ord_id']?>" onclick=" return confirm('ยกเลิกใบสั่งซื้อ <?=$code?> ')">ราคา</a> |
					<a href="del_order.php?m_page=<?=$_GET['m_page']?>&ID_admin=<?=$Result['ord_id']?>" onclick=" return confirm('ลบใบสั่งซื่้อ <?=$code?> ออกจากระบบ')">ลบ</a>] 
                   <td width="11%" height="20" align="center" valign="middle" bgcolor="#F0F0F0" class="sell1"> 
				   [<a href="print.php?m_page=<?=$_GET['m_page']?>&ID=<?=$Result['ord_id']?>&amp;ord=101">ข้อมูล</a>]
				   </td>
                   <td width="15%" height="20" align="center" valign="middle" bgcolor="#F0F0F0" class="sellright1"> 
				   [<a href="cancle_order.php?m_page=<?=$_GET['m_page']?>&ID_admin=<?=$Result['ord_id']?>" onclick=" return confirm('ยกเลิกใบสั่งซื้อ <?=$code?> ')">ยกเลิก</a> |
					<a href="del_order.php?m_page=<?=$_GET['m_page']?>&ID_admin=<?=$Result['ord_id']?>" onclick=" return confirm('ลบใบสั่งซื่้อ <?=$code?> ออกจากระบบ')">ลบ</a>] 
   </td>
                 </tr>
                        </li>
                        <?PHP $no++; $i++?>
                       
                      </table>
                    </ul>
                    <?php if($total>0){ ?>
                   
 
                    </div>
                  <?php } ?>
                  
              
            </table></td>
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
