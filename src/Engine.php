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
    $firstAttempt = 1;
    $thirdAttempt = 3;
    for ($i = $firstAttempt; $i <= $thirdAttempt; $i++) {
        $gameRound = $round();
        $question = $gameRound['question'];
        $correctAnswer = $gameRound['correctAnswer'];
        line($question);
        $answer = prompt('Your answer');
        if ($answer === $correctAnswer) {
            line('Correct!');
        }
        if ($answer !== $correctAnswer) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, %s!", $name);
}
