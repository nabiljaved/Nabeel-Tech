<?php
include_once 'header.php';
?>


<section>

<div class="container" id="contain">
	<form action="includes/signup.inc.php" method="POST" id="signupform" enctype="multipart/form-data">
		<div class="form-group">
		<?php
		if(isset($_GET['first'])){
			$first= $_GET['first'];		
			echo '<input type="text" name="first" placeholder="First Name" class="form-control input-lg" value='.$first.'>';
		}
		else{
			echo '<input type="text" name="first" placeholder="First Name" class="form-control input-lg"/>';
		}
		?>
			
		</div>
		<div class="form-group">
		<?php
		if(isset($_GET['last'])){
			$last= $_GET['last'];		
			echo '<input type="text" name="last" placeholder="Last Name" class="form-control input-lg" value='.$last.'>';
		}
		else{
			echo '<input type="text" name="last" placeholder="Last Name"class="form-control input-lg"/>';
		}
		?>
			
		</div>
		<div class="form-group">
		<?php
			if(isset($_GET['email'])){
			$email= $_GET['email'];		
			echo '<input type="text" name="email" placeholder="E-MAIL" class="form-control input-lg" value='.$email.'>';
		}
			else{
			echo '<input type="text" name="email" placeholder="E-mail" class="form-control input-lg"/>';
		}
		?>
			
		</div>
		<div class="form-group">
			<?php
			if(isset($_GET['uid'])){
			$uid= $_GET['uid'];		
			echo '<input type="text" name="uid" placeholder="User Name" class="form-control input-lg" value='.$uid.'>';
		}
			else{
			echo '<input type="text" name="uid" placeholder="User Name" class="form-control input-lg"/>';
		}
		?>
			
		</div>
		<div class="form-group">
			<input type="password" name="pwd" placeholder="Password" class="form-control input-lg"/>
		</div>
		<div class="form-group">
			<input type="file" class="form-control-file" name="file">
		</div>
		<button class="btn btn-success btn-block" type="submit" name="submit" >SUBMIT</button>
	</form>
</div>
<?php
$fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(strpos($fullurl, 'signup=empty')==true){
	echo "<p id='erorr'>YOU HAVE NOT FILLED THE FORM</p>";
}
elseif(strpos($fullurl, 'signup=invalidemail')==true){
	echo "<p id='erorr'>PLEASE ENTER A VALID E-MAIL</p>";
}
elseif(strpos($fullurl, 'signup=char')==true){
	echo "<p id='erorr'>PLEASE ENTER A VALID CHARACTER</p>";
}
elseif(strpos($fullurl, 'signup=success')==true){
	echo "<p id='succ'>THE FORM HAS BEEN SUBMITED</p>";
}
elseif(strpos($fullurl, 'signup=usertaken')==true){
	echo "<p id='erorr'>THE USER NAME IS TAKEN</p>";
}
    elseif(strpos($fullurl, 'signup=problem')==true){
	echo "<p id='erorr'>INVALID EMAIL AND CHARACTER</p>";
}

?>

</section>

<?php
include_once 'footer.php';
?>