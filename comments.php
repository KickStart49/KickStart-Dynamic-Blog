<?php
include("include/db.php");
session_start();
if(isset($_POST["submit"])){
	$name = $_POST["name"];
	$email =$_POST["email"];
	$comment = $_POST["comment"];
	$status="off";
	$id=$_GET['id'];
	if(empty($name) || empty($email) || empty($comment)){
		
		$_SESSION["Error_Message"]="PLEASE FILL OUT ALL FIELDS OF COMMENT";
	}
	else{
		


	$date = date("Y/m/d");
	
	$execute1=mysqli_query($connect,"INSERT INTO comments(date,name,email,comment,status,admin_id)VALUES('$date','$name','$email','$comment','$status','$id')");
	if($execute1){
		$_SESSION["Success_Message"]="Comment added successfully";
	}			
	else{
		$_SESSION["Error_Message"]="Comment update error";
	}
	


	}
echo '<script type="text/javascript">location.href = "showpost?id='.$id.'";
</script>';	
}
?>