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
	
		$imageName=$row['imageName'];
		$imageDescription=$row['imageDescription'];
		$imagePath=$row['imagePath'];
	
		}} ?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<title>PhotoPholio | Edit</title>
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
          <p><b><?php echo $_SESSION['userName']; ?></b></p>
			  <p><a href="editgallery.php">Back</a></p>
              <button class="btn btn-default text-right"><a href="userhome.php">Back To Gallery</a></button></br></br>
    </div>
        
   		<div class="col-sm-10">
          <h1>Edit Image</h1>                  
          <hr>
          <div class="container-fluid" align="center">
          	<img class="img-responsive" src="images/<?php echo $imagePath; ?>" style=" width:100%; height:100%; padding: 5%; max-height: 300px; max-width: 300px;">
          </div>
          <br>
          <form class="form-horizontal" action="edit_data.php?imageId=<?php echo $imageId; ?>" method="post" enctype="multipart/form-data" runat="server">
              <div class="form-group">
                <label class="control-label col-sm-2" for="imageName">Image Name:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="imageName" name="imageName" value="<?php echo $imageName; ?>" >
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="imageDescription">Image Description:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="imageDescription" name="imageDescription" value="<?php echo $imageDescription; ?>" >
                </div>
              </div>
              <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" name="submit" class="btn btn-default">Save</button>
                </div>
              </div>
            </form>
            <?php
			if(isset($_REQUEST['submit']))
			{
	
	// open a new connection to MySql server.
	$con=mysqli_connect("localhost","DunwoodyUser01","Z-k*HBqA01zS","DunwoodyCalebHDB");
	
	// Check connection
	if(mysqli_connect_errno()) //returns the error code
	{
		//return the last error description
		echo "Failed to connect to MySql: " . mysqli_connect_error();
	}
	
	$iname=$_POST['imageName'];
	$userId=$_SESSION['id'];
	$iDescription=$_POST['imageDescription'];
	$imageId=$_GET['imageId'];
	
							
		// Update the 'Image name' and 'Image Description' in the database
		mysqli_query($con, "UPDATE PP_images SET imageName='$iname', imageDescription='$iDescription' WHERE id='$imageId'");
											
		echo "Data Entered Succesfully Saved!";
		header('Location: userhome.php');

mysqli_close($con); //Close the database connection
			}
?>
          	
          <hr>
    	</div>          
 </div>
          <br>
		  <?php include("_footer.php"); ?>

</body>
</html>
