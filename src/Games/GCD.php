<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\runGame;

const GCD_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function gcd(int $a, int $b): int
{
    return $b === 0 ? $a : gcd($b, $a % $b);
}

function getGcdQuestionAnswer(): array
{
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);
    $question = "$num1 $num2";
    $correctAnswer = (string) gcd($num1, $num2);

    return [$question, $correctAnswer];
}

function playGcdGame(): void
{
    runGame(GCD_DESCRIPTION, fn() => getGcdQuestionAnswer());
}
