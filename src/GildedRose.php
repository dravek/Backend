<?php

namespace Runroom\GildedRose;

class GildedRose {

    private $items;

    function __construct($items) {
        $this->items = $items;
    }

    /**
     * 
     * Test File:
     * 
     * itemsDegradeQuality
     * quality -= 1
     * 
     * itemsDegradeDoubleQualityOnceTheSellInDateHasPass
     * sell_in < 0 --> quality -= 2
     * 
     * itemsCannotHaveNegativeQuality
     * quality >= 0
     * 
     * agedBrieIncreasesQualityOverTime
     * agedBrie quality += 1
     * 
     * qualityCannotBeGreaterThan50
     * quality <= 50
     * 
     * sulfurasDoesNotChange
     * Sulfuras ==
     * 
     * backstageRules
     * rules on test file
     * 
     * backstageQualityIncreaseOverTimeWithCertainRules
     * backstage rules
     * 
     * ********************
     * 
     * For all of them
     * 0 <= quality <= 50
     * 
     * Types of items:
     * - AgedBrie
     * - Backstage ...
     * - Sulfuras ...
     * - Other items
     * 
     * Item:
     *  - public $name;
     *  - public $sell_in;
     *  - public $quality;
     * 
     */

    function update_quality() {
        foreach ($this->items as $item) {

            switch($item->name)
            {
                case 'Aged Brie':

                    if ($item->quality < 50) $item->quality++;
                    
                    $item->sell_in--;

                    if ($item->sell_in < 0) {
                        if ($item->quality < 50) {
                            $item->quality++;
                        }
                    }

                    return;

                case 'Backstage passes to a TAFKAL80ETC concert':

                    if ($item->quality < 50) {

                        $item->quality++;

                        if ($item->sell_in < 11) $item->quality++;
                        
                        if ($item->sell_in < 6) $item->quality++;
                       
                    }

                    $item->sell_in--;

                    if ($item->sell_in < 0) $item->quality = 0;

                    return;

                case 'Sulfuras, Hand of Ragnaros':

                    return;

                default:

                    // Other

                    if ($item->quality > 0) {
                        $item->quality--;      
                    }
                    $item->sell_in--;

                    if ($item->sell_in < 0) {
                        
                        if ($item->quality > 0) {
                            $item->quality--;    
                        }
                    }

                    return;
            }
        }
    }
}
