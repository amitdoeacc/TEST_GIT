<?php
 header('Access-Control-Allow-Origin: http://localhost:4200');
 header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
 header('Content-type: application/json');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webuytek";
$json = file_get_contents('php://input');
$params = json_decode($json);
$id=$params->id;
$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if($id){
$stmt = $db->prepare("select * from product_capacity where capacity_title like '$id%' group by capacity_title");
$stmt->execute();
$result = $stmt->fetchAll();
header('Content-Type: application/json');
echo json_encode($result);
	}
?>