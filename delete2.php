<?php
if(isset($_POST['submit']) && empty($_POST['crime_id']) && empty($_POST['victim_id']) && empty($_POST['criminal_id'])){
    echo "<div class='display'> Invalid details, Try again!</div>";
}
if(isset($_POST["submit"]) &&(!empty($_POST['crime_id']) || !empty($_POST['victim_id']) || !empty($_POST['criminal_id']))){
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "crimerecord";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['crime_id'])&& empty($_POST['victim_id']) && empty($_POST['criminal_id'])){
$id=$_POST['crime_id'];
$sql = "DELETE FROM crime WHERE crime_id = $id";

if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
  
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
header("Location: Crime_data.php");
}

if(isset($_POST['victim_id']) && empty($_POST['crime_id']) && empty($_POST['criminal_id'])){
$vid=$_POST['victim_id'];
$sql1 = "DELETE FROM victim WHERE victim_id = $vid";

if (mysqli_query($conn, $sql1)) {
  echo "Record deleted successfully";
  
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
header("Location: Victim_data.php");
}
if(isset($_POST['criminal_id']) && empty($_POST['victim_id']) && empty($_POST['crime_id'])){
$cid=$_POST['criminal_id'];
$sql2 = "DELETE FROM criminal WHERE criminal_id = $cid";

if (mysqli_query($conn, $sql2)) {
  echo "Record deleted successfully";
  
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
header("Location: Criminal_data.php");
mysqli_close($conn);
    }
} 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="stylesheet" href="delete2.css">
</head>
<body>
<a href="navigation.php"><h3>Home</h3></a>
    <form action="delete2.php" method="post">
    <h1>Data Deletion</h1>
    <p>Enter the details of the table data to be deleted</p>
    <h2>Crime ID <input type="text" name="crime_id" class="crime_id" placeholder="Enter the ID"></h2><br>
    <h2>Victim ID <input type="text" name="victim_id" class="crime_id" placeholder="Enter the ID"></h2><br>
    <h2>Criminal ID<input type="text" name="criminal_id" class="crime_id" placeholder="Enter the ID"></h2><br>
    <input type="submit" name="submit" class="btn" value="Submit">
    </form>
</body>
</html>