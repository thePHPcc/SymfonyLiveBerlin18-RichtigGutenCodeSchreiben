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
 * @uses \example\Capacity
 * @uses \example\Name
 */
final class ShipTest extends TestCase
{
    /**
     * @var Name
     */
    private $name;

    /**
     * @var Capacity
     */
    private $capacity;

    /**
     * @var Ship
     */
    private $ship;

    protected function setUp(): void
    {
        $this->name = new Name('Boaty McBoatface');
        $this->capacity = new Capacity(100);
        $this->ship = new Ship($this->name, $this->capacity);
    }

    public function test_has_a_name(): void
    {
        $this->assertEquals($this->name, $this->ship->name());
    }

    public function test_has_a_capacity(): void
    {
        $this->assertEquals($this->capacity, $this->ship->capacity());
    }
}
