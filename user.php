<?php
	require_once("db_config.php");
	$dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
	mysqli_select_db($dbc, DB_NAME);
	
	if (isset($_POST['key']))
	{
		$rowUN = mysqli_real_escape_string($dbc, $_POST['rowUn']);
		
		if ($_POST['key'] == "deleteRow")
		{
			$query = "DELETE FROM signup_speedtravel WHERE UN='$rowUN'";
			mysqli_query($dbc, $query);
			exit('The Row Has Been Deleted!');
		}
		
		if ($_POST['key'] == "editRow")
		{
			if (!empty($_POST['fn']) && !empty($_POST['ln']) && !empty($_POST['em']) && !empty($_POST['pw']))
			{
				$fn = mysqli_real_escape_string($dbc, $_POST['fn']);
				$ln = mysqli_real_escape_string($dbc, $_POST['ln']);
				$em = mysqli_real_escape_string($dbc, $_POST['em']);
				$pw = mysqli_real_escape_string($dbc, $_POST['pw']);
			
				$query = "UPDATE signup_speedtravel SET FN = '$fn', LN = '$ln', EM = '$em', PW = '$pw' WHERE UN='$rowUN'";
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
			$query = "SELECT * FROM signup_speedtravel WHERE UN = '$rowUN'";
			$r = mysqli_query($dbc, $query);
			$row = mysqli_fetch_array($r);
			$view = array(
				'un' => $row['UN'],
				'fn' => $row['FN'],
				'ln' => $row['LN'],
				'em' => $row['EM'],
				'pw' => $row['PW'],
			);

			exit(json_encode($view));
		}
	}
	
	$query = "SELECT * FROM signup_speedtravel";
	$r = mysqli_query($dbc, $query);
	
	while ($row = mysqli_fetch_array($r))
	{
		$un = $row['UN'];
		$opt = '<button id = "view" class = "adminViewBtn">View</button><button id = "edit" class = "adminEditBtn">Edit</button><button id = "delete" class = "adminDeleteBtn">Delete</button>';
		$output[] = array ($un, $opt);
	}
	
	exit(json_encode($output));
	
	mysqli_close($dbc);
?>