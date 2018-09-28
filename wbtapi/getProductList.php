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
$stmt = $db->prepare("SELECT route_products.route_product_name,products.id ,products.route_product_id,product_capacity.product_id,product_capacity.p_capacity,product_capacity.id,product_capacity.product_type_network_condition,product_capacity.capacity_title,product_capacity.capacity_price from route_products left join products on products.route_product_id=route_products.id inner join product_capacity on product_capacity.product_id=products.id where route_product_id=$id group by product_capacity.capacity_title");
$stmt->execute();
$result = $stmt->fetchAll();
header('Content-Type: application/json');
echo json_encode($result);

?>