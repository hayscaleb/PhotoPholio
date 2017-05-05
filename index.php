<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotoPholio | Home</title>
	<link href="images/camera-icon.png" rel="icon">
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	</script>
	<link href="css/custom.css" rel="stylesheet">
	<link href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen" rel="stylesheet">
	<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js">
	</script>
	<script src="scripts/custom.js">
	</script>
</head>
<body>
	<?php include("_navbar.php"); ?>
	<div align="center" class="container-fluid" id="homecontent">
		<h1>PhotoPholio</h1>
		<hr>
		<h3>Simple Image Hosting</h3><br>
	</div><?php include("_homecarousel.php"); ?>
	<div align="center" class="container-fluid" id="homecontent">
		<h2>Create an account for free!</h2>
		<hr>
		<h3>Host your pictures here and show them to the world!</h3><button class="btn"><a href="register.php">Create an account here!</a></button>
	</div><?php include("_samplegallery.php"); ?><br>
	<br>
	<br>
	<?php include("_footer.php"); ?>
</body>
</html>