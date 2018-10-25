<?php declare(strict_types=1);
/*
 * This is example code that is not production-ready. It is intended for studying and learning purposes.
 *
 * (c) 2018 thePHP.cc. All rights reserved.
 */
namespace example;

use PHPUnit\Framework\TestCase;

/**
 * @covers \example\Position
 * @covers \example\Docked
 * @covers \example\InTransit
 *
 * @uses \example\Port
 * @uses \example\Name
 */
final class PositionTest extends TestCase
{
    public function test_can_be_docked(): void
    {
        $port = new Port(new Name('Hamburg'));

        $position = new Docked($port);

        $this->assertTrue($position->isDocked());
        $this->assertFalse($position->isInTransit());
        $this->assertEquals($port, $position->port());
    }

    public function test_can_be_in_transit(): void
    {
        $port = new Port(new Name('Hamburg'));

        $position = new InTransit($port);

        $this->assertTrue($position->isInTransit());
        $this->assertFalse($position->isDocked());
        $this->assertEquals($port, $position->destination());
    }
}
