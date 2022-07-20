<?php

namespace BrainGames\Lib;

function generateNumber(): int
{
    $randMin = 1;
    $randMax = 20;
    return rand($randMin, $randMax);
}

function isEven(int $number): string
{
    return $number % 2 === 0 ? 'yes' : 'no';
}
