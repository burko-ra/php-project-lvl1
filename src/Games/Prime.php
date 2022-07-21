<?php

namespace BrainGames\Prime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Lib\generateNumberBrainPrime;
use function BrainGames\Lib\commentTheAnswer;

line('Answer "yes" if given number is prime. Otherwise answer "no".');
while (($score < $goal) && ($fault === false)) {
    [$num, $correctAnswer] = generateNumberBrainPrime();
    line("Question: %s", $num);
    $userAnswer = prompt("Your answer");
    $result = (strtolower($userAnswer) === $correctAnswer);
    $result ? $score++ : $fault = true;
    commentTheAnswer($result, $userAnswer, $correctAnswer);
}
