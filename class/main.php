<?php
require_once 'Car.php';
require_once 'Garage.php';

$cars = [];

for ($i = 0; $i <= 2; $i++) {
    array_push($cars, new Car);
}

$cars[0]->mark = 'Car1';
$cars[0]->color = 'Red';
$cars[1]->mark = 'Car2';
$cars[1]->color = 'Black';
$cars[2]->mark = 'Car3';
$cars[2]->color = 'Green';


$garage = new Garage($cars);
var_dump($garage->garageCar);