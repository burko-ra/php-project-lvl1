<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Even\playBrainEven;
use function BrainGames\Calc\playBrainCalc;
use function BrainGames\GCD\playBrainGCD;
use function BrainGames\Progression\playBrainProgression;
use function BrainGames\Prime\playBrainPrime;

function play($game)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $score = 0;
    $goal = 3;
    $fault = false;
    $questionLine['brainEven'] = 'Answer "yes" if the number is even, otherwise answer "no".';
    $questionLine['brainCalc'] = 'What is the result of the expression?';
    $questionLine['brainGCD'] = 'Find the greatest common divisor of given numbers.';
    $questionLine['brainProgression'] = 'What number is missing in the progression?';
    $questionLine['brainPrime'] = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $questionLine['brainGames'] = 'Answer "yes" if the number is even, otherwise answer "no".';

    line($questionLine[$game]);

    while (($score < $goal) && ($fault === false)) {
        switch ($game) {
            case 'brainEven':
                [$question, $correctAnswer] = playBrainEven();
                break;
            case 'brainCalc':
                [$question, $correctAnswer] = playBrainCalc();
                break;
            case 'brainGCD':
                [$question, $correctAnswer] = playBrainGCD();
                break;
            case 'brainProgression':
                [$question, $correctAnswer] = playBrainProgression();
                break;
            case 'brainPrime':
                [$question, $correctAnswer] = playBrainPrime();
                break;
            case 'brainGames':
                [$question, $correctAnswer] = playBrainEven();
                break;
        }

        line("Question: %s", $question);
        $userAnswer = prompt("Your answer");
        $result = (strtolower($userAnswer) === $correctAnswer);
        $result ? $score++ : $fault = true;

        if ($result) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
        }
    }

    if ($score === $goal) {
        line("Congratulations, %s!", $name);
    } elseif ($fault === true) {
        line("Let's try again, %s!", $name);
    } else {
        line("Something went wrong");
    }
}

