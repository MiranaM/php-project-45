<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\runGame;

const CALC_DESCRIPTION = 'What is the result of the expression?';

function getCalcQuestionAnswer(): array
{
    $operators = ['+', '-', '*'];
    $num1 = rand(1, 50);
    $num2 = rand(1, 50);
    $operator = $operators[array_rand($operators)];

    $question = "{$num1} {$operator} {$num2}";

    switch ($operator) {
        case '+':
            $correctAnswer = $num1 + $num2;
            break;
        case '-':
            $correctAnswer = $num1 - $num2;
            break;
        case '*':
            $correctAnswer = $num1 * $num2;
            break;
    }

    return [$question, (string) $correctAnswer];
}

function playCalcGame(): void
{
    runGame(CALC_DESCRIPTION, fn() => getCalcQuestionAnswer());
}
