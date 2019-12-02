<?php
	session_start();
?>
<?php
	include ("header.php");
?>
		<title>Sign Out | Speed Travel</title>
		<head>
<?php
	include ("style.php");
?>
	</head>
	<body>
<?php
	include ("nav.php");
?>
<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
			  <li class="nav-item"><a href="article.php?page=1" class="nav-link">Article</a></li>
			  <li class="nav-item"><a href="community.php?page=1" class="nav-link">Community</a></li>
			  <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
			</ul>
			 </div>
			 <div class="profile-dropdown">
				<i class="fa fa-user profile-dropbtn nav-link" style = "border-radius: 50%" onclick="profileFunction()"></i>
			  <div class="profile-dropdown-content">
			   <div class="hero-wrap js-fullheight" style="background-image: url('images/KL.png');">
			  <?php
					if(!empty($_SESSION['UN'])) 
					{	
				?>
						<?php
					}
					else
					{
				?>
						<a href="signout.php" class="active">Sign Out</a>
						<a href="signup.php">Sign Up</a>
						<a href="signin.php">Sign In</h3></a>
				<?php
					}
				?>
			
			  </div>
			</div>
	  </nav>
<div class="hero-wrap js-fullheight" style="background-image: url('images/budget_wp.jpg');"  height="922px";>
			<center>
			<br><br><br><br><br><br>
			 <div class="transbox">
			<h5><b>
	 	
 <?php

	
 
	session_unset();
	echo "<script>setTimeout(\"location.href = 'index.php'\",1900);</script>";
	echo "Your have been logged out.<br><br>";
	echo "Redirecting to homepage.";
	exit();
	
 
?>
 </b></h5>
			<br class="brredirect"></br>
			</div>
			</center>
			</div>

</body>
</html>