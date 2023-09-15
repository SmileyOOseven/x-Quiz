<?php

require('read_json_out.php');

require('gameService.php');

if (isset($_POST['question_number'])) {
    $count = Counting((int)$_POST['question_number']);
} else {
    $count = 0;
    getNewJson();
}

$question_number = countQuestions();

if ($count + 1 > $question_number) {
    include('end_screen.phtml');
} else {

    $fileContent = getData($count - 1);

    $result = checkAnswer($fileContent);

    if (isset($_POST['points'])) {
        $points = saveScore((int)$_POST['points'], $result);
    } else {
        $points = 0;
    }

    $fileContent = getData($count);

    $question = getQuestion($fileContent);

    $answers = getAnswers($fileContent);

    $lengthPointField = pointFieldLength($points);

    $lengthCountField = countFieldLength($count);

    $questionForm = questionForm($count);

    $typeOfQuestion = getQuestionType($fileContent);

    $difficulty = getDifficulty($fileContent);

    $rank = getRank($points, $count);

    if ($count > 0) {
        $lastQuestionRightAnswer = lastQuestionRightAnswer($count);
    }

    include('view.phtml');
}

