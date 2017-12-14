<?php
declare(strict_types = 1);

namespace App\Entity;

use App\Contract\BoardingCardInterface;
use App\Model\AbstractTicket;
use App\Model\Place;

class PlaneTicket extends AbstractTicket implements BoardingCardInterface
{
    private const AUTOMATIC_BAGGAGE_DROP =  "Baggage will we automatically transferred from your last leg.";
    private const BAGGAGE_DROP = "Baggage drop at ticket counter %d.";

    private $flightNumber;
    private $gate;
    private $baggageDrop;

    /**
     * @param Place $from
     * @param Place $to
     * @param string $seat
     * @param string $flightNumber
     * @param string $gate
     * @param int|null $baggageDrop
     */
    public function __construct(Place $from, Place $to, string $seat, string $flightNumber, string $gate, ?int $baggageDrop)
    {
        $this->flightNumber  = $flightNumber;
        $this->baggageDrop = $baggageDrop;
        $this->gate          = $gate;
        parent::__construct($from, $to, $seat);
    }

    /**
     * @return string
     */
    private function getBaggageDrop() : string
    {
        return is_null($this->baggageDrop) ? self::AUTOMATIC_BAGGAGE_DROP : sprintf(self::BAGGAGE_DROP, $this->baggageDrop);
    }

    /**
     * @inheritdoc
     */
    public function __toString() : string
    {
        return sprintf(
            "From %s, take flight %s to %s. Gate %s, seat %s. %s",
            $this->from,
            $this->flightNumber,
            $this->to,
            $this->gate,
            $this->seat,
            $this->getBaggageDrop()
        );
    }
}
