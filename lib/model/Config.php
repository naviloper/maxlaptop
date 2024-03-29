<?php


/**
 * Skeleton subclass for representing a row from the 'config' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 09/08/11 12:26:40
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Config extends BaseConfig {
    
    public function getConfigFieldCategoryValue($configFieldCategory)
    {
        $resultStr = '';
        
        $cFields = new Criteria();
        $cFields->add(ConfigFieldPeer::CATEGORY_ID, $configFieldCategory->getId());
        $cFields->addDescendingOrderByColumn(ConfigFieldPeer::WEIGTH);
        
        $fields = ConfigFieldPeer::doSelect($cFields);
        
        //make fields id array
        $fieldsIdArr = array();
        foreach($fields as $field)
        {
            $fieldsIdArr[] = $field->getId();
        }
        
        //print_r($fields);
        //exit();
        
        //
        $cValue = new Criteria();
        $cValue->add(FieldValuePeer::FIELD_ID, $fieldsIdArr, Criteria::IN);
        $cValue->add(FieldValuePeer::CONFIG_ID, $this->getId());
        
        $fieldValues = FieldValuePeer::doSelect($cValue);
        
        foreach($fieldValues as $fieldValue)
        {
            if(strlen($fieldValue->getValue()) > 0 )             
            {
                $resultStr .= ($fieldValue->getValue().$fieldValue->getHtmlComment().'-');
            }
        }
        
        return $resultStr;        
    }
    
    public function getConfigFieldValues(){
        $c = new Criteria();
        $c->add(FieldValuePeer::CONFIG_ID, $this->getId());
        $fieldValues = FieldValuePeer::doSelect($c);
        $resultArr = array();
        foreach($fieldValues as $v){
            $field = ConfigFieldPeer::retrieveByPK($v->getFieldId());
            $resultArr[$field->getId()] = $v->getValue();
        }
        return $resultArr;
    }

    public function makeConfigName()
    {
        $configName = "C: ";
        
        $fieldCats = array(1, 2);

        foreach ($fieldCats as $cid){
            $fieldCat = ConfigFieldCategoryPeer::retrieveByPK($cid);
            $fields = $fieldCat->getFields();
            
            foreach($fields as $f){
                $cFieldValues = new Criteria();
                $cFieldValues->add(FieldValuePeer::CONFIG_ID, $this->getId());
                $cFieldValues->add(FieldValuePeer::FIELD_ID, $f->getId());
                $fieldValues = FieldValuePeer::doSelect($cFieldValues);

                foreach($fieldValues as $fieldValue)
                    $configName .= $fieldValue->getValue()." ";
            }
            $configName .= '-';
        }
        
        return $configName;
    }
    

} // Config
