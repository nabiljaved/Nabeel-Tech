<?php
session_start();

if(isset($_POST['submit'])){
		
	include_once 'dbh.inc.php';
	
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	
	if(empty($uid) || empty($pwd)){
		header("Location: ..//index.php?login=empty");	
		exit();
	}
	else
	{
		$data = $_POST['uid'];
		$sql = "SELECT * FROM loginusers WHERE user_uid=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			echo 'STATEMENT FAILED';
		}
		else{
		  mysqli_stmt_bind_param($stmt, "s", $data);
		   mysqli_stmt_execute($stmt);
		   
		   $result = mysqli_stmt_get_result($stmt);
		   if($result < 1){
			   header("Location: ..//index.php?login=failed");
			   exit();
		   }
		   
		   else{
			   if($row = mysqli_fetch_assoc($result)){
				   $checkhash = password_verify($pwd, $row['user_pwd']);
				   if($checkhash == false){
					    header("Location: ..//index.php?login=pwderror");
			            exit();  
				   }
				   elseif($checkhash == true){
					   //log in the user here
					   
					   $_SESSION['u_id'] = $row['user_id']; 
					   $_SESSION['u_first'] = $row['user_first'];
					   $_SESSION['u_last'] = $row['user_last'];
					   $_SESSION['u_email'] = $row['user_email'];
					   $_SESSION['u_uid'] = $row['user_uid'];
					   $_SESSION['u_image'] = $row['image_path'];
					   header("Location: ..//index.php?login=success");
			           exit(); 
				   }
				   
				   
			   }
			     
		   }
		   
		   
		}
	}
	
}
	
	else
	{
		header("Location: ..//index.php?signup=error");	
	}