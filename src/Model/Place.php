<?php
declare(strict_types = 1);

namespace App\Model;

class Place
{

    /**
     * @var string $name
     */
    private $name = '';

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->name;
    }
}
