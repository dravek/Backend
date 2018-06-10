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

            if ($item->name == 'Aged Brie')
            {
                if ($item->quality < 50) $item->quality = $item->quality + 1;
                
                $item->sell_in = $item->sell_in - 1;

                if ($item->sell_in < 0) {
                    if ($item->quality < 50) {
                        $item->quality = $item->quality + 1;
                    }
                }

                return;
                //test ok
            }

            if ($item->name == 'Backstage passes to a TAFKAL80ETC concert')
            {
                if ($item->quality < 50) {
                    $item->quality = $item->quality + 1;
                    if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->sell_in < 11) {
                            if ($item->quality < 50) {
                                $item->quality = $item->quality + 1;
                            }
                        }
                        if ($item->sell_in < 6) {
                            if ($item->quality < 50) {
                                $item->quality = $item->quality + 1;
                            }
                        }
                    }
                }

                $item->sell_in = $item->sell_in - 1;

                if ($item->sell_in < 0) $item->quality = $item->quality - $item->quality;

                return;
                //test ok
            }

            if ($item->name == 'Sulfuras, Hand of Ragnaros')
            {

                return;
                //test ok
            }

            // Other

            if ($item->quality > 0) {
                $item->quality = $item->quality - 1;
                
            }
            $item->sell_in = $item->sell_in - 1;

            if ($item->sell_in < 0) {
                
                if ($item->quality > 0) {
                    $item->quality = $item->quality - 1;
                    
                }
                    
                
            }

            return;
            //test ok



            // if ($item->name != 'Aged Brie' and $item->name != 'Backstage passes to a TAFKAL80ETC concert') {
            //     if ($item->quality > 0) {
            //         if ($item->name != 'Sulfuras, Hand of Ragnaros') {
            //             $item->quality = $item->quality - 1;
            //         }
            //     }
            // } else {
            //     if ($item->quality < 50) {
            //         $item->quality = $item->quality + 1;
            //         if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
            //             if ($item->sell_in < 11) {
            //                 if ($item->quality < 50) {
            //                     $item->quality = $item->quality + 1;
            //                 }
            //             }
            //             if ($item->sell_in < 6) {
            //                 if ($item->quality < 50) {
            //                     $item->quality = $item->quality + 1;
            //                 }
            //             }
            //         }
            //     }
            // }

            // if ($item->name != 'Sulfuras, Hand of Ragnaros') {
            //     $item->sell_in = $item->sell_in - 1;
            // }

            // if ($item->sell_in < 0) {
            //     if ($item->name != 'Aged Brie') {
            //         if ($item->name != 'Backstage passes to a TAFKAL80ETC concert') {
            //             if ($item->quality > 0) {
            //                 if ($item->name != 'Sulfuras, Hand of Ragnaros') {
            //                     $item->quality = $item->quality - 1;
            //                 }
            //             }
            //         } else {
            //             $item->quality = $item->quality - $item->quality;
            //         }
            //     } else {
            //         if ($item->quality < 50) {
            //             $item->quality = $item->quality + 1;
            //         }
            //     }
            // }
        }
    }
}
