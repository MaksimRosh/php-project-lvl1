<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\start;
use function Brain\Games\Engine\win;
use function Brain\Games\Engine\endGame;

function correctAnswer(int $number1, int $number2, int $operation): int
{
    $correctAnswer = 0;
    switch ($operation) {
        case 1:
            $correctAnswer = $number1 + $number2;
            break;
        case 2:
            $correctAnswer = $number1 - $number2;
            break;
        case 3:
            $correctAnswer = $number1 * $number2;
            break;
    }
    return $correctAnswer;
}

function calculator(): int
{
    global $name;
    $result = 0;
    start('What is the result of the expression?');
    while ($result < 3) {
        $number1 = rand(1, 50);
        $number2 = rand(1, 50);
        $operation = rand(1, 3);
        switch ($operation) {
            case 1:
                line("Question: %d + %d", $number1, $number2);
                break;
            case 2:
                line("Question: %d - %d", $number1, $number2);
                break;
            case 3:
                line("Question: %d * %d", $number1, $number2);
                break;
        }
        $correctAnswer = correctAnswer($number1, $number2, $operation);
        $userAnswer = prompt('Your answer: ');
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
