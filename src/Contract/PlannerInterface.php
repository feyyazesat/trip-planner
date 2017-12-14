<?php
declare(strict_types = 1);

namespace App\Contract;

interface PlannerInterface
{
    /**
     * @return array
     */
    public function plan() : array;
}
