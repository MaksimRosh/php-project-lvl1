<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\handleGameEngine;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function getGreatestCommonDivisor(int $number1, int $number2): int
{
    return ($number1 % $number2 !== 0) ? getGreatestCommonDivisor($number2, $number1 % $number2) : $number2;
}

function startGame(): void
{
    $gameDescription = GAME_DESCRIPTION;
    $greatestCommonDivisor = function (): array {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $correctAnswer = getGreatestCommonDivisor($number1, $number2);
        $question = "$number1 $number2";
        return [$question, $correctAnswer];
    };
    handleGameEngine($greatestCommonDivisor, $gameDescription);
}
