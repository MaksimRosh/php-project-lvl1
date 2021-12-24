<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\handleGame;

const GAME_DESCRIPTION = 'What number is missing in the progression?';

function getProgression(int $length, int $number, int $step): array
{
    $rowOfNumbers = [];
    for ($i = 0; count($rowOfNumbers) < $length; $i++) {
        $rowOfNumbers[] = $number + ($step * $i);
    }
    return $rowOfNumbers;
}

function startGame(): void
{
    $missingNumber = function (): array {
        $length = rand(5, 10);
        $number = rand(1, 50);
        $step = rand(2, 5);
        $position = rand(0, $length - 1);
        $randomProgression = getProgression($length, $number, $step);
        $correctAnswer = $randomProgression[$position];
        $randomProgression[$position] = "..";
        $question = implode(" ", $randomProgression);
        return [$question, $correctAnswer];
    };
    handleGame($missingNumber, GAME_DESCRIPTION);
}
