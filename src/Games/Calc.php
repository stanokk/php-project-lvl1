<?php

  namespace Brain\Games\Calc;

  use function cli\line;
  use function cli\prompt;
  use function Brain\Games\Engine\playGame;

function startCalcGame()
{
        $rule = 'What is the result of the expression?';
        $congrats = "Congratulations, %s!";

    $round = function ($name) {
        for ($i = 0; $i <= 2; $i++) {
            $correctAnswer = 0;
            $number_1 = mt_rand(1, 20);
            $number_2 = mt_rand(1, 20);
            $operator = ['+', '-', '*'];
            $randomOperator = $operator[array_rand($operator)];
            line("Question: {$number_1} {$randomOperator} {$number_2}");
            $answer =  prompt('Your answer');
            switch ($randomOperator) {
                case '+':
                    $correctAnswer = $number_1 + $number_2;
                    break;
                case '-':
                    $correctAnswer = $number_1 - $number_2;
                    break;
                case '*':
                    $correctAnswer = $number_1 * $number_2;
                    break;
            }
            if ($answer === (string) $correctAnswer) {
                line('Correct!');
            } elseif ($answer !== $correctAnswer) {
                switch ($randomOperator) {
                    case '+':
                        exit("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.
Let's try again {$name}\n");
                        break;
                    case '-':
                        exit("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.
Let's try again {$name}\n");
                        break;
                    case '*':
                        exit("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.
Let's try again {$name}\n");
                        break;
                }
            }
        }
    };
    playGame($rule, $round, $congrats);
}
