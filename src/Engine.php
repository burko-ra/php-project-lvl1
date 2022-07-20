<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

line('Welcome to the Brain Game!');
$name = prompt('May I have your name?');
line("Hello, %s!", $name);

$score = 0;
$goal = 3;
$fault = false;

$game = basename($_SERVER["SCRIPT_NAME"], 'php');
switch ($game) {
    case 'brain-even':
        $x = __DIR__ . '/Games/Even.php';
        require_once $x;        
        break;
    case 'brain-calc':
        $x = __DIR__ . '/Games/Calc.php';
        require_once $x;
        break;
}

if ($score === $goal) {
    line("Congratulations, %s!", $name);
} elseif ($fault === true) {
    line("Let's try again, %s!", $name);
} else {
    line("Something went wrong");
}
