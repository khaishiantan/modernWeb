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
		<title>Contact Us | Speed Travel</title>
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
			  <li class="nav-item"><a href="article.php?page=1" class="nav-link">Article</a></li>
			  <li class="nav-item"><a href="community.php?page=1" class="nav-link">Community</a></li>
			  <li class="nav-item active"><a href="contact.php" class="nav-link">Contact</a></li>
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
		
		if (!empty($_POST['message']))
		{
			$query = "INSERT INTO contact_speedtravel(name,email,message,reply,date) VALUES ('$_POST[name]','$_POST[email]','$_POST[message]','Not reply', NOW())";
					
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
				echo "<br><center> Thank you, we received your feedback! You will be direct back to homepage.<br><br></center>";
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
			echo "<script type='text/javascript'>alert('Please enter your message!');</script>";
	}
?>
		<div class="hero-wrap js-fullheight" style="background-image: url('images/penangBridge.jpg'); ">
		<br><br><br>
		<form action="contact.php" method="post" class="contact-container">
			<h2 style="text-align:center">Contact Us</h2>
 
		<div class="signin-signup-col">	
			<input class = "signin-signup-input-btn" type="text" name="name" placeholder="Name" required value = "<?php if (!empty($_POST['name'])) echo $_POST['name'];?>">
		</div>
		
		<div class="signin-signup-col">
			<input class = "signin-signup-input-btn" type="text" name="email" placeholder="Email" required pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" value = "<?php if (!empty($_POST['email'])) echo $_POST['email'];?>">	
		</div>
		 
		<div class="signin-signup-col">
		    <textarea class="message-input-btn" name="message" placeholder="Enter message" rows="5" cols="60" value = "<?php if (!empty($_POST['message'])) echo $_POST['message'];?>"></textarea>
					<br><br>
		</div>

		<center><input class = "signin-signup-input-btn signin-signup-btn" type="submit"  value="Submit message" name="submitted"></center>	
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
<?php
	
?>