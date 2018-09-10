<?php

include("session.php");
if(check()=="true"){
  echo '<script type="text/javascript">location.href = "admin";
        </script>';
}else{
  
}
?>

<html>
<head>
	<title>Admin Project</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/home.css">
</head>
<body>
	
	<form class="middle col-md-4 align-items-center" id="form" action="loginadmin" method="post">
    <br>
  	<div class="form-group">
    	<label for="exampleInputEmail1">Email address</label>
    		<input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    		<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  	</div>
  	<div class="form-group">
   	 	<label for="exampleInputPassword1">Password</label>
    	<input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
  	</div>
  	
  	<button type="submit" name="submit" class="btn btn-dark">Submit</button>
    <br><br>
    <?php echo message(); ?>
	</form>

</body>
</html>	



