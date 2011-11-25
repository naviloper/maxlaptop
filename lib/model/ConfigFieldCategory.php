<?php


/**
 * Skeleton subclass for representing a row from the 'config_field_category' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 09/18/11 05:55:01
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class ConfigFieldCategory extends BaseConfigFieldCategory {
    
    public function getFields(){
        $c = new Criteria();
        return ConfigFieldPeer::doSelect($c->add(ConfigFieldPeer::CATEGORY_ID,$this->getId()));
    }

    public static function getFieldName($f){
        return $f->getName();
    }
    
    public function getFieldsString(){
        $fields = $this->getFields();
        return implode(' - ', array_map(array('ConfigFieldCategory','getFieldName'),$fields));
    }
    
    /**
     * Initializes internal state of ConfigFieldCategory object.
     * @see        parent::__construct()
     */
    public function __construct()
    {
            // Make sure that parent constructor is always invoked, since that
            // is where any default values for this object are set.
            parent::__construct();
    }


    public function __toString()
    {
        return $this->getName();
    }
} // ConfigFieldCategory
