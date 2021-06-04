<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?PHP
//ติดต่อฐานข้อมูล
	 include "connect_db.php";
	 
	$_GET['ans_id']; 
	$_GET['ID'];
	$_GET['question_id'];
	
	if(!$_GET['question_id']==""){
		$sql_del1 = mysqli_query($con,"DELETE FROM ".$board_question."  WHERE topic_id='".$_GET['question_id']."'");
		$sql_del2 = mysqli_query($con,"DELETE FROM ".$board_answer."  WHERE ans_IDtopic='".$_GET['question_id']."'");
		
	}else if(!$_GET['ans_id']==""){
		$sql_del3 = mysqli_query($con,"DELETE FROM ".$board_answer."  WHERE ans_id='".$_GET['ans_id']."'");
	}
	
	
	if(isset($_GET['ans_id'])){
			echo "<script>alert('คุณได้ลบข้อมูลกระทู้แล้ว')</script>";
			echo "<meta http-equiv='refresh' content='0; url=title_board_admin.php?m_page=".$_GET['m_page']."&ID=".$_GET['ID']."'>";
	}else{
			echo "<script>alert('คุณได้ลบกระทู้คำถามแล้ว')</script>";
			echo "<meta http-equiv='refresh' content='0; url=admin_board.php?m_page=".$_GET['m_page']."'>";
	}
	
	unset($_GET['ans_id']);
?>
</body>
</html>
