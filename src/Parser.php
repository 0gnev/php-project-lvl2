<?php

namespace Diffgame\Parser;

function parse(string $path)
{
    if (!file_exists($path)) {
        throw new \Exception("Invalid file path: {$path}");
    }

    $content = file_get_contents($path);
    $extension = pathinfo($path, PATHINFO_EXTENSION);

    if ($content === false) {
        throw new \Exception("Can't read file: {$path}");
    }
    switch ($extension) {
        case "json":
            return json_decode($content, false, 512, JSON_THROW_ON_ERROR);
        case "yml":
            print_r("yaml");
        default:
            throw new \Exception("Format {$extension} not supported.");
    }
}
