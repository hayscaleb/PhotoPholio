<?php
session_start();

if(isset($_POST['addbtn']))
{
	if ($_POST["userPassword"] == $_POST["userPasswordConf"]) {
   		try
		{
			
			
		include('connect.php');
		
		$target_dir = "images/";
		$target_file = $target_dir . basename($_FILES["profilePic"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
			$check = getimagesize($_FILES["profilePic"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
			
			// Check if file already exists
			if (file_exists($target_file)) {
				echo "Sorry, file already exists.";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["profilePic"]["size"] > 500000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				move_uploaded_file($_FILES["profilePic"]["tmp_name"], $target_file);
			}
			
			$md5Pass = md5($_POST['userPassword']);
			$stmt = $db->prepare("INSERT INTO PP_users(userName, password, profilePic, myDescription)
									VALUES(:Uname,:password,:profilePic,:myDescription)");
			$stmt->execute(array("Uname" => $_POST['userName'],
									"password" => $md5Pass,
									"profilePic" => $_FILES['profilePic']['name'],
									"myDescription" => $_POST['myDescription']
									));			
			
		echo "<script type='text/javascript'>alert('User Created Succesfully!');</script>";
			
		header('Location: login.php?err=3');
		
		}
		catch(PDOException $e)
		{
			echo 'ERROR: ' . $e->getMessage();
		}
}

	else {
   		echo "<script type='text/javascript'>alert('Passwords do not match!');</script>";
	}
	
}
?>