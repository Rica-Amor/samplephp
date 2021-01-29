<?php
	
	$id = $_GET['id'];
	
	include("config.php");
	$result = mysqli_query($mysqli, "DELETE FROM country WHERE id=$id");
	echo "<font color='green'>Data Deleted Successfully";
	echo "<br/><a href='index.php'>View Result</a>";
?>
