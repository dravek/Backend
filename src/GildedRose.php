<?php

namespace Runroom\GildedRose;

class GildedRose {

    private $items;
    private $obj;

    function __construct($items) {
        $this->items = $items;
    }

    function update_quality() {
        foreach ($this->items as $item) {

            switch($item->name)
            {
                case 'Aged Brie':

                    $obj = new AgedBrie($item->name, $item->sell_in,$item->quality);
                    break;

                case 'Backstage passes to a TAFKAL80ETC concert':

                    $obj = new Backstage($item->name, $item->sell_in,$item->quality);
                    break;

                case 'Sulfuras, Hand of Ragnaros':

                    $obj = new Sulfuras($item->name, $item->sell_in,$item->quality);
                    break;

                default:

                    $obj = new Others($item->name, $item->sell_in,$item->quality);
                    break;
            }

            $obj->quality();
            $item->quality = $obj->quality;
            $item->sell_in = $obj->sell_in;
        }
    }
}