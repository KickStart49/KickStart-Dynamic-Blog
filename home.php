<?php 
include("include/db.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
</head>
<body> 

<!--****************************************************Menu*********************************************-->
<!--****************************************************Menu*********************************************-->
<div>
<nav class="navbar navbar-expand-lg fixed-top">
  <a class="navbar-brand" href="admin">
    <img src="images/prahar.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Admin
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 mynav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search">
      <button class="btn btn-default my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</div>
<!--****************************************************Main*********************************************-->
<!--****************************************************Main*********************************************-->
<br><br><br>
<div class="cotainer-fluid">

	<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h1 class="text">My Blogs</h1>
	<br>	
<?php
$execute=mysqli_query($connect,"SELECT * FROM admin");
$rows = mysqli_num_rows($execute);

while($datarow = mysqli_fetch_array($execute)){
	$id = $datarow["id"];
	$name = $datarow["name"];
	$date = $datarow["date"];
	$creatorname = $datarow["creatorname"];
	$image = $datarow["image"];
	$title = $datarow["title"];
	$post = $datarow["post"];

if(strlen($post)>150){
	$post = substr($post,0,150).'.....';
}

	echo "<div class='jumbotron'>
  		<h1 class='display-8'>".$title."</h1>
  			<p class='lead'><img src='uploads/".$image."'></p>
  			<p>Category : ".$name." Published on : ".$date." By ".$creatorname."</p>
  			<hr class='my-8'>
  			<p class='post'>".$post."</p>
  			<a href='showpost?id=".$id."'><button class='btn btn-dark'>Read More</button></a>
	</div>";
			
}
?>

</div>
</div>
</div>
	


</body>
</html>