<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\runGame;

const EVEN_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function getEvenQuestionAnswer(): array
{
    $question = rand(1, 100);
    $correctAnswer = ($question % 2 === 0) ? 'yes' : 'no';
    return [$question, $correctAnswer];
}

function playEvenGame(): void
{
    runGame(EVEN_DESCRIPTION, fn() => getEvenQuestionAnswer());
}
