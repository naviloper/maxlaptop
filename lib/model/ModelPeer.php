<?php


/**
 * Skeleton subclass for performing query and update operations on the 'model' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 09/08/11 12:26:43
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class ModelPeer extends BaseModelPeer {
    
    public static function isNew($modelName)
    {
        $c = new Criteria();
        $c->add(ModelPeer::MODEL_NAME, $modelName, Criteria::EQUAL);
        
        $models = ModelPeer::doSelect($c);
        
        if(count($models) > 0)
        {
            return false;
        }
        else
            return true;
    }
    
    
    public static function getModelByName($modelName)
    {
        $c = new Criteria();
        $c->add(ModelPeer::MODEL_NAME, $modelName, Criteria::EQUAL);
        
        $model = ModelPeer::doSelectOne($c);
        
        return $model;
    }

} // ModelPeer
