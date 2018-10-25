<?php declare(strict_types=1);
/*
 * This is example code that is not production-ready. It is intended for studying and learning purposes.
 *
 * (c) 2018 thePHP.cc. All rights reserved.
 */
namespace example;

use PHPUnit\Framework\TestCase;

/**
 * @covers \example\Capacity
 */
final class CapacityTest extends TestCase
{
    public function test_must_be_positive(): void
    {
        $this->expectException(InvalidCapacityException::class);

        new Capacity(0);
    }

    public function test_can_be_converted_to_integer(): void
    {
        $capacity = new Capacity(1);

        $this->assertSame(1, $capacity->asInt());
    }
}
