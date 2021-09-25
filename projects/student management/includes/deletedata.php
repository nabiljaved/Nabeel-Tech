<?php

if(isset($_POST['submit'])){
	
	include_once 'dbh.inc.php';
	
	$id = $_REQUEST['sid'];
					
	$sql = "DELETE FROM `student` WHERE id='$id'";
   $result = mysqli_query($conn, $sql);
   if($result == true){
						
	?>
	<script>
	alert('Record is Successfully DELETED');
	window.open('../deletestudent.php','_self');
	</script>
    <?php
}
	else{
		header("Location: deleteform.php?delete=fail");
		}
	
	

}else{
	
	header("Location: deleteform.php?delete=error");
}

?>