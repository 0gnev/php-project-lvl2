<?php

namespace Diffgame\Render;

function render($arr, $format)
{
    $formats = [
        'stylish' => function ($ast) {
            return stylish($ast);
        }
    ];
    return $formats[$format]($arr);
}
