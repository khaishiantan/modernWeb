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
		<title>Admin Control Panel | Speed Travel</title>
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
			   
							<li class="nav-item active"><a href="admin.php" class="nav-link">Admin</a></li>
			   
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
		<div class="adminBack">
		<br><br><br><br><br><br><br>
		
	  <div class="container">
		  <ul class="nav nav-pills nav-justified" id = "load">
			<li class = "active"><a data-toggle="pill" href="#user" class = "admin-word"><i class="material-icons admin-icon">person</i>User</a></li>
			<li><a data-toggle="pill" href="#community" class = "admin-word"><i class="material-icons admin-icon">people</i>Community</a></li>
			<li><a data-toggle="pill" href="#contact" class = "admin-word"><i class="material-icons admin-icon">call</i>Contact</a></li>
			<li><a data-toggle="pill" href="#hotspot" class = "admin-word"><i class="material-icons admin-icon">map</i>Hotspot</a></li>
			<li><a data-toggle="pill" href="#article" class = "admin-word"><i class="material-icons admin-icon">library_books</i>Article</a></li>
		  </ul>
		  <br>
		  <div class="tab-content">
			<div id="user" class="tab-pane fade in active">
			  <h3 style = "font-weight: bold;">User</h3>
			  <table id = "userTable" border = "1" style = "border-collapse: collapse" align = "center">
				  <thead>
					  <tr class = "btn-primary">
						  <th>USERNAME</th>
						  <th>OPTION</th>
					  </tr>
				  </thead>
			  </table>
			  <div id="userModal" class="modal">
				  <!-- Modal content -->
				  <div class="modal-content">
					<div class="modal-header">
					  <h2 style = "color: white;">User Info</h2>
					</div>
					<div class="modal-body">
						<div id = "uViewContent">
						  USERNAME
						  <div id = "uNameView"></div><br>
						  FIRST NAME
						  <div id = "fNameView"></div><br>
						  LAST NAME
						  <div id = "lNameView"></div><br>
						  EMAIL
						  <div id = "emailView"></div><br>
						  PASSWORD
						  <div id = "passwordView"></div><br>
						</div>
						
						<div id = "uEditContent">
						  USERNAME
						  <div id = "uNameEdit"></div>
						  FIRST NAME<br>
						  <input type = "text" id = "fNameEdit"><br>
						  LAST NAME<br>
						  <input type = "text" id = "lNameEdit"><br>
						  EMAIL<br>
						  <input type = "text" id = "emailEdit"><br>
						  PASSWORD<br>
						  <input type = "text" id = "passwordEdit"><br>
						</div>
					</div>
					<div class="modal-footer">
                        <input type="button" value="Close" id="uCloseBtn" style="display: none;" class = "adminEditBtn">
                        <input type="button" id="uSaveBtn" value="Save Changes" class = "adminSaveBtn">
                    </div>
				  </div>		
			  </div>
			</div>
			<div id="community" class="tab-pane fade">
			  <h3 style = "font-weight: bold;">Community</h3>
			  <table id = "comTable" border = "1" style = "border-collapse: collapse" align = "center">
				  <thead>
					  <tr class = "btn-primary">
						  <th>ID</th>
						  <th>AUTHOR</th>
						  <th>TITLE</th>
						  <th>DATE POSTED</th>
						  <th>OPTION</th>
					  </tr>
				  </thead>
			  </table>
			  <div id="comModal" class="modal">
				  <!-- Modal content -->
				  <div class="modal-content">
					<div class="modal-header">
					  <h2 style = "color: white;">Blog Info</h2>
					</div>
					<div class="modal-body">
						<div id = "cViewContent">
						  ID
						  <div id = "idViewC"></div><br>
						  AUTHOR
						  <div id = "authorViewC"></div><br>
						  TITLE
						  <div id = "titleViewC"></div><br>
						  DESCRIPTION
						  <div id = "desViewC" style = "overflow-y: scroll; height: auto;"></div><br>
						  IMAGE
						  <div id = "imageViewC"></div><br>
						  DATE POSTED
						  <div id = "dateViewC"></div><br>
						</div>
						
						<div id = "cEditContent">
							<form id="cForm" method="post" enctype="multipart/form-data">
							  ID
							  <div id = "idEditC"></div>
							  <input type = "hidden" id = "cRowId" name = "rowId">
							  <input type = "hidden" id = "cKey" name = "key">
							  AUTHOR<br>
							  <div id = "authorEditC"></div><br>
							  TITLE<br>
							  <input type = "text" id = "titleEditC" name = "title"><br>
							  DESCRIPTION<br>
							  <textarea id = "desEditC" name = "des" style = "overflow-y: auto; height: auto; width: 100%; resize: none;"></textarea><br>
							  IMAGE<br>
							  <input type = "file" id = "imageEditC" name = "newImage"><br>
							  DATE POSTED<br>
							  <div id = "dateEditC"></div><br>
						</div>
					</div>
					<div class="modal-footer">
							<input type="button" value="Close" id="cCloseBtn" style="display: none;" class = "adminEditBtn">
							<input type="button" id="cSaveBtn" value="Save Changes" class = "adminSaveBtn">
						</form>
                    </div>
				  </div>		
			  </div>
			</div>
			<div id="contact" class="tab-pane fade">
			  <h3 style = "font-weight: bold;">Contact</h3>
			  <table id = "conTable" border = "1" style = "border-collapse: collapse" align = "center">
				  <thead>
					  <tr class = "btn-primary">
						  <th>ID</th>
						  <th>NAME</th>
						  <th>REPLY</th>
						  <th>DATE</th>
						  <th>OPTION</th>
					  </tr>
				  </thead>
			  </table>
			  <div id="conModal" class="modal">
				  <!-- Modal content -->
				  <div class="modal-content">
					<div class="modal-header">
					  <h2 style = "color: white;">Contact Info</h2>
					</div>
					<div class="modal-body">
						<div id = "coViewContent">
						  ID
						  <div id = "idViewCo"></div><br>
						  REPLY
						  <div id = "replyViewCo"></div><br>
						  NAME
						  <div id = "nameViewCo"></div><br>
						  EMAIL
						  <div id = "emailViewCo"></div><br>
						  MESSAGE
						  <div id = "msgViewCo"></div><br>
						  DATE
						  <div id = "dateViewCo"></div><br>
						</div>
						
						<div id = "coEditContent">
						  ID
						  <div id = "idEditCo"></div>
						  REPLY<br>
						  <input type = "text" id = "replyEditCo"><br>
						  NAME<br>
						  <input type = "text" id = "nameEditCo"><br>
						  EMAIL<br>
						  <input type = "text" id = "emailEditCo"><br>
						  MESSAGE<br>
						  <textarea id = "msgEditCo" style = "overflow-y: auto; height: auto; width: 100%; resize: none;"></textarea><br>
						  DATE<br>
						  <div id = "dateEditCo"></div><br>
						</div>
					</div>
					<div class="modal-footer">
                        <input type="button" value="Close" id="coCloseBtn" style="display: none;" class = "adminEditBtn">
                        <input type="button" id="coSaveBtn" value="Save Changes" class = "adminSaveBtn">
                    </div>
				  </div>	
			  </div>
			</div>
			<div id="budgetplan" class="tab-pane fade">
			  <h3 style = "font-weight: bold;">Budget Plan</h3>
			  <button id = "addBtnB" class = "adminSaveBtn" style = "margin: 5px 0px 10px 0px; float: right;">Add New</button>
			  <table id = "budTable" border = "1" style = "border-collapse: collapse" align = "center">
				  <thead>
					  <tr class = "btn-primary">
						  <th>ID</th>
						  <th>DAY</th>
						  <th>PRICE (RM)</th>
						  <th>OPTION</th>
					  </tr>
				  </thead>
			  </table>
			  <div id="budModal" class="modal">
				  <!-- Modal content -->
				  <div class="modal-content">
					<div class="modal-header">
					  <h2 style = "color: white;">Budget Info</h2>
					</div>
					<div class="modal-body">
						<div id = "bViewContent">
						  ID
						  <div id = "idViewB"></div><br>
						  DAY
						  <div id = "dayViewB"></div><br>
						  PLACE
						  <div id = "placeViewB" style = "overflow-y: scroll; height: 300px;"></div><br>
						  TRANSPORT
						  <div id = "transportViewB"></div><br>
						  HOTEL
						  <div id = "hotelViewB"></div><br>
						  PRICE
						  <div id = "priceViewB"></div><br>
						</div>
						
						<div id = "bEditContent">
						  ID
						  <div id = "idEditB"></div>
						  DAY<br>
						  <input type = "text" id = "dayEditB"><br>
						  PLACE<br>
						  <input type = "text" id = "placeEditB"><br>
						  TRANSPORT<br>
						  <input type = "text" id = "transportEditB"><br>
						  HOTEL<br>
						  <input type = "text" id = "hotelEditB"><br>
						  PRICE<br>
						  <input type = "text" id = "priceEditB"><br>
						</div>
						
						<div id = "bAddContent">
						  DAY<br>
						  <input type = "text" id = "dayAddB"><br>
						  PLACE<br>
						  <textarea id = "placeAddB" style = "overflow-y: auto; height: 300px; width: 100%; resize: none;"></textarea><br>
						  TRANSPORT<br>
						  <textarea id = "transportAddB" style = "overflow-y: auto; height: 50px; width: 100%; resize: none;"></textarea><br>
						  HOTEL<br>
						  <textarea id = "hotelAddB" style = "overflow-y: auto; height: 50px; width: 100%; resize: none;"></textarea><br>
						  PRICE<br>
						  <input type = "text" id = "priceAddB"><br>
						</div>
					</div>
					<div class="modal-footer">
                        <input type="button" value="Close" id="bCloseBtn" style="display: none;" class = "adminEditBtn">
                        <input type="button" id="bSaveBtn" value="Save Changes" class = "adminSaveBtn">
						<input type="button" id="bAddBtn" value="Save" style="display: none;" class = "adminSaveBtn">
                    </div>
				  </div>		
			  </div>
			</div>
			<div id="hotspot" class="tab-pane fade">
			  <h3 style = "font-weight: bold;">Hotspot</h3>
			  <button id = "addBtnH" class = "adminSaveBtn" style = "margin: 5px 0px 10px 0px; float: right;">Add New</button>
			  <table id = "hotTable" border = "1" style = "border-collapse: collapse" align = "center">
				  <thead>
					  <tr class = "btn-primary">
						  <th>ID</th>
						  <th>PLACE</th>
						  <th>OPTION</th>
					  </tr>
				  </thead>
			  </table>
			  <div id="hotModal" class="modal">
				  <!-- Modal content -->
				  <div class="modal-content">
					<div class="modal-header">
					  <h2 style = "color: white;">Hotspot Info</h2>
					</div>
					<div class="modal-body">
						<div id = "hViewContent">
						  ID
						  <div id = "idViewH"></div><br>
						  PLACE
						  <div id = "placeViewH"></div><br>
						  DETAIL
						  <div id = "detailViewH"></div><br>
						  LOCATION
						  <div id = "locViewH"></div><br>
						  OPERATING HOUR
						  <div id = "ohViewH"></div><br>
						  IMAGE
						  <div id = "imageViewH"></div><br>
						</div>
						
						<div id = "hEditContent">
							<form id="hForm" method="post" enctype="multipart/form-data">
							  ID
							  <div id = "idEditH"></div>
							  <input type = "hidden" id = "hRowId" name = "rowId">
							  <input type = "hidden" id = "hKey" name = "key">
							  PLACE<br>
							  <input type = "text" id = "placeEditH" name = "place"><br>
							  DETAIL<br>
							  <input type = "text" id = "detailEditH" name = "detail"><br>
							  LOCATION<br>
							  <input type = "text" id = "locEditH" name = "loc"><br>
							  OPERATING HOUR<br>
							  <input type = "text" id = "ohEditH" name = "oh"><br>
							  IMAGE<br>
							  <input type = "file" id = "imageEditH" name = "newImage"><br>
						</div>
						
						<div id = "hAddContent">
							<form id="hAddForm" method="post" enctype="multipart/form-data">
							  <input type = "hidden" name = "key" value = "addRow">
							  PLACE<br>
							  <input type = "text" name = "place" id = "placeAddH"><br>
							  DETAIL<br>
							  <textarea id = "detailAddH" name = "detail" style = "overflow-y: auto; height: 300px; width: 100%; resize: none;"></textarea><br>
							  LOCATION<br>
							  <input type = "text" name = "loc" id = "locAddH"><br>
							  OPERATING HOUR<br>
							  <textarea id = "ohAddH" name = "oh" style = "overflow-y: auto; height: 50px; width: 20%; resize: none;"></textarea><br>
							  IMAGE<br>
							  <input type = "file" id = "imageAddH" name = "newImage"><br>
						</div>
					</div>
					<div class="modal-footer">
							<input type="button" value="Close" id="hCloseBtn" style="display: none;" class = "adminEditBtn">
							<input type="button" id="hSaveBtn" value="Save Changes" class = "adminSaveBtn">
							<input type="button" id="hAddBtn" value="Save" style="display: none;" class = "adminSaveBtn">
						</form>
                    </div>
				  </div>		
			  </div>
			</div>
			<div id="article" class="tab-pane fade">
			  <h3 style = "font-weight: bold;">Article</h3>
			  <table id = "artTable" border = "1" style = "border-collapse: collapse" align = "center">
				  <thead>
					  <tr class = "btn-primary">
						  <th>ID</th>
						  <th>AUTHOR</th>
						  <th>TITLE</th>
						  <th>OPTION</th>
					  </tr>
				  </thead>
			  </table>
			  <div id="artModal" class="modal">
				  <!-- Modal content -->
				  <div class="modal-content">
					<div class="modal-header">
					  <h2 style = "color: white;">Article Info</h2>
					</div>
					<div class="modal-body">
						<div id = "aViewContent">
						  ID
						  <div id = "idViewA"></div><br>
						  AUTHOR
						  <div id = "authorViewA"></div><br>
						  TITLE
						  <div id = "titleViewA"></div><br>
						  DESCRIPTION
						  <div id = "desViewA" style = "overflow-y: scroll; height: 300px;"></div><br>
						  IMAGE
						  <div id = "imageViewA"></div><br>
						</div>
						
						<div id = "aEditContent">
							<form id="aForm" method="post" enctype="multipart/form-data">
							  ID
							  <div id = "idEditA"></div><br>
							  <input type = "hidden" id = "aRowId" name = "rowId">
							  <input type = "hidden" id = "aKey" name = "key">
							  AUTHOR<br>
							  <input type = "text" id = "authorEditA" name = "author"><br>
							  TITLE<br>
							  <input type = "text" id = "titleEditA" name = "title"><br>
							  DESCRIPTION<br>
							  <input type = "text" id = "desEditA" name = "des"><br>
							  IMAGE<br>
							  <input type = "file" id = "imageEditA" name = "newImage"><br>
						</div>
					</div>
					<div class="modal-footer">
							<input type="button" value="Close" id="aCloseBtn" style="display: none;" class = "adminEditBtn">
							<input type="button" id="aSaveBtn" value="Save Changes" class = "adminSaveBtn">
						</form>
                    </div>
				  </div>		
			  </div>
			</div>
		  </div>
		</div>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div>
<?php
	include ("footer.php");
	include ("script.php");
?>
	</body>
</html>