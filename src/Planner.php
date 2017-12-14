<?php
declare(strict_types = 1);

namespace App;

use App\Contract\BoardingCardInterface;
use App\Contract\PlannerInterface;
use App\Model\BoardingCardCollection;

class Planner implements PlannerInterface
{
    private const ARRIVAL_MESSAGE = "You have arrived at your final destination.";

    /**
     * @inheritdoc
     */
    public function plan(BoardingCardCollection $cards) : array
    {
        // other implementations.

        $sorted = $cards->sort();

        $plan = array_map(function (BoardingCardInterface $card) : string {
            return (string) $card;
        }, $sorted);

        return array_merge($plan, self::ARRIVAL_MESSAGE);
    }
}
