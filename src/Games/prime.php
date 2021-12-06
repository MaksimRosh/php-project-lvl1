<?php

namespace src\Games\prime;

use function Brain\Games\engine\game;

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

function getCorrectAnswer(): array
{
    $number = rand(2, 100);
    $prime = isPrime($number);
    if ($prime == false) {
            $prime = "no";
    } else {
            $prime = "yes";
    }
    return ["number" => $number, "answer" => $prime];
}

function primeNumber(): void
{
    $conditionsGame = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $primeNumber = function (): array {
        $numberAndAnswer = getCorrectAnswer();
        $question = $numberAndAnswer["number"];
        $correctAnswer = $numberAndAnswer["answer"];
        return [$question, $correctAnswer];
    };
    game($primeNumber, $conditionsGame);
}
