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
	
		

	if (isset($_POST['submit']))
	{
		header ("Location:search.php?search_entered=" . $_POST['search_entered']);
		exit;
	}
	else 
	{
		if (!empty($_GET['search_entered']))
		{
			$search = trim($_GET['search_entered']);
			
			require_once("db_config.php");
			$dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
			mysqli_select_db($dbc, DB_NAME);
			
			$query = "SELECT * FROM hotspot_speedtravel WHERE place = '$search'";
			
			if ($r = mysqli_query($dbc, $query))
			{
				$row = mysqli_fetch_array($r);
				
				$id = $row['id'];
				$place = $row['place'];
				$place = str_ireplace("^", "<br>", $place);
				$detail = $row['detail'];
				$detail = str_ireplace("^", "<br>", $detail);
				$location = $row['location'];
				$location = str_ireplace("^", "<br>", $location);
				$oh = $row['operatingHour'];
				$oh = str_ireplace("^", "<br>", $oh);
				$img = '<img src = "images/'.$row['image'].'" style= "width: 550px; height: 350px; object-fit: cover; margin-bottom:30px;">';				
			}
		}
		
		include ("header.php");
?>
		<title> <?php echo $_GET['search_entered']; ?> | Search | Speed Travel</title>
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
			  <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
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
		</div>
	  </nav>
		<!-- END nav -->
		
		<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_4.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.php">Home</a></span> <span>Search Results</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Search Results</h1>
          </div>
        </div>
      </div>
    </div>

	<div class="block-17 my-4" style = "margin-right: 30px; margin-left: 30px;">
	  <form action="" method="post" class="d-block d-flex">
		<div class="fields d-block d-flex" style = "border: #ccc 1px solid;">
		  <div class="textfield-search one-third">
			<div class = "auto-widget">
				<input type="text" class="form-control" id = "searchBox" placeholder="Ex: food, service, hotel" name="search_entered" value='<?php if (!empty($_GET['search_entered'])) echo $_GET['search_entered']; ?>'>
			</div>
		  </div>
		</div>
		<button type="submit" class="search-submit btn btn-primary" name = "submit" value="Search"><i class="fa fa-search"></i></button>
	  </form>
	</div>

	<br><br>
	<div class="searchDisplay">
	<?php
		if (empty($_GET['search_entered']))
		{
			echo '<center><p style = "color: red; font-size: 20px;">A keyword must be entered!</p></center>';
		}
		else if (!empty($place))
		{
		?>
	<center>
	<div class="box3">
  <div class="ribbon ribbon-top-left"><span>HOTSPOT</span></div><br><br>
	<h3>
<?php	
		echo $place;
	?>
	</h3><br>
	
	<h6>&emsp;&emsp;
	<?php	
		echo $detail;
	?>
	</h6><br><br>
	
	<p><b>Location : </b>
	<?php	
		echo $location;
	?>
	
	<br>
	<b>Operation Hours :</b>
	<?php	
		echo $oh;
	?> 
	</p>
	<br>
	<center>
	<?php	
		echo $img;
		
	?>
	</div>
	
	<?php
		if(!empty($_SESSION['UN'])) 
		{	
			?>
			
			
			<br><br>
			<button class="enjoy3-css"><a href="review.php?id=<?php echo $id; ?>">Add Review</a></button>	
			
			<?php
		}
	?> 
	</center>
	<br><br>
	
	</div>
	</center>
	<br>
	<div class = "reviewList">
<?php	
	if (!empty($_GET['search_entered']))
	{
		$query = "SELECT COUNT(*) FROM review_speedtravel WHERE hid = '$id' ORDER BY id DESC";
		$r = mysqli_query($dbc, $query);
		$totalRowCount = mysqli_fetch_array($r);
		$totalRowCount = $totalRowCount[0];
		
		$showLimit = 4;
		
		$query = "SELECT * FROM review_speedtravel WHERE hid = '$id' ORDER BY id DESC LIMIT $showLimit";
			
		if ($r = mysqli_query($dbc, $query))
		{
			if (mysqli_num_rows($r) > 0)
			{
				echo '<center><h2>Review</h2></center>';
				
				while($row = mysqli_fetch_array($r))
				{
					$p=1;
					$hid = $row['hid'];
					$hotId = $row['id'];
					$UN = $row['UN'];
					$title = $row['title'];
					$review = $row['review'];
					$rate = $row['rate'];
					$lengthVisit = $row['lengthVisit'];
					$visitMonth = $row['visitMonth'];
					$date = strftime("%d %B %Y", strtotime($row['dateTime']));
?>
<div class="container4">
					<div class="container3"> 
<div class="front3 side3">
		<div class="content3">
			<h2 style="color: #fff;"><?php echo $title; ?></h2>
			<h6><?php echo $review; ?>
			</h6>
			<p><?php echo $date; ?></p>
		</div>
	</div>
				
				<div class="back3 side3">
		<div class="content3">
			<h1 style="color: #fff;">by <?php echo $UN; ?></h1>
			<br><br>
				<h5 style="color: #fff;">Recommended length of visit: <?php echo $lengthVisit; ?><br><br>
					Visit on <?php echo $visitMonth; ?></h5>
					<br><br>
				  <h2 class="rate">
<?php
				for($i=0;$i<$rate;$i++)
				{
?>				
					<i class="icon-star"></i>
<?php
				}
			
					$left=5-$rate;
			
				for($b=0;$b<$left;$b++)
				{
?>
					<i class="icon-star-o"></i>
<?php
				}
?>			
				<span style="color: #fff;"><?php echo $rate; ?> Rating</span></h2>
  
    </div>
	</div>
			</div>	
			</div>
				
<?php
				}
			}	
		}
		
		if($totalRowCount > $showLimit)
		{
	?>
        <div class="show_more_main" id="show_more_main<?php echo $hotId; ?>">
            <span id="<?php echo $hotId; ?>|<?php echo $hid; ?>" class="show_more" title="Load more posts">Show more</span>
            <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
        </div>
    <?php
		}
	}
		}
		else
			echo '<center><p style = "color: red; font-size: 20px;">No search results found!</p></center>';
?>

	</div>



	
<?php
	include ("footer.php");
	include ("script.php");
?>
	</body>
</html>
<?php
	}
?>