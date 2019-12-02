<?php
	require_once("db_config.php");
	
	// Database configuration
	$dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
	mysqli_select_db($dbc, DB_NAME);

	// Get search term
	$searchTerm = $_GET['term'];

	$query = "SELECT * FROM hotspot_speedtravel WHERE place LIKE '%".$searchTerm."%' ORDER BY place ASC";

	$r = mysqli_query($dbc, $query);

	$hotData = array();
	if (mysqli_num_rows($r) > 0){
		while($row = mysqli_fetch_array($r)){
			$data['id'] = $row['id'];
			$data['value'] = $row['place'];
			array_push($hotData, $data);
		}
	}
	else
	{
		array_push($hotData, "No search results found!");
	}

	// Return results as json encoded array
	exit(json_encode($hotData));

?>