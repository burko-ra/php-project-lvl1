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

function calculateExpression($num1, $num2, $operation): int
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

function gcd(): array
{
    $randMin = 1;
    $randMax = 6;
    $basePart = rand($randMin, $randMax);
    $simplePart = [1, 2, 3, 5, 7];
    $lenghtSimple = count($simplePart);
    $rand1 = rand(0, $lenghtSimple - 1);
    $rand2 = rand(0, $lenghtSimple - 1);
    $num1 = $basePart * $simplePart[$rand1];
    $num2 = $basePart * $simplePart[$rand2];
    return [$num1, $num2];
}

function calculateGCD($num1, $num2): int
{
    if (($num1 === 0) || ($num2 === 0)) {
        return null;
    }
    if ($num1 === $num2) {
        return $num1;
    }
    $a = max($num1, $num2);
    $b = min($num1, $num2);
    do {
        $x = $a % $b;
        if ($x === 0) {
            return $b;
        } else {
            $a = $b;
            $b = $x;
        }
    } while ($x !== 0);
}