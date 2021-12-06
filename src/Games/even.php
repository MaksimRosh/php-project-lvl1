<?php

namespace src\Games\even;

use function Brain\Games\engine\game;

function evenOrOddNumber(): void
{
    $conditionsGame = 'Answer "yes" if the number is even, otherwise answer "no".';
    $evenOrOddNumber = function (): array {
        $number = rand(1, 100);
        $question = "$number";
        $correctAnswer = $number % 2 === 0 ? "yes" : "no";
        return [$question, $correctAnswer];
    };
    game($evenOrOddNumber, $conditionsGame);
}
