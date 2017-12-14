<?php
require 'vendor/autoload.php';

use App\Model\BoardingCardCollection;
use App\Entity\TrainTicket;
use App\Entity\AirportBusTicket;
use App\Entity\PlaneTicket;
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
    new AirportBusTicket(
        new Place('Lviv'),
        new Place('Lviv Danylo Halytskyi International Airport')
    )
);

$boardingCardCollection->addCard(
    new PlaneTicket(
        new Place('Lviv Danylo Halytskyi International Airport'),
        new Place('Stockholm'),
        '3A',
        'BF134',
        '45B',
        344
    )
);

$boardingCardCollection->addCard(
    new PlaneTicket(
        new Place('Stockholm'),
        new Place('Amsterdam Schiphol'),
        '7B',
        'SK22',
        '18'
    )
);

$boardingCardCollection->addCard(
    new TrainTicket(
        new Place('Amsterdam Schiphol'),
        new Place('Rotterdam'),
        '12B',
        'T13'
    )
);

$planning = new Planner($boardingCardCollection);

foreach ($planning->plan() as $plan) {
    echo $plan . PHP_EOL;
}
