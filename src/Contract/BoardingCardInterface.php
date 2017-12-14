<?php
declare(strict_types = 1);

namespace App\Contract;

use App\Model\Place;

interface BoardingCardInterface
{
    /**
     * @param BoardingCardInterface $card
     * @return bool
     */
    public function compare(self $card) : bool;

    /**
     * @return Place
     */
    public function getTo() : Place;

    /**
     * @return string
     */
    public function __toString() : string;
}
