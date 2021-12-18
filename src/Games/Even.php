<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\handleGameEngine;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function startGame(): void
{
    $gameDescription = GAME_DESCRIPTION;
    $evenOrOddNumber = function (): array {
        $number = rand(1, 100);
        $question = "$number";
        $correctAnswer = $number % 2 === 0 ? "yes" : "no";
        return [$question, $correctAnswer];
    };
    handleGameEngine($evenOrOddNumber, $gameDescription);
}
