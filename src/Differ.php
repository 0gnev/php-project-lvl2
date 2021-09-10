<?php

namespace Diffgame\Differ;

use function Diffgame\Parser\parse;

function genDiff($firstFilePath, $secondFilePath, $format = "stylish")
{
    return(parse($firstFilePath));
}