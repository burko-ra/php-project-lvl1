<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\runEngine;

use const BrainGames\Engine\ROUND_MAX;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isNumberPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }

    $half = $num / 2;
    for ($i = 2; $i <= $half; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}

function play(): void
{
    $randMin = 2;
    $randMax = 20;

    $gameData = [];
    for ($i = 0; $i < ROUND_MAX; $i++) {
        $num = rand($randMin, $randMax);

        $question = "$num";
        $correctAnswer = isNumberPrime($num) ? 'yes' : 'no';
        $gameData[] = [$question, $correctAnswer];
    }

    runEngine(DESCRIPTION, $gameData);
}
