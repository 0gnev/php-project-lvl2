<?php

namespace Differ\Phpunit\Differ;

use PHPUnit\Framework\TestCase;

use function Differ\Differ\genDiff;

class DifferTest extends TestCase
{
    public function testDiff(): void
    {
        $expected = file_get_contents(__DIR__ . "/fixtures/expected.txt");
        $before = __DIR__ . "/fixtures/before.json";
        $after = __DIR__ . "/fixtures/after.yml";
        $result = genDiff($before, $after);
        $this->assertEquals($expected, $result);

        $expected2 = file_get_contents(__DIR__ . "/fixtures/expected2.txt");
        $before2 = __DIR__ . "/fixtures/before2.json";
        $after2 = __DIR__ . "/fixtures/after2.json";
        $result2 = genDiff($before2, $after2);
        $this->assertEquals($expected2, $result2);

        $result2plain = genDiff($before2, $after2, "plain");
        $expected2plain = file_get_contents(__DIR__ . "/fixtures/expected2plain.txt");
        $this->assertEquals($expected2plain, $result2plain);

        $result2json = genDiff($before2, $after2, "json");
        $expected2json = file_get_contents(__DIR__ . "/fixtures/expected2json.txt");
        $this->assertEquals($expected2json, $result2json);
    }
}
