<?php

namespace Runroom\GildedRose;

class Others {

    public $name;
    public $sell_in;
    public $quality;

    function __construct($name, $sell_in, $quality) {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString() {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

    public function quality(){
        if ($this->quality > 0) {
            $this->quality--;      
        }
        $this->sell_in--;

        if ($this->sell_in < 0) {
            
            if ($this->quality > 0) {
                $this->quality--;    
            }
        }
    }

}
