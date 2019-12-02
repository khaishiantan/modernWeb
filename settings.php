<?php
	session_start();
	
	$dbc = mysqli_connect('localhost', 'root', '');
	if ($dbc == true)
	{
		$dbs = mysqli_select_db($dbc, 'speedtravel');
		if ($dbs == true)
		{
			if (!empty($_SESSION['UN']))
			{
				$user = $_SESSION['UN'];
?>

<?php
	include ("header.php");
?>
		
		<title>Settings | Speed Travel</title>

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
				?>
						<?php echo "<p> Welcome, " .$_SESSION['UN']."   </p>";
						
						
			?>
			<a href="signout.php"onclick="return false">Sign Out</a>
		
						
				<?php
					}
					else
					{
				?>
					
					<a href="signin.php">Sign In</a>
					<a href="signup.php">Sign Up</a>
					<a href="settings.php"class = "active">Settings</a>
						<!--no need sign in 
						<a href="signin.php">Sign In</h3></a>-->
				<?php
					}
				?>
			
			  </div>
			</div>

	  </nav>
<div class="hero-wrap js-fullheight" style="background-image: url('images/KL.png');">
		
     
	  
<br><br><br><br><br><br><br>

		
		<!--<div class="blockcenter">-->
		
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
<div class="transboxProfile">
	<!--<a href = "settings.php?name='. $res['un'].'">--> 
					
					 <table align = "center">
							 First name:<br><?php echo $fn; ?> <br>
							 Last name:<br><?php echo $ln; ?><br>
							 Username:<br><?php echo $un; ?><br>
							 Email:<br><?php echo$email; ?><br>
							 Password:<br> <?php echo $pw; ?><br>
							
							 
							</table><br>
					<!--<table align = "center">
					<!--<td><button id="settingUpdateBtn">Update</button>
					<!--<td><form action=settings.php method="POST">
					<input type="submit" name="submit" value="Update">
					<td style=\"width: 170px;\"><font size=\"7px;\"><a href = "settings.php" >-->
					<!--</table>-->
			
<button id="settingUpdateBtn" class="settingUpdateBtn settingBtn-info">Update</button>		

			<!--how u set the link to name=...... de?// u mean which line de-->
<!-- The Modal -->

	<div id="settingModal" class="settingmodal">

		  <!-- Modal content -->
		  <div class="modal-content">
			<div class="modal-header">
			  <h2 style = "color: white;">Update your personal info</h2>
			  <span class="settingcloseBtn">&times;</span>
			</div>
			<div class="modal-body">
			  <form action = "" method = "post"><br>
				First name:<br>
				<input class = "settingInput" id = "firstName" onkeyup = "setting();" type = "text" name = "newFN"  value = "<?php if (!empty($_POST['FN'])) echo $_POST['FN']; ?>"><br>
				
				Last name:<br>
				<input class = "settingInput" id = "lastName" onkeyup = "setting();" type = "text" name = "newLN"  value = "<?php if (!empty($_POST['LN'])) echo $_POST['LN']; ?>"><br>
				
				Password:<br>
				<input class = "settingInput" id = "pass" onkeyup = "setting();" type = "text" name = "newPW"  value = "<?php if (!empty($_POST['PW'])) echo $_POST['PW']; ?>"><br>
				
				<input type = "hidden" name = "UN" value = "<?php echo $un; ?>">
				
				<input class = "settingSubmit"  type = "submit" name = "settingUpdate" value = "Update">
			  </form>
			</div>
		  </div>		
			<!--onclick = "settingBtn()"<span id = "msg1"></span><br><span id = "msg1"></span><br><span id = "msg1"></span><br>-->
	</div>		
<?php

		
			/*if (isset($user))//To make sure the data is being take
			{
				$query = "SELECT FN, LN , UN, EM, PW FROM signup_speedtravel WHERE UN='$user'";
				if ($r = mysqli_query($dbc, $query))
				{
					$res = mysqli_fetch_array($r); //fetches a result row as an associative array, a numeric array, or both.	
						  
				}
					else
						echo '<font color = "red">Could not retrieve data because: </font>'.mysqli_error($dbc).'<br>';//To display error message
			}*/
					}
				}
			}
			elseif (isset($_POST['settingUpdate'])) //If user had submit the form, the newly edited data entered will be recorded and dsiplay out.
			{
				if (!empty($_POST['newUN']))
				{
				//if (isset($_POST['FN'])&& (isset($_POST['LN']))&&(isset($_POST['PW']))) //To make sure the data is being read from database
				//{
					//If the user fill up all the require data, the data will being updat and display.
					$username = $_POST['UN'];
					
					if (!empty($_POST['newFN']))
					{
						$first = trim($_POST['FN']);
						$query = "UPDATE signup_speedtravel SET FN=\"$first\" WHERE UN=\"$username\" LIMIT 1";
						$r = mysqli_query($dbc, $query);//To run the $query in order to update and the data that user wish to change.
					
						if (mysqli_affected_rows($dbc) == 1) //The selected product will be edit if the database have the same data as what the user wish to edit
							echo '<center>Successfully <b>update</b><br></center>';
						else
							echo "Unable to delete or update.";
					}
					
					if (!empty($_POST['newLN']))
					{
						$last= trim($_POST['LN']);
						$query = "UPDATE signup_speedtravel SET LN=\"$last\" WHERE UN=\"$username\" LIMIT 1";
						$r = mysqli_query($dbc, $query);
						
						if (mysqli_affected_rows($dbc) == 1) //The selected product will be edit if the database have the same data as what the user wish to edit
							echo '<center>Successfully <b>update</b><br></center>';
						else
							echo "Unable to delete or update.";
					}
					
					if (!empty($_POST['newPW']))
					{
						$pass= trim($_POST['PW']);
						$query = "UPDATE signup_speedtravel SET PW=\"$pass\" WHERE UN=\"$username\" LIMIT 1";
						$r = mysqli_query($dbc, $query);
						
						if (mysqli_affected_rows($dbc) == 1) //The selected product will be edit if the database have the same data as what the user wish to edit
							echo '<center>Successfully <b>update</b><br></center>';
						else
							echo "Unable to delete or update.";
					}
				
				
				//User will be direct to another page once the record being saved.
					
				}	
				echo "<script>setTimeout(\"location.href = 'settings.php'\",1900);</script>";
					echo "<center><strong>The record has been <b>edited!</b> You will be direct back to settings page.</center></strong>";
					exit();	
			}
?>
</div>

</div>
</section>
<?php
	include ("footer.php");
	include ("script.php");
?>
	
</body>
</html>
		<!--</div>-->

<?php				
				
			
		}
		mysqli_close($dbc);
	
	}
?>