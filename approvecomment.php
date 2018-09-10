<?php
include("include/db.php");
session_start();
	$id = $_GET['id'];
	$status="on";
	$sql = "UPDATE comments SET status='$status' WHERE id=".$id;
if(mysqli_query($connect, $sql)){
		$_SESSION["Success_Message"]="Approved Successfull";
	}			
	else{
		$_SESSION["Error_Message"]="Approve Error";
	}
	

echo '<script type="text/javascript">location.href = "admin";
</script>';

?>