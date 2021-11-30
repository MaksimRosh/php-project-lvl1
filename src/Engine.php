<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function start($conditions)
{
    global $name;
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($conditions);
}

function win($result)
{
    global $name;
    if ($result === 3) {
        line("Congratulations, %s!", $name);
    }
}

function endGame($userAnswer, $correctAnswer, $name)
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
    line("Let's try again, %s!", $name);
}
