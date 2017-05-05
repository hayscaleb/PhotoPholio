<?php
	session_start();
	if(!isset($_SESSION['id']))
	{
		header('Location: index.php?err=2');	
	}
	
	$userName=$_SESSION['userName'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<title>PhotoPholio | <?php echo $userName ?></title>
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

<div class="container-fluid"> 
    <div class="col-sm-2" align="center" style="background-color:#f1f1f1; height:100%; padding-top: 20px;">
    	<?php if(($_SESSION['profilePic'])!="") { $profilePic = $_SESSION['profilePic']; }	else { $profilePic = "images/defProfPic.jpg"; }?>
    	<img src="images/<?php echo $profilePic; ?>" class="img-responsive" alt="Profile Image" style="border-radius:50%; padding-bottom: 10px;">
          <p><b><?php echo $userName; ?></b></p>
			  <p><a href="editgallery.php">Edit</a></p>
              <button class="btn btn-default text-right"><a href="upload.php">Upload Pictures</a></button></br></br>
    </div>
    
    <div class="col-sm-10 well">
          <h1>About Me</h1>                  
          <hr>
          <?php if(($_SESSION['myDescription'])!="") { $myDescription = $_SESSION['myDescription']; } else { $myDescription = "Please enter a description about yourself!!"; }?>
          <p style="padding-left:5%;">"<?php echo $myDescription; ?>"</p>
          <hr>
        <?php include("_usergallery.php"); ?>
    </div>
</div>
    



<?php include("_footer.php"); ?>

</body>
</html>
