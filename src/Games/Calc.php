<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\play;

use const BrainGames\Engine\ROUND_MAX;

function makeExpression(): array
{
    $randMin = 1;
    $randMax = 10;
    $listOperations = ['+', '-', '*'];
    $num1 = rand($randMin, $randMax);
    $num2 = rand($randMin, $randMax);
    $numOperation = rand(0, count($listOperations) - 1);
    $operation = $listOperations[$numOperation];
    return [$num1, $num2, $operation];
}

function playBrainCalc()
{
    $questionLine = 'What is the result of the expression?';

    $gameData = [];
    for ($i = 0; $i < ROUND_MAX; $i++) {
        [$num1, $num2, $operation] = makeExpression();
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
                exit();
        }
        $question = "$num1 $operation $num2";
        $correctAnswer = strval($result);
        $gameData[] = [$question, $correctAnswer];
    }

    play($questionLine, $gameData);
}
