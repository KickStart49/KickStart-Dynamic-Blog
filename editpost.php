<?php
include("include/db.php");
session_start();
$id=$_GET['id'];
if($id){
	
if (move_uploaded_file($_FILES['upload']['tmp_name'], $target)) {
   $_SESSION["Success_Message"]= "File is valid, and was successfully uploaded.";
} else {
    $_SESSION["Error_Message"]="Possible file upload attack!";
}


	$date = date("Y/m/d");
	
	$creatorname = "prahar";
	
	$execute1=mysqli_query($connect,"INSERT INTO admin(name,date,creatorname,title,post,image)VALUES('$category','$date','$creatorname','$title','$post','$upload')");
	if($execute1){
		$_SESSION["Success_Message"]="Post added successfully";
	}			
	else{
		$_SESSION["Error_Message"]="Post update error";
	}
	

echo '<script type="text/javascript">location.href = "admin";
</script>';
}
?>