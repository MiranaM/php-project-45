<?php

namespace BrainGames\Games;

use function BrainGames\Engine\runGame;

const PRIME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function getPrimeQuestionAnswer(): array
{
    $number = rand(1, 100);
    $correctAnswer = isPrime($number) ? 'yes' : 'no';
    return [(string) $number, $correctAnswer];
}

function playPrimeGame(): void
{
    runGame(PRIME_DESCRIPTION, fn() => getPrimeQuestionAnswer());
}