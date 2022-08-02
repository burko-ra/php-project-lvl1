<?php

namespace BrainGames\Games\GCD;

use function BrainGames\Engine\runEngine;

use const BrainGames\Engine\ROUND_MAX;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function findGCD(int $num1, int $num2): int
{
    if ($num1 < 1 || $num2 < 1) {
        throw new \Exception("Incorrect input data: '{$num1} {$num2}'");
    }

    $dividend = max($num1, $num2);
    $divisor = min($num1, $num2);

    do {
        $remainder = $dividend % $divisor;
        $dividend = $divisor;
        $divisor = $remainder;
    } while ($remainder !== 0);

    return $dividend;
}

function play(): void
{
    $randMin1 = 2;
    $randMax1 = 50;
    $randMin2 = 20;
    $randMax2 = 100;

    $gameData = [];
    for ($i = 0; $i < ROUND_MAX; $i++) {
        $num1 = rand($randMin1, $randMax1);
        $num2 = rand($randMin2, $randMax2);

        $question = "$num1 $num2";
        $correctAnswer = (string) findGCD($num1, $num2);
        $gameData[] = [$question, $correctAnswer];
    }

    runEngine(DESCRIPTION, $gameData);
}
