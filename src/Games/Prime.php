<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\playGame;

function startPrimeGame(): void
{
    $rule = 'Answer "yes" if given number is prime. Otherwise answer "no".';


    $round = function ($name): void {
        for ($i = 0; $i <= 2; $i++) {
            $number = mt_rand(2, 100);
            line("Question: {$number}");
            $answer = prompt('Your answer');
            $correctAnswer = '';
            for ($j = 2; $j <= sqrt($number); $j++) {
                if ($number % $j == 0) {
                    $correctAnswer = 'no';
                    break;
                } else {
                    $correctAnswer = 'yes';
                }
            }
            if ($answer !== $correctAnswer) {
                line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.
Let's try again, {$name}!");
                break;
            } elseif ($answer === $correctAnswer) {
                line('Correct!');
            }
            if ($i === 2) {
                line("Congratulations, %s!", $name);
            }
        }
    };
    playGame($rule, $round);
}
