<?php
	$dbc = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($dbc, 'speedtravel');
	
	$sql = "SELECT COUNT(*) FROM community_speedtravel";
	$query = mysqli_query($dbc, $sql);
	$row = mysqli_fetch_row($query);
	// Here we have the total row count
	$rows = $row[0];
	// This is the number of results we want displayed per page
	$page_rows = 8;
	// This tells us the page number of our last page
	$last = ceil($rows/$page_rows);
	// This makes sure $last cannot be less than 1
	if($last < 1){
		$last = 1;
	}
	// Establish the $pagenum variable
	$pagenum = 1;
	// Get pagenum from URL vars if it is present, else it is = 1
	if(isset($_GET['pn'])){
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}
	// This makes sure the page number isn't below 1, or more than our $last page
	if ($pagenum < 1) { 
		$pagenum = 1; 
	} else if ($pagenum > $last) { 
		$pagenum = $last; 
	}
	// This sets the range of rows to query for the chosen $pagenum
	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
	// This is your query again, it is for grabbing just one page worth of rows by applying $limit
	$read = "SELECT UN, title, description, imageName, lastUpdate FROM community_speedtravel ORDER BY id DESC $limit";
	$r = mysqli_query($dbc, $read);
	// This shows the user what page they are on, and the total number of pages
	//$textline1 = "Testimonials (<b>$rows</b>)";
	$textline1 = "Page <b>$pagenum</b> of <b>$last</b>";
	// Establish the $paginationCtrls variable
	$paginationCtrls = '';
	// If there is more than 1 page worth of results
	if($last != 1){
		/* First we check if we are on page one. If we are then we don't need a link to 
		   the previous page or the first page so we do nothing. If we aren't then we
		   generate links to the first page, and to the previous page. */
		if ($pagenum > 1) {
			$previous = $pagenum - 1;
			$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?page='.$previous.'">&lt;</a> &nbsp; &nbsp; ';
			// Render clickable number links that should appear on the left of the target page number
			for($i = $pagenum-4; $i < $pagenum; $i++){
				if($i > 0){
					$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i.'</a> &nbsp; ';
				}
			}
		}
		// Render the target page number, but without it being a link
		$paginationCtrls .= ''.$pagenum.' &nbsp; ';
		// Render clickable number links that should appear on the right of the target page number
		for($i = $pagenum+1; $i <= $last; $i++){
			$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i.'</a> &nbsp; ';
			if($i >= $pagenum+4){
				break;
			}
		}
		// This does the same as above, only checking if we are on the last page, and then generating the "Next"
		if ($pagenum != $last) {
			$next = $pagenum + 1;
			$paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?page='.$next.'">&gt;</a> ';
		}
	}
	$list = '';
	
