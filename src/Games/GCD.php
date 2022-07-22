<?php

namespace BrainGames\GCD;

function playBrainGCD(): array
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

    if (($num1 === 0) || ($num2 === 0)) {
        $result = null;
    }

    if ($num1 === $num2) {
        $result = $num1;
    }

    $a = max($num1, $num2);
    $b = min($num1, $num2);

    do {
        $x = $a % $b;
        if ($x === 0) {
            $result = $b;
        } else {
            $a = $b;
            $b = $x;
        }
    } while ($x !== 0);

    $question = "$num1 $num2";
    $correctAnswer = strval($result);
    return [$question, $correctAnswer];
}
