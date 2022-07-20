<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Lib\generateNumber;
use function BrainGames\Lib\isEven;
use function BrainGames\Lib\commentTheAnswer;

line('Answer "yes" if the number is even, otherwise answer "no".');
while (($score < $goal) && ($fault === false)) {
    $number = generateNumber();
    line("Question: $number");
    $userAnswer = prompt("Your answer");
    $correctAnswer = isEven($number);
    $result = (strtolower($userAnswer) === $correctAnswer);
    $result ? $score++ : $fault = true;
    commentTheAnswer($result, $userAnswer, $correctAnswer);
}
