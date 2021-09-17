<?php

namespace Brain\Games\Progression;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\playGame;

function getRule(): string
{
    return 'What number is missing in the progression?';
}

function getProgression(int $num, int $length, int $step): array
{
    $arr = [];
    $arr[0] = $num;
    for ($j = 1; $j < $length; $j++) {
        $arr[$j] = $arr[$j - 1] + $step;
    }
    return $arr;
}

function getCondition(array $sequence, int $index): string
{
    $sequence[$index] = '..';
    $sequenceAsString = implode(' ', $sequence);
    return $sequenceAsString;
}

function setQuestion(string $str): string
{
    return $str;
}

function startProgressionGame(): void
{
    $rule = getRule();
    $round = function (): array {
        $firstNum = mt_rand(1, 20);
        $progressionLength = 10;
        $progressionStep = mt_rand(1, 10);
        $progression = getProgression($firstNum, $progressionLength, $progressionStep);
        $hiddenIndex = array_rand($progression);
        $correctAnswer = $progression[$hiddenIndex];
        $progressionAsString = getCondition($progression, (int) $hiddenIndex);
        $question = setQuestion($progressionAsString);
        $array = ['question' => $question, 'correctAnswer' =>  (string) $correctAnswer];
        return $array;
    };
    playGame($rule, $round);
}
