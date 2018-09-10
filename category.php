<?php
include("include/db.php");
if(isset($_POST["submit"])){
	$category = $_POST["category"];
	$uname=$_GET["uname"];
	if(empty($category)){
		session_start();
		$_SESSION["Error_Message"]="PLEASE FILL OUT CATEGORY";

	}else{
		$date = date("Y/m/d");
	
	$creatorname = $uname;
	
	$execute1=mysqli_query($connect,"INSERT INTO category(date,name,creatorname)VALUES('$date','$category','$creatorname')");
	if($execute1){
		$_SESSION["Success_Message"]="Record updated successfully";
	}			
	else{
		$_SESSION["Error_Message"]="not updated successfully";
	}
	}
	
	
	

echo '<script type="text/javascript">location.href = "admin";
</script>';
}
?>