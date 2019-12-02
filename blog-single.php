<?php
	require_once("db_config.php");
	$id = $_GET['id'];
	$title = $_GET['title'];
	
	$dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
	mysqli_select_db($dbc, DB_NAME);
	$query = "SELECT UN, title, description, imageName, lastUpdate FROM community_speedtravel WHERE id='$id'";
	
	if ($r = mysqli_query($dbc, $query))
	{
		$row = mysqli_fetch_array($r);
		
		$name = $row['UN'];
		$title = $row['title'];
		$des = $row['description'];
		$img = $row['imageName'];
		$lastupdate = $row["lastUpdate"];
		$lastupdate = strftime("%d/%m/%Y", strtotime($lastupdate));
	}
?>
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
	
	if (isset($_POST['deleteBlog']))
	{
		if (!empty($_SESSION['UN']))
		{
			if ($name == $_SESSION['UN'])
			{
				$query = "DELETE FROM community_speedtravel WHERE id='$id' LIMIT 1";
				//run the query
				$r = mysqli_query($dbc, $query);
				
				//check whether the affected row in the table equal 1
				if (mysqli_affected_rows($dbc) == 1)
				{
					echo "<script>setTimeout(\"location.href = 'community.php?page=1'\",1500);</script>";
					echo "<br><center> The blog has been deleted! Redireting to community page.<br><br></center>";
					exit();
				}
			}
		}
	}
?>
<?php
	include ("header.php");
?>
		<title><?php echo $title; ?> | Community | Speed Travel</title>
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
			  <li class="nav-item"><a href="article.php" class="nav-link">Article</a></li>
			  <li class="nav-item active"><a href="community.php" class="nav-link">Community</a></li>
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
		</div>
	  </nav>
		<!-- END nav -->
		
		<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_4.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.php">Home</a></span> <span>Community</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Community</h1>
          </div>
        </div>
      </div>
    </div>
	
	  <section class="ftco-section ftco-degree-bg">
		  <div class="container">
			<div class="row">
			  <div class="col-md-8 ftco-animate">
				<u><h2 class="mb-3"><?php echo $title; ?></h2></u>
				 <h5>By    <b><?php echo $name; ?></b>&emsp;&emsp;&emsp;<?php echo $lastupdate; ?></h5>
				<br>
				  <img src="images/<?php echo $img; ?>" alt="" onclick = "openPhoto()" class="img-fluid" id = "blogImg" style= "width: 400px; height: 400px; object-fit: cover;">
				  <br>
				  <br>
				  <h6><?php echo $des; ?></h6>
				  <div id="imgModal" class="blog-modal">
					  <span class="blog-close" onclick = "closePhoto()">&times;</span>
					  <img class="blog-modal-content" id="blog-img">
				  </div>
			  </div>
			  
			</div>
		  </div>

	  </section>
	  <div class="col-md-4 sidebar ftco-animate" style="float: right;">
				<?php
					if (!empty($_SESSION['UN']))
					{
						if ($name == $_SESSION['UN'])
						{
				?>			
							<center><p id="deleteBlogBtn" style = "color: red; cursor: pointer;" onclick = "openDelete()">Delete this post?</p></center>
							
							<div id="deleteBlogModal" class="delete-modal" >

							  <!-- Modal content -->
							  <div class="delete-modal-content">
								<div class="delete-modal-header">
								  <h2 style = "color: white;">Delete Blog?<span class="cancelcloseBtn" onclick = "closeDelete()">&times;</span></h2>
								</div>
								<div class="delete-modal-body">
								  <form action = "" method = "post"><br>
										<p>Are you sure you want to <font color = "red"><b>DELETE</b></font> this blog?</p>
									<button class = "deleteBlogSubmit" type = "submit" name = "deleteBlog" value = "Delete Blog">Delete</button>
								  </form>
								  <button id = "cancelBtn" class = "cancelBlogSubmit" onclick = "closeDelete()">Cancel</button>
								  <br><br><br>
								</div>
							  </div>
							</div>
				<?php
						}
					}
				?>
			  </div>
	  <br><br><br><br><br><br><br>
<?php
	include ("footer.php");
	include ("script.php");
?>
	</body>
</html>
<?php
	mysqli_close($dbc);
?>