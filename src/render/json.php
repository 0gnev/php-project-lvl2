<?php

namespace Diffgame\Render\Json;

function json($ast)
{
    return json_encode($ast, JSON_PRETTY_PRINT);
}
