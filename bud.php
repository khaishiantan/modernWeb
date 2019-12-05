<?php
	require_once("db_config.php");
	$dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
	mysqli_select_db($dbc, DB_NAME);
	
	if (isset($_POST['key']))
	{
		if ($_POST['key'] == "addRow")
		{
			if (!empty($_POST['day']) && !empty($_POST['place']) && !empty($_POST['transport']) && !empty($_POST['hotel']) && !empty($_POST['price']))
			{
				if (is_numeric($_POST['day']) && is_numeric($_POST['price']))
				{
					$day = mysqli_real_escape_string($dbc, $_POST['day']);
					$place = mysqli_real_escape_string($dbc, $_POST['place']);
					$place = str_ireplace("<br>", "^", $place);
					$transport = mysqli_real_escape_string($dbc, $_POST['transport']);
					$transport = str_ireplace("<br>", "^", $transport);
					$hotel = mysqli_real_escape_string($dbc, $_POST['hotel']);
					$hotel = str_ireplace("<br>", "^", $hotel);
					$price = mysqli_real_escape_string($dbc, $_POST['price']);
				
					$query = "INSERT INTO budget_speedtravel (day, place, transport, hotel, price) VALUES('$day', '$place', '$transport', '$hotel', '$price')";
					mysqli_query($dbc, $query);
					exit('The Budget Has Been Added!');
				}
				else
				{
					exit('Day and price must be numeric!');
				}
			}
			else
			{
				exit('Please fill up all fields!');
			}
		}
		
		$rowId = mysqli_real_escape_string($dbc, $_POST['rowId']);
		
		if ($_POST['key'] == "deleteRow")
		{
			$query = "DELETE FROM budget_speedtravel WHERE id='$rowId'";
			mysqli_query($dbc, $query);
			exit('The Row Has Been Deleted!');
		}
		
		if ($_POST['key'] == "editRow")
		{
			if (!empty($_POST['day']) && !empty($_POST['place']) && !empty($_POST['transport']) && !empty($_POST['hotel']) && !empty($_POST['price']))
			{
				if (is_numeric($_POST['day']) && is_numeric($_POST['price']))
				{
					$day = mysqli_real_escape_string($dbc, $_POST['day']);
					$place = mysqli_real_escape_string($dbc, $_POST['place']);
					$place = str_ireplace("<br>", "^", $place);
					$transport = mysqli_real_escape_string($dbc, $_POST['transport']);
					$transport = str_ireplace("<br>", "^", $transport);
					$hotel = mysqli_real_escape_string($dbc, $_POST['hotel']);
					$hotel = str_ireplace("<br>", "^", $hotel);
					$price = mysqli_real_escape_string($dbc, $_POST['price']);
				
					$query = "UPDATE budget_speedtravel SET day = '$day', place = '$place', transport = '$transport', hotel = '$hotel', price = '$price' WHERE id='$rowId'";
					mysqli_query($dbc, $query);
					exit('The Row Has Been Edited!');
				}
				else
				{
					exit('Day and price must be numeric!');
				}
			}
			else
			{
				exit('Please fill up all fields!');
			}
		}
		
		if ($_POST['key'] == "rowData")
		{
			$query = "SELECT * FROM budget_speedtravel WHERE id = '$rowId'";
			$r = mysqli_query($dbc, $query);
			$row = mysqli_fetch_array($r);
			$view = array(
				'id' => $row['id'],
				'day' => $row['day'],
				'place' => str_ireplace("^", "<br>", $row['place']),
				'transport' => str_ireplace("^", "<br>", $row['transport']),
				'hotel' => str_ireplace("^", "<br>", $row['hotel']),
				'price' => $row['price']
			);

			exit(json_encode($view));
		}
	}
	
	$query = "SELECT * FROM budget_speedtravel";
	$r = mysqli_query($dbc, $query);
	
	while ($row = mysqli_fetch_array($r))
	{
		$id = $row['id'];
		$day = $row['day'];
		$price = $row['price'];
		$opt = '<button id = "view" class = "adminViewBtn">View</button><button id = "edit" class = "adminEditBtn">Edit</button><button id = "delete" class = "adminDeleteBtn">Delete</button>';
		$output[] = array ($id, $day, $price, $opt);
	}
	
	exit(json_encode($output));
	
	mysqli_close($dbc);
?>