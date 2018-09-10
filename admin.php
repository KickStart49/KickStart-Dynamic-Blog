<?php 
include("include/db.php");
include("session.php");
$uname = check();
if($uname=="false"){
	echo '<script type="text/javascript">location.href = "login";
				</script>';
}else{
}
$executeoff=mysqli_query($connect,"SELECT status FROM comments WHERE status='on'");
$ra = mysqli_num_rows($executeoff);
$executeon=mysqli_query($connect,"SELECT status FROM comments WHERE status='off'");
$ru = mysqli_num_rows($executeon);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">

<!--****************************************************Menu*********************************************-->
<!--****************************************************Menu*********************************************-->

			<div class="col-2 menu">
				<ul class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<li class="nav-item">
    					<a class="nav-link align-items-center" data-toggle="pill" aria-controls="dashboard" aria-selected="true" href="#dashboard"><?php echo strtoupper($uname); ?></a>
  					</li>
  					<li class="nav-item">
    					<a class="nav-link active" data-toggle="pill" aria-controls="dashboard" aria-selected="true" href="#dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i>   Dashboard</a>
  					</li>
  					<li class="nav-item">
   	 					<a class="nav-link" data-toggle="pill" aria-controls="addpost" aria-selected="false" href="#addpost"><i class="fa fa-plus-square" aria-hidden="true"></i>   Add new Post</a>
  					</li>
  					<li class="nav-item">
    					<a class="nav-link" data-toggle="pill" aria-controls="category" aria-selected="false" href="#category"><i class="fa fa-th" aria-hidden="true"></i>   Categories</a>
  					</li>
  					<?php if($uname == "Prahar"){
  						echo '<li class="nav-item">
   	 					<a class="nav-link" data-toggle="pill" aria-controls="manage" aria-selected="false" href="#manage"><i class="fa fa-lock" aria-hidden="true"></i>   Manage Admins</a>
  					</li>';
  					}?>
  					
  					<li class="nav-item">
   	 					<a class="nav-link" data-toggle="pill" aria-controls="commentsec" aria-selected="false" href="#commentsec"><i class="fa fa-lock" aria-hidden="true"></i>  Comments <span class="badge badge-danger"><?php echo $ru; ?></span></a>
  					</li>
  					<li class="nav-item">
    					<a class="nav-link" aria-selected="false" href="home"><i class="fa fa-rss-square" aria-hidden="true"></i>   Live Blog</a>
  					</li>
  					<li class="nav-item">
   	 					<a class="nav-link" aria-selected="false" href="logout"><i class="fa fa-sign-out" aria-hidden="true"></i>   Logout</a>
  					</li>
				</ul>
			</div>

<!--****************************************************Main*********************************************-->
<!--****************************************************Main*********************************************-->

			<div class="col-10 main">
				<div class="tab-content" id="v-pills-tabContent">

<!--****************************************************Dashboard*********************************************-->
<!--****************************************************Dashboard*********************************************-->

				<div id="dashboard"  class="tab-pane fade show active" role="tabpanel" aria-labelledby="dashboard">
					<div class="jumbotron">
  					<h1 class="display-8">Dashboard</h1>
  					<p class="lead">Welcome to Admin Section.</p>
  					<hr class="my-8">
  					<p>Here You can add or remove different categories,posts,comments.</p>
					</div>
					<table class="table table-hover">
						<?php echo message(); ?> 
  					<thead>
    					<tr>
      						<th scope="col">No.</th>
      						<th scope="col">Admin</th>
      						<th scope="col">Category</th>
      						<th scope="col">Date</th>
      						<th scope="col">Title</th>
      						<th scope="col">Image</th>
      						<th scope="col">Comment</th>
      						<th scope="col">Action</th>
      						<th scope="col">Preview</th>
    					</tr>
  					</thead>
  					<tbody>
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

  $executeoff=mysqli_query($connect,"SELECT status FROM comments WHERE status='on' and admin_id='$id'");
$rad = mysqli_num_rows($executeoff);
$executeon=mysqli_query($connect,"SELECT status FROM comments WHERE status='off' and admin_id='$id'");
$rud = mysqli_num_rows($executeon);


					echo "<tr>
      						<th scope='row'>".$id."</th>
      						<td>".$creatorname."</td>
      						<td>".$name."</td>
      						<td>".$date."</td>
      						<td>".$title."</td>
      						<td><img src='uploads/".$image."'></td>
      						<td><button type=\"button\" class=\"btn btn-default\">
  Approved <span class=\"badge badge-success\">".$rad."</span>
</button><br><br>
<button type=\"button\" class=\"btn btn-default\">
  UnApproved <span class=\"badge badge-danger\">".$rud."</span>
</button></td>
      						<td><a href='editpost?id=".$id."'>Edit</a>/<a href='deletepost?id=".$id."'>Delete</a></td>
      						<td><a href='showpost?id=".$id."'>GO !</a></td>
    					</tr>";
    					
}
?>

    					
  					</tbody>
					</table>

					
				</div>

