<?php


/**
 * Skeleton subclass for representing a row from the 'series' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 09/08/11 12:26:46
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Series extends BaseSeries {
    
    public function __toString() {
        return $this->getName();
    }
    
    public function getName(){
        return $this->getBrand()->getBrandName().' '.$this->getSeriesName();
    }

} // Series
