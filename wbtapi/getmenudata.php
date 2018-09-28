<?php
 header('Access-Control-Allow-Origin: http://localhost:4200');
 header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
 header('Content-type: application/json');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webuytek";
$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $db->prepare('SELECT products.id,products.category_id,products.route_product_id,route_products.id,route_products.route_product_name FROM products inner join route_products on route_products.id=products.route_product_id where category_id=1000 group by products.route_product_id');
$stmt->execute();
$result = $stmt->fetchAll();


$events = array();

foreach($result as $row) {
 array_push($events,$row);
}

header('Content-Type: application/json');
echo json_encode($events);

?>