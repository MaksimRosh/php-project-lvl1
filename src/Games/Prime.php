<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\handleGameEngine;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $number): bool
{
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function startGame(): void
{
    $gameDescription = GAME_DESCRIPTION;
    $primeNumber = function (): array {
        $number = rand(2, 100);
        $prime = isPrime($number);
        $correctAnswer = $prime === false ? "no" : "yes";
        $question = $number;
        return [$question, $correctAnswer];
    };
    handleGameEngine($primeNumber, $gameDescription);
}
