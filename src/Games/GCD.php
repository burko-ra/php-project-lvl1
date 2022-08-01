<?php

namespace BrainGames\Games\GCD;

use function BrainGames\Engine\runEngine;

use const BrainGames\Engine\ROUND_MAX;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function findGCD(int $num1, int $num2): int
{
    if (($num1 < 1) || $num2 < 1) {
        throw new \Exception("Incorrect input data: '{$num1} {$num2}'");
    }

    $dividend = max($num1, $num2);
    $divisor = min($num1, $num2);

    $result = 0;
    do {
        $remainder = $dividend % $divisor;

        if ($remainder === 0) {
            $result = $divisor;
        } else {
            $dividend = $divisor;
            $divisor = $remainder;
        }
    } while ($remainder !== 0);

    return $result;
}

function play(): void
{
    $randMin = 1;
    $randMax = 20;

    $gameData = [];
    for ($i = 0; $i < ROUND_MAX; $i++) {
        $num1 = rand($randMin, $randMax);
        $num2 = rand($randMin, $randMax);

        $question = "$num1 $num2";
        $correctAnswer = (string) findGCD($num1, $num2);
        $gameData[] = [$question, $correctAnswer];
    }

    runEngine(DESCRIPTION, $gameData);
}
