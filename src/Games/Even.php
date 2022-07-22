<?php

namespace BrainGames\Even;

function playBrainEven(): array
{
    $randMin = 1;
    $randMax = 20;
    $num = rand($randMin, $randMax);
    $question = strval($num);
    $correctAnswer = ($num % 2 === 0 ? 'yes' : 'no');
    return [$question, $correctAnswer];
}