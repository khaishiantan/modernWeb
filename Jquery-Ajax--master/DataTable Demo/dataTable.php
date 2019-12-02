<html>
<head>
<title>
Jquery DataTable Demo!

</title>
<!-- important task we required external jquery lib -->
<!--Now we can write script part which is required for fetch jquery datatable content from database -->
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.0/css/jquery.dataTables.css" />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.js"></script>
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/fixedheader/3.1.2/js/dataTables.fixedHeader.min.js"></script>
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>
 <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.dataTables.min.css"/>
 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<!--here we add css file for style -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

   <script type="text/javascript">
$(document).ready(function(){
	
	var oTable=$('#jsontable').dataTable();//initialize the table
// on button click event call data from database into table
	
	$('#load').on('click',function(){
		
		var user=$(this).attr('id');
		if(user!='')
		{
		$.ajax({// here we write ajax code for calling data
			url:'viewdata.php',//php file name
			dataType:'json',
			success:function(s){
				console.log(s);
				oTable.fnClearTable();
				for(var i=0;i<s.length;i++)// for loop for dsipaly data into table
				{
					oTable.fnAddData([// inbuilt jquery function
					
					s[i][0],
					s[i][1],
					s[i][2],
					s[i][3],
					s[i][4]
					
					
					]);// end of function AddData
					
				}
				
			},// end success
			// now we write one error function
			error:function(e){
				
				console.log(e.responseText);
				
			}
			
		}); // end ajax call
			
			
		}
		
		
	});// end of button click event
	
	// now load all table content on page load 
	
	$('#load').trigger('click');// trigger function automatically perform click event pn page load 
	
	
});
</script>

</head>

<body>
<!--html body tag -->
<h3>Jquery DataTable Example:</h3>
<!--First We write one table tag  -->
<!--we required jquery cdn file database table data for display  -->

<!-- we required one button for -->
<input type="button" class="btn btn-success" value="Load Table" id="load">
<br>
<br>
<div class="table-responsive">
<!--we can write table syntax here... -->
<table id="jsontable" class="display table table-bordered" >
<thead>
<tr class="btn-primary">
<td>ID</td>
<td>NAME</td>
<td>SALARY</td>
<td>AGE</td>
</tr>
</thead>
</table>

</div>
</body>



</html>