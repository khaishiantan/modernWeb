<?php
	require_once("db_config.php");
	$dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
	mysqli_select_db($dbc, DB_NAME);
	
    $query = "SELECT COUNT(*) FROM article_speedtravel";
	$result = mysqli_query($dbc, $query);
    $total_pages = mysqli_fetch_array($result);
    $total_pages = $total_pages[0];

    $limit = 8;                                //how many items to show per page
	$page = 1;
	if(isset($_GET['page'])){
		$page = preg_replace('#[^0-9]#', '', $_GET['page']);
	}
    if($page) 
        $start = ($page - 1) * $limit;          //first item to display on this page
    else
        $start = 0;                             //if no page var is given, set start to 0

    /* Get data. */
    $sql = "SELECT id, title, body, author, image FROM article_speedtravel ORDER BY id DESC LIMIT $start, $limit";
    $result = mysqli_query($dbc, $sql);

    /* Setup page vars for display. */
    if ($page == 0) $page = 1;                  //if no page var is given, default to 1.
    $prev = $page - 1;                          //previous page is page - 1
    $next = $page + 1;                          //next page is page + 1
    $lastpage = ceil($total_pages/$limit);      //lastpage is = total pages / items per page, rounded up.
    $lpm1 = $lastpage - 1;                      //last page minus 1

    /* 
        Now we apply our rules and draw the pagination object. 
        We're actually saving the code to a variable in case we want to draw it more than once.
    */
    $pagination = "";
    if($lastpage > 1)
    {   
        $pagination .= "<div class=\"page-align\">";
        //previous button
        if ($page > 1)
		{
            $pagination.= '<a href="'.$_SERVER['PHP_SELF'].'?page='.$prev.'" class = "page">&lt;</a> &nbsp; &nbsp; ';
			
			for($i = $page-4; $i < $page; $i++){
				if($i > 0){
					$pagination.= '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'" class = "page">'.$i.'</a> &nbsp; ';
				}
			}
		}
        $pagination.= '<a href="'.$_SERVER['PHP_SELF'].'?page='.$page.'" class = "page-active">'.$page.'</a> &nbsp; ';
		
        for($i = $page+1; $i <= $lastpage; $i++){
			$pagination.= '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'" class = "page">'.$i.'</a> &nbsp; ';
			if($i >= $page+4){
				break;
			}
		}

        //next button
        if ($page != $lastpage) 
            $pagination.= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?page='.$next.'" class = "page">&gt;</a> ';
		
        $pagination.= "</div>\n";     
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
	
	if (isset($_POST['postArt']) && !empty($_POST['artTitle']) && !empty($_POST['artDescription']) && !empty($_FILES['artImage']))
	{
		if (empty($_POST['artAuthor']))
			$name = trim($_SESSION['UN']);
		else
			$name = trim($_POST['artAuthor']);
		
		$name = mysqli_real_escape_string($dbc, $name);
		$title = trim($_POST['artTitle']);
		$title = mysqli_real_escape_string($dbc, $title);
		$des = trim($_POST['artDescription']);
		$des = mysqli_real_escape_string($dbc, $des);
		$img = $_FILES['artImage']['name'];
		
		if ($img != "")
		{
			$fileTmp = $_FILES['artImage']['tmp_name'];
			$imgTmp = addslashes(file_get_contents($fileTmp));
			$imgFileType = strtolower(pathinfo($img,PATHINFO_EXTENSION));
			$imgExtension = array('jpg', 'png', 'jpeg', 'gif');
			
			if (in_array($imgFileType, $imgExtension))
			{
				move_uploaded_file($fileTmp, "images/" . $img);
				
				$query = "INSERT INTO article_speedtravel(title, body, author, image) VALUES ('$title', '$body', '$name', '$img')";
				
				if(mysqli_query($dbc, $query))
				{
					header("Location: article.php?page=1");
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
		<title>Article | Speed Travel</title>
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
			  <li class="nav-item active"><a href="article.php" class="nav-link">Article</a></li>
			  <li class="nav-item"><a href="community.php" class="nav-link">Community</a></li>
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
		
		<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_3.jpg');">
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


    <section class="ftco-section bg-light">
      <div class="container">
	  <?php
		if(!empty($_SESSION['UN'])) 
		{	
			if($_SESSION['UN']=="admin")
			{
		?>
	  <button id="postBlogBtn" onclick = "openModal()" class = "postBlogBtn postBlogBtn-info">Post Article</button>

		<!-- The Modal -->
		<div id="postBlogModal" class="modal">

		  <!-- Modal content -->
		  <div class="modal-content">
			<div class="modal-header">
			  <h2 style = "color: white;">Article</h2>
			  <span class="closeBtn" onclick = "closeModal()">&times;</span>
			</div>
			<div class="modal-body">
			  <form action = "" method = "post" enctype = "multipart/form-data"><br>
				Author<br>
				  <input class = "postBlogInput" type = "text" name = "artAuthor" value = "<?php if (!empty($_POST['artAuthor'])) echo $_POST['artAuthor']; ?>"><br>
				Title<br>
				  <input class = "postBlogInput" id = "blogTitle" onkeyup = "blog();" type = "text" name = "artTitle" required value = "<?php if (!empty($_POST['artTitle'])) echo $_POST['artTitle']; ?>"><br>
				  <span id = "msg1"></span><br>
				Description<br>
				  <textarea class = "postBlogInput" id = "blogDes" onkeyup = "blog();" name = "artDescription" required value = "<?php if (!empty($_POST['artDescription'])) echo $_POST['artDescription']; ?>"></textarea><br>
				  <span id = "msg2"></span><br>
				<input type = "file" id = "blogImg" name = "artImage" onchange="return fileValidation()" required value = "<?php if (!empty($_POST['artImage'])) echo $_POST['artImage']; ?>"><br><br>
				<div id = "imagePreview"></div><br>
			</div>
			<div class = "modal-footer">
				<input class = "postBlogSubmit" onclick = "return blogBtn()" type = "submit" name = "postArt" value = "Post Article">
			  </form>
			</div>
		  </div>
		</div>
		<?php
			}
		}
		?>
		
		<div class="row d-flex">
			<?php 
			
				while($row = mysqli_fetch_array($result))
				{
					$id = $row["id"];
					$name = $row["author"];
					$title = $row["title"];
					$img = $row["image"];
					echo '<div class="col-md-3 d-flex ftco-animate">
						<div class="blog-entry align-self-stretch" style="width: 209px;">
						  <a href="article-single.php?id='.$id.'&title='.$title.'" class="block-20" style="background-image: url(\'images/'.$img.'\'); width: 209px; height: 250px; object-fit: fit;">
						  </a>
						  <div class="text p-4 d-block">
							<h3 class="heading mt-3" style=" white-space: nowrap; width: 170px; overflow: hidden;text-overflow: ellipsis;"><a href="article-single.php?id='.$id.'&title='.$title.'">'.$title.'</a></h3>
							<div class="meta mb-3">
							  <div>'.$name.'</div>
							</div>
						  </div>
						</div>
					  </div>';
				} 
			?>
		</div>
		<?php echo $pagination; ?>
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