<?php

namespace Brain\Games\Progression;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\playGame;

function getRule(): string
{
    return 'What number is missing in the progression?';
}

function getProgression(int $num, int $step): array
{
    $arr = [];
    $arr[0] = $num;
    for ($j = 1; $j < 10; $j++) {
        $arr[$j] = $arr[$j - 1] + $step;
    }
    return $arr;
}

function setQuestion(string $str): string
{
    return "Question: {$str}";
}

function startProgressionGame(): void
{
    $rule = getRule();
    $round = function (): array {
            $firstNum = mt_rand(1, 20);
            $progressionStep = mt_rand(1, 10);
            $progression = getProgression($firstNum, $progressionStep);
            $hiddenIndex = array_rand($progression);
            $correctAnswer = $progression[$hiddenIndex];
            $progression[$hiddenIndex] = '..';
            $progressionAsString = implode(' ', $progression);
            $question = setQuestion($progressionAsString);
            $array = ['question' => $question, 'correctAnswer' =>  $correctAnswer];
            return $array;
    };
    playGame($rule, $round);
}
