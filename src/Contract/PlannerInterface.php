<?php
declare(strict_types = 1);

namespace App\Contract;

use App\Model\BoardingCardCollection;

interface PlannerInterface
{
    /**
     * @param BoardingCardCollection $cards
     * @return array
     */
    public function plan(BoardingCardCollection $cards) : array;
}
