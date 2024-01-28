<!DOCTYPE html>
<html>
<head>
    <title>My Tasks - To DO</title>
    <link rel="stylesheet" href="style.css">
<style>
body{
    width: 100%;
    height: 100vh;
    margin:0;
    background-color: #297F87;
    color: #f5f6f7;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 20px;
}
table {
    border: 1px solid #1e1e60;
    width: 100%;
    color: #f5f6f7;
    font-family: monospace;
    font-size: 25px;
    text-align: left;
}
td{
    border: 1px solid #1e1e60;
}
th {
    border: 1px solid #1e1e60;
    color: white;
}

</style>
</head>
<body>
<div class="topnav">
            <a href="index.html">Home</a>
          </div>
    <center><h1>My Tasks</h1></center><br><br><br>
<table>
<tr>
<th>Task Name</th>
<th>Task description</th>
<th>Due Date</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "weboe");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT tname, tdes, dday FROM todo";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["tname"]. "</td><td>" . $row["tdes"] . "</td><td>"
. $row["dday"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>