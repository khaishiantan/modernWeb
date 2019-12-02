		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

		<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
		<link rel="stylesheet" href="css/animate.css">
		
		<link rel="stylesheet" href="css/owl.carousel.min.css">
		<link rel="stylesheet" href="css/owl.theme.default.min.css">
		<link rel="stylesheet" href="css/magnific-popup.css">

		<link rel="stylesheet" href="css/aos.css">

		<link rel="stylesheet" href="css/ionicons.min.css">

		<link rel="stylesheet" href="css/bootstrap-datepicker.css">
		<link rel="stylesheet" href="css/jquery.timepicker.css">

		
		<link rel="stylesheet" href="css/flaticon.css">
		<link rel="stylesheet" href="css/icomoon.css">
		<link rel="stylesheet" href="css/style.css">
		
		<link rel="shortcut icon" href="images/travel.ico">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://cdn.datatables.net/1.10.0/css/jquery.dataTables.css" />
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>
		<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.dataTables.min.css"/>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
		<link rel="stylesheet" href="css/jquery.range.css">
		<link rel="stylesheet" href="css/jquery-ui.css">
		<style>
		* {
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
		}

		.column-fourimg {
			float: left;
			width: 25%;
			padding: 5px;
		}
		
		.column-threeimg {
			float: left;
			width: 33.33%;
			padding: 5px;
		}

		.row-fourimg::after {
			content: "";
			clear: both;
			display: table;
		}
		
		.row-threeimg::after {
			content: "";
			clear: both;
			display: table;
		}
		
		.collapsible-country {
			background-color: #80bfff;
			color: white;
			cursor: pointer;
			padding: 18px;
			width: 100%;
			border: none;
			text-align: left;
			outline: none;
			font-size: 15px;
		}

		.active-country, .collapsible-country:hover {
			background-color: #3399ff;
		}

		.collapsible-country:after {
			content: '\002B';
			color: white;
			font-weight: bold;
			float: right;
			margin-left: 5px;
		}

		.active-country:after {
			content: "\2212";
		}

		.content-country {
			padding: 0 18px;
			max-height: 0;
			overflow: hidden;
			transition: max-height 0.2s ease-out;
			background-color: #f1f1f1;
		}
		
		.i_up {
			border: solid;
			border-width: 0 3px 3px 0;
			display: inline-block;
			padding: 3px;
		}
		
		.up {
			transform: rotate(-135deg);
			-webkit-transform: rotate(-135deg);
		}
		
		#scrollUpBtn {
			display: none;
			position: fixed;
			bottom: 20px;
			right: 30px;
			z-index: 99;
			font-size: 18px;
			border: none;
			outline: none;
			background-color: #99ccff;
			color: black;
			cursor: pointer;
			padding: 15px;
			border-radius: 4px;
		}

		#scrollUpBtn:hover {
			background-color: #999;
			color: white;
		}
		
		.modal {
			display: none; /* Hidden by default */
			position: fixed; /* Stay in place */
			z-index: 1; /* Sit on top */
			padding-top: 100px; /* Location of the box */
			left: 0;
			top: 0;
			width: 100%; /* Full width */
			height: 100%; /* Full height */
			overflow: auto; /* Enable scroll if needed */
			background-color: rgb(0,0,0); /* Fallback color */
			background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
			position: relative;
			background-color: #fefefe;
			margin: auto;
			padding: 0;
			border: 1px solid #888;
			width: 80%;
			box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
			-webkit-animation-name: animatetop;
			-webkit-animation-duration: 0.4s;
			animation-name: animatetop;
			animation-duration: 0.4s
		}

		/* Add Animation */
		@-webkit-keyframes animatetop {
			from {top:-300px; opacity:0} 
			to {top:0; opacity:1}
		}

		@keyframes animatetop {
			from {top:-300px; opacity:0}
			to {top:0; opacity:1}
		}

		/* The Close Button */
		.closeBtn {
			color: white;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}

		.closeBtn:hover,
		.closeBtn:focus {
			color: #808080;
			text-decoration: none;
			cursor: pointer;
		}

		.modal-header {
			padding: 3px 16px;
			background-color: #00b8e6;
			color: white;
		}

		.modal-body {padding: 2px 16px;}
		
		.modal-footer {
			padding: 3px 16px;
			background-color: #e3e3e3;
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-align: center;
			-ms-flex-align: center;
			align-items: center;
			-webkit-box-pack: end;
			-ms-flex-pack: end;
			justify-content: flex-end;
			padding: 1rem;
			border-top: 1px solid #e9ecef;
		}
		
		.postBlogBtn-info {
			color: #fff;
			background-color: #5bc0de;
			border-color: #46b8da;
		}

		.postBlogBtn {
			display: inline-block;
			padding: 12px 20px;
			margin-bottom: 10px;
			font-size: 16px;
			font-weight: 400;
			line-height: 1.42857143;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			-ms-touch-action: manipulation;
			touch-action: manipulation;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			background-image: none;
			border: 1px solid transparent;
			border-radius: 4px;
			position: absolute;
			top: 20px;
			right: 125px;
		}
		
		.postBlogBtn:hover {
			color: #5bc0de;
			background-color: #f2f2f2;
			border: 1px solid #999;
		}
		
		.postBlogInput {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			box-sizing: border-box;
			border: 2px solid #ccc;
			background-color: #f8f8f8;
		}
		
		.postBlogTextarea {
			width: 100%;
			height: 100px;
			padding: 12px 20px;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
			background-color: #f8f8f8;
			resize: none;
			overflow-y: auto;
		}
		
		.postBlogSubmit {
			color: #808080;
			background-color: #c0e5f2;
			border-color: #46b8da;
			padding: 12px 20px;
			margin-top: 10px;
			margin-bottom: 10px;
			font-size: 14px;
			font-weight: 800;
			line-height: 1.42857143;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			-ms-touch-action: manipulation;
			touch-action: manipulation;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			background-image: none;
			border: 1px solid #999;
			border-radius: 4px;
			float: right;
		}
		
		.postBlogSubmit:hover {
			color: #fff;
			background-color: #5bc0de;
			border-color: #46b8da;
		}
		
		.blockcentersign
		{
			
			margin-left: auto;
			margin-right: auto;
			width: 120em;
			
		}
		
		.blockcenter
		{
			margin-left: auto;
			margin-right: auto;
			width: 60em;
			color: #fcfdff;
			font-size:1.5em;
			font-weight:bold;
		}
		.hero-wrap js-fullheight
		
		

		.td
		{
			align: center;
		}
		
		.profile-dropbtn {
			background-color: transparent;
			color: white;
			padding: 10px;
			font-size: 24px;
			border: none;
		}

		.profile-dropdown {
			position: relative;
			display: inline-block;
		}

		.profile-dropdown-content {
			display: none;
			background-color: #f1f1f1;
			min-width: 100px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			position: absolute;
			z-index: 1;
		}

		.profile-dropdown-content a {
			color: black;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
		}

		.profile-dropdown-content a:hover {background-color: #ddd;}
		
		.profile-dropdown-content a.active {color: rgba(0, 0, 0, 0.5);}

		.profile-dropdown:hover .profile-dropdown-content {display: block;}

		.profile-dropdown:hover .profile-dropbtn {background-color: transparent;}

		.fa{
			font-size: 30px;
			color: #fff;
		}
		
		.fa.active{
			color: rgba(255, 255, 255, 0.5);
		}

		.show {display: block;}
		
		.signin-signup-container
		{
			 position: absolute;
			  border-radius: 5px;
			  background:rgba(255,255,255,0.5);
			  padding: 20px 0 30px 0;
			right:0;
			margin: 20px;
			
			padding: 22px;
			
		}
		
		.signup-container
		{
			 
			  border-radius: 7px;
			  background:rgba(255,255,255,0.5);
			  padding: 60px 0 100px 0;
			right:0;
			margin: 40px;
			
			
		}
		
		/* vertical line */
		.signin-vl {
		  position: absolute;
		  left: 50%;
		  transform: translate(-50%);
		  border: 2px solid #ddd;
		  height: 175px;
		}

		/* text inside the vertical line */
		.signin-vl-innertext {
		  position: absolute;
		  top: 50%;
		  transform: translate(-50%, -50%);
		  background-color: #f1f1f1;
		  border: 1px solid #ccc;
		  border-radius: 50%;
		  padding: 8px 10px;
		}
	
		/* Clear floats after the columns */
		.signin-row:after {
		  content: "";
		  display: table;
		  clear: both;
		}
		
		.signin-signup-col {
		  float: left;
		  width: 50%;
		  margin: auto;
		  padding: 0 50px;
		  margin-top: 6px;
		}
		
		.signin-col {
			width: 100%;
		}
		
		.signup-password-col {
			display: inline;
			float: left;
		  margin: auto;
		  padding: 0 50px;
		  margin-top: 6px;
		  padding-right: 0px;
		}
		
		.signup-password-col-beside {
			display: inline;
			float: right;
			margin: auto;
			margin-right: 50px;
			padding: 10 50px;
			margin-top: 6px;
		}
		
		/* add appropriate colors to fb, twitter and google buttons */
		.fb {
		  background-color: #3B5998;
		  color: white;
		  text-align: center;
		}
		
		.fb:hover {
			color: white;
		}

		.twitter {
		  background-color: #55ACEE;
		  color: white;
		  text-align: center;
		}
		
		.twitter:hover {
			color: white;
		}

		.google {
		  background-color: #dd4b39;
		  color: white;
		  text-align: center;
		}
		
		.google:hover {
			color: white;
		}

		/* style inputs and link buttons */
		.signin-signup-input-btn {
		  width: 100%;
		  padding: 12px;
		  border: none;
		  border-radius: 4px;
		  margin: 5px 0;
		  opacity: 0.85;
		  display: inline-block;
		  font-size: 17px;
		  line-height: 20px;
		  text-decoration: none; /* remove underline from anchors */
		}
		
		.message-input-btn {
		  width: 100%;
		  padding:42px;
		  border: none;
		  border-radius: 4px;
		  margin: 5px 0;
		  opacity: 0.85;
		  display: inline-block;
		  font-size: 17px;
		  line-height: 20px;
		  resize: none;
		  overflow-y: auto;
		  text-decoration: none; /* remove underline from anchors */
		}
		
		.signin-signup-input-btn:hover {
			opacity: 1;
		}
		
		.signin-signup-input-btn-gender{
			padding-right: 12px;
			height: 43px;
			padding-bottom: 10px;
			padding-top: 8px;
			width: 534px;
			padding-right: 12px;
			padding-left: 12px;
			border: none;
			border-radius: 4px;	  
			margin: 5px 0;
			opacity: 0.85;
			display: inline-block;
			font-size: 15.5px;
			font-color: grey;
			line-height: 20px;
			text-decoration: none; /* remove underline from anchors */
		}
		
		.signin-signup-btn {
			background-color: #00ccff;
			color: black;
			cursor: pointer;
			margin-left: 0px;
			width: 1170px;
		}
		
		.signin-signup-btn:hover {
			background-color: #00b8e6;
			opacity: 1;
		}
		
		#gender
		{
		width:534.5px;
		}

		#gender option{
		  width:534.5px;   
		}
		
		#gender option:first {
			color: #999;
		}
		
		#BD
		{
			width:175px; }
			
		#BD option
		{
			width:175x; }
		
		.brredirect{
			line-height:10;
		}
		
		.transbox{
			margin:30px;
			margin-bottom:400px;
			background-color: #ffffff;
			border:0;
			opacity:0.6;
			filter:alpha(opacity=60);
		}
		
		.transboxSetting{
			margin:30px;
			border-radius: 5px;
			margin-bottom:500px;
			background-color: #ffffff;
			border:0;
			opacity:0.7;
			padding-bottom: 25px;
			filter:alpha(opacity=60);
			
		}
		
		.blockcenterSetting{
			margin-left: auto;
			margin-right: auto;
			width: 25em;
			
		}
		
		.page {
			color: #000099;
			width: 40px;
			height: 40px;
			border-radius: 50%;
			font-size: 18px;
			line-height: 40px;
			text-align: center;
			border: 1px solid #b3b3ff;
			font-weight: 400;
		}
		
		.page:hover {
			color: #ccccff;
			background: #000099;
			border: 1px solid transparent;
		}
		
		.page-active {
			color: #ccccff;
			width: 40px;
			height: 40px;
			border-radius: 50%;
			font-size: 18px;
			line-height: 40px;
			text-align: center;
			border: 1px solid transparent;
			font-weight: 400;
			background: #000099;
			pointer-events: none;
		}
		
		.page-align {
			margin-top: 3rem;
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap;
			margin-right: -15px;
			margin-left: -15px;
			box-sizing: border-box;
		}
		
		#blogImg {
			border-radius: 5px;
			cursor: pointer;
			transition: 0.3s;
		}

		#blogImg:hover {opacity: 0.7;}

		/* The Modal (background) */
		.blog-modal {
			display: none; /* Hidden by default */
			position: fixed; /* Stay in place */
			z-index: 1; /* Sit on top */
			padding-top: 100px; /* Location of the box */
			left: 0;
			top: 0;
			width: 100%; /* Full width */
			height: 100%; /* Full height */
			overflow: auto; /* Enable scroll if needed */
			background-color: rgb(0,0,0); /* Fallback color */
			background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
		}

		/* Modal Content (image) */
		.blog-modal-content {
			margin: auto;
			display: block;
			height: 80%;
			max-height: 500px;
		}

		/* Add Animation */
		.blog-modal-content {    
			-webkit-animation-name: zoom;
			-webkit-animation-duration: 0.6s;
			animation-name: zoom;
			animation-duration: 0.6s;
		}

		@-webkit-keyframes zoom {
			from {-webkit-transform:scale(0)} 
			to {-webkit-transform:scale(1)}
		}

		@keyframes zoom {
			from {transform:scale(0)} 
			to {transform:scale(1)}
		}

		/* The Close Button */
		.blog-close {
			position: absolute;
			top: 70px;
			right: 35px;
			color: #f1f1f1;
			font-size: 40px;
			font-weight: bold;
			transition: 0.3s;
		}

		.blog-close:hover,
		.blog-close:focus {
			color: #bbb;
			text-decoration: none;
			cursor: pointer;
		}

		/* 100% Image Width on Smaller Screens */
		@media only screen and (max-width: 700px){
			.blog-modal-content {
				width: 100%;
			}
		}
		
		.deleteBlogBtn {
			display: inline-block;
			padding: 12px 20px;
			margin-bottom: 10px;
			font-size: 16px;
			font-weight: 400;
			line-height: 1.42857143;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			-ms-touch-action: manipulation;
			touch-action: manipulation;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			background-image: none;
			border: 1px solid transparent;
			border-radius: 4px;
			position: absolute;
			color: #fff;
			background-color: red;
			border-color: #cc0000;
		}
		
		.deleteBlogBtn:hover {
			color: red;
			background-color: #e6e6e6;
			border-color: #ccc;
		}
		
		.delete-modal {
			display: none; /* Hidden by default */
			position: fixed; /* Stay in place */
			z-index: 1; /* Sit on top */
			padding-top: 100px; /* Location of the box */
			left: 0;
			top: 0;
			width: 100%; /* Full width */
			height: 100%; /* Full height */
			overflow: auto; /* Enable scroll if needed */
			background-color: rgb(0,0,0); /* Fallback color */
			background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.delete-modal-content {
			position: relative;
			background-color: #fefefe;
			margin: auto;
			padding: 0;
			border: 1px solid #888;
			width: 80%;
			box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
			-webkit-animation-name: animatetop;
			-webkit-animation-duration: 0.4s;
			animation-name: animatetop;
			animation-duration: 0.4s
		}

		/* Add Animation */
		@-webkit-keyframes animatetop {
			from {top:-300px; opacity:0} 
			to {top:0; opacity:1}
		}

		@keyframes animatetop {
			from {top:-300px; opacity:0}
			to {top:0; opacity:1}
		}

		/* The Close Button */
		.cancelcloseBtn {
			color: white;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}

		.cancelcloseBtn:hover,
		.cancelcloseBtn:focus {
			color: #bfbfbf;
			text-decoration: none;
			cursor: pointer;
		}

		.delete-modal-header {
			padding: 2px 16px;
			background-color: red;
			color: white;
		}

		.delete-modal-body {padding: 2px 16px;}
		
		.deleteBlogSubmit {
			color: #fff;
			background-color: #ff0000;
			border-color: #46b8da;
			padding: 12px 20px;
			margin-bottom: 10px;
			font-size: 14px;
			font-weight: 800;
			line-height: 1.42857143;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			-ms-touch-action: manipulation;
			touch-action: manipulation;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			background-image: none;
			border: 1px solid #cc0000;
			border-radius: 4px;
			float: left;
			margin-left: 850px;
		}
		
		.cancelBlogSubmit {
			color: #808080;
			background-color: #ffc6b3;
			border-color: #46b8da;
			padding: 12px 20px;
			margin-bottom: 10px;
			font-size: 14px;
			font-weight: 800;
			line-height: 1.42857143;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			-ms-touch-action: manipulation;
			touch-action: manipulation;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			background-image: none;
			border: 1px solid #999;
			border-radius: 4px;
			float: right;
		}
		
		.settingmodal {
			display: none; /* Hidden by default */
			position: fixed; /* Stay in place */
			z-index: 1; /* Sit on top */
			padding-top: 100px; /* Location of the box */
			left: 0;
			top: 0;
			width: 100%; /* Full width */
			height: 100%; /* Full height */
			overflow: auto; /* Enable scroll if needed */
			background-color: rgb(0,0,0); /* Fallback color */
			background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}
		
		/* Modal Content */
		.settingmodal-content {
			position: relative;
			background-color: #fefefe;
			margin: auto;
			padding: 0;
			border: 1px solid #888;
			width: 80%;
			box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
			-webkit-animation-name: animatetop;
			-webkit-animation-duration: 0.4s;
			animation-name: animatetop;
			animation-duration: 0.4s
		}
		
		/* The Close Button */
		.settingcloseBtn {
			color: white;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}

		.settingcloseBtn:hover,
		.settingcloseBtn:focus {
			color: #808080;
			text-decoration: none;
			cursor: pointer;
		}

		.settingmodal-header {
			padding: 2px 16px;
			background-color: #00b8e6;
			color: white;
		}

		.settingmodal-body {padding: 2px 16px;}
		
		.contact-container{
			border-radius: 7px;
			background:rgba(255,255,255,0.5);
			padding: 60px 0 30px 0;
			right:0;
			margin: 40px;
		}
		
		.settingUpdateBtn {
			display: inline-block;
			padding: 12px 20px;
			margin-bottom: 10px;
			font-size: 16px;
			font-weight: 400;
			line-height: 1.42857143;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			-ms-touch-action: manipulation;
			touch-action: manipulation;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			background-image: none;
			border: 1px solid transparent;
			border-radius: 4px;
		
			top: 20px;
			right: 125px;
		}
		
		.settingInput {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			box-sizing: border-box;
			border: 2px solid #ccc;
			background-color: #f8f8f8;
		}
		
		.settingTextarea {
			width: 100%;
			height: 150px;
			padding: 12px 20px;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
			background-color: #f8f8f8;
			resize: none;
		}
		
		.settingSubmit {
			color: #808080;
			background-color: #d5eef6;
			border-color: #46b8da;
			padding: 12px 20px;
			margin-bottom: 10px;
			font-size: 14px;
			font-weight: 800;
			line-height: 1.42857143;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			-ms-touch-action: manipulation;
			touch-action: manipulation;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			background-image: none;
			border: 1px solid #999;
			border-radius: 4px;
			float: right;
		}
		.settingBtn-info {
			color: #fff;
			background-color: #5bc0de;
			border-color: #46b8da;
		}
		
		.container {
		  margin-right: auto;
		  margin-left: auto;
		  padding-left: 15px;
		  padding-right: 15px;
		}
		
		@media (min-width: 768px) {
		  .container {
			width: 750px;
		  }
		}
		
		@media (min-width: 992px) {
		  .container {
			width: 970px;
		  }
		}
		
		@media (min-width: 1200px) {
		  .container {
			width: 1170px;
		  }
		}

		.container:before, .container:after, .nav:before, .nav:after {
		  display: table;
		  content: " ";
		}

		*:before,
		*:after {
		  -webkit-box-sizing: border-box;
		  -moz-box-sizing: border-box;
		  box-sizing: border-box;
		}

		ul {
		  margin-top: 0;
		  margin-bottom: 10px;
		}

		.nav {
		  margin-bottom: 0;
		  padding-left: 0;
		  list-style: none;
		}
		
		.nav > li {
		  position: relative;
		  display: block;
		}
		
		.nav > li > a {
		  position: relative;
		  display: block;
		  padding: 10px 15px;
		  background-color: white;
		}
		
		.nav > li > a:hover,
		.nav > li > a:focus {
		  text-decoration: none;
		  background-color: #e6e6e6;
		}
		
		.nav > li.disabled > a {
		  color: #777777;
		}
		
		.nav > li.disabled > a:hover,
		.nav > li.disabled > a:focus {
		  color: #777777;
		  text-decoration: none;
		  background-color: transparent;
		  cursor: not-allowed;
		}
		
		.nav-pills > li {
		  float: left;
		}
		
		.nav-pills > li > a {
		  border-radius: 4px;
		}
		
		.nav-pills > li + li {
		  margin-left: 2px;
		}
		
		.nav-pills > li.active > a,
		.nav-pills > li.active > a:hover,
		.nav-pills > li.active > a:focus {
		  color: #fff;
		  background-color: #337ab7;
		  cursor: default;
		}
		
		.nav-justified {
		  width: 100%;
		}
		
		.nav-justified > li {
		  float: none;
		}
		
		.nav-justified > li > a {
		  text-align: center;
		  margin-bottom: 5px;
		}
		
		a {
		  color: #337ab7;
		  text-decoration: none;
		}
		
		a:hover,
		a:focus {
		  color: #23527c;
		  text-decoration: none;
		}
		
		a:focus {
		  outline: 5px auto -webkit-focus-ring-color;
		  outline-offset: -2px;
		}

		.tab-content > .tab-pane {
		  display: none;
		}
		
		.tab-content > .active {
		  display: block;
		}

		.fade {
		  opacity: 0;
		  -webkit-transition: opacity 0.15s linear;
		  -o-transition: opacity 0.15s linear;
		  transition: opacity 0.15s linear;
		}
		
		.fade.in {
		  opacity: 1;
		}
		
		.admin-icon {
			font-size: 24px;
			display: inline;
			padding-right: 5px;
		}
		
		.admin-word {
			font-size: 24px;
			font-weight: bold;
		}
		
		.admin-delete {
			color: red;
		}
		
		.admin-delete:hover {
			color: #b30000;
		}
		
		.btn-primary {
			color:#fff;
			background-color:#007bff;
			border-color:#007bff
		}
		
		.btn-primary:hover {
			color:#fff;
			background-color:#0069d9;
			border-color:#0062cc
		}
		
		.btn-primary.focus,.btn-primary:focus {
			box-shadow:0 0 0 .2rem rgba(0,123,255,.5)
		}
		
		.btn-primary.disabled,.btn-primary:disabled {
			background-color:#007bff;
			border-color:#007bff
		}
		
		.btn-primary:not([disabled]):not(.disabled).active,.btn-primary:not([disabled]):not(.disabled):active,.show>.btn-primary.dropdown-toggle {
			color:#fff;
			background-color:#0062cc;
			border-color:#005cbf;
			box-shadow:0 0 0 .2rem rgba(0,123,255,.5)
		}
		
		.containerSlider{
			padding: 20px;
		}
		.filter-panel{
			width:100%;
			font-size: 20px;
		}
		.filter-panel p{
			margin-right: 30px;
			float: left;
		}
		
		.budget-container {
			position: absolute;
			border-radius: 5px;
			background:rgba(255,255,255,0.9);
			margin: 10px;
			padding: 10px;
		}
		
		.budgetBtn {
			color: #fff;
			background-color: #3498DB;
			border-color: #46b8da;
			display: inline-block;
			padding: 12px 20px;
			margin-bottom: 10px;
			font-size: 16px;
			font-weight: 400;
			line-height: 1.42857143;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			-ms-touch-action: manipulation;
			touch-action: manipulation;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			background-image: none;
			border: 1px solid transparent;
			border-radius: 4px;
		}
		
		.budgetBtn:hover {
			color: #3498DB;
			background-color: #e6e6e6;
			border: 1px solid #999;
		}
		
		.budget-cont {
			position: absolute;
			background: rgba(255,255,255,0.9);
			margin: 10px;
			padding: 10px;
			left: 50%;
			transform: translate(-50%, 0);
			background-color: #f8faff;
		}
		
		.budget-box {
			display: block;
			position: relative;
			z-index: 0;
			-webkit-box-shadow: 0 2px 4px rgba(0,0,0,0.2);
			-moz-box-shadow: 0 2px 4px rgba(0,0,0,0.2);
			box-shadow: 0 2px 4px rgba(0,0,0,0.2);
			border: solid 1px #f0eded;
			float: none;
			padding: 20px 0px;
			text-align: center;
			margin-right: 30%;
			margin-left: 30%;
			margin-bottom: 20px;
		}
		
		.enjoy-css {
		  -webkit-box-sizing: content-box;
		  -moz-box-sizing: content-box;
		  box-sizing: content-box;
		  width: 98px;
		  height: 48px;
		  cursor: pointer;
		  margin: 0 auto;
		  border: 2px solid rgb(30,205,151);
		  -webkit-border-radius: 40px;
		  border-radius: 40px;
		  font: normal 18px/35px "Advent Pro", Helvetica, sans-serif;
		  color: rgb(30, 205, 151);
		  text-align: center;
		  -o-text-overflow: clip;
		  text-overflow: clip;
		  letter-spacing: 1px;
		  background: rgba(0,0,0,0);
		  -webkit-transition: background-color 0.3s cubic-bezier(0, 0, 0, 0), color 0.3s cubic-bezier(0, 0, 0, 0), width 0.3s cubic-bezier(0, 0, 0, 0), border-width 0.3s cubic-bezier(0, 0, 0, 0), border-color 0.3s cubic-bezier(0, 0, 0, 0);
		  -moz-transition: background-color 0.3s cubic-bezier(0, 0, 0, 0), color 0.3s cubic-bezier(0, 0, 0, 0), width 0.3s cubic-bezier(0, 0, 0, 0), border-width 0.3s cubic-bezier(0, 0, 0, 0), border-color 0.3s cubic-bezier(0, 0, 0, 0);
		  -o-transition: background-color 0.3s cubic-bezier(0, 0, 0, 0), color 0.3s cubic-bezier(0, 0, 0, 0), width 0.3s cubic-bezier(0, 0, 0, 0), border-width 0.3s cubic-bezier(0, 0, 0, 0), border-color 0.3s cubic-bezier(0, 0, 0, 0);
		  transition: background-color 0.3s cubic-bezier(0, 0, 0, 0), color 0.3s cubic-bezier(0, 0, 0, 0), width 0.3s cubic-bezier(0, 0, 0, 0), border-width 0.3s cubic-bezier(0, 0, 0, 0), border-color 0.3s cubic-bezier(0, 0, 0, 0);
		}

	
		.enjoy-css:hover {
		  color: rgba(255,255,255,1);
		  background: rgb(30, 205, 151);
		}

		.enjoy-css:active {
		  border: 2px solid rgba(33,224,163,1);
		  background: rgba(33,224,163,1);
		  -webkit-transition: none;
		  -moz-transition: none;
		  -o-transition: none;
		  transition: none;
		}
		
		.enjoy2-css {
		  -webkit-box-sizing: content-box;
		  -moz-box-sizing: content-box;
		  box-sizing: content-box;
		  width: 85px;
		  height: 35px;
		  cursor: pointer;
		  margin: 0 auto;
		  border: 2px solid #79afe4;
		  -webkit-border-radius: 40px;
		  border-radius: 40px;
		  font: normal 18px/35px "Advent Pro", Helvetica, sans-serif;
		  font-color: #79afe4;
		  color: #79afe4;
		  text-align: center;
		  -o-text-overflow: clip;
		  text-overflow: clip;
		  letter-spacing: 1px;
		  background: rgba(0,0,0,0);
		  -webkit-transition: background-color 0.3s cubic-bezier(0, 0, 0, 0), color 0.3s cubic-bezier(0, 0, 0, 0), width 0.3s cubic-bezier(0, 0, 0, 0), border-width 0.3s cubic-bezier(0, 0, 0, 0), border-color 0.3s cubic-bezier(0, 0, 0, 0);
		  -moz-transition: background-color 0.3s cubic-bezier(0, 0, 0, 0), color 0.3s cubic-bezier(0, 0, 0, 0), width 0.3s cubic-bezier(0, 0, 0, 0), border-width 0.3s cubic-bezier(0, 0, 0, 0), border-color 0.3s cubic-bezier(0, 0, 0, 0);
		  -o-transition: background-color 0.3s cubic-bezier(0, 0, 0, 0), color 0.3s cubic-bezier(0, 0, 0, 0), width 0.3s cubic-bezier(0, 0, 0, 0), border-width 0.3s cubic-bezier(0, 0, 0, 0), border-color 0.3s cubic-bezier(0, 0, 0, 0);
		  transition: background-color 0.3s cubic-bezier(0, 0, 0, 0), color 0.3s cubic-bezier(0, 0, 0, 0), width 0.3s cubic-bezier(0, 0, 0, 0), border-width 0.3s cubic-bezier(0, 0, 0, 0), border-color 0.3s cubic-bezier(0, 0, 0, 0);
		}

		.enjoy2-css:hover {
		  color: rgba(255,255,255,1);
		  background: #79afe4;
		}

		.enjoy2-css:active {
		  border: 2px solid #79afe4;
		  background: #79afe4;
		  -webkit-transition: none;
		  -moz-transition: none;
		  -o-transition: none;
		  transition: none;
		}
	
		.container2 {
		  margin: 0 auto;
		  padding: 50px 0 0;
		  max-width: 960px;
		  width: 100%;
		}

		.panel2 {
		  background-color: #fff;
		  border-radius: 10px;
		  padding: 15px 25px;
		  position: relative;
		  width: 100%;
		}

		.pricing-table {
		  box-shadow: 0px 10px 13px -6px rgba(0, 0, 0, 0.08), 0px 20px 31px 3px rgba(0, 0, 0, 0.09), 0px 8px 20px 7px rgba(0, 0, 0, 0.02);
		  display: flex;
		  flex-direction: column;
		}

		@media (min-width: 900px) {
		  .pricing-table {
			flex-direction: row;
		  }
		}

		.pricing-table * {
		  text-align: center;
		  text-transform: uppercase;
		}

		.pricing-plan {
		  border-bottom: 1px solid #e1f1ff;
		  padding: 25px;
		}

		.pricing-plan:last-child {
		  border-bottom: none;
		}

		@media (min-width: 900px) {
		  .pricing-plan {
			border-bottom: none;
			border-right: 1px solid #e1f1ff;
			flex-basis: 100%;
			padding: 25px 50px;
		  }

		  .pricing-plan:last-child {
			border-right: none;
		  }
		}

		.pricing-img {
		  margin-bottom: 25px;
		  max-width: 100%;
		}

		.pricing-header {
		  color: #888;
		  width: 700px;
		  align:center;
		  border: 15px solid grey;
		  font-weight: 700;
		  padding: 20px;
		  margin: 50px;
		  letter-spacing: 1px;
		}

		.pricing-features {
		  color: #016FF9;
		  font-weight: 600;
		  letter-spacing: 1px;
		  margin: 50px 0 25px;
		}

		.pricing-features-item1 {
		  border-top: 1px solid #e1f1ff;
		  color:#0AC4E7;
		  font-style: italic;
		  font-size: 20px;
		  line-height: 1.5;
		  padding: 15px 0;
		}

		.pricing-features-item2 {
		  border-top: 1px solid #A7E3DD;
		  color:#0A72C1;
		  font-size: 20px;
		  font-color:A7E3DD;
		  line-height: 1.5;
		  padding: 15px 0;
		}
		.pricing-features-item3 {
		  border-top: 1px solid #A7E3DD;
		  color:#21A779;
		  font-style: italic;
		  font-size: 20px;
		  line-height: 1.5;
		  padding: 15px 0;
		}
		.pricing-features-item:last-child {
		  border-bottom: 1px solid #e1f1ff;
		}

		.pricing-price {
		  color: #016FF9;
		  display: block;
		  font-size: 32px;
		  font-weight: 700;
		}

		.pricing-button {
		  border: 1px solid #9dd1ff;
		  border-radius: 10px;
		  color: #348EFE;
		  display: inline-block;
		  margin: 25px 0;
		  padding: 15px 35px;
		  text-decoration: none;
		  transition: all 150ms ease-in-out;
		}

		.pricing-button:hover,
		.pricing-button:focus {
		  background-color: #e1f1ff;
		}

		.pricing-button.is-featured {
		  background-color: #48aaff;
		  color: #fff;
		}

		.pricing-button.is-featured:hover,
		.pricing-button.is-featured:active {
		  background-color: #269aff;
		}
		
		.fav-icon {
			color: #ccc;
			cursor: pointer;
		}
		
		.fav-icon:hover {
			color: #999;
		}
		
		.fav-icon.active {
			color: #DC3232;
		}
		
		.fav-icon.inactive {
			color: #ccc;
		}
		
		.fav-icon.active:hover {
			color: #e97c7c;
		}
		
		.fav-remove {
			cursor: pointer;
			color: red;
		}
		
		.adminViewBtn {
			color: #000;
			background-color: #ddd;
			border-color: #d9d9d9;
			display: inline-block;
			padding: 6px 12px;
			margin-bottom: 0;
			font-size: 14px;
			font-weight: 400;
			line-height: 1.42857143;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			-ms-touch-action: manipulation;
			touch-action: manipulation;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			background-image: none;
			border: 1px solid transparent;
			border-radius: 4px;
			margin-right: 5px;
		}
		
		.adminViewBtn:hover,
		.adminViewBtn.active,
		.adminViewBtn.focus {
			background-color: #c4c4c4;
			border-color: #bfbfbf;
		}
		
		.adminEditBtn {
			color: #fff;
			background-color: #337ab7;
			border-color: #2e6da4;
			display: inline-block;
			padding: 6px 12px;
			margin-bottom: 0;
			font-size: 14px;
			font-weight: 400;
			line-height: 1.42857143;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			-ms-touch-action: manipulation;
			touch-action: manipulation;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			background-image: none;
			border: 1px solid transparent;
			border-radius: 4px;
			margin-right: 5px;
		}
		
		.adminEditBtn:hover,
		.adminEditBtn.active,
		.adminEditBtn.focus {
			background-color: #266293;
			border-color: #224f73;
		}
		
		.adminDeleteBtn {
			color: #fff;
			background-color: #d9534f;
			border-color: #d43f3a;
			display: inline-block;
			padding: 6px 12px;
			margin-bottom: 0;
			font-size: 14px;
			font-weight: 400;
			line-height: 1.42857143;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			-ms-touch-action: manipulation;
			touch-action: manipulation;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			background-image: none;
			border: 1px solid transparent;
			border-radius: 4px;
			margin-right: 5px;
		}
		
		.adminDeleteBtn:hover,
		.adminDeleteBtn.active,
		.adminDeleteBtn.focus {
			background-color: #c9302c;
			border-color: #ae2724;
		}
		
		.adminSaveBtn {
			color: #fff;
			background-color: #5cb85c;
			border-color: #4cae4c;
			display: inline-block;
			padding: 6px 12px;
			margin-bottom: 0;
			font-size: 14px;
			font-weight: 400;
			line-height: 1.42857143;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			-ms-touch-action: manipulation;
			touch-action: manipulation;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			background-image: none;
			border: 1px solid transparent;
			border-radius: 4px;
			margin-right: 5px;
		}
		
		.adminSaveBtn:hover,
		.adminSaveBtn.active,
		.adminSaveBtn.focus {
			background-color: #449b44;
			border-color: #398639;
		}
		
		.adminBack{
			background: linear-gradient(to bottom, #006699 -50%, #ffffff 100%);
		}
		
		.rating { 
		  border: none;
		  float: left;
		}

		.rating > input { display: none; } 
		.rating > label:before { 
		  margin: 5px;
		  font-size: 1.25em;
		  font-family: FontAwesome;
		  display: inline-block;
		  content: "\f005";
		}

		.rating > .half:before { 
		  content: "\f089";
		  position: absolute;
		}

		.rating > label { 
		  color: #ddd; 
		 float: right; 
		}

		/***** CSS Magic to Highlight Stars on Hover *****/

		.rating > input:checked ~ label, /* show gold star when clicked */
		.rating:not(:checked) > label:hover, /* hover current star */
		.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

		.rating > input:checked + label:hover, /* hover current star when changing rating */
		.rating > input:checked ~ label:hover,
		.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
		.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
			
		.enjoy3-css {
		  -webkit-box-sizing: content-box;
		  -moz-box-sizing: content-box;
		  box-sizing: content-box;
		  width: 200px;
		  height: 35px;
		  cursor: pointer;
		  margin: 0 auto;
		  border: 2px solid #79afe4;
		  -webkit-border-radius: 40px;
		  border-radius: 40px;
		  font: normal 18px/35px "Advent Pro", Helvetica, sans-serif;
		  font-color: #79afe4;
		  color: #79afe4;
		  text-align: center;
		  -o-text-overflow: clip;
		  text-overflow: clip;
		  letter-spacing: 1px;
		  background: rgba(0,0,0,0);
		  -webkit-transition: background-color 0.3s cubic-bezier(0, 0, 0, 0), color 0.3s cubic-bezier(0, 0, 0, 0), width 0.3s cubic-bezier(0, 0, 0, 0), border-width 0.3s cubic-bezier(0, 0, 0, 0), border-color 0.3s cubic-bezier(0, 0, 0, 0);
		  -moz-transition: background-color 0.3s cubic-bezier(0, 0, 0, 0), color 0.3s cubic-bezier(0, 0, 0, 0), width 0.3s cubic-bezier(0, 0, 0, 0), border-width 0.3s cubic-bezier(0, 0, 0, 0), border-color 0.3s cubic-bezier(0, 0, 0, 0);
		  -o-transition: background-color 0.3s cubic-bezier(0, 0, 0, 0), color 0.3s cubic-bezier(0, 0, 0, 0), width 0.3s cubic-bezier(0, 0, 0, 0), border-width 0.3s cubic-bezier(0, 0, 0, 0), border-color 0.3s cubic-bezier(0, 0, 0, 0);
		  transition: background-color 0.3s cubic-bezier(0, 0, 0, 0), color 0.3s cubic-bezier(0, 0, 0, 0), width 0.3s cubic-bezier(0, 0, 0, 0), border-width 0.3s cubic-bezier(0, 0, 0, 0), border-color 0.3s cubic-bezier(0, 0, 0, 0);
		}

		.enjoy3-css:hover {
		  color: rgba(255,255,255,1);
		  background: #79afe4;
		}

		.enjoy3-css:active {
		  border: 2px solid #79afe4;
		  background: #79afe4;
		  -webkit-transition: none;
		  -moz-transition: none;
		  -o-transition: none;
		  transition: none;
		}				
		
		.favRemove {
			display: none;
		}
		
		.title {
			white-space: nowrap;
			width: 170px;
			overflow: hidden;
			text-overflow: ellipsis;
		}
		
		@import url(https://fonts.googleapis.com/css?family=Lato:700);
		.box3 {
		  position: relative;
		  max-width:800px;
		  width: 90%;
		  height: auto;
		  background: #fff;
		  box-shadow: 0 0 15px rgba(0,0,0,.1);
		}

		/* common */
		.ribbon {
		  width: 150px;
		  height: 150px;
		  overflow: hidden;
		  position: absolute;
		}
		.ribbon::before,
		.ribbon::after {
		  position: absolute;
		  z-index: -1;
		  content: '';
		  display: block;
		  border: 5px solid #2980b9;
		}
		.ribbon span {
		  position: absolute;
		  display: block;
		  width: 225px;
		  padding: 15px 0;
		  background-color: #3498db;
		  box-shadow: 0 5px 10px rgba(0,0,0,.1);
		  color: #fff;
		  font: 700 18px/1 'Lato', sans-serif;
		  text-shadow: 0 1px 1px rgba(0,0,0,.2);
		  text-transform: uppercase;
		  text-align: center;
		}

		/* top left*/
		.ribbon-top-left {
		  top: -10px;
		  left: -10px;
		}
		.ribbon-top-left::before,
		.ribbon-top-left::after {
		  border-top-color: transparent;
		  border-left-color: transparent;
		}
		.ribbon-top-left::before {
		  top: 0;
		  right: 0;
		}
		.ribbon-top-left::after {
		  bottom: 0;
		  left: 0;
		}
		.ribbon-top-left span {
		  right: -25px;
		  top: 30px;
		  transform: rotate(-45deg);
		}

		/* top right*/
		.ribbon-top-right {
		  top: -10px;
		  right: -10px;
		}
		.ribbon-top-right::before,
		.ribbon-top-right::after {
		  border-top-color: transparent;
		  border-right-color: transparent;
		}
		.ribbon-top-right::before {
		  top: 0;
		  left: 0;
		}
		.ribbon-top-right::after {
		  bottom: 0;
		  right: 0;
		}
		.ribbon-top-right span {
		  left: -25px;
		  top: 30px;
		  transform: rotate(45deg);
		}

		/* bottom left*/
		.ribbon-bottom-left {
		  bottom: -10px;
		  left: -10px;
		}
		.ribbon-bottom-left::before,
		.ribbon-bottom-left::after {
		  border-bottom-color: transparent;
		  border-left-color: transparent;
		}
		.ribbon-bottom-left::before {
		  bottom: 0;
		  right: 0;
		}
		.ribbon-bottom-left::after {
		  top: 0;
		  left: 0;
		}
		.ribbon-bottom-left span {
		  right: -25px;
		  bottom: 30px;
		  transform: rotate(225deg);
		}

		/* bottom right*/
		.ribbon-bottom-right {
		  bottom: -10px;
		  right: -10px;
		}
		.ribbon-bottom-right::before,
		.ribbon-bottom-right::after {
		  border-bottom-color: transparent;
		  border-right-color: transparent;
		}
		.ribbon-bottom-right::before {
		  bottom: 0;
		  left: 0;
		}
		.ribbon-bottom-right::after {
		  top: 0;
		  right: 0;
		}
		.ribbon-bottom-right span {
		  left: -25px;
		  bottom: 30px;
		  transform: rotate(-225deg);
		}

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		.container4 {
		height: 60vh;
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-pack: center;
			-ms-flex-pack: center;
			justify-content: center;
			-webkit-box-align: center;
			-ms-flex-align: center;
			align-items: center;
			-webkit-perspective: 1000px;
			perspective: 1000px;
			-webkit-transform-style: preserve-3d;
			transform-style: preserve-3d;
			position: relative;
			font-family: "Montserrat";
			color: #fff;
		}
		.container3 {
			min-width: 600px;
			min-height: 350px;
			border-radius: 20px;
			position: relative;
			-webkit-transition: 1.5s ease-in-out;
			transition: 1.5s ease-in-out;
			transform-style: preserve-3d;
		}

		.side3 {
			position: absolute;
			text-align: center;
			width: 100%;
			height: 100%;
			padding: 20px 50px;
			color: #fff;
			transform-style: preserve-3d;
			backface-visibility: hidden;
			border-radius: 20px;
		}
		.content3 {
			transform: translatez(70px) scale(0.8);
			line-height: 1.5em;
		}
		.content3 h1 {
			position: relative;
		}
		.content3 h6 {
			margin-top: 30px;
			line-height: 2em;
		}
		.content3 p {
			margin-top: 30px;
			line-height: 2em;
		}
		.content3 h1:before {
			content: "";
			position: absolute;
			bottom: -20px;
			height: 3px;
			background-color: #3e3;
			width: 70px;
			left: 50%;
			transform: translateX(-50%);
		}
		.front3 {
			z-index: 2;
			background-size: 100vh;
			background-size: cover;
			background-image: url(https://livewallpaperhd.com/wp-content/uploads/2017/07/Dark-Elegant-Wallpaper.jpg);
		}
		.back3 {
			background-color: #333;
			transform: rotateY(180deg);
			z-index: 0;
			padding-top: 10px;
			background-image: url(https://userscontent2.emaze.com/images/f9538183-0ff9-478f-b964-c8ab90421e3b/3d28e192fda5c17250f96a2779c84475.jpg);
		}
		.container3:hover {
			-webkit-transform: rotateY(180deg);
			transform: rotateY(180deg);
		}
		.back3 h1 {
			margin: 0;
		}
		
		.show_more_main {
			margin: 15px 300px;
		}
		.show_more {
			background-color: #33739E;
			color: #fff;
			background-image: -webkit-linear-gradient(top,#2c6287 0,#5298c7 100%);
			background-image: linear-gradient(top,#2c6287 0,#5298c7 100%);
			border: 1px solid;
			border-color: #d3d3d3;
			border-radius: 25px;
			font-size: 16px;
			outline: 0;
		}
		.show_more {
			cursor: pointer;
			display: block;
			padding: 10px 0;
			text-align: center;
			font-weight:bold;
		}
		.show_more:hover {
			background-color: #fff;
			color: #33739E;
			background-image: -webkit-linear-gradient(top,#fcfcfc 0,#f8f8f8 100%);
			background-image: linear-gradient(top,#fcfcfc 0,#f8f8f8 100%);
		}
		.loding {
			background-color: #e9e9e9;
			border: 1px solid;
			border-color: #c6c6c6;
			color: #333;
			font-size: 16px;
			display: block;
			border-radius: 25px;
			text-align: center;
			padding: 10px 0;
			outline: 0;
			font-weight:bold;
		}
		.loding_txt {
			background-image: url(images/loading.gif);
			background-position: left;
			background-repeat: no-repeat;
			border: 0;
			display: -webkit-inline-box;
			height: 16px;
			padding-left: 20px;
		}
		</style>