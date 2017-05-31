<?php include('functions/get-poll.php'); ?>
<?php
$loadScss = true;
?>
<?php include('header.php'); ?>
        <main id="main">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2 class="no-margin"><?= $poll['name']; ?></h2>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Wyniki głosowania</h3>
                </div>
                <div class="panel-body">
                    <h4>Diagram słupkowy</h4>
                    <dl>
                    <?php
                    foreach($pdo->query($get_answers_sql) as $result) {
                        $sql = "SELECT * FROM `polls_answers` WHERE `poll_id`='".$_GET['id']."' AND `answer_id`='".$result['id']."'";
                        $s = $pdo->prepare($sql);
                        $s->execute();
                        $poll_results = $s->rowCount();
                        $part = $poll_results/$answers_c * 100;
                        $sql = "SELECT * FROM `answers` WHERE `id`='".$result['id']."'";
                        $result = $pdo->query($sql);
                        $answer = $result->fetch();

                        echo '<dd class="percentage percentage-'.$part.'">
                                <span class="text">'.$answer['name'].'</span></dd>';
                    }
                    ?>
                    </dl>
                    <h4>Diagram kołowy</h4>
                </div>
            </div>
        </main>
<?php include('footer.php'); ?>