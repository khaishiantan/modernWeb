<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>How To Add Dynamic TextBox</title>
<!--Required Lib File  -->

  <script src="jquery.min.js"></script>
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$('#mybutton').on('click',function(){ // button click function
		
		
		var dynamicTexBox = []; // array stored text value
$('input[name="MyTextBox[]"]').each(function() { // push all text value to array
    dynamicTexBox.push($(this).val());
});
	// alert(dynamicTexBox);
		// ajax call for send value to another php file
		
		$.ajax({ // ajax call
			type:'POST', // data type
			url:'display.php', // php file
			data:'dynamicTexBox='+dynamicTexBox, // data pass to php file
			success:function(html){ // success function
				$('#mytextdiv').html(html); // assign value to textbox
				//alert('inside php file'+html);
				
				
				
			}
			
			
		});
		
		
		
		
	});
	
	
});



</script>

</head> 

<body>

<p><h2>How To Add Dymanic TextBox</h2></p>
  
  
  <div class="row">
  
  <div class="col-sm-2"><label>My First TextBox </label></div>
  
  <div class="col-sm-4"><input type="text" name="MyTextBox[]" class="form-control"></div>
 
<div class="col-sm-2"> <input type="button" name="mybtn" id="btnid" value="Add More+" class="btn btn-danger"></div>
 </div>
  <br>
  <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-2"><input type="button" name="mybutton" class="btn btn-danger" id="mybutton" value="Display Dynamic Text Value"></div>
  </div>
 <br>
  <div id="TextBoxDiv" >
</div>  
  
  <hr>
  <p><h1> value of my dynamicTexBox is:</h1>
</p>

<div id="mytextdiv" style="color:red;font-size:22px"></div>
  <hr>
  </body>
  <script>
  $(function(){
	  
   $('#btnid').bind('click',function(){ // add more button click event
		 
		  var div=$("<div/><br>"); // end of div
		  div.html(displayTextBox("")); // call function display text value
		  $("#TextBoxDiv").append(div);   // append function return value to div
		  
	  }); 
	  
	  
  });


function   displayTextBox(value) // function call textbox 
{
	// create dynamic text 
	return '<div class="row">'+
			'<div class="col-sm-2"><label>Dynamic TextBox </label></div>'+
	       '<div class="col-sm-4"><input type="text" name="MyTextBox[]" class="form-control">'+
		    '<div class="col-sm-2"></div>' 
	   
          
}
  
  
  
  
  
  
  </script>
  
  