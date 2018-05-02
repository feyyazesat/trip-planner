# A DDD PHP Solution To The Trip Planner Problem

### Specification

You are given a stack of boarding cards for various transportations that will take you from a point A to point B via several stops on the way. All of the boarding cards are out of order and you don't know where your journey starts, nor where it ends. Each boarding card contains information about seat assignment, and means of transportation (such as flight number, bus number etc).

Provide an API that let's you sort this kind of list and present back a description of how to complete your journey. For instance the API should be able to take an unordered set of boarding cards, provided in a format defined by you, and produce this

- Take train X12 from Kiev to Lviv. Sit in seat 18C.

- Take the airport bus from Lviv to Lviv Danylo Halytskyi International Airport. No seat assignment.

- From Lviv Danylo Halytskyi International Airport, take flight BF134 to Stockholm. Gate 45B, seat 3A. Baggage drop at ticket counter 344.

- From Stockholm, take flight SK22 to Amsterdam Schiphol. Gate 18, seat 7B. Baggage will we automatically transferred from your last leg.

- Take train T13 from Amsterdam Schiphol to Rotterdam. Sit in seat 12B.

- You have arrived at your final destination.

The list should be defined in a format that's compatible with the input format.