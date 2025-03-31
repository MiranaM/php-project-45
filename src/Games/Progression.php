<?php

namespace BrainGames\Games;

use function BrainGames\Engine\runGame;

const PROGRESSION_DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_MIN_LENGTH = 5;
const PROGRESSION_MAX_LENGTH = 10;

function generateProgression(int $start, int $step, int $length): array
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $start + $i * $step;
    }
    return $progression;
}

function getProgressionQuestionAnswer(): array
{
    $start = rand(1, 20);
    $step = rand(2, 5);
    $length = rand(PROGRESSION_MIN_LENGTH, PROGRESSION_MAX_LENGTH);
    $progression = generateProgression($start, $step, $length);

    $hiddenIndex = rand(0, $length - 1);
    $correctAnswer = (string) $progression[$hiddenIndex];
    $progression[$hiddenIndex] = '..';

    $question = implode(' ', $progression);

    return [$question, $correctAnswer];
}

function playProgressionGame(): void
{
    runGame(PROGRESSION_DESCRIPTION, fn() => getProgressionQuestionAnswer());
}
