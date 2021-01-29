<?php
	include_once 'config.php';
	
	$result = mysqli_query($mysqli, "SELECT * FROM country");
?>

<?DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Homepage</title>
</head>
<body>
	<h1><?php echo "Countries";?></h1>
	<a href="add.html">Add New Data</a><br/><br/>
	
	<table>
		<tr bgcolor='#cccccc'>
			<td>ISO</td>
			<td>ISO3</td>
			<td>Name</td>
			<td>Numeric Code</td>
			<td>Phone Code</td>
			<td>Created</td>
			<td>Update</td>
		</tr>
		
		<?php

		while($res = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$res['iso']."</td>";
			echo "<td>".$res['iso3']."</td>";
			echo "<td>".$res['nicename']."</td>";
			echo "<td>".$res['numcode']."</td>";
			echo "<td>".$res['phonecode']."</td>";
			echo "<td>".$res['created_at']."</td>";
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete this record?')\">Delete</a></td>";
			echo "</tr>";
		}
		?>
		
	</table>
	
</body>
</html>