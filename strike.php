<?php

class Strike
{
    const NUMBER_OF_DIGITS = 4;

    public function run()
    {
        $digits_of_number = [];

        for ($i = 0; $i < self::NUMBER_OF_DIGITS; $i++) 
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

        $number_player = $number;
        $cont = 1;

        do 
        {
            $digits_of_number = [];

            for ($i = 0; $i < self::NUMBER_OF_DIGITS; $i++) 
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

            $select_number_random_to_play = $number;

            $select_number_random_to_play_splitted = str_split($select_number_random_to_play);
            $number_player_splitted = str_split($number_player);

            $strikes = 0;
            $fires = 0;

            foreach ($number_player_splitted as $digit_number_key => $digit_number)
            {
                if (in_array($digit_number, $select_number_random_to_play_splitted)) 
                {
                    $select_number_key = array_search($digit_number, $select_number_random_to_play_splitted);
                    if ($digit_number_key == $select_number_key) 
                    {
                        $strikes = $strikes + 1;
                    }
                    else 
                    {
                        $fires = $fires + 1;
                    }
                }
            }

            echo 'TRY: ' . $cont . '<br>';
            echo 'number_player: ' . $number_player . '<br>';
            echo 'select_number: ' . $select_number_random_to_play . '<br>';
            echo 'strikes: ' . $strikes . ' y fires: ' . $fires;
            echo '<br><br>';
            $cont++;
        } while ($strikes != 4);
    }
}
