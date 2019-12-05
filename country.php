<?php
	include ("header.php");
?>
		<title>Country | Speed Travel</title>
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
			  <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
			  <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
			  <li class="nav-item active"><a href="country.php" class="nav-link">Country</a></li>
			  <li class="nav-item"><a href="community.php?page=0" class="nav-link">Community</a></li>
			  <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
			</ul>
		  </div>
		  <div class="profile-dropdown">
				<i class="fa fa-user profile-dropbtn nav-link" style = "border-radius: 50%" onclick="profileFunction()"></i>
			  <div class="profile-dropdown-content">
				<?php
					if(!empty($_SESSION['UN'])) 
					{	
						echo "<center>Welcome, <br><b>" .$_SESSION['UN']."   </b></center>";
				?>
					<a href="setting.php">Setting</a>
					<a href="signout.php">Sign Out</a>
				<?php
					}
					else
					{
				?>
					<a href="signin.php" >Sign In</a>
					<a href="signup.php">Sign Up</a>
				<?php
					}
				?>
			  </div>
			</div>
		</div>
	  </nav>
		<!-- END nav -->
		
		<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_3.jpg');">
			
      <div class="overlay">
	  </div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.php">Home</a></span> <span>Country</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Destination</h1>
          </div>
        </div>
		

	  <br><br><br>
			<div class="row-threeimg">
			  <div class="column-threeimg">
				<a href = "malaysia.php"><img src="images/malaysia_flag.png" alt="Malaysia" width = "250px" height = "130px">
				<h5>Malaysia</h5></a>
			  </div>
			  <div class="column-threeimg">
				<a href = "singapore.php"><img src="images/singapore_flag.png" alt="Singapore" width = "250px" height = "130px">
				<h5>Singapore</h5></a>
			  </div>
			  <div class="column-threeimg">
				<a href = "thailand.php"><img src="images/thailand_flag.png" alt="Thailand" width = "250px" height = "130px">
				<h5>Thailand</h5></a>
			  </div>
			</div>
	    </div>
	<br><br>
	
<?php
	include ("footer.php");
	include ("script.php");
?>
	</body>
</html>