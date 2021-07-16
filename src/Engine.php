<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function playGame(string $rule, string $question, string $correctAnswer): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($rule);
    for ($i = 0; $i <= 2; $i++) {
        line($question);
        $answer = prompt('Your answer');
        if ($answer === $correctAnswer) {
                line('Correct!');
        }
        if ($answer !== $correctAnswer) {
                        line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.
Let's try again, {$name}!");
                        break;
        }
        if ($i === 2) {
                line("Congratulations, %s!", $name);
        }
    }
}
