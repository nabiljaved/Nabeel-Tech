<?php
include_once 'header.php';
?>

<div class="updatestudent">
	
   	  <form method="POST" action="update.php" class="form-inline">
			<div class="form-group">
				<label for="standard" style="color:yellow">Enter Standard.</label>
				<input type="number" name="standard" placeholder="Standard" min="0" max="8" class="form-control">
			</div>
			<div class="form-group">
				<label for="standard" style="color:yellow">Student Name.</label>
				<input type="text" name="name" placeholder="Student Name" class="form-control">
			</div>
			<div class="form-group">
				<button type="submit"  name="submit" value ="submit" class="btn btn-success btn-lg;">Search</button>
			</div>
			<div class="form-group">
				<a href="admindash.php" name="Back" class="btn btn-primary btn-lg;">Back</a>
			</div>
     </form>
	<?php
	if(isset($_SESSION['u_standard'])){
		$id = $_SESSION['u_count'];
		$rollno = $_SESSION['u_rollno'];
		$name = $_SESSION['u_sname'];
		$city = $_SESSION['u_city'];
		$contact = $_SESSION['u_parent_cont'];
		$standard = $_SESSION['u_standard'];
		$img = $_SESSION['u_image'];
		echo
		
		'
	<div class="table-responsive" style="margin-top:150px">
    <table class="table bg-primary table-bordered" >
    <tr><th style="text-align:center">ID</th><th style="text-align:center">Roll No</th><th style="text-align:center">Name</th><th style="text-align:center">City</th><th style="text-align:center">Parent Contact</th><th style="text-align:center">Standard</th><th style="text-align:center">Image</th></tr>
    <tr><td>'.$id.'</td><td>'.$rollno.'</td><td>'.$name.'</td><td>'.$city.'</td><td>'.$contact.'</td><td>'.$standard.'</td><td><img src=" '.$img.' " style="height:100px"></td></tr>
    </table>
    </div>

		'; 
		
	}else{
		echo "";	
	}
	
	?>



</section>




<?php
session_start();
if(isset($_POST['submit'])){
	
	include_once 'includes/dbh.inc.php';
	
	$standard = $_POST['standard'];
	$name = $_POST['name'];
	
	if(empty($standard) || empty($name)){
			header("Location: updatestudent.php?update=empty");
	}else{
					
		$sql = "SELECT * FROM student WHERE standard='$standard' AND name LIKE '%$name%'";
		$result = mysqli_query($conn, $sql);
		$checkresult = mysqli_num_rows($result);
		if($checkresult < 1){
		header("Location: updatestudent.php?update=queryfailed");
	    exit();
							
		}else{
			$count = 0; 
			while($row = mysqli_fetch_assoc($result)){
			$count++;					
			$_SESSION['u_rollno'] = $row['rollno'];
			$_SESSION['u_count'] = $count;
			$_SESSION['u_sname'] = $row['name'];
			$_SESSION['u_city'] = $row['city'];
			$_SESSION['u_parent_cont'] = $row['parent_cont'];
			$_SESSION['u_standard'] = $row['standard'];
			$_SESSION['u_image'] = $row['image_path'];
			header("Location: updatestudent.php?update=success");
			exit();
		}
	}	
	}
	
}else{
	header("Location: ../updatestudent.php?update=error");	
}
