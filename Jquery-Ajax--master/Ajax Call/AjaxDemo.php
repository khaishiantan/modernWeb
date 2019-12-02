
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ajax Call demo</title>
<!--Required Lib File  -->
  <script src="jquery.min.js"></script>
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <script>
 
 $( document ).ready(function() {
					   // jquery document ready function
					   $('#submitbtn').on('click',function(){ // button click event
      	var firstno=$('#firsttext').val(); // value to first text box
		var secondno=$('#secondtext').val(); // value of seconf textbox
		//alert('inside button click function');
        
            $.ajax({ // ajax call here
                type:'POST', // data method
                url:'ajaxname.php',// pass file name here
               	data:'no1='+firstno+'&no2='+secondno, // pass data here
                success:function(html){ // ajax success function
                   $('#ansdiv').html(html);   // now assign ans to ans div
                                      }
                   }); 
                     
    });
    
  
	
	});
</script>

</head>
	  
<!-- Ajax Demo Tutorial-->
<!-- Now Add Required Text Field here-->
<p><h2>Ajax Demo (Calculation of two numbers) </h2> </p>
<div class="row">

<div class="col-sm-1"><label>Enter First Number:</label>
</div>
<div class="col-sm-2"><input type="text" name="firsttext" id="firsttext" class="form-control">
</div>
<div class="col-sm-1"><label> Enter Second Number</label></div>

<div class="col-sm-2"><input type="text" name="secondtext" id="secondtext" class="form-control"></div>

<div class="col-sm-2"><input type="button" class="btn btn-danger" value="Calculate Result" id="submitbtn"></div>


</div>
<hr><!-- Ans Div-->
<div id="ansdiv" style="color:red;font-size:22px"></div>
                    <!--start 6 row-->	
               
