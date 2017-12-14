<?php
require 'vendor/autoload.php';

use App\Model\BoardingCardCollection;
use App\Model\TrainTicket;
use App\Entity\AirportBusTicket;
use App\Model\Place;
use App\Planner;

$boardingCardCollection = new BoardingCardCollection();
$boardingCardCollection->addCard(
    new TrainTicket(
    new Place('Kiev'),
    new Place('Lviv'),
    '18C',
    'X12'
)
);
$boardingCardCollection->addCard(
    new AirportBusTicket(new Place('Lviv'), new Place('Lviv Danylo Halytskyi International Airport'))
);

$planning = new Planner($boardingCardCollection);

foreach ($planning as $plan) {
    echo $plan . PHP_EOL;
}
