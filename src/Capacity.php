<?php declare(strict_types=1);
/*
 * This is example code that is not production-ready. It is intended for studying and learning purposes.
 *
 * (c) 2018 thePHP.cc. All rights reserved.
 */

namespace example;

final class Capacity
{
    /**
     * @var int
     */
    private $capacity;

    public function __construct(int $capacity)
    {
        $this->ensureCapacityIsPositive($capacity);

        $this->capacity = $capacity;
    }

    public function asInt(): int
    {
        return $this->capacity;
    }

    private function ensureCapacityIsPositive(int $capacity): void
    {
        if ($capacity < 1) {
            throw new InvalidCapacityException;
        }
    }
}
