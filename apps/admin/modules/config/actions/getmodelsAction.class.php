<?php

class getmodelsAction extends sfAction
{
    public function execute($request)
    {
        $seriesName = $this->getRequestParameter('series');
        $query = $this->getRequestParameter('query');
        
        //load series
        $cSeries = new Criteria();      
        $cSeries->add(SeriesPeer::SERIES_NAME, $seriesName, Criteria::EQUAL);
        $series = SeriesPeer::doSelectOne($cSeries);
                        
        //get models for this series
        $cModel = new Criteria();
        
        $cModel->add(ModelPeer::SERIES_ID, $series->getId());
        $cModel->add(ModelPeer::MODEL_NAME, $query.'%', Criteria::LIKE);
        $cModel->addGroupByColumn(ModelPeer::MODEL_NAME);
        $cModel->addAscendingOrderByColumn(ModelPeer::MODEL_NAME);
        $cModel->setLimit(15);
        
        $this->models = ModelPeer::doSelect($cModel);
        
        $this->getResponse()->setContentType('application/json');
    }
}

?>
