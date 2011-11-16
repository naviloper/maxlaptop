<?php

class getseriesAction extends sfAction
{
    public function execute($request)
    {
        $brandId = $this->getRequestParameter('brand');
        $query = $this->getRequestParameter('query');
        
        //get series for this brand
        $cSeries = new Criteria();
        if ($brandId)
            $cSeries->add(SeriesPeer::BRAND_ID, $brandId);
        $cSeries->add(SeriesPeer::SERIES_NAME, $query.'%', Criteria::LIKE);
        $cSeries->addGroupByColumn(SeriesPeer::SERIES_NAME);
        $cSeries->addAscendingOrderByColumn(SeriesPeer::SERIES_NAME);
        $cSeries->setLimit(15);
        
        $this->serieses = SeriesPeer::doSelect($cSeries);
        
        $this->getResponse()->setContentType('application/json');
    }
}

?>
