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
		include ("header.php");
?>
		<title>About | Speed Travel</title>
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
					
					<a href="signin.php">Sign In</a>
					<a href="signup.php">Sign Up</a>
				<?php
					}
				?>
			  </div>
			</div>
		</div>
	  </nav>
		<!-- END nav -->
		
		<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_2.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.php">Home</a></span> <span>About</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">About Us</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row d-md-flex">
	    		<div class="col-md-6 ftco-animate img about-image" style="background-image: url(images/about.jpg);">
	    		</div>
	    		<div class="col-md-6 ftco-animate p-md-5">
		    		<div class="row">
		          <div class="col-md-12 nav-link-wrap mb-5">
		            <div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		              <a class="nav-link active" id="v-pills-whatwedo-tab" data-toggle="pill" href="#v-pills-whatwedo" role="tab" aria-controls="v-pills-whatwedo" aria-selected="true">What we do</a>

		              <a class="nav-link" id="v-pills-mission-tab" data-toggle="pill" href="#v-pills-mission" role="tab" aria-controls="v-pills-mission" aria-selected="false">Our mission</a>

		              <a class="nav-link" id="v-pills-goal-tab" data-toggle="pill" href="#v-pills-goal" role="tab" aria-controls="v-pills-goal" aria-selected="false">Our goal</a>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex align-items-center">
		            
		            <div class="tab-content ftco-animate" id="v-pills-tabContent">
					
				
		              <div class="tab-pane fade show active in" id="v-pills-whatwedo" role="tabpanel" aria-labelledby="v-pills-whatwedo-tab">
		              	<div>
			                <h2 class="mb-4">Our Service</h2>
			              	<p>Since 1999 Speed Travel has been providing unforgettable travel experiences to some of the Penang's most exotic and interesting destinations. </p>
							<p>Inspiring people to reach out and explore, experience and enjoy far away places and helping to turn travel dreams into reality.</p>
				            </div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-mission" role="tabpanel" aria-labelledby="v-pills-mission-tab">
		                <div>
			                <h2 class="mb-4">Explore the world your way</h2>
			              	<p>When you travel with Speed Travel you become part of a special fraternity of travellers about whom we care very much. </p>
				            </div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-goal" role="tabpanel" aria-labelledby="v-pills-goal-tab">
		                <div>
			                <h2 class="mb-4">Help Our Customer</h2>
			              	<p>Our company philosophy is simple - we want you to be more than satisfied with our services.</p>
				            </div>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
    	</div>
    </section>

    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row justify-content-start mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate">
          	<span class="subheading">FAQS</span>
            <h2 class="mb-4"><strong>Frequently</strong> Ask Question</h2>
          </div>
        </div>  
    		<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div id="accordion">
    					<div class="row">
    						<div class="col-md-6">
							  <div class="card">
						        <div class="card-header">
										  <a class="card-link" data-toggle="collapse" href="#menuone" aria-expanded="true" aria-controls="menuone">What is there to do in Penang? <span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						        </div>
						        <div id="menuone" class="collapse show">
						          <div class="card-body">
									<p> 1. Penang Hill, Ayer Itam<br>
										2. Kek Lok Si Temple, Ayer Itam<br>
										3. Cheong Fatt Tze Mansion, Leith Street<br>
										4. Escape Adventureland, Teluk Bahang<br>
										5. Adventure Zone Theme Park, Batu Ferringhi</p>
						          </div>
						        </div>
							  </div>

						      <div class="card">
						        <div class="card-header">
										  <a class="card-link" data-toggle="collapse"  href="#menutwo" aria-expanded="false" aria-controls="menutwo">What can we do in Batu Ferringhi? <span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						        </div>
						        <div id="menutwo" class="collapse">
						          <div class="card-body">
									 <p>1. Penang National Park (Taman Negara Pulau Pinang)<br>
										2. Tropical Spice Garden.<br>
										3. Penang Botanical Gardens<br>
										4. Batu Ferringhi Beach.<br>
										5. Batu Ferringhi Night Market</p>
									</div>
						        </div>
						      </div>

						      <div class="card">
						        <div class="card-header">
										  <a class="card-link" data-toggle="collapse"  href="#menu3" aria-expanded="false" aria-controls="menu3"> What kinds of clothing and attire are suitable for ESCAPE? <span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						        </div>
						        <div id="menu3" class="collapse">
						          <div class="card-body">
									<p>For ESCAPE Adventureplay area:<br>
									it is recommended that comfortable sports clothing is worn including sneekers/training type shoes. Open-toed sandals are not permitted on the rides and attractions.<br>
									For ESCAPE Waterplay area:<br>
									Please be reminded that you are required to bring proper swimwear for hygiene and safety reasons.</p>
									</div>
						        </div>
						      </div>
    						</div>

    						<div class="col-md-6">
    							<div class="card">
						        <div class="card-header">
										  <a class="card-link" data-toggle="collapse"  href="#menu4" aria-expanded="false" aria-controls="menu4"> What is there to do in Penang at night?<span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						        </div>
						        <div id="menu4" class="collapse">
						          <div class="card-body">
									<p>1. 360 Revolving Restaurant & Rooftop Bar<br>
									2. Batu Ferringhi Night Market<br>
									3. Take a Sunset Cruise<br>
									4. Cool Down in Georgetown's Bars<br>
									5. Enjoy an Exquisite Dining Experience at Ferringhi Garden</p></div>
						        </div>
						      </div>

						      <div class="card">
						        <div class="card-header">
										  <a class="card-link" data-toggle="collapse"  href="#menu5" aria-expanded="false" aria-controls="menu5">Popular Penang hotels <span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						        </div>
						        <div id="menu5" class="collapse">
						          <div class="card-body">
										1. Eastern And Oriental Hotel<br>
										2. PARKROYAL Penang Resort<br>
										3. Evergreen Laurel Hotel<br>
										4. Hotel Jen Penang<br>
										5. Hard Rock Hotel Penang
									</div>
						        </div>
						      </div>

						      <div class="card">
						        <div class="card-header">
										  <a class="card-link" data-toggle="collapse"  href="#menu6" aria-expanded="false" aria-controls="menu6">The Best Street Foods to Try Penang <span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						        </div>
						        <div id="menu6" class="collapse">
						          <div class="card-body">
										<p>Char Koay Teow (Fried Rice Cake Strips / Noodles)<br>
										Oyster Omelette<br>Curry Mee (Spicy Coconut Noodle Soup)<br>Crispy Duck with Rice<br>Tandoori Chicken + Naan</p>										</p></div>
						        </div>
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