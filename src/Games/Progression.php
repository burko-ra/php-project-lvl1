<?php

namespace BrainGames\Progression;

function playBrainProgression(): array
{
    $startMin = -10;
    $startMax = 10;
    $start = rand($startMin, $startMax);
    $stepMin = -3;
    $stepMax = 5;

    do {
        $step = rand($stepMin, $stepMax);
    } while ($step === 0);

    $length = 10;
    $progression = [];
    $progression[0] = $start;

    for ($i = 1; $i < $length; $i++) {
        $progression[$i] = $progression[$i - 1] + $step;
    }

    $missingElementNum = rand(0, $length - 1);
    $missingElementValue = $progression[$missingElementNum];
    $progression[$missingElementNum] = '..';
    $question = implode(' ', $progression);
    $correctAnswer = "$missingElementValue";
    return [$question, $correctAnswer];
}
