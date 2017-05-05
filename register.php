<!DOCTYPE html>
<html lang="en">
<head>
  	<title>PhotoPholio | Register</title>
	<link rel="icon" href="images/camera-icon.png">
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
	<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script src="scripts/custom.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

<!-- Include the NavBar -->
<?php include("_navbar.php"); ?>


<form action="adduser.php" method="post" enctype="multipart/form-data">
<div class="container">
  <h2 style="text-align:center">Register</h2>
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" name="userName" placeholder="Enter a Username">
    </div>
    <div class="form-group">
      <label for="myDescription">Description:</label>
      <input type="text" class="form-control" id="myDescription" name="myDescription" placeholder="Enter a brief description of yourself">
    </div>
    <div class="form-group">
      <label for="profilePic">Profile Picture:</label>
      <input type="file" class="form-control" id="profilePic" name="profilePic" placeholder="Choose an image..." required>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" name="userPassword" placeholder="Enter your Password">
    </div>
    <div class="form-group">
      <label for="passwordConf">Confirm Password:</label>
      <input type="password" class="form-control" id="passwordConf" name="userPasswordConf" placeholder="Re-Enter your Password">
    </div>
    <button type="submit" class="btn btn-default" name="addbtn">Submit</button>
  
</div>
</form><br>


<!-- Include the Footer -->
<?php include("_footer.php"); ?>

</body>
</html>