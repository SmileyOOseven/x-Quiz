<?php

function Counting(int $current_number)
{
    $current_number++;
    return $current_number;
}

function checkAnswer($data)
{
    $correct_answer = $data->correct_answer;

    if ($correct_answer == $_POST['AnswerCheckbox']) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function saveScore($save_score, $result)
{
    if ($result == true) {
        $save_score = $save_score + 1;
    }
    return $save_score;
}

function questionForm($number)
{
    if ($number == 1) {
        $correctSpeech = "question";
    } else {
        $correctSpeech = "questions";
    }
    return $correctSpeech;
}

function getRank($points, $quests)
{
    if ($quests == 0 && $points == 0) {
        $rank = "not yet assigned";
    } else {
        if ($points == 0) {
            $rank = "Günter Raucht";
        } else {
            if (is_null($rank)) {
                $rank = "Günter Raucht";
            }
            if ($quests / $points <= 6) {
                $rank = "Günter Taucht";
            }
            if ($quests / $points <= 3.14159265359) {
                $rank = "Günter Lauch";
            }
            if ($quests / $points <= 1.6) {
                $rank = "Günter Strauch";
            }
            if ($quests / $points <= 1.1) {
                $rank = "Günter Jauch";
            }
        }
    }
    return $rank;
}