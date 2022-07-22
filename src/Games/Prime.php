<?php

namespace BrainGames\Prime;

function playBrainPrime(): array
{
    $primeList50 = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47];
    $isPrimeFlag = rand(0, 1);
    $isPrimeFlagBool = ($isPrimeFlag === 1);
    $randMin = 2;
    $randMax = 20;

    do {
        $num = rand($randMin, $randMax);
    } while (in_array($num, $primeList50) !== $isPrimeFlagBool);

    $question = "$num";
    $correctAnswer = $isPrimeFlagBool === true ? 'yes' : 'no';
    return [$question, $correctAnswer];
}
