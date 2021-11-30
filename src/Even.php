<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function correctAnswer($number): string
{
    return ($number % 2 === 0 ? "yes" : "no");
}

function welcome()
{
    global $name;
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}

function evenUneven(): int
{
    global $name;
    welcome();
    $result = 0;
    line('Answer "yes" if the number is even, otherwise answer "no".');
    while ($result < 3) {
        $number = rand(1, 100);
        line("Question: %d", $number);
        $answer = prompt('Your answer: ');
        if ($answer === correctAnswer($number)) {
            line('Correct!');
            $result++;
        } elseif ($answer != correctAnswer($number)) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, correctAnswer($number));
            line("Let's try again, %s!", $name);
            break;
        }
    }
    if ($result === 3) {
        line("Congratulations, %s!", $name);
    }
    return $result;
}
