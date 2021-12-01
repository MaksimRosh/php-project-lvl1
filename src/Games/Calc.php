<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\start;
use function Brain\Games\Engine\win;

function correctAnswer($number1, $number2, $operation): int
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
        $userAnswer = prompt('Your answer: ');
        if ($userAnswer == correctAnswer($number1, $number2, $operation)) {
            line("Correct!");
            $result++;
        } elseif ($userAnswer != correctAnswer($number1, $number2, $operation)) {
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'.",
                $userAnswer,
                correctAnswer($number1, $number2, $operation)
            );
            line("Let's try again, %s!", $name);
            break;
        }
    }
    win($result);
    return $result;
}