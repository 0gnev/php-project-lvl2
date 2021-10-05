<?php

namespace Diffgame\Render;

use function Diffgame\Render\Json\json;
use function Diffgame\Render\Plain\plain;
use function Diffgame\Render\Stylish\stylish;

function render($arr, $format)
{
    $formats = [
        'stylish' => function ($ast) {
            return stylish($ast);
        },
        'plain' => function ($ast) {
            return plain($ast);
        },
        'json' => function ($ast) {
            return json($ast);
        }
    ];
    return $formats[$format]($arr);
}
