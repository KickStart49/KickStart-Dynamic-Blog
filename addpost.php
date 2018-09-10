<?php
include("include/db.php");
session_start();
if(isset($_POST["submit"])){
	$category = $_POST["selectcat"];
	$post = $_POST["post"];
	$title = $_POST["title"];
	$uname = $_GET["uname"];
	
	if(empty($category)){
		
		$_SESSION["Error_Message"]="PLEASE FILL OUT CATEGORY";

	}
	elseif(empty($post)){
		
		$_SESSION["Error_Message"]="PLEASE FILL OUT POST";

	}
	elseif(empty($title)){
		
		$_SESSION["Error_Message"]="PLEASE FILL OUT TITLE";

	}
	else{
		$uploaddir = 'uploads/';
	$upload = $_FILES['upload']['name'];
$target = $uploaddir . basename($_FILES['upload']['name']);


if (move_uploaded_file($_FILES['upload']['tmp_name'], $target)) {
   $_SESSION["Success_Message"]= "File is valid, and was successfully uploaded.";
} else {
    $_SESSION["Error_Message"]="Possible file upload attack!";
}


	$date = date("Y/m/d");
	
	$creatorname = $uname;
	
	$execute1=mysqli_query($connect,"INSERT INTO admin(name,date,creatorname,title,post,image)VALUES('$category','$date','$creatorname','$title','$post','$upload')");
	if($execute1){
		$_SESSION["Success_Message"]="Post added successfully";
	}			
	else{
		$_SESSION["Error_Message"]="Post update error";
	}
	

	}
	

echo '<script type="text/javascript">location.href = "admin";
</script>';
}
?>