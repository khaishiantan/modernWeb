<?php
if(!empty($_POST["id"]) && !empty($_POST['hid']))
{
	
    // Include the database configuration file
    require_once("db_config.php");
	$dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
	mysqli_select_db($dbc, DB_NAME);
    
    // Count all records except already displayed
    $query = "SELECT COUNT(*) FROM review_speedtravel WHERE id < ".$_POST['id']." AND hid = ".$_POST['hid']." ORDER BY id DESC";
	$r = mysqli_query($dbc, $query);
    $totalRowCount = mysqli_fetch_array($r);
    $totalRowCount = $totalRowCount[0];
    
    $showLimit = 4;
    
    // Get records from the database
    $query = "SELECT * FROM review_speedtravel WHERE id < ".$_POST['id']." AND hid = ".$_POST['hid']." ORDER BY id DESC LIMIT $showLimit";

	if ($r = mysqli_query($dbc, $query))
	{
		if(mysqli_num_rows($r) > 0)
		{
			while($row = mysqli_fetch_array($r))
			{
				$p=1;
				$hotId = $row['id'];
				$UN = $row['UN'];
				$title = $row['title'];
				$review = $row['review'];
				$rate = $row['rate'];
				$lengthVisit = $row['lengthVisit'];
				$visitMonth = $row['visitMonth'];
				$date = strftime("%d %B %Y", strtotime($row['dateTime']));
    ?>
        <div class="container4">
					<div class="container3"> 
<div class="front3 side3">
		<div class="content3">
			<h2 style="color: #fff;"><?php echo $title; ?></h2>
			<p><?php echo $review; ?>
			</p>
			<p><?php echo $date; ?></p>
		</div>
	</div>
				
				<div class="back3 side3">
		<div class="content3">
			<h1 style="color: #fff;">by <?php echo $UN; ?></h1>
			<br><br>
				<h5 style="color: #fff;">Recommended length of visit: <?php echo $lengthVisit; ?><br><br>
					Visit on <?php echo $visitMonth; ?></h5>
					<br><br>
				  <h2 class="rate">
<?php
				for($i=0;$i<$rate;$i++)
				{
?>				
					<i class="icon-star"></i>
<?php
				}
			
					$left=5-$rate;
			
				for($b=0;$b<$left;$b++)
				{
?>
					<i class="icon-star-o"></i>
<?php
				}
?>			
				<span style="color: #fff;"><?php echo $rate; ?> Rating</span></h2>
  
    </div>
	</div>
			</div>	
			</div>
    <?php 
		}
	?>
    <?php 
		if($totalRowCount > $showLimit)
		{
	?>
        <div class="show_more_main" id="show_more_main<?php echo $hotId; ?>">
            <span id="<?php echo $hotId; ?>" class="show_more" title="Load more posts">Show more</span>
            <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
        </div>
    <?php
		}
	?>
<?php
		}
    }
}
?>