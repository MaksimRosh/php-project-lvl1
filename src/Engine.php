<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function gameEngine(callable $conditionsGame, string $gameDescription): int
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($gameDescription);
    $result = 0;
    while ($result < 3) {
        [$question, $correctAnswer] = $conditionsGame();
        line("Question: %s", $question);
        $userAnswer = prompt("Your answer");
        if ($userAnswer !== (string)$correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return $result;
        } else {
            line("Correct!");
            $result++;
        }
    }
    line("Congratulations, %s!", $name);
    return $result;
}
