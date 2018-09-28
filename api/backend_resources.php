<?php
 header('Access-Control-Allow-Origin: http://localhost:4200');
 header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
 header('Content-type: application/json');
require_once '_db_mysql.php';
    
$scheduler_groups = $db->query('SELECT * FROM groups ORDER BY name');

class Group {}
class Resource {}

$groups = array();

foreach($scheduler_groups as $group) {
  $g = new Group();
  $g->id = "group_".$group['id'];
  $g->name = $group['name'];
  $g->expanded = true;
  $g->children = array();
  $groups[] = $g;
  
  $stmt = $db->prepare('SELECT * FROM resources WHERE group_id = :group ORDER BY name');
  $stmt->bindParam(':group', $group['id']);
  $stmt->execute();
  $scheduler_resources = $stmt->fetchAll();  
  
  foreach($scheduler_resources as $resource) {
    $r = new Resource();
    $r->id = $resource['id'];
    $r->name = $resource['name'];
    $r->seats = $resource['seats'];
    $g->children[] = $r;
  }
}

header('Content-Type: application/json');
echo json_encode($groups);

?>
