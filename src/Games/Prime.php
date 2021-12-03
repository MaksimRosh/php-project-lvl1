<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\start;
use function Brain\Games\Engine\win;
use function Brain\Games\Engine\endGame;

function getPrime(): array
{
    $number = rand(2, 100);
    $Prime = "";
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i == 0) {
            $Prime = "no";
            break;
        } else {
            $Prime = "yes";
        }
    }
    return array("number" => $number, "answer" => $Prime);
}

function primeNumber(): int
{
    global $name;
    start('Answer "yes" if given number is prime. Otherwise answer "no".');
    $result = 0;
    while ($result < 3) {
        $number = getPrime();
        line("Question: %d", $number["number"]);
        $userAnswer = prompt('Your answer: ');
        $correctAnswer = $number["answer"];
        if ($userAnswer == $correctAnswer) {
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
