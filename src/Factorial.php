<?php

namespace GraphqlRequester\Factorial;
class Factorial
{
    public function calculate($number)
    {
        if ($number <= 1) {
            return 1;
        } else {
            return $number * $this->calculate($number - 1);
        }
    }
}