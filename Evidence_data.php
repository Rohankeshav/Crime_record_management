<html>
<title>Evidence Data</title>   

<link rel="stylesheet" href="Crime_data.css">
<a href="retrieve_data.php"><h3>Back</h3></a>
<center><table class="content-table">
<tr>

<th>Evidence Item</th>
<th>Evidence Description</th>
<th>Crime ID</th>

</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "crimerecord");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM evidence";
$result = $conn->query($sql);
if ($result -> num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	// echo $row;
echo "<tr><td><center>" . $row["evidence_item"]. "</td><td><center>" . $row["evidence_desc"]  . "</td><td><center>" . $row["crime_id"] ; 
}
echo "</table>";
} else { echo "Currently no members."; }
$conn->close();
?>
</table>

	</html>
