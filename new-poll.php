<?php include('header.php'); ?>
        <main id="main">
            <?php if(!empty($_GET['status']) && $_GET['status'] == 'error'): ?>
            <div class="alert alert-danger" role="alert">
            The poll wasn't created.
            </div>
            <?php endif; ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Create new poll</h3>
                </div>
                <div class="panel-body">
                    <form>
                        <div class="form-group">
                            <label for="pollName">Poll name</label>
                            <input type="text" class="form-control" id="pollName" placeholder="Poll name">
                        </div>
                        <br><br>
                        <div id="answers">
                            <div class="form-group" id="answer1">
                                <label for="pollAnswer1">Answer 1</label>
                                <input type="text" class="form-control answer" id="pollAnswer1" name="pollAnswer1" placeholder="Answer 1">
                            </div>
                            <div class="form-group" id="answer2">
                                <label for="pollAnswer2">Answer 2</label>
                                <input type="text" class="form-control answer" id="pollAnswer2" name="pollAnswer3" placeholder="Answer 2">
                            </div>
                            <div class="form-group" id="answer3">
                                <label for="pollAnswer3">Answer 3</label>
                                <input type="text" class="form-control answer" id="pollAnswer3" name="pollAnswer3" placeholder="Answer 3">
                            </div>
                        </div>
                        <div class="form-group">
                            <a onclick="addNewAnswer();" class="btn btn-success">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </a>
                            <a onclick="deleteLastAnswer();" class="btn btn-danger">
                                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                            </a>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <button type="button" class="btn btn-success" id="createPoll">Create poll</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
<?php include('footer.php'); ?>