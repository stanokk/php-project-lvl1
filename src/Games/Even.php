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

function setQuestion(int $number): string
{
    return "Question: {$number}";
}

function getRule(): string
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function startEvenGame(): void
{
    $rule = getRule();
    $round = function (): array {
            $array = [];
            $number = mt_rand(1, 100);
            $question = setQuestion($number);
            $correctAnswer = isEven($number);
            $array[$question] = $correctAnswer;
            return $array;
    };
    playGame($rule, $round);
}
