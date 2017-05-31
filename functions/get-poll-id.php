<?php
include 'db.php';

$sql = "SELECT * FROM `polls` ORDER BY `id` DESC";
$result = $pdo->query($sql);
$poll = $result->fetch();

$id = $poll['id'] + 1;
echo $id;

?>