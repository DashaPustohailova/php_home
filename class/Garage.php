<?php


class Garage
{
    public $garageCar;
    public function __construct(array $cars)
    {
        $this->garageCar = $cars;
    }
}