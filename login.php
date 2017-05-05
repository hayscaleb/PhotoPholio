<!DOCTYPE html>
<html lang="en">
<head>
  	<title>PhotoPholio | Login</title>
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

<form action="authenticate.php" method="POST">
  <div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">
            <?php
			 //Associate array to display 2 types of error message.
			 $errors = array(	1=>"Invalid Username or Password. Try again.",
								2=>"Please login to access this area.",
								3=>"User Created Succesfully!");
						//Get the error id from URL
			if(isset($_GET['err']))
			{
				$error_id = $_GET['err'];
				if ($error_id == 1)
				{
					echo '<p class="text-danger" align="center">'.$errors[$error_id].'</p>';
				}
				if ($error_id == 2)
				{
					echo '<p class="text-danger" align="center">'.$errors[$error_id].'</p>';
				}
				if ($error_id == 3)
				{
					echo '<p class="text-info" align="center">'.$errors[$error_id].'</p>';
				}
			}
			?>
            <h4>Please Log In to Continue</h4>
            <input type="text" id="userName" class="form-control input-sm chat-input" placeholder="username" name="userName" />
            </br>
            <input type="password" id="userPassword" class="form-control input-sm chat-input" placeholder="password" name="userPassword" />
            </br>
            <div class="wrapper">
            <span class="group-btn">     
                <button type="submit" class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></button>
            </span>
            </div>
            </div>
        
        </div>
    </div>
</div>
</form>
<br>

<!-- Include the Footer -->
<?php include("_footer.php"); ?>

</body>
</html>