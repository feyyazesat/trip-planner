<?php
declare(strict_types = 1);

namespace App\Model;

use App\Contract\BoardingCardInterface;
use App\Exception\BoardingFromToCannotBeSamePlaceException;


abstract class AbstractTicket implements BoardingCardInterface
{
    protected $from;
    protected $to;
    protected $seat;

    /**
     * @param Place $from
     * @param Place $to
     * @param string $seat
     */
    public function __construct(Place $from, Place $to, string $seat)
    {
        if ($from === $to) {
            throw new BoardingFromToCannotBeSamePlaceException($from, $to);
        }

        $this->from = $from;
        $this->to   = $to;
        $this->seat = $seat;
    }

    /**
     * @inheritdoc
     */
    public function getTo() : Place
    {
        return $this->to;
    }

    /**
     * @param BoardingCardInterface $card
     * @return bool
     */
    public function compare(BoardingCardInterface $card) : bool
    {
        return $card->getTo() == $this->from;
    }
}
