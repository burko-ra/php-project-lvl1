<?php

namespace BrainGames\Games\GCD;

use function BrainGames\Engine\play;

use const BrainGames\Engine\ROUND_MAX;

function makeNumber(): int
{
    $randMin = 1;
    $randMax = 20;
    $num = rand($randMin, $randMax);
    return $num;
}

function findGCD(int $num1, int $num2): int
{
    if (($num1 < 1) || $num2 < 1) {
        throw new \Exception("Incorrect input data: '{$num1} {$num2}'");
    }

    $a = max($num1, $num2);
    $b = min($num1, $num2);

    $result = 0;
    do {
        $x = $a % $b;
        if ($x === 0) {
            $result = $b;
        } else {
            $a = $b;
            $b = $x;
        }
    } while ($x !== 0);

    return $result;
}

function playBrainGCD()
{
    $questionLine = 'Find the greatest common divisor of given numbers.';

    $gameData = [];
    for ($i = 0; $i < ROUND_MAX; $i++) {
        $num1 = makeNumber();
        $num2 = makeNumber();

        $a = max($num1, $num2);
        $b = min($num1, $num2);

        $question = "$num1 $num2";
        $correctAnswer = (string) findGCD($num1, $num2);
        $gameData[] = [$question, $correctAnswer];
    }

    play($questionLine, $gameData);
}
