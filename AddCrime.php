<?php
if((isset($_POST['Submit']) && empty($_POST['crime_id']) && empty($_POST['criminal_id']) && empty($_POST['p_id']) && empty($_POST['victim_id']))){
    echo "<div class='display'> Cannot submit an empty form, Try again!</div>";
}
if((isset($_POST['Submit']) && !empty($_POST['crime_id']) && !empty($_POST['criminal_id']) && !empty($_POST['p_id']) && !empty($_POST['victim_id']))){

$conn= mysqli_connect('localhost','root','','crimerecord');
$crime_id = $_POST['crime_id'];
$crime_place = $_POST['crime_place'];
$crime_date = $_POST['crime_date'];
$crime_type = $_POST['crime_type'];
$crime_desc = $_POST['crime_desc'];

$criminal_id = $_POST['criminal_id'];
$criminal_fname = $_POST['criminal_fname'];
$criminal_lname = $_POST['criminal_lname'];
$criminal_DOB = $_POST['criminal_DOB'];
$criminal_sex = $_POST['criminal_sex'];
$criminal_phno = $_POST['criminal_phno'];
$criminal_address = $_POST['criminal_address'];

$p_id = $_POST['p_id'];
$p_name = $_POST['p_name'];
$p_job = $_POST['p_job'];
$p_phno = $_POST['p_phno'];

$victim_id= $_POST['victim_id'];
$victim_name= $_POST['victim_name'];
$victim_gender= $_POST['victim_gender'];
$victim_phno= $_POST['victim_phno'];

$witness_name = $_POST['witness_name'];
$witness_phno = $_POST['witness_phno'];

$evidence_item=$_POST['evidence_item'];
$evidence_desc=$_POST['evidence_desc'];

$sql="INSERT INTO crime(crime_id,crime_place,crime_date,crime_type,crime_desc) VALUES ('$crime_id','$crime_place','$crime_date','$crime_type','$crime_desc')";
$query = mysqli_query($conn,$sql);

if($query){

    $sql2="INSERT INTO criminal(criminal_id,criminal_fname,criminal_lname,criminal_DOB,criminal_sex,criminal_phno,criminal_address) VALUES ('$criminal_id','$criminal_fname','$criminal_lname','$criminal_DOB','$criminal_sex','$criminal_phno','$criminal_address')";
    $result = mysqli_query($conn,$sql2);
    $sql3 = "INSERT INTO police(p_id,p_name,p_job,p_phno,crime_id) VALUES ('$p_id','$p_name','$p_job','$p_phno','$crime_id')";
    $result2 = mysqli_query($conn,$sql3);
    $sql4 = "INSERT INTO victim(victim_id,victim_name,victim_gender,victim_phno) VALUES ('$victim_id','$victim_name','$victim_gender','$victim_phno')";
    $result3 = mysqli_query($conn,$sql4);
    $sql5 ="INSERT INTO witness(witness_name,witness_phno,crime_id) VALUES ('$witness_name','$witness_phno','$crime_id')";
    $result4 = mysqli_query($conn,$sql5);
    $sql6 = "INSERT INTO evidence(evidence_item,evidence_desc,crime_id) VALUES ('$evidence_item','$evidence_desc','$crime_id')";
    $result5 = mysqli_query($conn,$sql6);
    
    if($sql2 && $sql3 && $sql4 && $sql5 && $sql6 == true)
    echo "<div class='display'> All the details have been submitted successfully!</div>";
}
else{
    echo "There was error adding the details to the database";
}

}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AppendCrime</title>
    <link rel="stylesheet" href="crime.css">
</head>
<body>
<a href="navigation.php"><h3>Home</h3></a>
    <h1>Enter the details of the new crime.</h1>
    
    <form action="AddCrime.php" method="post">
        
    <p>Crime</p>
    <input type="number" name="crime_id" id="crime_id" placeholder="Crime ID">
    <input type="text" name="crime_place" id="crime_place" placeholder="Crime location">
    <input type="date" name="crime_date" id="crime_date" placeholder="Date">
    <input type="text" name="crime_type" id="crime_type" placeholder="Type of Crime"><br>
    <textarea name="crime_desc" id="crime_desc" cols="30" rows="10" placeholder="Describe the Crime"></textarea>
    <p>Criminal</p>
   <input type="text" name="criminal_id" id="criminal_id" placeholder="Criminal ID">
   <input type="text" name="criminal_fname" id="criminal_fname" placeholder="Criminal first name">
   <input type="text" name="criminal_lname" id="criminal_lname" placeholder="Criminal Last name">
   <input type="date" name="criminal_DOB" id="criminal_DOB" placeholder="Criminal Date of Birth">
   <input type="text" name="criminal_sex" id="criminal_sex" placeholder="Criminal Gender">
   <input type="text" name="criminal_phno" id="criminal_phno" placeholder="Criminal Phone Number">
   <textarea name="criminal_address" id="criminal_address" cols="30" rows="10" placeholder="Criminal Address"></textarea>
   <p>Police Officer</p>
   <input type="text" name="p_id" id="p_id" placeholder="Police ID" >
   <input type="text" name="p_name" id="p_name" placeholder="Police Name">
   <input type="text" name="p_job" id="p_job" placeholder="Police Job Title" >
   <input type="text" name="p_phno" id="p_phno" placeholder="Police Phone Number" >
   <p>Victim</p>
   <input type="text" name="victim_id" id="victim_id" placeholder="Victim ID" >
   <input type="text" name="victim_name" id="victim_name" placeholder="Victim Name" >
   <input type="text" name="victim_gender" id="victim_gender" placeholder="Victim Gender" >
   <input type="text" name="victim_phno" id="victim_phno" placeholder="Victim Phone Number" >
   <p>Witness</p>
   <input type="text" name="witness_name" id="witness_name" placeholder="Witness Name">
   <input type="text" name="witness_phno" id="witness_phno" placeholder="Witness Phone Number">
   <p>Evidence</p>
   <input type="text" name="evidence_item" id="evidence_item" placeholder="Evidence Item">
   <textarea name="evidence_desc" id="evidence_desc" cols="30" rows="10" placeholder="Description of the Evidence"></textarea>
     
   
 <input type="submit" name="Submit" class="btn" value="Submit">
    </form>
</body>
</html>