<?php

  namespace Brain\Games\Even;

  use function cli\line;
  use function cli\prompt;

function checkAnswer()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
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
            }
        } elseif ($answer === $correctAnswer) {
                line('Correct!');
        }
    }
    line("Congratulations, %s!", $name);
}
