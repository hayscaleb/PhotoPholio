<?php
	session_start();
    
	if(isset($_SESSION['id']) && ($_SESSION['id'] == $_GET['userId'])) {
		header('Location: userhome.php');
	} else {
	
	$userId=$_GET['userId'];	
	include("connect.php");
	$imageQuery=$db->prepare("SELECT * FROM images WHERE userid='$userId'");
	$imageQuery->execute();
	$imageRow=$imageQuery->fetch(PDO::FETCH_ASSOC);
	$userQuery=$db->prepare("SELECT * FROM users WHERE id='$userId'");
	$userQuery->execute();
	$userRow=$userQuery->fetch(PDO::FETCH_ASSOC);
	$userName=$userRow['userName'];
	$userDescription=$userRow['myDescription'];
		
	if(($userRow['profilePic'])=="") { $profilePic = "defProfPic.jpg"; } else {
		$profilePic=$userRow['profilePic'];
	}}
		
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  	<title><?php echo $userName ?>'s Photos</title>
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
    <style>
		p#gallery {
			white-space: nowrap; 
			overflow: hidden; 
			display: block; 
			text-overflow: ellipsis;
		}
		
		p#gallery:hover {
			display: block; 
			overflow: visible;
			white-space: normal;
			background: white;			
		}
	</style>
</head>
<body>

<?php include("_navbar.php"); ?>


<div class="container-fluid" align="center">
	
    
    <div class="container-fluid text-center" align="center">
    <h2><?php echo $userName ?>'s Photos</h2>
    <img src="images/<?php echo $profilePic; ?>" alt="Profile Image" style="border-radius:50%; max-height: 150px; max-width:auto;">
    <?php 
		if($userDescription != "") { ?>
    	<h5 class="well"><?php echo $userDescription; ?></h5>
    <?php } ?>
    
    <hr>   
  <div class="row">
      <div class='list-group gallery'>
      
        <?php
			
			if(empty($imageRow)) { ?>
			
            	<h2>This user hasn't uploaded any images. :(</h2>
                </br>
                </br>
            
            <?php } else {
           
            do {
				
				$imageName=$imageRow['imageName'];
				$imagePath=$imageRow['imagePath'];
                $imageDescription=$imageRow['imageDescription'];	?>
                
                <div class="col-sm-4">
                    <a class="thumbnail fancybox" rel="ligthbox" href="images/<?php echo $imagePath; ?>" >
                        <img class="img-responsive" alt="" src="images/<?php echo $imagePath; ?>" id="viewscale" style=" width:100%; height:100%; padding: 5%;"/></a>
                        <h4><?php echo $imageName ?></h4>
                        <p id="gallery"><?php echo $imageDescription ?></p>
                        
                		<hr>
                        <br>
                        
                </div>
                
        <?php }while($imageRow=$imageQuery->fetch(PDO::FETCH_ASSOC)); }?>
        
      </div>
  </div>
</div>
<hr>
</div>
	
	




<?php include("_footer.php"); ?>

</body>
</html>
