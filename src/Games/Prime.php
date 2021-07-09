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
                switch ($answer) {
                    case 'yes':
                        line("'yes' is wrong answer ;(. Correct answer was 'no'\nLet's try again, {$name}!\n");
                        break;
                    case 'no':
                        line("'no' is wrong answer ;(. Correct answer was 'yes'\nLet's try again, {$name}!\n");
                        break;
                }
                break;
            } elseif ($answer === $correctAnswer) {
                line('Correct!');
            }
        }
        if ($answer === $correctAnswer) {
            line("Congratulations, %s!", $name);
        }
    };
    playGame($rule, $round);
}
