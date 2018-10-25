<?php declare(strict_types=1);
/*
 * This is example code that is not production-ready. It is intended for studying and learning purposes.
 *
 * (c) 2018 thePHP.cc. All rights reserved.
 */

namespace example;

use PHPUnit\Framework\TestCase;

/**
 * @covers \example\Container
 *
 * @uses \example\ContainerId
 * @uses \example\Port
 */
final class ContainerTest extends TestCase
{
    /**
     * @var ContainerId
     */
    private $id;

    /**
     * @var Container
     */
    private $container;

    /**
     * @var Port
     */
    private $destination;

    protected function setUp(): void
    {
        $this->id          = ContainerId::fromString('CSQU3054383');
        $this->destination = new Port('Zielhafen');
        $this->container   = new Container($this->id, $this->destination);
    }

    public function test_has_ISO_6346_ID(): void
    {
        $this->assertEquals($this->id, $this->container->id());
    }

    public function test_has_destination_port(): void
    {
        $this->assertEquals($this->destination, $this->container->destination());
    }
}
