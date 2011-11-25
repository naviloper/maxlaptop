<?php

class editconfigAction extends sfAction
{
    public function execute($request)
    {
        $this->isNew = false;
        
        //load config
        $this->config = ConfigPeer::retrieveByPK($this->configId = $this->getRequestParameter('id'));
        $this->forward404Unless($this->config);
        $this->configId = $this->config->getId();
        
        //load model
        $this->model = $this->config->getModel();
        
        //load other configuration for this model
        $this->configs = $this->model->getConfigs();
        
        //load series
        $this->series = $this->model->getSeries();
        
        //get brands
        $cBrand = new Criteria();
        $this->brands = BrandPeer::doSelect($cBrand);
        $this->selectedBrand = $this->series->getBrandId();
        
        $cFieldCat = new Criteria();
        $cFieldCat->addDescendingOrderByColumn(ConfigFieldCategoryPeer::WEIGHT);
        
        $this->configFieldCategories = ConfigFieldCategoryPeer::doselect($cFieldCat);
        
        $this->setTemplate('config');
    }
}

?>
