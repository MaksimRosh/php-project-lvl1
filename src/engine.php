<?php

namespace Brain\Games\engine;

use function cli\line;
use function cli\prompt;

function game(callable $game, string $conditionsGame): int
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($conditionsGame);
    $result = 0;
    while ($result < 3) {
        [$question, $correctAnswer] = $game();
        line("Question: %s", $question);
        $userAnswer = prompt("Your answer");
        if ($userAnswer != $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
            exit;
        } else {
            line("Correct!");
            $result++;
        }
    }
    line("Congratulations, %s!", $name);
    return $result;
}
