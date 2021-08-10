<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\playGame;

function calcResult(string $someOperator, int $firstNum, int $secondNum): int
{
    switch ($someOperator) {
        case '+':
            return $firstNum + $secondNum;
        case '-':
            return $firstNum - $secondNum;
        case '*':
            return $firstNum * $secondNum;
        default:
            throw new \Exception("Oops! Invalid operator");
    }
}

function setQuestion(int $number1, int $number2, string $character): string
{
    return "Question: {$number1} {$character} {$number2}";
}

function getRule(): string
{
    return 'What is the result of the expression?';
}


function startCalcGame(): void
{
    $rule = getRule();
    $round = function (): array {
        $num1 = mt_rand(1, 20);
        $num2 = mt_rand(1, 20);
        $operator = ['+', '-', '*'];
        $randomOperator = $operator[array_rand($operator)];
        $question = setQuestion($num1, $num2, $randomOperator);
        $correctAnswer = calcResult($randomOperator, $num1, $num2);
        $array = ['question' => $question, 'correctAnswer' =>  (string) $correctAnswer];
        return $array;
    };
    playGame($rule, $round);
}
