<?php declare(strict_types=1);

namespace example;

use PHPUnit\Framework\TestCase;

/**
 * @covers \example\ContainerId
 */
final class ContainerIdTest extends TestCase
{
    public function testCanBeCreatedFromValidString(): void
    {
        $id = ContainerId::fromString('CSQU3054383');

        $this->assertInstanceOf(ContainerId::class, $id);
    }

    public function testCannotBeCreatedFromStringOfWrongLength(): void
    {
        $this->expectException(InvalidContainerIdException::class);

        ContainerId::fromString('CSQU305438');
    }

    public function testCannotBeCreatedFromStringWithInvalidCargoIdentifier(): void
    {
        $this->expectException(InvalidContainerIdException::class);

        ContainerId::fromString('CSQA3054383');
    }

    public function testCannotBeCreatedFromStringWithInvalidCheckDigit(): void
    {
        $this->expectException(InvalidContainerIdException::class);

        ContainerId::fromString('CSQU3054382');
    }

    public function testCanBeUsedAsString(): void
    {
        $id = 'CSQU3054383';

        $this->assertEquals('CSQU3054383', ContainerId::fromString($id));
    }
}
