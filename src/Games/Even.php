<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\runGame;

function getEvenGameData(): array
{
    $question = rand(1, 100);
    $correctAnswer = ($question % 2 === 0) ? 'yes' : 'no';
    return [$question, $correctAnswer];
}

function runBrainEven(): void
{
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';
    runGame($description, fn() => getEvenGameData());
}
