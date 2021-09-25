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
				
				$fileNewName = uniqid('', true).".".$fileActualExtansion;

				$fileDestination = '../upload/'.$fileName;
				move_uploaded_file($fileTempName, $fileDestination);
				
				//now collect other data
				$first = mysqli_real_escape_string($conn, $_POST['first']);
				$last = mysqli_real_escape_string($conn, $_POST['last']);
				$email = mysqli_real_escape_string($conn, $_POST['email']);
				$uid = mysqli_real_escape_string($conn, $_POST['uid']);
				$password = mysqli_real_escape_string($conn, $_POST['pwd']);
	
	if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($password) ){
		header("Location: ../signup.php?signup=empty");	
		exit();
	}else{
		
		if(!preg_match("/^[a-zA-Z]*$/", $first) && !preg_match("/^[a-zA-Z]*$/", $last) && !filter_var($email, FILTER_VALIDATE_EMAIL) ){
				header ("Location: ..//signup.php?signup=problem&uid=$uid");
				exit();
			}
		
		elseif(!preg_match("/^[a-zA-Z]*$/", $last) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
				header ("Location: ..//signup.php?signup=problem&first=$first&uid=$uid");
				exit();
			}
			
		elseif(!preg_match("/^[a-zA-Z]*$/", $first) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
				header ("Location: ..//signup.php?signup=problem&last=$last&uid=$uid");
				exit();
			}
			
			

			
			
			
		
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header("Location: ../signup.php?signup=invalidemail&first=$first&last=$last&uid=$uid");	
			exit();
		}
				elseif(!preg_match("/^[a-zA-Z]*$/", $first) ){
				header ("Location: ..//signup.php?signup=char&last=$last&email=$email&uid=$uid");
				exit();
		}
		
				elseif(!preg_match("/^[a-zA-Z]*$/", $last) ){
				header ("Location: ..//signup.php?signup=char&first=$first&email=$email&uid=$uid");
				exit();
			}
			
			
			
	
		else{
			$sql = "SELECT * FROM loginusers WHERE user_uid='$uid'";
			$result = mysqli_query($conn, $sql);
			$resultcheck = mysqli_num_rows($result);
			
			if($resultcheck > 0){
				header ("Location: ../signup.php?signup=usertaken");
			    exit();
			}
			else{
				
				/*
				//this is normal insert without prepared statement which mean security
				//hash the password
				$hashedpwd = password_hash($password, PASSWORD_DEFAULT);
				//insert the user into the database
				$sql = "INSERT INTO loginusers(user_first, user_last, user_email , user_uid, user_pwd )VALUES('$first', '$last', '$email', '$uid', '$hashedpwd')";
				mysqli_query($conn, $sql);
				header ("Location: ../signup.php?signup=success");
			    exit();
				*/
				
				$sql1 = "INSERT INTO loginusers(user_first, user_last, user_email , user_uid, user_pwd, image_path )VALUES (?, ?, ?, ?, ?,?)";
				$hashedpwd = password_hash($password, PASSWORD_DEFAULT);
				//create a prepare statement 
				$stmt = mysqli_stmt_init($conn);
				//Prepare a prepared statement
				if(!mysqli_stmt_prepare($stmt, $sql1)){
					echo "STATEMENT FAILED"; 
				}
				else{
				//bind parameters
				mysqli_stmt_bind_param($stmt, "ssssss", $first, $last, $email, $uid, $hashedpwd, $fileDestination);
				//execute the statement
				mysqli_stmt_execute($stmt);
				header ("Location: ../signup.php?signup=success");
			    exit();
					
				}
				
					
			}
		}
	
		
		
		
	}
		
				
			}else{
				
				header("Location: ../signup.php?signup=fileBig");
				exit();
				
			}
			
		}
		else{
			
			header("Location: ../signup.php?signup=fileError");	
			exit();
		}
	}
	else{
		header("Location: ../signup.php?signup=format");	
		exit();
	}
	
	
	
	
	
}
else{
header("Location: ../signup.php");	
exit();  
}