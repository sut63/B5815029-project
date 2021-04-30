<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
include "session_user.php";

$product_id=$_GET['ID'];
$num = $_GET['txt_num'];
$page = $_GET['page'];







if(count($_SESSION['sess_id'])=="0"){ 
	 $check=1;
//ค้นหาว่ามีข้อมูลรหัสสินค้าอยู่ใน sess_id หรือไม่ ถ้าไม่มีให้ check เท่ากับ 1
}else if (!in_array($_GET['ID'], $_SESSION['sess_id'])){
	 $check=1;
}






if($check==1){
		
		include "connect_db.php";
		$sql = mysqli_query($con,"SELECT * FROM ".$product." WHERE prd_id='".$_GET['ID']."'");
		$rs1=mysqli_fetch_array($sql);
		
		
		$_SESSION['sess_id'][]=$rs1['prd_id']; 
		$_SESSION['sess_name'][]=$rs1['prd_name'];
		$_SESSION['sess_price'][]=$rs1['prd_price'];
		 $_SESSION['sess_num'][]=1;
		}

echo "<meta http-equiv='refresh' content='0 ;url=basket_product.php?ID=".$_GET['ID']."'>";
?>

