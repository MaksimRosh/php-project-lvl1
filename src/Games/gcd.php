<?php

namespace src\Games\gcd;

use function Brain\Games\engine\game;

function getCorrectAnswer(int $number1, int $number2): int
{
    return ($number1 % $number2 != 0) ? getCorrectAnswer($number2, $number1 % $number2) : $number2;
}

function greatestCommonDivisor(): void
{
    $conditionsGame = 'Find the greatest common divisor of given numbers.';
    $greatestCommonDivisor = function (): array {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $correctAnswer = getCorrectAnswer($number1, $number2);
        $question = "$number1 $number2";
        return [$question, $correctAnswer];
    };
    game($greatestCommonDivisor, $conditionsGame);
}
