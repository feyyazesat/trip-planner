<?php
declare(strict_types = 1);

namespace App\Entity;

use App\Model\AbstractTicket;
use App\Model\Place;

use App\Contract\BoardingCardInterface;

class BusTicket extends AbstractTicket implements BoardingCardInterface
{
    protected const SEAT    = 'seat %s';
    protected const NO_SEAT = 'No seat assignment.';

    /**
     * @param Place $from
     * @param Place $to
     * @param null|string $seat
     */
    public function __construct(Place $from, Place $to, ?string $seat = null)
    {
        parent::__construct($from, $to, (string) $seat);
    }

    /**
     * @return string
     */
    protected function getSeat() : string
    {
        return $this->seat ? sprintf(self::SEAT, $this->seat) : self::NO_SEAT;
    }

    /**
     * @inheritdoc
     */
    public function __toString() : string
    {
        return sprintf(
            "Take the bus from %s to %s. %s",
            $this->from,
            $this->to,
            $this->getSeat()
        );
    }
}
