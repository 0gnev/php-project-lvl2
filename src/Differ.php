<?php

namespace Diffgame\Differ;

use function Diffgame\Parser\parse;
use function Diffgame\Render\render;

function genDiff(string $firstFilePath, string $secondFilePath, $format = "stylish")
{
    $firstArray = parse($firstFilePath);
    $secondArray = parse($secondFilePath);
    $diff = makeDiff($firstArray, $secondArray);
    return render($diff, $format);
}

function makeDiff(array $before, array $after)
{
    $before = boolToString($before);
    $after = boolToString($after);
    $unionKeys = array_unique(array_merge(array_keys($before), array_keys($after)));
    sort($unionKeys);
    return array_map(function ($key) use ($before, $after) {
        if (array_key_exists($key, $before) && array_key_exists($key, $after)) {
            if ($before[$key] === $after[$key]) {
                return buildNode("unchanged", $key, $before[$key], $after[$key]);
            } else {
                return buildNode("changed", $key, $before[$key], $after[$key]);
            }
        } elseif (array_key_exists($key, $before) && !array_key_exists($key, $after)) {
            return buildNode("removed", $key, $before[$key], null);
        } elseif (!array_key_exists($key, $before) && array_key_exists($key, $after)) {
            return buildNode("added", $key, null, $after[$key]);
        }
    }, $unionKeys);
}

function boolToString(array $array)
{
    return array_map(function ($value) {
        if ($value === true) {
            $value = "true";
        } elseif ($value === false) {
            $value = "false";
        }
        return $value;
    }, $array);
}
function buildNode($typeNode, $key, $oldValue, $newValue)
{
    $node = [
        'typeNode' => $typeNode,
        'key' => $key,
        'oldValue' => $oldValue,
        'newValue' => $newValue
    ];
    return $node;
}
