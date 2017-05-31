<?php
include 'db.php';

if(isset($_POST['pollName']) && $_POST['pollName'] != null) {
    $sql = "INSERT INTO `polls` SET `name`='".$_POST['pollName']."'";
    $s = $pdo->prepare($sql);
    $s->execute();

    $lastPollId = $pdo->lastInsertId();
    echo $lastInsertId;
} else {
	echo 'Error';
}
?>