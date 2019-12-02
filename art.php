<?php
	require_once("db_config.php");
	$dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
	mysqli_select_db($dbc, DB_NAME);
	
	if (isset($_POST['key']))
	{
		$rowId = mysqli_real_escape_string($dbc, $_POST['rowId']);
		
		if ($_POST['key'] == "deleteRow")
		{
			$query = "DELETE FROM article_speedtravel WHERE id='$rowId'";
			mysqli_query($dbc, $query);
			exit('The Row Has Been Deleted!');
		}
		
		if ($_POST['key'] == "editRow")
		{
			$img = $_FILES['newImage']['name'];
		
			if (!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['des']) && $img != "")
			{
				$author = mysqli_real_escape_string($dbc, $_POST['author']);
				$title = mysqli_real_escape_string($dbc, $_POST['title']);
				$des = mysqli_real_escape_string($dbc, $_POST['des']);
				$des = str_ireplace("<br>", "^", $des);
				$fileTmp = $_FILES['newImage']['tmp_name'];
				$imgTmp = addslashes(file_get_contents($fileTmp));
				$imgFileType = strtolower(pathinfo($img,PATHINFO_EXTENSION));
				$imgExtension = array('jpg', 'png', 'jpeg', 'gif');
				
				if (in_array($imgFileType, $imgExtension))
				{
					move_uploaded_file($fileTmp, "images/" . $img);
		
					$query = "UPDATE article_speedtravel SET author = '$author', title = '$title', body = '$des', image = '$img' WHERE id='$rowId'";
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
			$query = "SELECT * FROM article_speedtravel WHERE id = '$rowId'";
			$r = mysqli_query($dbc, $query);
			$row = mysqli_fetch_array($r);
			$view = array(
				'id' => $row['id'],
				'author' => str_ireplace("^", "<br>", $row['author']),
				'title' => str_ireplace("^", "<br>", $row['title']),
				'des' => str_ireplace("^", "<br>", $row['body']),
				'img' => '<img src = "images/'.$row['image'].'" style= "width: 400px; height: 400px; object-fit: cover;">'
			);

			exit(json_encode($view));
		}
	}
	
	$query = "SELECT * FROM article_speedtravel";
	$r = mysqli_query($dbc, $query);
	
	while ($row = mysqli_fetch_array($r))
	{
		$id = $row['id'];
		$author = $row['author'];
		$author = str_ireplace("^", "<br>", $author);
		$title = $row['title'];
		$title = str_ireplace("^", "<br>", $title);
		$opt = '<button id = "view" class = "adminViewBtn">View</button><button id = "edit" class = "adminEditBtn">Edit</button><button id = "delete" class = "adminDeleteBtn">Delete</button>';
		$output[] = array ($id, $author, $title, $opt);
	}
	
	echo json_encode($output);
	
	mysqli_close($dbc);
?>