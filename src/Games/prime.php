<?php

namespace src\Games\prime;

use function Brain\Games\engine\game;

function isPrime(int $number): void
{
    $meaning = true;
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            $meaning = false;
            break;
        }
    }
}

function getCorrectAnswer(): array
{
    $number = rand(2, 100);
    $prime = "";
    if (isPrime($number) == false) {
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
