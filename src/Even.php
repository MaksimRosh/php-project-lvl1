<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\start;
use function Brain\Games\Engine\win;
use function Brain\Games\Engine\endGame;

function evenUneven(): int
{
    global $name;
    start('Answer "yes" if the number is even, otherwise answer "no".');
    $result = 0;
    while ($result < 3) {
        $number = rand(1, 100);
        $correctAnswer = $number % 2 === 0 ? "yes" : "no";
        line("Question: %d", $number);
        $userAnswer = prompt('Your answer: ');
        if ($userAnswer === $correctAnswer) {
            line('Correct!');
            $result++;
        } elseif ($userAnswer != $correctAnswer) {
            endGame($userAnswer, $correctAnswer, $name);
            break;
        }
    }
    win($result);
    return $result;
}
