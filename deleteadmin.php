<?php
include("include/db.php");
session_start();
	$id = $_GET['id'];
	$sql = "DELETE FROM register WHERE id=".$id;
if(mysqli_query($connect, $sql)){
		$_SESSION["Success_Message"]="Admin deleted Successfull";
	}			
	else{
		$_SESSION["Error_Message"]="Delete Admin Error";
	}
	

echo '<script type="text/javascript">location.href = "admin";
</script>';

?>