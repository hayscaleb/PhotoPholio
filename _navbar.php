<link rel="stylesheet" href="css/custom.css">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php" style="color:lightblue;">PhotoPholio</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      	<li><a href="galleries.php">Galleries</a></li>
        <li><a href="about.php">About</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php
		if(isset($_SESSION['userName'])) { ?>
      		<li><a href="userhome.php">Welcome <b style="color:lightblue;"><?php echo $_SESSION['userName'];?></b></a></li>
            <li><a href="logout.php">Logout</a></li>
		<?php } else { ?>
			<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        	<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>