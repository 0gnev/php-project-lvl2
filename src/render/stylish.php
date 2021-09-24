<?php

namespace Diffgame\Render;

function stylish ($arr)
{
    echo "{";
    echo "\n";
    foreach ($arr as $item) {
        switch ($item["typeNode"]) {
            case "unchanged":
                print_r("    " . $item["key"] . ": " . $item["oldValue"]);
                echo "\n";
                break;
            case "changed":
                print_r("  - " . $item["key"] . ": " . $item["oldValue"] . "\n");
                print_r("  + " . $item["key"] . ": " . $item["newValue"]);
                echo "\n";
                break;
            case "removed":
                print_r("  - " . $item["key"] . ": " . $item["oldValue"]);
                echo "\n";
                break;
            case "added":
                print_r("  + " . $item["key"] . ": " . $item["newValue"]);
                echo "\n";
                break;
        }
    }
    echo "}";
}