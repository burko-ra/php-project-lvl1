<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Lib\generateNumber;
use function BrainGames\Lib\isEven;

line('Welcome to the Brain Game!');
$name = prompt('May I have your name?');
line("Hello, %s!", $name);
line('Answer "yes" if the number is even, otherwise answer "no".');

$score = 0;
$goal = 3;
$fault = false;

while (($score < $goal) && ($fault === false)) {
    $number = generateNumber();
    line("Question: $number");
    $userAnswer = prompt("Your answer");
    $correctAnswer = isEven($number);
    $result = (strtolower($userAnswer) === $correctAnswer);
    if ($result) {
        $score++;
        line("Correct!");
    } else {
        $fault = true;
        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
    }
}

if ($score === $goal) {
    line("Congratulations, %s!", $name);
} elseif ($fault === true) {
    line("Let's try again, %s!", $name);
} else {
    line("Something went wrong");
}
