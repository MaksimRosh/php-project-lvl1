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

function getProgressionWithoutIndex(array $randomProgression): array
{
    $position = rand(0, count($randomProgression) - 1);
    $progressionArray = [];
    $progressionArray["answer"] = $randomProgression[$position];
    $randomProgression[$position] = "..";
    $progressionArray["row"] = $randomProgression;
    return $progressionArray;
}

function startGame(): void
{
    $missingNumber = function (): array {
        $length = rand(5, 10);
        $number = rand(1, 50);
        $step = rand(2, 5);
        $randomProgression = getProgression($length, $number, $step);
        $progression = getProgressionWithoutIndex($randomProgression);
        $correctAnswer = $progression["answer"];
        $question = implode(" ", $progression["row"]);
        return [$question, $correctAnswer];
    };
    handleGame($missingNumber, GAME_DESCRIPTION);
}
