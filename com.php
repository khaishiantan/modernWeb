<?php
	require_once("db_config.php");
	$dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
	mysqli_select_db($dbc, DB_NAME);
	
	if (isset($_POST['key']))
	{
		$rowId = mysqli_real_escape_string($dbc, $_POST['rowId']);
		
		if ($_POST['key'] == "deleteRow")
		{
			$query = "DELETE FROM community_speedtravel WHERE id='$rowId'";
			mysqli_query($dbc, $query);
			exit('The Row Has Been Deleted!');
		}
		
		if ($_POST['key'] == "editRow")
		{
			$img = $_FILES['newImage']['name'];
		
			if (!empty($_POST['title']) && !empty($_POST['des']) && $img != "")
			{
				$title = mysqli_real_escape_string($dbc, $_POST['title']);
				$des = mysqli_real_escape_string($dbc, $_POST['des']);
				$fileTmp = $_FILES['newImage']['tmp_name'];
				$imgTmp = addslashes(file_get_contents($fileTmp));
				$imgFileType = strtolower(pathinfo($img,PATHINFO_EXTENSION));
				$imgExtension = array('jpg', 'png', 'jpeg', 'gif');
				
				if (in_array($imgFileType, $imgExtension))
				{
					move_uploaded_file($fileTmp, "images/" . $img);
		
					$query = "UPDATE community_speedtravel SET title = '$title', description = '$des', imageName = '$img' WHERE id='$rowId'";
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
			$query = "SELECT * FROM community_speedtravel WHERE id = '$rowId'";
			$r = mysqli_query($dbc, $query);
			$row = mysqli_fetch_array($r);
			$view = array(
				'id' => $row['id'],
				'author' => $row['UN'],
				'title' => $row['title'],
				'des' => $row['description'],
				'img' => '<img src = "images/'.$row['imageName'].'" style= "width: 400px; height: 400px; object-fit: cover;">',
				'date' => $row['lastUpdate']
			);

			exit(json_encode($view));
		}
	}
	
	$query = "SELECT * FROM community_speedtravel";
	$r = mysqli_query($dbc, $query);
	
	while ($row = mysqli_fetch_array($r))
	{
		$id = $row['id'];
		$un = $row['UN'];
		$title = $row['title'];
		$date = $row['lastUpdate'];
		$date = strftime("%Y-%m-%d&emsp;%H:%M:%S", strtotime($date));
		$opt = '<button id = "view" class = "adminViewBtn">View</button><button id = "edit" class = "adminEditBtn">Edit</button><button id = "delete" class = "adminDeleteBtn">Delete</button>';
		$output[] = array ($id, $un, $title, $date, $opt);
	}
	
	exit(json_encode($output));
	
	mysqli_close($dbc);
?>