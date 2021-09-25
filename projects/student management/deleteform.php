<?php
include_once 'header.php';


if(isset($_GET['sid'])){
	include_once 'includes/dbh.inc.php';
			$id= $_GET['sid'];		
			
	
	$sql = "SELECT * FROM student WHERE id='$id'";
	$result = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($result);
	
	
	
}
?>

<section >
	<div class="box3">
   	  <form method="POST" action="includes/deletedata.php" enctype="multipart/form-data">
	  <div class="table-responsive">
      <table class="table table-bordered">
	  <tr><th>Roll No</th><td><input type="text" name="rollno" value="<?php echo $data['rollno'];?>"></td></tr>
	  <tr><th>Name</th><td><input type="text" name="name" value="<?php echo $data['name'];?>"></td></tr>
      <tr><th>City</th><td><input type="text" name="city" value="<?php echo $data['city'];?>"></td></tr>
	  <tr><th>Parent Contact No</th><td><input type="text" name="contact" value="<?php echo $data['parent_cont'];?>"></td></tr>
	   <tr><th>Standard</th><td><input type="number" name="standard" value="<?php echo $data['standard'];?>" min="0" max="8"></td></tr>
	   <input type="file" name="file" class="btn btn-primary btn-small">
	   <a href="updatestudent.php" class="btn btn-success btn-md" style="float:left">Back</a>
	   <tr>
	   <input type="hidden" name="sid" value="<?php echo $data['id'];?>">
		<td colspan="2" style="text-align:center"><input type="submit" name="submit" value="submit" class="btn btn-success"></td>
		</tr>
		
    </table>
    </div>
  </form>
    </div>
</section>


<?php
include_once 'footer.php';
?>
