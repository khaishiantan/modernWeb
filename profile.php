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
	
	$dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
	if ($dbc == true)
	{
		$dbs = mysqli_select_db($dbc, DB_NAME);
		if ($dbs == true)
		{
			if (!empty($_SESSION['UN']))
			{
				$user = $_SESSION['UN'];

	include ("header.php");
?>
		
		<title>Profile | Speed Travel</title>

<?php
	include ("style.php");
?>
	</head>
	<body>
		<button onclick="topFunction()" id="scrollUpBtn" title="Go to top"><i class="up i_up"></i></button>
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
						
						
			?>
					<a href="profile.php" class = "active">Profile</a>
					<a href="signout.php">Sign Out</a>
		
						
				<?php
					}
					else
					{
				?>
					
					<a href="signin.php">Sign In</a>
					<a href="signup.php">Sign Up</a>
				<?php
					}
				?>
			
			  </div>
			</div>
</nav>
<div class="hero-wrap js-fullheight" style="background-image: url('images/penangBridge.jpg');">
		
     
	  
<br><br><br><br><br><br><br>

<?php
				$query = "SELECT * FROM signup_speedtravel WHERE UN='$user'";
				if ($r = mysqli_query($dbc, $query))
				{
					$row = mysqli_fetch_array($r);
					if ($user == $row['UN'])
					{
						$fn=$row['FN'];
						$ln=$row['LN'];
						$un=$row['UN'];
						$email=$row['EM'];
						$pw=$row['PW'];
?>
	<div class="transboxSetting">
		<div class="blockcenterSetting">
			<h6><br>
				First name :&emsp;<?php echo $fn; ?> <br><br>
				Last name :&emsp;<?php echo $ln; ?><br><br>
				Username :&emsp;<?php echo $un; ?><br><br>
				Email :&emsp;&emsp;&emsp;<?php echo $email; ?><br><br>
				Password : &emsp; ********** <br><br><br>
			</h6>
		</div>
		<center>
			<button id="settingUpdateBtn" class="settingUpdateBtn settingBtn-info" onclick = "openSetting()">Update</button>
		</center>
	</div>
	
	<div id="settingModal" class="modal">
		  <!-- Modal content -->
		  <div class="modal-content">
			<div class="modal-header">
			  <h2 style = "color: white;">Update your personal info</h2>
			  <span class="settingcloseBtn" onclick = "closeSetting()">&times;</span>
			</div>
			<div class="modal-body">
			  <form action = "" method = "post"><br>
				First name:<br>
				<input class = "settingInput" id = "firstName" type = "text" name = "FN"  value = "<?php echo $fn; if (!empty($_POST['FN'])) echo $_POST['FN']; ?>"><br>
				
				Last name:<br>
				<input class = "settingInput" id = "lastName" type = "text" name = "LN"  value = "<?php echo $ln; if (!empty($_POST['LN'])) echo $_POST['LN']; ?>"><br>
				
				Old Password:<br>
				<input class = "settingInput" id = "oldpass" type = "text" name = "oldPW"><br>
				
				New Password:<br>
				<input class = "settingInput" id = "pass" type = "text" name = "PW"><br>
				
				Confirm Password:<br>
				<input class = "settingInput" id = "conpass" type = "text" name = "conPW"><br>
				
				<input class = "settingSubmit"  type = "submit" name = "settingUpdate" value = "Update">
			  
			  </form>
			</div>
		  </div>		
	</div>
</div>
		<?php
					}
				}
						$count = "SELECT COUNT(budget_id) FROM favourite_speedtravel WHERE UN = '$un'";
						$r = mysqli_query($dbc, $count);
						$total = mysqli_fetch_array($r);
						$total = $total[0];
						
						if ($total > 0)
						{
							$query = "SELECT * FROM favourite_speedtravel WHERE UN = '$un'";
							if ($result = mysqli_query($dbc, $query))
							{
								$favs = array();
								while ($row = mysqli_fetch_array($result))
								{
									$budget_id = $row['budget_id'];
									$fav_id = $row['id'];
									array_push($favs, $fav_id);
									
									$q = "SELECT * FROM budget_speedtravel WHERE id = '$budget_id'";
									if ($r = mysqli_query($dbc, $q))
									{
										$row = mysqli_fetch_array($r);
										$id = $row['id'];
										$day = $row['day'];
										$place = $row['place'];
										$place = str_ireplace("^", "<br>", $place);
										$transport = $row['transport'];
										$transport = str_ireplace("^", "<br>", $transport);
										$hotel = $row['hotel'];
										$hotel = str_ireplace("^", "<br>", $hotel);
										$price = $row['price'];
					?>

		  <div class="container2">
			<div class="panel2 pricing-table">
			  <div class="pricing-plan">
				<img src="images/travel.png" alt="" class="pricing-img" style="width: 200px; height:200px;">
				<h2 class="pricing-header">
					<?php echo $day; 
						  if($day=="1")
						  {
					?> 
							DAY TRIP</h2>
					<?php
						  }
						  else
						  {
					?>
							  DAYS TRIP</h2>
					<?php 
						  }
					?>
					
				<ul class="pricing-features" style="list-style-type: none;">
				  <li class="pricing-features-item1"><?php echo $hotel; ?></li>
				  <li class="pricing-features-item2"><p><?php echo $place; ?></p></li>
				  <li class="pricing-features-item3"><p><?php echo $transport; ?></p></li>
				</ul>
				<span class="pricing-price"><p>Total : RM<?php echo $price; ?></p></span>
				<br>
				<div class = "fav-remove" id = "remove">
					<div id = "fav_remove" class = "favRemove"><?php echo $fav_id; ?></div>
					Remove from favourite?
				</div>
			  </div>
			  
			</div>
		  </div>
		  <br><br><br>

<?php
									}
								}
							}
						}
				
				if (isset($_POST['settingUpdate']))
				{
					if(!empty($_POST['FN']))
					{
						$nFN = trim($_POST['FN']);
						$query = "UPDATE signup_speedtravel SET FN='$nFN' WHERE UN='" . $_SESSION['UN'] . "'";
						$r = mysqli_query($dbc, $query);
						
						if (!(mysqli_affected_rows($dbc) == 1)) //The selected product will be edit if the database have the same data as what the user wish to edit
							echo "Unable to update.";
					}
					
					if(!empty($_POST['LN']))
					{
						$nLN = trim($_POST['LN']);
						$query = "UPDATE signup_speedtravel SET LN='$nLN' WHERE UN='" . $_SESSION['UN'] . "'";
						$r = mysqli_query($dbc, $query);
						
						if(!(mysqli_affected_rows($dbc) == 1))  //The selected product will be edit if the database have the same data as what the user wish to edit
							echo "Unable to update.";
					}
					
					if((!empty($_POST['oldPW'])) && (!empty($_POST['PW'])) && (!empty($_POST['conPW'])))
					{
						$oPW = trim($_POST['oldPW']);
						$nPW = trim($_POST['PW']);
						$cPW = trim($_POST['conPW']);
						$query="SELECT PW FROM signup_speedtravel";
						$r=mysqli_query($dbc, $query);
						$update=2;
						
						while($row=mysqli_fetch_array($r))
						{
							$pw = $row['PW'];
							if($pw==$oPW)
							{
								if ($nPW == $cPW)
								{
									$query = "UPDATE signup_speedtravel SET PW='$nPW' WHERE UN='" . $_SESSION['UN'] . "'";
									$r = mysqli_query($dbc, $query);
									$update=1;
									
									if (!(mysqli_affected_rows($dbc) == 1))  //The selected product will be edit if the database have the same data as what the user wish to edit
										echo "Unable to update.";
								}
							}
						}
						
						if($update==2)
						{
							if ($pw != $oPW)
								echo "<script type='text/javascript'>alert('Old Password not match!');</script>";
							else if ($nPW != $cPW)
								echo "<script type='text/javascript'>alert('New Password & Confirm Password not match!');</script>";
						}
					}
					
					echo "<script type='text/javascript'>alert('Your profile has been updated.');</script>";
					echo "<script>setTimeout(\"location.href = 'profile.php'\",0);</script>";
					exit();	
				}
			}
			else
				echo '<font color = "red">Could not select database because: </font>'.mysqli_error($dbc).'<br>';
			
			mysqli_close($dbc);
		} 
		else
			echo '<font color = "red">Could not connect to MySQL because: </font>'.mysqli_connect_error($dbc)."<br>";
	}
?>

<?php
	include ("footer.php");
	include ("script.php");
?>
	
</body>
</html>
