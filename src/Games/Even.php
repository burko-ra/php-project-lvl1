<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\runEngine;

use const BrainGames\Engine\ROUND_MAX;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function play(): void
{
    $randMin = 1;
    $randMax = 20;

    $gameData = [];
    for ($i = 0; $i < ROUND_MAX; $i++) {
        $num = rand($randMin, $randMax);
        
        $question = (string) $num;
        $correctAnswer = ($num % 2 === 0 ? 'yes' : 'no');
        $gameData[] = [$question, $correctAnswer];
    }

    runEngine(DESCRIPTION, $gameData);
}
