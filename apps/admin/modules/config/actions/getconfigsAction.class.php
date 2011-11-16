<?php

class getconfigsAction extends sfAction
{
    public function execute($request)
    {
        $fieldName = $this->getRequestParameter('field');
        $query = $this->getRequestParameter('query');
        
        //get field ID
        $fieldNameArr = explode('_', $fieldName);
        $fieldId = $fieldNameArr[1];
        
        $cField = new Criteria();
        $cField->add(FieldValuePeer::FIELD_ID, $fieldId);
        
        $c1 = $cField->getNewCriterion(FieldValuePeer::VALUE, $query.'%', Criteria::LIKE);
        $c2 = $cField->getNewCriterion(FieldValuePeer::VALUE, "", Criteria::NOT_EQUAL);
        $c1->addAnd($c2);        
        $cField->addAnd($c1);
        
        $cField->addGroupByColumn(FieldValuePeer::VALUE);
        $cField->addAscendingOrderByColumn(FieldValuePeer::VALUE);
        $cField->setLimit(15);
        
        $this->values = FieldValuePeer::doSelect($cField);
        
        $this->getResponse()->setContentType('application/json');
    }
}

?>
