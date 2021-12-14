<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\gameEngine;

function isPrime(int $number): bool
{
    $meaning = true;
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            $meaning = false;
        }
    }
    return $meaning;
}

function primeGame(): void
{
    $gameDescription = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $primeNumber = function (): array {
        $number = rand(2, 100);
        $prime = isPrime($number);
        if ($prime === false) {
            $prime = "no";
        } else {
            $prime = "yes";
        }
        $question = $number;
        $correctAnswer = $prime;
        return [$question, $correctAnswer];
    };
    gameEngine($primeNumber, $gameDescription);
}
