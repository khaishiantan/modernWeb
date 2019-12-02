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
	else if (isset($_POST['bSubmit']))
	{
		if (isset($_POST['budget']) && isset($_POST['day']))
		{
			$budget = explode(",", $_POST['budget']);
			$day = $_POST['day'];
			header ("Location:budget.php?budget-min=" . $budget[0] . "&budget-max=" . $budget[1] . "&day=" . $day);
			exit;
		}
		else if (isset($_POST['budget']))
		{
			$budget = explode(",", $_POST['budget']);
			$day = $_POST['day'];
			header ("Location:budget.php?budget-min=" . $budget[0] . "&budget-max=" . $budget[1]);
			exit;
		}
	}
	else 
	{
		include ("header.php");
?>
		<title>Home | Speed Travel</title>
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
    
    <div class="hero-wrap js-fullheight" style="background-image: url('images/destination-2.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><strong>Explore <br></strong> your amazing city</h1>
            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Know more, travel more</p>
            <div class="block-17 my-4">
              <form action="" method="post" class="d-block d-flex">
                <div class="fields d-block d-flex">
                  <div class="textfield-search one-third">
					<div class = "auto-widget">
						<input type="text" class="form-control" id = "searchBox" placeholder="Ex: Fort Cornwallis,Penang Hill" name="search_entered" value='<?php if (!empty($_POST['search_entered'])) echo $_POST['search_entered']; ?>'>
					</div>
                  </div>
                </div>
                <button type="submit" class="search-submit btn btn-primary" name = "submit" value="Search"><i class="fa fa-search"></i></button>
              </form>
            </div>
			<?php if(isset($_POST['submit'])) { if(empty($_POST['search_entered'])) { echo "<redtext>A keyword must be entered!</redtext>"; } } ?>
		
          </div>
        </div>
      </div>
    </div>
	<br><br><br>

    <section class="ftco-section services-section bg-light">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-guarantee"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Budget Planning</h3>
                <p>Hotel Plans According to your budget</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-like"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Travellers Love Us</h3>
                <p>Many traveller's favourite</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-detective"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Best Travel Agent</h3>
                <p>Detailed information that will prepare you for an exciting trip</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-support"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Our Dedicated Support</h3>
                <p>Quick responses to your questions and needs</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>
    
    <section class="ftco-section ftco-destination bg-light">
    	<div class="container">
    		<div class="row justify-content-start mb-5 pb-3">
          <h2><center>Destination to travel in Penang</center></h2>
        </div>
    		<div class="row">
    			<div class="col-md-12">
    				<div class="destination-slider owl-carousel ftco-animate">
    					<div class="item">
		    				<div class="destination">
		    					<a href="index.php" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/penang_aerial.jpg);">
		    					</a>
		    					<div class="text p-3">
		    						<h3>Penang Hill</h3>
		    						<span class="listing"></span>
		    					</div>
		    				</div>
	    				</div>
	    				<div class="item">
		    				<div class="destination">
		    					<a href="index.php" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/manila_aerial.jpg);">
		    					</a>
		    					<div class="text p-3">
		    						<h3>Heritage, Georgetown</h3>
		    						<span class="listing"></span>
		    					</div>
		    				</div>
	    				</div>
	    				<div class="item">
		    				<div class="destination">
		    					<a href="index.php" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/bangkok_aerial.jpg);">
		    					</a>
		    					<div class="text p-3">
		    						<h3>Kek Lok Si Temple</h3>
		    						<span class="listing"></span>
		    					</div>
		    				</div>
	    				</div>
	    				
	    				<div class="item">
		    				<div class="destination">
		    					<a href="index.php" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/phnom_aerial.jpg);">
		    					</a>
		    					<div class="text p-3">
		    						<h3>Penang Bridge</h3>
		    						<span class="listing"></span>
		    					</div>
		    				</div>
	    				</div>
	    				<div class="item">
		    				<div class="destination">
		    					<a href="index.php" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/jakarta_aerial.jpeg);">
		    					</a>
		    					<div class="text p-3">
		    						<h3>Entopia</h3>
		    						<span class="listing"></span>
		    					</div>
		    				</div>
	    				</div>
						<div class="item">
		    				<div class="destination">
		    					<a href="index.php" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/fort.jpg);">
		    					</a>
		    					<div class="text p-3">
		    						<h3>Fort Cornwallis</h3>
		    						<span class="listing"></span>
		    					</div>
		    				</div>
	    				</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-start mb-5 pb-3">
          <h2>Hotel</h2>
        </div>    		
    	</div>
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="destination">
    					<a href="https://www.tunehotels.com/promotion-offer-en/book-direct-best-price-guarantee/?gclid=Cj0KCQiAw5_fBRCSARIsAGodhk8pXcGF6yTVMrAO2d1wWB6hFnFqzQjSjk6b2Rd5dBcxRMhityXoZ1oaAlNTEALw_wcB" target="_blank" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/pullman-jakarta.jpg);">
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
    					</a>
    					<div class="text p-3">
    						<div class="d-flex">
    							<div class="one">
		    						<h3><a href="https://www.tunehotels.com/promotion-offer-en/book-direct-best-price-guarantee/?gclid=Cj0KCQiAw5_fBRCSARIsAGodhk8pXcGF6yTVMrAO2d1wWB6hFnFqzQjSjk6b2Rd5dBcxRMhityXoZ1oaAlNTEALw_wcB" target="_blank">Tune Hotel, Georgetown Penang</a></h3>
		    						<p class="rate">
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star-o"></i>
		    							<i class="icon-star-o"></i>
		    							<span>3 Rating</span>
		    						</p>
	    						</div>
	    						<div class="two">
	    							<span class="price per-price">RM 86<br><small>/night</small></span>
    							</div>
    						</div>
    						<p>Set 2.7 km from the lively Gurney Drive seafront promenade, this vibrant, streamlined budget hotel is 8 km from the revered, grand Kek Lok Si temple and 10 km from the scenic Penang Hill look-out point. </p>
    						<hr>
    						<p class="bottom-area d-flex">
    							<span><i class="icon-map-o"></i> Tune Hotel</span> 
    							<span class="ml-auto"><a href="https://www.agoda.com/en-gb/tune-hotel-georgetown-penang/hotel/penang-my.html?checkin=2018-11-16&los=1&adults=2&rooms=1&cid=1415444&tag=f6961e14-3e82-8bbd-a599-87d9c2d4c137,f6961e14-3e82-8bbd-a599-87d9c2d4c137,f6961e14-3e82-8bbd-a599-87d9c2d4c137&searchrequestid=375c6757-7292-46cd-af70-a50b0e562ee3&tspTypes=8&ssri=0&tabbed=true" target="_blank">Book Now</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="destination">
    					<a href="http://www.inkhotelpenang.com/" target="_blank" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/shangri-la-kl.jpg);">
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
    					</a>
    					<div class="text p-3">
    						<div class="d-flex">
    							<div class="one">
		    						<h3><a href="http://www.inkhotelpenang.com/" target="_blank">Ink Hotel, Georgetown, Penang</a></h3>
		    						<p class="rate">
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star-o"></i>
		    							<i class="icon-star-o"></i>
		    							<span>3 Rating</span>
		    						</p>
	    						</div>
	    						<div class="two">
	    							<span class="price per-price">RM 89<br><small>/night</small></span>
    							</div>
    						</div>
    						<p>We offer 37 air-conditioned rooms that are made to provide you utmost comfort and secured place to stay while in Penang, Malaysia with in-room specialties and 24-Hour Room Service.</p>
    						<hr>
    						<p class="bottom-area d-flex">
    							<span><i class="icon-map-o"></i> Ink Hotel</span> 
    							<span class="ml-auto"><a href="https://www.agoda.com/en-gb/ink-hotel/hotel/penang-my.html?checkin=2018-11-16&los=1&adults=2&rooms=1&cid=1415444&tag=f6961e14-3e82-8bbd-a599-87d9c2d4c137,f6961e14-3e82-8bbd-a599-87d9c2d4c137,f6961e14-3e82-8bbd-a599-87d9c2d4c137&searchrequestid=375c6757-7292-46cd-af70-a50b0e562ee3&tabbed=true" target="_blank">Book Now</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="destination">
    					<a href="http://www.shangri-la.com/penang/rasasayangresort/" target="_blank" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/sofitel-manila.jpg);">
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
    					</a>
    					<div class="text p-3">
    						<div class="d-flex">
    							<div class="one">
		    						<h3><a href="http://www.shangri-la.com/penang/rasasayangresort/" target="_blank">Shangri-La's Rasa Sayang Resort</a></h3>
		    						<p class="rate">
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<span>5 Rating</span>
		    						</p>
	    						</div>
	    						<div class="two">
	    							<span class="price per-price">RM 670<br><small>/night</small></span>
    							</div>
    						</div>
    						<p>Sophisticated rooms feature balconies with water, pool or garden views. All come with free Wi-Fi, flat-screen TVs, and tea and coffeemakers; upgraded quarters have private gardens. </p>
    						<hr>
    						<p class="bottom-area d-flex">
    							<span><i class="icon-map-o"></i> Shangri-La</span> 
    							<span class="ml-auto"><a href="https://www.agoda.com/en-gb/shangri-la-s-rasa-sayang-resort-and-spa-penang/hotel/all/penang-my.html?checkin=2018-11-16&los=1&adults=2&rooms=1&cid=1415444&tag=f6961e14-3e82-8bbd-a599-87d9c2d4c137,f6961e14-3e82-8bbd-a599-87d9c2d4c137,f6961e14-3e82-8bbd-a599-87d9c2d4c137&searchrequestid=375c6757-7292-46cd-af70-a50b0e562ee3&tspTypes=2&tabbed=true" target="_blank">Book Now</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="destination">
    					<a href="https://penang.equatorial.com/" target="_blank" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/iebua-bangkok.jpg);">
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
    					</a>
    					<div class="text p-3">
    						<div class="d-flex">
    							<div class="one">
		    						<h3><a href="https://penang.equatorial.com/" target="_blank">Hotel Equatorial, Penang</a></h3>
		    						<p class="rate">
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star-o"></i>
		    							<span>4 Rating</span>
		    						</p>
	    						</div>
	    						<div class="two">
	    							<span class="price per-price">RM 333<br><small>/night</small></span>
    							</div>
    						</div>
    						<p>The hotel houses 662 guestrooms and suites, each classily furnished and facilitated with state of the art in-room amenities. It is a popular choice for executive retreats and incentive group gatherings.  </p>
    						<hr>
    						<p class="bottom-area d-flex">
    							<span><i class="icon-map-o"></i> Equatorial</span> 
    							<span class="ml-auto"><a href="https://www.agoda.com/en-gb/hotel-equatorial-penang/hotel/penang-my.html?checkin=2018-11-16&los=1&adults=2&rooms=1&cid=1415444&tag=f6961e14-3e82-8bbd-a599-87d9c2d4c137,f6961e14-3e82-8bbd-a599-87d9c2d4c137,f6961e14-3e82-8bbd-a599-87d9c2d4c137&searchrequestid=375c6757-7292-46cd-af70-a50b0e562ee3&tspTypes=9&ssri=1&tabbed=true" target="_blank">Book Now</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    			
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
	}
?>