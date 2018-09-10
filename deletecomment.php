<?php
include("include/db.php");
session_start();
	$id = $_GET['id'];
	$sql = "DELETE FROM comments WHERE id=".$id;
if(mysqli_query($connect, $sql)){
		$_SESSION["Success_Message"]="Comment deleted Successfully";
	}			
	else{
		$_SESSION["Error_Message"]="Delete Error";
	}
	

echo '<script type="text/javascript">location.href = "admin";
</script>';

?>