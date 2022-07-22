<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Even\playBrainEven;
use function BrainGames\Calc\playBrainCalc;
use function BrainGames\GCD\playBrainGCD;
use function BrainGames\Progression\playBrainProgression;
use function BrainGames\Prime\playBrainPrime;

line('Welcome to the Brain Games!');
$name = prompt('May I have your name?');
line("Hello, %s!", $name);

$score = 0;
$goal = 3;
$fault = false;
$game = basename($_SERVER["SCRIPT_NAME"], 'php');
line($game);
$questionLine['brain-even'] = 'Answer "yes" if the number is even, otherwise answer "no".';
$questionLine['brain-calc'] = 'What is the result of the expression?';
$questionLine['brain-gcd'] = 'Find the greatest common divisor of given numbers.';
$questionLine['brain-progression'] = 'What number is missing in the progression?';
$questionLine['brain-prime'] = 'Answer "yes" if given number is prime. Otherwise answer "no".';
$questionLine['brain-games'] = 'Answer "yes" if the number is even, otherwise answer "no".';

line($questionLine[$game]);

while (($score < $goal) && ($fault === false)) {
    switch ($game) {
        case 'brain-even':
            [$question, $correctAnswer] = playBrainEven();
            break;
        case 'brain-calc':
            [$question, $correctAnswer] = playBrainCalc();
            break;
        case 'brain-gcd':
            [$question, $correctAnswer] = playBrainGCD();
            break;
        case 'brain-progression':
            [$question, $correctAnswer] = playBrainProgression();
            break;
        case 'brain-prime':
            [$question, $correctAnswer] = playBrainPrime();
            break;
        case 'brain-games':
            [$question, $correctAnswer] = playBrainEven();
            break;
    }

    line("Question: %s", $question);
    $userAnswer = prompt("Your answer");
    $result = (strtolower($userAnswer) === $correctAnswer);
    $result ? $score++ : $fault = true;

    if ($result) {
        line("Correct!");
    } else {
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
