<?php

namespace BrainGames\Lib;

use function cli\line;
use function cli\prompt;

function generateNumber(): int
{
    $randMin = 1;
    $randMax = 20;
    return rand($randMin, $randMax);
}

function isEven(int $number): string
{
    return $number % 2 === 0 ? 'yes' : 'no';
}

function generateExpression(): array
{
    $randMin = 1;
    $randMax = 10;
    $num1 = rand($randMin, $randMax);
    $num2 = rand($randMin, $randMax);
    $list = ['+', '-', '*'];
    $operation = rand(0, count($list)-1);
    return [$num1, $num2, $list[$operation]];
}

function calculateExpression($num1, $num2, $operation): string
{
    switch ($operation) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
    }
    return $result;
}

function commentTheAnswer($resultBool, $userAnswer, $correctAnswer)
{
    if ($resultBool) {
        line("Correct!");
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
    }
}
