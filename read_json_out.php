<?php

function getNewJson($filename = 'questions.json')
{
    $myFile = fopen($filename, 'w+');
    $txt = file_get_contents('https://opentdb.com/api.php?amount=15'); //paste here the link in, the API is open Trivia Database https://opentdb.com/api_config.php
    fwrite($myFile, $txt);
    fclose($myFile);
}

//Ließt die json data der API aus und speichert diese mit Berücksichtigung des richtigen datensatzes $fileContent
function getData(int $data_number, $file = 'questions.json')
{
    $fileContent = file_get_contents($file);
    $fileContent = json_decode($fileContent);

    //$data_number ist für die richtige Frage verantwortlich

    return $fileContent->results[$data_number];
}

//entnimmt die Frage
function getQuestion($data)
{
    return $data->question;
}

function getDifficulty($data)
{
    return $data->difficulty;
}

function getQuestionType($data)
{
    return $data->category;
}

//entnimmt richtige wie auch falsche Antwort und fügt diese zu einem Array zusammen bei welchem die Richtige Antwort immer hinten steht.
function getAnswers($data)
{
    $correctAnswer = $data->correct_answer;
    $correctAnswer = (array)$correctAnswer;

    $incorrectAnswers = $data->incorrect_answers;

    $completeAnswers = array_merge($incorrectAnswers, $correctAnswer);

    shuffle($completeAnswers);

    return $completeAnswers;
}

function countQuestions($file = 'questions.json')
{
    $fileContent = file_get_contents($file);
    $fileContent = json_decode($fileContent);

    $questionNumbers = count($fileContent->results);
    $questionNumbers = (int)$questionNumbers;
    return $questionNumbers;
}

function pointFieldLength($correct_answer_number)
{
    $correct_answer_number_size = strlen((string)$correct_answer_number);

    $correct_answer_number_size = (int)$correct_answer_number_size;

    return $correct_answer_number_size;
}

function countFieldLength($question_number)
{
    $question_number_size = strlen((string)$question_number);

    $question_number_size = (int)$question_number_size;

    return $question_number_size;
}

function lastQuestionRightAnswer($currentDataNumber, $file = 'questions.json')
{
    $LastDataNumber = $currentDataNumber - 1;

    $fileContent = file_get_contents($file);
    $fileContent = json_decode($fileContent);

    return "The correct answer of the last question was: " . $fileContent->results[$LastDataNumber]->correct_answer;
}