<?DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<title>Add Script</title>
</head>
<body>
<?php
	include_once 'config.php';
?>

<?php
	if( isset($_POST ['Submit']))
	{
		$iso = mysqli_real_escape_string($mysqli, $_POST['iso']);
		$iso3 = mysqli_real_escape_string($mysqli, $_POST['iso3']);
		$nicename = mysqli_real_escape_string($mysqli, $_POST['nicename']);
		$numcode = mysqli_real_escape_string($mysqli, $_POST['numcode']);
		$phonecode = mysqli_real_escape_string($mysqli, $_POST['phonecode']);
		
		if( empty($iso) || empty($iso3) || empty($nicename) || empty($numcode) || empty($phonecode)){
			
			if(empty($iso)){
				echo "<font color='red'>ISO field is empty.</font><br/>";
			}
			
			if(empty($iso3)){
				echo "<font color='red'>ISO3 field is empty.</font><br/>";
			}
			
			if(empty($nicename)){
				echo "<font color='red'>Name field is empty.</font><br/>";
			}
			
			if(empty($numcode)){
				echo "<font color='red'>Numeric Code field is empty.</font><br/>";
			}
			
			if(empty($phonecode)){
				echo "<font color='red'>Phone Code field is empty.</font><br/>";
			}
			echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
			
		}else{
			$result = mysqli_query($mysqli, "INSERT INTO country(iso, iso3, nicename, numcode, phonecode) VALUES ('$iso', '$iso3', '$nicename', '$numcode', '$phonecode')");
			echo "<font color='green'>Data Added Successfully";
			echo "<br/><a href='index.php'>View Result</a>";
		}
	}
?>


</body>
</html>