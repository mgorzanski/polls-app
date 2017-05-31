var lastAnswer = 3;
var pollId;
var error = false;
var answerHasValue = 0;

function addNewAnswer() {
    lastAnswer = lastAnswer + 1;
    var newAnswer = '<div class="form-group" id="answer' + lastAnswer + '">' + 
                    '<label for="pollAnswer' + lastAnswer + '">Answer ' + lastAnswer + '</label>' +
                    '<input type="text" class="form-control answer" id="pollAnswer' + lastAnswer + '"' +
                    ' name="pollAnswer' + lastAnswer + '"' +
                    'placeholder="Answer ' + lastAnswer + '">' + 
                    '</div>';
    $("#answers").append(newAnswer);
}

function deleteLastAnswer() {
    var deleteAnswer = '#answer' + lastAnswer;
    if(lastAnswer > 2) {
        lastAnswer = lastAnswer - 1;
        $(deleteAnswer).remove();
    }
}

function processForm() {
    var pollName = document.getElementById('pollName').value;
    var answers = document.getElementsByClassName('answer');
    
    pollId = getPollId();
    if(pollName == "") {
        error = true;
        goToPage('new-poll.php?status=error', 'new-poll?status=error');
    }
    submitPoll(pollName, answers, pollId);
}

function submitPoll(pollName, answers, pollId) {
    for(var i = 0; i < answers.length; i++) {
        if(i == 0 && answers[i].value == "") {
            error = true;
            goToPage('new-poll.php?status=error', 'new-poll?status=error');
        } else if(i == 1 && answers[i].value == "") {
            error = true;
            goToPage('new-poll.php?status=error', 'new-poll?status=error');
        } else {
            postData('functions/add-answer.php', 'answerName=' + answers[i].value + '&pollId=' + pollId);
        }
    }

    if(error != true) {
        postData('functions/add-poll.php', 'pollName=' + pollName);
        goToPage('poll.php?id=' + pollId, 'poll/' + pollId);
    }
}

function postData(urlPath, data) {
    $.ajax({
        url: urlPath,
        type: "POST",
        data: data,
        success: function(data) {
            if(data == 'Error') {
                error = true;
                goToPage('new-poll.php?status=error', 'new-poll?status=error');
            }
        }
    });
}

function getPollId() {
    var result = "";
    $.ajax({
       url: "functions/get-poll-id.php",
        async: false,
        success: function(data) {
            result = data;
        }
    });
    return result;
}

if($('#createPoll').length) {
    var submitForm = document.getElementById('createPoll');
    submitForm.onclick = processForm;
}

var body = document.getElementById('body');
body.onchange = function() {
    if($('#createPoll').length) {
        var submitForm = document.getElementById('createPoll');
        submitForm.onclick = processForm;
    }
}