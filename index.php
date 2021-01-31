<?php
 session_start();

  if( !isset($_SESSION['email']) || empty($_SESSION['email'])){
    header('location: login.php');
    exit;
  }
	include_once 'config.php';

	$result = mysqli_query($mysqli, "SELECT * FROM country");
?>

<?DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="bootstrap.min.css">
	<title>Homepage</title>
</head>
<body>
<div class="container">
	
		<h1 class="text-center"><?php echo "Countries";?></h1><br/>
		<div style='text-align:right'><p><a href="logout.php" class="btn btn-danger">Logout</a></p></div>
	
	<p class="text-right"><a href="add.html">Add New Data</a></p>
	
	<div class="table-responsive-sm">
	<table class="table text-center table-striped table-sm">
		<thead class="thead-dark">
		<tr>
			<th>ISO</th>
			<th>ISO3</th>
			<th>Name</th>
			<th>Numeric Code</th>
			<th>Phone Code</th>
			<th>Created</th>
			<th>Update</th>
		</tr>
		</thead>
		
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
	</div>
</div>
	
</body>
</html>
