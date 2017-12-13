<?php
declare(strict_types = 1);

namespace App\Model;

use App\Contract\BoardingCardInterface;

class BoardingCardCollection
{
    private $cards = [];
    private $sorted = [];

    /**
     * @param BoardingCardInterface $card
     */
    public function addCard(BoardingCardInterface $card) : void
    {
        $this->cards[] = $card;

    }

    /**
     * @return array
     */
    public function sort() : array
    {
        /**
         * @var BoardingCardInterface $card1
         * @var BoardingCardInterface $card2
         */
        $cards = $this->cards;
        foreach ($cards as $card1Key => $card1) {
            foreach ($cards as $card2Key => $card2) {
                // if it is the same card pass.
                if ($card1 === $card2) {
                    continue;
                }

                // compare and add sorted list.
                if ($card1->compare($card2)) {
                    $this->sorted[$card1Key] = $card1;
                    unset($cards[$card1Key]);
                    break;
                }
            }
        }

        return $this->sorted;
    }

    /**
     * @return array
     */
    public function toArray() : array
    {
        return $this->cards;
    }

}
