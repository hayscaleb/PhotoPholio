<?php
	session_start();
	if(!isset($_SESSION['userName']))
	{
		header('Location: index.php?err=2');	
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<title>PhotoFolio</title>
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
</head>
<body>

<?php include("_navbar.php"); ?>






<?php include("_footer.php"); ?>

</body>
</html>
