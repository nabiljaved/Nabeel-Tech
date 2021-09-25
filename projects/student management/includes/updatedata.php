<?php

if(isset($_POST['submit'])){
	
	include_once 'dbh.inc.php';
	
	$fileName = $_FILES['file']['name'];
	$fileType = $_FILES['file']['type'];
	$fileSize = $_FILES['file']['size'];
	$fileTempName = $_FILES['file']['tmp_name'];
	$fileError = $_FILES['file']['error'];
	
	$fileExplode = explode('.', $fileName);
	$fileNewExtension = strtolower(end($fileExplode));
	$allowed = array('jpg','jpeg','pdf','png');
	
	
	if(in_array($fileNewExtension, $allowed)){
		if($fileError == 0){
			if($fileSize < 1000000){
				$fileNewName = uniqid('',true).".".$fileNewExtension;
				$fileDestination = '../upload/'.$fileName;
				move_uploaded_file($fileTempName, $fileDestination);
				
				$name = $_POST['name'];
				$rollno = $_POST['rollno'];
				$city = $_POST['city'];
				$contact = $_POST['contact'];
				$std = $_POST['standard'];
				$id = $_POST['sid'];
				$name = mysqli_real_escape_string($conn, $name);
				$rollno = mysqli_real_escape_string($conn, $rollno);
				$city = mysqli_real_escape_string($conn, $city);
				$contact = mysqli_real_escape_string($conn, $contact);
				$std = mysqli_real_escape_string($conn, $std);
	
				if(empty($name) || empty($city) || empty($contact) || empty($std) || empty($rollno)){
				header("Location: ../addstudent.php?insert=empty$name=$name&roll=$rollno&city=$city&contact=$contact&standard=$std");
				}
				else{
					
						$sql = "UPDATE student SET rollno='$rollno', name='$name', city='$city', parent_cont='$contact', 
					standard='$std', image_path='$fileDestination' WHERE id='$id'";
					$result = mysqli_query($conn, $sql);
					if($result == true){
						
						?>
						<script>
						alert('Record is Successfully UPDATED');
						window.open('../updatestudent.php?<?php echo $id;?>','_self');
						
						</script>
						
						<?php
					}
					else{
						header("Location: ../addstudent.php?insert=fail");
					}
				}
				
				
				
				
			}else{
				header("Location: ../addstudent.php?insert=sizelarge");
			}
			
		}else{
			
			header("Location: ../addstudent.php?insert=errorfile");
		}
	}else{
		header("Location: ../addstudent.php?insert=invalidextension&name=$fileName");
	}
	

}else{
	
	header("Location: ../addstudent.php?insert=error");
}

?>