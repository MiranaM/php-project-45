<?php

namespace BrainGames\Games;

use function BrainGames\Engine\runGame;

const DESCRIPTION = "What is the result of the expression?";

function playCalc()
{
    $getQuestionAnswer = function () {
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
    };

    runGame(DESCRIPTION, $getQuestionAnswer);
}
