<?php
include_once 'header.php';
?>

<div class="updatestudent3">
	
<?php

include_once 'includes/dbh.inc.php';

if(isset($_POST['submit'])){
$standard = $_POST['std'];
$roll = $_POST['rollno'];

$sql = "SELECT * FROM student WHERE standard='$standard' AND rollno='$roll'";

$result = mysqli_query($conn, $sql);
$checkresult= mysqli_num_rows($result);

if($checkresult > 0){
	
	$data = mysqli_fetch_array($result);
	?>
	<div class="table-responsive">
	<table class="table bg-primary table-bordered">
		<tr>
		<th colspan="3" style="text-align:center"><a href="index.php" class="btn btn-warning" style="margin-right:20px;">Back</a>Student Information</th>
		</tr>
		<tr>
			<td rowspan="5"><img src="upload/<?php echo $data['image_path'] ?>" style="max-width:200px; margin:0" ></td>
			<th>RollNo</th>
			<td><?php echo $data['rollno']?></td>
		</tr>
		<tr>
			<th>Name</th>
			<td><?php echo $data['name']?></td>
		</tr>
		<tr>
			<th>Standard</th>
			<td><?php echo $data['standard']?></td>
		</tr>
		<tr>
			<th>Parent Contact</th>
			<td><?php echo $data['parent_cont']?></td>
		</tr>
		<tr>
			<th>City</th>
			<td><?php echo $data['city']?></td>
		</tr>
		
	</table>
	</div>
	<?php
}
else{
	?>
	<script>
	alert('No Student Found');
	window.open('index.php','_self');
	</script>
	
	<?php
}	
	
}


?>

</div>




<?php
include_once 'footer.php';
?>
  