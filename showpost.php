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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
 
</head>
<body> 

<!--****************************************************Menu*********************************************-->
<!--****************************************************Menu*********************************************-->

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
$id=$_GET['id'];

$execute=mysqli_query($connect,"SELECT * FROM admin WHERE id = ".$id);
$rows = mysqli_num_rows($execute);

if($datarow = mysqli_fetch_array($execute)){
	$id = $datarow["id"];
	$name = $datarow["name"];
	$date = $datarow["date"];
	$creatorname = $datarow["creatorname"];
	$image = $datarow["image"];
	$title = $datarow["title"];
	$post = $datarow["post"];

	echo "<div class='jumbotron'>
  		<h1 class='display-4'>".$title."</h1>
  			<p class='lead'><img src='uploads/".$image."'></p>
  			<p>Category : ".$name." Published on : ".$date." By ".$creatorname."</p>
  			<hr class='my-4'>
  			<p class='post text-center'>".$post."</p>
        <br>
          <h1 class='display-8'>Comments</h1><br><br>";
	}
?>
<div class="demo">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
<div id="testimonial-slider" class="owl-carousel">
<?php    				

$execute1=mysqli_query($connect,"SELECT * FROM comments WHERE admin_id = ".$id);

while($dr = mysqli_fetch_array($execute1)){
  $name = $dr["name"];
  $date = $dr["date"];
  $email = $dr["email"];
  $comment = $dr["comment"];
  $status = $dr["status"];
  
  if($status=="on"){
    echo '<div class="testimonial">
                        <div class="testimonial-content">
                            <div class="testimonial-icon">
                                <i class="fa fa-quote-left"></i>
                            </div>
                            <p class="description">
                               '.$comment.'
                            </p>
                        </div>
                        <h3 class="title">'.$name.'</h3>
                        <span class="post">Published on : '.$date.'</span>
                    </div>';
  }
  
             

}
?>
</div></div></div></div></div>
<?php echo" 
 <form id='form' action='comments?id=".$id."' method='post' enctype='multipart/form-data'> ";?>
          
          <h3>Add New Comment</h3>
              <div class="form-group">
                <label for="name">Name</label>
                <input type="name" name="name" class="form-control form-control-md" id="name" aria-describedby="name" placeholder="Enter New Post">
                
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control form-control-md" id="email" aria-describedby="email" placeholder="Enter New Post">
                
              </div>

              <div class="form-group">
              <label for="comment">Comment</label>
              <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
              </div>
 
              <button type="submit" name="submit" class="btn btn-dark">Submit</button>
              <br>
              <br>
          </form>
        </div>
</div>
</div>
</div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
 <script>
$(document).ready(function(){
    $("#testimonial-slider").owlCarousel({
        items:3,
        itemsDesktop:[1000,3],
        itemsDesktopSmall:[980,2],
        itemsTablet:[768,2],
        itemsMobile:[650,1],
        pagination:true,
        navigation:false,
        slideSpeed:1000,
        autoPlay:true
    });
});</script>
</body>
</html>