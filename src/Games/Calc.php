<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\playGame;

function calcResult($someOperator, $firstNum, $secondNum): int
{
    switch ($someOperator) {
        case '+':
            $result = $firstNum + $secondNum;
            break;
        case '-':
            $result = $firstNum - $secondNum;
            break;
        case '*':
            $result = $firstNum * $secondNum;
            break;
    }
    return $result;
}

function startCalcGame(): void
{
    $rule = 'What is the result of the expression?';

    $round = function ($name): void {
        for ($i = 0; $i <= 2; $i++) {
            $num1 = mt_rand(1, 20);
            $num2 = mt_rand(1, 20);
            $operator = ['+', '-', '*'];
            $randomOperator = $operator[array_rand($operator)];
            line("Question: {$num1} {$randomOperator} {$num2}");
            $answer =  prompt('Your answer');
            $correctAnswer = calcResult($randomOperator, $num1, $num2);
            if ($answer === (string) $correctAnswer) {
                line('Correct!');
            }
            if ($answer !== (string) $correctAnswer) {
                switch ($randomOperator) {
                    case '+':
                        line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.
Let's try again, {$name}!i");
                        break;
                    case '-':
                        line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.
Let's try again, {$name}!");
                        break;
                    case '*':
                        line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.
Let's try again, {$name}!");
                        break;
                }
                break;
            }
        }
        if ($answer === (string) $correctAnswer) {
            line("Congratulations, %s!", $name);
        }
    };
    playGame($rule, $round);
}
