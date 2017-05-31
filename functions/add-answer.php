<?php
include 'db.php';

if(isset($_POST['answerName']) && $_POST['answerName'] != null && $_POST['pollId'] != null) {
    $sql = "INSERT INTO `answers` SET `poll_id`='".$_POST['pollId']."', `name`='".$_POST['answerName']."'";
    $s = $pdo->prepare($sql);
    $s->execute();
}
?>