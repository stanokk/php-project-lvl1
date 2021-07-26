<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function playGame(string $rule, callable $round): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($rule);
    for ($i = 1; $i <= 3; $i++) {
            $gameRound = $round();
            $question = $gameRound['question'];
            $correctAnswer = (string) $gameRound['correctAnswer'];
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
        if ($i === 3) {
            line("Congratulations, %s!", $name);
        }
    }
}
