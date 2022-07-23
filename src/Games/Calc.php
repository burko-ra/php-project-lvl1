<?php

namespace BrainGames\Calc;

function playBrainCalc(): array
{
    $randMin = 1;
    $randMax = 10;
    $num1 = rand($randMin, $randMax);
    $num2 = rand($randMin, $randMax);
    $listOperations = ['+', '-', '*'];
    $numOperation = rand(0, count($listOperations) - 1);
    $operation = $listOperations[$numOperation];

    
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
        default:
            $result = null;
            exit();
    }

    $question = "$num1 $operation $num2";
    $correctAnswer = strval($result);
    return [$question, $correctAnswer];
}
