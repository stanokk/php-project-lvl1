<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\playGame;

function isEven(int $num): bool
{
    if ($num % 2 === 0) {
        return true;
    } else {
        return false;
    }
}

function setQuestion(int $number): string
{
    return (string) $number;
}

function getRule(): string
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function startEvenGame(): void
{
    $rule = getRule();
    $round = function (): array {
        $number = mt_rand(1, 100);
        $question = setQuestion($number);
        $correctAnswer = isEven($number) ? 'yes' : 'no';
        $array = ['question' => $question, 'correctAnswer' =>  $correctAnswer];
        return $array;
    };
    playGame($rule, $round);
}
