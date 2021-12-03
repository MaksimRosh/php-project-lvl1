<?php

namespace Brain\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\start;
use function Brain\Games\Engine\win;
use function Brain\Games\Engine\endGame;

function correctAnswer(int $number1, int $number2): int
{
    return ($number1 % $number2 != 0) ? correctAnswer($number2, $number1 % $number2) : $number2;
}

function greatestCommonDivisor(): int
{
    global $name;
    start('Find the greatest common divisor of given numbers.');
    $result = 0;
    while ($result < 3) {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $correctAnswer = correctAnswer($number1, $number2);
        line("Question: $number1 $number2");
        $userAnswer = prompt('Your answer: ');
        if ($userAnswer == $correctAnswer) {
            line('Correct!');
            $result++;
        } elseif ($userAnswer != $correctAnswer) {
            endGame($userAnswer, $correctAnswer, $name);
            break;
        }
    }
    win($result);
    return $result;
}
