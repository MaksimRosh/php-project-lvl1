<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\start;
use function Brain\Games\Engine\win;
use function Brain\Games\Engine\endGame;

function correctAnswer($number): string
{
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            return 'no';
        }
    }
    return 'yes';
}

function primeNumber(): int
{
    global $name;
    start('Answer "yes" if given number is prime. Otherwise answer "no".');
    $result = 0;
    while ($result < 3) {
    $number = rand(2,100);
    line("Question: %d", $number);
    $userAnswer = prompt('Your answer: ');
    correctAnswer($number);
        if ($userAnswer == correctAnswer($number)) {
            line("Correct!");
            $result++;
        } elseif ($userAnswer != correctAnswer($number)) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, correctAnswer($number));
            line("Let's try again, %s!", $name);
            break;
        }
    }
    win($result);
    return $result;
}

