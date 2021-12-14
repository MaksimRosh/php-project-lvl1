<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\gameEngine;

function getRandomProgression(): array
{
    $length = rand(5, 10);
    $number = rand(1, 50);
    $step = rand(2, 5);
    $rowOfNumbers = [];
    for ($i = 0; count($rowOfNumbers) < $length; $i++) {
        $rowOfNumbers[] = $number + ($step * $i);
    }
    return $rowOfNumbers;
}

function getRowAndAnswer(): array
{
    $rowOfNumbers = getRandomProgression();
    $position = rand(0, count($rowOfNumbers) - 1);
    $progressionArray = [];
    $progressionArray["answer"] = $rowOfNumbers[$position];
    $rowOfNumbers[$position] = "..";
    $progressionArray["row"] = $rowOfNumbers;
    return $progressionArray;
}

function progressionGame(): void
{
    $gameDescription = 'What number is missing in the progression?';
    $missingNumber = function (): array {
        $progression = getRowAndAnswer();
        $correctAnswer = $progression["answer"];
        $question = implode(" ", $progression["row"]);
        return [$question, $correctAnswer];
    };
    gameEngine($missingNumber, $gameDescription);
}
