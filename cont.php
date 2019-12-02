<?php
	require_once("db_config.php");
	$dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
	mysqli_select_db($dbc, DB_NAME);
	
	if (isset($_POST['key']))
	{
		$rowId = mysqli_real_escape_string($dbc, $_POST['rowId']);
		
		if ($_POST['key'] == "deleteRow")
		{
			$query = "DELETE FROM contact_speedtravel WHERE id='$rowId'";
			mysqli_query($dbc, $query);
			exit('The Row Has Been Deleted!');
		}
		
		if ($_POST['key'] == "editRow")
		{
			if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['msg']) && !empty($_POST['reply']))
			{
				$name = mysqli_real_escape_string($dbc, $_POST['name']);
				$email = mysqli_real_escape_string($dbc, $_POST['email']);
				$msg = mysqli_real_escape_string($dbc, $_POST['msg']);
				$reply = mysqli_real_escape_string($dbc, $_POST['reply']);
			
				$query = "UPDATE contact_speedtravel SET name = '$name', email = '$email', message = '$msg', reply = '$reply' WHERE id='$rowId'";
				mysqli_query($dbc, $query);
				exit('The Row Has Been Edited!');
			}
			else
			{
				exit('Please fill up all fields!');
			}
		}
		
		if ($_POST['key'] == "rowData")
		{
			$query = "SELECT * FROM contact_speedtravel WHERE id = '$rowId'";
			$r = mysqli_query($dbc, $query);
			$row = mysqli_fetch_array($r);
			$view = array(
				'id' => $row['id'],
				'reply' => $row['reply'],
				'name' => $row['name'],
				'email' => $row['email'],
				'msg' => $row['message'],
				'date' => $row['date']
			);

			exit(json_encode($view));
		}
	}
	
	$query = "SELECT * FROM contact_speedtravel";
	$r = mysqli_query($dbc, $query);
	
	while ($row = mysqli_fetch_array($r))
	{
		$id = $row['id'];
		$name = $row['name'];
		$reply = $row['reply'];
		$date = strftime("%Y-%m-%d&emsp;%H:%M:%S", strtotime($row['date']));
		$opt = '<button id = "view" class = "adminViewBtn">View</button><button id = "edit" class = "adminEditBtn">Edit</button><button id = "delete" class = "adminDeleteBtn">Delete</button>';
		$output[] = array ($id, $name, $reply, $date, $opt);
	}
	
	exit(json_encode($output));
	
	mysqli_close($dbc);
?>