<?php declare(strict_types=1);
/*
 * This is example code that is not production-ready. It is intended for studying and learning purposes.
 *
 * (c) 2018 thePHP.cc. All rights reserved.
 */
namespace example;

use PHPUnit\Framework\TestCase;

/**
 * @covers \example\Ship
 *
 * @uses \example\Name
 */
final class ShipTest extends TestCase
{
    public function test_has_a_name(): void
    {
        $name = new Name('Boaty McBoatface');

        $ship = new Ship($name);

        $this->assertEquals($name, $ship->name());
    }
}
