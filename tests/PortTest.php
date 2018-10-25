<?php declare(strict_types=1);
/*
 * This is example code that is not production-ready. It is intended for studying and learning purposes.
 *
 * (c) 2018 thePHP.cc. All rights reserved.
 */
namespace example;

use PHPUnit\Framework\TestCase;

/**
 * @covers \example\Port
 * @uses \example\Name
 */
final class PortTest extends TestCase
{
    public function test_has_a_name(): void
    {
        $name = new Name('Westhafen');

        $port = new Port($name);

        $this->assertEquals($name, $port->name());
    }
}
