<?php
	require_once("db_config.php");
	$id = $_GET['id'];
	$title = $_GET['title'];
	
	$dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
	mysqli_select_db($dbc, DB_NAME);
	$query = "SELECT title, body, image, author FROM article_speedtravel WHERE id='$id'";
	
	if ($r = mysqli_query($dbc, $query))
	{
		$row = mysqli_fetch_array($r);
		
		$name = $row['author'];
		$name = str_ireplace("^", "<br>", $name);
		$title = $row['title'];
		$title = str_ireplace("^", "<br>", $title);
		$des = $row['body'];
		$des = str_ireplace("^", "<br>", $des);
		$img = $row['image'];
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
	
	if (isset($_POST['deleteArticle']))
	{
		if (!empty($_SESSION['UN']))
		{
			if ($_SESSION['UN'] == "admin")
			{
				$query = "DELETE FROM article_speedtravel WHERE id='$id' LIMIT 1";
				//run the query
				$r = mysqli_query($dbc, $query);
				
				//check whether the affected row in the table equal 1
				if (mysqli_affected_rows($dbc) == 1)
				{
					echo "<script>setTimeout(\"location.href = 'article.php?page=1'\",1500);</script>";
					echo "<br><center> The blog has been deleted! Redireting to article page.<br><br></center>";
					exit();
				}
			}
		}
	}
?>
<?php
	include ("header.php");
?>
		<title><?php echo $title; ?> | Article | Speed Travel</title>
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
			  <li class="nav-item active"><a href="article.php?page=1" class="nav-link">Article</a></li>
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
		</div>
	  </nav>
		<!-- END nav -->
		
		<div class="hero-wrap js-fullheight" style="background-image: url('images/<?php echo $img; ?>');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.php">Home</a></span> <span>Article</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Article</h1>
          </div>
        </div>
      </div>
    </div>
	
	  <section class="ftco-section ftco-degree-bg">
		  <div class="container">
			<div class="row">
			  <div class="col-md-8 ftco-animate">
				<h2 class="mb-3"><?php echo $title; ?></h2>
				
				<p><?php echo $des; ?></p>
				  <img src="images/<?php echo $img; ?>" alt="" onclick = "openPhoto()" class="img-fluid" id = "blogImg" style= "width: 400px; height: 400px; object-fit: cover;">
				  <div id="imgModal" class="blog-modal">
					  <span class="blog-close" onclick = "closePhoto()">&times;</span>
					  <img class="blog-modal-content" id="blog-img">
				  </div>
				<div class="about-author d-flex p-5 bg-light">
				  <div class="desc align-self-md-center">
					<h3><?php echo $name; ?></h3>
				  </div>
				</div>
			  </div>
			</section>
			  <div class="col-md-4 sidebar ftco-animate" style = "float: right;">
				<?php
					if (!empty($_SESSION['UN']))
					{
						if ($_SESSION['UN']=="admin")
						{
				?>			
							<center><p id="deleteBlogBtn" style = "color: red; cursor: pointer;" onclick = "openDelete()">Delete this article?</p></center>
							
							<div id="deleteBlogModal" class="delete-modal">

							  <!-- Modal content -->
							  <div class="delete-modal-content">
								<div class="delete-modal-header">
								  <h2 style = "color: white;">Delete Article?<span class="cancelcloseBtn" onclick = "closeDelete()">&times;</span></h2>
								</div>
								<div class="delete-modal-body">
								  <form action = "" method = "post"><br>
										<p>Are you sure you want to <font color = "red"><b>DELETE</b></font> this article?</p>
									<button class = "deleteBlogSubmit" type = "submit" name = "deleteArticle" value = "Delete Article">Delete</button>
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
			</div>
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