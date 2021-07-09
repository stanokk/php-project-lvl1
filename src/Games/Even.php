<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\playGame;

function isEven(int $num): string
{
    $result = '';
    if ($num % 2 === 0) {
        $result = 'yes';
    } elseif ($num % 2 !== 0) {
        $result = 'no';
    }
    return $result;
}

function startEvenGame(): void
{
    $rule = 'Answer "yes" if the number is even, otherwise answer "no".';


    $round = function ($name): void {
        for ($i = 0; $i <= 2; $i++) {
            $number = mt_rand(1, 100);
            line("Question: {$number}");
            $answer = prompt('Your answer');
            $correctAnswer = '';

            $correctAnswer = isEven($number);
            if ($answer !== $correctAnswer) {
                switch ($answer) {
                    case 'yes':
                        line("'yes' is wrong answer ;(. Correct answer was 'no'\nLet's try again, {$name}!\n");
                        break;
                    case 'no':
                        line("'no' is wrong answer ;(. Correct answer was 'yes'\nLet's try again, {$name}!\n");
                        break;
                    default:
                        line("Let's try again, {$name}!\n");
                        break;
                }
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
