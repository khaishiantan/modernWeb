  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="js/main.js"></script>
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/fixedheader/3.1.2/js/dataTables.fixedHeader.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="js/jquery.range.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script>
	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			document.getElementById("scrollUpBtn").style.display = "block";
		} else {
			document.getElementById("scrollUpBtn").style.display = "none";
		}
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
		document.body.scrollTop = 170;
		document.documentElement.scrollTop = 170;
	}
	
	var modal = document.getElementById('postBlogModal');

	// Get the button that opens the modal
	function openModal() {
		modal.style.display = "block";
	}

	// Get the <span> element that closes the modal
	function closeModal() {
		modal.style.display = "none";
	}
  </script>
  <script>
	/* When the user clicks on the button, 
	toggle between hiding and showing the dropdown content */
	function profileFunction() {
		document.getElementById("profile-dropdown").classList.toggle("show");
	}

	// Close the dropdown if the user clicks outside of it
	window.onclick = function(event) {
	  if (!event.target.matches('.profile-dropbtn')) {

		var dropdowns = document.getElementsByClassName("profile-dropdown-content");
		var i;
		for (i = 0; i < dropdowns.length; i++) {
		  var openDropdown = dropdowns[i];
		  if (openDropdown.classList.contains('show')) {
			openDropdown.classList.remove('show');
		  }
		}
	  }
	}
  </script>
  <!--ALLOW THE USER TO SELECT WHETHER THAY WANT TO SHOW OR HIDE THE PASSWORD AFTER TYPING TO RECONFIRM THE PASSWORD THAT THEY TYPED-->
  <script>	
	function passFunction(id) {
	  var x = document.getElementById(id);
	  if (x.type === "password") {
		x.type = "text";
	  } else {
		x.type = "password";
	  }
	}
  </script>
  <script>
	function blogBtn() {
		var title = document.getElementById("blogTitle");
		var des = document.getElementById("blogDes");
		if (title.value && des.value) {
			return true;
		}
		else {
			if (title.value == "") {
				document.getElementById("msg1").style.color = "red";
				document.getElementById("msg1").innerHTML = "Please write a title for your post!<br>";
			}
			if (des.value == "") {
				document.getElementById("msg2").style.color = "red";
				document.getElementById("msg2").innerHTML = "Please write a some description for your post!<br>";
			}
			return false;
		}
	}
  </script>
  <script>
	function blog() {
		var title = document.getElementById("blogTitle");
		var des = document.getElementById("blogDes");
		if (title.value)
			document.getElementById("msg1").innerHTML = "";
		if (des.value)
			document.getElementById("msg2").innerHTML = "";
	}
  </script>
  <script>
	function fileValidation(){
		var fileInput = document.getElementById("blogImg");
		var filePath = fileInput.value;
		var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
		if(!allowedExtensions.exec(filePath)){
			alert('Please upload file having extensions .jpeg / .jpg / .png / .gif only.');
			fileInput.value = '';
			return false;
		}else{
			var reader = new FileReader();
			//Image preview
			if (fileInput.files && fileInput.files[0]) {
				reader.onload = function(e) {
					document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
				};
				reader.readAsDataURL(fileInput.files[0]);
			}
		}
	}
  </script>
  <script>
	// Get the modal
	var imgmodal = document.getElementById('imgModal');

	// Get the image and insert it inside the modal - use its "alt" text as a caption
	var img = document.getElementById('blogImg');
	var modalImg = document.getElementById("blog-img");
	
	function openPhoto() {
		imgmodal.style.display = "block";
		modalImg.src = img.src;
		captionText.innerHTML = img.alt;
	}
	
	// When the user clicks on <span> (x), close the modal
	function closePhoto() { 
		imgmodal.style.display = "none";
	}
	
	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == imgmodal) {
			imgmodal.style.display = "none";
		}
	}
  </script>
  <script>
	var deletemodal = document.getElementById('deleteBlogModal');

	// When the user clicks the button, open the modal 
	function openDelete() {
		deletemodal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	function closeDelete() {
		deletemodal.style.display = "none";
	}
  </script>
  <script>
	 //setting box
	// Get the modal
	var settingmodal = document.getElementById('settingModal');

	// When the user clicks the button, open the modal 
	function openSetting() {
		settingmodal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	function closeSetting() {
		settingmodal.style.display = "none";
	}
	
	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == settingmodal) {
			settingmodal.style.display = "none";
		}
	}
  </script>
  <script type = "text/javascript">
	$(document).ready(function() {
		var uTable = $('#userTable').dataTable();
		
		$('ul#load li a').on('click', function(){
			var user = $(this).attr('id');
			if (user != '') 
			{
				$.ajax({
					url: 'user.php',
					dataType: 'json',
					success: function(s) {
						uTable.fnClearTable();
						for (var i = 0; i < s.length; i++) 
						{
							uTable.fnAddData([
							
							s[i][0],
							s[i][1]
							
							]);
						}
					},
					
					error:function(e) {
						console.log(e.responseText);
					}
				});
			}
		});
		
		$('ul#load li a').trigger('click');
		
		uTable.on('click', '#delete', function() {
			var row = $(this).closest('tr');
			var rowUn = row.find("td").eq(0).text();
			
			$.ajax({
				url: 'user.php',
				method: 'POST',
				dataType: 'text',
				data: {
					key: "deleteRow",
					rowUn: rowUn
				},
				beforeSend: function() {
					return confirm("Are you sure to remove this row?\nThis action cannot be undone!");
				},
				success: function(response) {
					row.remove();
					alert(response);
				}
			});
		});
		
		uTable.on('click', '#view', function(e) {
			e.stopPropagation();
			var row = $(this).closest('tr');
			var rowUn = row.find("td").eq(0).text();
			
			$.ajax({
				url: 'user.php',
				method: 'POST',
				dataType: 'json',
				data: {
					key: "rowData",
					rowUn: rowUn
				},
				success: function(response) {
					$("#uViewContent").fadeIn();
					$("#uEditContent").fadeOut();
					$("#uNameView").html(response.un);
					$("#fNameView").html(response.fn);
					$("#lNameView").html(response.ln);
					$("#emailView").html(response.em);
					$("#passwordView").html(response.pw);
					$("#uCloseBtn").fadeIn();
					$("#uCloseBtn").on('click', function() {
						$("#userModal").css('display', 'none');
					});
					$("#uSaveBtn").fadeOut();
					$("#userModal").css('display', 'block');
				},
				error:function(e) {
					console.log(e.responseText);
				}
			});
		});
		
		uTable.on('click', '#edit', function(e) {
			e.stopPropagation();
			var row = $(this).closest('tr');
			var rowUn = row.find("td").eq(0).text();
			
			$.ajax({
				url: 'user.php',
				method: 'POST',
				dataType: 'json',
				data: {
					key: "rowData",
					rowUn: rowUn
				},
				success: function(response) {
					$("#uEditContent").fadeIn();
					$("#uViewContent").fadeOut();
					$("#uNameEdit").html(response.un);
					$("#fNameEdit").val(response.fn);
					$("#lNameEdit").val(response.ln);
					$("#emailEdit").val(response.em);
					$("#passwordEdit").val(response.pw);
					$("#uCloseBtn").fadeIn();
					$("#uCloseBtn").on('click', function() {
						$("#userModal").css('display', 'none');
					});
					$("#uSaveBtn").fadeIn();
					$("#uSaveBtn").on('click', function() {
						var fn = $("#fNameEdit");
						var ln = $("#lNameEdit");
						var em = $("#emailEdit");
						var pw = $("#passwordEdit");
						
						if (fn.val() != "" && ln.val() != "" && em.val() != "" && pw.val() != "") {
							$.ajax({
								url: 'user.php',
								method: 'POST',
								dataType: 'text',
								data: {
									key: 'editRow',
									rowUn: rowUn,
									fn: fn.val(),
									ln: ln.val(),
									em: em.val(),
									pw: pw.val(),
								},
								success: function(response) {
									$("#userModal").css('display', 'none');
									alert(response);
								},
								error:function(e) {
									alert(e.responseText);
								}
							});
						}
						else {
							alert("Please fill up all fields!");
						}
					});
					$("#userModal").css('display', 'block');
				},
				error:function(e) {
					console.log(e.responseText);
				}
			});
		});
		
		$("body").click(function(){
			$("#userModal").css('display', 'none');
		});

		$(".modal-content").click(function(e){
		   e.stopPropagation();
		});
	});
  </script>
  <script type = "text/javascript">
	$(document).ready(function() {
		var cTable = $('#comTable').dataTable();
		
		$('ul#load li a').on('click', function(){
			var com = $(this).attr('id');
			if (com != '') 
			{
				$.ajax({
					url: 'com.php',
					dataType: 'json',
					success: function(s) {
						cTable.fnClearTable();
						for (var i = 0; i < s.length; i++) 
						{
							cTable.fnAddData([
							
							s[i][0],
							s[i][1],
							s[i][2],
							s[i][3],
							s[i][4]
							
							]);
						}
					},
					
					error:function(e) {
						console.log(e.responseText);
					}
				});
			}
		});
				
		cTable.on('click', '#delete', function() {
			var row = $(this).closest('tr');
			var rowId = row.find("td").eq(0).text();
			
			$.ajax({
				url: 'com.php',
				method: 'POST',
				dataType: 'text',
				data: {
					key: "deleteRow",
					rowId: rowId
				},
				beforeSend: function() {
					return confirm("Are you sure to remove this row?\nThis action cannot be undone!");
				},
				success: function(response) {
					row.remove();
					alert(response);
				}
			});
		});
		
		cTable.on('click', '#view', function(e) {
			e.stopPropagation();
			var row = $(this).closest('tr');
			var rowId = row.find("td").eq(0).text();
			
			$.ajax({
				url: 'com.php',
				method: 'POST',
				dataType: 'json',
				data: {
					key: "rowData",
					rowId: rowId
				},
				success: function(response) {
					$("#cViewContent").fadeIn();
					$("#cEditContent").fadeOut();
					$("#idViewC").html(response.id);
					$("#authorViewC").html(response.author);
					$("#titleViewC").html(response.title);
					$("#desViewC").html(response.des);
					$("#imageViewC").html(response.img);
					$("#dateViewC").html(response.date);
					$("#cCloseBtn").fadeIn();
					$("#cCloseBtn").on('click', function() {
						$("#comModal").css('display', 'none');
					});
					$("#cSaveBtn").fadeOut();
					$("#comModal").css('display', 'block');
				},
				error:function(e) {
					console.log(e.responseText);
				}
			});
		});
		
		cTable.on('click', '#edit', function(e) {
			e.stopPropagation();
			var row = $(this).closest('tr');
			var rowId = row.find("td").eq(0).text();
			
			$.ajax({
				url: 'com.php',
				method: 'POST',
				dataType: 'json',
				data: {
					key: "rowData",
					rowId: rowId
				},
				success: function(response) {
					var reader = new FileReader();
					$("#cEditContent").fadeIn();
					$("#cViewContent").fadeOut();
					$("#idEditC").html(response.id);
					$("#cRowId").val(response.id);
					$("#cKey").val("editRow");
					$("#authorEditC").html(response.author);
					$("#titleEditC").val(response.title);
					$("#desEditC").val(response.des);
					$("#dateEditC").html(response.date);
					$("#cCloseBtn").fadeIn();
					$("#cCloseBtn").on('click', function() {
						$("#comModal").css('display', 'none');
					});
					$("#cSaveBtn").fadeIn();
					$("#cSaveBtn").on('click', function() {
						$("#cForm").submit();
					});
					$("#comModal").css('display', 'block');
				},
				error:function(e) {
					console.log(e.responseText);
				}
			});
		});
		
		$("#cForm").submit(function(e) {
			var formObj = $(this);
			var formURL = formObj.attr("action");
			
			if (window.FormData !== undefined) {
				var form = new FormData(this);
				var title = $("#titleEditC");
				var des = $("#desEditC");
				var img = $("#imageEditC")[0].files.length;
				
				if (title.val() != "" && des.val() != "" && img != 0) {
					$.ajax({
						url: 'com.php',
						method: 'POST',
						mimeType: 'multipart/form-data',
						data: form,
						processData: false,
						cache: false,
						contentType: false,
						success: function(response) {
							$("#comModal").css('display', 'none');
							alert(response);
						},
						error:function(e) {
							alert(e.responseText);
						}
					});
					e.stopPropagation();
					e.preventDefault();
					$("#imageEditC").val("");
				}
				else {
					alert("Please fill up all fields!");
				}
			}
		});
		
		$("body").click(function(){
			$("#comModal").css('display', 'none');
		});

		$(".modal-content").click(function(e){
		   e.stopPropagation();
		});
	});
  </script>
  <script type = "text/javascript">
	$(document).ready(function() {
		var coTable = $('#conTable').dataTable();
		
		$('ul#load li a').on('click', function(){
			var con = $(this).attr('id');
			if (con != '') 
			{
				$.ajax({
					url: 'cont.php',
					dataType: 'json',
					success: function(s) {
						coTable.fnClearTable();
						for (var i = 0; i < s.length; i++) 
						{
							coTable.fnAddData([
							
							s[i][0],
							s[i][1],
							s[i][2],
							s[i][3],
							s[i][4]
							
							]);
						}
					},
					
					error:function(e) {
						console.log(e.responseText);
					}
				});
			}
		});
				
		coTable.on('click', '#delete', function() {
			var row = $(this).closest('tr');
			var rowId = row.find("td").eq(0).text();
			
			$.ajax({
				url: 'cont.php',
				method: 'POST',
				dataType: 'text',
				data: {
					key: "deleteRow",
					rowId: rowId
				},
				beforeSend: function() {
					return confirm("Are you sure to remove this row?\nThis action cannot be undone!");
				},
				success: function(response) {
					row.remove();
					alert(response);
				}
			});
		});
		
		coTable.on('click', '#view', function(e) {
			e.stopPropagation();
			var row = $(this).closest('tr');
			var rowId = row.find("td").eq(0).text();
			
			$.ajax({
				url: 'cont.php',
				method: 'POST',
				dataType: 'json',
				data: {
					key: "rowData",
					rowId: rowId
				},
				success: function(response) {
					$("#coViewContent").fadeIn();
					$("#coEditContent").fadeOut();
					$("#idViewCo").html(response.id);
					$("#replyViewCo").html(response.reply);
					$("#nameViewCo").html(response.name);
					$("#emailViewCo").html(response.email);
					$("#msgViewCo").html(response.msg);
					$("#dateViewCo").html(response.date);
					$("#coCloseBtn").fadeIn();
					$("#coCloseBtn").on('click', function() {
						$("#conModal").css('display', 'none');
					});
					$("#coSaveBtn").fadeOut();
					$("#conModal").css('display', 'block');
				},
				error:function(e) {
					console.log(e.responseText);
				}
			});
		});
		
		coTable.on('click', '#edit', function(e) {
			e.stopPropagation();
			var row = $(this).closest('tr');
			var rowId = row.find("td").eq(0).text();
			
			$.ajax({
				url: 'cont.php',
				method: 'POST',
				dataType: 'json',
				data: {
					key: "rowData",
					rowId: rowId
				},
				success: function(response) {
					$("#coEditContent").fadeIn();
					$("#coViewContent").fadeOut();
					$("#idEditCo").html(response.id);
					$("#replyEditCo").val(response.reply);
					$("#nameEditCo").val(response.name);
					$("#emailEditCo").val(response.email);
					$("#msgEditCo").val(response.msg);
					$("#dateEditCo").html(response.date);
					$("#coCloseBtn").fadeIn();
					$("#coCloseBtn").on('click', function() {
						$("#conModal").css('display', 'none');
					});
					$("#coSaveBtn").fadeIn();
					$("#coSaveBtn").on('click', function() {
						var name = $("#nameEditCo");
						var email = $("#emailEditCo");
						var msg = $("#msgEditCo");
						var reply = $("#replyEditCo");
						
						if (name != "" && email != "" && msg != "") {
							$.ajax({
								url: 'cont.php',
								method: 'POST',
								dataType: 'text',
								data: {
									key: 'editRow',
									rowId: rowId,
									name: name.val(),
									email: email.val(),
									msg: msg.val(),
									reply: reply.val()
								},
								success: function(response) {
									$("#conModal").css('display', 'none');
									alert(response);
								},
								error:function(e) {
									alert(e.responseText);
								}
							});
						}
						else {
							alert("Please fill up all fields!");
						}
					});
					$("#conModal").css('display', 'block');
				},
				error:function(e) {
					console.log(e.responseText);
				}
			});
		});
		
		$("body").click(function(){
			$("#conModal").css('display', 'none');
		});

		$(".modal-content").click(function(e){
		   e.stopPropagation();
		});
	});
  </script>
  <script type = "text/javascript">
	$(document).ready(function() {
		var bTable = $('#budTable').dataTable();
		
		$('ul#load li a').on('click', function(){
			var bud = $(this).attr('id');
			if (bud != '') 
			{
				$.ajax({
					url: 'bud.php',
					dataType: 'json',
					success: function(s) {
						bTable.fnClearTable();
						for (var i = 0; i < s.length; i++) 
						{
							bTable.fnAddData([
							
							s[i][0],
							s[i][1],
							s[i][2],
							s[i][3]
							
							]);
						}
					},
					
					error:function(e) {
						console.log(e.responseText);
					}
				});
			}
		});
				
		bTable.on('click', '#delete', function() {
			var row = $(this).closest('tr');
			var rowId = row.find("td").eq(0).text();
			
			$.ajax({
				url: 'bud.php',
				method: 'POST',
				dataType: 'text',
				data: {
					key: "deleteRow",
					rowId: rowId
				},
				beforeSend: function() {
					return confirm("Are you sure to remove this row?\nThis action cannot be undone!");
				},
				success: function(response) {
					row.remove();
					alert(response);
				}
			});
		});
		
		bTable.on('click', '#view', function(e) {
			e.stopPropagation();
			var row = $(this).closest('tr');
			var rowId = row.find("td").eq(0).text();
			
			$.ajax({
				url: 'bud.php',
				method: 'POST',
				dataType: 'json',
				data: {
					key: "rowData",
					rowId: rowId
				},
				success: function(response) {
					$("#bViewContent").fadeIn();
					$("#bEditContent").fadeOut();
					$("#bAddContent").fadeOut();
					$("#idViewB").html(response.id);
					$("#dayViewB").html(response.day);
					$("#placeViewB").html(response.place);
					$("#transportViewB").html(response.transport);
					$("#hotelViewB").html(response.hotel);
					$("#priceViewB").html(response.price);
					$("#bCloseBtn").fadeIn();
					$("#bCloseBtn").on('click', function() {
						$("#budModal").css('display', 'none');
					});
					$("#bSaveBtn").fadeOut();
					$("#bAddBtn").fadeOut();
					$("#budModal").css('display', 'block');
				},
				error:function(e) {
					console.log(e.responseText);
				}
			});
		});
		
		bTable.on('click', '#edit', function(e) {
			e.stopPropagation();
			var row = $(this).closest('tr');
			var rowId = row.find("td").eq(0).text();
			
			$.ajax({
				url: 'bud.php',
				method: 'POST',
				dataType: 'json',
				data: {
					key: "rowData",
					rowId: rowId
				},
				success: function(response) {
					$("#bEditContent").fadeIn();
					$("#bViewContent").fadeOut();
					$("#bAddContent").fadeOut();
					$("#idEditB").html(response.id);
					$("#dayEditB").val(response.day);
					$("#placeEditB").val(response.place);
					$("#transportEditB").val(response.transport);
					$("#hotelEditB").val(response.hotel);
					$("#priceEditB").val(response.price);
					$("#bAddBtn").fadeOut();
					$("#bCloseBtn").fadeIn();
					$("#bCloseBtn").on('click', function() {
						$("#budModal").css('display', 'none');
					});
					$("#bSaveBtn").fadeIn();
					$("#bSaveBtn").on('click', function() {
						var day = $("#dayEditB");
						var place = $("#placeEditB");
						var transport = $("#transportEditB");
						var hotel = $("#hotelEditB");
						var price = $("#priceEditB");
						
						if (day != "" && place != "" && transport != "" && hotel != "" && price != "") {
							$.ajax({
								url: 'bud.php',
								method: 'POST',
								dataType: 'text',
								data: {
									key: 'editRow',
									rowId: rowId,
									day: day.val(),
									place: place.val(),
									transport: transport.val(),
									hotel: hotel.val(),
									price: price.val()
								},
								success: function(response) {
									$("#budModal").css('display', 'none');
									alert(response);
								},
								error:function(e) {
									alert(e.responseText);
								}
							});
						}
						else {
							alert("Please fill up all fields!");
						}
					});
					$("#budModal").css('display', 'block');
				},
				error:function(e) {
					console.log(e.responseText);
				}
			});
		});
		
		$("#addBtnB").on('click', function(e) {
			e.stopPropagation();
			$("#bAddContent").fadeIn();
			$("#bEditContent").fadeOut();
			$("#bViewContent").fadeOut();
			$("#dayAddB").val();
			$("#placeAddB").val();
			$("#transportAddB").val();
			$("#hotelAddB").val();
			$("#priceAddB").val();
			$("#bCloseBtn").fadeIn();
			$("#bCloseBtn").on('click', function() {
				$("#budModal").css('display', 'none');
			});
			$("#bSaveBtn").fadeOut();
			$("#bAddBtn").fadeIn();
			$("#bAddBtn").on('click', function() {
				var day = $("#dayAddB");
				var place = $("#placeAddB");
				var transport = $("#transportAddB");
				var hotel = $("#hotelAddB");
				var price = $("#priceAddB");
				
				if (day != "" && place != "" && transport != "" && hotel != "" && price != "") {
					$.ajax({
						url: 'bud.php',
						method: 'POST',
						dataType: 'text',
						data: {
							key: 'addRow',
							day: day.val(),
							place: place.val(),
							transport: transport.val(),
							hotel: hotel.val(),
							price: price.val()
						},
						success: function(response) {
							$("#budModal").css('display', 'none');
							window.location.reload();
						},
						error:function(e) {
							alert(e.responseText);
						}
					});
				}
				else {
					alert("Please fill up all fields!");
				}
			});
			$("#budModal").css('display', 'block');
		});
		
		$("body").click(function(){
			$("#budModal").css('display', 'none');
		});

		$(".modal-content").click(function(e){
		   e.stopPropagation();
		});
	});
  </script>
  <script type = "text/javascript">
	$(document).ready(function() {
		var hTable = $('#hotTable').dataTable();
		
		$('ul#load li a').on('click', function(){
			var hot = $(this).attr('id');
			if (hot != '') 
			{
				$.ajax({
					url: 'hot.php',
					dataType: 'json',
					success: function(s) {
						hTable.fnClearTable();
						for (var i = 0; i < s.length; i++) 
						{
							hTable.fnAddData([
							
							s[i][0],
							s[i][1],
							s[i][2]
							
							]);
						}
					},
					
					error:function(e) {
						console.log(e.responseText);
					}
				});
			}
		});
				
		hTable.on('click', '#delete', function() {
			var row = $(this).closest('tr');
			var rowId = row.find("td").eq(0).text();
			
			$.ajax({
				url: 'hot.php',
				method: 'POST',
				dataType: 'text',
				data: {
					key: "deleteRow",
					rowId: rowId
				},
				beforeSend: function() {
					return confirm("Are you sure to remove this row?\nThis action cannot be undone!");
				},
				success: function(response) {
					row.remove();
					alert(response);
				}
			});
		});
		
		hTable.on('click', '#view', function(e) {
			e.stopPropagation();
			var row = $(this).closest('tr');
			var rowId = row.find("td").eq(0).text();
			
			$.ajax({
				url: 'hot.php',
				method: 'POST',
				dataType: 'json',
				data: {
					key: "rowData",
					rowId: rowId
				},
				success: function(response) {
					$("#hViewContent").fadeIn();
					$("#hEditContent").fadeOut();
					$("#hAddContent").fadeOut();
					$("#idViewH").html(response.id);
					$("#placeViewH").html(response.place);
					$("#detailViewH").html(response.detail);
					$("#locViewH").html(response.loc);
					$("#ohViewH").html(response.oh);
					$("#imageViewH").html(response.img);
					$("#hCloseBtn").fadeIn();
					$("#hCloseBtn").on('click', function() {
						$("#hotModal").css('display', 'none');
					});
					$("#hSaveBtn").fadeOut();
					$("#hAddBtn").fadeOut();
					$("#hotModal").css('display', 'block');
				},
				error:function(e) {
					console.log(e.responseText);
				}
			});
		});
		
		hTable.on('click', '#edit', function(e) {
			e.stopPropagation();
			var row = $(this).closest('tr');
			var rowId = row.find("td").eq(0).text();
			
			$.ajax({
				url: 'hot.php',
				method: 'POST',
				dataType: 'json',
				data: {
					key: "rowData",
					rowId: rowId
				},
				success: function(response) {
					var reader = new FileReader();
					$("#hEditContent").fadeIn();
					$("#hViewContent").fadeOut();
					$("#hAddContent").fadeOut();
					$("#idEditH").html(response.id);
					$("#hRowId").val(response.id);
					$("#hKey").val("editRow");
					$("#placeEditH").val(response.place);
					$("#detailEditH").val(response.detail);
					$("#locEditH").val(response.loc);
					$("#ohEditH").val(response.oh);
					$("#hAddBtn").fadeOut();
					$("#hCloseBtn").fadeIn();
					$("#hCloseBtn").on('click', function() {
						$("#hotModal").css('display', 'none');
					});
					$("#hSaveBtn").fadeIn();
					$("#hSaveBtn").on('click', function() {
						$("#hForm").submit();
					});
					$("#hotModal").css('display', 'block');
				},
				error:function(e) {
					console.log(e.responseText);
				}
			});
		});
		
		$("#addBtnH").on('click', function(e) {
			e.stopPropagation();
			$("#hAddContent").fadeIn();
			$("#hEditContent").fadeOut();
			$("#hViewContent").fadeOut();
			$("#placeAddH").val();
			$("#detailAddH").val();
			$("#locAddH").val();
			$("#ohAddH").val();
			$("#imageAddH").val();
			$("#hCloseBtn").fadeIn();
			$("#hCloseBtn").on('click', function() {
				$("#hotModal").css('display', 'none');
			});
			$("#hSaveBtn").fadeOut();
			$("#hAddBtn").fadeIn();
			$("#hAddBtn").on('click', function() {
				$("#hAddForm").submit();
			});
			$("#hotModal").css('display', 'block');
		});
		
		$("#hAddForm").submit(function(e) {
			var formObj = $(this);
			var formURL = formObj.attr("action");
			
			if (window.FormData !== undefined) {
				var form = new FormData(this);
				var place = $("#placeAddH");
				var detail = $("#detailAddH");
				var loc = $("#locAddH");
				var oh = $("#ohAddH");
				var img = $("#imageAddH")[0].files.length;
				
				if (place.val() != "" && detail.val() != "" && loc.val() != "" && oh.val() != "" && img != 0) {
					$.ajax({
						url: 'hot.php',
						method: 'POST',
						mimeType: 'multipart/form-data',
						data: form,
						processData: false,
						cache: false,
						contentType: false,
						success: function(response) {
							$("#hotModal").css('display', 'none');
							alert(response);
						},
						error:function(e) {
							alert(e.responseText);
						}
					});
					e.stopPropagation();
					e.preventDefault();
					$("#imageAddH").val("");
				}
				else {
					alert("Please fill up all fields!");
				}
			}
		});
		
		$("#hForm").submit(function(e) {
			var formObj = $(this);
			var formURL = formObj.attr("action");
			
			if (window.FormData !== undefined) {
				var form = new FormData(this);
				var place = $("#placeEditH");
				var detail = $("#detailEditH");
				var loc = $("locEditH");
				var oh = $("ohEditH");
				var img = $("#imageEditH")[0].files.length;
				
				if (place.val() != "" && detail.val() != "" && loc.val() != "" && oh.val() != "" && img != 0) {
					$.ajax({
						url: 'hot.php',
						method: 'POST',
						mimeType: 'multipart/form-data',
						data: form,
						processData: false,
						cache: false,
						contentType: false,
						success: function(response) {
							$("#hotModal").css('display', 'none');
							window.location.reload();
						},
						error:function(e) {
							alert(e.responseText);
						}
					});
					e.stopPropagation();
					e.preventDefault();
					$("#imageEditH").val("");
				}
				else {
					alert("Please fill up all fields!");
				}
			}
		});
		
		$("body").click(function(){
			$("#hotModal").css('display', 'none');
		});

		$(".modal-content").click(function(e){
		   e.stopPropagation();
		});
	});
  </script>
  <script type = "text/javascript">
	$(document).ready(function() {
		var aTable = $('#artTable').dataTable();
		
		$('ul#load li a').on('click', function(){
			var art = $(this).attr('id');
			if (art != '') 
			{
				$.ajax({
					url: 'art.php',
					dataType: 'json',
					success: function(s) {
						aTable.fnClearTable();
						for (var i = 0; i < s.length; i++) 
						{
							aTable.fnAddData([
							
							s[i][0],
							s[i][1],
							s[i][2],
							s[i][3]
							
							]);
						}
					},
					
					error:function(e) {
						console.log(e.responseText);
					}
				});
			}
		});
				
		aTable.on('click', '#delete', function() {
			var row = $(this).closest('tr');
			var rowId = row.find("td").eq(0).text();
			
			$.ajax({
				url: 'art.php',
				method: 'POST',
				dataType: 'text',
				data: {
					key: "deleteRow",
					rowId: rowId
				},
				beforeSend: function() {
					return confirm("Are you sure to remove this row?\nThis action cannot be undone!");
				},
				success: function(response) {
					row.remove();
					alert(response);
				}
			});
		});
		
		aTable.on('click', '#view', function(e) {
			e.stopPropagation();
			var row = $(this).closest('tr');
			var rowId = row.find("td").eq(0).text();
			
			$.ajax({
				url: 'art.php',
				method: 'POST',
				dataType: 'json',
				data: {
					key: "rowData",
					rowId: rowId
				},
				success: function(response) {
					$("#aViewContent").fadeIn();
					$("#aEditContent").fadeOut();
					$("#idViewA").html(response.id);
					$("#authorViewA").html(response.author);
					$("#titleViewA").html(response.title);
					$("#desViewA").html(response.des);
					$("#imageViewA").html(response.img);
					$("#aCloseBtn").fadeIn();
					$("#aCloseBtn").on('click', function() {
						$("#artModal").css('display', 'none');
					});
					$("#aSaveBtn").fadeOut();
					$("#artModal").css('display', 'block');
				},
				error:function(e) {
					console.log(e.responseText);
				}
			});
		});
		
		aTable.on('click', '#edit', function(e) {
			e.stopPropagation();
			var row = $(this).closest('tr');
			var rowId = row.find("td").eq(0).text();
			
			$.ajax({
				url: 'art.php',
				method: 'POST',
				dataType: 'json',
				data: {
					key: "rowData",
					rowId: rowId
				},
				success: function(response) {
					var reader = new FileReader();
					$("#aEditContent").fadeIn();
					$("#aViewContent").fadeOut();
					$("#idEditA").html(response.id);
					$("#aRowId").val(response.id);
					$("#aKey").val("editRow");
					$("#authorEditA").val(response.author);
					$("#titleEditA").val(response.title);
					$("#desEditA").val(response.des);
					$("#aCloseBtn").fadeIn();
					$("#aCloseBtn").on('click', function() {
						$("#artModal").css('display', 'none');
					});
					$("#aSaveBtn").fadeIn();
					$("#aSaveBtn").on('click', function() {
						$("#aForm").submit();
					});
					$("#artModal").css('display', 'block');
				},
				error:function(e) {
					console.log(e.responseText);
				}
			});
		});
		
		$("#aForm").submit(function(e) {
			var formObj = $(this);
			var formURL = formObj.attr("action");
			
			if (window.FormData !== undefined) {
				var form = new FormData(this);
				var author = $("#authorEditA");
				var title = $("#titleEditA");
				var des = $("#desEditA");
				var img = $("#imageEditA")[0].files.length;
				
				if (author.val() != "" && title.val() != "" && des.val() != "" && $img != 0) {
					$.ajax({
						url: 'art.php',
						method: 'POST',
						mimeType: 'multipart/form-data',
						data: form,
						processData: false,
						cache: false,
						contentType: false,
						success: function(response) {
							$("#artModal").css('display', 'none');
							alert(response);
						},
						error:function(e) {
							alert(e.responseText);
						}
					});
					e.stopPropagation();
					e.preventDefault();
					$("#imageEditA").val("");
				}
				else {
					alert("Please fill up all fields!");
				}
			}
		});
		
		$("body").click(function(){
			$("#artModal").css('display', 'none');
		});

		$(".modal-content").click(function(e){
		   e.stopPropagation();
		});
	});
  </script>
  <script>
	$('.price_range').jRange({
		from: 0,
		to: 2000,
		step: 100,
		format: 'RM%s ',
		width: 300,
		showLabels: true,
		isRange : true
	});
  </script>
  <script>
	function goBack() {
		window.history.back();
	}
  </script>
  <script>
	$(function() {
		$("#searchBox").autocomplete({
			source: 's.php'
		});
	});
  </script>
  <script type = "text/javascript">
	$(document).ready(function() {
		var id = $("#budget").text();
		var un = $("#un").text();
		
		$.ajax({
			url: 'fav.php',
			method: 'POST',
			dataType: 'text',
			data: {
				key: 'check',
				id: id,
				un: un
			},
			success: function(data) {
				if (data != "") {
					$('#favicon').addClass('active');
					$("#fav").html(data);
				}
			},
			error:function(e) {
				alert(e.responseText);
			}
		});
		
		
		$('#favicon').click(function(event) {
			event.preventDefault();
			$('#favicon').toggleClass('active');
			
			if ($('#favicon').hasClass('active')) {
				$.ajax({
					url: 'fav.php',
					method: 'POST',
					dataType: 'text',
					data: {
						key: 'add',
						id: id,
						un: un
					}, 
					success: function(data) {
						$("#fav").html(data);
					},
					error:function(e) {
						alert(e.responseText);
					}
				});
			}
			else {
				$.ajax({
					url: 'fav.php',
					method: 'POST',
					dataType: 'text',
					data: {
						key: 'remove',
						id: id,
						un: un
					}, 
					success: function(data) {
						$("#fav").html(data);
					},
					error:function(e) {
						alert(e.responseText);
					}
				});
			}
		});
	});
  </script>
  <script type = "text/javascript">
	$(function(){
		$('div.fav-remove').on('click', function(){
			$(this).find('#fav_remove').each(function() {
				$.ajax({
					url: 'fav.php',
					method: 'POST',
					dataType: 'text',
					data: {
						fav_r: $(this).text()
					},
					beforeSend: function() {
						return confirm("Are you sure to remove this budget plan?");
					},
					success: function(data) {
						alert(data);
						window.location.reload();
					},
					error:function(e) {
						alert(e.responseText);
					}
				});
			});
		});
	});
  </script>
  <script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click','.show_more',function(){
			var id = $(this).attr('id').split('|');
			$('.show_more').hide();
			$('.loding').show();
			$.ajax({
				type:'POST',
				url:'load-more.php',
				data: {
					id: id[0],
					hid: id[1]
				},
				success:function(html){
					$('#show_more_main'+id[0]).remove();
					$('.reviewList').append(html);
				}
			});
		});
	});
  </script>