<?php
	session_start();
	if(!isset($_SESSION['id']))
	{
		header('Location: index.php?err=2');	
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<title>PhotoFolio | Upload</title>
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
          <h1>Image Upload</h1>                  
          <hr>
          <form class="form-horizontal" action="upload.php" method="post" enctype="multipart/form-data" runat="server">
              <div class="form-group">
                <label class="control-label col-sm-2" for="imageName">Image Name:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="imageName" name="imageName" placeholder="Image Name..." required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="imageDescription">Image Description:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="imageDescription" name="imageDescription" placeholder="Image Description..." required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="file">Image:</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" id="file" name="file" placeholder="Choose an image..." required>
                </div>
              </div>
              <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" name="submit" class="btn btn-default">Upload</button>
                </div>
              </div>
            </form>
            <?php
			if(isset($_REQUEST['submit']))
			{
	
	// open a new connection to MySql server.
	$con=mysqli_connect("localhost","root","","photofolio");
	
	// Check connection
	if(mysqli_connect_errno()) //returns the error code
	{
		//return the last error description
		echo "Failed to connect to MySql: " . mysqli_connect_error();
	}
	
	$iname=$_POST['imageName'];
	$userId=$_SESSION['id'];
	$iDescription=$_POST['imageDescription'];
	$file=$_FILES["file"]["name"];
	$size=$_FILES["file"]["size"];
	
	
	//Checking if 'image name' entered and 'File Attachment' has been done.
	if(empty($iname) || empty($file))
	{
		echo "<label class='err'>All fields are required</label>";
	}
	
	//Checking the File size. Maximum allowed size: 500,000 bytes (500 kb)
	elseif($size > 500000)
	{
		echo "<label class='err'>Image size must not be greater than 500kb</label>";
	}
	
	
	
	/* -- Few preparations for checking 
			the file type (extension) -- */
			
	//Store the allowed extensions in an array
	$allowedExts = array("gif", "jpeg", "jpg", "png", "pdf", "html", "plain", "txt", "doc", "docx");
	
	/* using explode() function, separate the 'File Name'
	and its 'Extension' into individual elements of an array: $temp */
	$temp = explode(".", $_FILES["file"]["name"]);
	
	/* the end() function returns the last element of an array.
	As per array $temp, First element: File name
						Last element: Extension */
	$extension = end($temp);
	
	/* -- Checking the File Type (extension) -- */
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "image/txt")
	|| ($_FILES["file"]["type"] == "image/png")
	|| ($_FILES["file"]["type"] == "application/pdf")
	|| ($_FILES["file"]["type"] == "text/html")
	|| ($_FILES["file"]["type"] == "text/plain"))
	&& ($_FILES["file"]["size"] <= 500000)
	&& in_array($extension, $allowedExts))
	/*The in_array() searches for a specific value in an array.
	Here, searches for $extension value in $allowedExts array */
	{
	/* If file is of allowed extension type, then further
	validations for file are processed. */
	
	
	
	// Checks if any error
	if($_FILES["file"]["error"] > 0)
	{
		echo "Return Code: " . $_FILES["file"]["error"] . "<br/>";
	}
	
	//Checks if the specific file already exists in the directory.
	elseif (file_exists("images/" . $_FILES["file"]["name"]))
	{
		echo $_FILES["file"]["name"] . "File upload already exists.";
	}
	
	/* On passing all validations, the file is moved from
	temporary location to the directory. */
	else
	{
		/* The move_uploaded_file() function moves an
		uploaded file to a new location */
		move_uploaded_file($_FILES["file"]["tmp_name"],
							"images/" . $_FILES["file"]["name"]);
							
		// Insert the 'Image name' and 'File Name' to the database
		mysqli_query($con, "INSERT INTO images (userid, imagePath, imageName, imageDescription)
											VALUES ('$userId', '$file', '$iname', '$iDescription')");
											
		echo "Data Entered Succesfully Saved!";
	}
}
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
