<?php

namespace App\ValueObjects;

class Address
{
    public function __construct(public $lineOne, public $lineTwo){}
}
