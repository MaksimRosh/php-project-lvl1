<?php

namespace src\Games\progression;

use function Brain\Games\engine\game;

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

function getCorrectAnswer(): array
{
    $rowOfNumbers = getRandomProgression();
    $position = rand(0, count($rowOfNumbers) - 1);
    $progressionArray = [];
    $progressionArray["element"] = $rowOfNumbers[$position];
    $rowOfNumbers[$position] = "..";
    $progressionArray["row"] = $rowOfNumbers;
    return $progressionArray;
}

function missingNumber(): void
{
    $conditionsGame = 'What number is missing in the progression?';
    $missingNumber = function (): array {
        $progression = getCorrectAnswer();
        $correctAnswer = $progression["element"];
        $question = implode(" ", $progression["row"]);
        return [$question, $correctAnswer];
    };
    game($missingNumber, $conditionsGame);
}
