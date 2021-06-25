<?php

  namespace Brain\Games\Even;

  use function cli\line;
  use function cli\prompt;
  use function Brain\Games\Engine\playGame;

function startEvenGame()
{
        $rule = 'Answer "yes" if the number is even, otherwise answer "no".';
        $congrats = "Congratulations, %s!";


    $round = function ($name) {
        for ($i = 0; $i <= 2; $i++) {
            $number = mt_rand(1, 100);
            line("Question: {$number}");
            $answer = prompt('Your answer');

            if ($number % 2 === 0) {
                $correctAnswer = 'yes';
            } elseif ($number % 2 !== 0) {
                $correctAnswer = 'no';
            }
            if ($answer !== $correctAnswer) {
                switch ($answer) {
                    case 'yes':
                        exit("'yes' is wrong answer ;(. Correct answer was 'no'\nLet's try again, {$name}\n");
                              break;
                    case 'no':
                        exit("'no' is wrong answer ;(. Correct answer was 'yes'\nLet's try again, {$name}\n");
                    break;
                    default:
                        exit("Let's try again, {$name}!\n");
                }
            } elseif ($answer === $correctAnswer) {
                line('Correct!');
            }
        }
    };
    playGame($rule, $round, $congrats);
}
