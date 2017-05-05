<?php
require 'connect.php'; //database connection
session_start(); //start the session

if(isset($_POST['userName']))
{ $username = $_POST['userName']; }

if(isset($_POST['userPassword']))
{ 	
	$password = $_POST['userPassword']; 
	$md5_pass = md5($password); //md5 of entered password
}

// check wether this username and encrypted password pair exist in the database
$q = 'SELECT * FROM users WHERE userName=:username AND password=:password';
$query = $db->prepare($q);
$query->execute(array(':username' => $username, ':password' => $md5_pass));

if($query->rowCount() == 0)
{ header('Location: login.php?err=1'); }

else
{  //fetch the result as associative array
	$row = $query->fetch(PDO::FETCH_ASSOC);
	
	// Store the fetched details into $_SESSION
	$_SESSION['id'] = $row['id'];
	$_SESSION['userName'] = $row['userName'];
	$_SESSION['profilePic'] = $row['profilePic'];
	$_SESSION['myDescription'] = $row['myDescription'];
		
	header('Location: userhome.php');
	
}?>