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
 * @uses \example\Position
 * @uses \example\Docked
 * @uses \example\Port
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
     * @var Position
     */
    private $position;

    /**
     * @var Ship
     */
    private $ship;

    protected function setUp(): void
    {
        $this->name     = new Name('Boaty McBoatface');
        $this->capacity = new Capacity(100);
        $this->position = new Docked(new Port(new Name('Hamburg')));
        $this->ship     = new Ship($this->name, $this->capacity, $this->position);
    }

    public function test_has_a_name(): void
    {
        $this->assertEquals($this->name, $this->ship->name());
    }

    public function test_has_a_capacity(): void
    {
        $this->assertEquals($this->capacity, $this->ship->capacity());
    }

    public function test_has_a_position(): void
    {
        $this->assertEquals($this->position, $this->ship->position());
    }
}