<!--****************************************************AddPost*********************************************-->
<!--****************************************************AddPost*********************************************-->

				<div id="addpost" class="tab-pane fade" role="tabpanel" aria-labelledby="addpost">
					<div class="jumbotron">
  					<h1 class="display">Add New Post</h1>
  					<p class="lead">Here you can manage the different posts.</p>
  					<hr class="my-4">
  				<?php echo '	
					<form class="col-md-8 align-items-center" id="form" action="addpost?uname='.$uname.'" method="post" enctype="multipart/form-data"	>'; ?>
					<br>
					<div class="form-group">
    				<label for="selectcat">Select Category</label>
    				<select class="form-control" id="selectcat" name="selectcat">
<?php 
$execute=mysqli_query($connect,"SELECT * FROM category");
$rows = mysqli_num_rows($execute);
while($datarow = mysqli_fetch_array($execute)){
$name = $datarow["name"];
echo "<option value=".$name.">".$name."</option>";    					
}
?>
      
    				</select>
  					</div>
  						<div class="form-group">
    						<label for="title">Post Title</label>
    						<input type="title" name="title" class="form-control form-control-md" id="title" aria-describedby="title" placeholder="Enter New Post">
    						
  						</div>

  						<div class="form-group">
    					<label for="upload">Upload Image</label>
    					<input type="file" name="upload" class="form-control-file" id="upload">
  						</div>

  						<div class="form-group">
    					<label for="post">Post</label>
    					<textarea class="form-control" name="post" id="post" rows="10"></textarea>
  						</div>
 
  						<button type="submit" name="submit" class="btn btn-dark">Submit</button>
  						<br>
  						<br>
					</form>
				</div>
				</div>

<!--****************************************************Category*********************************************-->
<!--****************************************************Category*********************************************-->

				<div id="category" class="tab-pane fade" role="tabpanel" aria-labelledby="category">
					
					<div class="jumbotron">

  					<h1 class="display-4">Manage Category!</h1>
  					<p class="lead">Here you can manage different categories on which post depends.</p>
  					<hr class="my-4">
  					
	
					<?php echo '<form class="col-md-4 align-items-center" id="form" action="category?uname='.$uname.'" method="post">'?>
						<br>
  						<div class="form-group">
    						<label for="category">Add new Category</label>
    						<input type="category" name="category" class="form-control form-control-md" id="category" aria-describedby="category" placeholder="Enter category">
    						
  						</div>
  	
  						<button type="submit" name="submit" class="btn btn-dark">Submit</button>
  						<br>
  						<br>
					</form><br><br>
					<table class="table table-hover">
						 
  					<thead>
    					<tr>
      						<th scope="col">No.</th>
      						<th scope="col">Admin</th>
      						<th scope="col">Category_name</th>
      						<th scope="col">Date</th>
      						<th scope="col">Action</th>

    					</tr>
  					</thead>
  					<tbody>
<?php

$execute=mysqli_query($connect,"SELECT * FROM category");
$rows = mysqli_num_rows($execute);

while($datarow = mysqli_fetch_array($execute)){
	$id = $datarow["id"];
	$name = $datarow["name"];
	$date = $datarow["date"];
	$creatorname = $datarow["creatorname"];

					echo "<tr>
      						<th scope='row'>".$id."</th>
      						<td>".$creatorname."</td>
      						<td>".$name."</td>
      						<td>".$date."</td>
      						<td><a href='deletecategory?id=".$id."'>Delete</a></td>
    					</tr>";
    					
}
?>
    					
  					</tbody>
					</table>
				</div></div>

<!--****************************************************Manage*********************************************-->
<!--****************************************************Manage*********************************************-->

				<div id="manage" class="tab-pane fade" role="tabpanel" aria-labelledby="manage">
					<div class="jumbotron">

  					<h1 class="display-4">Manage Admin !</h1>
  					<p class="lead">Here You can manage your Admins.</p>
  					<hr class="my-4">
  					<p>Current Manager : Prahar</p>
	
					<form class="col-md-4 align-items-center" id="form" action="register" method="post">
						<br>
  						<div class="form-group">
    						<label for="name">Add new Admin</label>
    						<input type="name" name="name" class="form-control form-control-md" id="name" aria-describedby="name" placeholder="Enter admin name">
    						
  						</div>
  						<div class="form-group">
    						<label for="email">Enter your mail</label>
    						<input type="email" name="email" class="form-control form-control-md" id="email" aria-describedby="email" placeholder="Enter admin email">
    						
  						</div>
  						<div class="form-group">
    						<label for="password">Password</label>
    						<input type="password" name="password" class="form-control form-control-md" id="password" aria-describedby="password" placeholder="Enter admin password">
    						
  						</div>
  						<div class="form-group">
    						<label for="confirm">Confirm Password</label>
    						<input type="password" name="confirm" class="form-control form-control-md" id="confirm" aria-describedby="confirm" placeholder="Enter password agian">
    						
  						</div>
  	
  						<button type="submit" name="submit" class="btn btn-dark">Submit</button>
  						<br>
  						<br>
					</form><br><br>
					<table class="table table-hover">
						
  					<thead>
    					<tr>
      						<th scope="col">No.</th>
      						<th scope="col">Name</th>
      						<th scope="col">Email</th>
      						<th scope="col">Date</th>
      						<th scope="col">Action</th>

    					</tr>
  					</thead>
  					<tbody>
  						<?php

