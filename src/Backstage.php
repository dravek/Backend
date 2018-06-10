<?php

namespace Runroom\GildedRose;

class Backstage extends Item{

    public function quality(){

        if ($this->quality < 50) {

            $this->quality++;
            if ($this->sell_in < 11) $this->quality++;
            if ($this->sell_in < 6) $this->quality++;
        }

        $this->sell_in--;
        if ($this->sell_in < 0) $this->quality = 0;
    }
}
