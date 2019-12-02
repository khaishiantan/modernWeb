<?php
	require_once("db_config.php");
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
		<title>Sign In | Speed Travel</title>
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
			  <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
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
				<i class="fa fa-user profile-dropbtn nav-link active" style = "border-radius: 50%" onclick="profileFunction()"></i>
			  <div class="profile-dropdown-content">
			  <?php
					if(!empty($_SESSION['UN'])) 
					{	
						echo "<center>Welcome, <br><b>" .$_SESSION['UN']."   </b></center>";
					}
					else
					{
				?>
					<a href="signin.php" class = "active">Sign In</a>
					<a href="signup.php">Sign Up</a>
				<?php
					}
				?>
			  </div>
			</div>
		</div>
	  </nav>
		<!-- END nav -->
    <!-- END nav -->
	
<?php
	if(isset($_POST['submitted']))
	{
		if($dbc=mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD))
		{
			mysqli_select_db($dbc, DB_NAME);
			$query="SELECT UN,PW FROM signup_speedtravel";

			if($r=mysqli_query($dbc, $query))
			{
				while($row=mysqli_fetch_array($r))
				{
					
					$UN=$row['UN'];
					$PW=$row['PW'];
					if($_POST['UN']==$row['UN'] && $_POST['PW']==$row['PW']) 
					{
?>
					<div class="hero-wrap js-fullheight" style="background-image: url('images/KL.png');" >
					<center>
					<br><br><br><br><br><br>
					 <div class="transbox">
					<h5><b>
<?php
					// Register $UN, $PW and redirect to file "signin.php"
					echo "Welcome, ";
					echo $_SESSION['UN'] = $UN;
					echo "<br>";
					echo "<script>setTimeout(\"location.href = 'index.php'\",1900);</script>";
					echo "Sign in successful, we will redirect you to homepage.<br><br>";
					
					exit();
?>
			
					</b></h5>
					<br class="brredirect"></br>
					</div>
					</center>
					</div>
<?php					
					} 
				}
				echo "<script type='text/javascript'>alert('Wrong Username or password.');</script>";
			}
			else
			{
				echo '<p style="color:red;">Could not retrieve data because:<br>/>'.mysqli_error($dbc).'.</p><p>The query being run was:'.$query.'</p>';
			}
	
			mysqli_close($dbc);
	
		}
		
	}		
?>

	    <div class="hero-wrap js-fullheight" style="background-image: url('images/KL.png');">
		
<br><br><br><br><br><br><br>
		<form action="signin.php" method="post" class="signin-signup-container">
		
		
			<h2 style="text-align:center">Sign In</h2>
			

			  <div class="signin-signup-col signin-col">
				
			<input class = "signin-signup-input-btn" type="text" name="UN" placeholder="Username" required value = "<?php if (!empty($_POST['UN'])) echo $_POST['UN'];?>">
		
			<input class = "signin-signup-input-btn" type="password" placeholder="Enter password" name="PW"  id="myInput3" required><br>
			<input type="checkbox" onclick="passFunction('myInput3')"><font size="3">Show Password</font>

		
			<br>
	
			<center><input class = "signin-signup-input-btn signin-signup-btn" type="submit" value="Sign In" name="submitted"></center>
			
			<br>
		 </div>
</div>
</form> 

<?php
	include ("footer.php");
	include ("script.php");
?>
	</body>
	</div>
</html>