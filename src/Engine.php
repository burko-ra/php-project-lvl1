<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUND_MAX = 3;

function play(string $questionLine, array $gameData)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($questionLine);

    foreach ($gameData as $round) {
        [$question, $correctAnswer] = $round;

        line("Question: %s", $question);
        $userAnswer = prompt("Your answer");

        if (strtolower($userAnswer) !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }

        line("Correct!");
    }

    line("Congratulations, %s!", $name);
}
