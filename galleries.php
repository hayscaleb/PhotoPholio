<?php
	session_start();
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

<?php

	include("connect.php");
	$query=$db->prepare("SELECT * FROM users");
	$query->execute();
	
	 ?>
<div class="container">
<div class="container-fluid text-center well">
	<h2>User Galleries</h2>
	<hr>
   <div class="row">   
        <?php
			$row=$query->fetch(PDO::FETCH_ASSOC);
			if(empty($row)) { ?>
			
            	<h2>There are no users registered on this site! :(</h2>
                <button class="btn btn-default"><a href="register.php">Register Now!</a></button>
                </br>
                </br>
            
            <?php } else {
           
            do {
				
				$userId=$row['id'];
				$userName=$row['userName'];	
				$profilePic=$row['profilePic'];
				
				if(empty($profilePic)) { $profilePic = "defProfPic.jpg"; }
				?>
                
                
                 <div class="col-sm-3">
                  <div class="thumbnail">
                    <a href="publicprofile.php?userId=<?php echo $userId; ?>" >
                        <img class="img-responsive img-rounded" alt="" src="images/<?php echo $profilePic; ?>" />
                      	<h4><?php echo $userName ?></h4>
                    </a>    
                  </div>
                 </div>
                
        <?php }while($row=$query->fetch(PDO::FETCH_ASSOC)); }?>
            
</div>
<hr>
</div>
</div>

<?php include("_footer.php"); ?>

</body>
</html>
