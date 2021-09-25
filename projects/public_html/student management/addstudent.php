<?php
include_once 'header.php';
?>

<section id="topcontainer2">
	<div class="box3">
   	  <form method="POST" action="includes/addstudent.php" enctype="multipart/form-data">
	  <div class="table-responsive">
      <table class="table table-bordered">
	  <tr><th>Roll No</th><td><input type="text" name="rollno" placeholder="Student RollNo"></td></tr>
	  <tr><th>Name</th><td><input type="text" name="name" placeholder="Student Name"></td></tr>
      <tr><th>City</th><td><input type="text" name="city" placeholder="City"></td></tr>
	  <tr><th>Parent Contact No</th><td><input type="text" name="contact" placeholder="Contact Number"></td></tr>
	   <tr><th>Standard</th><td><input type="number" name="standard" placeholder="Standard/no!" min="0" max="8"></td></tr>
	   <input type="file" name="file" class="btn btn-primary btn-small">
	   <a href="admindash.php" class="btn btn-success btn-md" style="float:left">Back</a>
	   <tr>
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
