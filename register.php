<?php
include("include/db.php");
if(isset($_POST["submit"])){
	$name = $_POST["name"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	
	if(empty($name) || empty($email) || empty($password)){
		session_start();
		$_SESSION["Error_Message"]="PLEASE FILL OUT ALL FIELDS";

	}else{
		$date = date("Y/m/d");
	
	$execute1=mysqli_query($connect,"INSERT INTO register(date,name,email,password)VALUES('$date','$name','$email','$password')");
	if($execute1){
		$_SESSION["Success_Message"]="Admin added successfully";
	}			
	else{
		$_SESSION["Error_Message"]="not added successfully";
	}
	}
	
	
	

echo '<script type="text/javascript">location.href = "admin";
</script>';
}
?>