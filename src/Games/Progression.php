<?php

namespace Brain\Games\Progression;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\start;
use function Brain\Games\Engine\win;
use function Brain\Games\Engine\endGame;

function getRandomProgression(): array
{
    $length = rand(5, 10);//5
    $number = rand(1, 50);//7
    $step = rand(2, 5);//2
    $pos = rand(0, $length - 1);//1
    $row = [];//5,7,9,11,13
    for ($i = 0; count($row) < $length; $i++) {
        $row[] = $number + ($step * $i);
    }
    $progArr = [];
    $progArr["element"] = $row[$pos];
    $row[$pos] = "..";
    $progArr["row"] = $row;
    return $progArr;
}

function progression(): int
{
    global $name;
    start('What number is missing in the progression?');
    $result = 0;
    while ($result < 3) {
        $progression = getRandomProgression();
        $correctAnswer = $progression["element"];
        $question = implode(" ", $progression["row"]);
        line("Question: %s", $question);
        $userAnswer = prompt('Your answer: ');
        if ($userAnswer == $progression["element"]) {
            line("Correct!");
            $result++;
        } elseif ($userAnswer != $correctAnswer) {
            endGame($userAnswer, $correctAnswer, $name);
            break;
        }
    }
    win($result);
    return $result;
}
