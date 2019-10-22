<?php

class Strike
{
    const NUMBER_OF_DIGITS = 4;
    private $number_selected_by_player;
    private $cpu_number_selectted_to_play;
    private $number_of_play;
    private $strikes;
    private $fires;

    public function __construct()
    {
        $this->strikes = 0;
        $this->fires = 0;
        $this->number_of_play = 1;
    }

    public function run()
    {
        $this->number_selected_by_player = $this->calculate_random_number();
        
        do 
        {
            $this->reset_element('strikes');
            $this->reset_element('fires');

            $this->cpu_number_selectted_to_play = $this->calculate_random_number();

            $cpu_number_selectted_to_play_splitted = str_split($this->cpu_number_selectted_to_play);
            $number_selected_by_player_splitted = str_split($this->number_selected_by_player);

            foreach ($number_selected_by_player_splitted as $digit_number_key => $digit_number)
            {
                if (in_array($digit_number, $cpu_number_selectted_to_play_splitted)) 
                {
                    $select_number_key = array_search($digit_number, $cpu_number_selectted_to_play_splitted);
                    if ($digit_number_key == $select_number_key) 
                    {
                        $this->strikes = $this->strikes + 1;
                    }
                    else 
                    {
                        $this->fires = $this->fires + 1;
                    }
                }
            }

            echo 'TRY: ' . $this->number_of_play . '<br>';
            echo 'number_selected_by_player: ' . $this->number_selected_by_player . '<br>';
            echo 'cpu_number_selectted_to_play: ' . $this->cpu_number_selectted_to_play . '<br>';
            echo 'strikes: ' . $this->strikes . ' y fires: ' . $this->fires;
            echo '<br><br>';
            $this->number_of_play++;
        } while ($this->strikes != self::NUMBER_OF_DIGITS);
    }

    private function calculate_random_number()
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

        return $number;
    }

    private function reset_element($element)
    {
        $this->$element = 0;
    }
}
