<html>
<title>Criminal Data</title>   

<link rel="stylesheet" href="Crime_data.css">
<a href="retrieve_data.php"><h3>Back</h3></a>
<center><table class="content-table">
<tr>
<th>Criminal ID</th>
<th>Criminal First Name</th>
<th>Criminal Last Name</th>
<th>Criminal Gender</th>
<th>Criminal DOB</th>
<th>Criminal Phone Number</th>
<th>Criminal Address</th>

</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "crimerecord");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM criminal";
$result = $conn->query($sql);
if ($result -> num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	// echo $row;
echo "<tr><td><center>" . $row["criminal_id"]. "</td><td><center>" . $row["criminal_fname"]  . "</td><td><center>" . $row["criminal_lname"]
. "</td><td><center>" . $row["criminal_sex"]  . "</td><td><center>" . $row["criminal_DOB"] . "</td><td><center>" . $row["criminal_phno"] . "</td><td><center>" . $row["criminal_address"] ; 
}
echo "</table>";
} else { echo "Currently no members."; }
$conn->close();
?>
</table>

	</html>
