<?php

class newconfigAction extends sfAction
{
    public function execute($request)
    {
        /*$this->form = new sfForm();
        $this->form->setWidgets(array(
            'brand'    => new sfWidgetFormInputText(),
            'series'    => new sfWidgetFormInputText(),
            'model'    => new sfWidgetFormInputText(),
            
            
            'id'         => new sfWidgetFormInputHidden(),
            'cpu'        => new sfWidgetFormInputText(),
              'cache'      => new sfWidgetFormInputText(),
              'hdd'        => new sfWidgetFormInputText(),
              'ram'        => new sfWidgetFormInputText(),
              'graphic'    => new sfWidgetFormInputText(),
              'display'    => new sfWidgetFormInputText(),
              'weight'     => new sfWidgetFormInputText(),
              'optic'      => new sfWidgetFormInputText(),
              'network'    => new sfWidgetFormInputText(),
              'wifi'       => new sfWidgetFormInputText(),
              'wwan'       => new sfWidgetFormInputText(),
              'size'       => new sfWidgetFormInputText(),
              'battery'    => new sfWidgetFormInputText(),
              'os'         => new sfWidgetFormInputText(),
              'created_at' => new sfWidgetFormDateTime(),
              'updated_at' => new sfWidgetFormDateTime(),
          ));*/
        
        $this->isNew = true;
        
        //load config
        $this->config = new Config();
        $this->configId = null;
        
        //load model
        $this->model = new Model();
        
        //load other configuration for this model
        $this->configs = $this->model->getConfigs();
        
        //load series
        $this->series = new Series();
        
        //get brands
        $cBrand = new Criteria();
        $this->brands = BrandPeer::doSelect($cBrand);
        $this->selectedBrand = null;
        
        $cFieldCat = new Criteria();
        $cFieldCat->addDescendingOrderByColumn(ConfigFieldCategoryPeer::WEIGTH);
        
        $this->configFieldCategories = ConfigFieldCategoryPeer::doselect($cFieldCat);
        
        $this->setTemplate('config');        
    }
    
    
    
}

?>
