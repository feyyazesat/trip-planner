<?php
declare(strict_types = 1);

namespace App;

use App\Contract\PlannerInterface;
use App\Model\BoardingCardCollection;
use App\Contract\BoardingCardInterface;

class Planner implements PlannerInterface
{

    private const ARRIVAL_MESSAGE = "You have arrived at your final destination.";

    /**
     * @var BoardingCardCollection $cards
     */
    private $cards;

    /**
     * @param BoardingCardCollection $cards
     */
    public function __construct(BoardingCardCollection $cards)
    {
        $this->cards = $cards;
    }

    /**
     * @inheritdoc
     */
    public function plan(): array
    {
        // other implementations.

        $sorted = $this->cards->sort();

        $plan = array_map(function (BoardingCardInterface $card): string {
            return (string)$card;
        }, $sorted);

        return array_merge($plan, [self::ARRIVAL_MESSAGE]);
    }
}
