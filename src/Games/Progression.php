<?php

namespace BrainGames\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Lib\generateProgression;
use function BrainGames\Lib\commentTheAnswer;

line('What number is missing in the progression?');
while (($score < $goal) && ($fault === false)) {
    [$progression, $correctAnswer] = generateProgression();
    line("Question: %s", $progression);
    $userAnswer = prompt("Your answer");
    $result = (intval($userAnswer) === $correctAnswer);
    $result ? $score++ : $fault = true;
    commentTheAnswer($result, $userAnswer, $correctAnswer);
}
