<?php
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
		
        <div class="row d-flex">
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
              </a>
              <div class="text p-4 d-block">
              	<span class="tag">Tips, Travel</span>
                <h3 class="heading mt-3"><a href="#">8 Best homestay in Philippines that you don't miss out</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">August 12, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
              </a>
              <div class="text p-4">
              	<span class="tag">Culture</span>
                <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">August 12, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
              </a>
              <div class="text p-4">
              	<span class="tag">Tips, Travel</span>
                <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">August 12, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_4.jpg');">
              </a>
              <div class="text p-4">
              	<span class="tag">Tips, Travel</span>
                <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">August 12, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_5.jpg');">
              </a>
              <div class="text p-4 d-block">
              	<span class="tag">Tips, Travel</span>
                <h3 class="heading mt-3"><a href="#">8 Best homestay in Philippines that you don't miss out</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">August 12, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_6.jpg');">
              </a>
              <div class="text p-4">
              	<span class="tag">Culture</span>
                <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">August 12, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_7.jpg');">
              </a>
              <div class="text p-4">
              	<span class="tag">Tips, Travel</span>
                <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">August 12, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_8.jpg');">
              </a>
              <div class="text p-4">
              	<span class="tag">Tips, Travel</span>
                <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">August 12, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
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
/*
    include('config.php');  // include your code to connect to DB.
    $tbl_name="";       //your table name
    $adjacents = 3;

    $query = "SELECT COUNT(*) as num FROM $tbl_name";
    $total_pages = mysqli_fetch_array(mysqli_query($query));
    $total_pages = $total_pages[num];


    $targetpage = "filename.php";   //your file name  (the name of this file)
    $limit = 10;                                //how many items to show per page
    $page = $_GET['page'];
    if($page) 
        $start = ($page - 1) * $limit;          //first item to display on this page
    else
        $start = 0;                             //if no page var is given, set start to 0

    /* Get data. */
    /*$sql = "SELECT column_name FROM $tbl_name LIMIT $start, $limit";
    $result = mysqli_query($sql);

    /* Setup page vars for display. */
    /*if ($page == 0) $page = 1;                  //if no page var is given, default to 1.
    $prev = $page - 1;                          //previous page is page - 1
    $next = $page + 1;                          //next page is page + 1
    $lastpage = ceil($total_pages/$limit);      //lastpage is = total pages / items per page, rounded up.
    $lpm1 = $lastpage - 1;                      //last page minus 1

    /* 
        Now we apply our rules and draw the pagination object. 
        We're actually saving the code to a variable in case we want to draw it more than once.
    */
    /*$pagination = "";
    if($lastpage > 1)
    {   
        $pagination .= "<div class=\"pagination\">";
        //previous button
        if ($page > 1) 
            $pagination.= "<a href=\"$targetpage?page=$prev\">? previous</a>";
        else
            $pagination.= "<span class=\"disabled\">? previous</span>"; 

        //pages 
        if ($lastpage < 7 + ($adjacents * 2))    //not enough pages to bother breaking it up
        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class=\"current\">$counter</span>";
                else
                    $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
            }
        }
        elseif($lastpage > 5 + ($adjacents * 2)) //enough pages to hide some
        {
            //close to beginning; only hide later pages
            if($page < 1 + ($adjacents * 2))     
            {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                }
                $pagination.= "...";
                $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";       
            }
            //in middle; hide some front and some back
            elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
            {
                $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
                $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
                $pagination.= "...";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                }
                $pagination.= "...";
                $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";       
            }
            //close to end; only hide early pages
            else
            {
                $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
                $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
                $pagination.= "...";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                }
            }
        }

        //next button
        if ($page < $counter - 1) 
            $pagination.= "<a href=\"$targetpage?page=$next\">next ?</a>";
        else
            $pagination.= "<span class=\"disabled\">next ?</span>";
        $pagination.= "</div>\n";     
    }*/
?>