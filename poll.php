<?php include('functions/get-poll.php'); ?>
<?php
$loadScss = true;
?>
<?php include('header.php'); ?>
        <main id="main">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= $poll['name']; ?></h3>
                </div>
                <div class="panel-body">
                    <dl>
                    <?php
                    foreach($answers as $answer) {
                        $sql = "SELECT * FROM `polls_answers` WHERE `poll_id`='".$_GET['id']."' AND `answer_id`='".$answer."'";
                        $s = $pdo->prepare($sql);
                        $s->execute();
                        $poll_results = $s->rowCount();
                        //$part = $answers_c/$poll_results * 100;
                        echo $poll_results.'<br>';
                    }
                    ?>
                    </dl>
                </div>
            </div>
        </main>
<?php include('footer.php'); ?>