<?php declare(strict_types=1);
/*
 * This is example code that is not production-ready. It is intended for studying and learning purposes.
 *
 * (c) 2018 thePHP.cc. All rights reserved.
 */

namespace example;

class Container
{
    /**
     * @var ContainerId
     */
    private $id;

    /**
     * @var Port
     */
    private $destination;

    public function __construct(ContainerId $id, Port $destination)
    {
        $this->id          = $id;
        $this->destination = $destination;
    }

    public function id(): ContainerId
    {
        return $this->id;
    }

    public function destination(): Port
    {
        return $this->destination;
    }
}
