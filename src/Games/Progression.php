<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\runEngine;

use const BrainGames\Engine\ROUND_MAX;

const DESCRIPTION = 'What number is missing in the progression?';

function makeProgression(): array
{
    $progression = [];

    $progressionLength = 10;
    $startMin = -10;
    $startMax = 10;
    $stepMin = 1;
    $stepMax = 5;

    $start = rand($startMin, $startMax);
    $step = rand($stepMin, $stepMax);

    for ($i = 0; $i < $progressionLength; $i++) {
        $progression[$i] = $start + $step * $i;
    }

    return $progression;
}

function play(): void
{
    $gameData = [];
    for ($i = 0; $i < ROUND_MAX; $i++) {
        $progression = makeProgression();

        $missingElementNum = rand(0, count($progression) - 1);
        $correctAnswer = (string) $progression[$missingElementNum];
        $progression[$missingElementNum] = '..';

        $question = implode(' ', $progression);
        $gameData[] = [$question, $correctAnswer];
    }

    runEngine(DESCRIPTION, $gameData);
}
