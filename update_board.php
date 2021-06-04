<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?PHP 
			 include "connect_db.php";
			 if(!$_GET['ID']==""){
			  $sql_select = mysqli_query($con,"SELECT * FROM ".$board_question." WHERE topic_id='".$_GET['ID']."'");
			  $result = mysqli_fetch_array($sql_select);
							$num = $result['topic_num']+1;		
								
			  $sql_update = mysqli_query($con,"UPDATE ".$board_question." SET topic_num='".$num."' WHERE topic_id='".$_GET['ID']."'");
			
			echo "<meta http-equiv='refresh' content='0; url=title_board.php?ID=".$_GET['ID']."'>";
			  }else if(!$_GET['question_id']==""){
			  echo "<meta http-equiv='refresh' content='0; url=title_board_admin.php?m_page=".$_GET['m_page']."&ID=".$_GET['question_id']."'>";
			  }
		?>
</body>
</html>
