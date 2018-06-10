<?php

namespace Runroom\GildedRose;

class AgedBrie extends Item{

    public function quality(){

        if ($this->quality < 50) $this->quality++;

        $this->sell_in--;
        
        if ($this->sell_in < 0) {
            if ($this->quality < 50) {
                $this->quality++;
            }
        }
    }
}
