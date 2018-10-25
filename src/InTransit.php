<?php declare(strict_types=1);
/*
 * This is example code that is not production-ready. It is intended for studying and learning purposes.
 *
 * (c) 2018 thePHP.cc. All rights reserved.
 */

namespace example;

final class InTransit extends Position
{
    /**
     * @var Port
     */
    private $destination;

    public function __construct(Port $destination)
    {
        $this->destination = $destination;
    }

    public function isInTransit(): bool
    {
        return true;
    }

    public function destination(): Port
    {
        return $this->destination;
    }
}
