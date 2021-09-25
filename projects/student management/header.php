<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/jquery.js"></script>
    <title>Student Management System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	 <link href="css/stylesheet1.css" rel="stylesheet">
	 
	<style>

	</style>
  </head>
  <body>
  
    <div class="navbar navbar-default navbar-static-top" id="top" style="margin-bottom:0;">
	<div class="container">
	<div class="navbar-header">
	<button class="navbar-toggle" id="btt" data-toggle="collapse" data-target=".navbar-collapse ">
	<span class="sr-only"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	</button>
	<a href="#" class="navbar-brand"><span class="font"><img src="images/arizona.jpg" width="30" style="margin-right:8px">The American School</span></a>
	</div>
	<div class="collapse navbar-collapse">
	<ul class="nav navbar-nav navbar-right">
	<?php
		if(isset($_SESSION['u_name'])){
			$username = $_SESSION['u_name'];
			
			echo 
			'
			<li  class="text-center"><a href="#"><span class="font">'.$username.'</span></a></li>
			<a href="includes/logout.php" method="POST" action="logout.php" type="submit" name ="submit" class="btn btn-danger" style="margin-top:10px">Log Out</a>
			';
		}
		else{	
			echo 
			'
			<li  class="text-center"><a href="admin.php"><span class="font">Admin Login</span></a></li>
			<li  class="text-center"><a href="#"><span class="font">Student Login</span></a></li>
			<li  class="text-center"><a href="#"><span class="font">Contact Us</span></a></li>
			'; 
		}
	?>
	</ul>
	</div>
	</div>
	</div>