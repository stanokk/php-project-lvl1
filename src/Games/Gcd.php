<?php

namespace Brain\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\playGame;

function getGcd(int $num1, int $num2): int
{
    while (true) {
        if ($num1 === $num2) {
            return $num2;
        } if ($num1 > $num2) {
            $num1 -= $num2;
        } else {
            $num2 -= $num1;
        }
    }
}

function setQuestion(int $number1, int $number2): string
{
    return "{$number1} {$number2}";
}

function getRule(): string
{
    return 'Find the greatest common divisor of given numbers';
}

function startGcdGame(): void
{
    $rule = getRule();
    $round = function (): array {
        $number1 = mt_rand(1, 20);
        $number2 = mt_rand(1, 20);
        $question = setQuestion($number1, $number2);
        $correctAnswer = getGcd($number1, $number2);
        $array = ['question' => $question, 'correctAnswer' => (string) $correctAnswer];
        return $array;
    };
    playGame($rule, $round);
}
