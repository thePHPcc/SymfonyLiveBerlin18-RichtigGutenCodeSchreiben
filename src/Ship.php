<?php declare(strict_types=1);
/*
 * This is example code that is not production-ready. It is intended for studying and learning purposes.
 *
 * (c) 2018 thePHP.cc. All rights reserved.
 */

namespace example;

final class Ship
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

    public function __construct(Name $name, Capacity $capacity, Position $position)
    {
        $this->name     = $name;
        $this->capacity = $capacity;
        $this->position = $position;
    }

    public function name(): Name
    {
        return $this->name;
    }

    public function capacity(): Capacity
    {
        return $this->capacity;
    }

    public function position(): Position
    {
        return $this->position;
    }
}
