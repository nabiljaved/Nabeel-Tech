<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TraVEL gUIde</title>

    <link rel="stylesheet" type="text/css" href="stylesheet.css">	  
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/lightbox.css" rel="stylesheet"/>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"/>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	
  </head>
  <body>
	
    <div class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
	<div class="navbar-header">
	<button class="navbar-toggle" id="btt" data-toggle="collapse" data-target=".navbar-collapse ">
	<span class="sr-only"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	</button>
	<a href="#" class="navbar-brand">Nabeel Travel Guide</a>
	</div>
	<div class="collapse navbar-collapse">
	<ul class="nav navbar-nav">
	<li  class="text-center"><a href="index.php">Home</a></li>
	<li  class="text-center"><a href="gallery.php">Gallery</a></li>
	<li  class="text-center"><a href="inttourism.php">International</a></li>
	<li  class="text-center"><a href="promotion.php">Tickets</a></li>
	<li>
	<?php 
	global $message;
	$fullurl ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	if(strpos($fullurl, 'login=empty')==true){
		$message = 'Form Empty';
	}elseif(strpos($fullurl, 'login=pwderror')==true){
		$message = 'Password Error';
	}elseif(strpos($fullurl, 'login=failed')==true){
		$message = 'Login Failed';
	}
	?>
	<div id="formerror"><?php echo $message;?></div>
	</li>
	
	</ul>
	<?php
	if(isset($_SESSION['u_uid'])){
		$username = $_SESSION["u_uid"];
		$path = $_SESSION['u_image'];
		
		echo '
			
			
			<form  method = "POST" action="includes/logout.inc.php" class="navbar-form navbar-right">
			<div class="form-group">
					<img class="usrimg" src=" '.$path.' ">
				</div>
		   	<div class="form-group">
					<label>'.$username.'<label>
				</div>
				<div class="form-group">
					<button type="submit" name ="submit" class="btn btn-success">Log Out</button>
			</div>
			</form>
			
		';	
	}
	else{
		
	echo '
	
	<form method = "POST" action="includes/login.inc.php" class="navbar-form navbar-right">
	<div class="form-group">
	
	</div>
	<div class="form-group">
	<input type="text" name="uid" placeholder="UserName" class="form-control" >
	</div>
	<div class="form-group">
	<input type="password" name="pwd" placeholder="password" class="form-control" >
	</div>
	<button type="submit" name ="submit" class="btn btn-success">Log In</button>
	<a href="signup.php" class="btn btn-default btn-warning">Signup</a>
	</form>
	'; 	
	}
	?>
	
	</div>
	</div>
	</div>