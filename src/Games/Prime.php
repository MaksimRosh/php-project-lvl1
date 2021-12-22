<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\handleGame;

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
    $primeNumber = function (): array {
        $number = rand(2, 100);
        $prime = isPrime($number);
        $correctAnswer = $prime === false ? "no" : "yes";
        return [$number, $correctAnswer];
    };
    handleGame($primeNumber, GAME_DESCRIPTION);
}
