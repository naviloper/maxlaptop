<?php


/**
 * Skeleton subclass for representing a row from the 'field_value' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 09/15/11 10:32:52
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class FieldValue extends BaseFieldValue {
    
    
    public function getHtmlComment()
    {
        //get field
        return $this->getConfigField()->getHtmlComment();
    }

} // FieldValue
