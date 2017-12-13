<?php
declare(strict_types = 1);

namespace App\Entity;

use App\Contract\BoardingCardInterface;
use App\Model\BusTicket;

class AirportBusTicket extends BusTicket implements BoardingCardInterface
{
    /**
     * @inheritdoc
     */
    public function __toString() : string
    {
        return sprintf(
            "Take the airport bus from %s to %s. %s",
            $this->from,
            $this->to,
            $this->getSeat()
        );
    }
}
