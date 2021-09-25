<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TOURISM WORLDWIDE</title>
 
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/lightbox.css" rel="stylesheet"/>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"/>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	   <script src="js/jquery-3.3.1.min.js"></script>
  <style>

  body{
  background-image:url('images/newyork.jpg');
  background-size:cover;
  background-repeat:no-repeat;
  }
	
  #video_selector{
  position:fixed;
  right:0; 
  bottom:0;
  min-width:100%;
  min-height:100%;
  width:auto%;
  height:auto%;
  z-index:-1;
  
  }
  
#fill{
  text-align:center;
  font-weight:900px;
  color:white;
  margin-top:300px;
  }
	
  button{
  background-color:red;
  }
  
   button a{
  color:white;
  font-size:2em;
  }
  
  button a:hover{
  color:white;
  }
  
  #fill h1:hover{
  font-size:4em;
  }
  
  
.navbar-nav li a:hover{
	background-color:white;
  }

section{
display:none;
}

#lbl{
background-color:#337AB7; 
color:yellow;
margin-top:8px;	
margin-right:8px;	
}

  </style>
  </head>
  <body>
  
  <video autoplay muted loop id="video_selector">
	<source src="videos/newyork.mp4" type="video/mp4">
    your browser doest not support
	</video>
	
		<audio autoplay loop id="contaudio">
			<source src="audio/charlie.mp3" type="audio/mp3">
		</audio>
	
 
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
	</ul>
	<?php
	if(isset($_SESSION['u_uid'])){
		$username = $_SESSION["u_uid"];
		echo '
			
			<form  method = "POST" action="includes/logout.inc.php" class="navbar-form navbar-right">
			<div class="form-group">
					<label id="lbl">'.$username.'<label>
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
	<div id="fill">
		<h1 id="heading">Fill out a Form and Win tickets to Manhattan</h1>
		<button id="formbtn"><a href="#" style="text-decoration:none">FORM</a></button>
	</div>

	<section style="background-color:blue; margin:0 auto; width:100%; max-width:700px; padding:0 5px 1px 5px">
        <h4 style="color:white; text-align:center; margin-top:100px">FILL OUT A FORM</h4>
		
			<div class= "panel panel-default">
					<div class="panel-heading" style="color:red">
							Win a Ticket to Manhattan!
						</div>
				<div class="panel-body">
					<form class="form-horizontal" style="padding:3px;">
						<div class="form-group row">
							<label for="user" class="control-label col-md-2" >Username:</label>
							<div class="col-md-10"><input type="text" name="user" class="form-control"></div>
						</div>
						<div class="form-group row">
							<label for="email" class="control-label col-md-2" >Email:</label>
							<div class="col-md-10"><input type="email" name="email" class="form-control"></div>
						</div>
						<div class="form-group row">
							<label for="password" class="control-label col-md-2" >Password:</label>
							<div class="col-md-10"><input type="password" name="password" class="form-control"></div>
						</div>
						<div class="form-group row">
							<label for="gender" class="control-label col-md-2" >Gender:</label>
							<div class="col-md-10">
								<div class="radio"><label><input type="radio" name="gender">Male</label></div>
								<div class="radio"><label><input type="radio" name="gender">Female</label></div>
							</div>
						</div>
							<input type="submit" class="btn btn-success btn-block" name="sumbit" value="submit"/>
					</form>
				</div>
					<div class="panel-footer">
						<a href="promotion.php" class="btn btn-primary">Go Back</a>
					</div>
			</div>
	</section>
	
	<div class="clear:both"></div>
	
	<div class="container-fluid" style="position:fixed; right:0; bottom:0">
	
		<button class="btn btn-success" id="btn1">play/Pause <span class="glyphicon glyphicon-film"><span></button>
		<button class="btn btn-primary"  id="btn2">play/Pause <span class="glyphicon glyphicon-music"><span></button>

	</div>	
	

    <script src="js/bootstrap.min.js"></script>
	<script>
	var myaudio = document.getElementById("contaudio");
	var myvideo = document.getElementById("video_selector");
	
	document.getElementById("btn1").addEventListener("click", function(){
	if(myvideo.paused)
	myvideo.play();
	
	else
	myvideo.pause();
	
	});
	
	document.getElementById("btn2").addEventListener("click", function(){
	if(myaudio.paused)
	myaudio.play();
	
	else
	myaudio.pause();


	
	});
	


	 
   
	$(document).ready(function(){
	
		$('#formbtn').click(function(){
		
			$('#fill').hide();
			$('#fill').hide();
			$('section').css("display", "block");
		});
	
	});

	
	</script>
  </body>
</html>