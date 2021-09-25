<?php
session_start();

if(isset($_POST['submit'])){
		
	include_once 'dbh.inc.php';
	
	$uid = mysqli_real_escape_string($conn, $_POST['username']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pass']);
			
		$data = $_POST['username'];
		$data1 = $_POST['pass'];
		$sql = "SELECT * FROM admin WHERE usr_name=? AND usr_pwd=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			echo 'STATEMENT FAILED';
		}
		else{
		  mysqli_stmt_bind_param($stmt, "ss", $data, $data1);
		  mysqli_stmt_execute($stmt);
		  $result = mysqli_stmt_get_result($stmt);
		   $checkresult = mysqli_num_rows($result);
		   
		   if($checkresult < 1){
			   header("Location: ../admin.php?login=failed");
			   exit();
		   }
		   
		   else{
			   while($row = mysqli_fetch_assoc($result)){
					$_SESSION['u_name'] = $row['usr_name'];
					header("Location: ../admindash.php");	
					exit(); 
			   }
			     
		   }
		   
		   
		}	
}
	else
	{
		header("Location: ..//index.php?signup=error");	
	}