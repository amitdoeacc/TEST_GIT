<?php
 header('Access-Control-Allow-Origin: http://localhost:4200');
 header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
 header('Content-type: application/json');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webuytek";

$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $db->prepare("SELECT * from sub_category");
$stmt->execute();
$result = $stmt->fetchAll();
header('Content-Type: application/json');
echo json_encode($result);

?>