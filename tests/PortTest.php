<?php declare(strict_types=1);
namespace example;

use PHPUnit\Framework\TestCase;

final class PortTest extends TestCase
{
    public function test_has_a_name(): void
    {
        $name = 'Westhafen';

        $port = new Port($name);

        $this->assertEquals($name, $port->name());
    }
}
