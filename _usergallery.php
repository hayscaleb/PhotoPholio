<?php
	if(!isset($_SESSION['id']))
	{
		header('Location: index.php');	
	} else {
		
	include("connect.php");
	$userId=$_SESSION['id'];
	$query=$db->prepare("SELECT * FROM images WHERE userid='$userId'");
	$query->execute();
	
	} ?>
	
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

<div class="container-fluid text-center">    
  <div class="row">
      <div class='list-group gallery'>
      
        <?php
			$row=$query->fetch(PDO::FETCH_ASSOC);
			if(empty($row)) { ?>
			
            	<h2>You haven't uploaded any images. :(</h2>
                <button class="btn btn-default"><a href="upload.php">Upload Pictures</a></button>
                </br>
                </br>
            
            <?php } else {
           
            do {
				
				$imageName=$row['imageName'];
				$imagePath=$row['imagePath'];
                $imageDescription=$row['imageDescription'];	?>
                
                <div class="col-sm-4">
                    <a class="thumbnail fancybox" rel="ligthbox" href="images/<?php echo $imagePath; ?>" >
                        <img class="img-responsive" alt="" src="images/<?php echo $imagePath; ?>" id="viewscale" style=" width:100%; height:100%; padding: 5%;"/></a>
                        <h4><?php echo $imageName ?></h4>
                        <p id="gallery"><?php echo $imageDescription ?></p>
                        
                        <hr>
                        <br>
                        <br>
                </div>
                
        <?php }while($row=$query->fetch(PDO::FETCH_ASSOC)); }?>
        
      </div>
  </div>
</div>
