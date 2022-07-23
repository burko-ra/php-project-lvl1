<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Even\playBrainEven;
use function BrainGames\Calc\playBrainCalc;
use function BrainGames\GCD\playBrainGCD;
use function BrainGames\Progression\playBrainProgression;
use function BrainGames\Prime\playBrainPrime;

function welcome()
{
    line('Welcome to the Brain Games!');
}

function greeting($name)
{
    line("Hello, %s!", $name);
}

function explainRules($game)
{
    $questionLine['brainEven'] = 'Answer "yes" if the number is even, otherwise answer "no".';
    $questionLine['brainCalc'] = 'What is the result of the expression?';
    $questionLine['brainGCD'] = 'Find the greatest common divisor of given numbers.';
    $questionLine['brainProgression'] = 'What number is missing in the progression?';
    $questionLine['brainPrime'] = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $questionLine['brainGames'] = 'Answer "yes" if the number is even, otherwise answer "no".';

    line($questionLine[$game]);
}

function launchGame($game)
{
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
    return [$question, $correctAnswer];
}

function askQuestion($question)
{
    line("Question: %s", $question);
}

function isResultCorrect($userAnswer, $correctAnswer)
{
    return (strtolower($userAnswer) === $correctAnswer);
}

function commentAnswer($resultBool, $userAnswer, $correctAnswer)
{
    if ($resultBool) {
        line("Correct!");
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
    }
}

function checkWin($score, $goal)
{
    return $score >= $goal;
}

function checkLoose($mistakes, $maxMistakes)
{
    return $mistakes > $maxMistakes;
}

function finishGame($victory, $defeat, $name)
{
    if ($victory) {
        line("Congratulations, %s!", $name);
    } elseif ($defeat) {
        line("Let's try again, %s!", $name);
    } else {
        line("Something went wrong");
    }
}

function play($game)
{
    welcome();

    $name = prompt('May I have your name?');

    greeting($name);

    $score = 0;
    $goal = 3;
    $mistakes = 0;
    $maxMistakes = 0;
    $victory = false;
    $defeat = false;

    explainRules($game);

    while ((!$victory) && (!$defeat)) {
        [$question, $correctAnswer] = launchGame($game);

        askQuestion($question);

        $userAnswer = prompt("Your answer");
        $resultBool = isResultCorrect($userAnswer, $correctAnswer);

        commentAnswer($resultBool, $userAnswer, $correctAnswer);

        $resultBool ? $score++ : $mistakes++;
        $victory = checkWin($score, $goal);
        $defeat = checkLoose($mistakes, $maxMistakes);
    }

    finishGame($victory, $defeat, $name);
}
