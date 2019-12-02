<?php
	session_start();
	if(!empty($_SESSION['UN'])) 
	{
		// set timeout period in seconds
		$inactive = 1800;

		// check to see if $_SESSION['timeout'] is set
		if(isset($_SESSION['timeout']) )
		{
			$session_life = time() - $_SESSION['timeout'];
			if($session_life > $inactive)
				{ 
					session_destroy(); header("Location: signout.php"); 
				}
		}
				
		
		$_SESSION['timeout'] = time();
		if($_SESSION['UN'] != true)
		{
			header('Location: index.php');
			session_unset(); 

			session_destroy();
		}
	}
	
		include ("header.php");
?>
		<title>Review | Speed Travel</title>
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
			  <li class="nav-item"><a href="article.php?page=1" class="nav-link">Article</a></li>
			  <li class="nav-item"><a href="community.php?page=1" class="nav-link">Community</a></li>
			  <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
			<?php
					if(!empty($_SESSION['UN'])) 
					{	
						if($_SESSION['UN']=="admin")
						{
			   ?>
			   
							<li class="nav-item"><a href="admin.php" class="nav-link">Admin</a></li>
			   
			   <?php			
						}
					}
				?>
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
					<a href="profile.php">Profile</a>
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
	  </nav>
		<!-- END nav -->
    <!-- END nav -->
	
<?php
	if(isset($_POST['submitted']))
	{
		require_once("db_config.php");
		$dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
		mysqli_select_db($dbc, DB_NAME);
		$problem = FALSE;
		
		$un = $_SESSION['UN'];
		$un = mysqli_real_escape_string($dbc, $un);
		$hid = $_POST['hid'];
		$hid = mysqli_real_escape_string($dbc, $hid);
		$title = $_POST['title'];
		$title = mysqli_real_escape_string($dbc, $title);
		$review = $_POST['review'];
		$review = mysqli_real_escape_string($dbc, $review);
		$rate = $_POST['rating'];
		$rate = mysqli_real_escape_string($dbc, $rate);
		$visit = $_POST['element_1'];
		$visit = mysqli_real_escape_string($dbc, $visit);
		$month = $_POST['element_2'];
		$month = mysqli_real_escape_string($dbc, $month);
		
		$query = "INSERT INTO review_speedtravel(UN,hid,title,review,rate,lengthVisit,visitMonth,dateTime) VALUES ('$un','$hid','$title','$review','$rate','$visit','$month', NOW())";
?>
		<div class="hero-wrap js-fullheight" style="background-image: url('images/singapore.jpg');"  height="922px";>
		<center>
		<br><br><br><br><br><br>
		<div class="transbox">
		<h5><b>
<?php			
		if(@mysqli_query($dbc,$query))
		{
			echo "<script>setTimeout(\"location.href = 'index.php'\",3000);</script>";
			echo "<br><center> Your review is updated! You will be direct back to the page.<br><br></center>";
			exit();
?>
			
					</b></h5>
					<br class="brredirect"></br>
					</div>
					</center>
					</div>
<?php						
		}
		else
		{
			echo '<p style="color:red;">Could not add the entry because:<br>'.mysqli_connect_error($dbc).'</p><p>The query was:'.$query.'</p>';
		}
		
		mysqli_close($dbc);
	}
	else
	{
		if (!empty($_GET['id']))
		{
			$id = $_GET['id'];
		}
	}
?>
<div class="hero-wrap js-fullheight" style="background-image: url('images/Discover-Penang-Tour-4.png'); ">
		<br><br><br>
		<form action="review.php" method="post" class="contact-container">
			<h1 style="text-align:center ;color:#0030D7;">Review</h1>
 
		<div class="signin-signup-col">	
			<input class = "signin-signup-input-btn" type="text" name="title" placeholder="Title of your review" required>
		</div>
		<div class="signin-signup-col">	
			<fieldset class="rating">
				<b style="color:#0030D7; font-size:16px;">Please rate here :</b><br>
				<input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
				<input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
				<input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
				<input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
				<input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
			</fieldset><br>
		</div>
		 
		<div class="signin-signup-col">
		    <textarea class="message-input-btn"  name="review" placeholder="Your Review" rows="5" cols="60"></textarea>
					<br><br>
		</div>
		
		<div class="signin-signup-col">
		<b style="color:#0030D7; font-size:16px;">Recommended length of visit: </b><br>
		<span>
			<input id="element_1_1" name="element_1" class="element radio" type="radio" value="< 1 hour" />
				<label class="choice" for="element_1_1" style="color:#000000; font-size:16px;"> < 1 hour</label>
			<input id="element_1_2" name="element_1" class="element radio" type="radio" value="1 - 2 hours" />
				<label class="choice" for="element_1_2" style="color:#000000; font-size:16px;"> 1 - 2 hours</label>
			<input id="element_1_3" name="element_1" class="element radio" type="radio" value="2 - 3 hours" />
				<label class="choice" for="element_1_3" style="color:#000000; font-size:16px;"> 2 - 3 hours</label>
			<input id="element_1_4" name="element_1" class="element radio" type="radio" value="More than 3 hours" />
				<label class="choice" for="element_1_4" style="color:#000000; font-size:16px;">More than 3 hours</label>
		</span> 
		</div>
		
		<div class="signin-signup-col">
		<b style="color:#0030D7; font-size:16px;">When did you visit? </b><br>
		<div>
		<select class="element select medium" id="element_2" name="element_2"> 
			<option value="November 2018" selected="selected">November 2019</option>
			<option value="October 2018" >October 2019</option>
			<option value="September 2018" >September 2019</option>
			<option value="August 2018" >August 2019</option>
			<option value="July 2018" >July 2019</option>
			<option value="June 2018" >June 2019</option>
			<option value="May 2018" >May 2019</option>
			<option value="April 2018" >April 2019</option>
			<option value="March 2018" >March 2019</option>
			<option value="February 2018" >February 2019</option>
			<option value="January 2018" >January 2019</option>
			<option value="December 2017" >December 2019</option>
		</select>
		</div> 
		</div>

		<input type = "hidden" name = "hid" value = "<?php echo $id; ?>">
		<center><input class = "signin-signup-input-btn signin-signup-btn" type="submit"  value="Submit Review" name="submitted"></center>	
		<br>
		
		</div>
		</form>  
	

<?php
	include ("footer.php");
	include ("script.php");
?>
	</body>
	</div>
</html>