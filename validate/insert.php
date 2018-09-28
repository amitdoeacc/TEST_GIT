<?php
$data = json_decode(file_get_contents("php://input"));
include "db.php";
$add=$data->address->street;
$add1=$data->address->street2;
$zipCode=$data->address->zipCode;
$city=$data->address->city;
$state=$data->address->state;
$country=$data->address->country;

$sql = "INSERT INTO validateform (name, email,address,address2,zip,city,state,country)
VALUES ('$data->name', '$data->email','$add','$add1','$zipCode','$city','$state','$country')";
if($data->name){
	$qry = $conn->query($sql);
}
$conn->close();
?>
