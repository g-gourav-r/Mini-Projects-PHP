<!DOCTYPE html>
<html>

<head>
	<title>TO DO List</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="topnav">
			<a href="index.html">Home</a>
			<a href="task.php">My Tasks</a>
          </div>
	<center>
		<?php
		$conn = mysqli_connect("localhost", "root", "", "weboe");
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}

		$tn = $_REQUEST['tname'];
		$td = $_REQUEST['tdes'];
		$dd = $_REQUEST['dday'];
	
		$sql = "INSERT INTO todo VALUES ('$tn' ,'$td', '$dd')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>Task has been added<br> You can find the added task in My Tasks</h3>";
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		mysqli_close($conn);
		?>
	</center>
</body>

</html>

