<?php

namespace Diffgame\Render;

function stylish($arr)
{
    $string = "{\n";
    foreach ($arr as $item) {
        switch ($item["typeNode"]) {
            case "unchanged":
                $string = $string . "    " . $item["key"] . ": " . $item["oldValue"] . "\n";
                break;
            case "changed":
                $string = $string . "  - " . $item["key"] . ": " . $item["oldValue"] . "\n";
                $string = $string . "  + " . $item["key"] . ": " . $item["newValue"] . "\n";
                break;
            case "removed":
                $string = $string . "  - " . $item["key"] . ": " . $item["oldValue"] . "\n";
                break;
            case "added":
                $string = $string . "  + " . $item["key"] . ": " . $item["newValue"] . "\n";
                break;
        }
    }
    $string = $string .  "}";
    return $string;
}
