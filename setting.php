<?php
	require_once("db_config.php");
	session_start();
	
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
		
		<title>Speed Travel | Settings</title>

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
			  <li class="nav-item"><a href="country.php" class="nav-link">Country</a></li>
			  <li class="nav-item"><a href="community.php?page=0" class="nav-link">Community</a></li>
			  <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
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
					<a href="setting.php" class = "active">Setting</a>
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
				Email : &emsp;&emsp;<?php echo$email; ?><br><br>
				Password : &emsp; ********** <br><br><br>
			</h6>
		</div>
		<center>
			<button id="settingUpdateBtn" class="settingUpdateBtn settingBtn-info">Update</button>
		</center>
	</div>
	
	<div id="settingModal" class="modal">
		  <!-- Modal content -->
		  <div class="modal-content">
			<div class="modal-header">
			  <h2 style = "color: white;">Update your personal info</h2>
			  <span class="settingcloseBtn">&times;</span>
			</div>
			<div class="modal-body">
			  <form action = "" method = "post"><br>
				First name:<br>
				<input class = "settingInput" id = "firstName" onkeyup = "setting();" type = "text" name = "FN"  value = "<?php if (!empty($_POST['FN'])) echo $_POST['FN']; ?>"><br>
				
				Last name:<br>
				<input class = "settingInput" id = "lastName" onkeyup = "setting();" type = "text" name = "LN"  value = "<?php if (!empty($_POST['LN'])) echo $_POST['LN']; ?>"><br>
				
				Old Password:<br>
				<input class = "settingInput" id = "oldpass" onkeyup = "setting();" type = "text" name = "oldPW"  value = "<?php if (!empty($_POST['oldPW'])) echo $_POST['oldPW']; ?>"><br>
				
				New Password:<br>
				<input class = "settingInput" id = "pass" onkeyup = "setting();" type = "text" name = "PW"  value = "<?php if (!empty($_POST['PW'])) echo $_POST['PW']; ?>"><br>
				
				<input class = "settingSubmit"  type = "submit" name = "settingUpdate" value = "Update">
			  
			  </form>
			</div>
		  </div>		
	</div>
</div>

<?php				
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
					
					if((!empty($_POST['PW'])) && (!empty($_POST['PW'])))
					{
						$nPW = trim($_POST['PW']);
						$query="SELECT PW FROM signup_speedtravel";
						$r=mysqli_query($dbc, $query);
						$update=2;
						
						while($row=mysqli_fetch_array($r))
						{
							if($row['PW']==$_POST['oldPW'])
							{
								$query = "UPDATE signup_speedtravel SET PW='$nPW' WHERE UN='" . $_SESSION['UN'] . "'";
								$r = mysqli_query($dbc, $query);
								$update=1;
								
								if (!(mysqli_affected_rows($dbc) == 1))  //The selected product will be edit if the database have the same data as what the user wish to edit
									echo "Unable to update.";
							}
						}
						
						if($update==2)
						{
							echo "<script type='text/javascript'>alert('Wrong Password.');</script>";
						}
						
					}
					
					echo "<script>setTimeout(\"location.href = 'setting.php'\",0);</script>";
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
