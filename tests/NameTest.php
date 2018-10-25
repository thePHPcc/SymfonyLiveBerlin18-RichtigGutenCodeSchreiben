<?php declare(strict_types=1);
/*
 * This is example code that is not production-ready. It is intended for studying and learning purposes.
 *
 * (c) 2018 thePHP.cc. All rights reserved.
 */
namespace example;

use PHPUnit\Framework\TestCase;

/**
 * @covers \example\Name
 */
final class NameTest extends TestCase
{
    /**
     * @dataProvider empty_name_provider
     */
    public function test_cannot_be_empty(string $name): void
    {
        $this->expectException(InvalidNameException::class);

        new Name($name);
    }

    public function empty_name_provider(): array
    {
        return [
            [''],
            [' ']
        ];
    }

    public function test_can_be_used_as_string(): void
    {
        $name = new Name('name');

        $this->assertEquals('name', (string) $name);
    }
}
