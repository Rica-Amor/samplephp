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
			$result = mysqli_query($mysqli, "UPDATE country SET iso='$iso', iso3='$iso3', nicename='$nicename', numcode='$numcode', phonecode='$phonecode' WHERE id=$id");
			header("Location: edit.html");
		}
	}
?>

<?DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<title>Homepage</title>
</head>
<body>

<?php
	$id = $_GET['id'];
	
	$result = mysqli_query($mysqli,"SELECT * from country where id=$id");

	
	while($res = mysqli_fetch_array($result))
	{
		$iso = $res['iso'];
		$iso3 = $res['iso3'];
		$nicename = $res['nicename'];
		$numcode = $res['numcode'];
		$phonecode = $res['phonecode'];
	}
?>

	<form name="form1" method="post" action="edit.php">
		<table>
			<tr>
				<td>ISO</td>
				<td><input type="text" name="iso" value="<?php echo $iso;?>"></td>
			</tr>
			<tr>
				<td>ISO3</td>
				<td><input type="text" name="iso3" value="<?php echo $iso3;?>"></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="nicename" value="<?php echo $nicename;?>"></td>
			</tr>
			<tr>
				<td>Numeric Code</td>
				<td><input type="number" name="numcode" value="<?php echo $numcode;?>"></td>
			</tr>
			<tr>
				<td>Phone Code</td>
				<td><input type="number" name="phonecode" value="<?php echo $phonecode;?>"></td>
			</tr>
				<td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>


</body>
</html>			
