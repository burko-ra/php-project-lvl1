<?php

namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Lib\generateExpression;
use function BrainGames\Lib\calculateExpression;
use function BrainGames\Lib\commentTheAnswer;

line('What is the result of the expression?');
while (($score < $goal) && ($fault === false)) {
    [$num1, $num2, $operation] = generateExpression();
    line("Question: %s %s %s", $num1, $operation, $num2);
    $userAnswer = prompt("Your answer");
    $correctAnswer = calculateExpression($num1, $num2, $operation);
    $result = (intval($userAnswer) === $correctAnswer);
    $result ? $score++ : $fault = true;
    commentTheAnswer($result, $userAnswer, $correctAnswer);
}
