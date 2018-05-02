<?php
declare(strict_types = 1);

namespace App\Exception;

use App\Model\Place;

class BoardingFromToCannotBeSamePlaceException extends \InvalidArgumentException
{

    /**
     * BoardingFromToCannotBeSamePlaceException constructor.
     * @param Place $from
     * @param Place $to
     */
    public function __construct(Place $from, Place $to)
    {
        parent::__construct(sprintf("Boarding Card from %s to %s cannot be same.", $from, $to));
    }
}
