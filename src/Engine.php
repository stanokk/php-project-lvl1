<?php

  namespace Brain\Games\Engine;

  use function cli\line;
  use function cli\prompt;

function playGame($rule, $round, $congrats)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($rule);
    $round($name);
    line($congrats, $name);
}
