<?php
	require_once("db_config.php");
	$dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
	mysqli_select_db($dbc, DB_NAME);
		
	if (isset($_POST['key']))
	{
		if ($_POST['key'] == "addRow")
		{
			$img = $_FILES['newImage']['name'];
		
			if (!empty($_POST['place']) && !empty($_POST['detail']) && !empty($_POST['loc']) && !empty($_POST['oh']) && $img != "")
			{
				$place = mysqli_real_escape_string($dbc, $_POST['place']);
				$detail = mysqli_real_escape_string($dbc, $_POST['detail']);
				$loc = mysqli_real_escape_string($dbc, $_POST['loc']);
				$oh = mysqli_real_escape_string($dbc, $_POST['oh']);
				$fileTmp = $_FILES['newImage']['tmp_name'];
				$imgTmp = addslashes(file_get_contents($fileTmp));
				$imgFileType = strtolower(pathinfo($img,PATHINFO_EXTENSION));
				$imgExtension = array('jpg', 'png', 'jpeg', 'gif');
				
				if (in_array($imgFileType, $imgExtension))
				{
					move_uploaded_file($fileTmp, "images/" . $img);
		
					$query = "INSERT INTO hotspot_speedtravel (place, detail, location, operatingHour, image) VALUES ('$place', '$detail', '$loc', '$oh', '$img')";
					mysqli_query($dbc, $query);
					exit('The Row Has Been Edited!');
				}
				else
				{
					exit("Please upload file having extensions .jpeg / .jpg / .png / .gif only.");
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
			$query = "DELETE FROM hotspot_speedtravel WHERE id='$rowId'";
			mysqli_query($dbc, $query);
			exit('The Row Has Been Deleted!');
		}
		
		if ($_POST['key'] == "editRow")
		{
			$img = $_FILES['newImage']['name'];
		
			if (!empty($_POST['place']) && !empty($_POST['detail']) && !empty($_POST['loc']) && !empty($_POST['oh']) && $img != "")
			{
				$place = mysqli_real_escape_string($dbc, $_POST['place']);
				$detail = mysqli_real_escape_string($dbc, $_POST['detail']);
				$loc = mysqli_real_escape_string($dbc, $_POST['loc']);
				$oh = mysqli_real_escape_string($dbc, $_POST['oh']);
				$fileTmp = $_FILES['newImage']['tmp_name'];
				$imgTmp = addslashes(file_get_contents($fileTmp));
				$imgFileType = strtolower(pathinfo($img,PATHINFO_EXTENSION));
				$imgExtension = array('jpg', 'png', 'jpeg', 'gif');
				
				if (in_array($imgFileType, $imgExtension))
				{
					move_uploaded_file($fileTmp, "images/" . $img);
		
					$query = "UPDATE hotspot_speedtravel SET place = '$place', detail = '$detail', location = '$location', operatingHour = '$oh', image = '$img' WHERE id='$rowId'";
					mysqli_query($dbc, $query);
					exit('The Row Has Been Edited!');
				}
				else
				{
					exit("Please upload file having extensions .jpeg / .jpg / .png / .gif only.");
				}
			}
			else
			{
				exit('Please fill up all fields!');
			}
		}
		
		if ($_POST['key'] == "rowData")
		{
			$query = "SELECT * FROM hotspot_speedtravel WHERE id = '$rowId'";
			$r = mysqli_query($dbc, $query);
			$row = mysqli_fetch_array($r);
			$view = array(
				'id' => $row['id'],
				'place' => str_ireplace("^", "<br>", $row['place']),
				'detail' => str_ireplace("^", "<br>", $row['detail']),
				'loc' => str_ireplace("^", "<br>", $row['location']),
				'oh' => str_ireplace("^", "<br>", $row['operatingHour']),
				'img' => '<img src = "images/'.$row['image'].'" style= "width: 400px; height: 400px; object-fit: cover;">'
			);

			exit(json_encode($view));
		}
	}
	
	$query = "SELECT * FROM hotspot_speedtravel";
	$r = mysqli_query($dbc, $query);
	
	while ($row = mysqli_fetch_array($r))
	{
		$id = $row['id'];
		$place = $row['place'];
		$place = str_ireplace("^", "<br>", $place);
		$opt = '<button id = "view" class = "adminViewBtn">View</button><button id = "edit" class = "adminEditBtn">Edit</button><button id = "delete" class = "adminDeleteBtn">Delete</button>';
		$output[] = array ($id, $place, $opt);
	}
	
	exit(json_encode($output));
	
	mysqli_close($dbc);
?>