<?php
 header('Access-Control-Allow-Origin: http://localhost:4200');
 header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
 header('Content-type: application/json');
require_once '_db_mysql.php';

$stmt = $db->prepare('SELECT * FROM events WHERE NOT ((end <= :start) OR (start >= :end))');
$stmt->bindParam(':start', $_GET["from"]);
$stmt->bindParam(':end', $_GET["to"]);
$stmt->execute();
$result = $stmt->fetchAll();

class Event {}
$events = array();

foreach($result as $row) {
  $e = new Event();
  $e->id = $row['id'];
  $e->text = $row['name'];
  $e->start = $row['start'];
  $e->end = $row['end'];
  $e->resource = $row['resource_id'];
  $events[] = $e;
}

header('Content-Type: application/json');
echo json_encode($events);

?>
