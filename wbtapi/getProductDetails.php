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
$stmt = $db->prepare("SELECT product_capacity.id,product_capacity.product_id,product_capacity.capacity_title,product_capacity.product_type_network_condition,product_capacity.product_network_conditions,product_capacity.capacity_price,product_capacity.network_description,conditions.id, conditions.condition,conditions.message,network.id as network_id,network.nt_name,network.nt_image from product_capacity inner join conditions on product_capacity.product_network_conditions=conditions.id inner join network on product_capacity.product_network_conditions=network.id where product_capacity.product_id=$id");
$stmt->execute();
$result = $stmt->fetchAll();
header('Content-Type: application/json');
echo json_encode($result);
	}
?>