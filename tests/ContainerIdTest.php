<?php declare(strict_types=1);
/*
 * This is example code that is not production-ready. It is intended for studying and learning purposes.
 *
 * (c) 2018 thePHP.cc. All rights reserved.
 */

namespace example;

use PHPUnit\Framework\TestCase;

/**
 * @covers \example\ContainerId
 */
final class ContainerIdTest extends TestCase
{
    public function test_can_be_created_from_valid_string(): void
    {
        $id = ContainerId::fromString('CSQU3054383');

        $this->assertInstanceOf(ContainerId::class, $id);
    }

    public function test_cannot_be_created_from_string_of_wrong_length(): void
    {
        $this->expectException(InvalidContainerIdException::class);

        ContainerId::fromString('CSQU305438');
    }

    public function test_cannot_be_created_from_string_with_invalid_cargo_identifier(): void
    {
        $this->expectException(InvalidContainerIdException::class);

        ContainerId::fromString('CSQA3054383');
    }

    public function test_cannot_be_created_from_string_with_invalid_check_digit(): void
    {
        $this->expectException(InvalidContainerIdException::class);

        ContainerId::fromString('CSQU3054382');
    }

    public function test_can_be_used_as_string(): void
    {
        $id = 'CSQU3054383';

        $this->assertEquals('CSQU3054383', ContainerId::fromString($id));
    }
}
