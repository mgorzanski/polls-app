<?php
include 'db.php';

$sql = "SELECT * FROM `polls` WHERE `id`='".$_GET['id']."'";
$result = $pdo->query($sql);
$poll = $result->fetch();

$sql = "SELECT * FROM `answers` WHERE `poll_id`='".$_GET['id']."'";
$result = $pdo->query($sql);
$answers = $result->fetch();
var_dump($answers);

$sql = "SELECT COUNT(*) FROM `answers` WHERE `poll_id`='".$_GET['id']."'";
$result = $pdo->query($sql);
$answers_c = $result->fetchColumn();
?>