<?php

  namespace Brain\Games\Progression;

  use function cli\line;
  use function cli\prompt;
  use function Brain\Games\Engine\playGame;

function startProgressionGame(): void
{
        $rule = 'What number is missing in the progression?';
        $congrats = "Congratulations, %s!";

    $round = function ($name): void {

        for ($i = 0; $i <= 2; $i++) {
            $firstNum = mt_rand(1, 20);
            $progressionStep = mt_rand(1, 10);
            $array = [];
            $array[0] = $firstNum;
            for ($j = 1; $j < 10; $j++) {
                    $array[$j] = $array[$j - 1] + $progressionStep;
            }
            $hiddenIndex = array_rand($array);
            $hiddenValue = $array[$hiddenIndex];
            $array[$hiddenIndex] = '..';
            $arrayAsString = implode(' ', $array);

            line("Question: {$arrayAsString}");
            $answer =  prompt('Your answer');
            if ($answer === (string) $hiddenValue) {
                line('Correct!');
            } else {
                        exit("'{$answer}' is wrong answer ;(. Correct answer was '{$hiddenValue}'.
Let's try again, {$name}!\n");
            }
        }
    };
    playGame($rule, $round, $congrats);
}
