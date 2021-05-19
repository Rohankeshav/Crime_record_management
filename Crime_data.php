<html>
 <title>Crime Data</title>   
 
<link rel="stylesheet" href="Crime_data.css">
<a href="retrieve_data.php"><h3>Back</h3></a>
<center><table class="content-table">
<tr>
<th>Crime ID</th>
<th>Crime Place</th>
<th>Crime Date</th>
<th>Crime Type</th>
<th>Crime Description</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "crimerecord");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM crime";
$result = $conn->query($sql);
if ($result -> num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	// echo $row;
echo "<tr><td><center>" . $row["crime_id"]. "</td><td><center>" . $row["crime_place"]  . "</td><td><center>" . $row["crime_date"]
. "</td><td><center>" . $row["crime_type"]  . "</td><td><center>" . $row["crime_desc"] ; 
}
echo "</table>";
} else { echo "Currently no members."; }
$conn->close();
?>
</table>

	</html>
