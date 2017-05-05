<?php
session_start();
	if(!isset($_SESSION['id']))
	{
		header('Location: index.php');	
	} else {
		
		include("connect.php");
		$imageId=$_GET['imageId'];
		$query=$db->prepare("SELECT * FROM PP_images WHERE id='$imageId'");
		$query->execute();
		$row=$query->fetch(PDO::FETCH_ASSOC);
		
		if($_SESSION['id'] != $row['userid']) {
			header('Location: userhome.php');	
		} else {
	
	
		// Database connection 
		$con=mysqli_connect("localhost","DunwoodyUser01","Z-k*HBqA01zS","DunwoodyCalebHDB");
		
		//Retreive the data from the database table
		$query=mysqli_query($con, "SELECT * FROM PP_images WHERE id='$imageId'");
		$imageFile=mysqli_fetch_assoc($query);
		
		//First Delete the image from directory
		unlink("images/".$imageFile['imagePath']);
		
		//Next, delete the data from Database
		mysqli_query($con, "DELETE FROM PP_images WHERE id='$imageId'");
		mysqli_close($con); //Close the database
		
		
		header("Location: editgallery.php");
		}
	}

?>
			