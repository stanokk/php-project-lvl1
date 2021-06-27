<?php

  namespace Brain\Games\Gcd;

  use function cli\line;
  use function cli\prompt;
  use function Brain\Games\Engine\playGame;

function startGcdGame()
{
        $rule = 'Find the greatest common divisor of given numbers';
        $congrats = "Congratulations, %s!";
    function getGcd($num1, $num2)
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

    $round = function ($name) {
        for ($i = 0; $i <= 2; $i++) {
            $number_1 = mt_rand(1, 20);
            $number_2 = mt_rand(1, 20);
            line("Question: {$number_1} {$number_2}");
            $answer =  prompt('Your answer');
            $correctAnswer = getGcd($number_1, $number_2);

            if ($answer === (string) $correctAnswer) {
                line('Correct!');
            } else {
                exit("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.
Let's try again {$name}!\n");
            }
        }
    };
    playGame($rule, $round, $congrats);
}
