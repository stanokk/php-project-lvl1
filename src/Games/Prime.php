<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\playGame;

function isPrime(int $number): bool
{
    for ($j = 2; $j <= sqrt($number); $j++) {
        if ($number % $j == 0) {
            return true;
        }
    }
    return false;
}

function getRule(): string
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function setQuestion(int $num): string
{
    return "Question: {$num}";
}

function startPrimeGame(): void
{
    $rule = getRule();
    $round = function (): array {
        $number = mt_rand(2, 100);
        $question = setQuestion($number);
        $correctAnswer = isPrime($number) ? 'no' : 'yes';
        $array = ['question' => $question, 'correctAnswer' => $correctAnswer];
        return $array;
    };
    playGame($rule, $round);
}
