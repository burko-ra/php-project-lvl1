<?php

namespace BrainGames\GCD;

use function cli\line;
use function cli\prompt;
use function BrainGames\Lib\gcd;
use function BrainGames\Lib\calculateGCD;
use function BrainGames\Lib\commentTheAnswer;

line('Find the greatest common divisor of given numbers.');
while (($score < $goal) && ($fault === false)) {
    [$num1, $num2] = gcd();
    line("Question: %s %s", $num1, $num2);
    $userAnswer = prompt("Your answer");
    $correctAnswer = calculateGCD($num1, $num2);
    $result = (intval($userAnswer) === $correctAnswer);
    $result ? $score++ : $fault = true;
    commentTheAnswer($result, $userAnswer, $correctAnswer);
}
