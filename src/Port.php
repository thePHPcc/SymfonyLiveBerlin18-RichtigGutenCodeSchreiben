<?php declare(strict_types=1);

namespace example;

final class Port
{
    /**
     * @var string
     */
    private $name;

    public function __construct(string $name)
    {
        $this->ensureNameIsNotEmpty($name);

        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }

    private function ensureNameIsNotEmpty(string $name): void
    {
        if (empty(trim($name))) {
            throw new InvalidNameException('Name of port must not be empty');
        }
    }
}