?>
<?php
	session_start();
	
	if (isset($_POST['postBlog']) && !empty($_POST['blogTitle']) && !empty($_POST['blogDescription']) && !empty($_FILES['blogImage']))
	{
		$name = trim($_SESSION['UN']);
		$title = trim($_POST['blogTitle']);
		$des = trim($_POST['blogDescription']);
		$img = $_FILES['blogImage']['name'];
		
		if ($img != "")
		{
			$fileTmp = $_FILES['blogImage']['tmp_name'];
			$imgTmp = addslashes(file_get_contents($fileTmp));
			$imgFileType = strtolower(pathinfo($img,PATHINFO_EXTENSION));
			$imgExtension = array('jpg', 'png', 'jpeg', 'gif');
			
			if (in_array($imgFileType, $imgExtension))
			{
				move_uploaded_file($fileTmp, "images/" . $img);
				
				$query = "INSERT INTO community_speedtravel(UN, title, description, imageName, image, lastUpdate) VALUES ('$name', '$title', '$des', '$img', '$imgTmp', NOW())";
				
				if(mysqli_query($dbc, $query))
				{
					header("Location: community.php?page=1");
					exit();
				}
				else
				{
					echo '<p style="color:red;">Could not add the entry because:<br>'.mysqli_error($dbc).'</p><p>The query was:'.$query.'</p>';
				}
			}
			else
				echo "<script type='text/javascript'>alert('Please upload file having extensions .jpeg / .jpg / .png / .gif only.');</script>";
		}
		else
			echo "<script type='text/javascript'>alert('No file have been chosen. Please upload a file!');</script>";
		
		mysqli_close($dbc);
	}
	else
	{
	include ("header.php");
?>
		<title>Community | Speed Travel</title>
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
			  <li class="nav-item active"><a href="community.php" class="nav-link">Community</a></li>
			  <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
			</ul>
		  </div>
		  <div class="profile-dropdown">
				<i class="fa fa-user profile-dropbtn nav-link" style = "border-radius: 50%" onclick="profileFunction()"></i>
			  <div class="profile-dropdown-content">
				<a href="signin.php">Sign In</a>
				<a href="signup.php">Sign Up</a>
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


    <section class="ftco-section bg-light">
      <div class="container">
	  <?php
		if(!empty($_SESSION['UN'])) 
		{	
		?>
	  <button id="postBlogBtn" class = "postBlogBtn postBlogBtn-info">Post Blog</button>

		<!-- The Modal -->
		<div id="postBlogModal" class="modal">

		  <!-- Modal content -->
		  <div class="modal-content">
			<div class="modal-header">
			  <h2 style = "color: white;">Blog</h2>
			  <span class="closeBtn">&times;</span>
			</div>
			<div class="modal-body">
			  <form action = "" method = "post" enctype = "multipart/form-data"><br>
				Title<br>
				  <input class = "postBlogInput" id = "blogTitle" onkeyup = "blog();" type = "text" name = "blogTitle" required value = "<?php if (!empty($_POST['blogTitle'])) echo $_POST['blogTitle']; ?>"><br>
				  <span id = "msg1"></span><br>
				Description<br>
				  <textarea class = "postBlogTextarea" id = "blogDes" onkeyup = "blog();" name = "blogDescription" required value = "<?php if (!empty($_POST['blogDescription'])) echo $_POST['blogDescription']; ?>"></textarea><br>
				  <span id = "msg2"></span><br>
				<input type = "file" id = "blogImg" name = "blogImage" onchange="return fileValidation()" required value = "<?php if (!empty($_POST['blogImage'])) echo $_POST['blogImage']; ?>"><br><br>
				<div id = "imagePreview"></div><br><br>
				<input class = "postBlogSubmit" onclick = "return blogBtn()" type = "submit" name = "postBlog" value = "Post Blog">
			  </form>
			</div>
		  </div>
		</div>
		<?php
		}
		?>
		
		<p><?php echo $textline1; ?></p>
		<div class="row d-flex">
			<?php 
			
				while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
					$name = $row["UN"];
					$title = $row["title"];
					$des = $row["description"];
					$img = $row["imageName"];
					$lastupdate = $row["lastUpdate"];
					$lastupdate = strftime("%I:%M, %d/%m/%Y", strtotime($lastupdate));
					echo '<div class="col-md-3 d-flex ftco-animate">
						<div class="blog-entry align-self-stretch">
						  <a href="blog-single.html" class="block-20" style="background-image: url(\'images/'.$img.'\');">
						  </a>
						  <div class="text p-4 d-block">
							<span class="tag">Tips, Travel</span>
							<h3 class="heading mt-3"><a href="#">'.$title.'</a></h3>
							<div class="meta mb-3">
							  <div>'.$lastupdate.'</div>
							  <div>'.$name.'</div>
							  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
							</div>
						  </div>
						</div>
					  </div>';
				} 
			?>
			<div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
		</div>
      </div>
    </section>
	
<?php
	include ("footer.php");
	include ("script.php");
?>
	</body>
</html>
<?php
	}
	
?>
<div class="admin-container">
		  <h3>Centered Tabs</h3>
		  <p>To center/justify the tabs and pills, use the .nav-justified class. Note that on screens that are smaller than 768px, the list items are stacked (content will remain centered).</p>
		  <h3>Centered Pills</h3>
		  <ul class="admin-nav admin-nav-pills admin-nav-justified">
			<li class="active"><a data-toggle="pill" href="#home">Home</a></li>
			<li><a data-toggle="pill" href="#menu1">Menu 1</a></li>
			<li><a data-toggle="pill" href="#menu2">Menu 2</a></li>
			<li><a data-toggle="pill" href="#menu3">Menu 3</a></li>
		  </ul>
		  <div class="tab-content">
			<div id="home" class="tab-pane fade in active">
			  <h3>HOME</h3>
			  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
			<div id="menu1" class="tab-pane fade">
			  <h3>Menu 1</h3>
			  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			</div>
			<div id="menu2" class="tab-pane fade">
			  <h3>Menu 2</h3>
			  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
			</div>
			<div id="menu3" class="tab-pane fade">
			  <h3>Menu 3</h3>
			  <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
			</div>
		  </div>
		</div>