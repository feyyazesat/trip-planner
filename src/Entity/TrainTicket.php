<?php
declare(strict_types = 1);

namespace App\Entity;

use App\Model\AbstractTicket;
use App\Model\Place;

use App\Contract\BoardingCardInterface;

class TrainTicket extends AbstractTicket implements BoardingCardInterface
{
    protected const SEAT    = 'seat %s';
    protected const NO_SEAT = 'No seat assignment.';

    private $trainNumber;

    /**
     * @param Place $from
     * @param Place $to
     * @param string $seat
     * @param string $trainNumber
     */
    public function __construct(Place $from, Place $to, string $seat, string $trainNumber)
    {
        $this->trainNumber = $trainNumber;
        parent::__construct($from, $to, $seat);
    }

    /**
     * @return string
     */
    protected function getSeat() : string
    {
        return $this->seat ? self::SEAT . $this->seat : self::NO_SEAT;
    }

    /**
     * @inheritdoc
     */
    public function __toString() : string
    {
        return sprintf(
            "Take train %s from %s to %s. Sit in seat %s.",
            $this->trainNumber,
            $this->from,
            $this->to,
            $this->getSeat()
        );
    }
}
