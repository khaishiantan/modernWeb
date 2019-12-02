<?php
// here write php code
// fetch data from database & return in josn format
define("HOST",'localhost');// my host name
define("USER","root");//username
define("PASSWORD","");// database server(phpmyadmin) password// 
define("DATABASE","company");
// write connection query using above four parameters,

$mysqli=new mysqli(HOST,USER,PASSWORD,DATABASE);

if($mysqli){

$dbquery="SELECT * FROM employee";// query

$query=mysqli_query($mysqli,$dbquery); // we execute query here
// now fetch data from database
while($fetch=mysqli_fetch_row($query))//fetch all data from fatabase using loop
{// now here we want all data that's why we take array
	$output[]=array($fetch[0],$fetch[1],$fetch[2],$fetch[3]);
	
}
echo json_encode($output);//echo outputstring using json data
}else{
	
	echo "error";
}
?>