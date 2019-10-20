<?php

const NUMBER_OF_DIGITS = 4;

$digits_of_number = [];

for ($i = 0; $i < NUMBER_OF_DIGITS; $i++) 
{ 
    do 
    {
        $new_digit = rand(0, 9);
    } while (in_array($new_digit, $digits_of_number));

    $digits_of_number[] = $new_digit;
}

$number = '';
foreach ($digits_of_number as $key => $digit)
{
    $number = $number . $digit;
}

var_dump($number); exit;

 