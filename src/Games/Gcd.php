<?php

namespace Brain\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\start;
use function Brain\Games\Engine\win;
use function Brain\Games\Engine\endGame;

function greatestCommonDivisor(): int
{
    global $name;
    start('Find the greatest common divisor of given numbers.');
    $result = 0;
    while ($result < 3) {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $correctAnswer = gmp_gcd($number1, $number2);
        line("Question: %d  %d", $number1, $number2);
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
