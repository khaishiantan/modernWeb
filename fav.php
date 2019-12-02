<?php
	require_once("db_config.php");
	$dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
	mysqli_select_db($dbc, DB_NAME);
	
	if (isset($_POST['key']))
	{
		if ($_POST['key'] == "check")
		{
			$id = $_POST['id'];
			$un = $_POST['un'];
			
			$query = "SELECT * FROM favourite_speedtravel WHERE budget_id = '$id' AND UN = '$un'";
			$r = mysqli_query($dbc, $query);
			
			if (mysqli_num_rows($r) > 0)
			{
				echo "Budget plan already added to favourite previously!";
			}
		}
		if ($_POST['key'] == "add")
		{
			$id = $_POST['id'];
			$un = $_POST['un'];
			
			$query = "INSERT INTO favourite_speedtravel (UN, budget_id) VALUES ('$un', '$id')";
			
			if (mysqli_query($dbc, $query))
			{
				echo "Budget plan added to favourite!";
			}
		}
		
		if($_POST['key'] == "remove")
		{
			$un = $_POST['un'];
			$id = $_POST['id'];
			
			$query = "DELETE FROM favourite_speedtravel WHERE UN = '$un' AND budget_id = '$id'";
		
			if (mysqli_query($dbc, $query))
			{
				echo "Budget plan have been removed from favourite!";
			}
		}
	}
	
	if (isset($_POST['fav_r']))
	{
		$fav = $_POST['fav_r'];
		
		$query = "DELETE FROM favourite_speedtravel WHERE id = '$fav'";
		
		if (mysqli_query($dbc, $query))
		{
			echo "Budget plan have been removed from favourite!";
		}
	}
?>