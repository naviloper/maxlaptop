<?php

/**
 * config actions.
 *
 * @package    Maxlaptop
 * @subpackage config
 * @author     navid045@gmail.com
 */
class configActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      
    //get request parameters
    $this->selectedBrand = $this->getRequestParameter('brand');
    $this->selectedSeries = $this->getRequestParameter('series');
    $this->selectedModel = $this->getRequestParameter('model');
      
    $cConfig = new Criteria();
    
    $cConfig->addJoin(ConfigPeer::MODEL_ID, ModelPeer::ID);
    $cConfig->addJoin(ModelPeer::SERIES_ID, SeriesPeer::ID);
    $cConfig->addJoin(SeriesPeer::BRAND_ID, BrandPeer::ID);
    
    if($this->selectedBrand)
    {
        $cConfig->add(BrandPeer::ID, $this->selectedBrand);
    }
    
    if($this->selectedSeries)
    {
        $cConfig->add(SeriesPeer::SERIES_NAME, $this->selectedSeries, Criteria::LIKE);
    }
    
    if($this->selectedModel)
    {
        $cConfig->add(ModelPeer::MODEL_NAME, $this->selectedModel, Criteria::LIKE);
    }        
    
    //$this->Configs = ConfigPeer::doSelect($cConfig);
    
    //paginatiom
    $pager = new sfPropelPager('Config', 15);
    $pager->setCriteria($cConfig);
    $pager->setPage($this->getRequestParameter('page'));
    $pager->init();
    $this->pager = $pager;
    
    //get config columns
    $c = new Criteria();
    $c->addDescendingOrderByColumn(ConfigFieldCategoryPeer::WEIGTH);
    
    $this->configFieldCategories = ConfigFieldCategoryPeer::doSelect($c);
    
    //get brands
    $cBrand = new Criteria();
    $this->brands = BrandPeer::doSelect($cBrand);    
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ConfigForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ConfigForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Config = ConfigPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Config does not exist (%s).', $request->getParameter('id')));
    $this->form = new ConfigForm($Config);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Config = ConfigPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Config does not exist (%s).', $request->getParameter('id')));
    $this->form = new ConfigForm($Config);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    //$request->checkCSRFProtection();

    $this->forward404Unless($Config = ConfigPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Config does not exist (%s).', $request->getParameter('id')));
    $Config->delete();

    $this->redirect('config/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Config = $form->save();

      $this->redirect('config/edit?id='.$Config->getId());
    }
  }
}
