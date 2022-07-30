<?php

namespace BrainGames\Games\GCD;

use function BrainGames\Engine\play;

use const BrainGames\Engine\ROUND_MAX;

function makeNumbers(): array
{
    $randMin = 1;
    $randMax = 6;
    $basePart = rand($randMin, $randMax);
    $simplePart = [1, 2, 3, 5, 7];
    $lengthSimple = count($simplePart);
    $rand1 = rand(0, $lengthSimple - 1);
    $rand2 = rand(0, $lengthSimple - 1);
    $num1 = $basePart * $simplePart[$rand1];
    $num2 = $basePart * $simplePart[$rand2];
    return [$num1, $num2];
}

function playBrainGCD()
{
    $questionLine = 'Find the greatest common divisor of given numbers.';

    $gameData = [];
    for ($i = 0; $i < ROUND_MAX; $i++) {
        [$num1, $num2] = makeNumbers();
        $a = max($num1, $num2);
        $b = min($num1, $num2);

        $correctAnswer = '';
        do {
            $x = $a % $b;
            if ($x === 0) {
                $correctAnswer = strval($b);
            } else {
                $a = $b;
                $b = $x;
            }
        } while ($x !== 0);

        $question = "$num1 $num2";
        $gameData[] = [$question, $correctAnswer];
    }

    play($questionLine, $gameData);
}
