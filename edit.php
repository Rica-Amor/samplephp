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

<div class="container">
	<div class="row  mt-5">
	<form align="center" style="margin: auto" name="form1" method="post" action="edit2.php">
		<table class="table text-center table-dark table-borderless table-responsive mt-5" border="0" >
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
	</div>
</div>

</body>
</html>	