$execute=mysqli_query($connect,"SELECT * FROM register");
$rows = mysqli_num_rows($execute);

while($datarow = mysqli_fetch_array($execute)){
	$aid = $datarow["id"];
	$name = $datarow["name"];
	$date = $datarow["date"];
	$email = $datarow["email"];

  if($name != "Prahar"){
    echo "<tr>
                  <th scope='row'>".$aid."</th>
                  <td>".$email."</td>
                  <td>".$name."</td>
                  <td>".$date."</td>
                  <td><a href='deleteadmin?id=".$aid."'>Delete</a></td>
              </tr>";
  }
					
    					
}
?>
    					
  					</tbody>
					</table>
				</div>
			</div>

<!--****************************************************comments*********************************************-->
<!--****************************************************comments*********************************************-->

				<div id="commentsec" class="tab-pane fade" role="tabpanel" aria-labelledby="commentsec">
					<div class="jumbotron">
  					<h1 class="display-8">UnApproved Comments</h1>
  					<p class="lead">You can approve or delete comments here.</p>
  					<hr class="my-8">
					</div>
					<table class="table table-hover">
						
  					<thead>
    					<tr>
      						<th scope="col">No.</th>
      						<th scope="col">Name</th>
      						<th scope="col">Date</th>
      						<th scope="col">Email</th>
      						<th scope="col">Comment</th>
      						<th scope="col">Approve</th>
      						<th scope="col">Delete</th>
      						<th scope="col">Preview</th>
    					</tr>
  					</thead>
  					<tbody>
<?php

$execute=mysqli_query($connect,"SELECT * FROM comments");
$rows = mysqli_num_rows($execute);

while($datarow = mysqli_fetch_array($execute)){
	$id = $datarow["id"];
	$name = $datarow["name"];
	$date = $datarow["date"];
	$comment = $datarow["comment"];
	$email = $datarow["email"];
	$status = $datarow["status"];
	$admin_id = $datarow["admin_id"];

	if($status=="off"){
						echo "<tr>
      						<th scope='row'>".$id."</th>
      						<td>".$name."</td>
      						<td>".$date."</td>
      						<td>".$email."</td>
      						<td>".$comment."</td>
      						<td><a href='approvecomment?id=".$id."'>Approve</a></td>
      						<td><a href='deletecomment?id=".$id."'>Delete</a></td>
      						<td><a href='showpost?id=".$admin_id."'>GO !</a></td>
    					</tr>";

	}

					
    					
}
?>
    					
  					</tbody>
					</table>
				
					<div class="jumbotron">
  					<h1 class="display-8">Approved Comments</h1>
  					<p class="lead">Here are all approved comments</p>
  					<hr class="my-8">
  					<p>You can also manage these comments</p>
					</div>
					<table class="table table-hover">
						 
  					<thead>
    					<tr>
      						<th scope="col">No.</th>
      						<th scope="col">Name</th>
      						<th scope="col">Date</th>
      						<th scope="col">Email</th>
      						<th scope="col">Comment</th>
      						<th scope="col">Delete</th>
      						<th scope="col">Preview</th>
    					</tr>
  					</thead>
  					<tbody>

<?php

$execute=mysqli_query($connect,"SELECT * FROM comments");
$rows = mysqli_num_rows($execute);

while($datarow = mysqli_fetch_array($execute)){
	$id = $datarow["id"];
	$name = $datarow["name"];
	$date = $datarow["date"];
	$comment = $datarow["comment"];
	$email = $datarow["email"];
	$status = $datarow["status"];
	$admin_id = $datarow["admin_id"];

	if($status=="on"){
						echo "<tr>
      						<th scope='row'>".$id."</th>
      						<td>".$name."</td>
      						<td>".$date."</td>
      						<td>".$email."</td>
      						<td>".$comment."</td>
      						<td><a href='deletecomment?id=".$id."'>Delete</a></td>
      						<td><a href='showpost?id=".$admin_id."'>GO !</a></td>
    					</tr>";
	}
					
    					
}
?>
    					
  					</tbody>
					</table>
				</div>
				

<!--****************************************************logout*********************************************-->
<!--****************************************************logout*********************************************-->

				<div id="logout" class="tab-pane fade" role="tabpanel" aria-labelledby="logout">
					
				</div>
				</div>
			</div>
		</div>
	</div>


<!--****************************************************Script*********************************************-->
<!--****************************************************Script*********************************************-->

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>

