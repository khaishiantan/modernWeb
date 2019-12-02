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
		<title>Sign Up | Speed Travel</title>
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
					<a href="signin.php">Sign In</a>
					<a href="signup.php" class = "active">Sign Up</a>
				<?php
					}
				?>
			  </div>
			</div>
		</div>
	  </nav>
	 
<?php
	if(isset($_POST['submitted']))
	{
		$dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
		mysqli_select_db($dbc, DB_NAME);
		$problem = FALSE;
		$queryc="SELECT UN,PW FROM signup_speedtravel";
		
		
		if($r=mysqli_query($dbc, $queryc))
		{

			
			while($row=mysqli_fetch_array($r))
			{
				$UN=$row['UN'];
				if($row['UN']==$_POST['UN'])
				{
					echo "<script type='text/javascript'>alert('Username is taken, choose another username.');</script>";
					$problem = TRUE;
					break;
				}					
			}
				if($_POST['rePass']==$_POST['PW'])
				{
					$UN = trim(strtolower($_POST['UN']));
					$PW = trim($_POST['PW']);
					$LN = trim($_POST['LN']);
					$FN = trim($_POST['FN']);
					$EM = trim($_POST['email']);
				}
				else
				{
					echo "<script type='text/javascript'>alert('Please make sure your passwords are match.');</script>";	
					$problem = TRUE;
				}
				
				if(!$problem)
				{
?>
						<div class="hero-wrap js-fullheight" style="background-image: url('images/singapore.jpg');"  height="922px";>
						<center>
						<br><br><br><br><br><br>
						 <div class="transbox">
						<h5><b>
<?php
					$query = "INSERT INTO signup_speedtravel(UN,PW,FN,LN,EM) VALUES('$UN','$PW','$FN','$LN','$EM')";
						
					if(mysqli_query($dbc,$query))
					{
				
						echo "<script>setTimeout(\"location.href = 'signin.php'\",1500);</script>";
						echo "<br><center> The record has been added! We will redirect you to login page.<br><br></center>";
						exit();
						
					}
					else
					{
						echo '<p style="color:red;">Could not add the entry because:<br>'.mysqli_connect_error($dbc).'</p><p>The query was:'.$query.'</p>';
					}
?>
						</b></h5>
						<br class="brredirect"></br>
						</div>
						</center>
						</div>
<?php
				}

			
		}
		mysqli_close($dbc);
	}
?>

	<div class="hero-wrap js-fullheight" style="background-image: url('images/singapore.jpg');"  height="922px";>
		 <br><br><br>
			
	<h2 style="text-align:center">Sign Up</h2>

	<form action="signup.php" method="post" class="signup-container">
	
	<div class="signin-signup-col">
		<!--ALLOW USER INPUT FIRST NAME-->
		<input class = "signin-signup-input-btn" type="text" name="FN" placeholder="First Name" required value = "<?php if (!empty($_POST['FN'])) echo $_POST['FN'];?>">
		
		<!--ALLOW USER TO INPUT USERNAME-->
		<input class = "signin-signup-input-btn" type="text" name="UN" placeholder="Username" required value = "<?php if (!empty($_POST['UN'])) echo $_POST['UN'];?>">
	</div>
	
	 <div class="signin-signup-col">
	 <!--ALLOW USER INPUT LAST NAME-->
		<input class = "signin-signup-input-btn" type="text" name="LN" placeholder="Last Name" required value = "<?php if (!empty($_POST['LN'])) echo $_POST['LN'];?>">
		
		<!--ALLOW USER TO INPUT EMAIL ADDRESS-->
		<input class = "signin-signup-input-btn" type="text" name="email" placeholder="Email@gmail.com" required pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" value = "<?php if (!empty($_POST['email'])) echo $_POST['email'];?>">	
	
		
	</div>
	
	
	
	
	<!--ALLOW USER TO SELECT THEIR GENDER-->
	<!--ONLY ONE OF THE SELECTION CAN BE SELECT-->
	 <div class="signin-signup-col">
	
	<select id="gender" name="Gender" class = "signin-signup-input-btn-gender" required>
		<option value = "" disabled selected>Gender</option>
		<option value="Female" <?php if (isset($_POST['Gender'])) if ($_POST['Gender'] == "Female") echo "selected"; ?>>Female</option>
		<option value="Male" <?php if (isset($_POST['Gender'])) if ($_POST['Gender'] == "Male") echo "selected"; ?>>Male</option>
		</select>
	<br>
	<!--ALLOW USER TO SELECT THEIR BIRTH DAY-->
	<!--ONLY ONE OF THE SELECTION CAN BE SELECT-->
		<select id="BD" name="day" required>
	
		<option value="" disabled selected>Day</option>
		<!--A FOR LOOP TO GENERATE DAYS FROM 1 TO 31 DAYS OF THE MONTH.-->
			<?php
				for($d=1;$d<=31;$d++)
					{
						echo"<option value=\"$d\"";
							if (isset($_POST['day']))
								if ($_POST['day'] == "$d")
									echo "selected";
						echo">$d</option>";
					}
			?>
		</select>
							
		<!--ALLOW USER TO SELECT THEIR BIRTH MONTH-->
		<!--ONLY ONE OF THE SELECTION CAN BE SELECT-->
	<select id="BD" name="month" required>
		<option value="" disabled selected>Month</option>
		<!--A FOR LOOP TO GENERATE MONTH FROM 1 TO 12 MONTHS OF THE YEAR.-->
			<?php
				for($m=1;$m<=12;$m++)
					{
						echo"<option value=\"$m\"";
							if (isset($_POST['month']))
								if ($_POST['month'] == "$m")
									echo "selected";
						echo">$m</option>";
					}
			?>
		</select>
		
		<!--ALLOW USER TO SELECT THEIR BIRTH YEAR-->
		<!--ONLY ONE OF THE SELECTION CAN BE SELECT-->			
	<select id="BD" name="year" required>
		<option value="" disabled selected>Year</option>
		<!--A FOR LOOP TO GENERATE YEAR FROM 1900 TO 2018 YEAR.-->
			<?php
				$year = date("Y");
				for($y=$year;$y>=1900;$y--)
					{
						echo"<option value=\"$y\"";
							if (isset($_POST['year']))
								if ($_POST['year'] == "$y")
									echo "selected";
						echo">$y</option>";
					}
			?>
		</select>
	
	<!--ALLOW USER TO INPUT PASSWORD AND HIDE THE PASSWORD THAT USER TYPE IN FOR SECURE MEASURE-->
</div>
<div class="signup-password-col">
	
	<input class = "signin-signup-input-btn" type="password" placeholder="Enter password" name="PW"  id="myInput1" required><br>
	<input type="checkbox" onclick="passFunction('myInput1')">Show Password<br>
	</div>
	<div class="signup-password-col-beside" style="margin-right: 53px;">
	<!--ALLOW USER TO RECONFIRM PASSWORD AND HIDE THE PASSWORD THAT USER TYPE IN FOR SECURE MEASURE-->
		<input class = "signin-signup-input-btn" type="password" placeholder="Re-Enter password" name="rePass"  id="myInput2" required><br>
		<input type="checkbox" onclick="passFunction('myInput2')">Show Password<br>
	
	</div>
	
	<!--WILL DIRECT TO SIGN IN PAGE IF THE USER REGISTER SUCCESSFULLY-->
<center><input class = "signin-signup-input-btn signin-signup-btn" type="submit"  value="Sign Up" name="submitted"></center>	
	
	</div>
</form>

<?php
	include ("footer.php");
	include ("script.php");
?>
	</body>
</html>