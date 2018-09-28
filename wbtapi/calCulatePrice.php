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
$name=$params->name;
$pid=$params->pid;
$title=$params->title;
$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if($id){
$stmt = $db->prepare("select capacity_price from product_capacity where product_id=$pid and product_network_conditions=$id and product_type_network_condition='Networks'");
$stmt->execute();
$result = $stmt->fetch();
header('Content-Type: application/json');
echo json_encode($result);
	}
?>