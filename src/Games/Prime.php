<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\play;

use const BrainGames\Engine\ROUND_MAX;

function playBrainPrime()
{
    $questionLine = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $primeList50 = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47];
    $randMin = 2;
    $randMax = 20;

    $gameData = [];
    for ($i = 0; $i < ROUND_MAX; $i++) {
        $isPrimeFlag = rand(0, 1);
        $isPrimeFlagBool = ($isPrimeFlag === 1);

        do {
            $num = rand($randMin, $randMax);
        } while (in_array($num, $primeList50, true) !== $isPrimeFlagBool);

        $question = "$num";
        $correctAnswer = $isPrimeFlagBool === true ? 'yes' : 'no';
        $gameData[] = [$question, $correctAnswer];
    }

    play($questionLine, $gameData);
}
