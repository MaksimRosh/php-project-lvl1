<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\handleGame;

const GAME_DESCRIPTION = 'What is the result of the expression?';

function startGame(): void
{
    $calculator = function (): array {
        $number1 = rand(1, 50);
        $number2 = rand(1, 50);
        $operation = rand(1, 3);
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
            default:
                throw new Exception('Undefined operation');
        }
        return [$question, $correctAnswer];
    };
    handleGame($calculator, GAME_DESCRIPTION);
}
