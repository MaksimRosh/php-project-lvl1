<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\gameEngine;

function evenGame(): void
{
    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';
    $evenOrOddNumber = function (): array {
        $number = rand(1, 100);
        $question = "$number";
        $correctAnswer = $number % 2 === 0 ? "yes" : "no";
        return [$question, $correctAnswer];
    };
    gameEngine($evenOrOddNumber, $gameDescription);
}
