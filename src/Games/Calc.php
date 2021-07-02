<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\playGame;

function startCalcGame(): void
{
    $rule = 'What is the result of the expression?';
    $congrats = "Congratulations, %s!";

    $round = function ($name): void {
        for ($i = 0; $i <= 2; $i++) {
            $correctAnswer = 0;
            $num1 = mt_rand(1, 20);
            $num2 = mt_rand(1, 20);
            $operator = ['+', '-', '*'];
            $randomOperator = $operator[array_rand($operator)];
            line("Question: {$num1} {$randomOperator} {$num2}");
            $answer =  prompt('Your answer');
            switch ($randomOperator) {
                case '+':
                    $correctAnswer = $num1 + $num2;
                    break;
                case '-':
                    $correctAnswer = $num1 - $num2;
                    break;
                case '*':
                    $correctAnswer = $num1 * $num2;
                    break;
            }
            if ($answer === (string) $correctAnswer) {
                line('Correct!');
            } elseif ($answer !== (string) $correctAnswer) {
                switch ($randomOperator) {
                    case '+':
                        exit("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.
Let's try again, {$name}!\n");
                    case '-':
                        exit("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.
Let's try again, {$name}!\n");
                    case '*':
                        exit("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.
Let's try again, {$name}!\n");
                }
            }
        }
    };
    playGame($rule, $round, $congrats);
}
