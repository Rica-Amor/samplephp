<?DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<link rel="stylesheet" href="bootstrap.min.css">
	<title></title>
</head>
<body>

<?php
	include_once 'config.php';

	
	if( isset($_POST['update']))
	{
		$id = mysqli_real_escape_string($mysqli, $_POST['id']);
		$iso = mysqli_real_escape_string($mysqli, $_POST['iso']);
		$iso3 = mysqli_real_escape_string($mysqli, $_POST['iso3']);
		$nicename = mysqli_real_escape_string($mysqli, $_POST['nicename']);
		$numcode = mysqli_real_escape_string($mysqli, $_POST['numcode']);
		$phonecode = mysqli_real_escape_string($mysqli, $_POST['phonecode']);
		
		if( empty($iso) || empty($iso3) || empty($nicename) || empty($phonecode)){
			
			echo "<div class='row  justify-content-center'>";
			echo "<div class='col-md-3 border border-warning mt-5' style='background-color:#ffcccc'>";
			if(empty($iso)){
				echo "<br/><h6 align='center'><font color='red'>ISO field is empty.</font></h6>";
			}
			
			if(empty($iso3)){
				echo "<h6 align='center'><font color='red'>ISO3 field is empty.</font></h6>";
			}
			
			if(empty($nicename)){
				echo "<h6 align='center'><font color='red'>Name field is empty.</font></h6>";
			} 
			
			if(empty($phonecode)){
				echo "<h6 align='center'><font color='red'>Phone Code field is empty.</font></h6><br/>";
			}
			echo "<div style='text-align:center'><a href='javascript:self.history.back();'>Go Back</a></div><br/>";
			echo "</div>";
			echo "</div>";
		}else{
			$name=strtoupper($_POST['nicename']);
			$result = mysqli_query($mysqli, "UPDATE country SET iso='$iso', iso3='$iso3', name='$name', nicename='$nicename', numcode='$numcode', phonecode='$phonecode' WHERE id=$id");
			echo "<font color='green'>Data Updated Successfully";
			echo "<br/><a href='index.php'>View Result</a>";
		}
	}
?>

</body>
</html>		