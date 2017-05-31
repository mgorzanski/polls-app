<?php
include 'db.php';

$sql = "SELECT * FROM `polls` WHERE `id`='".$_GET['id']."'";
$result = $pdo->query($sql);
$poll = $result->fetch();

$get_answers_sql = "SELECT `id` FROM `answers` WHERE `poll_id`='".$_GET['id']."'";

$sql = "SELECT COUNT(*) FROM `polls_answers` WHERE `poll_id`='".$_GET['id']."'";
$result = $pdo->query($sql);
$answers_c = $result->fetchColumn();
?>