<?php
include_once 'header.php';
?>

<div class="updatestudent">
	
   	  <form method="POST" action="updatestudent.php" class="form-inline">
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
	
	<div class="table-responsive" style="margin-top:20px">
    <table class="table bg-primary table-bordered">
    <tr style="background-color:black">
	<th style="text-align:center">NO</th>
	<th style="text-align:center">Image</th>
	<th style="text-align:center">Name</th>
	<th style="text-align:center">Roll No</th>
	<th style="text-align:center">Edit</th>
	</tr>
	<?php
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
		 echo '<tr><td colspan="5">No Record Found</td></tr>';
		}else{
			$count = 0; 
			while($row = mysqli_fetch_assoc($result)){
			$count++;
			?>
			<tr>
			<td><?php echo $count;?></td>
			<td><img src="upload/<?php echo $row['image_path'];?>" id="proimage"></td>
			<td><?php echo $row['name'];?></td>
			<td><?php echo $row['rollno'];?></td>
			<td><a href="updateform.php?sid=<?php echo $row['id'];?>" style="color:yellow">Edit</a></td>
			</tr>
			<?php
			
		}
	}	
	}
			
	}
	?>
   
    </table>
    </div>

	



</div>



<?php
include_once 'footer.php';
?>

  
   
  
