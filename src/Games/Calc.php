<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\gameEngine;

function calcGame(): void
{
    $gameDescription = 'What is the result of the expression?';
    $calculator = function (): array {
        $number1 = rand(1, 50);
        $number2 = rand(1, 50);
        $operation = rand(1, 3);
        $question = '';
        $correctAnswer = 0;
        switch ($operation) {
            case 1:
                $question = "$number1 + $number2";
                $correctAnswer = $number1 + $number2;
                break;
            case 2:
                $question = "$number1 - $number2";
                $correctAnswer = $number1 - $number2;
                break;
            case 3:
                $question = "$number1 * $number2";
                $correctAnswer = $number1 * $number2;
                break;
        }
        return [$question, $correctAnswer];
    };
    gameEngine($calculator, $gameDescription);
}
