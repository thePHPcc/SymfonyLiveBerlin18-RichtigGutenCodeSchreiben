<?php declare(strict_types=1);
/*
 * This is example code that is not production-ready. It is intended for studying and learning purposes.
 *
 * (c) 2018 thePHP.cc. All rights reserved.
 */

namespace example;

abstract class Position
{
    public function isDocked(): bool
    {
        return false;
    }

    public function isInTransit(): bool
    {
        return false;
    }
}
