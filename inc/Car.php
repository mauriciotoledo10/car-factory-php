<?php

class Car {
    
    private $name;
    private $price;
    private $brand;

    public function __construct($name, $price, $brand) {
        $this->name = $name;
        $this->brand = $brand;
        $this->price = $price;
    }
    
}
