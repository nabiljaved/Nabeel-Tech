<?php
include_once 'header.php';
?>

<section id="topcontainer0">
	<div class="box2">
		<form class="form" id="adminform" method="post" align="center">
			<div class="form-group">
				<a href="addstudent.php" class="btn btn-warning">INSERT STUDENT</a>
			</div>
			<div class="form-group">
					<a href="updatestudent.php" class="btn btn-primary">UPDATE STUDENT</a>
			</div>
			<div class="form-group">
				<a href="deletestudent.php" class="btn btn-danger">DELETE STUDENT</a>
			</div>
			<div class="form-group">
				<button class="btn btn-success btn-large" style="margin-left:40px">SUBMIT</button>
			</div>
		</form>
    </div>
</section>

<?php
include_once 'footer.php';
?>
   
  </body>
</html>
