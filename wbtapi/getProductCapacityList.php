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
$stmt = $db->prepare('SELECT * from product_capacity group by capacity_title  order by id asc limit 20');
$stmt->execute();
$result = $stmt->fetchAll();


$events = array();

foreach($result as $row) {
 array_push($events,$row);
}

header('Content-Type: application/json');
echo json_encode($events);

?>