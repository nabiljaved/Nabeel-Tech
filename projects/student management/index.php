<?php
include_once 'header.php';
?>

<section id="topcontainer">
	<div class="box">
		<form method="POST" action="showrecord.php" >
		<div class="table-responsive">
	<table style="width:auto" class="table table-bordered" id="tablemain">
		<tr>
			<td colspan="2" align="center">Student Information</td>
		</tr>
		<tr>
			<td align="right">Choose Student</td>
			<td>
				<select name="std" >
					<option value="1">1st</option>
					<option value="2">2nd</option>
					<option value="3">3rd</option>
					<option value="4">4th</option>
					<option value="5">5th</option>
					<option value="6">6th</option>
				</select>
			</td>
		</tr>
		<tr>
			<td align="right">Enter Roll No</td>
			<td><input type="text" name="rollno" required></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="show info"></td>
		</tr>
	</table>
	</div>
	</form>
    </div>
	

	
</section>



<?php
include_once 'footer.php';
?>
