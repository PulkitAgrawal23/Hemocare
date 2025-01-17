<?php
$name = $_POST['fullname'];
$number = $_POST['mobileno'];
$email = $_POST['emailid'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$blood_group = $_POST['blood'];
$address = $_POST['address'];
$latitude = $_POST['latitude'];  
$longitude = $_POST['longitude']; 
$last_donation_date = $_POST['last_donation_date'];


$conn = mysqli_connect("localhost", "root", "", "blood_donation") or die("Connection error");

$sql = "INSERT INTO donor_details(donor_name, donor_number, donor_mail, donor_age, donor_gender, donor_blood, donor_address, donor_latitude, donor_longitude, last_donation_date) 
        VALUES('{$name}', '{$number}', '{$email}', '{$age}', '{$gender}', '{$blood_group}', '{$address}', '{$latitude}', '{$longitude}', '{$last_donation_date}')";

$result = mysqli_query($conn, $sql) or die("Query unsuccessful.");

header("Location: http://localhost/BDMS/home.php");

mysqli_close($conn);
?>
