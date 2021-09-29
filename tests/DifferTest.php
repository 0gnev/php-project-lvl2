<?php

namespace Diffgame\Phpunit\Differ;

use PHPUnit\Framework\TestCase;

use function Diffgame\Differ\genDiff;

class DifferTest extends TestCase
{
    public function testDiff(): void
    {
        $expected = file_get_contents(__DIR__ . "/fixtures/expected.txt");
        $before = __DIR__ . "/fixtures/before.json";
        $after = __DIR__ . "/fixtures/after.yml";
        $result = genDiff($before, $after);
        $this->assertEquals($expected, $result);
    }
}