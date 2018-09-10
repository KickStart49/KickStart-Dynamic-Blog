<?php 
include('include/db.php');
$email = $_POST["email"];
$password = $_POST["password"];
session_start();
if(isset($_POST["submit"])){
	if(empty($email) || empty($password)){
		$_SESSION["Load Error Message"] = "Please Fill Out All Fields";
		echo '<script type="text/javascript">location.href = "login";
				</script>';
	}
	else{
		$query = "SELECT * FROM register WHERE email = '$email' AND password = '$password'";
		$execute=mysqli_query($connect,$query);
		
		if($execute){
			if($dr=mysqli_fetch_array($execute)){
			$uid = $dr["id"];
			$uname = $dr["name"];
			$uemail = $dr["email"];
			}
			$_SESSION["User_Id"] = $uid;
			$_SESSION["User_Name"] = $uname;
			$_SESSION["User_Email"] = $uemail;

			$_SESSION["Success_Message"] = "Welcome ".$uname." !";
			echo '<script type="text/javascript">location.href = "admin";
				</script>';
		}
		else{
		$_SESSION["Load Error Message"] = "Something Went Wrong";
		echo '<script type="text/javascript">location.href = "login";
				</script>';
		}
	}
}

?>