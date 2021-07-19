<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function playGame(string $rule, string $question, string $correctAnswer, array $array): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($rule);
    foreach ($array as $question => $correctAnswer) {
        line($question);
        $answer = prompt('Your answer');
        if ($answer === (string) $correctAnswer) {
            line('Correct!');
        }
        if ($answer !== (string) $correctAnswer) {
                        line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.
Liet's try again, {$name}!");
                        break;
        }
    }
    if ($answer === (string) $correctAnswer) {
        line("Congratulations, %s!", $name);
    }
}
