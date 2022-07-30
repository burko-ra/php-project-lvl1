<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\play;

use const BrainGames\Engine\ROUND_MAX;

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

function playBrainProgression()
{
    $questionLine = 'What number is missing in the progression?';

    $gameData = [];
    for ($i = 0; $i < ROUND_MAX; $i++) {
        $progression = makeProgression();

        $missingElementNum = rand(0, count($progression) - 1);
        $missingElementValue = $progression[$missingElementNum];
        $progression[$missingElementNum] = '..';

        $question = implode(' ', $progression);
        $correctAnswer = "$missingElementValue";
        $gameData[] = [$question, $correctAnswer];
    }

    play($questionLine, $gameData);
}
