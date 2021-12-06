<?php

namespace src\Games\calc;

use function Brain\Games\engine\game;

function getCorrectAnswer(int $number1, int $number2, int $operation): int
{
    $correctAnswer = 0;
    switch ($operation) {
        case 1:
            $correctAnswer = $number1 + $number2;
            break;
        case 2:
            $correctAnswer = $number1 - $number2;
            break;
        case 3:
            $correctAnswer = $number1 * $number2;
            break;
    }
    return $correctAnswer;
}

function calculator(): void
{
    $conditionsGame = 'What is the result of the expression?';
    $calculator = function (): array {
        $number1 = rand(1, 50);
        $number2 = rand(1, 50);
        $operation = rand(1, 3);
        $question = '';
        switch ($operation) {
            case 1:
                $question = "$number1 + $number2";
                break;
            case 2:
                $question = "$number1 - $number2";
                break;
            case 3:
                $question = "$number1 * $number2";
                break;
        }
        $correctAnswer = getCorrectAnswer($number1, $number2, $operation);
        return [$question, $correctAnswer];
    };
        game($calculator, $conditionsGame);
}
