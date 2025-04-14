<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const MAX_COUNT = 3;

function greetUser(): string
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    return $name;
}

function runGame(string $description, callable $getQuestionAnswer): void
{
    $name = greetUser();
    line($description);

    for ($i = 0; $i < MAX_COUNT; $i++) {
        [$question, $correctAnswer] = $getQuestionAnswer();
        line("Question: %s", $question);
        $userAnswer = prompt("Your answer");

        if ($userAnswer === $correctAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
    }

    line("Congratulations, %s!", $name);
}
